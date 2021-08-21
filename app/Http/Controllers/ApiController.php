<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Model\User;
use App\Model\UserBasicDetails;
use App\Model\UserFamilyDetails;
use App\Model\UserEducations;
use App\Model\UserReligious;
use App\Helpers\GlobalFunctions as CommonHelper;
use Validator;
use DB;
use Illuminate\Support\Facades\URL;
use Crypt;
use Hash;


class ApiController extends Controller
{

    public function signup(Request $request)
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
            return response()->json(['success'=>'false','error'=>$validator->errors()]);
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
             $emailresult = CommonHelper::sendmail('Saadijodii@gmail.com', 'Saadi jodi', $request->email,$request->firstName, 'Email verification' , ['data'=>$mailData], 'emails.verification','',$attachment=null);
           }
        if($res)
        {
        return response()->json([
            "success"=>"true",
            'message' => 'Registered Successfully.Kindly check your Email and activate your account'
        ]);
       }
       else
       {
         return response()->json([
             "success"=>"false",
             'message' => 'User is not created'
         ]);
       }
     }
    }


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        if ($validator->fails())
        {
          return response()->json(['success'=>'false','error'=>$validator->errors()]);
        }
        else
       {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        {
            return response()->json([
               "success"=>"false",
                'message' => 'Invalid email and Password'
            ]);
       }
       else
       {
        $user = $request->user();
        if($user->status == 1)
        {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
          $token->save();

        return response()->json([
            'success'=> "true",
            "message"=>"Login Successfully",
            "result"=>$user,
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
         }
         else
         {
           return response()->json([
              "success"=>"false",
               'message' => 'Please verify the email -'.$user->email. ' to activate your account',
           ]);
         }
        }
      }
    }


    public function logout(Request $request)
    {

      $request->user()->token()->revoke();


        return response()->json([
            'success'=>'true',
            'message' => 'Logout Successfully'
        ]);
    }


    public function user(Request $request)
    {
        return response()->json($request->user());
    }


    public function forgetPassword(Request $request)
    {
       $validator = Validator::make($request->all(), [
       'email' => 'required|string'
       ]);
      if ($validator->fails())
      {
        return response()->json(['error'=>$validator->errors()], 401);
      }
      else
     {
       $user = User::where('email',$request->email)->first();
       if(!empty($user))
       {
       $emailcrypt = Crypt::encryptString($request->email);
       User::where('email',$request->email)->update(['forgotPasswordExpired' =>1]);

       $mailData = array('link'=>URL::to('/forgotPassword-verifiy?email='.$emailcrypt),'name'=>$user->firstName);

        $emailresult = CommonHelper::sendmail('Saadijodii@gmail.com', 'Saddi Jodi', $request->email,$user->firstName, 'Reset Password' , ['data'=>$mailData], 'emails.forgotpassword','',$attachment=null);

         if($emailresult)
         {
            return response()->json([
            'success'=>"true",
            'message' => 'Email sent successfully'
        ]);

         }
          else
           {
            return response()->json([
                'success'=>"false",
                'message' => 'email is not send'
            ]);
           }
       }
       else
        {
         return response()->json([
            'success'=>"false",
            'message' => 'Email is Not Exist'
          ]);
       }
      }
    }

    public function changePassword(Request $request)
    {
      $validator = Validator::make($request->all(),[
              'currentpassword' => 'required|string',
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

         $id = $request->user()->id;
         $updated_password =  bcrypt($request->password);
         $current_password =  bcrypt($request->currentpassword);
         $user = User::where('id',$id)->first();

         if(Hash::check($request->currentpassword,$user->password))
         {
          $result = User::where('id',$id)->update(['password' => $updated_password]);

        if($result)
         {
           $output['success'] ="true";
           $output['message'] ="Password Updated Successfully";

         }
         else
         {
           $output['success'] ="true";
           $output['message'] ="Password is not update";
         }
       }
       else
       {
         $output['success'] ="false";
         $output['message'] ="Current Password does not matched";
       }

      }
           echo json_encode($output);
           exit;
    }

    public function toDayMatchListing(Request $request)
    {
      $page=$request['page'];
     	$pageCount = 10;
      $gender = UserBasicDetails::where('userId',$request->user()->id)->first();

      if($gender->gender == 1)
      {
        $gender = 2;
      }
      else if($gender->gender == 2)
      {
         $gender = 1;
      }

      $query = User::with('UserBasicDetail','UserBirthDetail','UserContactDetail','UserEducation','UserFamilyDetail','UserImage','UserLocation','UserReligious')->whereHas('UserBasicDetail',function($w)use($gender){
        $w->where('gender',$gender);
      });

      $user = $query->orderby('id','desc')->paginate($pageCount,['*'],'page',$page);

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="today match listing";
         $output['result'] = $user;
       }
       else
       {
         $output['success'] ="true";
         $output['message'] ="No record found";
       }
       echo json_encode($output);
       exit;
    }

    public function profileDetail(Request $request)
    {
      $validator = Validator::make($request->all(),[
              'userId' => 'required|string',

          ]);

        if ($validator->fails())
        {
           $errors = $validator->errors();
          $output['validation']     = false;
          $output['errors']      = $errors;
        }
        else
       {
      $user = User::with('UserBasicDetail','UserBirthDetail','UserContactDetail','UserEducation','UserFamilyDetail','UserImage','UserLocation','UserReligious')->where('id',$request->userId)->first();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get profile details";
         $output['result'] = $user;
       }
       else
       {
         $output['success'] ="true";
         $output['message'] ="No record found";
       }
      }
      echo json_encode($output);
      exit;
    }





}
