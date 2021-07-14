@include('layouts.header')
<section class="listing_wpas">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="listing_st">
          <div class="row">
            <div class="col-md-3">
              <div class="listing_imgs">
                @if(!empty($user->UserImage->image))
                   <img src="{{ asset('profiles/'.$user->UserImage->image) }}" >
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="listing_details">
                <div class="listing_details_head">
                  <h3>{{ $user->firstName }} {{ $user->lastName }}</h3>
                  <div class="d_flex_head">
                    <span><i class="fa fa-comments"></i> Online now</span>
                    <span data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="fa fa-user"></i> You & Her</span>
                  </div>
                </div>
                <div class="listing_details_title">
                  <a class="d_flex_title" href="#">
                    <span>24 yrs, 5' 5"</span>
                    <span>Never Married</span>
                    <span>Hindu, Rajput</span>
                    <span>Kapurthala, Punjab</span>
                    <span>Hindi</span>
                    <span>Software Developer / Programmer</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="conect_nww">
                <p>Like this profile?</p>
                <i class="fa fa-check-circle"></i>
                <p>Connect Now</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">

        <div class="sidebar_boxes">
          <h2 class="heading_sb">Verifications</h2>
          <div class="new_macth_box">
            <p>Mobile number verified</p>
          </div>
        </div>

        <div class="sidebar_boxes">
          <h2 class="heading_sb">Verifications</h2>
          <div class="new_macth_box">
            <div class="side_img">
              <img src="images/user.jpg">
            </div>
            <div class="side_title">
              <a href="#">
                <h4>Varsha R</h4>
                <p>19 , 5' 2", Hindu , Rajput Team Member / Staff Ludhiana , India</p>
              </a>
            </div>
          </div>
        </div>

      </div>


      <div class="col-md-8">
        <div class="listing_wrapps">

          <div class="detailed_profile">
            <h2>Detailed Profile</h2>

            <div class="rpeat_col">
              <h4>About {{ $user->firstName }}</h4>
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
              <h4>Contact Details</h4>

              <div class="about_here_wrap">
                <p>Contact Number <span class="num">+91 8837X XXXXX</span></p>
                <p>Email ID <span class="num">XXXXXXXXX@gmail.com</span></p>
              </div>

            </div>
            @if(!empty($user->UserBasicDetail->diet))

            <div class="rpeat_col">
              <h4>Lifestyle</h4>

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
              <h4>Background</h4>

              <div class="about_here_wrap">
                <p>Hindu, Hindi</p>
                <p>Punjabi</p>
                <p>Lives in Ludhiana, Punjab, India</p>
              </div>

            </div>

            <div class="rpeat_col">
              <h4>Horoscope Details</h4>

              <div class="about_here_wrap">
                <p>Born in Patiala on ✱✱/✱✱/✱✱✱✱ at exactly 09:30 am.</p>
              </div>

            </div>

            <div class="rpeat_col">
              <h4>Family Details</h4>

              <div class="about_here_wrap">
                <p>Ours is a family with moderate values. Her father is employed and her mother is a homemaker. She doesn't have any siblings.</p>
              </div>

            </div>

            <div class="rpeat_col">
              <h4>Education & Career</h4>

              <div class="about_here_wrap">
                <p>Currently not working</p>
                <p>Earns Upto INR 1 Lakh annually</p>
              </div>

            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
</section>
@include('layouts.footer')
