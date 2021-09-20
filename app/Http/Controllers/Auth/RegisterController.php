<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserBasicDetails;
use App\Model\UserFamilyDetails;
use App\Model\UserEducations;
use App\Model\UserReligious;
use App\Helpers\GlobalFunctions as CommonHelper;

use Session;
use Curl;
use DB;
use Crypt;
use URL;
use Redirect;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function save(Request $request)
  {
   $validator = Validator::make($request->all(),[
           'email' => 'required|string|email|unique:users',
           'firstName' => 'required|string',
           'lastName' => 'required|string',
           'password' => 'required|string|confirmed',
           'phone' => 'required|unique:users',
           'gender' => 'required',

       ]);

     if ($validator->fails())
     {
        $errors = $validator->errors();
       $output['validation']     = false;
       $output['errors']      = $errors;
     }
     else
    {
      $last = User::orderby('id','desc')->first();
      if(!empty($last->uniqueNo))
      {
        $uniqueNo = $last->uniqueNo;
        $uniqueNo = $uniqueNo + 1;
        $uniqueNo1 = 'Ab'.$uniqueNo;
      }
      else
      {
         $uniqueNo = 1111;
         $uniqueNo1 ='AB1111';
      }
      $user = new User([
           'email' =>$request->email,
           'firstName' =>$request->firstName,
           'lastName' =>$request->lastName,
           'password' =>bcrypt($request->password),
           'phone' =>$request->phone,
           'type'=>2,
           'status'=>0,
           'uniqueId'=>$uniqueNo1,
           'uniqueNo'=>$uniqueNo,
       ]);

      $res =  $user->save();
      if($res)
      {
        $basic = new UserBasicDetails([
            'userId'=>$user->id,
            'gender'=>$request->gender,
          ]);
          $basic->save();
        $f = new UserFamilyDetails([
            'userId'=>$user->id,
          ]);
          $f->save();
        $e = new UserEducations([
            'userId'=>$user->id,
          ]);
          $e->save();
        $rel = new UserReligious([
            'userId'=>$user->id,
          ]);
          $rel->save();
      }


      if($res)
       {
         $token = Crypt::encryptString($request->email);
         $mailData = array('link'=>URL::to('/verification?token='.$token),'name'=>$request->firstName);
         $emailresult = CommonHelper::sendmail('Saadijodii@gmail.com', 'Sadi jodi', $request->email,$request->firstName, 'Email verification' , ['data'=>$mailData], 'emails.verification','',$attachment=null);
       }
      //

    if($res)
      {
        $output['success'] ="true";
        $output['success_message'] ="Registered Successfully.Kindly check your Email and activate your account";
        $output['delayTime'] = 4000;
        $output['resetform'] ='true';
        $output['url'] = url('login');
     }
     else
     {
        $output['formErrors'] ="true";
        $output['errors'] ="Register Is Not Successfully";
     }

        }
        echo json_encode($output);
        exit;
  }



  public function verification(Request $request)
  {
    if($request->token)
    {
      $email = Crypt::decryptString($request->token);

      $user = User::where('email',$email)->first();
      if(!empty($user))
      {
        User::where('email',$email)->update(['status' =>1]);
        return redirect('login')->with('message', 'Account is Activated');
      }
      else
      {
        return redirect('login')->with('failed', 'Account is Not Activated');

       }
     }
     else
     {
       return redirect('login')->with('failed', 'Account is Not Activated');
     }
  }

}
