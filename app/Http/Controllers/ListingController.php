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

class ListingController extends Controller
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
    public function index(Request $request)
    {
        $perpage = 10;
        $relation ='';
        $countryId ='';
        $stateId ='';
        $cityId ='';
        $allstates = [];
        $allcity = [];
        $gender = UserBasicDetails::where('userId',Auth::user()->id)->first();

        if($gender->gender == 1)
        {
          $gender = 2;
        }
        else if($gender->gender == 2)
        {
           $gender = 1;
        }

        $query = User::with('UserBasicDetail','UserBasicDetail.heightdetail','UserBirthDetail','UserContactDetail','UserEducation','UserEducation.educationdetail','UserEducation.workingAsdetail','UserFamilyDetail','UserImage','UserLocation','UserReligious','UserReligious.religiondetail','UserReligious.communitydetail','UserReligious.motherTonguedetail')->where('profileUpdate',1)->whereHas('UserBasicDetail',function($w)use($gender){
          $w->where('gender',$gender);
        });
        if(!empty($request->religion))
        {
          $relation = $request->religion;
          $query->WhereHas('UserReligious',function($query) use($relation){
            $query->where('religion',$relation);
          });
        }

        if(!empty($request->country))
        {
          $countryId = $request->country;
          $query->WhereHas('UserLocation',function($query) use($countryId){
            $query->where('country',$countryId);
          });
        }
        if(!empty($request->state))
        {
          $stateId = $request->state;
          $query->WhereHas('UserLocation',function($query) use($stateId){
            $query->where('state',$stateId);
          });
        }
        if(!empty($request->city))
        {
          $cityId = $request->city;
          $query->WhereHas('UserLocation',function($query) use($cityId){
            $query->where('state',$cityId);
          });
        }

        if(!empty($countryId))
        {
        $allstates = States::where('country_id',$countryId)->get();
        }
        if(!empty($stateId))
        {
        $allcity = Cities::where('state_id',$stateId)->get();
        }

        $user = $query->orderby('id','desc')->paginate($perpage);

        $allreligion = Religion::get();
        $allcountry = Country::get();
        return view('front.listing.listing',['users'=>$user,'allcountry'=>$allcountry,'allstates'=>$allstates,'allcity'=>$allcity,'countryId'=>$countryId,'relation'=>$relation,'allreligion'=>$allreligion,'stateId'=>$stateId,'cityId'=>$cityId]);
    }


}
