<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Package;
use App\Model\Coupon;
use App\Model\Stories;
use App\Model\Payments;
use App\Model\Home;
use Str, DB, Auth;
use Validator;

class DashboardController extends Controller
{



    public function DashboardView(Request $request)
    {
            //redirect if not super admin
        $this->prefix = request()->route()->getPrefix();
        $user = User::where('type',2)->count();
        $package = Package::count();
        $coupon = Coupon::count();
        $stories = Stories::count();
        $payment = Payments::sum('amount');
        return view('admin.dashboard.dashboard',['payment'=>$payment,'stories'=>$stories,'user'=>$user,'coupon'=>$coupon,'package'=>$package,'prefix'=>$this->prefix]);

    }

    public function home(Request $request)
    {
            //redirect if not super admin
        $this->prefix = request()->route()->getPrefix();
        $result = Home::first();
        return view('admin.home.index',['result'=>$result,'prefix'=>$this->prefix]);

    }

    public function password()
    {
      $this->prefix = request()->route()->getPrefix();

      return view('admin.password.password',['prefix'=>$this->prefix]);

    }



    public function passwordUpdate(Request $request)
   {
      $validator = Validator::make($request->all(), [
        'password' => 'required|string',

      ]);
      if ($validator->fails())
      {
        $errors = $validator->errors();
       $output['success']     = false;
       $output['formErrors']  = true;
       $output['errors']      = $errors;
      }
      else
      {
         $id = Auth::id();
         $updated_password = bcrypt($request['password']);
          $users = User::where('id',$id)->update(['password' => $updated_password]);
          if($users)
            {
              $output['success'] ="true";
              $output['success_message'] ="Password  Updated Successfully";
              $output['delayTime'] = 3000;
              $output['resetform'] ='true';
           }
           else
           {
              $output['formErrors'] ="true";
              $output['errors'] ="Customer  is Not Added";
           }

      }
      echo json_encode($output);
      exit;
    }


}
