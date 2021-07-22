<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Customer\ForgotPassword;
use App\Model\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Str;
use Validator;

class AdminController extends Controller
{
    public function loginView(Request $request)
    {
        if (Auth::check() && Auth::user()->type == 1) {
            return redirect('admin/dashboard');
        }
        if (Auth::check() && (Auth::user()->type == 2 )) {
            return redirect('login');
        }

        return view('admin.auth.login');
    }

    public function loginAuthenticate(Request $request)
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

         $credentials = ['email' => $request->input('email'), 'password' => $request->input('password'),'type'=>1];
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
             $request->session()->regenerate();
             $response['success'] = "true";
             $response['url'] = url('admin/dashboard');
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

    public function forgotPasswordView(Request $request)
    {
        return view('admin.auth.forgotpassword');
    }

    public function forgotPassword(Request $request)
    {
        try {
            $email = $request->email;
            $user = User::where('email', $email)->whereIn('role', [1, 2])->first();
            if ($user) {
                $token = Str::random(60);
                $tokenUpdate = User::where('email', $email)->update(['reset_password_token' => $token]);
                if (!$tokenUpdate) {
                    return redirect()->back()->withErrors(['Something went wrong!.Please try again']);
                }
                $data['token'] = $token;
                $data['forgotUrl'] = url('admin/reset-password/'.$token);
                Mail::to($email)->send(new ForgotPassword($data));

                return redirect()->back()->with('success', 'Forgot password link has been sent to your email.');
            } else {
                return redirect()->back()->withErrors(['This email address does not exists!']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function resetPasswordView(Request $request, $token)
    {
        $tokenValid = User::where('reset_password_token', $token)->first();
        if ($tokenValid) {
            return view('admin.auth.reset_password', ['reset_token' => $token]);
        } else {
            $txt = 'This token has expired! Click <a href="'.url('/').'">here</a> to go back.';
            die($txt);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $validations = [
                'password' => 'required|min:8|confirmed',
            ];
            $validator = Validator::make($request->all(), $validations);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $data = [
                'password' => Hash::make($request->password),
                'reset_password_token' => null,
            ];
            \DB::beginTransaction();
            $setPassword = User::where('reset_password_token', $request->reset_token)->update($data);
            if (!$setPassword) {
                \DB::rollback();

                return redirect()->back()->withErrors(['Something went wrong while updating password! Try again later.']);
            }
            \DB::commit();

            return redirect('admin/login')->with('success', 'Password has been updated successfully.');
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
