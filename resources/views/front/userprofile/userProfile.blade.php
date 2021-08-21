@include('layouts.header')
<section class="listing_wpas">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="listing_st">
          <div class="row">
            <div class="col-md-3">
              @if(count($user->UserImage) > 0)
              <div class="listing_imgs">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @foreach($user->UserImage as $k=>$img)
                <div class="carousel-item @if($k == 0) active @endif">
                  <img class="d-block w-100" src="{{ asset('profiles/'.$img->image) }}" alt="First slide">
                </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              </div>
              </div>
              <!-- slider -->
              <!-- no image -->
              @else
              <div class="listing_imgs">
              <img src="{{ asset('front/images/nofound.png') }}" >
              </div>
              <!-- no image -->

              <!-- slider -->
              @endif
            </div>
            <?php $connect = App\Helpers\GlobalFunctions::getnotificationInvite(Auth::User()->id,$user->id); ?>

            <div class="col-md-6">
              <div class="listing_details">
                <div class="listing_details_head">
                  <h3>{{ ucfirst($user->firstName) ?? "-" }} {{ ucfirst($user->lastName) ?? "-" }}</h3>
                  <div class="d_flex_head">
                    <span><i class="fa fa-comments"></i> Online now</span>
                    <span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-user"></i> You & Her</span>
                  </div>
                </div>
                <div class="listing_details_title">
                  <a class="d_flex_title" href="#">
                    <span>24 yrs,
                      @if(!empty($user->UserBasicDetail->height))

                      @if($user->UserBasicDetail->height == 1)
                      4' 5"
                      @endif
                      @if($user->UserBasicDetail->height == 2)
                      4' 6"
                      @endif
                      @if($user->UserBasicDetail->height == 3)
                      4' 7"
                      @endif
                      @if($user->UserBasicDetail->height == 4)
                      4' 8"
                      @endif
                      @if($user->UserBasicDetail->height == 5)
                      4' 9"
                      @endif
                      @if($user->UserBasicDetail->height == 6)
                      4' 10"
                      @endif
                      @if($user->UserBasicDetail->height == 7)
                      4' 11"
                      @endif
                      @if($user->UserBasicDetail->height == 8)
                      5'
                      @endif
                      @if($user->UserBasicDetail->height == 9)
                      5' 1"
                      @endif
                      @if($user->UserBasicDetail->height == 10)
                      5' 2"
                      @endif
                      @if($user->UserBasicDetail->height == 11)
                      5' 3"
                      @endif
                      @if($user->UserBasicDetail->height == 12)
                      5' 4"
                      @endif
                      @if($user->UserBasicDetail->height == 13)
                      5' 5"
                      @endif
                      @if($user->UserBasicDetail->height == 14)
                      5' 6"
                      @endif
                      @if($user->UserBasicDetail->height == 15)
                      5' 7"
                      @endif
                      @if($user->UserBasicDetail->height == 16)
                      5' 8"
                      @endif
                      @if($user->UserBasicDetail->height == 17)
                      5' 9"
                      @endif
                      @if($user->UserBasicDetail->height == 18)
                      5' 10"
                      @endif
                      @if($user->UserBasicDetail->height == 19)
                      5' 11"
                      @endif
                      @if($user->UserBasicDetail->height == 20)
                      6'
                      @endif
                      @if($user->UserBasicDetail->height == 21)
                      6' 1"
                      @endif
                      @if($user->UserBasicDetail->height == 22)
                      6' 2"
                      @endif
                      @if($user->UserBasicDetail->height == 23)
                      6' 3"
                      @endif
                      @if($user->UserBasicDetail->height == 24)
                      6' 4"
                      @endif
                      @if($user->UserBasicDetail->height == 25)
                      6' 5"
                      @endif
                      @if($user->UserBasicDetail->height == 26)
                      6' 6"
                      @endif
                      @if($user->UserBasicDetail->height == 27)
                      6' 7"
                      @endif
                      @if($user->UserBasicDetail->height == 28)
                      6' 8"
                      @endif
                      @if($user->UserBasicDetail->height == 29)
                      6' 9"
                      @endif
                      @if($user->UserBasicDetail->height == 30)
                      6' 10"
                      @endif
                      @if($user->UserBasicDetail->height == 31)
                      6' 11"
                      @endif
                      @if($user->UserBasicDetail->height == 32)
                      7'
                      @endif
                      @endif
                    </span>
                    <span>
                      @if(!empty($user->UserBasicDetail->maritalStatus))
                      @if($user->UserBasicDetail->maritalStatus == 1)
                      Never Married
                      @endif
                      @if($user->UserBasicDetail->maritalStatus == 2)
                      Divorced
                      @endif
                      @if($user->UserBasicDetail->maritalStatus == 3)
                      Awaiting Divorce
                      @endif
                      @endif
                    </span>
                    <span>
                      @if(!empty($user->UserReligious->religiondetail))
                      {{ ucwords($user->UserReligious->religiondetail->name) }}
                      @endif
                    </span>
                    <span>
                      @if(!empty($user->UserLocation->citydetail))
                      {{ ucwords($user->UserLocation->citydetail->name) }},
                      @endif
                      @if(!empty($user->UserLocation->statedetail))
                      {{ ucwords($user->UserLocation->statedetail->name) }}
                      @endif
                    </span>
                    <span>
                      @if(!empty($user->UserReligious->motherTonguedetail))
                      {{ ucwords($user->UserReligious->motherTonguedetail->name) }}
                      @endif
                    </span>
                    <span>
                      @if(!empty($user->UserEducation->workingAs))
                      @if($user->UserEducation->workingAs == 1) Banking Professional @endif
                      @if($user->UserEducation->workingAs == 2) Chartered Accountant @endif
                      @if($user->UserEducation->workingAs == 3) Company Secretary @endif
                      @if($user->UserEducation->workingAs == 4) Finance Professional @endif
                      @if($user->UserEducation->workingAs == 5) Investment Professional @endif
                      @if($user->UserEducation->workingAs == 6) Accounting Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 7) Admin Professional @endif
                      @if($user->UserEducation->workingAs == 8) Human Resources Professional @endif
                      @if($user->UserEducation->workingAs == 9) Actor @endif
                      @if($user->UserEducation->workingAs == 10) Advertising Professional @endif
                      @if($user->UserEducation->workingAs == 11) Entertainment Professional @endif
                      @if($user->UserEducation->workingAs == 12) Event Manager @endif
                      @if($user->UserEducation->workingAs == 13) Journalist @endif
                      @if($user->UserEducation->workingAs == 14) Media Professional @endif
                      @if($user->UserEducation->workingAs == 15) Public Relations Professional @endif
                      @if($user->UserEducation->workingAs == 16) Farming @endif
                      @if($user->UserEducation->workingAs == 17) Horticulturist @endif
                      @if($user->UserEducation->workingAs == 18) Agricultural Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 19) Air Hostess / Flight Attendant @endif
                      @if($user->UserEducation->workingAs == 20) Pilot / Co-Pilot @endif
                      @if($user->UserEducation->workingAs == 21) Other Airline Professional @endif
                      @if($user->UserEducation->workingAs == 22) Architect @endif
                      @if($user->UserEducation->workingAs == 23) Interior Designer @endif
                      @if($user->UserEducation->workingAs == 24) Landscape Architect @endif
                      @if($user->UserEducation->workingAs == 25) Animator @endif
                      @if($user->UserEducation->workingAs == 26) Commercial Artist @endif
                      @if($user->UserEducation->workingAs == 27) Web / UX Designers @endif
                      @if($user->UserEducation->workingAs == 28) Artist (Others) @endif
                      @if($user->UserEducation->workingAs == 29) Beautician @endif
                      @if($user->UserEducation->workingAs == 30) Fashion Designer @endif
                      @if($user->UserEducation->workingAs == 31) Hairstylist @endif
                      @if($user->UserEducation->workingAs == 32) Jewellery Designer @endif
                      @if($user->UserEducation->workingAs == 33) Designer (Others) @endif
                      @if($user->UserEducation->workingAs == 34) Customer Support / BPO / KPO Professional @endif
                      @if($user->UserEducation->workingAs == 35) IAS / IRS / IES / IFS @endif
                      @if($user->UserEducation->workingAs == 36) Indian Police Services (IPS) @endif
                      @if($user->UserEducation->workingAs == 37) Law Enforcement Employee (Others) @endif
                      @if($user->UserEducation->workingAs == 38) Airforce @endif
                      @if($user->UserEducation->workingAs == 39) Army @endif
                      @if($user->UserEducation->workingAs == 40) Navy @endif
                      @if($user->UserEducation->workingAs == 41) Defense Services (Others) @endif
                      @if($user->UserEducation->workingAs == 42) Lecturer @endif
                      @if($user->UserEducation->workingAs == 43) Professor @endif
                      @if($user->UserEducation->workingAs == 44) Research Assistant @endif
                      @if($user->UserEducation->workingAs == 45) Research Scholar @endif
                      @if($user->UserEducation->workingAs == 46) Teacher @endif
                      @if($user->UserEducation->workingAs == 47) Training Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 48) Civil Engineer @endif
                      @if($user->UserEducation->workingAs == 49) Electronics / Telecom Engineer @endif
                      @if($user->UserEducation->workingAs == 50) Mechanical / Production Engineer @endif
                      @if($user->UserEducation->workingAs == 51) Non IT Engineer (Others) @endif
                      @if($user->UserEducation->workingAs == 52) Chef / Sommelier / Food Critic @endif
                      @if($user->UserEducation->workingAs == 53) Catering Professional @endif
                      @if($user->UserEducation->workingAs == 54) Hotel &amp; Hospitality Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 55) Software Developer / Programmer @endif
                      @if($user->UserEducation->workingAs == 56) Software Consultant @endif
                      @if($user->UserEducation->workingAs == 57) Hardware &amp; Networking professional @endif
                      @if($user->UserEducation->workingAs == 58) Software Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 59) Lawyer @endif
                      @if($user->UserEducation->workingAs == 60) Legal Assistant @endif
                      @if($user->UserEducation->workingAs == 61) Legal Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 62) Dentist @endif
                      @if($user->UserEducation->workingAs == 63) Doctor @endif
                      @if($user->UserEducation->workingAs == 64) Medical Transcriptionist @endif
                      @if($user->UserEducation->workingAs == 65) Nurse @endif
                      @if($user->UserEducation->workingAs == 66) Pharmacist @endif
                      @if($user->UserEducation->workingAs == 67) Physician Assistant @endif
                      @if($user->UserEducation->workingAs == 68) Psychologist @endif
                      @if($user->UserEducation->workingAs == 69) Surgeon @endif
                      @if($user->UserEducation->workingAs == 70) Veterinary Doctor @endif
                      @if($user->UserEducation->workingAs == 71) Therapist (Others) @endif
                      @if($user->UserEducation->workingAs == 72) Medical / Healthcare Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 73) Merchant Naval Officer @endif
                      @if($user->UserEducation->workingAs == 74) Mariner @endif
                      @if($user->UserEducation->workingAs == 75) Marketing Professional @endif
                      @if($user->UserEducation->workingAs == 76) Sales Professional @endif
                      @if($user->UserEducation->workingAs == 77) Biologist / Botanist @endif
                      @if($user->UserEducation->workingAs == 78) Physicist @endif
                      @if($user->UserEducation->workingAs == 79) Science Professional (Others) @endif
                      @if($user->UserEducation->workingAs == 80) CxO / Chairman / Director / President @endif
                      @if($user->UserEducation->workingAs == 81) VP / AVP / GM / DGM @endif
                      @if($user->UserEducation->workingAs == 82) Sr. Manager / Manager @endif
                      @if($user->UserEducation->workingAs == 83) Consultant / Supervisor / Team Leads @endif
                      @if($user->UserEducation->workingAs == 84) Team Member / Staff @endif
                      @if($user->UserEducation->workingAs == 85) Agent / Broker / Trader / Contractor @endif
                      @if($user->UserEducation->workingAs == 86) Business Owner / Entrepreneur @endif
                      @if($user->UserEducation->workingAs == 87) Politician @endif
                      @if($user->UserEducation->workingAs == 88) Social Worker / Volunteer / NGO @endif
                      @if($user->UserEducation->workingAs == 89) Sportsman @endif
                      @if($user->UserEducation->workingAs == 90) Travel &amp; Transport Professional @endif
                      @if($user->UserEducation->workingAs == 91) Writer @endif
                      @if($user->UserEducation->workingAs == 92) Student @endif
                      @if($user->UserEducation->workingAs == 93) Retired @endif
                      @if($user->UserEducation->workingAs == 94) Not working @endif
                      @endif
                    </span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="conect_nwwed conect_nwwed{{ $user->id }}">
                <a data-id="{{ $user->id }}" class="chatRoomJoin"><i class="fa fa-comment"></i></a>
                <p>Chat</p>
              </div>

              @if(!empty($connect))
              <div class="conect_nwwed conect_nwwed{{ $user->id }}">
                <i  class="fa fa-check-circle"></i>
                <p>Connected</p>
              </div>
              @else
              <div class="conect_nww conect_nww{{ $user->id }}">
                <p>Like this profile?</p>
                <a data-id="{{ $user->id }}" class="inviteUser"><i class="fa fa-check-circle"></i></a>
                <p>Connect Now</p>
              </div>

              <div class="d-none conect_nwwed conect_nwwed{{ $user->id }}">
                <i class="fa fa-check-circle"></i>
                <p>Connected</p>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">



      </div>


      <div class="col-md-8">
        <div class="listing_wrapps">

          <div class="detailed_profile">
            <h2>Detailed Profile</h2>

            <div class="rpeat_col">
              <h4><i class="fa fa-info-circle"></i> About {{ ucfirst($user->firstName) }}</h4>
              <span>{{ $user->uniqueId }} @if(!empty($user->UserBasicDetail->profileCreatedBy))  | Profile created by
              @if($user->UserBasicDetail->profileCreatedBy == 1)
              Self
              @endif
              @if($user->UserBasicDetail->profileCreatedBy == 2)
              Parent / Guardian
              @endif
              @if($user->UserBasicDetail->profileCreatedBy == 3)
              Sibling
              @endif
              @if($user->UserBasicDetail->profileCreatedBy == 4)
              Sibling
              @endif
              @if($user->UserBasicDetail->profileCreatedBy == 5)
              Friend
              @endif
              @if($user->UserBasicDetail->profileCreatedBy == 6)
              Other
              @endif
              @endif</span>
            @if(!empty($user->UserBasicDetail->about))
              <div class="about_here_wrap">
                <p>
                  {{ $user->UserBasicDetail->about }}
                </p>
              </div>
              @endif

            </div>

            <div class="rpeat_col">
              <h4><i class="fa fa-phone"></i>Contact Details</h4>

              <div class="about_here_wrap">
                @if(isset($user->UserContactDetails->mobile))<p>Contact Number <span class="num">{{$user->UserContactDetails->mobile ?? ""}}</span></p>@endif
                <p>Email ID <span class="num">{{$user->email }}</span></p>
              </div>

            </div>
            @if(!empty($user->UserBasicDetail->diet))

            <div class="rpeat_col">
              <h4><i class="fa fa-glass"></i>Lifestyle</h4>

              <div class="about_here_wrap">
                <p>
                  @if($user->UserBasicDetail->diet == 1)
                  Veg
                  @endif
                  @if($user->UserBasicDetail->diet == 2)
                  Non-Veg
                  @endif
                  @if($user->UserBasicDetail->diet == 3)
                Occasionally Non-Veg
                  @endif
                  @if($user->UserBasicDetail->diet == 4)
                Eggetarian
                  @endif
                  @if($user->UserBasicDetail->diet == 5)
                  Jain
                  @endif
                  @if($user->UserBasicDetail->diet == 6)
                  Vegan
                  @endif
                </p>
              </div>
            </div>
            @endif


            <div class="rpeat_col">
              <h4><i class="fa fa-book"></i>Background</h4>

              <div class="about_here_wrap">
                <p>
                  @if(!empty($user->UserReligious->religiondetail))
                   {{ ucwords($user->UserReligious->religiondetail->name) }}
                    @endif
                </p>
                <p>	@if(!empty($user->UserReligious->motherTonguedetail))
                    {{ ucwords($user->UserReligious->motherTonguedetail->name) }}
                    @endif
                  </p>
                <p>@if(!empty($user->UserLocation->citydetail))
                  {{ $user->UserLocation->citydetail->name }}
                  @endif,
                  @if(!empty($user->UserLocation->statedetail))
                  {{ $user->UserLocation->statedetail->name }}
                  @endif,
                  @if(!empty($location->countrydetail))
                  {{ $location->countrydetail->name }}
                   @endif
                </p>
              </div>

            </div>

            <div class="rpeat_col">
              <h4><i class="fa fa-globe"></i>Horoscope Details</h4>

              <div class="about_here_wrap">
                <p>@if(!empty($user->UserBirthDetail)) Born in {{ $user->UserBirthDetail->birthCity }} @endif @if(!empty($user->UserBasicDetail->dateOfBirth)) on {{ $user->UserBasicDetail->dateOfBirth }} @endif @if(!empty($user->UserBirthDetail->birthHours)) at exactly {{ $user->UserBirthDetail->birthHours.':'.$user->UserBirthDetail->birthminute.' '.$user->UserBirthDetail->birthAmPm }} @endif</p>
              </div>

            </div>

            <div class="rpeat_col">
              <h4><i class="fa fa-home"></i>Family Details</h4>

              <div class="about_here_wrap">
              @if(isset($user->UserFamilyDetail->fatherStatus))
              <p>Father
                <span class="num">@if($user->UserFamilyDetail->fatherStatus == 1)
                Employed
                @endif
                @if($user->UserFamilyDetail->fatherStatus == 2)
                Business
                @endif
                @if($user->UserFamilyDetail->fatherStatus == 3)
                Retired
                @endif
                @if($user->UserFamilyDetail->fatherStatus == 4)
                Not Employed
                @endif</span>
              </p>
                @endif

                @if(isset($user->UserFamilyDetail->motherStatus))
                <p>Mother
                  <span class="num">@if($user->UserFamilyDetail->motherStatus == 1)
                  Employed
                  @endif
                  @if($user->UserFamilyDetail->motherStatus == 2)
                  Business
                  @endif
                  @if($user->UserFamilyDetail->motherStatus == 3)
                  Retired
                  @endif
                  @if($user->UserFamilyDetail->motherStatus == 4)
                  Not Employed
                  @endif</span>
                </p>
                  @endif
                @if(isset($user->UserFamilyDetail->familyLocation))
                <p>Family location
                  <span class="num">{{ $user->UserFamilyDetail->familyLocation }}</span>
                </p>
                  @endif
                @if(isset($user->UserFamilyDetail->nativePlace))
                <p>No. of Siblings
                  <span class="num">{{ $user->UserFamilyDetail->sibling }}</span>
                </p>
                  @endif
                @if(isset($user->UserFamilyDetail->familyType))
                <p>Family Type
                  <span class="num">
                    @if($user->UserFamilyDetail->familyType == 1)
                    Joint
                    @endif
                    @if($user->UserFamilyDetail->familyType == 2)
                    Nuclear
                    @endif
                  </span>
                </p>
                  @endif

              </div>

            </div>

            <div class="rpeat_col">
              <h4><i class="fa fa-graduation-cap"></i>Education & Career</h4>

              <div class="about_here_wrap">
                @if(isset($user->UserEducation->highestQualification))
                <p>Highest Qualification
                  <span class="num">
                    @if($user->UserEducation->highestQualification == 1) B.E / B.Tech @endif
                    @if($user->UserEducation->highestQualification == 2) M.E / M.Tech @endif
                    @if($user->UserEducation->highestQualification == 3) M.S Engineering @endif
                    @if($user->UserEducation->highestQualification == 4) B.Eng (Hons) @endif
                    @if($user->UserEducation->highestQualification == 5) M.Eng (Hons) @endif
                    @if($user->UserEducation->highestQualification == 6) Engineering Diploma @endif
                    @if($user->UserEducation->highestQualification == 7) AE @endif
                    @if($user->UserEducation->highestQualification == 8) AET @endif
                    @if($user->UserEducation->highestQualification == 9) B.A @endif
                    @if($user->UserEducation->highestQualification == 10) B.Ed @endif
                    @if($user->UserEducation->highestQualification == 11) BJMC @endif
                    @if($user->UserEducation->highestQualification == 12) BFA @endif
                    @if($user->UserEducation->highestQualification == 13) B.Arch @endif
                    @if($user->UserEducation->highestQualification == 14) B.Des @endif
                    @if($user->UserEducation->highestQualification == 15) BMM @endif
                    @if($user->UserEducation->highestQualification == 16) MFA @endif
                    @if($user->UserEducation->highestQualification == 17) M.Ed @endif
                    @if($user->UserEducation->highestQualification == 18) M.A @endif
                    @if($user->UserEducation->highestQualification == 19) MSW @endif
                    @if($user->UserEducation->highestQualification == 20) MJMC @endif
                    @if($user->UserEducation->highestQualification == 21) M.Arch @endif
                    @if($user->UserEducation->highestQualification == 22) M.Des @endif
                    @if($user->UserEducation->highestQualification == 23) BA (Hons)@endif
                    @if($user->UserEducation->highestQualification == 24) B.Arch (Hons) @endif
                    @if($user->UserEducation->highestQualification == 25) DFA @endif
                    @if($user->UserEducation->highestQualification == 26) D.Ed @endif
                    @if($user->UserEducation->highestQualification == 27) D.Arch @endif
                    @if($user->UserEducation->highestQualification == 28) AA @endif
                    @if($user->UserEducation->highestQualification == 29) AFA @endif
                    @if($user->UserEducation->highestQualification == 30) B.Com @endif
                    @if($user->UserEducation->highestQualification == 31) CA / CPA @endif
                    @if($user->UserEducation->highestQualification == 32) CFA @endif
                    @if($user->UserEducation->highestQualification == 33) CS @endif
                    @if($user->UserEducation->highestQualification == 34) BSc / BFin @endif
                    @if($user->UserEducation->highestQualification == 35) M.Com @endif
                    @if($user->UserEducation->highestQualification == 36) MSc / MFin / MS @endif
                    @if($user->UserEducation->highestQualification == 37) BCom (Hons) @endif
                    @if($user->UserEducation->highestQualification == 38) PGD Finance @endif
                    @if($user->UserEducation->highestQualification == 39) BCA @endif
                    @if($user->UserEducation->highestQualification == 40) B.IT @endif
                    @if($user->UserEducation->highestQualification == 41) BCS @endif
                    @if($user->UserEducation->highestQualification == 42) BA Computer Science @endif
                    @if($user->UserEducation->highestQualification == 43) MCA @endif
                    @if($user->UserEducation->highestQualification == 44) PGDCA @endif
                    @if($user->UserEducation->highestQualification == 45) IT Diploma @endif
                    @if($user->UserEducation->highestQualification == 46) ADIT @endif
                    @if($user->UserEducation->highestQualification == 47) B.Sc @endif
                    @if($user->UserEducation->highestQualification == 48) M.Sc @endif
                    @if($user->UserEducation->highestQualification == 49) BSc (Hons) @endif
                    @if($user->UserEducation->highestQualification == 50) DipSc @endif
                    @if($user->UserEducation->highestQualification == 51) AS @endif
                    @if($user->UserEducation->highestQualification == 52) AAS @endif
                    @if($user->UserEducation->highestQualification == 53) MBBS @endif
                    @if($user->UserEducation->highestQualification == 54) BDS @endif
                    @if($user->UserEducation->highestQualification == 55) BPT @endif
                    @if($user->UserEducation->highestQualification == 56) BAMS @endif
                    @if($user->UserEducation->highestQualification == 57) BHMS @endif
                    @if($user->UserEducation->highestQualification == 58) B.Pharma @endif
                    @if($user->UserEducation->highestQualification == 59) BVSc @endif
                    @if($user->UserEducation->highestQualification == 60) BSN / BScN @endif
                    @if($user->UserEducation->highestQualification == 61) MDS @endif
                    @if($user->UserEducation->highestQualification == 62) MCh @endif
                    @if($user->UserEducation->highestQualification == 63) M.D @endif
                    @if($user->UserEducation->highestQualification == 64) M.S Medicine @endif
                    @if($user->UserEducation->highestQualification == 65) MPT @endif
                    @if($user->UserEducation->highestQualification == 66) DM @endif
                    @if($user->UserEducation->highestQualification == 67) M.Pharma @endif
                    @if($user->UserEducation->highestQualification == 68) MVSc @endif
                    @if($user->UserEducation->highestQualification == 69) MMed @endif
                    @if($user->UserEducation->highestQualification == 70) PGD Medicine @endif
                    @if($user->UserEducation->highestQualification == 71) ADN @endif
                    @if($user->UserEducation->highestQualification == 72) BBA @endif
                    @if($user->UserEducation->highestQualification == 73) BHM @endif
                    @if($user->UserEducation->highestQualification == 74) BBM @endif
                    @if($user->UserEducation->highestQualification == 75) MBA @endif
                    @if($user->UserEducation->highestQualification == 76) PGDM @endif
                    @if($user->UserEducation->highestQualification == 77) ABA @endif
                    @if($user->UserEducation->highestQualification == 78) ADBus @endif
                    @if($user->UserEducation->highestQualification == 79) BL / LLB @endif
                    @if($user->UserEducation->highestQualification == 80) ML / LLM @endif
                    @if($user->UserEducation->highestQualification == 81) LLB (Hons) @endif
                    @if($user->UserEducation->highestQualification == 82) ALA @endif
                    @if($user->UserEducation->highestQualification == 83) Ph.D @endif
                    @if($user->UserEducation->highestQualification == 84) M.Phil @endif
                    @if($user->UserEducation->highestQualification == 85) Bachelor @endif
                    @if($user->UserEducation->highestQualification == 86) Master @endif
                    @if($user->UserEducation->highestQualification == 87) Diploma @endif
                    @if($user->UserEducation->highestQualification == 88) Honours @endif
                    @if($user->UserEducation->highestQualification == 89) Doctorate @endif
                    @if($user->UserEducation->highestQualification == 90) Associate @endif
                    @if($user->UserEducation->highestQualification == 91) High school @endif
                    @if($user->UserEducation->highestQualification == 92) Less than high school @endif
                  </span>
                </p>
                @endif
                @if(isset($user->UserEducation->income))
                <p>Annual Income
                  <span class="num">
                    @if($user->UserEducation->income == 1) Upto INR 1 Lakh @endif
                    @if($user->UserEducation->income == 2) INR 1 Lakh to 2 Lakh @endif
                    @if($user->UserEducation->income == 3) INR 2 Lakh to 4 Lakh @endif
                    @if($user->UserEducation->income == 4) INR 4 Lakh to 7 Lakh @endif
                    @if($user->UserEducation->income == 5) INR 7 Lakh to 10 Lakh @endif
                  </span>
                </p>
                  @endif
                @if(isset($user->UserEducation->workingWith))
                <p>Working With
                  <span class="num">
                    @if($user->UserEducation->workingWith == 1) Private Company @endif
                    @if($user->UserEducation->workingWith == 2) Government / Public Sector @endif
                    @if($user->UserEducation->workingWith == 3) Defense / Civil Services @endif
                    @if($user->UserEducation->workingWith == 4) Business / Self Employed @endif
                    @if($user->UserEducation->workingWith == 5) Not Working @endif
                  </span>
                </p>
                  @endif
                @if(isset($user->UserEducation->workingAs))
                <p>Working With
                  <span class="num">
                    @if($user->UserEducation->workingAs == 1) Banking Professional @endif
                    @if($user->UserEducation->workingAs == 2) Chartered Accountant @endif
                    @if($user->UserEducation->workingAs == 3) Company Secretary @endif
                    @if($user->UserEducation->workingAs == 4) Finance Professional @endif
                    @if($user->UserEducation->workingAs == 5) Investment Professional @endif
                    @if($user->UserEducation->workingAs == 6) Accounting Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 7) Admin Professional @endif
                    @if($user->UserEducation->workingAs == 8) Human Resources Professional @endif
                    @if($user->UserEducation->workingAs == 9) Actor @endif
                    @if($user->UserEducation->workingAs == 10) Advertising Professional @endif
                    @if($user->UserEducation->workingAs == 11) Entertainment Professional @endif
                    @if($user->UserEducation->workingAs == 12) Event Manager @endif
                    @if($user->UserEducation->workingAs == 13) Journalist @endif
                    @if($user->UserEducation->workingAs == 14) Media Professional @endif
                    @if($user->UserEducation->workingAs == 15) Public Relations Professional @endif
                    @if($user->UserEducation->workingAs == 16) Farming @endif
                    @if($user->UserEducation->workingAs == 17) Horticulturist @endif
                    @if($user->UserEducation->workingAs == 18) Agricultural Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 19) Air Hostess / Flight Attendant @endif
                    @if($user->UserEducation->workingAs == 20) Pilot / Co-Pilot @endif
                    @if($user->UserEducation->workingAs == 21) Other Airline Professional @endif
                    @if($user->UserEducation->workingAs == 22) Architect @endif
                    @if($user->UserEducation->workingAs == 23) Interior Designer @endif
                    @if($user->UserEducation->workingAs == 24) Landscape Architect @endif
                    @if($user->UserEducation->workingAs == 25) Animator @endif
                    @if($user->UserEducation->workingAs == 26) Commercial Artist @endif
                    @if($user->UserEducation->workingAs == 27) Web / UX Designers @endif
                    @if($user->UserEducation->workingAs == 28) Artist (Others) @endif
                    @if($user->UserEducation->workingAs == 29) Beautician @endif
                    @if($user->UserEducation->workingAs == 30) Fashion Designer @endif
                    @if($user->UserEducation->workingAs == 31) Hairstylist @endif
                    @if($user->UserEducation->workingAs == 32) Jewellery Designer @endif
                    @if($user->UserEducation->workingAs == 33) Designer (Others) @endif
                    @if($user->UserEducation->workingAs == 34) Customer Support / BPO / KPO Professional @endif
                    @if($user->UserEducation->workingAs == 35) IAS / IRS / IES / IFS @endif
                    @if($user->UserEducation->workingAs == 36) Indian Police Services (IPS) @endif
                    @if($user->UserEducation->workingAs == 37) Law Enforcement Employee (Others) @endif
                    @if($user->UserEducation->workingAs == 38) Airforce @endif
                    @if($user->UserEducation->workingAs == 39) Army @endif
                    @if($user->UserEducation->workingAs == 40) Navy @endif
                    @if($user->UserEducation->workingAs == 41) Defense Services (Others) @endif
                    @if($user->UserEducation->workingAs == 42) Lecturer @endif
                    @if($user->UserEducation->workingAs == 43) Professor @endif
                    @if($user->UserEducation->workingAs == 44) Research Assistant @endif
                    @if($user->UserEducation->workingAs == 45) Research Scholar @endif
                    @if($user->UserEducation->workingAs == 46) Teacher @endif
                    @if($user->UserEducation->workingAs == 47) Training Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 48) Civil Engineer @endif
                    @if($user->UserEducation->workingAs == 49) Electronics / Telecom Engineer @endif
                    @if($user->UserEducation->workingAs == 50) Mechanical / Production Engineer @endif
                    @if($user->UserEducation->workingAs == 51) Non IT Engineer (Others) @endif
                    @if($user->UserEducation->workingAs == 52) Chef / Sommelier / Food Critic @endif
                    @if($user->UserEducation->workingAs == 53) Catering Professional @endif
                    @if($user->UserEducation->workingAs == 54) Hotel &amp; Hospitality Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 55) Software Developer / Programmer @endif
                    @if($user->UserEducation->workingAs == 56) Software Consultant @endif
                    @if($user->UserEducation->workingAs == 57) Hardware &amp; Networking professional @endif
                    @if($user->UserEducation->workingAs == 58) Software Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 59) Lawyer @endif
                    @if($user->UserEducation->workingAs == 60) Legal Assistant @endif
                    @if($user->UserEducation->workingAs == 61) Legal Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 62) Dentist @endif
                    @if($user->UserEducation->workingAs == 63) Doctor @endif
                    @if($user->UserEducation->workingAs == 64) Medical Transcriptionist @endif
                    @if($user->UserEducation->workingAs == 65) Nurse @endif
                    @if($user->UserEducation->workingAs == 66) Pharmacist @endif
                    @if($user->UserEducation->workingAs == 67) Physician Assistant @endif
                    @if($user->UserEducation->workingAs == 68) Psychologist @endif
                    @if($user->UserEducation->workingAs == 69) Surgeon @endif
                    @if($user->UserEducation->workingAs == 70) Veterinary Doctor @endif
                    @if($user->UserEducation->workingAs == 71) Therapist (Others) @endif
                    @if($user->UserEducation->workingAs == 72) Medical / Healthcare Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 73) Merchant Naval Officer @endif
                    @if($user->UserEducation->workingAs == 74) Mariner @endif
                    @if($user->UserEducation->workingAs == 75) Marketing Professional @endif
                    @if($user->UserEducation->workingAs == 76) Sales Professional @endif
                    @if($user->UserEducation->workingAs == 77) Biologist / Botanist @endif
                    @if($user->UserEducation->workingAs == 78) Physicist @endif
                    @if($user->UserEducation->workingAs == 79) Science Professional (Others) @endif
                    @if($user->UserEducation->workingAs == 80) CxO / Chairman / Director / President @endif
                    @if($user->UserEducation->workingAs == 81) VP / AVP / GM / DGM @endif
                    @if($user->UserEducation->workingAs == 82) Sr. Manager / Manager @endif
                    @if($user->UserEducation->workingAs == 83) Consultant / Supervisor / Team Leads @endif
                    @if($user->UserEducation->workingAs == 84) Team Member / Staff @endif
                    @if($user->UserEducation->workingAs == 85) Agent / Broker / Trader / Contractor @endif
                    @if($user->UserEducation->workingAs == 86) Business Owner / Entrepreneur @endif
                    @if($user->UserEducation->workingAs == 87) Politician @endif
                    @if($user->UserEducation->workingAs == 88) Social Worker / Volunteer / NGO @endif
                    @if($user->UserEducation->workingAs == 89) Sportsman @endif
                    @if($user->UserEducation->workingAs == 90) Travel &amp; Transport Professional @endif
                    @if($user->UserEducation->workingAs == 91) Writer @endif
                    @if($user->UserEducation->workingAs == 92) Student @endif
                    @if($user->UserEducation->workingAs == 93) Retired @endif
                    @if($user->UserEducation->workingAs == 94) Not working @endif
                  </span>
                </p>
                  @endif

                  @if(isset($user->UserEducation->employerName))
                  <p>Employer Name
                    <span class="num">
                      {{ $user->UserEducation->employerName }}
                    </span>
                  </p>
                    @endif
              </div>

            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- Plan Update -->
             <div id="planalert" class="modal fade" role="dialog">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Membership</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>

               </div>
               <div class="modal-body driverdetails">
                 <h5 class="messagetext">Add our membership plan to get the feature of "Chat &  Invites". You can chat & send invites to people you like.</h5>

                </div>

               <div class="modal-footer">
                 <a href="{{URL::to('/membership')}}" class="btn btn-success" >Membership</a>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               </div>
             </div>

           </div>
         </div>
             <!-- Plan Update -->
@include('layouts.footer')
