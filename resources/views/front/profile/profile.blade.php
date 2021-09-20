@include('layouts.header')

<section class="profile_wrapp">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-4">
        <div class="sidebar-item">
          <div class="make-me-sticky">
            @if(count($images) > 0)
            <div class="container_image_select">
               <img id="showimages" src="{{ asset('profiles/'.$images[0]->image) }}" style="width:100%">
            </div>
            @foreach($images as $i)
            <div class="column">
              <img src="{{ asset('profiles/'.$i->image) }}" style="width:100%" onclick="myFunction(this);">
            </div>
            @endforeach
            @endif

          </div>
        </div>
      </div>

      <div class="col-md-8">
        <ul id="tabs" class="nav nav-tabs about_my_self" role="tablist">
              <li class="nav-item">
                  <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">
                  <h3>About Myself</h3></a>
              </li>
              <li class="nav-item">
                  <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">
                  <h3>Partner Preferences</h3></a>
              </li>
              <li class="nav-item">
                  <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">
                  <h3>My Contact Detail</h3></a>
              </li>
          </ul>


          <div id="content" class="tab-content" role="tablist">
              <div id="pane-A" class="tab-pane fade show active">

              <div class="profile_sec_one">
                  <div class="edit_Wrapp">
                    <a href="{{URL::to('/edit-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                  </div>
                <h3>{{ $user->firstName }} {{ $user->lastName }} ( {{ $user->uniqueId }} )</h3>
                <div class="row">
                  <div class="col-md-4">
                    <div class="profile_pic @if(empty($profileimage->image)) no_img @endif">
                      @if(!empty($profileimage->image))
                         <img src="{{ asset('profiles/'.$profileimage->image) }}" style="width:100%">
                      @endif
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="pr_details">
                      <div class="flex_details_span">
                        <span class="quest">Age / Height</span>
                        <span class="answr">:
                          @if(!empty($detail->age))
                          {{ $detail->age }}
                          @else
                          -
                          @endif
                          /
                          @if(!empty($detail->heightdetail))
                           {{ $detail->heightdetail->inch }}
                          @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Marital Status</span>
                        <span class="answr">:
                          @if(!empty($detail->maritalStatus))
                          @if($detail->maritalStatus == 1)
                          Never Married
                          @endif
                          @if($detail->maritalStatus == 2)
                          Divorced
                          @endif
                          @if($detail->maritalStatus == 3)
                          Awaiting Divorce
                          @endif
                          @else
                          -
                          @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Posted by</span>
                        <span class="answr">:
                          @if(!empty($detail->profileCreatedBy))
                          @if($detail->profileCreatedBy == 1)
                          Self
                          @endif
                          @if($detail->profileCreatedBy == 2)
                          Parent / Guardian
                          @endif
                          @if($detail->profileCreatedBy == 3)
                          Sibling
                          @endif
                          @if($detail->profileCreatedBy == 4)
                          Sibling
                          @endif
                          @if($detail->profileCreatedBy == 5)
                          Friend
                          @endif
                          @if($detail->profileCreatedBy == 6)
                          Other
                          @endif
                          @else
                          -
                          @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Location</span>
                        <span class="answr">:@if(!empty($location->citydetail)) {{ $location->citydetail->name }}, @endif @if(!empty($location->statedetail)) {{ $location->statedetail->name }} @endif</span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Mother Tongue</span>
                        <span class="answr">:
                          @if(!empty($religion->motherTonguedetail))
                           {{ ucwords($religion->motherTonguedetail->name)  }}
                          @else
                          -
                          @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Religion / Community</span>
                        <span class="answr">:
                          @if(!empty($religion->religiondetail))
                          {{ $religion->religiondetail->name }}
                          @else
                          -
                          @endif
                          /
                          @if(!empty($religion->communitydetail))
                          {{ $religion->communitydetail->name }}
                          @else
                          -
                          @endif
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @if(!empty($detail->about))
                  <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <a href="{{URL::to('/edit-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <h3>Personality, Family Details, Career, Partner Expectations etc.</h3>
              <p>@if(!empty($detail)){{ $detail->about }} @else - @endif</p>
            </div>
            @endif

            <div class="profile_sec_one">
              <div class="edit_Wrapp">
              <a href="{{URL::to('/edit-profile')}}">  <span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
              </div>
              <h3>Basics & Lifestyle</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Age</span>
                      <span class="answr">:
                        @if(!empty($detail->age))
                        {{ $detail->age }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Date of Birth</span>
                      <span class="answr">:
                        @if(!empty($detail->dateOfBirth))
                        {{ $d = date("d-M-Y", strtotime($detail->dateOfBirth)) }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Marital Status</span>
                      <span class="answr">:
                        @if(!empty($detail->maritalStatus))
                        @if($detail->maritalStatus == 1)
                        Never Married
                        @endif
                        @if($detail->maritalStatus == 2)
                        Divorced
                        @endif
                        @if($detail->maritalStatus == 3)
                        Awaiting Divorce
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Height</span>
                      <span class="answr">:
                        @if(!empty($detail->heightdetail))
                         {{ $detail->heightdetail->inch }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Grew up in</span>
                      <span class="answr">:@if(!empty($location->grewUpdetail)){{ $location->grewUpdetail->name }} @endif</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Diet</span>
                      <span class="answr">:
                        @if(!empty($detail->diet))
                        @if($detail->diet == 1)
                        Veg
                        @endif
                        @if($detail->diet == 2)
                        Non-Veg
                        @endif
                        @if($detail->diet == 3)
                      Occasionally Non-Veg
                        @endif
                        @if($detail->diet == 4)
                      Eggetarian
                        @endif
                        @if($detail->diet == 5)
                        Jain
                        @endif
                        @if($detail->diet == 6)
                        Vegan
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <!-- <div class="flex_details_span">
                      <span class="quest">Personal Values</span>
                      <span class="answr">:Will tell you later</span>
                    </div> -->
                    <!-- <div class="flex_details_span">
                      <span class="quest">Sun Sign</span>
                      <span class="answr">:Sagittarius</span>
                    </div> -->
                    <div class="flex_details_span">
                      <span class="quest">Blood Group</span>
                      <span class="answr">:
                        @if(!empty($detail->bloodGroup))
                        @if(isset($detail->bloodGroup))
                        {{ $detail->bloodGroup }}
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <!-- <div class="flex_details_span">
                      <span class="quest">Health Information</span>
                      <span class="answr">:Not Specified</span>
                    </div> -->
                    <!-- <div class="flex_details_span">
                      <span class="quest">Disability</span>
                      <span class="answr">:None</span>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                    <a href="{{URL::to('/edit-profile')}}">  <span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <div class="row">
                <div class="col-md-6">
                  <h3>Religious Background</h3>
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Religion</span>
                      <span class="answr">:
                        @if(!empty($religion->religiondetail))
                         {{ ucwords($religion->religiondetail->name) }}
                         @else
                         -
                        @endif

                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Community</span>
                      <span class="answr">:
                        @if(!empty($religion->communitydetail))
                        {{ ucwords($religion->communitydetail->name) }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Sub community</span>
                      <span class="answr">: @if(isset($religion->subCommunity)){{ $religion->subCommunity  }} @endif</span>
                    </div>

                    <div class="flex_details_span">
                      <span class="quest">Mother Tongue</span>
                      <span class="answr">:
                        @if(!empty($religion->motherTonguedetail))
                         {{ ucwords($religion->motherTonguedetail->name)  }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h3>Astro Details</h3>
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Date of Birth</span>
                      <span class="answr">:
                        @if(!empty($detail->dateOfBirth))
                        {{ $d = date("d-M-Y", strtotime($detail->dateOfBirth)) }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Time of Birth</span>
                      <span class="answr">:
                        @if(!empty($birth->birthHours))
                        {{ $birth->birthHours }}:{{ $birth->birthminute }} {{ $birth->birthAmPm }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">City of Birth</span>
                      <span class="answr">: @if(!empty($birth->birthCity)){{ $birth->birthCity  }} @else - @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Manglik</span>
                      <span class="answr">:
                        @if(!empty($birth->manglik))
                         @if($birth->manglik == 1)
                          Yes
                         @endif
                         @if($birth->manglik == 2)
                          No
                         @endif
                         @if($birth->manglik == 3)
                         Don't Know
                         @endif
                        @else
                        -
                        @endif</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                  <a href="{{URL::to('/edit-profile')}}"> <span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <h3>Family details</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Father's Status</span>
                      <span class="answr">:
                        @if(!empty($family->fatherStatus))
                        @if($family->fatherStatus == 1)
                        Employed
                        @endif
                        @if($family->fatherStatus == 2)
                        Business
                        @endif
                        @if($family->fatherStatus == 3)
                        Retired
                        @endif
                        @if($family->fatherStatus == 4)
                        Not Employed
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Mother's Status</span>
                      <span class="answr">:
                        @if(!empty($family->motherStatus))
                        @if($family->motherStatus == 1)
                        Employed
                        @endif
                        @if($family->motherStatus == 2)
                        Business
                        @endif
                        @if($family->motherStatus == 3)
                        Retired
                        @endif
                        @if($family->motherStatus == 4)
                        Not Employed
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Family Location</span>
                      <span class="answr">:
                        @if(!empty($family->familyLocation))
                        {{ $family->familyLocation }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Native Place</span>
                      <span class="answr">:
                        @if(!empty($family->nativePlace))
                        {{ $family->nativePlace }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">No. of Siblings</span>
                      <span class="answr">:
                        @if(!empty($family->sibling))
                        {{ $family->sibling }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Family Type</span>
                      <span class="answr">:
                        @if(!empty($family->familyType))
                        @if($family->familyType == 1)
                        Joint
                        @endif
                        @if($family->familyType == 2)
                        Nuclear
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                  <a href="{{URL::to('/edit-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <h3>Education & Career</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Highest Qualification</span>
                      <span class="answr">:
                        @if(!empty($education->educationdetail))
                      {{ $education->educationdetail->name }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Annual Income</span>
                      <span class="answr">:
                        @if(!empty($education->income))
                        @if($education->income == 1) Upto INR 1 Lakh @endif
                        @if($education->income == 2) INR 1 Lakh to 2 Lakh @endif
                        @if($education->income == 3) INR 2 Lakh to 4 Lakh @endif
                        @if($education->income == 4) INR 4 Lakh to 7 Lakh @endif
                        @if($education->income == 5) INR 7 Lakh to 10 Lakh @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Working With</span>
                      <span class="answr">:
                        @if(!empty($education->workingWith))
                        @if($education->workingWith == 1) Private Company @endif
                        @if($education->workingWith == 2) Government / Public Sector @endif
                        @if($education->workingWith == 3) Defense / Civil Services @endif
                        @if($education->workingWith == 4) Business / Self Employed @endif
                        @if($education->workingWith == 5) Not Working @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Working As</span>
                      <span class="answr">:
                        @if(!empty($education->workingAsdetail))
                        {{ $education->workingAsdetail->name }}
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Employer Name</span>
                      <span class="answr">: {{ $education->employerName ?? "-"}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <a href="{{URL::to('/edit-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>

                    </div>
              <h3>Location of Groom</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Current Residence</span>
                      <span class="answr">: @if(!empty($location->countrydetail)) {{ $location->countrydetail->name }} @else - @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">State Of Residence</span>
                      <span class="answr">: @if(!empty($location->statedetail)) {{ $location->statedetail->name }} @else - @endif</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">City of Residency</span>
                      <span class="answr">: @if(!empty($location->citydetail)) {{ $location->citydetail->name }} @else - @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Postal Zip Code</span>
                      <span class="answr">: @if(!empty($location->pincode)) {{ $location->pincode }} @else - @endif</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                  <a href="{{URL::to('/edit-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <h3>Hobbies, Interests & more</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Hobbies</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Interests</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Favourite Music</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Favourite Reads</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Preferred Movies</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Sports / Fitness Activities</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Favourite Cuisine</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Preferred Dress Style</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
              </div>

              <div id="pane-B" class="tab-pane fade">

                  <div class="profile_sec_one ">
                    <div class="edit_Wrapp">
                    <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <h3>Basic Info</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Age</span>
                      <span class="answr">:@if($partner) {{ $partner->ageMin  }} to {{ $partner->ageMax  }} @endif</span>
                    </div>
                    <!-- <div class="flex_details_span">
                      <span class="quest">Height</span>
                      <span class="answr">: 5' 0"(152cm) to 5' 6"(167cm)</span>
                    </div> -->
                    <div class="flex_details_span">
                      <span class="quest">Religion / Community</span>
                      <span class="answr">:
                        @if(!empty($partner->religiondetail))
                        {{ $partner->religiondetail->name }}
                        @else
                        -
                        @endif

                        /
                        @if(!empty($partner->communitydetail))
                            {{ $partner->communitydetail->name }}
                            @else
                            -
                            @endif
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Mother tongue</span>
                      <span class="answr">:
                        @if(!empty($partner->motherTonguedetail))
                         {{ ucwords($partner->motherTonguedetail->name)  }}
                        @else
                        -
                        @endif

                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Marital status</span>
                      <span class="answr">:
                        @if(!empty($partner->maritalStatus))
                        @if($partner->maritalStatus == 1)
                        Never Married
                        @endif
                        @if($partner->maritalStatus == 2)
                        Divorced
                        @endif
                        @if($partner->maritalStatus == 3)
                        Awaiting Divorce
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>

                    </div>
              <h3>Location Details</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Country living in</span>
                      <span class="answr">: @if(!empty($partner->countrydetail)) {{ $partner->countrydetail->name }} @else - @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">State living in</span>
                      <span class="answr">: @if(!empty($partner->statedetail)) {{ $partner->statedetail->name }} @else - @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">City / District</span>
                      <span class="answr">: @if(!empty($partner->citydetail)) {{ $partner->citydetail->name }} @else - @endif</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one bottom_space">
                    <div class="edit_Wrapp">
                      <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>

                    </div>
              <h3>Education & Career</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Education</span>
                      <span class="answr">:
                        @if(!empty($partner->educationdetail))
                      {{ $partner->educationdetail->name }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Working with</span>
                      <span class="answr">:
                        @if(!empty($partner->workingWith))
                        @if($partner->workingWith == 1) Private Company @endif
                        @if($partner->workingWith == 2) Government / Public Sector @endif
                        @if($partner->workingWith == 3) Defense / Civil Services @endif
                        @if($partner->workingWith == 4) Business / Self Employed @endif
                        @if($partner->workingWith == 5) Not Working @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <!-- <div class="flex_details_span">
                      <span class="quest">Profession area</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div> -->
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <!-- <div class="flex_details_span">
                      <span class="quest">Working as</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div> -->
                    <div class="flex_details_span">
                      <span class="quest">Annual income</span>
                      <span class="answr">:
                        @if(!empty($partner->income))
                        @if($partner->income == 1) Upto INR 1 Lakh @endif
                        @if($partner->income == 2) INR 1 Lakh to 2 Lakh @endif
                        @if($partner->income == 3) INR 2 Lakh to 4 Lakh @endif
                        @if($partner->income == 4) INR 4 Lakh to 7 Lakh @endif
                        @if($partner->income == 5) INR 7 Lakh to 10 Lakh @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>


              </div>

              <div id="pane-C" class="tab-pane fade">

                <div class="profile_sec_one bottom_space">
                    <div class="edit_Wrapp">
                      <a href="{{URL::to('/contact-details')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>


                    </div>
              <h3>My Contact detail</h3>
              <div class="row">
                <div class="col-md-12">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Mobile</span>
                      <span class="answr">: @if(!empty($contact->mobile)){{ $contact->mobile }} @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Contact Person</span>
                      <span class="answr">: @if(!empty($contact->nameContactPerson)){{ $contact->nameContactPerson }} @endif</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Relationship with the member</span>
                      <span class="answr">:
                        @if(!empty($contact->relationWithMember))
                        @if($contact->relationWithMember == 1)
                         Self
                        @endif
                        @if($contact->relationWithMember == 2)
                         Parent
                        @endif
                        @if($contact->relationWithMember == 3)
                         Guardian
                        @endif
                        @if($contact->relationWithMember == 4)
                         Sibling
                        @endif
                        @if($contact->relationWithMember == 5)
                         Friend
                        @endif
                        @if($contact->relationWithMember == 6)
                         Relative
                        @endif
                        @if($contact->relationWithMember == 7)
                         Other
                        @endif
                        @else
                        -
                        @endif
                      </span>
                    </div>
                    <!-- <div class="flex_details_span">
                      <span class="quest">Convenient Time to Call</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Display Option</span>
                      <span class="answr">: You have chosen to display your contact details to all premium members.</span>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

              </div>
          </div>
      </div>

    </div>
  </div>
</section>
@include('layouts.footer')
