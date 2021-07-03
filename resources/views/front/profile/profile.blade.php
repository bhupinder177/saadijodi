@include('layouts.header')

<section class="profile_wrapp">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-4">
        <div class="sidebar-item">
          <div class="make-me-sticky">

            <div class="container_image_select">
               <img src="{{ asset('front/images/4.jpeg') }}" style="width:100%">
            </div>

            <div class="column">
              <img src="{{ asset('front/images/3.jpeg') }}" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
              <img src="{{ asset('front/images/3.jpeg') }}" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
              <img src="{{ asset('front/images/3.jpeg') }}" style="width:100%" onclick="myFunction(this);">
            </div>
            <div class="column">
              <img src="{{ asset('front/images/3.jpeg') }}" style="width:100%" onclick="myFunction(this);">
            </div>
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
                  <h3>My Contact detail</h3></a>
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
                    <div class="profile_pic">
                      <img src="{{ asset('front/images/user.jpg') }}">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="pr_details">
                      <div class="flex_details_span">
                        <span class="quest">Age / Height</span>
                        <span class="answr">:22 /
                          @if($detail->height == 1)
            4' 5"
            @endif
            @if($detail->height == 2)
            4' 6"
            @endif
            @if($detail->height == 3)
            4' 7"
            @endif
            @if($detail->height == 4)
            4' 8"
            @endif
            @if($detail->height == 5)
            4' 9"
            @endif
            @if($detail->height == 6)
            4' 10"
            @endif
            @if($detail->height == 7)
            4' 11"
            @endif
            @if($detail->height == 8)
            5'
            @endif
            @if($detail->height == 9)
            5' 1"
            @endif
            @if($detail->height == 10)
            5' 2"
            @endif
            @if($detail->height == 11)
            5' 3"
            @endif
            @if($detail->height == 12)
            5' 4"
            @endif
            @if($detail->height == 13)
            5' 5"
            @endif
            @if($detail->height == 14)
            5' 6"
            @endif
            @if($detail->height == 15)
            5' 7"
            @endif
            @if($detail->height == 16)
            5' 8"
            @endif
            @if($detail->height == 17)
            5' 9"
            @endif
            @if($detail->height == 18)
            5' 10"
            @endif
            @if($detail->height == 19)
            5' 11"
            @endif
            @if($detail->height == 20)
            6'
            @endif
            @if($detail->height == 21)
            6' 1"
            @endif
            @if($detail->height == 22)
            6' 2"
            @endif
            @if($detail->height == 23)
            6' 3"
            @endif
            @if($detail->height == 24)
            6' 4"
            @endif
            @if($detail->height == 25)
            6' 5"
            @endif
            @if($detail->height == 26)
            6' 6"
            @endif
            @if($detail->height == 27)
            6' 7"
            @endif
            @if($detail->height == 28)
            6' 8"
            @endif
            @if($detail->height == 29)
            6' 9"
            @endif
            @if($detail->height == 30)
            6' 10"
            @endif
            @if($detail->height == 31)
            6' 11"
            @endif
            @if($detail->height == 32)
            7'
            @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Marital Status</span>
                        <span class="answr">:
                          @if($detail->maritalStatus == 1)
                          Never Married
                          @endif
                          @if($detail->maritalStatus == 2)
                          Divorced
                          @endif
                          @if($detail->maritalStatus == 3)
                          Awaiting Divorce
                          @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Posted by</span>
                        <span class="answr">:
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
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Location</span>
                        <span class="answr">:Punjab</span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Mother Tongue</span>
                        <span class="answr">:
                          @if($religion->motherTongue == 1)
                          Hindi
                          @endif
                          @if($religion->motherTongue == 2)
                          Marathi
                          @endif
                          @if($religion->motherTongue == 3)
                          Punjabi
                          @endif
                          @if($religion->motherTongue == 4)
                          Bengali
                          @endif
                          @if($religion->motherTongue == 5)
                          Gujarati
                          @endif
                          @if($religion->motherTongue == 6)
                          Urdu
                          @endif

                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Religion / Community</span>
                        <span class="answr">:
                          @if($religion->religion == 1)
                          Hindu
                          @endif
                          @if($religion->religion == 2)
                          Muslim
                          @endif
                          @if($religion->religion == 3)
                          Christian
                          @endif
                          @if($religion->religion == 4)
                          Sikh
                          @endif
                          @if($religion->religion == 5)
                          Parsi
                          @endif
                          @if($religion->community == 1)
                          / Rajput
                          @endif
                          @if($religion->community == 2)
                          / Punjabi
                          @endif
                          @if($religion->community == 3)
                          / Awaiting Divorce
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
              <h3>Personality, Family Details, Career, Partner Expectations etc.</h3>
              <p>{{ $detail->about }}</p>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <span class="edit_details">Edit <i class="fa fa-edit"></i></span>
                    </div>
              <h3>Basics & Lifestyle</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Age</span>
                      <span class="answr">:22</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Date of Birth</span>
                      <span class="answr">:{{ $d = date("d-M-Y", strtotime($detail->dateOfBirth)) }}</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Marital Status</span>
                      <span class="answr">:
                        @if($detail->maritalStatus == 1)
                        Never Married
                        @endif
                        @if($detail->maritalStatus == 2)
                        Divorced
                        @endif
                        @if($detail->maritalStatus == 3)
                        Awaiting Divorce
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Height</span>
                      <span class="answr">:
                                    @if($detail->height == 1)
                      4' 5" (135cm)
                      @endif
                      @if($detail->height == 2)
                      4' 6" (137cm)
                      @endif
                      @if($detail->height == 3)
                      4' 7" (140cm)
                      @endif
                      @if($detail->height == 4)
                      4' 8" (142cm)
                      @endif
                      @if($detail->height == 5)
                      4' 9" (145cm)
                      @endif
                      @if($detail->height == 6)
                      4' 10" (147cm)
                      @endif
                      @if($detail->height == 7)
                      4' 11" (150cm)
                      @endif
                      @if($detail->height == 8)
                      5' (152cm)
                      @endif
                      @if($detail->height == 9)
                      5' 1" (155cm)
                      @endif
                      @if($detail->height == 10)
                      5' 2" (157cm)
                      @endif
                      @if($detail->height == 11)
                      5' 3" (160cm)
                      @endif
                      @if($detail->height == 12)
                      5' 4" (163cm)
                      @endif
                      @if($detail->height == 13)
                      5' 5" (165cm)
                      @endif
                      @if($detail->height == 14)
                      5' 6" (168cm)
                      @endif
                      @if($detail->height == 15)
                      5' 7" (170cm)
                      @endif
                      @if($detail->height == 16)
                      5' 8" (173cm)
                      @endif
                      @if($detail->height == 17)
                      5' 9" (175cm)
                      @endif
                      @if($detail->height == 18)
                      5' 10" (178cm)
                      @endif
                      @if($detail->height == 19)
                      5' 11" (180cm)
                      @endif
                      @if($detail->height == 20)
                      6' (182cm)
                      @endif
                      @if($detail->height == 21)
                      6' 1" (185cm)
                      @endif
                      @if($detail->height == 22)
                      6' 2" (188cm)
                      @endif
                      @if($detail->height == 23)
                      6' 3" (190cm)
                      @endif
                      @if($detail->height == 24)
                      6' 4" (193cm)
                      @endif
                      @if($detail->height == 25)
                      6' 5" (196cm)
                      @endif
                      @if($detail->height == 26)
                      6' 6" (198cm)
                      @endif
                      @if($detail->height == 27)
                      6' 7" (201cm)
                      @endif
                      @if($detail->height == 28)
                      6' 8" (203cm)
                      @endif
                      @if($detail->height == 29)
                      6' 9" (206cm)
                      @endif
                      @if($detail->height == 30)
                      6' 10" (208cm)
                      @endif
                      @if($detail->height == 31)
                      6' 11" (211cm)
                      @endif
                      @if($detail->height == 32)
                      7' (213cm)
                      @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Grew up in</span>
                      <span class="answr">:India</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Diet</span>
                      <span class="answr">:
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
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Personal Values</span>
                      <span class="answr">:Will tell you later</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Sun Sign</span>
                      <span class="answr">:Sagittarius</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Blood Group</span>
                      <span class="answr">:
                        @if(isset($detail->bloodGroup))
                        {{ $detail->bloodGroup }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Health Information</span>
                      <span class="answr">:Not Specified</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Disability</span>
                      <span class="answr">:None</span>
                    </div>
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
                        @if($religion->religion == 1)
                        Hindu
                        @endif
                        @if($religion->religion == 2)
                        Muslim
                        @endif
                        @if($religion->religion == 3)
                        Christian
                        @endif
                        @if($religion->religion == 4)
                        Sikh
                        @endif
                        @if($religion->religion == 5)
                        Parsi
                        @endif

                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Community</span>
                      <span class="answr">:
                        @if($religion->community == 1)
                        Rajput
                        @endif
                        @if($religion->community == 2)
                        Punjabi
                        @endif
                        @if($religion->community == 3)
                        Awaiting Divorce
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
                        @if($religion->motherTongue == 1)
                        Hindi
                        @endif
                        @if($religion->motherTongue == 2)
                        Marathi
                        @endif
                        @if($religion->motherTongue == 3)
                        Punjabi
                        @endif
                        @if($religion->motherTongue == 4)
                        Bengali
                        @endif
                        @if($religion->motherTongue == 5)
                        Gujarati
                        @endif
                        @if($religion->motherTongue == 6)
                        Urdu
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
                      <span class="answr">:{{ $d = date("d-M-Y", strtotime($detail->dateOfBirth)) }}</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Time of Birth</span>
                      <span class="answr">: 04 :04 AM</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">City of Birth</span>
                      <span class="answr">: Mohali</span>
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
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Mother's Status</span>
                      <span class="answr">:
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
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Family Location</span>
                      <span class="answr">: {{ $family->familyLocation }}</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Native Place</span>
                      <span class="answr">: {{ $family->nativePlace }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">No. of Siblings</span>
                      <span class="answr">:{{ $family->sibling }} </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Family Type</span>
                      <span class="answr">:
                        @if($family->familyType == 1)
                        Joint
                        @endif
                        @if($family->familyType == 2)
                        Nuclear
                        @endif
                        @if($family->familyType == 3)
                        Joint
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
                      <span class="answr">: High school</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">College(s) Attended</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Annual Income</span>
                      <span class="answr">: INR 4 Lakh to 7 Lakh</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Working With</span>
                      <span class="answr">: Private Company</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Working As</span>
                      <span class="answr">: Web / UX Designers</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Employer Name</span>
                      <span class="answr">: Enter Now</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <span class="edit_details">Edit <i class="fa fa-edit"></i></span>
                    </div>
              <h3>Location of Groom</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Current Residence</span>
                      <span class="answr">: Other, India</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">State Of Residence</span>
                      <span class="answr">: Punjab</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Residency Status</span>
                      <span class="answr">: Citizen</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Zip / Pin code</span>
                      <span class="answr">: Not Specified</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
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
            </div>
              </div>

              <div id="pane-B" class="tab-pane fade">

                  <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                    <a href="{{URL::to('/edit-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
                    </div>
              <h3>Basic Info</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Age</span>
                      <span class="answr">: 19 to 32</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Height</span>
                      <span class="answr">: 5' 0"(152cm) to 5' 6"(167cm)</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Religion / Community</span>
                      <span class="answr">: Hindu</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Mother tongue</span>
                      <span class="answr">: Hindi, Punjabi</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Marital status</span>
                      <span class="answr">: Never Married</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <span class="edit_details">Edit <i class="fa fa-edit"></i></span>
                    </div>
              <h3>Location Details</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Country living in</span>
                      <span class="answr">: India</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">State living in</span>
                      <span class="answr">: Chandigarh, Delhi-NCR, Punjab</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">City / District</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <span class="edit_details">Edit <i class="fa fa-edit"></i></span>
                    </div>
              <h3>Education & Career</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Education</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Working with</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Profession area</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Working as</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Annual income</span>
                      <span class="answr">: INR less than 1 lakh to 7 lakhs.</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <span class="edit_details">Edit <i class="fa fa-edit"></i></span>
                    </div>
              <h3>Other Details</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Profile created by</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Diet</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              </div>

              <div id="pane-C" class="tab-pane fade">

                <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                      <span class="edit_details">Edit <i class="fa fa-edit"></i></span>
                    </div>
              <h3>My Contact detail</h3>
              <div class="row">
                <div class="col-md-12">
                  <div class="pr_details">
                    <div class="flex_details_span">
                      <span class="quest">Mobile</span>
                      <span class="answr">: +91-9876543210</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Contact Person</span>
                      <span class="answr">: +91-9876543210</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Relationship with the member</span>
                      <span class="answr">: +91-9876543210</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Convenient Time to Call</span>
                      <span class="answr">: Doesn't Matter</span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Display Option</span>
                      <span class="answr">: You have chosen to display your contact details to all premium members.</span>
                    </div>
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
