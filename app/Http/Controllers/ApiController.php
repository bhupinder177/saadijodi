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
use App\Model\UserLocations;
use App\Model\Country;
use App\Model\States;
use App\Model\Cities;
use App\Model\UserContactDetails;
use App\Model\PartnerPreferences;
use App\Model\UserBirthDetails;
use App\Model\UserImages;
use App\Model\Notification;
use App\Model\UserOnline;
use App\Model\UserPackage;
use App\Model\UserConnects;
use App\Model\Religion;
use App\Model\Community;
use App\Model\MotherTongue;
use App\Model\Height;
use App\Model\Qualification;
use App\Model\WorkingSectors;
use App\Model\Favourite;
use App\Model\Package;
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
      try{
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
   catch(\Exception $e)
    {
      return response()->json([
        "success"=>"false",
        'message'=>$e->getMessage(),
       ]);
     }
    }


    public function login(Request $request)
    {
        try{
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
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
       try{
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function changePassword(Request $request)
    {
       try{
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
         catch(\Exception $e)
          {
            return response()->json([
              "success"=>"false",
              'message'=>$e->getMessage(),
             ]);
           }
    }

    public function toDayMatchListing(Request $request)
    {
      // try
      // {
      $page= $request['page'];
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

      if($request->type == 1)
      {
      $query = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->whereHas('UserBasicDetail',function($w)use($gender){
        $w->where('gender',$gender);
      });

      $user = $query->orderby('id','desc')->paginate($pageCount,['*'],'page',$page);
      }
      else if($request->type == 2)
      {
        $query = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->whereHas('UserBasicDetail',function($w)use($gender){
          $w->where('gender',$gender);
        });

        $user = $query->orderby('id','desc')->paginate($pageCount,['*'],'page',$page);
      }
      else if($request->type == 3)
      {
        $query = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->whereHas('UserBasicDetail',function($w)use($gender){
          $w->where('gender',$gender);
        });

        $user = $query->orderby('id','desc')->paginate($pageCount,['*'],'page',$page);
      }


      // if(!empty($request->religion))
      // {
      //   $relation = $request->religion;
      //   $query->WhereHas('UserReligious',function($query) use($relation){
      //     $query->where('religion',$relation);
      //   });
      // }

      // if(!empty($request->firstName))
      // {
      //     $query->where('firstName', 'like', '%' . $request->firstName . '%');
      // }
      // if(!empty($request->lastName))
      // {
      //     $query->where('lastName', 'like', '%' . $request->lastName . '%');
      // }
      // if(!empty($request->age))
      // {
      //   $relation = $request->age;
      //      $y = Date('Y') - $request->age;
      //   $query->WhereHas('UserBasicDetail',function($query) use($y){
      //     $query->whereYear('dateOfBirth',$y);
      //   });
      // }


      $user = $user->toArray();

      if(count($user['data']) > 0)
      {
        foreach($user['data'] as $k=>$us)
        {
          $favourite  = Favourite::where(array("userId"=>$request->user()->id,"favoriteUserId"=>$us['id']))->first();
          if(!empty($favourite))
          {
            $user['data'][$k]['favorite'] = true;
          }
          else
          {
            $user['data'][$k]['favorite'] = false;
          }
          if(!empty($us['user_image']))
          {
            foreach($us['user_image'] as $k1=>$u)
            {
              $image = url("profiles/".$u['image']);
              $user['data'][$k]['user_image'][$k1]['image'] = $image;
            }
          }
        }
      }

      if(count($user) > 0)
       {
         $output['success'] ="true";
         $output['message'] ="listing";
         $output['result'] = $user;
       }
       else
       {
         $output['success'] ="true";
         $output['message'] ="No record found";
       }
       echo json_encode($output);
       exit;
     // }
     // catch(\Exception $e)
     //  {
     //    return response()->json([
     //      "success"=>"false",
     //      'message'=>$e->getMessage(),
     //     ]);
     //   }
    }

    public function profileDetail(Request $request)
    {
      try{
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
      $user = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->where('id',$request->userId)->first();
      $user = $user->toArray();

      if(count($user['data']) > 0)
      {
        foreach($user['data'] as $k=>$us)
        {
          if(!empty($us['user_image']))
          {
            foreach($us['user_image'] as $k1=>$u)
            {
              $image = url("profiles/".$u['image']);
              $user['data'][$k]['user_image'][$k1]['image'] = $image;
            }
          }
        }
      }

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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function connectSave(Request $request)
    {
      try{
        $package = UserPackage::where(array('userId'=>$request->user()->id,"status"=>1))->first();
        if(!empty($package) && $package->connects != 0)
        {
           $id = Auth::user()->id;
           $date = Date('Y-m-d H:i:s');
            $msg = "You have received invitation";
            $n = new Notification([
                 'notificationTo' =>$request->id,
                 'notificationFrom' =>$request->user()->id,
                 'notificationMessage' =>$msg,
                 'type' =>1,
                 'date' =>$date,
                 'status'=>0,
                 'read'=>0,
             ]);

            $res =  $n->save();

            if($res)
            {
              $connects = new UserConnects([
                'userId'=>$request->user()->id,
                'sendTo'=>$request->id,
                'connects'=>1,
                'status'=>1,
              ]);
              $connects->save();
            }
            if($res)
            {
             $conn =  $package->connects - 1;
             if($conn != 0)
             {
              UserPackage::where(array('id'=>$package->id))->update(array("connects"=>$conn));
             }
             else if($conn == 0)
             {
               UserPackage::where(array('id'=>$package->id))->update(array("status"=>0));
             }
            }
            if($res)
            {
              $response['success']= true;
              $response['message']= "Connect Sent Successfully";

              return response($response);
            }
            else
             {
              $response['formErrors'] = true;
              $response['message']= "Connect not Send";
              return response($response);
              }
         }
        else
        {
          $response['success']= false;
          $response['message']= "package not Available";
          return response($response);
         }
       }
       catch(\Exception $e)
        {
          return response()->json([
            "success"=>"false",
            'message'=>$e->getMessage(),
           ]);
         }

    }

    public function getPackage(Request $request)
    {
      try{
      $user = Package::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get package";
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function allreligion(Request $request)
    {
      try{
      $user = Religion::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get religion";
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }

    }

    public function allcommunity(Request $request)
    {
      try{
      $user = Community::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get community";
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function allmothertongue(Request $request)
    {
      try{
      $user = MotherTongue::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get mother tongue";
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function allheight(Request $request)
    {
      try{
      $user = Height::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get height";
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
     catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function allqualification(Request $request)
    {
      try{
      $user = Qualification::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get Qualification";
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
     catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function allWorkingSectors(Request $request)
    {
      try{
      $user = WorkingSectors::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get working sector";
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
     catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function allCountry(Request $request)
    {
      try{
      $user = Country::get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get Country";
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
      }
    }

    public function getState(Request $request)
    {
      try{
      $user = States::where('country_id',$request->id)->get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get state";
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
    catch(\Exception $e)
     {
       return response()->json([
         "success"=>"false",
         'message'=>$e->getMessage(),
        ]);
     }
    }

    public function getCity(Request $request)
    {
      try{
      $user = Cities::where('state_id',$request->id)->get();

      if($user)
       {
         $output['success'] ="true";
         $output['message'] ="get city";
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
     catch(\Exception $e)
      {
        return response()->json([
          "success"=>"false",
          'message'=>$e->getMessage(),
         ]);
      }


    }


    public function favouriteSave(Request $request)
    {
      try{
      $validator = Validator::make($request->all(),[
              'userId' => 'required',
          ]);
          if ($validator->fails())
          {
            return response()->json(['success'=>'false','error'=>$validator->errors()]);
          }
          else
         {
          $check = Favourite::where(array("userId"=>$request->user()->id,"favoriteUserId"=>$request->userId))->first();
          if(!$check)
          {
          $user = new Favourite([
               'userId' =>$request->user()->id,
               'favoriteUserId' =>$request->userId,
           ]);

          $res =  $user->save();
         if($res)
         {
           return response()->json([
            "success"=>"true",
            'message' => 'User Added in favourite list'
            ]);
         }
         else
         {
           return response()->json([
             "success"=>"false",
             'message' => 'User is not add in favorite list'
            ]);
           }
         }
         else
         {
           $res = Favourite::where(array("userId"=>$request->user()->id,"favoriteUserId"=>$request->userId))->delete();

            return response()->json([
             "success"=>"true",
             'message' => 'User Removed from favourite list'
             ]);

           }
        }
      }
      catch(\Exception $e)
       {
         return response()->json([
           "success"=>"false",
           'message'=>$e->getMessage(),
          ]);
       }
    }

    public function favouriteList(Request $request)
    {
      try
      {
      $page= $request['page'];
     	$pageCount = 10;


    $user=Favourite::with('userdetail','userdetail.UserBasicDetail','userdetail.UserBasicDetail.heightdetail','userdetail.UserBirthDetail','userdetail.UserContactDetail','userdetail.UserEducation','userdetail.UserEducation.educationdetail','userdetail.UserEducation.workingAsdetail','userdetail.UserFamilyDetail','userdetail.UserImage','userdetail.UserLocation','userdetail.UserReligious','userdetail.UserReligious.religiondetail','userdetail.UserReligious.communitydetail','userdetail.UserReligious.motherTonguedetail')->where('userId',$request->user()->id)->paginate($pageCount,['*'],'page',$page);


    $user = $user->toArray();

    if(count($user['data']) > 0)
    {
      foreach($user['data'] as $k=>$us)
      {
        if(!empty($us['user_image']))
        {
          foreach($us['user_image'] as $k1=>$u)
          {
            $image = url("profiles/".$u['image']);
            $user['data'][$k]['user_image'][$k1]['image'] = $image;
          }
        }
      }
    }

      if(count($user) > 0)
       {
         $output['success'] ="true";
         $output['message'] ="Favoruite  listing";
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
     catch(\Exception $e)
      {
        return response()->json([
          "success"=>"false",
          'message'=>$e->getMessage(),
         ]);
      }

    }

    public function favouriteRemove(Request $request)
    {
      try{
      $validator = Validator::make($request->all(),[
              'userId' => 'required',
          ]);
          if ($validator->fails())
          {
            return response()->json(['success'=>'false','error'=>$validator->errors()]);
          }
          else
         {
          $res = Favourite::where(array("userId"=>$request->user()->id,"favoriteUserId"=>$request->userId))->delete();

         if($res)
         {
           return response()->json([
            "success"=>"true",
            'message' => 'User Removed from favourite list'
            ]);
         }
         else
        {
           return response()->json([
             "success"=>"false",
             'message' => 'User does not remove from favorite list'
            ]);
          }
        }
      }
      catch(\Exception $e)
       {
         return response()->json([
           "success"=>"false",
           'message'=>$e->getMessage(),
          ]);
       }
    }

    public function getContactDetail(Request $request)
    {
      try{
          $res =  UserContactDetails::where('userId',$request->user()->id)->first();
         if($res)
         {
           return response()->json([
            "success"=>"true",
            'message' => 'contact detail',
            'result'=>$res,
            ]);
         }
         else
        {
           return response()->json([
             "success"=>"false",
             'message' => 'no data'
            ]);
          }
        }
        catch(\Exception $e)
         {
           return response()->json([
             "success"=>"false",
             'message'=>$e->getMessage(),
            ]);
         }
    }

    public function ContactDetailsSave(Request $request)
    {
      try{
      $validator = Validator::make($request->all(),[
              'mobile' => 'required',
              'nameContactPerson' => 'required',
              'relationWithMember' => 'required',
          ]);
          if ($validator->fails())
          {
            return response()->json(['success'=>'false','error'=>$validator->errors()]);
          }
          else
         {
          $user = new UserContactDetails([
               'userId' =>$request->user()->id,
               'relationWithMember' =>$request->relationWithMember,
               'nameContactPerson' =>$request->nameContactPerson,
               'mobile' =>$request->mobile,
           ]);

          $res =  $user->save();
         if($res)
         {
           return response()->json([
            "success"=>"true",
            'message' => 'Contact details saved successfully'
            ]);
         }
         else
        {
           return response()->json([
             "success"=>"false",
             'message' => 'Contact details not save'
            ]);
          }
        }
      }
      catch(\Exception $e)
       {
         return response()->json([
           "success"=>"false",
           'message'=>$e->getMessage(),
          ]);
       }
    }

    public function getPartnerPerference(Request $request)
    {
      try{
         $result = PartnerPreferences::with('countrydetail','statedetail','citydetail','religiondetail','communitydetail','motherTonguedetail','educationdetail','workingAsdetail')->where('userId',$request->user()->id)->first();

         if($result)
        {
         return response()->json([
          "success"=>"true",
          'message' => 'partner preference',
           'result'=>$result,
           ]);
         }
        else
        {
          return response()->json([
           "success"=>"false",
           'message' => 'no data'
            ]);
          }
        }
        catch(\Exception $e)
         {
           return response()->json([
             "success"=>"false",
             'message'=>$e->getMessage(),
            ]);
         }
    }

    public function partnerPerferenceSave(Request $request)
    {
      try{
      $validator = Validator::make($request->all(),[
              'maritalStatus' => 'required',
              'country' => 'required',
              'state' => 'required',
              'city' => 'required',
          ]);
          if ($validator->fails())
          {
            return response()->json(['success'=>'false','error'=>$validator->errors()]);
          }
          else
         {
          $user = new PartnerPreferences([
               'userId' =>$request->user()->id,
               'maritalStatus' =>$request->maritalStatus,
               'country' =>$request->country,
               'state' =>$request->state,
               'city' =>$request->city,
               'highestQualification' =>$request->highestQualification,
               'workingWith' =>$request->workingWith,
               'income' =>$request->income,
               'diet' =>$request->diet,
               'religion' =>$request->religion,
               'community' =>$request->community,
               'motherTongue' =>$request->motherTongue,
           ]);

          $res =  $user->save();
         if($res)
         {
           return response()->json([
            "success"=>"true",
            'message' => 'Partner Perference saved successfully'
            ]);
         }
         else
        {
           return response()->json([
             "success"=>"false",
             'message' => 'Partner Perference not save'
            ]);
          }
        }
      }
      catch(\Exception $e)
       {
         return response()->json([
           "success"=>"false",
           'message'=>$e->getMessage(),
          ]);
       }
    }

    public function listingFilter(Request $request)
    {
      try
      {
      $page= $request['page'];
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

      $query = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->whereHas('UserBasicDetail',function($w)use($gender){
        $w->where('gender',$gender);
      });

      if(!empty($request->religion))
      {
        $relation = $request->religion;
        $query->WhereHas('UserReligious',function($query) use($relation){
          $query->whereIn('religion',$relation);
        });
      }

      if(!empty($request->community))
      {
        $community = $request->community;
        $query->WhereHas('UserReligious',function($query) use($community){
          $query->whereIn('community',$community);
        });
      }

      if(!empty($request->motherTongue))
      {
        $motherTongue = $request->motherTongue;
        $query->WhereHas('UserReligious',function($query) use($motherTongue){
          $query->whereIn('motherTongue',$motherTongue);
        });
      }

      if(!empty($request->workingSector))
      {
        $workingSector = $request->workingSector;
        $query->WhereHas('UserEducation',function($query) use($workingSector){
          $query->whereIn('workingAs',$workingSector);
        });
      }

      if(!empty($request->country))
      {
        $country = $request->country;
        $query->WhereHas('UserLocation',function($query) use($country){
          $query->whereIn('country',$country);
        });
      }

      if(!empty($request->state))
      {
        $state = $request->state;
        $query->WhereHas('UserLocation',function($query) use($state){
          $query->whereIn('state',$state);
        });
      }

      if(!empty($request->city))
      {
        $city = $request->city;
        $query->WhereHas('UserLocation',function($query) use($city){
          $query->whereIn('city',$city);
        });
      }

      if(!empty($request->firstName))
      {
          $query->where('firstName', 'like', '%' . $request->firstName . '%');
      }
      if(!empty($request->lastName))
      {
          $query->where('lastName', 'like', '%' . $request->lastName . '%');
      }

      if(!empty($request->age))
      {
        $relation = $request->age;
           $y = Date('Y') - $request->age;
        $query->WhereHas('UserBasicDetail',function($query) use($y){
          $query->whereYear('dateOfBirth',$y);
        });
      }

      $user = $query->orderby('id','desc')->paginate($pageCount,['*'],'page',$page);
      $user = $user->toArray();

      if(count($user['data']) > 0)
      {
        foreach($user['data'] as $k=>$us)
        {
          $favourite  = Favourite::where(array("userId"=>$request->user()->id,"favoriteUserId"=>$us['id']))->first();
          if(!empty($favourite))
          {
            $user['data'][$k]['favorite'] = true;
          }
          else
          {
            $user['data'][$k]['favorite'] = false;
          }

          if(!empty($us['user_image']))
          {
            foreach($us['user_image'] as $k1=>$u)
            {
              $image = url("profiles/".$u['image']);
              $user['data'][$k]['user_image'][$k1]['image'] = $image;
            }
          }
        }
      }

      if(count($user) > 0)
       {
         $output['success'] ="true";
         $output['message'] ="filter listing";
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
     catch(\Exception $e)
      {
        return response()->json([
          "success"=>"false",
          'message'=>$e->getMessage(),
         ]);
       }
    }

    public function getOurProfile(Request $request)
    {
      try{

        $id = $request->user()->id;
        $user = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->where('id',$id)->first();
        $user = $user->toArray();




            if(!empty($user['user_image']))
            {
              foreach($user['user_image'] as $k1=>$u)
              {
                $image = url("profiles/".$u['image']);
                $user['user_image'][$k1]['image'] = $image;
              }
            }


         if($user)
         {
           return response()->json([
            "success"=>"true",
            'result' => $user
            ]);
         }
         else
        {
           return response()->json([
             "success"=>"false",
             'result' => ''
            ]);
          }
      }
      catch(\Exception $e)
       {
         return response()->json([
           "success"=>"false",
           'message'=>$e->getMessage(),
          ]);
       }
    }

    public function profileUpdate(Request $request)
    {
      $detail['height'] = $request->height;
      $detail['maritalStatus'] = $request->maritalStatus;
      $detail['profilecreatedby'] = $request->profilecreatedby;
      $detail['gender'] = $request->gender;
      $detail['diet'] = $request->diet;
      $detail['about'] = $request->about;
      $detail['bloodGroup'] = $request->bloodGroup;
      $detail['dateOfBirth'] = date("Y-m-d", strtotime($request->dateOfBirth));
       User::where(array("id"=>Auth::User()->id))->update(array("profileUpdate"=>1));
      $res = UserBasicDetails::updateOrCreate(array("userId"=>Auth::User()->id),$detail);
      if($res)
      {
        if($files=$request->file('images'))
        {
          foreach($files as $k=>$file)
          {
            if(!empty($request->images[$k]))
            {
             $file = $request->images[$k];
             $nameimg = 'profile-'.time().rand(100,999).'.'.$file->extension();
             $file->move(public_path().'/profiles/', $nameimg);
              $img = new UserImages([
                'userId' =>Auth::User()->id,
                'image' =>$nameimg,
                'isProfile'=>0,
              ]);
              $imagesUpdate =  $img->save();
              }
           }
         }
      }

      if($res)
      {
        if (!empty($request->profile))
        {
            if (preg_match('/^(?:[data]{4}:(text|image|application)\/[a-z]*)/', $request->profile))
            {
              $folderPath = public_path().'/profiles/';
              $image_parts = explode(";base64,", $request->profile);
              $image_type_aux = explode("image/", $image_parts[0]);
              $image_type = $image_type_aux[1];
              $image_base64 = base64_decode($image_parts[1]);
              $file = time().uniqid() . '.'.$image_type;
              $file1 = $folderPath .$file;
              file_put_contents($file1, $image_base64);
              $pro['image'] = $file;
              $pro['userId'] = Auth::User()->id;
              $pro['isProfile'] = 1;
              $fupdate = UserImages::updateOrCreate(array("userId"=>Auth::User()->id,"isProfile"=>1),$pro);
            }
        }
      }

      if($res)
      {
        $family['fatherStatus'] = $request->fatherStatus;
        $family['motherStatus'] = $request->motherStatus;
        $family['familyLocation'] = $request->familyLocation;
        $family['nativePlace'] = $request->nativePlace;
        $family['sibling'] = $request->sibling;
        $family['familyType'] = $request->familyType;
        $fupdate = UserFamilyDetails::updateOrCreate(array("userId"=>Auth::User()->id),$family);
      }
      if($fupdate)
      {
        $education['highestQualification'] = $request->highestQualification;
        $education['workingWith'] = $request->workingWith;
        $education['workingAs'] = $request->workingAs;
        $education['employerName'] = $request->employerName;
        $education['income'] = $request->income;
        $eupdate = UserEducations::updateOrCreate(array("userId"=>Auth::User()->id),$education);
      }
      if($eupdate)
      {
       $religion['religion'] = $request->religion;
       $religion['motherTongue'] = $request->motherTongue;
       $religion['community'] = $request->community;
       $religion['subCommunity'] = $request->subCommunity;
       $rupdate = UserReligious::updateOrCreate(array("userId"=>Auth::User()->id),$religion);
      }
      if($rupdate)
      {
        $location['country'] = $request->country;
        $location['state'] = $request->state;
        $location['city'] = $request->city;
        $location['pincode'] = $request->pincode;
        $location['grewUp'] = $request->grewUp;
       $locationupdate =  UserLocations::updateOrCreate(array("userId"=>Auth::User()->id),$location);
      }
      if($locationupdate)
      {
        $b['birthCountry'] = $request->birthCountry;
        $b['birthCity'] = $request->birthCity;
        $b['manglik'] = $request->manglik;
        $b['birthHours'] = $request->birthHours;
        $b['birthminute'] = $request->birthminute;
        $b['birthAmPm'] = $request->birthAmPm;
       $updatebirth = UserBirthDetails::updateOrCreate(array("userId"=>Auth::User()->id),$b);
      }
      if($res)
      {
        return response()->json([
         "success"=>"true",
         'message' =>'Profile Updated Successfully'
         ]);
      }
      else
      {
        return response()->json([
         "success"=>"false",
         'message' =>'Profile Is not update'
         ]);
      }
    }




}
