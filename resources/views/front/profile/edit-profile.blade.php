@include('layouts.header')

@php
  // ---- Profile strength (rough completeness score) ----
  $spFields = [
    optional($detail)->profileCreatedBy,
    optional($detail)->gender,
    optional($detail)->dateOfBirth,
    optional($detail)->maritalStatus,
    optional($detail)->height,
    optional($detail)->bloodGroup,
    optional($detail)->diet,
    optional($detail)->about,
    optional($education)->highestQualification,
    optional($education)->workingWith,
    optional($education)->workingAs,
    optional($education)->employerName,
    optional($education)->income,
    optional($family)->fatherStatus,
    optional($family)->motherStatus,
    optional($family)->familyType,
    optional($family)->familyLocation,
    optional($family)->nativePlace,
    optional($family)->sibling,
    optional($religion)->religion,
    optional($religion)->motherTongue,
    optional($religion)->community,
    optional($location)->country,
    optional($location)->state,
    optional($location)->city,
    optional($location)->pincode,
    optional($location)->grewUp,
    optional($birth)->birthCountry,
    optional($birth)->birthCity,
    optional($birth)->manglik,
    optional($profileimage)->image,
  ];
  $spTotal   = count($spFields);
  $spFilled  = collect($spFields)->filter(fn($v) => !is_null($v) && $v !== '' && $v !== '0' && $v !== 0)->count();
  $spPercent = $spTotal ? (int) round($spFilled / $spTotal * 100) : 0;
@endphp

