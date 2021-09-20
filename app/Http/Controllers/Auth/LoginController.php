<?php

namespace App\Http\Controllers\Auth;
use App\Model\User;
use App\Model\UserOnline;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Session;
use Curl;
use DB;
use Crypt;
use Auth;
use DateTime;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
     {
         if (auth()->guard('web')->check())
         {
             return redirect('/profile');
         }
         return view('auth.login',['title'=>'Login','description'=>'Login.']);
     }

    public function login(Request $request)
    {
     $rules = array(
       'email'    => 'required|email', // make sure the email is an actual email
       'password' => 'required',
     );

     $validator = Validator::make($request->all() , $rules);
     if ($validator->fails())
     {
       $errors                = $validator->errors();
       $response['success']     = false;
       $response['formErrors']  = true;
       $response['errors']      = $errors;
       return response($response);

     }
     else
     {

       $credentials = ['email' => $request->input('email'), 'password' => $request->input('password'),'type'=>2];
       $web = $request->input('web');
       $authSuccess = Auth::attempt($credentials, $request->has('remember'));
       $user = User::where('email',$request->input('email'))->first();


       if($authSuccess)
        {

         if($web == 'true' )
         {
           Auth::logout();
           $response['formErrors'] = false;
           $response['delayTime']     = '2000';
           $response['errors'] = 'You are not authorized.Please try again.';
           return response($response);
         }
         else if($user->status == 1)
         {
           $id = Auth::user()->id;
           $date = Date('Y-m-d H:i:s');
           $online['userId'] = $id;
           $online['date'] = $date;
           UserOnline::updateOrCreate(array("userId"=>Auth::User()->id),$online);
           $request->session()->regenerate();
           $response['success'] = "true";
           if($user->profileUpdate == 1)
           {
           $response['url'] = url('profile');
           }
           else
           {
             $response['url'] = url('edit-profile');
           }
           $response['delayTime']       = 3000;
           $response['success_message'] = 'Login successfully.';
           return response($response);
         }
         else if($user->status == 0)
         {
           Auth::logout();
               $response['formErrors'] = true;
               $response['delayTime']     = '2000';
               $response['errors'] = 'Kindly Activate Your Account';
               return response($response);
         }
       }
       else
       {
         if($user)
         {
           Auth::logout();
           $response['formErrors'] = true;
           $response['delayTime']     = '2000';
           $response['errors'] = 'Email and password does not match.Please try again.';
           return response($response);
         }
         else
         {
           $response['formErrors'] = true;
           $response['delayTime']     = '2000';
           $response['errors'] = 'Email id does not exists.';
           return response($response);
         }
       }
      }
   }
}
