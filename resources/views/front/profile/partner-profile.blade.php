@include('layouts.header')

<form action="{{URL::to('/partnerPreferenceUpdate')}}" method="post" id="partnerPreferenceUpdate">

  <section class="profile_edit_wrap">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="profile-edit-heading">
            <h2>Edit Tell us what you are looking for in a life partner</h2>
          </div>
        </div>

        <div class="col-md-6">
          <div class="accordion" id="faq">

            <div class="card">
                  <div class="card-header" id="faqhead2">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                      aria-expanded="true" aria-controls="faq2">Basic Info</a>
                  </div>

                  <div id="faq2" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq">
                      <div class="card-body">

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form_group_wrap">
                                <label>Age</label>
                            <div class="selector">
                              <div class="price-slider">
                                  <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                      <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0;"></span>
                                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="right: 0;"></span>
                                  </div>
                                  <span id="min-price" data-currency="€" class="slider-price">0</span>
                                  <span class="seperator">-</span>
                                  <span id="max-price" data-currency="€" data-max="3500"  class="slider-price">3500 +</span>
                              </div>
                          </div>
                              </div>

                              <div class="form_group_wrap">
                                <label>Height</label>
                            <div class="selector">
                              <div class="price-slider">
                                  <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                      <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0;"></span>
                                      <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="right: 0;"></span>
                                  </div>
                                  <span id="min-price" data-currency="€" class="slider-price">0</span>
                                  <span class="seperator">-</span>
                                  <span id="max-price" data-currency="€" data-max="3500"  class="slider-price">3500 +</span>
                              </div>
                          </div>
                              </div>
                              <div class="form_group_wrap">
                                <label>Marital status</label>
                                <select name="maritalStatus" class="selecthide">
                            <option value="">Select</option>
                            <option @if(!empty($detail)) @if($detail->maritalStatus == 1) selected @endif @endif value="1">Never Married</option>
                            <option @if(!empty($detail)) @if($detail->maritalStatus == 2) selected @endif @endif value="2">Divorced</option>
                            <option @if(!empty($detail)) @if($detail->maritalStatus == 3) selected @endif @endif value="3">Awaiting Divorce</option>
                        </select>
                              </div>


                            </div>
                          </div>

                      </div>
                  </div>
              </div>

              <div class="card">
                  <div class="card-header" id="faqhead3">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                      aria-expanded="true" aria-controls="faq3">Location Details</a>
                  </div>

                  <div id="faq3" class="collapse show" aria-labelledby="faqhead3" data-parent="#faq">
                      <div class="card-body">

                          <div class="col-md-12">
                            <div class="form_group_wrap">
                              <label>Country living in</label>
                              <select name="country" id="country" class="selecthide">
                          <option value="">Select Country</option>
                          @if(count($allcountry) > 0)
                          @foreach($allcountry as $c)
                          <option @if(!empty($location->country))@if($c->id == $location->country) selected @endif @endif value="{{ $c->id }}" >{{ $c->name }}</option>
                          @endforeach
                          @endif
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>State living in</label>
                              <select name="state" id="states" class="selecthide">
                              <option value="">Select State</option>
                              @if(count($states) > 0)
                              @foreach($states as $s)
                              <option @if(!empty($location->state))@if($s->id == $location->state) selected @endif @endif value="{{ $c->id }}" >{{ $s->name }}</option>
                              @endforeach
                              @endif


                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>City / District</label>
                              <select id="cities" name="city" class="selecthide">
                          <option value="">Select City</option>
                          @if(count($city) > 0)
                          @foreach($city as $c)
                          <option @if(!empty($location->city))@if($c->id == $location->city) selected @endif @endif value="{{ $c->id }}" >{{ $c->name }}</option>
                          @endforeach
                          @endif

                      </select>
                            </div>
                          </div>

                      </div>
                  </div>
              </div>

              <div class="card">
                  <div class="card-header" id="faqhead4">
                      <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq4"
                      aria-expanded="true" aria-controls="faq4">Education & Profession Details</a>
                  </div>

                  <div id="faq4" class="collapse show" aria-labelledby="faqhead4" data-parent="#faq">
                      <div class="card-body">

                          <div class="col-md-12">
                            <div class="form_group_wrap">
                              <label>Qualification</label>
                              <select name="highestQualification" class="selecthide">
                          <optgroup id="educationlevel-optgroup--ENGINEERING-" label="-ENGINEERING-">
        </optgroup>
        <option value="">Select</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 1) selected @endif @endif value="1">B.E / B.Tech</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 2) selected @endif @endif value="2">M.E / M.Tech</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 3) selected @endif @endif value="3">M.S Engineering</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 4) selected @endif @endif value="4">B.Eng (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 5) selected @endif @endif value="5">M.Eng (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 6) selected @endif @endif value="6">Engineering Diploma</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 7) selected @endif @endif value="7">AE</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 8) selected @endif @endif value="8">AET</option>
        <optgroup id="educationlevel-optgroup--ARTS / DESIGN-" label="-ARTS / DESIGN-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 9) selected @endif @endif value="9">B.A</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 10) selected @endif @endif value="10">B.Ed</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 11) selected @endif @endif value="11">BJMC</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 12) selected @endif @endif value="12">BFA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 13) selected @endif @endif value="13">B.Arch</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 14) selected @endif @endif value="14">B.Des</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 15) selected @endif @endif value="15">BMM</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 16) selected @endif @endif value="16">MFA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 17) selected @endif @endif value="17">M.Ed</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 18) selected @endif @endif value="18">M.A</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 19) selected @endif @endif value="19">MSW</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 20) selected @endif @endif value="20">MJMC</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 21) selected @endif @endif value="21">M.Arch</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 22) selected @endif @endif value="22">M.Des</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 23) selected @endif @endif value="23">BA (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 24) selected @endif @endif value="24">B.Arch (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 25) selected @endif @endif value="25">DFA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 26) selected @endif @endif value="26">D.Ed</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 27) selected @endif @endif value="27">D.Arch</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 28) selected @endif @endif value="28">AA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 29) selected @endif @endif value="29">AFA</option>
        <optgroup id="educationlevel-optgroup--FINANCE / COMMERCE-" label="-FINANCE / COMMERCE-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 30) selected @endif @endif value="30">B.Com</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 31) selected @endif @endif value="31">CA / CPA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 32) selected @endif @endif value="32">CFA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 33) selected @endif @endif value="33">CS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 34) selected @endif @endif value="34">BSc / BFin</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 35) selected @endif @endif value="35">M.Com</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 36) selected @endif @endif value="36" label="MSc / MFin / MS">MSc / MFin / MS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 37) selected @endif @endif value="37">BCom (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 38) selected @endif @endif value="38">PGD Finance</option>
        <optgroup id="educationlevel-optgroup--COMPUTERS / IT-" label="-COMPUTERS / IT-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 39) selected @endif @endif value="39">BCA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 40) selected @endif @endif value="40">B.IT</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 41) selected @endif @endif value="41">BCS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 42) selected @endif @endif value="42">BA Computer Science</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 43) selected @endif @endif value="43">MCA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 44) selected @endif @endif value="44">PGDCA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 45) selected @endif @endif value="45">IT Diploma</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 46) selected @endif @endif value="46" label="ADIT">ADIT</option>
        <optgroup id="educationlevel-optgroup--SCIENCE-" label="-SCIENCE-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 47) selected @endif @endif value="47" label="B.Sc">B.Sc</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 48) selected @endif @endif value="48" label="M.Sc">M.Sc</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 49) selected @endif @endif value="49" label="BSc (Hons)">BSc (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 50) selected @endif @endif value="50" label="DipSc">DipSc</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 51) selected @endif @endif value="51" label="AS">AS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 52) selected @endif @endif value="52" label="AAS">AAS</option>
        <optgroup id="educationlevel-optgroup--MEDICINE-" label="-MEDICINE-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 53) selected @endif @endif value="53" label="MBBS">MBBS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 54) selected @endif @endif value="54" label="BDS">BDS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 55) selected @endif @endif value="55" label="BPT">BPT</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 56) selected @endif @endif value="56" label="BAMS">BAMS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 57) selected @endif @endif value="57" label="BHMS">BHMS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 58) selected @endif @endif value="58" label="B.Pharma">B.Pharma</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 59) selected @endif @endif value="59" label="BVSc">BVSc</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 60) selected @endif @endif value="60" label="BSN / BScN">BSN / BScN</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 61) selected @endif @endif value="61" label="MDS">MDS</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 62) selected @endif @endif value="62" label="MCh">MCh</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 63) selected @endif @endif value="63" label="M.D">M.D</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 64) selected @endif @endif value="64" label="M.S Medicine">M.S Medicine</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 65) selected @endif @endif value="65" label="MPT">MPT</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 66) selected @endif @endif value="66" label="DM">DM</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 67) selected @endif @endif value="67" label="M.Pharma">M.Pharma</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 68) selected @endif @endif value="68" label="MVSc">MVSc</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 69) selected @endif @endif value="69" label="MMed">MMed</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 70) selected @endif @endif value="70" label="PGD Medicine">PGD Medicine</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 71) selected @endif @endif value="71" label="ADN">ADN</option>
        <optgroup id="educationlevel-optgroup--MANAGEMENT-" label="-MANAGEMENT-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 72) selected @endif @endif value="72" label="BBA">BBA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 73) selected @endif @endif value="73" label="BHM">BHM</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 74) selected @endif @endif value="74" label="BBM">BBM</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 75) selected @endif @endif value="75" label="MBA">MBA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 76) selected @endif @endif value="76" label="PGDM">PGDM</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 77) selected @endif @endif value="77" label="ABA">ABA</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 78) selected @endif @endif value="78" label="ADBus">ADBus</option>
        <optgroup id="educationlevel-optgroup--LAW-" label="-LAW-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 79) selected @endif @endif value="79" label="BL / LLB">BL / LLB</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 80) selected @endif @endif value="80" label="ML / LLM">ML / LLM</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 81) selected @endif @endif value="81" label="LLB (Hons)">LLB (Hons)</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 82) selected @endif @endif value="82" label="ALA">ALA</option>
        <optgroup id="educationlevel-optgroup--DOCTORATE-" label="-DOCTORATE-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 83) selected @endif @endif value="83" label="Ph.D">Ph.D</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 84) selected @endif @endif value="84" label="M.Phil">M.Phil</option>
        <optgroup id="educationlevel-optgroup--OTHERS-" label="-OTHERS-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 85) selected @endif @endif value="85" label="Bachelor">Bachelor</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 86) selected @endif @endif value="86" label="Master" >Master</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 87) selected @endif @endif value="87" label="Diploma">Diploma</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 88) selected @endif @endif value="88" label="Honours">Honours</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 89) selected @endif @endif value="89" label="Doctorate">Doctorate</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 90) selected @endif @endif value="90" label="Associate">Associate</option>
        <optgroup id="educationlevel-optgroup--NON-GRADUATE-" label="-NON-GRADUATE-">
        </optgroup>
        <option @if(!empty($detail)) @if($detail->highestQualification == 91) selected @endif @endif value="91" label="High school">High school</option>
        <option @if(!empty($detail)) @if($detail->highestQualification == 92) selected @endif @endif value="92" label="Less than high school">Less than high school</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Working With</label>
                              <select name="workingWith" class="selecthide">
                                <option value="" label="Select">Select</option>
           <option @if(!empty($detail)) @if($detail->workingWith == 1) selected @endif @endif value="1">Private Company</option>
           <option @if(!empty($detail)) @if($detail->workingWith == 2) selected @endif @endif value="2">Government / Public Sector</option>
           <option @if(!empty($detail)) @if($detail->workingWith == 3) selected @endif @endif value="3">Defense / Civil Services</option>
           <option @if(!empty($detail)) @if($detail->workingWith == 4) selected @endif @endif value="4">Business / Self Employed</option>
           <option @if(!empty($detail)) @if($detail->workingWith == 5) selected @endif @endif value="5">Not Working</option>
                      </select>
                            </div>

                            <div class="form_group_wrap">
                              <label>Annual income</label>
                              <select name="income" class="selecthide">
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
                  </div>
              </div>

          </div>
        </div>


        <div class="col-md-6">
          <div class="accordion" id="faq">

              <div class="card">
                  <div class="card-header" id="faqhead5">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5"
                      aria-expanded="true" aria-controls="faq5">Other Details </a>
                  </div>

                  <div id="faq5" class="collapse show" aria-labelledby="faqhead5" data-parent="#faq">
                      <div class="card-body">

                          <div class="col-md-12">

                            <div class="form_group_wrap">
                              <label>Diet</label>
                              <select name="diet" class="selecthide">
                                <option value="" >Select diet</option>
                                <option @if(!empty($detail)) @if($detail->diet == 1) selected @endif @endif value="1">Veg</option>
                                <option @if(!empty($detail)) @if($detail->diet == 2) selected @endif @endif value="2">Non-Veg</option>
                                <option @if(!empty($detail)) @if($detail->diet == 3) selected @endif @endif value="3">Occasionally Non-Veg</option>
                                <option @if(!empty($detail)) @if($detail->diet == 4) selected @endif @endif value="4">Eggetarian</option>
                                <option @if(!empty($detail)) @if($detail->diet == 5) selected @endif @endif value="5">Jain</option>
                                <option @if(!empty($detail)) @if($detail->diet == 6) selected @endif @endif value="6">Vegan</option>
                            </select>
                            </div>
                          </div>

                      </div>
                  </div>
              </div>




              <div class="card">
                  <div class="card-header" id="faqhead2">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                      aria-expanded="true" aria-controls="faq2">Religious Background</a>
                  </div>

                  <div id="faq2" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq">
                      <div class="card-body">

                          <div class="col-md-12">
                            <div class="form_group_wrap">
                              <label>Religion</label>
                              <select name="religion" class="selecthide">
                          <option  value="">Select religion</option>
                          <option @if(!empty($detail))f @if($detail->religion == 1) selected @endif @endif value="1" >Hindu</option>
                          <option @if(!empty($detail)) @if($detail->religion == 2) selected @endif @endif value="2">Muslim</option>
                          <option @if(!empty($detail)) @if($detail->religion == 3) selected @endif @endif value="3">Christian</option>
                          <option @if(!empty($detail)) @if($detail->religion == 4) selected @endif @endif value="4">Sikh</option>
                          <option @if(!empty($detail)) @if($detail->religion == 5) selected @endif @endif value="5">Parsi</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Community</label>
                              <label>Community</label>
                              <select name="community" class="selecthide">
                          <option value="">Select</option>
                          <option @if(!empty($detail)) @if($detail->community == 1) selected @endif @endif value="1">Rajput</option>
                          <option @if(!empty($detail)) @if($detail->community == 2) selected @endif @endif value="2">Punjabi</option>
                          <option @if(!empty($detail)) @if($detail->community == 3) selected @endif @endif value="3">Awaiting Divorce</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Mother Tongue</label>
                              <select name="motherTongue" class="selecthide">
                            <option value="">Select Mother Tongue</option>
                            <option @if(!empty($detail)) @if($detail->motherTongue == 1) selected @endif @endif value="1">Hindi</option>
                            <option @if(!empty($detail)) @if($detail->motherTongue == 2) selected @endif @endif value="2">Marathi</option>
                            <option @if(!empty($detail)) @if($detail->motherTongue == 3) selected @endif @endif value="3">Punjabi</option>
                            <option @if(!empty($detail)) @if($detail->motherTongue == 4) selected @endif @endif value="4">Bengali</option>
                            <option @if(!empty($detail)) @if($detail->motherTongue == 5) selected @endif @endif value="5">Gujarati</option>
                            <option @if(!empty($detail)) @if($detail->motherTongue == 6) selected @endif @endif value="6">Urdu</option>
                            </select>
                            </div>
                          </div>

                      </div>
                  </div>
              </div>


          </div>
        </div>

        <div class="col-md-12">
          <div class="profile_submit">
            <button type="button" class="edit_submit_btn">Submit</button>
          </div>
        </div>

      </div>
    </div>
  </section>

</form>


@include('layouts.footer')
