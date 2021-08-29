<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserLocations;
use App\Model\Country;
use App\Model\States;
use App\Model\Cities;
use App\Model\Package;
use App\Model\UserPackage;
use App\Model\MessageRoom;
use App\Model\Coupon;
use App\Model\Payments;
use Validator;
use Session;
use Curl;
use DB;
use Auth;
use DateTime;
use Stripe;
use Illuminate\Support\Facades\Crypt;
Use Redirect;

class MembershipController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $package = Package::get();
       $selected = UserPackage::where(array('userId'=>Auth::User()->id,"status"=>1))->orderby('id','desc')->first();

        return view('front.package.package',['packages'=>$package,'selected'=>$selected]);
    }

    public function stripe($id)
    {
      $sid = Crypt::decrypt($id);
      $package = Package::where('id',$sid)->first();
      return view('front.stripe.stripe',['id'=>$id,'package'=>$package]);
    }

    public function stripePost(Request $request)
    {
      $pid = Crypt::decrypt($request->packageId);
      $package = Package::where('id',$pid)->first();
      $price = $package->price;
      $tdiscount = 0;
       if(isset($request->coupon))
       {
         $res = Coupon::where(array('coupon'=>$request->coupon,'status'=>1))->first();
         if(!empty($res))
         {
           $price = $package->price;
           $discount = $res->discount;
           $tdiscount = $discount * $price;
           $tdiscount = $tdiscount / 100;
           $price = $price - $tdiscount;
         }
         else
         {
           $output['formErrors'] ="true";
           $output['errors'] ="Invalide Coupon code";
           return response($output);
         }
       }


      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      $customer = \Stripe\Customer::create(array(
     'name' =>$request->name,
     'description' => 'Saddi jodi package',
     'email' =>Auth::User()->email,
     'source' => $request->stripeToken,
     "address" => ["city" => "ropar", "country" => 'india', "line1" => 'ropar', "line2" => "", "postal_code" => '140001', "state" =>'punjab']
     ));
     $orderID = strtoupper(str_replace('.','',uniqid('', true)));
    $amount = $price * 100;
    $payment =   Stripe\Charge::create ([
             'customer' => $customer->id,
              "amount" =>$amount,
              "currency" => "inr",
              'metadata' => array(
              'order_id' => $orderID
          ),
              "description" => "Saadi jodi package payment."
      ]);

      if($payment)
      {

        $upackage = new UserPackage([
            'userId' => Auth::User()->id,
            'packageId' => $package->id,
            'price' => $price,
            'chat' => $package->chat,
            'connects' => $package->connects,
            'phoneNumberDisplay' => $package->phoneNumberDisplay,
            'status'=>1,
        ]);
         $success = $upackage->save();

         if($success)
         {
           $pay = new Payments([
             'userId'=>Auth::User()->id,
             'packageId'=>$package->id,
             'amount'=>$price,
             'coupon'=>$tdiscount,
           ]);
           $pay->save();
         }

      }

      if($payment)
      {
        $output['success'] ="true";
        $output['success_message'] ="Payment  Successful";
        $output['delayTime'] = 3000;
        $output['url'] = url('success');
      }
      else
      {
        $output['formErrors'] ="true";
        $output['errors'] ="Profile Is not update";
      }
      return response($output);

    }

    public function checkPackage(Request $request)
    {
      $package = UserPackage::where(array('userId'=>Auth::User()->id,"status"=>1))->first();
      if(!empty($package) && $package->chat == 1)
      {
        $userId = Auth::User()->id;

         $date = date("Y-m-d H:i:s", strtotime($request->date));
         $roomdata = new MessageRoom();
         if($userId > $request->id)
         {
          $roomId = $userId.'_'.$request->Id;
         }
         else
         {
          $roomId = $request->id.'_'.$userId;
         }
         $roomdata->userId = $userId;
         $roomdata->oppositeUserId = $request->id;
         $roomdata->roomId = $roomId;
         $roomdata->last_message_at = date('Y-m-d H:i:s');
         $check = MessageRoom::where('roomId',$roomId)->first();
         if(!$check)
         {
         $result = $roomdata->save();
         if($result)
         {
             $output['success'] ="true";
             $output['url'] = url('message');
         }
         else
         {
           MessageRoom::where('roomId',$roomId)->update(array('last_message_at'=>date('Y-m-d H:i:s')));
           $output['success'] ="true";
           $output['url'] = url('message');
          }
        }
       else
       {
         MessageRoom::where('roomId',$roomId)->update(array('last_message_at'=>date('Y-m-d H:i:s')));
         $output['success'] ="true";
         $output['url'] = url('message');
       }
     }
      else
      {
        $output['success'] = "false";
      }
      return response($output);
    }

    public function success(Request $request)
    {
       return view('front.stripe.thanku');
    }

    public function ApplyCoupon(Request $request)
    {
      if(isset($request->id))
      {
        $pid = Crypt::decrypt($request->packageId);
        $res = Coupon::where(array('coupon'=>$request->id,'status'=>1))->first();
        if(!empty($res))
        {
          $package = Package::where('id',$pid)->first();
          $price = $package->price;
          $discount = $res->discount;
          $tdiscount = $discount * $price;
          $tdiscount = $tdiscount / 100;
          $price = $price - $tdiscount;
          $res->payable = $price;
          $output['success'] ="true";
          $output['success_message'] ="Coupon Applied Successfully";
          $output['result'] = $res;
        }
        else
        {
          $output['formErrors'] ="true";
          $output['errors'] ="Invalide Coupon code";
        }
      }
      else
      {
        $output['formErrors'] ="true";
        $output['errors'] ="Coupon code is required";
      }
      return response($output);

    }




}
