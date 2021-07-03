<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserBasicDetails;
use App\Model\UserFamilyDetails;
use App\Model\UserEducations;
use App\Model\UserReligious;
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
        return view('front.profile.profile',['detail'=>$detail,'user'=>$user,'family'=>$family,'religion'=>$religion]);
    }

    public function edit()
    {
      $user = User::where('id',Auth::User()->id)->first();
      $detail = UserBasicDetails::where('userId',Auth::User()->id)->first();
      $family = UserFamilyDetails::where('userId',Auth::User()->id)->first();
      $religion = UserReligious::where('userId',Auth::User()->id)->first();
      $education = UserEducations::where('userId',Auth::User()->id)->first();

      return view('front.profile.edit-profile',['detail'=>$detail,'user'=>$user,'family'=>$family,'religion'=>$religion,'education'=>$education]);
    }

    public function update(Request $request)
    {
       $detail['height'] = $request->height;
       $detail['maritalStatus'] = $request->maritalStatus;
       $detail['profilecreatedby'] = $request->profilecreatedby;
       $detail['gender'] = $request->gender;
       $detail['diet'] = $request->diet;
       $detail['about'] = $request->about;
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
}
