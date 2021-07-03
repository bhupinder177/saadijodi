@include('layouts.header')
<form action="{{URL::to('/profileUpdate')}}" method="post" id="profileUpdate">

<section class="profile_edit_wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="profile-edit-heading">
          <h2>Edit Personal Profile</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="accordion" id="faq">

          <div class="card">
                <div class="card-header" id="faqhead2">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                    aria-expanded="true" aria-controls="faq2">Upload Photo</a>
                </div>

                <div id="faq2" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq">
                    <div class="card-body">

                        <div class="row">
                          <div class="col-md-12">
                            <div class="upload_pic">
                              <form action="upload_file.php" id="img-upload-form" method="post" enctype="multipart/form-data">
                          <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>

                          <p>
                            <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                            <input class="show-for-sr" type="file" id="upload_imgs" name="upload_imgs[]" multiple/>
                          </p>

                        </form>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead1">
                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                    aria-expanded="true" aria-controls="faq1">Basic Info</a>
                </div>

                <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Profile created by</label>
                          <select name="profilecreatedby" class="selecthide">
                            <option value="">Select</option>
                        <option @if($detail->profileCreatedBy == 1) selected @endif value="1">Self</option>
                        <option @if($detail->profileCreatedBy == 2) selected @endif value="2">Parent / Guardian</option>
                        <option @if($detail->profileCreatedBy == 3) selected @endif value="3">Sibling</option>
                        <option @if($detail->profileCreatedBy == 4) selected @endif value="4">Friend</option>
                        <option @if($detail->profileCreatedBy == 5) selected @endif value="5">Other</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Gender</label>
                            <select name="gender" class="selecthide">
                        <option value="" >Select Gender</option>
                        <option @if($detail->gender == 1) selected @endif value="1" >Male</option>
                        <option @if($detail->gender == 2) selected @endif value="2">Female</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Date of Birth </label>
                            <input value="{{ $d = date("d-m-Y", strtotime($detail->dateOfBirth)) }}" placeholder="Please select date of birth" class="selecthide" type="text" name="dateOfBirth">
                          </div>
                          <div class="form_group_wrap">
                            <label>Marital status</label>
                            <select name="maritalStatus" class="selecthide">
                        <option value="">Select</option>
                        <option @if($detail->maritalStatus == 1) selected @endif value="1">Never Married</option>
                        <option @if($detail->maritalStatus == 2) selected @endif value="2">Divorced</option>
                        <option @if($detail->maritalStatus == 3) selected @endif value="3">Awaiting Divorce</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Height</label>
                            <select name="height" class="selecthide">
  <option value="">Select height</option>
  <option @if($detail->height == 1) selected @endif value="1">4ft 5in </option>
  <option @if($detail->height == 2) selected @endif value="2">4ft 6in </option>
  <option @if($detail->height == 3) selected @endif value="3">4ft 7in </option>
  <option @if($detail->height == 4) selected @endif value="4">4ft 8in </option>
  <option @if($detail->height == 5) selected @endif value="5">4ft 9in </option>
  <option @if($detail->height == 6) selected @endif value="6">4ft 10in</option>
  <option @if($detail->height == 7) selected @endif value="7">4ft 11in</option>
  <option @if($detail->height == 8) selected @endif value="8">5ft </option>
  <option @if($detail->height == 9) selected @endif value="9">5ft 1in </option>
  <option @if($detail->height == 10) selected @endif value="10">5ft 2in </option>
  <option @if($detail->height == 11) selected @endif value="11">5ft 3in </option>
  <option @if($detail->height == 12) selected @endif value="12">5ft 4in </option>
  <option @if($detail->height == 13) selected @endif value="13">5ft 5in </option>
  <option @if($detail->height == 14) selected @endif value="14">5ft 6in </option>
  <option @if($detail->height == 15) selected @endif value="15">5ft 7in </option>
  <option @if($detail->height == 16) selected @endif value="16">5ft 8in </option>
  <option @if($detail->height == 17) selected @endif value="17">5ft 9in </option>
  <option @if($detail->height == 18) selected @endif value="18">5ft 10in </option>
  <option @if($detail->height == 19) selected @endif value="19">5ft 11in </option>
  <option @if($detail->height == 20) selected @endif value="20">6ft </option>
  <option @if($detail->height == 21) selected @endif value="21">6ft 1in </option>
  <option @if($detail->height == 22) selected @endif value="22">6ft 2in </option>
  <option @if($detail->height == 23) selected @endif value="23">6ft 3in </option>
  <option @if($detail->height == 24) selected @endif value="24">6ft 4in </option>
  <option @if($detail->height == 25) selected @endif value="25">6ft 5in </option>
  <option @if($detail->height == 26) selected @endif value="26">6ft 6in </option>
  <option @if($detail->height == 27) selected @endif value="27">6ft 7in </option>
  <option @if($detail->height == 28) selected @endif value="28">6ft 8in </option>
  <option @if($detail->height == 29) selected @endif value="29">6ft 9in </option>
  <option @if($detail->height == 30) selected @endif value="30">6ft 10in </option>
  <option @if($detail->height == 31) selected @endif value="31">6ft 11in </option>
  <option @if($detail->height == 32) selected @endif value="32">7ft </option>

  </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Blood Group</label>
                            <select name="bloodGroup" id="bloodGroup" class="selecthide">
      <option value="" label="Select">Select</option>
      <option @if($detail->bloodGroup == 'Don t Know') selected @endif value="Don't Know" label="Don't Know">Don't Know</option>
      <option @if($detail->bloodGroup == 'A+') selected @endif value="A+" label="A+">A+</option>
      <option @if($detail->bloodGroup == 'A-') selected @endif value="A-" label="A-" selected="selected">A-</option>
      <option @if($detail->bloodGroup == 'B+') selected @endif value="B+" label="B+">B+</option>
      <option @if($detail->bloodGroup == 'B-') selected @endif value="B-" label="B-">B-</option>
      <option @if($detail->bloodGroup == 'AB+') selected @endif value="AB+" label="AB+">AB+</option>
      <option @if($detail->bloodGroup == 'AB-') selected @endif value="AB-" label="AB-">AB-</option>
      <option @if($detail->bloodGroup == 'O+') selected @endif value="O+" label="O+">O+</option>
      <option @if($detail->bloodGroup == 'O-') selected @endif value="O-" label="O-">O-</option>
  </select>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="faqhead3">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                    aria-expanded="true" aria-controls="faq3">Family</a>
                </div>

                <div id="faq3" class="collapse show" aria-labelledby="faqhead3" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Father's Status</label>
                            <select name="fatherStatus" class="selecthide">
                        <option value="">Select</option>
                        <option @if($family->fatherStatus == 1) selected @endif value="1">Employed</option>
                        <option @if($family->fatherStatus == 2) selected @endif value="2">Business</option>
                        <option @if($family->fatherStatus == 3) selected @endif value="3">Retired</option>
                        <option @if($family->fatherStatus == 4) selected @endif value="4">Not Employed</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Mother's Status</label>
                            <select name="motherStatus" class="selecthide">
                              <option value="">Select</option>
                              <option @if($family->motherStatus == 1) selected @endif value="1">Employed</option>
                              <option @if($family->motherStatus == 2) selected @endif value="2">Business</option>
                              <option @if($family->motherStatus == 3) selected @endif value="3">Retired</option>
                              <option @if($family->motherStatus == 4) selected @endif value="4">Not Employed</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Family Location</label>
                            <input name="familyLocation" value="{{ $family->familyLocation }}" placeholder="Please enter family location" class="selecthide" type="text" >
                          </div>
                          <div class="form_group_wrap">
                            <label>Native Place</label>
                            <input name="nativePlace" value="{{ $family->nativePlace }}" placeholder="Please enter native place" class="selecthide" type="text" >
                          </div>
                          <div class="form_group_wrap">
                            <label>No. of Siblings</label>
                            <select name="sibling" class="selecthide">
                        <option value="">Select</option>
                        <option @if($family->sibling == 1) selected @endif value="1">1</option>
                        <option @if($family->sibling == 2) selected @endif value="2">2</option>
                        <option @if($family->sibling == 3) selected @endif value="3">3</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Family Type</label>
                            <select name="familyType" class="selecthide">
                        <option value="">Select</option>
                        <option  @if($family->familyType == 1) selected @endif value="1">Joint</option>
                        <option  @if($family->familyType == 2) selected @endif value="2">Nuclear</option>
                        <option  @if($family->familyType == 3) selected @endif value="3">Joint</option>
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
                    aria-expanded="true" aria-controls="faq5">Lifestyle</a>
                </div>

                <div id="faq5" class="collapse show" aria-labelledby="faqhead5" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Diet</label>
                      <select name="diet" class="selecthide">
                        <option value="" >Select diet</option>
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
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead4">
                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq4"
                    aria-expanded="true" aria-controls="faq4">Education & Career</a>
                </div>

                <div id="faq4" class="collapse show" aria-labelledby="faqhead4" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Highest Qualification</label>
                            <select name="highestQualification" class="selecthide">
                        <optgroup id="educationlevel-optgroup--ENGINEERING-" label="-ENGINEERING-">
      </optgroup>
      <option value="B.E / B.Tech" label="B.E / B.Tech">B.E / B.Tech</option>
      <option value="M.E / M.Tech" label="M.E / M.Tech">M.E / M.Tech</option>
      <option value="M.S Engineering" label="M.S Engineering">M.S Engineering</option>
      <option value="B.Eng (Hons)" label="B.Eng (Hons)">B.Eng (Hons)</option>
      <option value="M.Eng (Hons)" label="M.Eng (Hons)">M.Eng (Hons)</option>
      <option value="Engineering Diploma" label="Engineering Diploma">Engineering Diploma</option>
      <option value="AE" label="AE">AE</option>
      <option value="AET" label="AET">AET</option>
      <optgroup id="educationlevel-optgroup--ARTS / DESIGN-" label="-ARTS / DESIGN-">
      </optgroup>
      <option value="B.A" label="B.A">B.A</option>
      <option value="B.Ed" label="B.Ed">B.Ed</option>
      <option value="BJMC" label="BJMC">BJMC</option>
      <option value="BFA" label="BFA">BFA</option>
      <option value="B.Arch" label="B.Arch">B.Arch</option>
      <option value="B.Des" label="B.Des">B.Des</option>
      <option value="BMM" label="BMM">BMM</option>
      <option value="MFA" label="MFA">MFA</option>
      <option value="M.Ed" label="M.Ed">M.Ed</option>
      <option value="M.A" label="M.A">M.A</option>
      <option value="MSW" label="MSW">MSW</option>
      <option value="MJMC" label="MJMC">MJMC</option>
      <option value="M.Arch" label="M.Arch">M.Arch</option>
      <option value="M.Des" label="M.Des">M.Des</option>
      <option value="BA (Hons)" label="BA (Hons)">BA (Hons)</option>
      <option value="B.Arch (Hons)" label="B.Arch (Hons)">B.Arch (Hons)</option>
      <option value="DFA" label="DFA">DFA</option>
      <option value="D.Ed" label="D.Ed">D.Ed</option>
      <option value="D.Arch" label="D.Arch">D.Arch</option>
      <option value="AA" label="AA">AA</option>
      <option value="AFA" label="AFA">AFA</option>
      <optgroup id="educationlevel-optgroup--FINANCE / COMMERCE-" label="-FINANCE / COMMERCE-">
      </optgroup>
      <option value="B.Com" label="B.Com">B.Com</option>
      <option value="CA / CPA" label="CA / CPA">CA / CPA</option>
      <option value="CFA" label="CFA">CFA</option>
      <option value="CS" label="CS">CS</option>
      <option value="BSc / BFin" label="BSc / BFin">BSc / BFin</option>
      <option value="M.Com" label="M.Com">M.Com</option>
      <option value="MSc / MFin / MS" label="MSc / MFin / MS">MSc / MFin / MS</option>
      <option value="BCom (Hons)" label="BCom (Hons)">BCom (Hons)</option>
      <option value="PGD Finance" label="PGD Finance">PGD Finance</option>
      <optgroup id="educationlevel-optgroup--COMPUTERS / IT-" label="-COMPUTERS / IT-">
      </optgroup>
      <option value="BCA" label="BCA">BCA</option>
      <option value="B.IT" label="B.IT">B.IT</option>
      <option value="BCS" label="BCS">BCS</option>
      <option value="BA Computer Science" label="BA Computer Science">BA Computer Science</option>
      <option value="MCA" label="MCA">MCA</option>
      <option value="PGDCA" label="PGDCA">PGDCA</option>
      <option value="IT Diploma" label="IT Diploma">IT Diploma</option>
      <option value="ADIT" label="ADIT">ADIT</option>
      <optgroup id="educationlevel-optgroup--SCIENCE-" label="-SCIENCE-">
      </optgroup>
      <option value="B.Sc" label="B.Sc">B.Sc</option>
      <option value="M.Sc" label="M.Sc">M.Sc</option>
      <option value="BSc (Hons)" label="BSc (Hons)">BSc (Hons)</option>
      <option value="DipSc" label="DipSc">DipSc</option>
      <option value="AS" label="AS">AS</option>
      <option value="AAS" label="AAS">AAS</option>
      <optgroup id="educationlevel-optgroup--MEDICINE-" label="-MEDICINE-">
      </optgroup>
      <option value="MBBS" label="MBBS">MBBS</option>
      <option value="BDS" label="BDS">BDS</option>
      <option value="BPT" label="BPT">BPT</option>
      <option value="BAMS" label="BAMS">BAMS</option>
      <option value="BHMS" label="BHMS">BHMS</option>
      <option value="B.Pharma" label="B.Pharma">B.Pharma</option>
      <option value="BVSc" label="BVSc">BVSc</option>
      <option value="BSN / BScN" label="BSN / BScN">BSN / BScN</option>
      <option value="MDS" label="MDS">MDS</option>
      <option value="MCh" label="MCh">MCh</option>
      <option value="M.D" label="M.D">M.D</option>
      <option value="M.S Medicine" label="M.S Medicine">M.S Medicine</option>
      <option value="MPT" label="MPT">MPT</option>
      <option value="DM" label="DM">DM</option>
      <option value="M.Pharma" label="M.Pharma">M.Pharma</option>
      <option value="MVSc" label="MVSc">MVSc</option>
      <option value="MMed" label="MMed">MMed</option>
      <option value="PGD Medicine" label="PGD Medicine">PGD Medicine</option>
      <option value="ADN" label="ADN">ADN</option>
      <optgroup id="educationlevel-optgroup--MANAGEMENT-" label="-MANAGEMENT-">
      </optgroup>
      <option value="BBA" label="BBA">BBA</option>
      <option value="BHM" label="BHM">BHM</option>
      <option value="BBM" label="BBM">BBM</option>
      <option value="MBA" label="MBA">MBA</option>
      <option value="PGDM" label="PGDM">PGDM</option>
      <option value="ABA" label="ABA">ABA</option>
      <option value="ADBus" label="ADBus">ADBus</option>
      <optgroup id="educationlevel-optgroup--LAW-" label="-LAW-">
      </optgroup>
      <option value="BL / LLB" label="BL / LLB">BL / LLB</option>
      <option value="ML / LLM" label="ML / LLM">ML / LLM</option>
      <option value="LLB (Hons)" label="LLB (Hons)">LLB (Hons)</option>
      <option value="ALA" label="ALA">ALA</option>
      <optgroup id="educationlevel-optgroup--DOCTORATE-" label="-DOCTORATE-">
      </optgroup>
      <option value="Ph.D" label="Ph.D">Ph.D</option>
      <option value="M.Phil" label="M.Phil">M.Phil</option>
      <optgroup id="educationlevel-optgroup--OTHERS-" label="-OTHERS-">
      </optgroup>
      <option value="Bachelor" label="Bachelor">Bachelor</option>
      <option value="Master" label="Master" >Master</option>
      <option value="Diploma" label="Diploma">Diploma</option>
      <option value="Honours" label="Honours">Honours</option>
      <option value="Doctorate" label="Doctorate">Doctorate</option>
      <option value="Associate" label="Associate">Associate</option>
      <optgroup id="educationlevel-optgroup--NON-GRADUATE-" label="-NON-GRADUATE-">
      </optgroup>
      <option value="High school" label="High school">High school</option>
      <option value="Less than high school" label="Less than high school">Less than high school</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Working With</label>
                            <select name="workingWith" class="selecthide">
                              <option value="" label="Select">Select</option>
         <option value="Private Company" label="Private Company" >Private Company</option>
         <option value="Government / Public Sector" label="Government / Public Sector">Government / Public Sector</option>
         <option value="Defense / Civil Services" label="Defense / Civil Services">Defense / Civil Services</option>
         <option value="Business / Self Employed" label="Business / Self Employed">Business / Self Employed</option>
         <option value="Non Working" label="Not Working">Not Working</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Working As</label>
                            <select name="workingAs" class="selecthide">
                              <option value="" label="Select">Select</option>
        <optgroup id="occupation-optgroup-Accounting, Banking &amp; Finance" label="Accounting, Banking &amp; Finance">
        </optgroup>
        <option value="Banking Professional" label="Banking Professional">Banking Professional</option>
        <option value="Chartered Accountant" label="Chartered Accountant">Chartered Accountant</option>
        <option value="Company Secretary" label="Company Secretary">Company Secretary</option>
        <option value="Finance Professional" label="Finance Professional">Finance Professional</option>
        <option value="Investment Professional" label="Investment Professional">Investment Professional</option>
        <option value="Accounting Professional (Others)" label="Accounting Professional (Others)">Accounting Professional (Others)</option>
        <optgroup id="occupation-optgroup-Administration &amp; HR" label="Administration &amp; HR">
        </optgroup>
        <option value="Admin Professional" label="Admin Professional">Admin Professional</option>
        <option value="Human Resources Professional" label="Human Resources Professional">Human Resources Professional</option>
        <optgroup id="occupation-optgroup-Advertising, Media &amp; Entertainment" label="Advertising, Media &amp; Entertainment">
        </optgroup>
        <option value="Actor" label="Actor">Actor</option>
        <option value="Advertising Professional" label="Advertising Professional">Advertising Professional</option>
        <option value="Entertainment Professional" label="Entertainment Professional">Entertainment Professional</option>
        <option value="Event Manager" label="Event Manager">Event Manager</option>
        <option value="Journalist" label="Journalist">Journalist</option>
        <option value="Media Professional" label="Media Professional">Media Professional</option>
        <option value="Public Relations Professional" label="Public Relations Professional">Public Relations Professional</option>
        <optgroup id="occupation-optgroup-Agriculture" label="Agriculture">
        </optgroup>
        <option value="Farming" label="Farming">Farming</option>
        <option value="Horticulturist" label="Horticulturist">Horticulturist</option>
        <option value="Agricultural Professional (Others)" label="Agricultural Professional (Others)">Agricultural Professional (Others)</option>
        <optgroup id="occupation-optgroup-Airline &amp; Aviation" label="Airline &amp; Aviation">
        </optgroup>
        <option value="Air Hostess / Flight Attendant" label="Air Hostess / Flight Attendant">Air Hostess / Flight Attendant</option>
        <option value="Pilot / Co-Pilot" label="Pilot / Co-Pilot">Pilot / Co-Pilot</option>
        <option value="Other Airline Professional" label="Other Airline Professional">Other Airline Professional</option>
        <optgroup id="occupation-optgroup-Architecture &amp; Design" label="Architecture &amp; Design">
        </optgroup>
        <option value="Architect" label="Architect">Architect</option>
        <option value="Interior Designer" label="Interior Designer">Interior Designer</option>
        <option value="Landscape Architect" label="Landscape Architect">Landscape Architect</option>
        <optgroup id="occupation-optgroup-Artists, Animators &amp; Web Designers" label="Artists, Animators &amp; Web Designers">
        </optgroup>
        <option value="Animator" label="Animator">Animator</option>
        <option value="Commercial Artist" label="Commercial Artist">Commercial Artist</option>
        <option value="Web / UX Designers" label="Web / UX Designers">Web / UX Designers</option>
        <option value="Artist (Others)" label="Artist (Others)">Artist (Others)</option>
        <optgroup id="occupation-optgroup-Beauty, Fashion &amp; Jewellery Designers" label="Beauty, Fashion &amp; Jewellery Designers">
        </optgroup>
        <option value="Beautician" label="Beautician">Beautician</option>
        <option value="Fashion Designer" label="Fashion Designer">Fashion Designer</option>
        <option value="Hairstylist" label="Hairstylist">Hairstylist</option>
        <option value="Jewellery Designer" label="Jewellery Designer">Jewellery Designer</option>
        <option value="Designer (Others)" label="Designer (Others)">Designer (Others)</option>
        <optgroup id="occupation-optgroup-BPO, KPO, &amp; Customer Support" label="BPO, KPO, &amp; Customer Support">
        </optgroup>
        <option value="Customer Support / BPO / KPO Professional" label="Customer Support / BPO / KPO Professional">Customer Support / BPO / KPO Professional</option>
        <optgroup id="occupation-optgroup-Civil Services / Law Enforcement" label="Civil Services / Law Enforcement">
        </optgroup>
        <option value="IAS / IRS / IES / IFS" label="IAS / IRS / IES / IFS">IAS / IRS / IES / IFS</option>
        <option value="Indian Police Services (IPS)" label="Indian Police Services (IPS)">Indian Police Services (IPS)</option>
        <option value="Law Enforcement Employee (Others)" label="Law Enforcement Employee (Others)">Law Enforcement Employee (Others)</option>
        <optgroup id="occupation-optgroup-Defense" label="Defense">
        </optgroup>
        <option value="Airforce" label="Airforce">Airforce</option>
        <option value="Army" label="Army">Army</option>
        <option value="Navy" label="Navy">Navy</option>
        <option value="Defense Services (Others)" label="Defense Services (Others)">Defense Services (Others)</option>
        <optgroup id="occupation-optgroup-Education &amp; Training" label="Education &amp; Training">
        </optgroup>
        <option value="Lecturer" label="Lecturer">Lecturer</option>
        <option value="Professor" label="Professor">Professor</option>
        <option value="Research Assistant" label="Research Assistant">Research Assistant</option>
        <option value="Research Scholar" label="Research Scholar">Research Scholar</option>
        <option value="Teacher" label="Teacher">Teacher</option>
        <option value="Training Professional (Others)" label="Training Professional (Others)">Training Professional (Others)</option>
        <optgroup id="occupation-optgroup-Engineering" label="Engineering">
        </optgroup>
        <option value="Civil Engineer" label="Civil Engineer">Civil Engineer</option>
        <option value="Electronics / Telecom Engineer" label="Electronics / Telecom Engineer">Electronics / Telecom Engineer</option>
        <option value="Mechanical / Production Engineer" label="Mechanical / Production Engineer">Mechanical / Production Engineer</option>
        <option value="Non IT Engineer (Others)" label="Non IT Engineer (Others)">Non IT Engineer (Others)</option>
        <optgroup id="occupation-optgroup-Hotel &amp; Hospitality" label="Hotel &amp; Hospitality">
        </optgroup>
        <option value="Chef / Sommelier / Food Critic" label="Chef / Sommelier / Food Critic">Chef / Sommelier / Food Critic</option>
        <option value="Catering Professional" label="Catering Professional">Catering Professional</option>
        <option value="Hotel &amp; Hospitality Professional (Others)" label="Hotel &amp; Hospitality Professional (Others)">Hotel &amp; Hospitality Professional (Others)</option>
        <optgroup id="occupation-optgroup-IT &amp; Software Engineering" label="IT &amp; Software Engineering">
        </optgroup>
        <option value="Software Developer / Programmer" label="Software Developer / Programmer" >Software Developer / Programmer</option>
        <option value="Software Consultant" label="Software Consultant">Software Consultant</option>
        <option value="Hardware &amp; Networking professional" label="Hardware &amp; Networking professional">Hardware &amp; Networking professional</option>
        <option value="Software Professional (Others)" label="Software Professional (Others)">Software Professional (Others)</option>
        <optgroup id="occupation-optgroup-Legal" label="Legal">
        </optgroup>
        <option value="Lawyer" label="Lawyer">Lawyer</option>
        <option value="Legal Assistant" label="Legal Assistant">Legal Assistant</option>
        <option value="Legal Professional (Others)" label="Legal Professional (Others)">Legal Professional (Others)</option>
        <optgroup id="occupation-optgroup-Medical &amp; Healthcare" label="Medical &amp; Healthcare">
        </optgroup>
        <option value="Dentist" label="Dentist">Dentist</option>
        <option value="Doctor" label="Doctor">Doctor</option>
        <option value="Medical Transcriptionist" label="Medical Transcriptionist">Medical Transcriptionist</option>
        <option value="Nurse" label="Nurse">Nurse</option>
        <option value="Pharmacist" label="Pharmacist">Pharmacist</option>
        <option value="Physician Assistant" label="Physician Assistant">Physician Assistant</option>
        <option value="Physiotherapist / Occupational Therapist" label="Physiotherapist / Occupational Therapist">Physiotherapist / Occupational Therapist</option>
        <option value="Psychologist" label="Psychologist">Psychologist</option>
        <option value="Surgeon" label="Surgeon">Surgeon</option>
        <option value="Veterinary Doctor" label="Veterinary Doctor">Veterinary Doctor</option>
        <option value="Therapist (Others)" label="Therapist (Others)">Therapist (Others)</option>
        <option value="Medical / Healthcare Professional (Others)" label="Medical / Healthcare Professional (Others)">Medical / Healthcare Professional (Others)</option>
        <optgroup id="occupation-optgroup-Merchant Navy" label="Merchant Navy">
        </optgroup>
        <option value="Merchant Naval Officer" label="Merchant Naval Officer">Merchant Naval Officer</option>
        <option value="Mariner" label="Mariner">Mariner</option>
        <optgroup id="occupation-optgroup-Sales &amp; Marketing" label="Sales &amp; Marketing">
        </optgroup>
        <option value="Marketing Professional" label="Marketing Professional">Marketing Professional</option>
        <option value="Sales Professional" label="Sales Professional">Sales Professional</option>
        <optgroup id="occupation-optgroup-Science" label="Science">
        </optgroup>
        <option value="Biologist / Botanist" label="Biologist / Botanist">Biologist / Botanist</option>
        <option value="Physicist" label="Physicist">Physicist</option>
        <option value="Science Professional (Others)" label="Science Professional (Others)">Science Professional (Others)</option>
        <optgroup id="occupation-optgroup-Corporate Professionals" label="Corporate Professionals">
        </optgroup>
        <option value="CxO / Chairman / Director / President" label="CxO / Chairman / Director / President">CxO / Chairman / Director / President</option>
        <option value="VP / AVP / GM / DGM" label="VP / AVP / GM / DGM">VP / AVP / GM / DGM</option>
        <option value="Sr. Manager / Manager" label="Sr. Manager / Manager">Sr. Manager / Manager</option>
        <option value="Consultant / Supervisor / Team Leads" label="Consultant / Supervisor / Team Leads">Consultant / Supervisor / Team Leads</option>
        <option value="Team Member / Staff" label="Team Member / Staff">Team Member / Staff</option>
        <optgroup id="occupation-optgroup-Others" label="Others">
        </optgroup>
        <option value="Agent / Broker / Trader / Contractor" label="Agent / Broker / Trader / Contractor">Agent / Broker / Trader / Contractor</option>
        <option value="Business Owner / Entrepreneur" label="Business Owner / Entrepreneur">Business Owner / Entrepreneur</option>
        <option value="Politician" label="Politician">Politician</option>
        <option value="Social Worker / Volunteer / NGO" label="Social Worker / Volunteer / NGO">Social Worker / Volunteer / NGO</option>
        <option value="Sportsman" label="Sportsman">Sportsman</option>
        <option value="Travel &amp; Transport Professional" label="Travel &amp; Transport Professional">Travel &amp; Transport Professional</option>
        <option value="Writer" label="Writer">Writer</option>
        <optgroup id="occupation-optgroup-Non Working" label="Non Working">
        </optgroup>
        <option value="Student" label="Student">Student</option>
        <option value="Retired" label="Retired">Retired</option>
        <option value="Not working" label="Not working">Not working</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Employer Name</label>
                            <input name="employerName" class="selecthide" type="text" placeholder="Please enter employer Name">
                          </div>
                          <div class="form_group_wrap">
                            <label>Annual Income</label>
                            <select name="income" class="selecthide">
                        <option value="">Select income</option>
                        <option @if($family->income == 1) selected @endif value="1">Upto INR 1 Lakh</option>
                        <option @if($family->income == 2) selected @endif value="2">INR 1 Lakh to 2 Lakh</option>
                        <option @if($family->income == 3) selected @endif value="3">INR 2 Lakh to 4 Lakh</option>
                        <option @if($family->income == 4) selected @endif value="4">INR 4 Lakh to 7 Lakh</option>
                        <option @if($family->income == 5) selected @endif value="4">INR 7 Lakh to 10 Lakh</option>
                    </select>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead6">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6"
                    aria-expanded="true" aria-controls="faq6">More About Yourself, Partner and Famil</a>
                </div>

                <div id="faq6" class="collapse show" aria-labelledby="faqhead6" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <p>This section will help you make a strong impression on your 		potential partner. So, express yourself.
                      (NOTE: This section will be screened everytime you update it. Allow upto 24 hours for it to go live. )
                    </p>
                    <textarea name="about" placeholder="About your self" class="selecthide">{{ $detail->about }}</textarea>
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
                        <option value="">Select religion</option>
                        <option value="1" >Hindu</option>
                        <option value="2">Muslim</option>
                        <option value="3">Christian</option>
                        <option value="4">Sikh</option>
                        <option value="5">Parsi</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Mother Tongue</label>
                            <select name="motherTongue" class="selecthide">
                        <option value="">Select Mother Tongue</option>
                        <option value="1">Hindi</option>
                        <option value="2">Marathi</option>
                        <option value="3">Punjabi</option>
                        <option value="4">Bengali</option>
                        <option value="5">Gujarati</option>
                        <option value="6">Urdu</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Community</label>
                            <select name="community" class="selecthide">
                        <option value="">Select</option>
                        <option value="1">Rajput</option>
                        <option value="2">Punjabi</option>
                        <option value="3">Awaiting Divorce</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Sub-Community</label>
                            <input name="subCommunity" class="selecthide" type="text" name="">
                          </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
      </div>

      <div class="col-md-12">
        <div class="profile_submit">
          <button type="submit" class="edit_submit_btn">Submit</button>
        </div>
      </div>

    </div>
  </div>
</section>
</form>

@include('layouts.footer')
