<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Coupon;

use Illuminate\Http\Request;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\URL;
use Validator;
use Illuminate\Support\Facades\Crypt;



class UserController extends Controller
{
    //

    public function index(Request $request)
    {
        $this->prefix = request()->route()->getPrefix();
        $perpage = 10;
        $query = User::query();


        if($request->ajax()){
            $query = User::query();
            if(isset($request->peritem))
            {
              $perpage = $request->peritem;
            }

            if(!empty($request->search))
            {
              $search = $request->search;
              $query->where(function ($query)use($search)
              {
                  $query->where('firstName', 'like', '%' . $search . '%')
                        ->orWhere('lastName', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
              });
            }

            $users = $query->where('type',2)->orderby('id','DESC')->paginate($perpage);

            $html =  view('admin.users.userajax',['prefix'=>$this->prefix,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage])->render();
            return response()->json(['html' => $html]);
        }
        else
        {
           $users = $query->where('type',2)->orderby('id','DESC')->paginate($perpage);
           $coupon = Coupon::where('status',1)->get();


          return view('admin.users.user',['prefix'=>$this->prefix,'allcoupon'=>$coupon,'users'=>$users,'perpage'=>$perpage,'srNo'=>(request()->input('page', 1) - 1) * $perpage]);
         }
    }

    public function add()
  {
     return view('users.add');
  }

  public function save(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'firstName' => 'required|string',
          'lastName' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string',
          'phone' => 'required|string',
          'status' => 'required|string',
          'driverImage' => 'mimes:jpeg,jpg,png|max:10000',
            ],[
              'driverImage.mimes'=>'Only jpeg, png files are acceptable',
           ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']  = false;
       $response['errors']      = $errors;
       return response($response);
      }
      else
     {
      $driverimage = '';
       if($request->hasFile('driverImage'))
       {
       $request->file('data_name');
       $licf     = 'driver-'.time();
       $files        = $request->file('driverImage');
       $name         = $files->getClientOriginalName();
       $extension    = $files->extension();
       $type         = explode('.',$name);
       $files->move(public_path().'/driver/', $licf.'.'.$extension);
       $driverimage = $licf.'.'.$extension;
      }

       $user = new User([
           'firstName' => $request->firstName,
           'lastName' => $request->lastName,
           'email' => $request->email,
           'type' =>4,
           'password' => bcrypt($request->password),
           'status' => $request->status,
       ]);

      $res =  $user->save();
      if($request->userType)
      {
      $role = Role::where('id',1)->first();
      $user->assignRole($role);
      }

      if($res)
      {

          $driver = new Driver([
           'userId' => $user->id,
           'driverImage' => $driverimage,
           'phone' =>$request->phone,
           'userType'=>$request->userType,
         ]);
       $result = $driver->save();
     }

     // if($result)
     // {
     //   $mailData = array('password'=>$request->password,'name'=>$request->firstName,'email'=>$request->email,'type'=>$request->userType);
     //   $emailresult = CommonHelper::sendmail('nitindeveloper23@gmail.com', 'Taxi', $request->email, $request->firstName, 'Account detail' , ['data'=>$mailData], 'emails.dispatchaccount','',$attachment=null);
     // }

     if($res)
     {
       $response['success']         = true;
       $response['delayTime']       = '3000';
       $response['success_message'] = 'User Added Successfully.';
       $response['url'] = url('userlist');
       $response['resetform'] ='true';
       return response($response);
     }
     else
     {
       $response['formErrors'] = true;
       $response['delayTime']     = '3000';
       $response['errors'] = 'Driver Not Added.';
       return response($response);
     }
   }

  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'firstName' => 'required|string',
          'lastName' => 'required|string',
          'email' => 'required|string|email',
          'phone' => 'required|string',
          'driverImage' => 'mimes:jpeg,jpg,JPG,png|max:5000',
            ],[
              'driverImage.mimes'=>'Only jpeg, png files are acceptable',
           ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']     = false;
       $response['errors']      = $errors;
       return response($response);

      }
      else
     {


       if($request->hasFile('driverImage'))
       {
         $request->file('data_name');
         $licf     = 'driver-'.time();
         $files        = $request->file('driverImage');
         $name         = $files->getClientOriginalName();
         $extension    = $files->extension();
         $type         = explode('.',$name);
         $files->move(public_path().'/driver/', $licf.'.'.$extension);
         $data['driverImage'] = $licf.'.'.$extension;

       }
       $id = Crypt::decrypt($request['id']);

       $data1['firstName'] = $request['firstName'];
       $data1['lastName'] = $request['lastName'];
       $data1['status'] = $request['status'];
       $data1['email'] = $request['email'];
       if(!empty($request['password']))
       {
         $data1['password'] = bcrypt($request['password']);
       }
       $res = User::where('id',$id)->update($data1);

      if($res)
      {


         $data['phone'] = $request['phone'];
         $data['userType'] = $request['userType'];

         $result = Driver::where('userId',$id)->update($data);

         if($result)
         {
           $response['success']         = true;
           $response['delayTime']       = '3000';
           $response['success_message'] = 'User Updated Successfully.';
           $response['url'] = url('userlist');

           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '3000';
           $response['errors'] = 'User Not Update.';
           return response($response);
         }
     }
     else
     {
     $response['formErrors'] = true;
     $response['delayTime']     = '3000';
     $response['errors'] = 'User Not Update.';
     return response($response);
     }
   }

  }

  public function edit($id)
   {
     $id = Crypt::decrypt($id);
     $result = User::with('driverInfo')->where(array("id"=>$id))->first();
     $result = $result->toArray();
     return view('users.edit',['driver'=>$result]);
   }

   public function view(Request $request)
   {
     $result = User::with('driverInfo','driverInfo.taxidetail')->where(array("id"=>$request['id']))->first();
     $result = $result->toArray();
     if(!empty($result['driver_info']['permitExpiryDate']))
     {
     $result['driver_info']['permitExpiryDate'] = date("d-m-Y", strtotime($result['driver_info']['permitExpiryDate']));
     }
     if(!empty($result['driver_info']['licenceExpiryDate']))
     {
      $result['driver_info']['licenceExpiryDate'] = date("d-m-Y", strtotime($result['driver_info']['licenceExpiryDate']));
     }
     if(!empty($result['driver_info']['hiringDate']))
     {
     $result['driver_info']['hiringDate'] = date("d-m-Y", strtotime($result['driver_info']['hiringDate']));
     }
     if($result)
     {
       $response['success']         = true;
       $response['result']       = $result;
       return response($response);
     }
     else
     {
       $response['success'] = false;
       return response($response);
   }
   }



    public function delete(Request $request)
    {

      $res = User::destroy($request['id']);
      if($res)
      {
        $driver = Driver::where(array("userId"=>$request['id']))->first();
        if($driver)
        {
         Driver::destroy($driver->id);
        }
      }

      if($res)
      {
        $response['success']         = true;
        $response['delayTime']       = '2000';
        $response['success_message'] = 'User Deleted successfully.';

        return response($response);
      }
      else
      {
        $response['formErrors'] = true;
        $response['delayTime']     = '2000';
        $response['errors'] = 'User Not Deleted.';
        return response($response);
    }
  }


  public function status(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'id' => 'required|string',
          'status' => 'required|string',
      ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']  = false;
       $response['errors']      = $errors;
       return response($response);
      }
      else
     {

         $result = User::where('id',$request->id)->update(["status"=>$request->status]);

     if($result)
     {
       $response['success']         = true;
       $response['success_message'] = 'Status Updated Successfully.';

       return response($response);
     }
     else
     {
       $response['formErrors'] = true;
       $response['errors'] = 'Status Not Update.';
       return response($response);
      }
    }
  }

  public function sendCoupon(Request $request)
  {
    $validator = Validator::make($request->all(),[
          'id' => 'required|string',
          'coupon' => 'required|string',
      ]);

      if ($validator->fails())
      {
        $errors = $validator->errors();
       $response['validation']  = false;
       $response['errors']      = $errors;
       return response($response);
      }
      else
     {

         $user = User::where('id',$request->id)->first();
         $coupon = Coupon::where('id',$request->coupon)->first();
         $mailData = array('coupon'=>$coupon->coupon,'discount'=>$coupon->discount,'name'=>$user->firstName);
         $emailresult = CommonHelper::sendmail('Saadijodii@gmail.com', 'Sadi jodi', $user->email,$user->firstName, 'Coupon code' , ['data'=>$mailData], 'emails.coupon','',$attachment=null);
        if($emailresult)
       {
        $response['success']         = true;
        $response['resetform']         = true;
        $response['modelhide']         = "#couponSendUser";
        $response['success_message'] = 'Coupon Code Sent Successfully.';
        return response($response);
      }
      else
      {
       $response['formErrors'] = true;
       $response['errors'] = 'Coupon Not send.';
       return response($response);
      }
    }
  }






}
