@include('layouts.header')

@php
  $ppFields = [
    optional($detail)->maritalStatus,
    optional($detail)->country,
    optional($detail)->state,
    optional($detail)->city,
    optional($detail)->highestQualification,
    optional($detail)->workingWith,
    optional($detail)->income,
    optional($detail)->diet,
    optional($detail)->religion,
    optional($detail)->community,
    optional($detail)->motherTongue,
  ];
  $ppTotal   = count($ppFields);
  $ppFilled  = collect($ppFields)->filter(fn($v) => !is_null($v) && $v !== '' && $v !== '0' && $v !== 0)->count();
  $ppPercent = $ppTotal ? (int) round($ppFilled / $ppTotal * 100) : 0;
  $ppAgeMin  = optional($detail)->ageMin ?: 23;
  $ppAgeMax  = optional($detail)->ageMax ?: 30;
@endphp

<style>
  /* ===================== Partner Preferences (shared .ep-* system) ===================== */
  .ep-wrap{
    --pink:#e5006d; --pink-2:#ff2d87; --violet:#7b2ff7; --navy:#14213d;
    --ink:#2b3040; --muted:#8b93a7; --line:#e7eaf3; --field:#f6f7fb; --bg:#eef1f8;
    background:var(--bg); padding:34px 0 64px; font-family:'Poppins',sans-serif; color:var(--ink);
  }
  .ep-wrap .ep-container{max-width:1200px;margin:0 auto;padding:0 16px;}
  .ep-wrap *{box-sizing:border-box;}

  .ep-top{display:flex;align-items:center;gap:22px;flex-wrap:wrap;margin-bottom:24px;}
  .ep-top-head{flex:1 1 320px;min-width:260px;}
  .ep-top-head h1{margin:0;font-size:26px;font-weight:700;color:var(--navy);display:flex;align-items:center;gap:8px;}
  .ep-top-head h1 .fa{color:var(--pink);font-size:19px;}
  .ep-top-head p{margin:6px 0 0;font-size:13px;color:var(--muted);}

  .ep-strength{min-width:230px;flex:0 1 320px;}
  .ep-strength-row{display:flex;justify-content:space-between;font-size:12.5px;font-weight:600;color:var(--navy);margin-bottom:7px;}
  .ep-strength-row b{color:var(--pink);}
  .ep-strength-bar{height:8px;border-radius:20px;background:#e2e5ef;overflow:hidden;}
  .ep-strength-bar i{display:block;height:100%;border-radius:20px;background:linear-gradient(90deg,var(--pink),var(--violet));}

  .ep-tips{display:flex;align-items:center;gap:10px;background:#fff;border:1px solid #ffd6e8;
    border-radius:14px;padding:12px 16px;font-size:12.5px;font-weight:600;color:var(--pink);}
  .ep-tips .fa{font-size:16px;}

  .ep-layout{display:grid;grid-template-columns:262px 1fr;gap:24px;align-items:start;}

  .ep-side{position:sticky;top:20px;display:flex;flex-direction:column;gap:18px;}
  .ep-side-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:22px 18px;text-align:center;
    box-shadow:0 10px 30px rgba(20,33,61,.05);}
  .ep-avatar{width:88px;height:88px;margin:0 auto 12px;border-radius:50%;
    background:linear-gradient(135deg,var(--pink),var(--violet));display:flex;align-items:center;justify-content:center;}
  .ep-avatar .fa{color:#fff;font-size:34px;}
  .ep-side-card .ep-comp-label{font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px;}
  .ep-side-card .ep-comp-sub{font-size:11.5px;color:var(--muted);margin-bottom:9px;line-height:1.5;}
  .ep-mini-bar{height:6px;border-radius:20px;background:#e2e5ef;overflow:hidden;}
  .ep-mini-bar i{display:block;height:100%;background:linear-gradient(90deg,var(--pink),var(--violet));}

  .ep-side-nav{background:#fff;border:1px solid var(--line);border-radius:16px;padding:8px;
    box-shadow:0 10px 30px rgba(20,33,61,.05);}
  .ep-side-nav a{display:flex;align-items:center;gap:11px;padding:11px 13px;border-radius:11px;
    font-size:13px;font-weight:600;color:#5a6076;text-decoration:none;transition:.15s;}
  .ep-side-nav a .fa{width:16px;text-align:center;color:#aab0c2;font-size:14px;transition:.15s;}
  .ep-side-nav a:hover{background:#f6f7fb;color:var(--navy);}
  .ep-side-nav a.active{background:linear-gradient(90deg,rgba(229,0,109,.10),rgba(123,47,247,.10));color:var(--pink);}
  .ep-side-nav a.active .fa{color:var(--pink);}

  .ep-help{background:#eef3ff;border:1px solid #d9e5ff;border-radius:16px;padding:16px;text-align:center;}
  .ep-help h4{margin:0 0 4px;font-size:13px;color:var(--navy);font-weight:700;}
  .ep-help p{margin:0 0 10px;font-size:12px;color:var(--muted);line-height:1.55;}
  .ep-help a{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;color:#fff;
    background:var(--navy);border-radius:20px;padding:7px 14px;text-decoration:none;}

  .ep-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;}
  .ep-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px 20px 22px;
    box-shadow:0 10px 30px rgba(20,33,61,.05);}
  .ep-card.ep-span{grid-column:1 / -1;}
  .ep-card-head{display:flex;align-items:center;gap:11px;margin-bottom:18px;}
  .ep-card-ic{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,var(--pink),var(--violet));color:#fff;font-size:15px;flex:none;}
  .ep-card-head h3{margin:0;font-size:15.5px;font-weight:700;color:var(--pink);}

  .ep-fields{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:14px 16px;}
  .ep-field{display:flex;flex-direction:column;}
  .ep-field.ep-full{grid-column:1 / -1;}
  .ep-field label{font-size:12px;font-weight:600;color:#4a5063;margin-bottom:6px;}
  .ep-field label .req{color:var(--pink);}
  .ep-input{width:100%;padding:10px 12px;font-size:13px;font-family:inherit;color:var(--ink);
    background:var(--field);border:1px solid var(--line);border-radius:10px;transition:border-color .15s,box-shadow .15s,background .15s;}
  .ep-input:focus{outline:none;background:#fff;border-color:var(--pink);box-shadow:0 0 0 3px rgba(229,0,109,.12);}
  select.ep-input{appearance:none;-webkit-appearance:none;
    background-image:url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20width='12'%20height='8'%3E%3Cpath%20fill='%238b93a7'%20d='M0%200l6%208%206-8z'/%3E%3C/svg%3E");
    background-repeat:no-repeat;background-position:right 12px center;padding-right:32px;}

  /* Age slider */
  .ep-age-val{font-size:16px;font-weight:700;color:var(--pink);margin-bottom:2px;}
  .ep-age-val input{border:0;background:transparent;color:var(--pink);font-weight:700;font-size:16px;padding:0;width:120px;}
  .ep-wrap #slider-range{position:relative;height:6px;border:0;border-radius:20px;background:#e2e5ef;margin:16px 9px 6px;}
  .ep-wrap #slider-range .ui-slider-range{background:linear-gradient(90deg,var(--pink),var(--violet));border:0;border-radius:20px;height:100%;}
  .ep-wrap #slider-range .ui-slider-handle{width:18px;height:18px;top:50%;margin-top:-9px;margin-left:-9px;border-radius:50%;
    background:#fff;border:3px solid var(--pink);box-shadow:0 2px 6px rgba(20,33,61,.25);cursor:pointer;}
  .ep-wrap #slider-range .ui-slider-handle:focus{outline:none;}

  .ep-actions{grid-column:1 / -1;display:flex;flex-direction:column;align-items:center;gap:10px;margin-top:6px;}
  .ep-actions-row{display:flex;gap:14px;}
  .ep-btn-cancel{background:#fff;border:1px solid var(--line);border-radius:10px;padding:12px 34px;font-size:14px;
    font-weight:600;color:#5a6076;text-decoration:none;cursor:pointer;}
  .ep-btn-cancel:hover{border-color:#c9cede;color:var(--navy);}
  .ep-btn-save,.ep-btn-save:hover{background:linear-gradient(90deg,var(--pink),var(--violet));color:#fff;border:none;
    border-radius:10px;padding:12px 40px;font-size:14px;font-weight:600;cursor:pointer;
    box-shadow:0 10px 22px rgba(123,47,247,.28);display:inline-flex;align-items:center;gap:8px;}
  .ep-btn-save:hover{filter:brightness(1.05);}
  .ep-actions .ep-note{font-size:11.5px;color:var(--muted);}

  .ep-wrap label.has-error,.ep-wrap .has-error{color:var(--pink)!important;}
  .ep-wrap input.has-error,.ep-wrap select.has-error{border-color:var(--pink)!important;}

  @media (max-width:1080px){
    .ep-layout{grid-template-columns:1fr;}
    .ep-side{position:static;flex-direction:row;flex-wrap:wrap;}
    .ep-side-card,.ep-side-nav,.ep-help{flex:1 1 240px;}
    .ep-side-nav{display:flex;flex-wrap:wrap;}
    .ep-side-nav a{flex:1 1 auto;}
  }
  @media (max-width:760px){
    .ep-grid,.ep-fields{grid-template-columns:1fr;}
  }
</style>

<form action="{{URL::to('/partnerPreferenceUpdate')}}" method="post" id="partnerPreferenceUpdate">

<section class="ep-wrap">
  <div class="ep-container">

    <div class="ep-top">
      <div class="ep-top-head">
        <h1><i class="fa fa-heart"></i> Partner Preferences</h1>
        <p>Tell us what you are looking for in a life partner</p>
      </div>
      <div class="ep-strength">
        <div class="ep-strength-row"><span>Preferences Set</span><b>{{ $ppPercent }}%</b></div>
        <div class="ep-strength-bar"><i style="width:{{ $ppPercent }}%"></i></div>
      </div>
      <div class="ep-tips"><i class="fa fa-lightbulb-o"></i> Clearer preferences bring more relevant matches</div>
    </div>

    <div class="ep-layout">

      <aside class="ep-side">
        <div class="ep-side-card">
          <div class="ep-avatar"><i class="fa fa-users"></i></div>
          <div class="ep-comp-label">{{ $ppPercent }}% Complete</div>
          <div class="ep-comp-sub">Match criteria for your ideal partner</div>
          <div class="ep-mini-bar"><i style="width:{{ $ppPercent }}%"></i></div>
        </div>

        <nav class="ep-side-nav" id="epSideNav">
          <a href="#sec-basic" class="active"><i class="fa fa-sliders"></i> Basic Preferences</a>
          <a href="#sec-location"><i class="fa fa-map-marker"></i> Location</a>
          <a href="#sec-education"><i class="fa fa-briefcase"></i> Education &amp; Profession</a>
          <a href="#sec-lifestyle"><i class="fa fa-leaf"></i> Lifestyle</a>
          <a href="#sec-religion"><i class="fa fa-star-o"></i> Religious Background</a>
        </nav>

        <div class="ep-help">
          <h4>Need Help?</h4>
          <p>Not sure what to pick? Keep it broad &mdash; you can refine later.</p>
          <a href="{{ URL::to('/contact-us') }}"><i class="fa fa-headphones"></i> Contact Support</a>
        </div>
      </aside>

      <div class="ep-main">
        <div class="ep-grid">

          <!-- Basic Preferences -->
          <div class="ep-card" id="sec-basic">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-sliders"></i></span>
              <h3>Basic Preferences</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field ep-full">
                <label>Age <span class="req">*</span></label>
                <div class="ep-age-val">
                  <input type="text" id="amount" readonly value="{{ $ppAgeMin }} - {{ $ppAgeMax }}">
                </div>
                <input type="hidden" class="ageMin" name="ageMin" value="{{ $ppAgeMin }}">
                <input type="hidden" class="ageMax" name="ageMax" value="{{ $ppAgeMax }}">
                <div class="selector">
                  <div class="price-slider">
                    <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                      <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0;"></span>
                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="right: 0;"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ep-field ep-full">
                <label>Marital Status <span class="req">*</span></label>
                <select name="maritalStatus" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if(!empty($detail)) @if($detail->maritalStatus == 1) selected @endif @endif value="1">Never Married</option>
                  <option @if(!empty($detail)) @if($detail->maritalStatus == 2) selected @endif @endif value="2">Divorced</option>
                  <option @if(!empty($detail)) @if($detail->maritalStatus == 3) selected @endif @endif value="3">Awaiting Divorce</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Lifestyle -->
          <div class="ep-card" id="sec-lifestyle">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-leaf"></i></span>
              <h3>Lifestyle</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field ep-full">
                <label>Diet <span class="req">*</span></label>
                <select name="diet" class="ep-input selecthide">
                  <option value="">Select diet</option>
                  <option @if(!empty($detail->diet)) @if($detail->diet == 1) selected @endif @endif value="1">Veg</option>
                  <option @if(!empty($detail->diet)) @if($detail->diet == 2) selected @endif @endif value="2">Non-Veg</option>
                  <option @if(!empty($detail->diet)) @if($detail->diet == 3) selected @endif @endif value="3">Occasionally Non-Veg</option>
                  <option @if(!empty($detail->diet)) @if($detail->diet == 4) selected @endif @endif value="4">Eggetarian</option>
                  <option @if(!empty($detail->diet)) @if($detail->diet == 5) selected @endif @endif value="5">Jain</option>
                  <option @if(!empty($detail->diet)) @if($detail->diet == 6) selected @endif @endif value="6">Vegan</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Location -->
          <div class="ep-card" id="sec-location">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-map-marker"></i></span>
              <h3>Location Preferences</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field">
                <label>Country living in <span class="req">*</span></label>
                <select name="country" id="country" class="ep-input selecthide">
                  <option value="">Select Country</option>
                  @if(count($allcountry) > 0)
                    @foreach($allcountry as $c)
                    <option @if(!empty($detail->country))@if($c->id == $detail->country) selected @endif @endif value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>State living in <span class="req">*</span></label>
                <select name="state" id="states" class="ep-input selecthide">
                  <option value="">Select State</option>
                  @if(count($states) > 0)
                    @foreach($states as $s)
                    <option @if(!empty($detail->state))@if($s->id == $detail->state) selected @endif @endif value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>City / District <span class="req">*</span></label>
                <select id="cities" name="city" class="ep-input selecthide">
                  <option value="">Select City</option>
                  @if(count($city) > 0)
                    @foreach($city as $co)
                    <option @if(!empty($detail->city))@if($co->id == $detail->city) selected @endif @endif value="{{ $co->id }}">{{ $co->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>

          <!-- Education & Profession -->
          <div class="ep-card" id="sec-education">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-briefcase"></i></span>
              <h3>Education &amp; Profession</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field ep-full">
                <label>Qualification <span class="req">*</span></label>
                <select name="highestQualification" class="ep-input selecthide">
                  <option value="">Select Qualification</option>
                  @if($allqualification)
                    @foreach($allqualification as $q)
                    <option @if(!empty($detail->highestQualification)) @if($detail->highestQualification == $q->id) selected @endif @endif value="{{ $q->id }}">{{ $q->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Working With <span class="req">*</span></label>
                <select name="workingWith" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if(!empty($detail)) @if($detail->workingWith == 1) selected @endif @endif value="1">Private Company</option>
                  <option @if(!empty($detail)) @if($detail->workingWith == 2) selected @endif @endif value="2">Government / Public Sector</option>
                  <option @if(!empty($detail)) @if($detail->workingWith == 3) selected @endif @endif value="3">Defense / Civil Services</option>
                  <option @if(!empty($detail)) @if($detail->workingWith == 4) selected @endif @endif value="4">Business / Self Employed</option>
                  <option @if(!empty($detail)) @if($detail->workingWith == 5) selected @endif @endif value="5">Not Working</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Annual Income <span class="req">*</span></label>
                <select name="income" class="ep-input selecthide">
                  <option value="">Select income</option>
                  <option @if(!empty($detail)) @if($detail->income == 1) selected @endif @endif value="1">Upto INR 1 Lakh</option>
                  <option @if(!empty($detail)) @if($detail->income == 2) selected @endif @endif value="2">INR 1 Lakh to 2 Lakh</option>
                  <option @if(!empty($detail)) @if($detail->income == 3) selected @endif @endif value="3">INR 2 Lakh to 4 Lakh</option>
                  <option @if(!empty($detail)) @if($detail->income == 4) selected @endif @endif value="4">INR 4 Lakh to 7 Lakh</option>
                  <option @if(!empty($detail)) @if($detail->income == 5) selected @endif @endif value="5">INR 7 Lakh to 10 Lakh</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Religious Background -->
          <div class="ep-card ep-span" id="sec-religion">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-star-o"></i></span>
              <h3>Religious Background</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field">
                <label>Religion <span class="req">*</span></label>
                <select name="religion" class="ep-input selecthide">
                  <option value="">Select religion</option>
                  @if($allreligion)
                    @foreach($allreligion as $rel)
                    <option @if(!empty($detail->religion)) @if($detail->religion == $rel->id) selected @endif @endif value="{{ $rel->id }}">{{ ucwords($rel->name) }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Community <span class="req">*</span></label>
                <select name="community" class="ep-input selecthide">
                  <option value="">Select Community</option>
                  @if(!empty($allcommunity))
                    @foreach($allcommunity as $comunity)
                    <option @if(!empty($detail->community)) @if($detail->community == $comunity->id) selected @endif @endif value="{{ $comunity->id }}">{{ $comunity->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Mother Tongue <span class="req">*</span></label>
                <select name="motherTongue" class="ep-input selecthide">
                  <option value="">Select Mother Tongue</option>
                  @if(!empty($allmothertongue))
                    @foreach($allmothertongue as $mo)
                    <option @if(!empty($detail->motherTongue)) @if($detail->motherTongue == $mo->id) selected @endif @endif value="{{ $mo->id }}">{{ ucwords($mo->name) }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>
          </div>

          <div class="ep-actions">
            <div class="ep-actions-row">
              <a href="{{ URL::to('/profile') }}" class="ep-btn-cancel">Cancel</a>
              <button type="submit" class="ep-btn-save edit_submit_btn"><i class="fa fa-floppy-o"></i> Save Preferences</button>
            </div>
            <span class="ep-note">These preferences shape the matches we suggest to you.</span>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
</form>

<script>
(function () {
  var nav = document.getElementById('epSideNav');
  if (!nav) return;
  var links = [].slice.call(nav.querySelectorAll('a'));

  links.forEach(function (a) {
    a.addEventListener('click', function (e) {
      var target = document.querySelector(a.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      var y = target.getBoundingClientRect().top + window.pageYOffset - 90;
      window.scrollTo({ top: y, behavior: 'smooth' });
    });
  });

  var sections = links
    .map(function (a) { return document.querySelector(a.getAttribute('href')); })
    .filter(Boolean);

  function onScroll() {
    var pos = window.pageYOffset + 120;
    var current = sections[0];
    sections.forEach(function (s) { if (s.offsetTop <= pos) current = s; });
    links.forEach(function (a) {
      a.classList.toggle('active', a.getAttribute('href') === '#' + current.id);
    });
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
</script>

@include('layouts.footer')
