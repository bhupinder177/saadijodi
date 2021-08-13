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
        $gender = UserBasicDetails::where('userId',Auth::user()->id)->first();

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
        if($request->religion)
        {
          $relation = $request->religion;
          $query->WhereHas('UserReligious',function($query) use($relation){
            $query->where('religion',$relation);
          });
        }

        $user = $query->orderby('id','desc')->paginate($perpage);


        return view('front.listing.listing',['users'=>$user,'relation'=>$relation]);
    }


}
