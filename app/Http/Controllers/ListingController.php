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
        $martialStatus = '';
        $pcountry = '';
        $pstate = '';
        $pcity = '';
        $highestQualification ='';
        $workingWith ='';
        $income ='';
        $prelation ='';
        $community ='';
        $motherTongue ='';
        $preferene = PartnerPreferences::where('userId',Auth::user()->id)->first();
        if(!empty($preferene->maritalStatus))
        {
        $martialStatus = $preferene->maritalStatus;
        }
        if(!empty($preferene->country))
        {
         $pcountry = $preferene->country;
        }
        if(!empty($preferene->state))
        {
        $pstate = $preferene->state;
        }
        if(!empty($preferene->city))
        {
          $pcity = $preferene->city;
        }
        if(!empty($preferene->highestQualification))
        {
          $highestQualification = $preferene->highestQualification;
        }
        if(!empty($preferene->workingWith))
        {
          $workingWith = $preferene->workingWith;
        }
        if(!empty($preferene->income))
        {
          $income = $preferene->income;
        }
        if(!empty($preferene->income))
        {
          $income = $preferene->income;
        }
        if(!empty($preferene->religion))
        {
          $prelation = $preferene->religion;
        }
        if(!empty($preferene->community))
        {
          $community = $preferene->community;
        }
        if(!empty($preferene->motherTongue))
        {
          $motherTongue = $preferene->motherTongue;
        }

        $gender = UserBasicDetails::where('userId',Auth::user()->id)->first();

        if(!empty($request->gender))
        {
          $gender = $request->gender;
        }
        else
        {
          if($gender->gender == 1)
          {
            $gender = 2;
          }
          else if($gender->gender == 2)
          {
            $gender = 1;
           }
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
        else
        {
          if(!empty($prelation))
          {
          $query->WhereHas('UserReligious',function($query) use($prelation){
            $query->where('religion',$prelation);
          });
          }
        }

        if(!empty($request->country))
        {
          $countryId = $request->country;
          $query->WhereHas('UserLocation',function($query) use($countryId){
            $query->where('country',$countryId);
          });
        }
        else
        {
          if(!empty($pcountry))
          {
              $query->WhereHas('UserLocation',function($query) use($pcountry){
                $query->where('country',$pcountry);
              });
          }
        }


        if(!empty($request->state))
        {
          $stateId = $request->state;
          $query->WhereHas('UserLocation',function($query) use($stateId){
            $query->where('state',$stateId);
          });
        }
        else
        {
          if(!empty($pstate))
          {
            $query->WhereHas('UserLocation',function($query) use($pstate){
            $query->where('state',$pstate);
            });
          }
        }

        if(!empty($request->city))
        {
          $cityId = $request->city;
          $query->WhereHas('UserLocation',function($query) use($cityId){
            $query->where('city',$cityId);
          });
        }
        else
        {
          if(!empty($pcity))
          {
           $query->WhereHas('UserLocation',function($query) use($pcity){
            $query->where('city',$pcity);
           });
          }
        }

        if(!empty($highestQualification))
        {
          $query->WhereHas('UserEducation',function($query) use($highestQualification){
            $query->where('highestQualification',$highestQualification);
          });
        }

        if(!empty($workingWith))
        {
          $query->WhereHas('UserEducation',function($query) use($workingWith){
            $query->where('workingWith',$workingWith);
          });
        }

        if(!empty($community))
        {
          $query->WhereHas('UserReligious',function($query) use($community){
            $query->where('community',$community);
          });
        }

        if(!empty($motherTongue))
        {
          $query->WhereHas('UserReligious',function($query) use($motherTongue){
            $query->where('motherTongue',$motherTongue);
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
        return view('front.listing.listing',['gender'=>$gender,'users'=>$user,'allcountry'=>$allcountry,'allstates'=>$allstates,'allcity'=>$allcity,'countryId'=>$countryId,'relation'=>$relation,'allreligion'=>$allreligion,'stateId'=>$stateId,'cityId'=>$cityId]);
    }


}
