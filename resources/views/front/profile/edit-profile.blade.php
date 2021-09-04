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
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2123"
                    aria-expanded="true" aria-controls="faq2">Profile Photo</a>
                </div>

                <div id="faq2123" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq">
                    <div class="card-body">

                        <div class="row">
                          <div class="col-md-12">
                            <div class="upload_pic">
                          <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>

                          <p>
                            <label for="upload_imgs" class="button hollow">Select Profile Picture</label>
                            <input class="show-for-sr profilechange" accept="image/*" type="file" id="upload_imgs" name="profile" />
                          </p>
                          @if(!empty(($profileimage)))
                          <div class="imagesshow1">
                          <img class="profileshow" src="{{ asset('profiles/'.$profileimage->image) }}" width="50" height="50">
                          </div>
                          @else
                          <div class="imagesshow1">
                          <img class="profileshow"  >
                          </div>

                          @endif


                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>

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
                          <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>

                          <p>
                            <label for="upload_imgs1" class="button hollow">Select Your Images +</label>
                            <input class="show-for-sr multipleimageUpload" accept="image/*" type="file" id="upload_imgs1" name="images[]" multiple/>
                          </p>
                          @if(count($images) > 0)
                          <div class="imagesshow">
                  @foreach($images as $i)
                  <span class="docimg{{ $i->id }}"><img class="doctype1 docimg{{ $i->id }}" src="{{ asset('profiles/'.$i->image) }}" width="50" height="50">
                  <a data-typee="1" data-type="1" class="removedocument removedocument{{ $i->id }}" data-id="{{ $i->id }}"><i  class="fa fa-times" aria-hidden="true"></i></a></span>
                  @endforeach
                </div>
                @else
                <div class="imagesshow">
                </div>
                @endif


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
                            <label>Profile created by <span class="red-text">*</span></label>
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
                            <label>Gender <span class="red-text">*</span></label>
                            <select name="gender" class="selecthide">
                        <option value="" >Select Gender</option>
                        <option @if($detail->gender == 1) selected @endif value="1" >Male</option>
                        <option @if($detail->gender == 2) selected @endif value="2">Female</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Date of Birth <span class="red-text">*</span></label>
                            <input value="@if($detail->dateOfBirth){{ $d = date("d-m-Y", strtotime($detail->dateOfBirth)) }}@endif" placeholder="Please select date of birth" class="selecthide dateofbirth" type="text" name="dateOfBirth">
                          </div>
                          <div class="form_group_wrap">
                            <label>Marital status <span class="red-text">*</span></label>
                            <select name="maritalStatus" class="selecthide">
                        <option value="">Select</option>
                        <option @if($detail->maritalStatus == 1) selected @endif value="1">Never Married</option>
                        <option @if($detail->maritalStatus == 2) selected @endif value="2">Divorced</option>
                        <option @if($detail->maritalStatus == 3) selected @endif value="3">Awaiting Divorce</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Height <span class="red-text">*</span></label>
                            <select name="height" class="selecthide">
  <option value="">Select height</option>
  @if($allheight)
  @foreach($allheight as $height)
  <option @if($detail->height == $height->id) selected @endif value="{{ $height->id }}">{{ $height->inch }} - {{ $height->cm }} </option>
  @endforeach
  @endif


  </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Blood Group <span class="red-text">*</span></label>
                            <select name="bloodGroup" id="bloodGroup" class="selecthide">
      <option value="" label="Select">Select</option>
      <option @if($detail->bloodGroup == 'Don t Know') selected @endif value="Don t Know" label="Don't Know">Don't Know</option>
      <option @if($detail->bloodGroup == 'A+') selected @endif value="A+" label="A+">A+</option>
      <option @if($detail->bloodGroup == 'A-') selected @endif value="A-" label="A-" >A-</option>
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
                            <label>Father's Status <span class="red-text">*</span></label>
                            <select name="fatherStatus" class="selecthide">
                        <option value="">Select</option>
                        <option @if($family->fatherStatus == 1) selected @endif value="1">Employed</option>
                        <option @if($family->fatherStatus == 2) selected @endif value="2">Business</option>
                        <option @if($family->fatherStatus == 3) selected @endif value="3">Retired</option>
                        <option @if($family->fatherStatus == 4) selected @endif value="4">Not Employed</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Mother's Status <span class="red-text">*</span></label>
                            <select name="motherStatus" class="selecthide">
                              <option value="">Select</option>
                              <option @if($family->motherStatus == 1) selected @endif value="1">Employed</option>
                              <option @if($family->motherStatus == 2) selected @endif value="2">Business</option>
                              <option @if($family->motherStatus == 3) selected @endif value="3">Retired</option>
                              <option @if($family->motherStatus == 4) selected @endif value="4">Not Employed</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Family Location <span class="red-text">*</span></label>
                            <input name="familyLocation" value="{{ $family->familyLocation }}" placeholder="Please enter family location" class="selecthide" type="text" >
                          </div>
                          <div class="form_group_wrap">
                            <label>Native Place <span class="red-text">*</span></label>
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
                            <label>Family Type <span class="red-text">*</span></label>
                            <select name="familyType" class="selecthide">
                        <option value="">Select</option>
                        <option  @if($family->familyType == 1) selected @endif value="1">Joint</option>
                        <option  @if($family->familyType == 2) selected @endif value="2">Nuclear</option>
                    </select>
                          </div>
                        </div>

                    </div>
                </div>
            </div>


                        <div class="card">
                            <div class="card-header" id="faqhead5">
                                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq51"
                                aria-expanded="true" aria-controls="faq5">Birth & Horoscope details</a>
                            </div>

                            <div id="faq51" class="collapse show" aria-labelledby="faqhead5" data-parent="#faq">
                                <div class="card-body">

                                    <div class="col-md-12">
                                      <div class="form_group_wrap">
                                        <label>Country of Birth <span class="red-text">*</span></label>
                                        <select name="birthCountry" id="country11" class="selecthide">
                                      <option value="">Select Country</option>
                                      @if(count($allcountry) > 0)
                                      @foreach($allcountry as $co)
                                      <option @if(!empty($birth->birthCountry))@if($co->id == $birth->birthCountry) selected @endif @endif value="{{ $co->id }}" >{{ $co->name }}</option>
                                      @endforeach
                                      @endif
                                      </select>
                                      </div>
                                      <div class="form_group_wrap">
                                        <label>City of Birth <span class="red-text">*</span></label>
                                        <input name="birthCity" value="@if(!empty($birth->birthCity)) {{ $birth->birthCity }}@endif" placeholder="Please enter city of birth" class="selecthide" type="text" >
                                      </div>
                                      <div class="form_group_wrap">
             <label>Time of Birth</label>
             <select name="birthHours" class="selecthide time_edit">
               <option value="">Select Hour</option>

               <option @if(!empty($birth->birthHours))@if($birth->birthHours == 1) selected @endif @endif value="1">01</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 2) selected @endif @endif value="2">02</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 3) selected @endif @endif value="3">03</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 4) selected @endif @endif value="4">04</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 5) selected @endif @endif value="5">05</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 6) selected @endif @endif value="6">06</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 7) selected @endif @endif value="7">07</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 8) selected @endif @endif value="8">08</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 9) selected @endif @endif value="9">09</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 10) selected @endif @endif value="10">10</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 11) selected @endif @endif value="11">11</option>
  <option @if(!empty($birth->birthHours))@if($birth->birthHours == 12) selected @endif @endif value="12">12</option>
             </select>
             <select name="birthminute" class="selecthide time_edit">
               <option value="">Select Minute</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 1) selected @endif @endif value="1">01</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 2) selected @endif @endif value="2">02</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 3) selected @endif @endif value="3">03</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 4) selected @endif @endif value="4">04</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 5) selected @endif @endif value="5">05</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 6) selected @endif @endif value="6">06</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 7) selected @endif @endif value="7">07</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 8) selected @endif @endif value="8">08</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 9) selected @endif @endif value="9">09</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 10) selected @endif @endif value="10">10</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 11) selected @endif @endif value="11">11</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 12) selected @endif @endif value="12">12</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 13) selected @endif @endif value="13">13</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 14) selected @endif @endif value="14">14</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 15) selected @endif @endif value="15">15</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 16) selected @endif @endif value="16">16</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 17) selected @endif @endif value="17">17</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 18) selected @endif @endif value="18">18</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 19) selected @endif @endif value="19">19</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 20) selected @endif @endif value="20">20</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 21) selected @endif @endif value="21">21</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 22) selected @endif @endif value="22">22</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 23) selected @endif @endif value="23">23</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 24) selected @endif @endif value="24">24</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 25) selected @endif @endif value="25">25</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 26) selected @endif @endif value="26">26</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 27) selected @endif @endif value="27">27</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 28) selected @endif @endif value="28">28</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 29) selected @endif @endif value="29">29</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 30) selected @endif @endif value="30">30</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 31) selected @endif @endif value="31">31</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 32) selected @endif @endif value="32">32</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 33) selected @endif @endif value="33">33</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 34) selected @endif @endif value="34">34</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 35) selected @endif @endif value="35">35</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 36) selected @endif @endif value="36">36</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 37) selected @endif @endif value="37">37</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 38) selected @endif @endif value="38">38</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 39) selected @endif @endif value="39">39</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 40) selected @endif @endif value="40">40</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 41) selected @endif @endif value="41">41</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 42) selected @endif @endif value="42">42</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 43) selected @endif @endif value="43">43</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 44) selected @endif @endif value="44">44</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 45) selected @endif @endif value="45">45</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 46) selected @endif @endif value="46">46</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 47) selected @endif @endif value="47">47</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 48) selected @endif @endif value="48">48</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 49) selected @endif @endif value="49">49</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 50) selected @endif @endif value="50">50</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 51) selected @endif @endif value="51">51</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 52) selected @endif @endif value="52">52</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 53) selected @endif @endif value="53">53</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 54) selected @endif @endif value="54">54</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 55) selected @endif @endif value="55">55</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 56) selected @endif @endif value="56">56</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 57) selected @endif @endif value="57">57</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 58) selected @endif @endif value="58">58</option>
               <option @if(!empty($birth->birthminute))@if($birth->birthminute == 59) selected @endif @endif value="59">59</option>
             </select>
             <select name="birthAmPm" class="selecthide time_edit ">
               <option value="">Select</option>

                <option @if(!empty($birth->birthAmPm))@if($birth->birthAmPm == "AM") selected @endif @endif value="AM">AM</option>
                <option @if(!empty($birth->birthAmPm))@if($birth->birthAmPm == "PM") selected @endif @endif value="PM">PM</option>
             </select>
          </div>
                                      <div class="form_group_wrap">
                                        <label>Manglik <span class="red-text">*</span></label>
                                        <select name="manglik" id="country" class="selecthide">
                                      <option value="">Select</option>
                                      <option @if(!empty($birth->manglik))@if(1 == $birth->manglik) selected @endif @endif value="1" >Yes</option>
                                      <option @if(!empty($birth->manglik))@if(2 == $birth->manglik) selected @endif @endif value="2" >No</option>
                                      <option @if(!empty($birth->manglik))@if(3 == $birth->manglik) selected @endif @endif value="3" >Don't Know</option>

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
                          <label>Diet <span class="red-text">*</span></label>
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
                            <label>Highest Qualification <span class="red-text">*</span></label>
                            <select name="highestQualification" class="selecthide">
      <option value="">Select Qualification</option>
      @if($allqualification)
      @foreach($allqualification as $q)
      <option @if($education->highestQualification == $q->id) selected @endif value="{{ $q->id }}">{{ $q->name }}</option>
      @endforeach
      @endif

                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Working With <span class="red-text">*</span></label>
                            <select name="workingWith" class="selecthide">
                              <option value="" label="Select">Select</option>
         <option @if($education->workingWith == 1) selected @endif value="1">Private Company</option>
         <option @if($education->workingWith == 2) selected @endif value="2">Government / Public Sector</option>
         <option @if($education->workingWith == 3) selected @endif value="3">Defense / Civil Services</option>
         <option @if($education->workingWith == 4) selected @endif value="4">Business / Self Employed</option>
         <option @if($education->workingWith == 5) selected @endif value="5">Not Working</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Working As <span class="red-text">*</span></label>
                            <select name="workingAs" class="selecthide">
                              <option value="" label="Select">Select Working As</option>
        @if($allworkingSectors)
        @foreach($allworkingSectors as $sector)
        <option @if($education->workingAs == $sector->id) selected @endif value="{{ $sector->id }}">{{ $sector->name }}</option>
        @endforeach
        @endif

                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Employer Name <span class="red-text">*</span></label>
                            <input name="employerName" value="{{ $education->employerName }}" class="selecthide" type="text" placeholder="Please enter employer Name">
                          </div>
                          <div class="form_group_wrap">
                            <label>Annual Income <span class="red-text">*</span></label>
                            <select name="income" class="selecthide">
                        <option value="">Select income</option>
                        <option @if($education->income == 1) selected @endif value="1">Upto INR 1 Lakh</option>
                        <option @if($education->income == 2) selected @endif value="2">INR 1 Lakh to 2 Lakh</option>
                        <option @if($education->income == 3) selected @endif value="3">INR 2 Lakh to 4 Lakh</option>
                        <option @if($education->income == 4) selected @endif value="4">INR 4 Lakh to 7 Lakh</option>
                        <option @if($education->income == 5) selected @endif value="5">INR 7 Lakh to 10 Lakh</option>
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
                <div class="card-header" id="faqhead212">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq232"
                    aria-expanded="true" aria-controls="faq2">Location Of Groom</a>
                </div>

                <div id="faq232" class="collapse show" aria-labelledby="faqhead212" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Country Living in <span class="red-text">*</span></label>
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
                            <label>State <span class="red-text">*</span></label>
                            <select name="state" id="states" class="selecthide">
                            <option value="">Select State</option>
                            @if(count($states) > 0)
                            @foreach($states as $s)
                            <option @if(!empty($location->state))@if($s->id == $location->state) selected @endif @endif value="{{ $s->id }}" >{{ $s->name }}</option>
                            @endforeach
                            @endif


                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>City <span class="red-text">*</span></label>
                            <select id="cities" name="city" class="selecthide">
                        <option value="">Select City <span class="red-text">*</span></option>
                        @if(count($city) > 0)
                        @foreach($city as $ci)
                        <option @if(!empty($location->city))@if($ci->id == $location->city) selected @endif @endif value="{{ $ci->id }}" >{{ $ci->name }}</option>
                        @endforeach
                        @endif

                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Grew up in <span class="red-text">*</span></label>
                            <select name="grewUp" id="grew" class="selecthide">
                        <option value="">Select Country</option>
                        @if(count($allcountry) > 0)
                        @foreach($allcountry as $c)
                        <option @if(!empty($location->grewUp))@if($c->id == $location->grewUp) selected @endif @endif value="{{ $c->id }}" >{{ $c->name }}</option>
                        @endforeach
                        @endif
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Postal Zip Code <span class="red-text">*</span></label>
                            <input name="pincode" value="@if(!empty($location)){{ $location->pincode }}@endif" placeholder="Please enter pincode" class="selecthide" type="text" >
                          </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="faqhead2">
                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq23421"
                    aria-expanded="true" aria-controls="faq23421">Religious Background</a>
                </div>

                <div id="faq23421" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Religion <span class="red-text">*</span></label>
                            <select name="religion" class="selecthide">
                        <option  value="">Select religion</option>
                        @if($allreligion)
                        @foreach($allreligion as $rel)
                        <option @if($religion->religion == $rel->id) selected @endif value="{{ $rel->id }}" >{{ ucwords($rel->name) }}</option>
                        @endforeach
                        @endif
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Mother Tongue <span class="red-text">*</span></label>
                            <select name="motherTongue" class="selecthide">
                        <option value="">Select Mother Tongue</option>
                        @if(!empty($allmothertongue))
                        @foreach($allmothertongue as $mo)
                        <option @if($religion->motherTongue == $mo->id) selected @endif value="{{ $mo->id }}">{{ ucwords($mo->name) }}</option>
                        @endforeach
                        @endif

                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Community <span class="red-text">*</span></label>
                            <select name="community" class="selecthide">
                        <option value="">Select Coummunity</option>
                        @if(!empty($allcommunity))
                        @foreach($allcommunity as $comunity)
                        <option @if($religion->community == $comunity->id) selected @endif value="{{ $comunity->id }}">{{ $comunity->name }}</option>
                        @endforeach
                        @endif



                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Sub-Community</label>
                            <input name="subCommunity" value="{{ $religion->subCommunity }}" placeholder="Please enter sub community" class="selecthide" type="text" >
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
