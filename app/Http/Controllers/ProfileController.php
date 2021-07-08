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
use Validator;
use Session;
use Curl;
use DB;
use Crypt;
use Auth;
use DateTime;

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
        $detail = UserBasicDetails::where('userId',Auth::User()->id)->first();
        $family = UserFamilyDetails::where('userId',Auth::User()->id)->first();
        $religion = UserReligious::where('userId',Auth::User()->id)->first();
        $education = UserEducations::where('userId',Auth::User()->id)->first();
        $contact = UserContactDetails::where('userId',Auth::User()->id)->first();
        $partner = PartnerPreferences::where('userId',Auth::User()->id)->first();

        return view('front.profile.profile',['detail'=>$detail,'user'=>$user,'family'=>$family,'religion'=>$religion,'education'=>$education,'contact'=>$contact,'partner'=>$partner]);
    }

    public function edit()
    {
      $user = User::where('id',Auth::User()->id)->first();
      $detail = UserBasicDetails::where('userId',Auth::User()->id)->first();
      $family = UserFamilyDetails::where('userId',Auth::User()->id)->first();
      $religion = UserReligious::where('userId',Auth::User()->id)->first();
      $education = UserEducations::where('userId',Auth::User()->id)->first();
      $location = UserLocations::where('userId',Auth::User()->id)->first();
      $allcountry = Country::get();
      $states = array();
      $city = array();
      if(!empty($location))
      {
      $states = States::where('country_id',$location->country)->get();
      $city = Cities::where('state_id',$location->state)->get();
      }

      return view('front.profile.edit-profile',['states'=>$states,'city'=>$city,'allcountry'=>$allcountry,'detail'=>$detail,'location'=>$location,'user'=>$user,'family'=>$family,'religion'=>$religion,'education'=>$education]);
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

       $res = UserBasicDetails::updateOrCreate(array("userId"=>Auth::User()->id),$detail);
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
        $locationupdate =  UserLocations::updateOrCreate(array("userId"=>Auth::User()->id),$location);
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
      if(!empty($detail->country))
      {
      $states = States::where('country_id',$detail->country)->get();
      $city = Cities::where('state_id',$detail->state)->get();
      }
      return view('front.profile.partner-profile',['detail'=>$detail,'states'=>$states,'city'=>$city,'allcountry'=>$allcountry]);
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
}
