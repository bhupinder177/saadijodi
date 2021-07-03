<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Model\User;
use App\Helpers\GlobalFunctions as CommonHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;
use Session;
use URL;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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


      public function forgot()
    {
      $title = "Forgot Password | Password Reset ";
      $description ="Please submit your email address below, We'll send instructions to your e-mail for resetting your password.";
      return view('auth.passwords.forgot_password',['title'=>$title,'description'=>$description]);
    }

    public function forgotPassword(Request $request)
    {
      $user = User::where('email',$request->email)->first();
      if(!empty($user))
      {
      $emailcrypt = Crypt::encryptString($request->email);
      User::where('email',$request->email)->update(['forgotPasswordExpired' =>1]);

      $mailData = array('link'=>URL::to('/forgotPassword-verifiy?email='.$emailcrypt),'name'=>$user->firstName);

       $emailresult = CommonHelper::sendmail('nitindeveloper23@gmail.com', 'Saddi Jodi', $request->email,$user->firstName, 'Reset Password' , ['data'=>$mailData], 'emails.forgotpassword','',$attachment=null);
       if($emailresult)
       {
         $response['success'] ="true";
         $response['success_message'] = 'Email sent successfully.';
         $response['resetform'] = 'true';

       }
       else
       {
         $response['formErrors'] = true;
         $response['delayTime']     = '2000';
         $response['errors'] = 'Email is not send.Please try again.';
       }
     }
     else
     {
       $response['formErrors'] = true;
       $response['delayTime']     = '2000';
       $response['errors'] = 'Email does not exist.';
     }
       return response($response);
    }

    public function verify(Request $request)
    {

      if(isset($request->email))
      {
       $email = Crypt::decryptString($request->email);
       //$email = decrypt($request->email);
      }
      else
      {
        $email='';
      }

      $user = User::where('email',$email)->first();
      if(!empty($user) && $user->forgotPasswordExpired == 1)
      {
        return view('auth.passwords.newPassword',['email'=>$request->email]);
      }
      else
      {
        return view('auth.passwords.forgotPasswordExpired');
      }

    }

    public function newPasswordUpdate(Request $request)
    {
      $validator = Validator::make($request->all(),[
              'password' => 'required|string|confirmed',

          ]);

        if ($validator->fails())
        {
           $errors = $validator->errors();
          $output['validation']     = false;
          $output['errors']      = $errors;
        }
        else
       {
         $updated_password = bcrypt($request->password);
         $email = Crypt::decryptString($request->email);
         $result = User::where('email',$email)->update(['password' => $updated_password,'forgotPasswordExpired' =>0]);

        if($result)
         {
           $output['success'] ="true";
           $output['success_message'] ="Password Updated Successfully";
           $output['delayTime'] = 3000;
           $output['resetform'] ='true';
           $output['url'] = url('login');
         }
         else
         {
           $output['formErrors'] ="true";
           $output['errors'] ="Password Is not update";
         }

      }
           echo json_encode($output);
           exit;
    }

}
