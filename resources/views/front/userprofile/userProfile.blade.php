@include('layouts.header')
<section class="listing_wpas">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="listing_st">
          <div class="row">
            <div class="col-md-3">
              @if(!empty($user->UserImage))
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
                  <?php
                  if(!empty($user->UserBasicDetail))
                  {
                  $dateOfBirth = $user->UserBasicDetail->dateOfBirth;
                  $today = date("Y-m-d");
                  $diff = date_diff(date_create($dateOfBirth), date_create($today));
                  $age = $diff->format('%y');
                 }
                 else
                 {
                   $age ='';
                 }
                 ?>
                  <a class="d_flex_title" href="#">
                    <span>@if($age){{ $age }} Yrs, @endif
                      @if(!empty($user->UserBasicDetail->heightdetail))
                        {{ $user->UserBasicDetail->heightdetail->inch }}
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
                      @if(!empty($user->UserEducation->workingAsdetail))
                        {{ $user->UserEducation->workingAsdetail->name }}
                       @endif
                    </span>
                  </a>
                </div>
              </div>
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
              Friend
              @endif
              @if($user->UserBasicDetail->profileCreatedBy == 5)
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
                @if($phoneshowing == 1)
                @if(isset($user->UserContactDetails->mobile))<p>Contact Number <span class="num">{{$user->UserContactDetails->mobile ?? ""}}</span></p>@endif
                <p>Email ID @if($phoneshowing == 1)<span class="num">{{$user->email }}</span> @else <span class="num">---</span> @endif</p>
                @if(!empty($user->UserContactDetail))
                <p>Phone Number @if($phoneshowing == 1)<span class="num">{{ $user->UserContactDetail->mobile }}</span>@else <span class="num">---</span> @endif</p>
                @endif
                @else
                <p>if you want to access contact detail you need to buy membership</p>
                @endif
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
                @if(!empty($user->UserEducation->educationdetail))
                <p>Highest Qualification
                  <span class="num">
                    {{ $user->UserEducation->educationdetail->name }}
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

                @if(!empty($user->UserEducation->workingAsdetail))
                <p>Working With
                  <span class="num">
                    {{ $user->UserEducation->workingAsdetail->name }}
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
