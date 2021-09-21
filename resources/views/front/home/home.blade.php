@include('layouts.header')
<section class="top_banner" style="background: url({{ asset('home/'.$home->image) }}) center top no-repeat;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="baner_title">
          @if(!empty($home)) <h3>{{ $home->title }}</h3>@endif
        </div>
      </div>
    </div>
  </div>
</section>

<section style="display:none" class="looking_bride">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="find-section">
          <div class="find_sel">
            <select class="form-select" aria-label="Default select example">
              <option selected>Looking For a Bride</option>
              <option value="1">Bride</option>
              <option value="2">Groom</option>
            </select>
            <select class="form-select" aria-label="Default select example">
              <option selected>18 Year</option>
              <option value="1">19 Year</option>
              <option value="2">20 Year</option>
              <option value="3">21 Year</option>
            </select>
            <select class="form-select" aria-label="Default select example">
              <option selected>30 Year</option>
              <option value="1">31 Year</option>
              <option value="2">32 Year</option>
              <option value="3">33 Year</option>
            </select>
            <select class="form-select" aria-label="Default select example">
              <option selected>Select Religion</option>
              <option value="1">Doesn't matter</option>
              <option value="2">Buddhismm</option>
              <option value="3">Christian</option>
              <option value="3">Hindu</option>
            </select>
            <div class="btn_get_start select_wdtg">
              <button type="button" class="btns_gradient">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="title_sc">
          <h3>FIND YOUR SPECIAL <span>SOMEONE</span></h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
      </div>

      <div class="col-md-4">

        <div class="box_prnt">
          <div class="box-step">
            <div class="step-number">
              <p class="text-center number-count Poppins-Semi-Bold">1</p>
            </div>
            <i class="fa fa-sign-in fa-new"></i>
            <p class="sings_t">Sign up</p>
          </div>
          <h6>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text. Various versions have evolved over the years. </h6>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box_prnt">
          <div class="box-step">
            <div class="step-number">
              <p class="text-center number-count Poppins-Semi-Bold">2</p>
            </div>
            <i class="fa fa-sign-in fa-new"></i>
            <p class="sings_t">Contact</p>
          </div>
          <h6> MEGA MATRIMONY </h6>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box_prnt">
          <div class="box-step">
            <div class="step-number">
              <p class="text-center number-count Poppins-Semi-Bold">3</p>
            </div>
            <i class="fa fa-sign-in fa-new"></i>
            <p class="sings_t">Interact</p>
          </div>
          <h6>The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc, on purpose (injected humour and the like). </h6>
        </div>
      </div>

      <div class="col-md-12">
        <div class="btn_get_start">
          <a href="{{URL::to('/login')}}" class="btns_gradient">Get Started</a>
        </div>
      </div>

    </div>

  </div>
</section>


<section style="display:none" class="matches_wrapp">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <div class="matches_title">
          <h3>Matches Within Your Community</h3>
          <p>Genuine Profiles | Safe & Secure | Detailed Family Information</p>
        </div>
      </div>

      <div class="col-md-12">
        <div class="profile_add">
          <div class="row">

            <div class="col-md-6">
              <div class="custom_from_group">
              <label class="cus_label">Date of Birth</label>
                <select class="form-control form-control-lg">
                  <option>Create Profile for</option>
                  <option>Self</option>
                  <option>Son</option>
                  <option>Daughter</option>
                  <option>Brother</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="custom_from_group">
              <label class="cus_label">Date of Birth</label>
                <input type="Date" class="form-control form-control-lg">
              </div>
            </div>
            <div class="col-md-6">
              <div class="custom_from_group">
              <label class="cus_label">Mother Tongue</label>
                <select class="form-control form-control-lg">
                  <option>Create Profile for</option>
                  <option>Self</option>
                  <option>Son</option>
                  <option>Daughter</option>
                  <option>Brother</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="custom_from_group">
              <label class="cus_label">Community</label>
                <select class="form-control form-control-lg">
                  <option>Create Profile for</option>
                  <option>Self</option>
                  <option>Son</option>
                  <option>Daughter</option>
                  <option>Brother</option>
                </select>
              </div>
            </div>

            <div class="col-md-12">
              <div class="btn_get_start">
                <button type="button" class="btns_gradient">Lets Begin</button>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="why_choose_wrapp">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="title_sc">
          <h3>Why Choose Saadi Jodi <span>SOMEONE</span></h3>
          <p>Saadi Jodi is different from other matchmaking sites because of some unique benefits that every parent will find highly useful</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="choose_box_wrap">
          <img src="{{ asset('front/images/info.svg') }}">
          <h5>Privacy Policy</h5>
          <p>Control the unacceptable access to photos and personal details</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="choose_box_wrap">
          <img src="{{ asset('front/images/match.svg') }}">
          <h5>Classified</h5>
          <p>Each profile is categorized by religion, community, and language.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="choose_box_wrap">
          <img src="{{ asset('front/images/connection.png') }}">
          <h5>100% verified profiles</h5>
          <p>Personal visit by our special agents to avoid fake profiles.</p>
        </div>
      </div>

    </div>

  </div>
</section>

<section class="google_play">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Now instantly contact your matches from your community</p>
        <img src="{{ asset('front/images/google-play.png') }}">
      </div>
    </div>
  </div>
</section>

<section class="aboutus_wrapp">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="title_sc">
          <h3 class="mb-4">About <span>Us</span></h3>
          <p>Saadi Jodi, is a reliable destination to offer magnificent matchmaking links exploring the most genuine resources to meet true potential partners. By keeping in mind the objective of our site, we successfully touch the heart of millions of people worldwide.</p>
        </div>
      </div>
    </div>

  </div>
</section>
@if(count($stories) > 0)
<section class="testimo_wrapp">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="top_title_testi">
          <h2>Over 40,000 Happy Stories</h2>
        </div>
         <div class="customer-logos slider">
           @foreach($stories as $s)
              <div class="slide">
                <div class="images_slick">
                  <img src="{{ asset('stories/'.$s->image) }}">
                </div>
                <div class="slick_text">
                  <h4>{{ $s->description }}</h4>
                  <!-- <a href="#" class="read_more">Read More</a> -->
                </div>
              </div>
              @endforeach
           </div>

      </div>
    </div>

  </div>
</section>
@endif

<section class="show_macth_wrapp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="show_macth_text">
          <h3>Community Matchmaking, Trusted by Parents</h3>
          @if (!empty(Auth::user()))
          <a href="{{URL::to('/listing')}}" class="show_btn">Show Matches</a>
          @endif
        @if (!Auth::user())
          <a href="{{URL::to('/login')}}" class="show_btn">Show Matches</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@include('layouts.footer')
