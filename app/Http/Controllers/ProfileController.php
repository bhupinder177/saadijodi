<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
use Validator;
use Session;
use Curl;
use DB;
use Crypt;
use Auth;
use DateTime;
use Hash;
use App\Helpers\GlobalFunctions as CommonHelper;

class ProfileController extends Controller
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
        $user = User::where('id',Auth::User()->id)->first();
        $detail = UserBasicDetails::with('heightdetail')->where('userId',Auth::User()->id)->first();
        $family = UserFamilyDetails::where('userId',Auth::User()->id)->first();
        $religion = UserReligious::with('religiondetail','communitydetail','motherTonguedetail')->where('userId',Auth::User()->id)->first();
        $education = UserEducations::with('educationdetail','workingAsdetail')->where('userId',Auth::User()->id)->first();
        $contact = UserContactDetails::where('userId',Auth::User()->id)->first();
        $partner = PartnerPreferences::with('countrydetail','statedetail','citydetail','religiondetail','communitydetail','motherTonguedetail','educationdetail','workingAsdetail')->where('userId',Auth::User()->id)->first();
        $location = UserLocations::with('countrydetail','statedetail','citydetail','grewUpdetail')->where('userId',Auth::User()->id)->first();
        $birth = UserBirthDetails::where('userId',Auth::User()->id)->first();
        $images = UserImages::where(array('userId'=>Auth::User()->id,"isProfile"=>0))->get();
        $profileimage = UserImages::where(array('userId'=>Auth::User()->id,"isProfile"=>1))->first();

        if(!empty($detail->dateOfBirth))
        {
          $dateOfBirth = $detail->dateOfBirth;
          $today = date("Y-m-d");
          $diff = date_diff(date_create($dateOfBirth), date_create($today));
          $detail->age = $diff->format('%y');
        }

        // else
        // {
        //  $detail->age = 0;
        // }

        return view('front.profile.profile',['images'=>$images,'profileimage'=>$profileimage,'detail'=>$detail,'birth'=>$birth,'location'=>$location,'user'=>$user,'family'=>$family,'religion'=>$religion,'education'=>$education,'contact'=>$contact,'partner'=>$partner]);
    }

    public function edit()
    {
      $user = User::where('id',Auth::User()->id)->first();
      $detail = UserBasicDetails::where('userId',Auth::User()->id)->first();
      $family = UserFamilyDetails::where('userId',Auth::User()->id)->first();
      $religion = UserReligious::where('userId',Auth::User()->id)->first();
      $education = UserEducations::where('userId',Auth::User()->id)->first();
      $location = UserLocations::where('userId',Auth::User()->id)->first();
      $birth = UserBirthDetails::where('userId',Auth::User()->id)->first();
      $images = UserImages::where(array("userId"=>Auth::User()->id,"isProfile"=>0))->get();
      $profileimage = UserImages::where(array("userId"=>Auth::User()->id,"isProfile"=>1))->first();
      $allreligion = Religion::get();
      $allcommunity = Community::get();
      $allmothertongue = MotherTongue::get();
      $allqualification = Qualification::get();
      $allworkingSectors = WorkingSectors::get();
      $allcountry = Country::get();
      $allheight = Height::get();
      $states = array();
      $city = array();
      if(!empty($location->country))
      {
      $states = States::where('country_id',$location->country)->get();
      }
      if(!empty($location->state))
      {
      $city = Cities::where('state_id',$location->state)->get();
      }


      return view('front.profile.edit-profile',['allqualification'=>$allqualification,'allworkingSectors'=>$allworkingSectors,'states'=>$states,'allheight'=>$allheight,'allmothertongue'=>$allmothertongue,'allcommunity'=>$allcommunity,'allreligion'=>$allreligion,'profileimage'=>$profileimage,'images'=>$images,'birth'=>$birth,'city'=>$city,'allcountry'=>$allcountry,'detail'=>$detail,'location'=>$location,'user'=>$user,'family'=>$family,'religion'=>$religion,'education'=>$education]);
    }

    public function update(Request $request)
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
         if ($request->hasFile('profile'))
         {
           $request->file('data_name');
           $imgRef     = 'profile-'.time();
           $files        = $request->file('profile');
           $name         = $files->getClientOriginalName();
           $extension2    = $files->extension();
           $type         = explode('.',$name);
           $image[] = $name;
           $files->move(public_path().'/profiles/', $imgRef.'.'.$extension2);
           $pro['image'] = $imgRef.'.'.$extension2;
           $pro['userId'] = Auth::User()->id;
           $pro['isProfile'] = 1;
           $fupdate = UserImages::updateOrCreate(array("userId"=>Auth::User()->id,"isProfile"=>1),$pro);

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
         $output['success'] ="true";
         $output['success_message'] ="Profile Updated Successfully";
         $output['delayTime'] = 3000;
         $output['url'] = url('profile');
       }
       else
       {
         $output['formErrors'] ="true";
         $output['errors'] ="Profile Is not update";
       }
       return response($output);
    }

    public function getState(Request $request)
    {
      $validator = Validator::make($request->all(),[
              'countryId' => 'required|string',
          ]);

        if ($validator->fails())
        {
           $errors = $validator->errors();
          $output['validation']     = false;
          $output['errors']      = $errors;
        }
        else
       {
         $result = States::where('country_id',$request->countryId)->get();
         if($result)
           {
             $output['success'] ="true";
             $output['result'] = $result;
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

    public function getCity(Request $request)
    {
      $validator = Validator::make($request->all(),[
              'stateId' => 'required|string',
          ]);

        if ($validator->fails())
        {
           $errors = $validator->errors();
          $output['validation']     = false;
          $output['errors']      = $errors;
        }
        else
       {
         $result = Cities::where('state_id',$request->stateId)->get();
         if($result)
           {
             $output['success'] ="true";
             $output['result'] = $result;
          }
          else
          {
             $output['formErrors'] ="true";
          }
          echo json_encode($output);
          exit;
       }
    }


    public function partnerProfile(Request $request)
    {
      $detail= PartnerPreferences::where('userId',Auth::User()->id)->first();
      $allcountry = Country::get();
      $states = array();
      $city = array();
      $allreligion = Religion::get();
      $allcommunity = Community::get();
      $allmothertongue = MotherTongue::get();
      $allqualification = Qualification::get();
      $allworkingSectors = WorkingSectors::get();
      $allheight = Height::get();
      if(!empty($detail->country))
      {
      $states = States::where('country_id',$detail->country)->get();
      $city = Cities::where('state_id',$detail->state)->get();
      }
      return view('front.profile.partner-profile',['allqualification'=>$allqualification,'allworkingSectors'=>$allworkingSectors,'states'=>$states,'allheight'=>$allheight,'allmothertongue'=>$allmothertongue,'allcommunity'=>$allcommunity,'allreligion'=>$allreligion,'detail'=>$detail,'states'=>$states,'city'=>$city,'allcountry'=>$allcountry]);
    }

    public function contactdetails(Request $request)
    {
      $detail = UserContactDetails::where('userId',Auth::User()->id)->first();
      return view('front.profile.contact-detail',['detail'=>$detail]);
    }

    public function contactDetailUpdate(Request $request)
    {
      $detail['mobile'] = $request->mobile;
      $detail['nameContactPerson'] = $request->nameContactPerson;
      $detail['relationWithMember'] = $request->relationWithMember;


     $cupdate =  UserContactDetails::updateOrCreate(array("userId"=>Auth::User()->id),$detail);

    if($cupdate)
    {
      $output['success'] ="true";
      $output['success_message'] ="Contact Details Updated Successfully";
      $output['delayTime'] = 3000;
      $output['url'] = url('profile');
    }
    else
    {
      $output['formErrors'] ="true";
      $output['errors'] ="Contact details is not update";
    }
    return response($output);

    }

    public function partnerPreferenceUpdate(Request $request)
    {
      $data['country'] = $request->country;
      $data['state'] = $request->state;
      $data['city'] = $request->city;
      $data['maritalStatus'] = $request->maritalStatus;
      $data['diet'] = $request->diet;
      $data['highestQualification'] = $request->highestQualification;
      $data['workingWith'] = $request->workingWith;
      $data['income'] = $request->income;
      $data['religion'] = $request->religion;
      $data['motherTongue'] = $request->motherTongue;
      $data['community'] = $request->community;
      $data['ageMin'] = $request->ageMin;
      $data['ageMax'] = $request->ageMax;

     $update =  PartnerPreferences::updateOrCreate(array("userId"=>Auth::User()->id),$data);

    if($update)
    {
      $output['success'] ="true";
      $output['success_message'] ="Partner Profile Updated Successfully";
      $output['delayTime'] = 3000;
      $output['url'] = url('profile');
    }
    else
    {
      $output['formErrors'] ="true";
      $output['errors'] ="Partner Profile Is not update";
    }
     return response($output);
    }

    public function deleteImages(Request $request)
    {
     $update =  UserImages::where(array("id"=>$request->id))->delete();
      if($update)
      {
       $output['success'] ="true";
      }
      else
      {
       $output['formErrors'] ="true";
      }
     return response($output);
    }

    public function userProfile($id)
    {
      $phoneshowing = 0;
      $selected = UserPackage::where(array('userId'=>Auth::User()->id,"status"=>1))->orderby('id','desc')->first();
      if(!empty($selected) && $selected->phoneNumberDisplay == 1)
      {
        $phoneshowing = 1;
      }
      $user = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious')->where('uniqueId',$id)->first();
      return view('front.userprofile.userProfile',['user'=>$user,'phoneshowing'=>$phoneshowing]);
    }

    public function notification()
    {
      $notification = Notification::with(['userdetail'=>function($q){
        $q->select('id','firstName','lastName','uniqueId');
      }])->where('notificationTo',Auth::User()->id)->orderBy('id','desc')->paginate(10);

      Notification::where('notificationTo',Auth::User()->id)->update(array("read"=>1));

      return view('front.notification.notification',['notification'=>$notification]);
    }

    public function online(Request $request)
    {
      try{

         if(!empty(Auth::user()->id))
         {
         $id = Auth::user()->id;
         $date = Date('Y-m-d H:i:s');

           $online['userId'] = $id;
           $online['date'] = $date;
           $res =  UserOnline::updateOrCreate(array("userId"=>Auth::User()->id),$online);

        }

       if($res)
       {
         $response['success']         = true;
         return response($response);
       }
       else
        {
         $response['formErrors'] = true;
         return response($response);
         }
       }
       catch(\Exception $e)
        {
         $response['errors'] = $e->getMessage();
         $response['formErrors'] = "true";
         return response($response);
        }
    }

    public function inviteSend(Request $request)
    {
       try{

           $this->prefix = request()->route()->getPrefix();
           $date = date("Y-m-d");
           if(!empty(Auth::user()->id))
           {
             $package = UserPackage::where(array('userId'=>Auth::User()->id,"status"=>1))->whereDate('packageEnd','>',$date)->orderBy('id','desc')->first();
             if(!empty($package) && $package->connects != 0)
             {
           $id = Auth::user()->id;
           $date = Date('Y-m-d H:i:s');


             $msg = "You have received invitation";
             $n = new Notification([
                  'notificationTo' =>$request->id,
                  'notificationFrom' =>$id,
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
                 'userId'=>$id,
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
               $from = User::where('id',$id)->first();
               $user = User::where('id',$request->id)->first();
               $mailData = array('name'=>$user->firstName,'from'=>$from->firstName);
               $emailresult = CommonHelper::sendmail('Saadijodii@gmail.com', 'Sadi jodi', $user->email,$user->firstName, 'Invitation' , ['data'=>$mailData], 'emails.notification','',$attachment=null);
             }

             if($res)
             {
               $response['success']= true;
               $response['success_message']= "Invitation Sent Successfully";

               return response($response);
             }
             else
              {
               $response['formErrors'] = true;
               $response['errors']= "invitation not Send";
               return response($response);
               }

          }
         else
         {
           $response['success']= false;

           return response($response);
          }
         }
       }
         catch(\Exception $e)
          {
           $response['errors'] = $e->getMessage();
           $response['formErrors'] = "true";
           return response($response);
          }
    }

    public function notificationUpdate(Request $request)
    {
      try{

         $date = Date('Y-m-d H:i:s');
         $nupdate = Notification::where('id',$request->id)->update(array("status"=>$request->status));
         if($nupdate)
         {
           if($request->status == 1)
           {
           $msg = "Your invitation has been accepted";
           }
           else
           {
             $msg = "Your invitation has been rejected";
           }
           $notify = Notification::where('id',$request->id)->first();
           $n = new Notification([
                'notificationTo' =>$notify->notificationFrom,
                'notificationFrom' =>$notify->notificationTo,
                'notificationMessage' =>$msg,
                'type' =>2,
                'date' =>$date,
                'status'=>0,
                'read'=>0,
            ]);

           $res =  $n->save();
         }

         if($res)
         {
           $from = User::where('id',$notify->notificationTo)->first();
           $user = User::where('id',$notify->notificationFrom)->first();
           $mailData = array('name'=>$user->firstName,'from'=>$from->firstName,'status'=>$request->status);
           $emailresult = CommonHelper::sendmail('Saadijodii@gmail.com', 'Sadi jodi', $user->email,$user->firstName, 'Invitation' , ['data'=>$mailData], 'emails.notificationStatus','',$attachment=null);
         }

       if($res)
       {
         $response['success']= true;
         $response['success_message']= "Notification Updated Successfully";

         return response($response);
       }
       else
        {
         $response['formErrors'] = true;
         $response['errors']= "Notification not Update";
         return response($response);
         }
       }
       catch(\Exception $e)
        {
         $response['errors'] = $e->getMessage();
         $response['formErrors'] = "true";
         return response($response);
        }
    }

    public function changePassword()
    {
      return view('front.password.password');
    }

    public function changePasswordSubmit(Request $request)
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

        $id = Auth::user()->id;
        $updated_password =  bcrypt($request->password);
        $current_password =  bcrypt($request->currentpassword);
        $user = User::where('id',$id)->first();

        if(Hash::check($request->currentpassword,$user->password))
        {
         $result = User::where('id',$id)->update(['password' => $updated_password]);

       if($result)
        {
          $output['success'] ="true";
          $output['success_message'] ="Password Updated Successfully";
          $output['delayTime'] = 3000;
          $output['resetform'] ='true';
        }
        else
        {
          $output['formErrors'] ="true";
          $output['errors'] ="Password Is not update";
        }
      }
      else
      {
        $output['formErrors'] ="true";
        $output['errors'] ="Current Password does not matched";
      }

     }
          echo json_encode($output);
          exit;
    }


}