<style>
  /* ===================== Edit Profile ===================== */
  .ep-wrap{
    --pink:#e5006d; --pink-2:#ff2d87; --violet:#7b2ff7; --navy:#14213d;
    --ink:#2b3040; --muted:#8b93a7; --line:#e7eaf3; --field:#f6f7fb; --bg:#eef1f8;
    background:var(--bg); padding:34px 0 64px; font-family:'Poppins',sans-serif; color:var(--ink);
  }
  .ep-wrap .ep-container{max-width:1200px;margin:0 auto;padding:0 16px;}
  .ep-wrap *{box-sizing:border-box;}

  /* ---- Top bar ---- */
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

  /* ---- Layout ---- */
  .ep-layout{display:grid;grid-template-columns:262px 1fr;gap:24px;align-items:start;}

  /* ---- Sidebar ---- */
  .ep-side{position:sticky;top:20px;display:flex;flex-direction:column;gap:18px;}
  .ep-side-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:22px 18px;text-align:center;
    box-shadow:0 10px 30px rgba(20,33,61,.05);}
  .ep-avatar{width:96px;height:96px;margin:0 auto 12px;border-radius:50%;padding:4px;
    background:linear-gradient(135deg,var(--pink),var(--violet));}
  .ep-avatar img{width:100%;height:100%;border-radius:50%;object-fit:cover;background:#f0f0f5;display:block;}
  .ep-side-card .ep-comp-label{font-size:12px;color:var(--muted);margin-bottom:4px;}
  .ep-side-card .ep-comp-val{font-size:13px;font-weight:700;color:#1aa260;margin-bottom:8px;}
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

  /* ---- Cards grid ---- */
  .ep-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:22px;}
  .ep-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:20px 20px 22px;
    box-shadow:0 10px 30px rgba(20,33,61,.05);}
  .ep-card.ep-span{grid-column:1 / -1;}
  .ep-card-head{display:flex;align-items:center;gap:11px;margin-bottom:18px;}
  .ep-card-ic{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,var(--pink),var(--violet));color:#fff;font-size:15px;flex:none;}
  .ep-card-head h3{margin:0;font-size:15.5px;font-weight:700;color:var(--pink);}
  .ep-card-head .ep-head-link{margin-left:auto;font-size:12px;font-weight:600;color:var(--muted);text-decoration:none;}
  .ep-card-head .ep-head-link:hover{color:var(--pink);}

  /* ---- Fields ---- */
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
  textarea.ep-input{min-height:110px;resize:vertical;}
  .ep-time{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;}
  .ep-hint{font-size:11.5px;color:var(--muted);line-height:1.55;margin:0 0 12px;}
  .ep-char{font-size:11px;color:var(--muted);text-align:right;margin-top:6px;}

  /* ---- Photo card ---- */
  .ep-photo-row{display:grid;grid-template-columns:150px 1fr;gap:16px;align-items:stretch;}
  .ep-photo-cur{border-radius:12px;overflow:hidden;border:1px solid var(--line);background:var(--field);aspect-ratio:1/1;}
  .ep-photo-cur img{width:100%;height:100%;object-fit:cover;display:block;}
  .ep-drop{border:2px dashed #f2b8d3;border-radius:12px;background:#fff6fb;display:flex;flex-direction:column;
    align-items:center;justify-content:center;text-align:center;padding:18px;cursor:pointer;transition:.15s;min-height:150px;}
  .ep-drop:hover{border-color:var(--pink);background:#ffeef6;}
  .ep-drop .fa{font-size:20px;color:var(--pink);margin-bottom:8px;}
  .ep-drop b{font-size:13px;color:var(--pink);}
  .ep-drop span{font-size:11.5px;color:var(--muted);margin-top:3px;}
  .show-for-sr{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);}

  .ep-gallery{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px;}
  .ep-gallery .imagesshow{display:flex;flex-wrap:wrap;gap:10px;}
  .ep-gallery span{position:relative;display:inline-block;}
  .ep-gallery img{width:64px;height:64px;object-fit:cover;border-radius:10px;border:1px solid var(--line);}
  .ep-gallery .removedocument{position:absolute;top:-6px;right:-6px;width:18px;height:18px;background:var(--pink);
    color:#fff;border-radius:50%;font-size:9px;display:flex;align-items:center;justify-content:center;cursor:pointer;}
  .ep-add-photos{display:inline-flex;align-items:center;gap:7px;margin-top:12px;font-size:12.5px;font-weight:600;
    color:var(--navy);background:var(--field);border:1px solid var(--line);border-radius:10px;padding:9px 15px;cursor:pointer;}
  .ep-add-photos:hover{border-color:var(--pink);color:var(--pink);}

  /* ---- Footer actions ---- */
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
  .ep-wrap input.has-error,.ep-wrap select.has-error,.ep-wrap textarea.has-error{border-color:var(--pink)!important;}

  @media (max-width:1080px){
    .ep-layout{grid-template-columns:1fr;}
    .ep-side{position:static;flex-direction:row;flex-wrap:wrap;}
    .ep-side-card,.ep-side-nav,.ep-help{flex:1 1 240px;}
    .ep-side-nav{display:flex;flex-wrap:wrap;}
    .ep-side-nav a{flex:1 1 auto;}
  }
  @media (max-width:760px){
    .ep-grid,.ep-fields{grid-template-columns:1fr;}
    .ep-photo-row{grid-template-columns:1fr;}
  }
</style>

<form action="{{URL::to('/profileUpdate')}}" method="post" id="profileUpdate">

<section class="ep-wrap">
  <div class="ep-container">

    <!-- ===== Top bar ===== -->
    <div class="ep-top">
      <div class="ep-top-head">
        <h1><i class="fa fa-check-circle"></i> Edit Your Profile</h1>
        <p>Complete your profile to get better match suggestions</p>
      </div>
      <div class="ep-strength">
        <div class="ep-strength-row"><span>Profile Strength</span><b>{{ $spPercent }}%</b></div>
        <div class="ep-strength-bar"><i style="width:{{ $spPercent }}%"></i></div>
      </div>
      <div class="ep-tips"><i class="fa fa-lightbulb-o"></i> Tips to improve your profile visibility</div>
    </div>

    <div class="ep-layout">

      <!-- ===== Sidebar ===== -->
      <aside class="ep-side">
        <div class="ep-side-card">
          <div class="ep-avatar">
            <img class="profileshow" src="@if(!empty($profileimage)){{ asset('profiles/'.$profileimage->image) }}@endif" alt="Profile photo">
          </div>
          <div class="ep-comp-label">Profile Completion</div>
          <div class="ep-comp-val">{{ $spPercent }}% Complete</div>
          <div class="ep-mini-bar"><i style="width:{{ $spPercent }}%"></i></div>
        </div>

        <nav class="ep-side-nav" id="epSideNav">
          <a href="#sec-basic" class="active"><i class="fa fa-user"></i> Basic Information</a>
          <a href="#sec-lifestyle"><i class="fa fa-leaf"></i> Lifestyle</a>
          <a href="#sec-education"><i class="fa fa-briefcase"></i> Education &amp; Career</a>
          <a href="#sec-family"><i class="fa fa-users"></i> Family Details</a>
          <a href="#sec-location"><i class="fa fa-map-marker"></i> Location &amp; Contact</a>
          <a href="#sec-religion"><i class="fa fa-star-o"></i> Religious Background</a>
          <a href="#sec-horoscope"><i class="fa fa-moon-o"></i> Horoscope Details</a>
          <a href="#sec-photos"><i class="fa fa-picture-o"></i> Photos &amp; Videos</a>
          <a href="#sec-about"><i class="fa fa-pencil-square-o"></i> About Yourself</a>
        </nav>

        <div class="ep-help">
          <h4>Need Help?</h4>
          <p>We're here to help you create your perfect profile.</p>
          <a href="{{ URL::to('/contact-us') }}"><i class="fa fa-headphones"></i> Contact Support</a>
        </div>
      </aside>

      <!-- ===== Main ===== -->
      <div class="ep-main">
        <div class="ep-grid">

          <!-- Profile Photo -->
          <div class="ep-card" id="sec-photos">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-camera"></i></span>
              <h3>Profile Photo</h3>
              <a href="{{ URL::to('/profile') }}" class="ep-head-link">View Profile</a>
            </div>
            <div class="ep-photo-row">
              <div class="ep-photo-cur">
                <img class="profileshow" src="@if(!empty($profileimage)){{ asset('profiles/'.$profileimage->image) }}@endif" alt="Current photo">
              </div>
              <label for="upload_imgs" class="ep-drop">
                <i class="fa fa-camera"></i>
                <b>Upload New Photo</b>
                <span>or drag and drop</span>
                <span>JPG, PNG (Max 5MB)</span>
              </label>
              <input class="show-for-sr profilechange" accept="image/*" type="file" id="upload_imgs" name="profile" />
            </div>

            <div class="ep-gallery">
              @if(count($images) > 0)
              <div class="imagesshow">
                @foreach($images as $i)
                <span class="docimg{{ $i->id }}">
                  <img class="doctype1 docimg{{ $i->id }}" src="{{ asset('profiles/'.$i->image) }}">
                  <a data-typee="1" data-type="1" class="removedocument removedocument{{ $i->id }}" data-id="{{ $i->id }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                </span>
                @endforeach
              </div>
              @else
              <div class="imagesshow"></div>
              @endif
            </div>
            <label for="upload_imgs1" class="ep-add-photos"><i class="fa fa-plus"></i> Add More Photos</label>
            <input class="show-for-sr multipleimageUpload" accept="image/*" type="file" id="upload_imgs1" name="images[]" multiple />
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
                  <option @if($detail->diet == 1) selected @endif value="1">Veg</option>
                  <option @if($detail->diet == 2) selected @endif value="2">Non-Veg</option>
                  <option @if($detail->diet == 3) selected @endif value="3">Occasionally Non-Veg</option>
                  <option @if($detail->diet == 4) selected @endif value="4">Eggetarian</option>
                  <option @if($detail->diet == 5) selected @endif value="5">Jain</option>
                  <option @if($detail->diet == 6) selected @endif value="6">Vegan</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Basic Information -->
          <div class="ep-card" id="sec-basic">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-user"></i></span>
              <h3>Basic Information</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field">
                <label>Profile created by <span class="req">*</span></label>
                <select name="profilecreatedby" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($detail->profileCreatedBy == 1) selected @endif value="1">Self</option>
                  <option @if($detail->profileCreatedBy == 2) selected @endif value="2">Parent / Guardian</option>
                  <option @if($detail->profileCreatedBy == 3) selected @endif value="3">Sibling</option>
                  <option @if($detail->profileCreatedBy == 4) selected @endif value="4">Friend</option>
                  <option @if($detail->profileCreatedBy == 5) selected @endif value="5">Other</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Gender <span class="req">*</span></label>
                <select name="gender" class="ep-input selecthide">
                  <option value="">Select Gender</option>
                  <option @if($detail->gender == 1) selected @endif value="1">Male</option>
                  <option @if($detail->gender == 2) selected @endif value="2">Female</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Date of Birth <span class="req">*</span></label>
                <input value="@if($detail->dateOfBirth){{ date('d-m-Y', strtotime($detail->dateOfBirth)) }}@endif" placeholder="Please select date of birth" class="ep-input selecthide dateofbirth" type="text" name="dateOfBirth">
              </div>
              <div class="ep-field">
                <label>Marital Status <span class="req">*</span></label>
                <select name="maritalStatus" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($detail->maritalStatus == 1) selected @endif value="1">Never Married</option>
                  <option @if($detail->maritalStatus == 2) selected @endif value="2">Divorced</option>
                  <option @if($detail->maritalStatus == 3) selected @endif value="3">Awaiting Divorce</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Height <span class="req">*</span></label>
                <select name="height" class="ep-input selecthide">
                  <option value="">Select height</option>
                  @if($allheight)
                    @foreach($allheight as $height)
                    <option @if($detail->height == $height->id) selected @endif value="{{ $height->id }}">{{ $height->inch }} - {{ $height->cm }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Blood Group <span class="req">*</span></label>
                <select name="bloodGroup" id="bloodGroup" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($detail->bloodGroup == 'Don t Know') selected @endif value="Don t Know">Don't Know</option>
                  <option @if($detail->bloodGroup == 'A+') selected @endif value="A+">A+</option>
                  <option @if($detail->bloodGroup == 'A-') selected @endif value="A-">A-</option>
                  <option @if($detail->bloodGroup == 'B+') selected @endif value="B+">B+</option>
                  <option @if($detail->bloodGroup == 'B-') selected @endif value="B-">B-</option>
                  <option @if($detail->bloodGroup == 'AB+') selected @endif value="AB+">AB+</option>
                  <option @if($detail->bloodGroup == 'AB-') selected @endif value="AB-">AB-</option>
                  <option @if($detail->bloodGroup == 'O+') selected @endif value="O+">O+</option>
                  <option @if($detail->bloodGroup == 'O-') selected @endif value="O-">O-</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Education & Career -->
          <div class="ep-card" id="sec-education">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-briefcase"></i></span>
              <h3>Education &amp; Career</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field ep-full">
                <label>Highest Qualification <span class="req">*</span></label>
                <select name="highestQualification" class="ep-input selecthide">
                  <option value="">Select Qualification</option>
                  @if($allqualification)
                    @foreach($allqualification as $q)
                    <option @if($education->highestQualification == $q->id) selected @endif value="{{ $q->id }}">{{ $q->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Working With <span class="req">*</span></label>
                <select name="workingWith" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($education->workingWith == 1) selected @endif value="1">Private Company</option>
                  <option @if($education->workingWith == 2) selected @endif value="2">Government / Public Sector</option>
                  <option @if($education->workingWith == 3) selected @endif value="3">Defense / Civil Services</option>
                  <option @if($education->workingWith == 4) selected @endif value="4">Business / Self Employed</option>
                  <option @if($education->workingWith == 5) selected @endif value="5">Not Working</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Working As <span class="req">*</span></label>
                <select name="workingAs" class="ep-input selecthide">
                  <option value="">Select Working As</option>
                  @if($allworkingSectors)
                    @foreach($allworkingSectors as $sector)
                    <option @if($education->workingAs == $sector->id) selected @endif value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Annual Income <span class="req">*</span></label>
                <select name="income" class="ep-input selecthide">
                  <option value="">Select income</option>
                  <option @if($education->income == 1) selected @endif value="1">Upto INR 1 Lakh</option>
                  <option @if($education->income == 2) selected @endif value="2">INR 1 Lakh to 2 Lakh</option>
                  <option @if($education->income == 3) selected @endif value="3">INR 2 Lakh to 4 Lakh</option>
                  <option @if($education->income == 4) selected @endif value="4">INR 4 Lakh to 7 Lakh</option>
                  <option @if($education->income == 5) selected @endif value="5">INR 7 Lakh to 10 Lakh</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Employer Name <span class="req">*</span></label>
                <input name="employerName" value="{{ $education->employerName }}" class="ep-input selecthide" type="text" placeholder="Please enter employer name">
              </div>
            </div>
          </div>

          <!-- Family Details -->
          <div class="ep-card" id="sec-family">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-users"></i></span>
              <h3>Family Details</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field">
                <label>Father's Status <span class="req">*</span></label>
                <select name="fatherStatus" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($family->fatherStatus == 1) selected @endif value="1">Employed</option>
                  <option @if($family->fatherStatus == 2) selected @endif value="2">Business</option>
                  <option @if($family->fatherStatus == 3) selected @endif value="3">Retired</option>
                  <option @if($family->fatherStatus == 4) selected @endif value="4">Not Employed</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Mother's Status <span class="req">*</span></label>
                <select name="motherStatus" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($family->motherStatus == 1) selected @endif value="1">Employed</option>
                  <option @if($family->motherStatus == 2) selected @endif value="2">Business</option>
                  <option @if($family->motherStatus == 3) selected @endif value="3">Retired</option>
                  <option @if($family->motherStatus == 4) selected @endif value="4">Not Employed</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Family Type <span class="req">*</span></label>
                <select name="familyType" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($family->familyType == 1) selected @endif value="1">Joint</option>
                  <option @if($family->familyType == 2) selected @endif value="2">Nuclear</option>
                </select>
              </div>
              <div class="ep-field">
                <label>No. of Siblings</label>
                <select name="sibling" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if($family->sibling == 1) selected @endif value="1">1</option>
                  <option @if($family->sibling == 2) selected @endif value="2">2</option>
                  <option @if($family->sibling == 3) selected @endif value="3">3</option>
                </select>
              </div>
              <div class="ep-field">
                <label>Family Location <span class="req">*</span></label>
                <input name="familyLocation" value="{{ $family->familyLocation }}" placeholder="Please enter family location" class="ep-input selecthide" type="text">
              </div>
              <div class="ep-field">
                <label>Native Place <span class="req">*</span></label>
                <input name="nativePlace" value="{{ $family->nativePlace }}" placeholder="Please enter native place" class="ep-input selecthide" type="text">
              </div>
            </div>
          </div>

          <!-- Location -->
          <div class="ep-card" id="sec-location">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-map-marker"></i></span>
              <h3>Location Of Groom</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field">
                <label>Country Living in <span class="req">*</span></label>
                <select name="country" id="country" class="ep-input selecthide">
                  <option value="">Select Country</option>
                  @if(count($allcountry) > 0)
                    @foreach($allcountry as $c)
                    <option @if(!empty($location->country))@if($c->id == $location->country) selected @endif @endif value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>State <span class="req">*</span></label>
                <select name="state" id="states" class="ep-input selecthide">
                  <option value="">Select State</option>
                  @if(count($states) > 0)
                    @foreach($states as $s)
                    <option @if(!empty($location->state))@if($s->id == $location->state) selected @endif @endif value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>City <span class="req">*</span></label>
                <select id="cities" name="city" class="ep-input selecthide">
                  <option value="">Select City</option>
                  @if(count($city) > 0)
                    @foreach($city as $ci)
                    <option @if(!empty($location->city))@if($ci->id == $location->city) selected @endif @endif value="{{ $ci->id }}">{{ $ci->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Grew up in <span class="req">*</span></label>
                <select name="grewUp" id="grew" class="ep-input selecthide">
                  <option value="">Select Country</option>
                  @if(count($allcountry) > 0)
                    @foreach($allcountry as $c)
                    <option @if(!empty($location->grewUp))@if($c->id == $location->grewUp) selected @endif @endif value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field ep-full">
                <label>Postal Zip Code <span class="req">*</span></label>
                <input name="pincode" value="@if(!empty($location)){{ $location->pincode }}@endif" placeholder="Please enter pincode" class="ep-input selecthide" type="text">
              </div>
            </div>
          </div>

          <!-- Birth & Horoscope -->
          <div class="ep-card" id="sec-horoscope">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-moon-o"></i></span>
              <h3>Birth &amp; Horoscope Details</h3>
            </div>
            <div class="ep-fields">
              <div class="ep-field">
                <label>Country of Birth <span class="req">*</span></label>
                <select name="birthCountry" id="country11" class="ep-input selecthide">
                  <option value="">Select Country</option>
                  @if(count($allcountry) > 0)
                    @foreach($allcountry as $co)
                    <option @if(!empty($birth->birthCountry))@if($co->id == $birth->birthCountry) selected @endif @endif value="{{ $co->id }}">{{ $co->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>City of Birth <span class="req">*</span></label>
                <input name="birthCity" value="@if(!empty($birth->birthCity)){{ trim($birth->birthCity) }}@endif" placeholder="Please enter city of birth" class="ep-input selecthide" type="text">
              </div>
              <div class="ep-field ep-full">
                <label>Time of Birth</label>
                <div class="ep-time">
                  <select name="birthHours" class="ep-input selecthide time_edit">
                    <option value="">Hour</option>
                    @for($h = 1; $h <= 12; $h++)
                    <option @if(!empty($birth) && $birth->birthHours == $h) selected @endif value="{{ $h }}">{{ sprintf('%02d', $h) }}</option>
                    @endfor
                  </select>
                  <select name="birthminute" class="ep-input selecthide time_edit">
                    <option value="">Minute</option>
                    @for($m = 1; $m <= 59; $m++)
                    <option @if(!empty($birth) && $birth->birthminute == $m) selected @endif value="{{ $m }}">{{ sprintf('%02d', $m) }}</option>
                    @endfor
                  </select>
                  <select name="birthAmPm" class="ep-input selecthide time_edit">
                    <option value="">AM/PM</option>
                    <option @if(!empty($birth->birthAmPm))@if($birth->birthAmPm == "AM") selected @endif @endif value="AM">AM</option>
                    <option @if(!empty($birth->birthAmPm))@if($birth->birthAmPm == "PM") selected @endif @endif value="PM">PM</option>
                  </select>
                </div>
              </div>
              <div class="ep-field">
                <label>Manglik <span class="req">*</span></label>
                <select name="manglik" class="ep-input selecthide">
                  <option value="">Select</option>
                  <option @if(!empty($birth->manglik))@if(1 == $birth->manglik) selected @endif @endif value="1">Yes</option>
                  <option @if(!empty($birth->manglik))@if(2 == $birth->manglik) selected @endif @endif value="2">No</option>
                  <option @if(!empty($birth->manglik))@if(3 == $birth->manglik) selected @endif @endif value="3">Don't Know</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Religious Background -->
          <div class="ep-card" id="sec-religion">
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
                    <option @if($religion->religion == $rel->id) selected @endif value="{{ $rel->id }}">{{ ucwords($rel->name) }}</option>
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
                    <option @if($religion->motherTongue == $mo->id) selected @endif value="{{ $mo->id }}">{{ ucwords($mo->name) }}</option>
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
                    <option @if($religion->community == $comunity->id) selected @endif value="{{ $comunity->id }}">{{ $comunity->name }}</option>
                    @endforeach
                  @endif
                </select>
              </div>
              <div class="ep-field">
                <label>Sub-Community</label>
                <input name="subCommunity" value="{{ $religion->subCommunity }}" placeholder="Please enter sub community" class="ep-input selecthide" type="text">
              </div>
            </div>
          </div>

          <!-- About -->
          <div class="ep-card ep-span" id="sec-about">
            <div class="ep-card-head">
              <span class="ep-card-ic"><i class="fa fa-pencil-square-o"></i></span>
              <h3>More About Yourself, Partner and Family</h3>
            </div>
            <p class="ep-hint">
              This section will help you make a strong impression on your potential partner. So, express yourself.
              (NOTE: This section will be screened everytime you update it. Allow upto 24 hours for it to go live.)
            </p>
            <div class="ep-fields">
              <div class="ep-field ep-full">
                <textarea name="about" placeholder="About yourself" class="ep-input selecthide" maxlength="500" id="epAbout">{{ $detail->about }}</textarea>
                <div class="ep-char"><span id="epAboutCount">{{ strlen($detail->about ?? '') }}</span>/500 characters</div>
              </div>
            </div>
          </div>

          <!-- Actions -->
          <div class="ep-actions">
            <div class="ep-actions-row">
              <a href="{{ URL::to('/profile') }}" class="ep-btn-cancel">Cancel</a>
              <button type="submit" class="ep-btn-save edit_submit_btn"><i class="fa fa-floppy-o"></i> Save &amp; Continue</button>
            </div>
            <span class="ep-note">Your profile is {{ $spPercent }}% complete. Complete your profile to get better match suggestions.</span>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
</form>

<script>
(function () {
  // Sidebar nav: smooth scroll + active state on scroll
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

  // About char counter
  var about = document.getElementById('epAbout');
  var count = document.getElementById('epAboutCount');
  if (about && count) {
    about.addEventListener('input', function () { count.textContent = about.value.length; });
  }
})();
</script>

@include('layouts.footer')
