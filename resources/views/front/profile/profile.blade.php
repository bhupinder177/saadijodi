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
                        <span class="answr">:
                          22
                          @if(!empty($detail))
                          /
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
            @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Marital Status</span>
                        <span class="answr">:
                          @if(!empty($detail))
                          @if($detail->maritalStatus == 1)
                          Never Married
                          @endif
                          @if($detail->maritalStatus == 2)
                          Divorced
                          @endif
                          @if($detail->maritalStatus == 3)
                          Awaiting Divorce
                          @endif
                          @endif
                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Posted by</span>
                        <span class="answr">:
                          @if(!empty($detail))
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
                          @if(!empty($religion))
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
                          @endif

                        </span>
                      </div>
                      <div class="flex_details_span">
                        <span class="quest">Religion / Community</span>
                        <span class="answr">:
                          @if(!empty($religion))
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
              <p>@if(!empty($detail)){{ $detail->about }} @endif</p>
            </div>
            @endif

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
                      <span class="answr">:
                        @if(!empty($detail))
                        {{ $d = date("d-M-Y", strtotime($detail->dateOfBirth)) }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Marital Status</span>
                      <span class="answr">:
                        @if(!empty($detail))
                        @if($detail->maritalStatus == 1)
                        Never Married
                        @endif
                        @if($detail->maritalStatus == 2)
                        Divorced
                        @endif
                        @if($detail->maritalStatus == 3)
                        Awaiting Divorce
                        @endif
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Height</span>
                      <span class="answr">:
                        @if(!empty($detail))
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
                        @if(!empty($detail))
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
                        @if(!empty($detail))
                        @if(isset($detail->bloodGroup))
                        {{ $detail->bloodGroup }}
                        @endif
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
                        @if(!empty($religion))
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
                        @endif

                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Community</span>
                      <span class="answr">:
                        @if(!empty($religion))
                        @if($religion->community == 1)
                        Rajput
                        @endif
                        @if($religion->community == 2)
                        Punjabi
                        @endif
                        @if($religion->community == 3)
                        Awaiting Divorce
                        @endif
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
                        @if(!empty($religion))
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
                        @if(!empty($detail))
                        {{ $d = date("d-M-Y", strtotime($detail->dateOfBirth)) }}
                        @endif
                      </span>
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
                        @if(!empty($family))
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
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Mother's Status</span>
                      <span class="answr">:
                        @if(!empty($family))
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
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Family Location</span>
                      <span class="answr">:
                        @if(!empty($family))
                        {{ $family->familyLocation }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Native Place</span>
                      <span class="answr">:
                        @if(!empty($family))
                        {{ $family->nativePlace }}
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
                        @if(!empty($family))
                        {{ $family->sibling }}
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Family Type</span>
                      <span class="answr">:
                        @if(!empty($family))
                        @if($family->familyType == 1)
                        Joint
                        @endif
                        @if($family->familyType == 2)
                        Nuclear
                        @endif
                        @if($family->familyType == 3)
                        Joint
                        @endif
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
                        @if(!empty($education))
                        @if($education->highestQualification == 1) B.E / B.Tech @endif
                        @if($education->highestQualification == 2) M.E / M.Tech @endif
                        @if($education->highestQualification == 3) M.S Engineering @endif
                        @if($education->highestQualification == 4) B.Eng (Hons) @endif
                        @if($education->highestQualification == 5) M.Eng (Hons) @endif
                        @if($education->highestQualification == 6) Engineering Diploma @endif
                        @if($education->highestQualification == 7) AE @endif
                        @if($education->highestQualification == 8) AET @endif
                        @if($education->highestQualification == 9) B.A @endif
                        @if($education->highestQualification == 10) B.Ed @endif
                        @if($education->highestQualification == 11) BJMC @endif
                        @if($education->highestQualification == 12) BFA @endif
                        @if($education->highestQualification == 13) B.Arch @endif
                        @if($education->highestQualification == 14) B.Des @endif
                        @if($education->highestQualification == 15) BMM @endif
                        @if($education->highestQualification == 16) MFA @endif
                        @if($education->highestQualification == 17) M.Ed @endif
                        @if($education->highestQualification == 18) M.A @endif
                        @if($education->highestQualification == 19) MSW @endif
                        @if($education->highestQualification == 20) MJMC @endif
                        @if($education->highestQualification == 21) M.Arch @endif
                        @if($education->highestQualification == 22) M.Des @endif
                        @if($education->highestQualification == 23) BA (Hons)@endif
                        @if($education->highestQualification == 24) B.Arch (Hons) @endif
                        @if($education->highestQualification == 25) DFA @endif
                        @if($education->highestQualification == 26) D.Ed @endif
                        @if($education->highestQualification == 27) D.Arch @endif
                        @if($education->highestQualification == 28) AA @endif
                        @if($education->highestQualification == 29) AFA @endif
                        @if($education->highestQualification == 30) B.Com @endif
                        @if($education->highestQualification == 31) CA / CPA @endif
                        @if($education->highestQualification == 32) CFA @endif
                        @if($education->highestQualification == 33) CS @endif
                        @if($education->highestQualification == 34) BSc / BFin @endif
                        @if($education->highestQualification == 35) M.Com @endif
                        @if($education->highestQualification == 36) MSc / MFin / MS @endif
                        @if($education->highestQualification == 37) BCom (Hons) @endif
                        @if($education->highestQualification == 38) PGD Finance @endif
                        @if($education->highestQualification == 39) BCA @endif
                        @if($education->highestQualification == 40) B.IT @endif
                        @if($education->highestQualification == 41) BCS @endif
                        @if($education->highestQualification == 42) BA Computer Science @endif
                        @if($education->highestQualification == 43) MCA @endif
                        @if($education->highestQualification == 44) PGDCA @endif
                        @if($education->highestQualification == 45) IT Diploma @endif
                        @if($education->highestQualification == 46) ADIT @endif
                        @if($education->highestQualification == 47) B.Sc @endif
                        @if($education->highestQualification == 48) M.Sc @endif
                        @if($education->highestQualification == 49) BSc (Hons) @endif
                        @if($education->highestQualification == 50) DipSc @endif
                        @if($education->highestQualification == 51) AS @endif
                        @if($education->highestQualification == 52) AAS @endif
                        @if($education->highestQualification == 53) MBBS @endif
                        @if($education->highestQualification == 54) BDS @endif
                        @if($education->highestQualification == 55) BPT @endif
                        @if($education->highestQualification == 56) BAMS @endif
                        @if($education->highestQualification == 57) BHMS @endif
                        @if($education->highestQualification == 58) B.Pharma @endif
                        @if($education->highestQualification == 59) BVSc @endif
                        @if($education->highestQualification == 60) BSN / BScN @endif
                        @if($education->highestQualification == 61) MDS @endif
                        @if($education->highestQualification == 62) MCh @endif
                        @if($education->highestQualification == 63) M.D @endif
                        @if($education->highestQualification == 64) M.S Medicine @endif
                        @if($education->highestQualification == 65) MPT @endif
                        @if($education->highestQualification == 66) DM @endif
                        @if($education->highestQualification == 67) M.Pharma @endif
                        @if($education->highestQualification == 68) MVSc @endif
                        @if($education->highestQualification == 69) MMed @endif
                        @if($education->highestQualification == 70) PGD Medicine @endif
                        @if($education->highestQualification == 71) ADN @endif
                        @if($education->highestQualification == 72) BBA @endif
                        @if($education->highestQualification == 73) BHM @endif
                        @if($education->highestQualification == 74) BBM @endif
                        @if($education->highestQualification == 75) MBA @endif
                        @if($education->highestQualification == 76) PGDM @endif
                        @if($education->highestQualification == 77) ABA @endif
                        @if($education->highestQualification == 78) ADBus @endif
                        @if($education->highestQualification == 79) BL / LLB @endif
                        @if($education->highestQualification == 80) ML / LLM @endif
                        @if($education->highestQualification == 81) LLB (Hons) @endif
                        @if($education->highestQualification == 82) ALA @endif
                        @if($education->highestQualification == 83) Ph.D @endif
                        @if($education->highestQualification == 84) M.Phil @endif
                        @if($education->highestQualification == 85) Bachelor @endif
                        @if($education->highestQualification == 86) Master @endif
                        @if($education->highestQualification == 87) Diploma @endif
                        @if($education->highestQualification == 88) Honours @endif
                        @if($education->highestQualification == 89) Doctorate @endif
                        @if($education->highestQualification == 90) Associate @endif
                        @if($education->highestQualification == 91) High school @endif
                        @if($education->highestQualification == 92) Less than high school @endif
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Annual Income</span>
                      <span class="answr">:
                        @if(!empty($education))
                        @if($education->income == 1) Upto INR 1 Lakh @endif
                        @if($education->income == 2) INR 1 Lakh to 2 Lakh @endif
                        @if($education->income == 3) INR 2 Lakh to 4 Lakh @endif
                        @if($education->income == 4) INR 4 Lakh to 7 Lakh @endif
                        @if($education->income == 5) INR 7 Lakh to 10 Lakh @endif
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
                        @if(!empty($education))
                        @if($education->workingWith == 1) Private Company @endif
                        @if($education->workingWith == 2) Government / Public Sector @endif
                        @if($education->workingWith == 3) Defense / Civil Services @endif
                        @if($education->workingWith == 4) Business / Self Employed @endif
                        @if($education->workingWith == 5) Not Working @endif
                        @endif
                      </span>
                    </div>
                    <div class="flex_details_span">
                      <span class="quest">Working As</span>
                      <span class="answr">:
                        @if(!empty($education))
                        @if($education->workingAs == 1) Banking Professional @endif
                        @if($education->workingAs == 2) Chartered Accountant @endif
                        @if($education->workingAs == 3) Company Secretary @endif
                        @if($education->workingAs == 4) Finance Professional @endif
                        @if($education->workingAs == 5) Investment Professional @endif
                        @if($education->workingAs == 6) Accounting Professional (Others) @endif
                        @if($education->workingAs == 7) Admin Professional @endif
                        @if($education->workingAs == 8) Human Resources Professional @endif
                        @if($education->workingAs == 9) Actor @endif
                        @if($education->workingAs == 10) Advertising Professional @endif
                        @if($education->workingAs == 11) Entertainment Professional @endif
                        @if($education->workingAs == 12) Event Manager @endif
                        @if($education->workingAs == 13) Journalist @endif
                        @if($education->workingAs == 14) Media Professional @endif
                        @if($education->workingAs == 15) Public Relations Professional @endif
                        @if($education->workingAs == 16) Farming @endif
                        @if($education->workingAs == 17) Horticulturist @endif
                        @if($education->workingAs == 18) Agricultural Professional (Others) @endif
                        @if($education->workingAs == 19) Air Hostess / Flight Attendant @endif
                        @if($education->workingAs == 20) Pilot / Co-Pilot @endif
                        @if($education->workingAs == 21) Other Airline Professional @endif
                        @if($education->workingAs == 22) Architect @endif
                        @if($education->workingAs == 23) Interior Designer @endif
                        @if($education->workingAs == 24) Landscape Architect @endif
                        @if($education->workingAs == 25) Animator @endif
                        @if($education->workingAs == 26) Commercial Artist @endif
                        @if($education->workingAs == 27) Web / UX Designers @endif
                        @if($education->workingAs == 28) Artist (Others) @endif
                        @if($education->workingAs == 29) Beautician @endif
                        @if($education->workingAs == 30) Fashion Designer @endif
                        @if($education->workingAs == 31) Hairstylist @endif
                        @if($education->workingAs == 32) Jewellery Designer @endif
                        @if($education->workingAs == 33) Designer (Others) @endif
                        @if($education->workingAs == 34) Customer Support / BPO / KPO Professional @endif
                        @if($education->workingAs == 35) IAS / IRS / IES / IFS @endif
                        @if($education->workingAs == 36) Indian Police Services (IPS) @endif
                        @if($education->workingAs == 37) Law Enforcement Employee (Others) @endif
                        @if($education->workingAs == 38) Airforce @endif
                        @if($education->workingAs == 39) Army @endif
                        @if($education->workingAs == 40) Navy @endif
                        @if($education->workingAs == 41) Defense Services (Others) @endif
                        @if($education->workingAs == 42) Lecturer @endif
                        @if($education->workingAs == 43) Professor @endif
                        @if($education->workingAs == 44) Research Assistant @endif
                        @if($education->workingAs == 45) Research Scholar @endif
                        @if($education->workingAs == 46) Teacher @endif
                        @if($education->workingAs == 47) Training Professional (Others) @endif
                        @if($education->workingAs == 48) Civil Engineer @endif
                        @if($education->workingAs == 49) Electronics / Telecom Engineer @endif
                        @if($education->workingAs == 50) Mechanical / Production Engineer @endif
                        @if($education->workingAs == 51) Non IT Engineer (Others) @endif
                        @if($education->workingAs == 52) Chef / Sommelier / Food Critic @endif
                        @if($education->workingAs == 53) Catering Professional @endif
                        @if($education->workingAs == 54) Hotel &amp; Hospitality Professional (Others) @endif
                        @if($education->workingAs == 55) Software Developer / Programmer @endif
                        @if($education->workingAs == 56) Software Consultant @endif
                        @if($education->workingAs == 57) Hardware &amp; Networking professional @endif
                        @if($education->workingAs == 58) Software Professional (Others) @endif
                        @if($education->workingAs == 59) Lawyer @endif
                        @if($education->workingAs == 60) Legal Assistant @endif
                        @if($education->workingAs == 61) Legal Professional (Others) @endif
                        @if($education->workingAs == 62) Dentist @endif
                        @if($education->workingAs == 63) Doctor @endif
                        @if($education->workingAs == 64) Medical Transcriptionist @endif
                        @if($education->workingAs == 65) Nurse @endif
                        @if($education->workingAs == 66) Pharmacist @endif
                        @if($education->workingAs == 67) Physician Assistant @endif
                        @if($education->workingAs == 68) Psychologist @endif
                        @if($education->workingAs == 69) Surgeon @endif
                        @if($education->workingAs == 70) Veterinary Doctor @endif
                        @if($education->workingAs == 71) Therapist (Others) @endif
                        @if($education->workingAs == 72) Medical / Healthcare Professional (Others) @endif
                        @if($education->workingAs == 73) Merchant Naval Officer @endif
                        @if($education->workingAs == 74) Mariner @endif
                        @if($education->workingAs == 75) Marketing Professional @endif
                        @if($education->workingAs == 76) Sales Professional @endif
                        @if($education->workingAs == 77) Biologist / Botanist @endif
                        @if($education->workingAs == 78) Physicist @endif
                        @if($education->workingAs == 79) Science Professional (Others) @endif
                        @if($education->workingAs == 80) CxO / Chairman / Director / President @endif
                        @if($education->workingAs == 81) VP / AVP / GM / DGM @endif
                        @if($education->workingAs == 82) Sr. Manager / Manager @endif
                        @if($education->workingAs == 83) Consultant / Supervisor / Team Leads @endif
                        @if($education->workingAs == 84) Team Member / Staff @endif
                        @if($education->workingAs == 85) Agent / Broker / Trader / Contractor @endif
                        @if($education->workingAs == 86) Business Owner / Entrepreneur @endif
                        @if($education->workingAs == 87) Politician @endif
                        @if($education->workingAs == 88) Social Worker / Volunteer / NGO @endif
                        @if($education->workingAs == 89) Sportsman @endif
                        @if($education->workingAs == 90) Travel &amp; Transport Professional @endif
                        @if($education->workingAs == 91) Writer @endif
                        @if($education->workingAs == 92) Student @endif
                        @if($education->workingAs == 93) Retired @endif
                        @if($education->workingAs == 94) Not working @endif
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

                  <div class="profile_sec_one">
                    <div class="edit_Wrapp">
                    <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>
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
                      <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>

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
                      <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>

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
                      <a href="{{URL::to('/partner-profile')}}"><span class="edit_details">Edit <i class="fa fa-edit"></i></span></a>


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
