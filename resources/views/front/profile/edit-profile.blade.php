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
                            <input class="show-for-sr profilechange" type="file" id="upload_imgs" name="profile" />
                          </p>
                          @if(!empty(($profileimage)))
                          <div class="imagesshow">
                          <img class="profileshow" src="{{ asset('profiles/'.$profileimage->image) }}" width="50" height="50">
                          </div>
                          @else
                          <div class="imagesshow">
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
                            <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                            <input class="show-for-sr" type="file" id="upload_imgs" name="images[]" multiple/>
                          </p>
                          @if(count($images) > 0)
                          <div class="imagesshow">
                  @foreach($images as $i)
                  <span class="docimg{{ $i->id }}"><img class="doctype1 docimg{{ $i->id }}" src="{{ asset('profiles/'.$i->image) }}" width="50" height="50">
                  <a data-typee="1" data-type="1" class="removedocument removedocument{{ $i->id }}" data-id="{{ $i->id }}"><i  class="fa fa-times" aria-hidden="true"></i></a></span>
                  @endforeach
                </div>
                @else
                <div class="rcshow">
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
                            <input value="@if($detail->dateOfBirth){{ $d = date("d-m-Y", strtotime($detail->dateOfBirth)) }}@endif" placeholder="Please select date of birth" class="selecthide" type="text" name="dateOfBirth">
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


                        <div class="card">
                            <div class="card-header" id="faqhead5">
                                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq51"
                                aria-expanded="true" aria-controls="faq5">Birth & Horoscope details</a>
                            </div>

                            <div id="faq51" class="collapse show" aria-labelledby="faqhead5" data-parent="#faq">
                                <div class="card-body">

                                    <div class="col-md-12">
                                      <div class="form_group_wrap">
                                        <label>Country of Birth</label>
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
                                        <label>City of Birth</label>
                                        <input name="birthCity" value="@if(!empty($birth->birthCity)) {{ $birth->birthCity }}@endif" placeholder="Please enter city of birth" class="selecthide" type="text" >
                                      </div>
                                      <div class="form_group_wrap">
             <label>Time of Birth</label>
             <select name="birthHours" class="selecthide time_edit">
               <option value="">Select</option>

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
               <option value="">Select</option>
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
                                        <label>Manglik</label>
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
      <option value="">Select</option>
      <option @if($education->highestQualification == 1) selected @endif value="1">B.E / B.Tech</option>
      <option @if($education->highestQualification == 2) selected @endif value="2">M.E / M.Tech</option>
      <option @if($education->highestQualification == 3) selected @endif value="3">M.S Engineering</option>
      <option @if($education->highestQualification == 4) selected @endif value="4">B.Eng (Hons)</option>
      <option @if($education->highestQualification == 5) selected @endif value="5">M.Eng (Hons)</option>
      <option @if($education->highestQualification == 6) selected @endif value="6">Engineering Diploma</option>
      <option @if($education->highestQualification == 7) selected @endif value="7">AE</option>
      <option @if($education->highestQualification == 8) selected @endif value="8">AET</option>
      <optgroup id="educationlevel-optgroup--ARTS / DESIGN-" label="-ARTS / DESIGN-">
      </optgroup>
      <option @if($education->highestQualification == 9) selected @endif value="9">B.A</option>
      <option @if($education->highestQualification == 10) selected @endif value="10">B.Ed</option>
      <option @if($education->highestQualification == 11) selected @endif value="11">BJMC</option>
      <option @if($education->highestQualification == 12) selected @endif value="12">BFA</option>
      <option @if($education->highestQualification == 13) selected @endif value="13">B.Arch</option>
      <option @if($education->highestQualification == 14) selected @endif value="14">B.Des</option>
      <option @if($education->highestQualification == 15) selected @endif value="15">BMM</option>
      <option @if($education->highestQualification == 16) selected @endif value="16">MFA</option>
      <option @if($education->highestQualification == 17) selected @endif value="17">M.Ed</option>
      <option @if($education->highestQualification == 18) selected @endif value="18">M.A</option>
      <option @if($education->highestQualification == 19) selected @endif value="19">MSW</option>
      <option @if($education->highestQualification == 20) selected @endif value="20">MJMC</option>
      <option @if($education->highestQualification == 21) selected @endif value="21">M.Arch</option>
      <option @if($education->highestQualification == 22) selected @endif value="22">M.Des</option>
      <option @if($education->highestQualification == 23) selected @endif value="23">BA (Hons)</option>
      <option @if($education->highestQualification == 24) selected @endif value="24">B.Arch (Hons)</option>
      <option @if($education->highestQualification == 25) selected @endif value="25">DFA</option>
      <option @if($education->highestQualification == 26) selected @endif value="26">D.Ed</option>
      <option @if($education->highestQualification == 27) selected @endif value="27">D.Arch</option>
      <option @if($education->highestQualification == 28) selected @endif value="28">AA</option>
      <option @if($education->highestQualification == 29) selected @endif value="29">AFA</option>
      <optgroup id="educationlevel-optgroup--FINANCE / COMMERCE-" label="-FINANCE / COMMERCE-">
      </optgroup>
      <option @if($education->highestQualification == 30) selected @endif value="30">B.Com</option>
      <option @if($education->highestQualification == 31) selected @endif value="31">CA / CPA</option>
      <option @if($education->highestQualification == 32) selected @endif value="32">CFA</option>
      <option @if($education->highestQualification == 33) selected @endif value="33">CS</option>
      <option @if($education->highestQualification == 34) selected @endif value="34">BSc / BFin</option>
      <option @if($education->highestQualification == 35) selected @endif value="35">M.Com</option>
      <option @if($education->highestQualification == 36) selected @endif value="36" label="MSc / MFin / MS">MSc / MFin / MS</option>
      <option @if($education->highestQualification == 37) selected @endif value="37">BCom (Hons)</option>
      <option @if($education->highestQualification == 38) selected @endif value="38">PGD Finance</option>
      <optgroup id="educationlevel-optgroup--COMPUTERS / IT-" label="-COMPUTERS / IT-">
      </optgroup>
      <option @if($education->highestQualification == 39) selected @endif value="39">BCA</option>
      <option @if($education->highestQualification == 40) selected @endif value="40">B.IT</option>
      <option @if($education->highestQualification == 41) selected @endif value="41">BCS</option>
      <option @if($education->highestQualification == 42) selected @endif value="42">BA Computer Science</option>
      <option @if($education->highestQualification == 43) selected @endif value="43">MCA</option>
      <option @if($education->highestQualification == 44) selected @endif value="44">PGDCA</option>
      <option @if($education->highestQualification == 45) selected @endif value="45">IT Diploma</option>
      <option @if($education->highestQualification == 46) selected @endif value="46" label="ADIT">ADIT</option>
      <optgroup id="educationlevel-optgroup--SCIENCE-" label="-SCIENCE-">
      </optgroup>
      <option @if($education->highestQualification == 47) selected @endif value="47" label="B.Sc">B.Sc</option>
      <option @if($education->highestQualification == 48) selected @endif value="48" label="M.Sc">M.Sc</option>
      <option @if($education->highestQualification == 49) selected @endif value="49" label="BSc (Hons)">BSc (Hons)</option>
      <option @if($education->highestQualification == 50) selected @endif value="50" label="DipSc">DipSc</option>
      <option @if($education->highestQualification == 51) selected @endif value="51" label="AS">AS</option>
      <option @if($education->highestQualification == 52) selected @endif value="52" label="AAS">AAS</option>
      <optgroup id="educationlevel-optgroup--MEDICINE-" label="-MEDICINE-">
      </optgroup>
      <option @if($education->highestQualification == 53) selected @endif value="53" label="MBBS">MBBS</option>
      <option @if($education->highestQualification == 54) selected @endif value="54" label="BDS">BDS</option>
      <option @if($education->highestQualification == 55) selected @endif value="55" label="BPT">BPT</option>
      <option @if($education->highestQualification == 56) selected @endif value="56" label="BAMS">BAMS</option>
      <option @if($education->highestQualification == 57) selected @endif value="57" label="BHMS">BHMS</option>
      <option @if($education->highestQualification == 58) selected @endif value="58" label="B.Pharma">B.Pharma</option>
      <option @if($education->highestQualification == 59) selected @endif value="59" label="BVSc">BVSc</option>
      <option @if($education->highestQualification == 60) selected @endif value="60" label="BSN / BScN">BSN / BScN</option>
      <option @if($education->highestQualification == 61) selected @endif value="61" label="MDS">MDS</option>
      <option @if($education->highestQualification == 62) selected @endif value="62" label="MCh">MCh</option>
      <option @if($education->highestQualification == 63) selected @endif value="63" label="M.D">M.D</option>
      <option @if($education->highestQualification == 64) selected @endif value="64" label="M.S Medicine">M.S Medicine</option>
      <option @if($education->highestQualification == 65) selected @endif value="65" label="MPT">MPT</option>
      <option @if($education->highestQualification == 66) selected @endif value="66" label="DM">DM</option>
      <option @if($education->highestQualification == 67) selected @endif value="67" label="M.Pharma">M.Pharma</option>
      <option @if($education->highestQualification == 68) selected @endif value="68" label="MVSc">MVSc</option>
      <option @if($education->highestQualification == 69) selected @endif value="69" label="MMed">MMed</option>
      <option @if($education->highestQualification == 70) selected @endif value="70" label="PGD Medicine">PGD Medicine</option>
      <option @if($education->highestQualification == 71) selected @endif value="71" label="ADN">ADN</option>
      <optgroup id="educationlevel-optgroup--MANAGEMENT-" label="-MANAGEMENT-">
      </optgroup>
      <option @if($education->highestQualification == 72) selected @endif value="72" label="BBA">BBA</option>
      <option @if($education->highestQualification == 73) selected @endif value="73" label="BHM">BHM</option>
      <option @if($education->highestQualification == 74) selected @endif value="74" label="BBM">BBM</option>
      <option @if($education->highestQualification == 75) selected @endif value="75" label="MBA">MBA</option>
      <option @if($education->highestQualification == 76) selected @endif value="76" label="PGDM">PGDM</option>
      <option @if($education->highestQualification == 77) selected @endif value="77" label="ABA">ABA</option>
      <option @if($education->highestQualification == 78) selected @endif value="78" label="ADBus">ADBus</option>
      <optgroup id="educationlevel-optgroup--LAW-" label="-LAW-">
      </optgroup>
      <option @if($education->highestQualification == 79) selected @endif value="79" label="BL / LLB">BL / LLB</option>
      <option @if($education->highestQualification == 80) selected @endif value="80" label="ML / LLM">ML / LLM</option>
      <option @if($education->highestQualification == 81) selected @endif value="81" label="LLB (Hons)">LLB (Hons)</option>
      <option @if($education->highestQualification == 82) selected @endif value="82" label="ALA">ALA</option>
      <optgroup id="educationlevel-optgroup--DOCTORATE-" label="-DOCTORATE-">
      </optgroup>
      <option @if($education->highestQualification == 83) selected @endif value="83" label="Ph.D">Ph.D</option>
      <option @if($education->highestQualification == 84) selected @endif value="84" label="M.Phil">M.Phil</option>
      <optgroup id="educationlevel-optgroup--OTHERS-" label="-OTHERS-">
      </optgroup>
      <option @if($education->highestQualification == 85) selected @endif value="85" label="Bachelor">Bachelor</option>
      <option @if($education->highestQualification == 86) selected @endif value="86" label="Master" >Master</option>
      <option @if($education->highestQualification == 87) selected @endif value="87" label="Diploma">Diploma</option>
      <option @if($education->highestQualification == 88) selected @endif value="88" label="Honours">Honours</option>
      <option @if($education->highestQualification == 89) selected @endif value="89" label="Doctorate">Doctorate</option>
      <option @if($education->highestQualification == 90) selected @endif value="90" label="Associate">Associate</option>
      <optgroup id="educationlevel-optgroup--NON-GRADUATE-" label="-NON-GRADUATE-">
      </optgroup>
      <option @if($education->highestQualification == 91) selected @endif value="91" label="High school">High school</option>
      <option @if($education->highestQualification == 92) selected @endif value="92" label="Less than high school">Less than high school</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Working With</label>
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
                            <label>Working As</label>
                            <select name="workingAs" class="selecthide">
                              <option value="" label="Select">Select</option>
        <optgroup id="occupation-optgroup-Accounting, Banking &amp; Finance" label="Accounting, Banking &amp; Finance">
        </optgroup>
        <option @if($education->workingAs == 1) selected @endif value="1">Banking Professional</option>
        <option @if($education->workingAs == 2) selected @endif value="2">Chartered Accountant</option>
        <option @if($education->workingAs == 3) selected @endif value="3">Company Secretary</option>
        <option @if($education->workingAs == 4) selected @endif value="4">Finance Professional</option>
        <option @if($education->workingAs == 5) selected @endif value="5">Investment Professional</option>
        <option @if($education->workingAs == 6) selected @endif value="6">Accounting Professional (Others)</option>
        <optgroup id="occupation-optgroup-Administration &amp; HR" label="Administration &amp; HR">
        </optgroup>
        <option @if($education->workingAs == 7) selected @endif value="7">Admin Professional</option>
        <option @if($education->workingAs == 8) selected @endif value="8">Human Resources Professional</option>
        <optgroup id="occupation-optgroup-Advertising, Media &amp; Entertainment" label="Advertising, Media &amp; Entertainment">
        </optgroup>
        <option @if($education->workingAs == 9) selected @endif value="9">Actor</option>
        <option @if($education->workingAs == 10) selected @endif value="10">Advertising Professional</option>
        <option @if($education->workingAs == 11) selected @endif value="11">Entertainment Professional</option>
        <option @if($education->workingAs == 12) selected @endif value="12">Event Manager</option>
        <option @if($education->workingAs == 13) selected @endif value="13">Journalist</option>
        <option @if($education->workingAs == 14) selected @endif value="14">Media Professional</option>
        <option @if($education->workingAs == 15) selected @endif value="15">Public Relations Professional</option>
        <optgroup id="occupation-optgroup-Agriculture" label="Agriculture">
        </optgroup>
        <option @if($education->workingAs == 16) selected @endif value="16">Farming</option>
        <option @if($education->workingAs == 17) selected @endif value="17">Horticulturist</option>
        <option @if($education->workingAs == 18) selected @endif value="18">Agricultural Professional (Others)</option>
        <optgroup id="occupation-optgroup-Airline &amp; Aviation" label="Airline &amp; Aviation">
        </optgroup>
        <option @if($education->workingAs == 19) selected @endif value="19">Air Hostess / Flight Attendant</option>
        <option @if($education->workingAs == 20) selected @endif value="20">Pilot / Co-Pilot</option>
        <option @if($education->workingAs == 21) selected @endif value="21">Other Airline Professional</option>
        <optgroup id="occupation-optgroup-Architecture &amp; Design" label="Architecture &amp; Design">
        </optgroup>
        <option @if($education->workingAs == 22) selected @endif value="22">Architect</option>
        <option @if($education->workingAs == 23) selected @endif value="23">Interior Designer</option>
        <option @if($education->workingAs == 24) selected @endif value="24">Landscape Architect</option>
        <optgroup id="occupation-optgroup-Artists, Animators &amp; Web Designers" label="Artists, Animators &amp; Web Designers">
        </optgroup>
        <option @if($education->workingAs == 25) selected @endif value="25">Animator</option>
        <option @if($education->workingAs == 26) selected @endif value="26">Commercial Artist</option>
        <option @if($education->workingAs == 27) selected @endif value="27">Web / UX Designers</option>
        <option @if($education->workingAs == 28) selected @endif value="28">Artist (Others)</option>
        <optgroup id="occupation-optgroup-Beauty, Fashion &amp; Jewellery Designers" label="Beauty, Fashion &amp; Jewellery Designers">
        </optgroup>
        <option @if($education->workingAs == 29) selected @endif value="29">Beautician</option>
        <option @if($education->workingAs == 30) selected @endif value="30">Fashion Designer</option>
        <option @if($education->workingAs == 31) selected @endif value="31">Hairstylist</option>
        <option @if($education->workingAs == 32) selected @endif value="32">Jewellery Designer</option>
        <option @if($education->workingAs == 33) selected @endif value="33">Designer (Others)</option>
        <optgroup id="occupation-optgroup-BPO, KPO, &amp; Customer Support" label="BPO, KPO, &amp; Customer Support">
        </optgroup>
        <option @if($education->workingAs == 34) selected @endif value="34">Customer Support / BPO / KPO Professional</option>
        <optgroup id="occupation-optgroup-Civil Services / Law Enforcement" label="Civil Services / Law Enforcement">
        </optgroup>
        <option @if($education->workingAs == 35) selected @endif value="35">IAS / IRS / IES / IFS</option>
        <option @if($education->workingAs == 36) selected @endif value="36">Indian Police Services (IPS)</option>
        <option @if($education->workingAs == 37) selected @endif value="37">Law Enforcement Employee (Others)</option>
        <optgroup id="occupation-optgroup-Defense" label="Defense">
        </optgroup>
        <option @if($education->workingAs == 38) selected @endif value="38">Airforce</option>
        <option @if($education->workingAs == 39) selected @endif value="39">Army</option>
        <option @if($education->workingAs == 40) selected @endif value="40">Navy</option>
        <option @if($education->workingAs == 41) selected @endif value="41">Defense Services (Others)</option>
        <optgroup id="occupation-optgroup-Education &amp; Training" label="Education &amp; Training">
        </optgroup>
        <option @if($education->workingAs == 42) selected @endif value="42">Lecturer</option>
        <option @if($education->workingAs == 43) selected @endif value="43">Professor</option>
        <option @if($education->workingAs == 44) selected @endif value="44">Research Assistant</option>
        <option @if($education->workingAs == 45) selected @endif value="45">Research Scholar</option>
        <option @if($education->workingAs == 46) selected @endif value="46">Teacher</option>
        <option @if($education->workingAs == 47) selected @endif value="47">Training Professional (Others)</option>
        <optgroup id="occupation-optgroup-Engineering" label="Engineering">
        </optgroup>
        <option @if($education->workingAs == 48) selected @endif value="48">Civil Engineer</option>
        <option @if($education->workingAs == 49) selected @endif value="49">Electronics / Telecom Engineer</option>
        <option @if($education->workingAs == 50) selected @endif value="50">Mechanical / Production Engineer</option>
        <option @if($education->workingAs == 51) selected @endif value="51">Non IT Engineer (Others)</option>
        <optgroup id="occupation-optgroup-Hotel &amp; Hospitality" label="Hotel &amp; Hospitality">
        </optgroup>
        <option @if($education->workingAs == 52) selected @endif value="52">Chef / Sommelier / Food Critic</option>
        <option @if($education->workingAs == 53) selected @endif value="53">Catering Professional</option>
        <option @if($education->workingAs == 54) selected @endif value="54">Hotel &amp; Hospitality Professional (Others)</option>
        <optgroup id="occupation-optgroup-IT &amp; Software Engineering" label="IT &amp; Software Engineering">
        </optgroup>
        <option @if($education->workingAs == 55) selected @endif value="55">Software Developer / Programmer</option>
        <option @if($education->workingAs == 56) selected @endif value="56">Software Consultant</option>
        <option @if($education->workingAs == 57) selected @endif value="57">Hardware &amp; Networking professional</option>
        <option @if($education->workingAs == 58) selected @endif value="58">Software Professional (Others)</option>
        <optgroup id="occupation-optgroup-Legal" label="Legal">
        </optgroup>
        <option @if($education->workingAs == 59) selected @endif value="59">Lawyer</option>
        <option @if($education->workingAs == 60) selected @endif value="60">Legal Assistant</option>
        <option @if($education->workingAs == 61) selected @endif value="61">Legal Professional (Others)</option>
        <optgroup id="occupation-optgroup-Medical &amp; Healthcare" label="Medical &amp; Healthcare">
        </optgroup>
        <option @if($education->workingAs == 62) selected @endif value="62">Dentist</option>
        <option @if($education->workingAs == 63) selected @endif value="63">Doctor</option>
        <option @if($education->workingAs == 64) selected @endif value="64">Medical Transcriptionist</option>
        <option @if($education->workingAs == 65) selected @endif value="65">Nurse</option>
        <option @if($education->workingAs == 66) selected @endif value="66">Pharmacist</option>
        <option @if($education->workingAs == 67) selected @endif value="67">Physician Assistant</option>
        <option label="Physiotherapist / Occupational Therapist">Physiotherapist / Occupational Therapist</option>
        <option @if($education->workingAs == 68) selected @endif value="68">Psychologist</option>
        <option @if($education->workingAs == 69) selected @endif value="69">Surgeon</option>
        <option @if($education->workingAs == 70) selected @endif value="70">Veterinary Doctor</option>
        <option @if($education->workingAs == 71) selected @endif value="71">Therapist (Others)</option>
        <option @if($education->workingAs == 72) selected @endif value="72">Medical / Healthcare Professional (Others)</option>
        <optgroup id="occupation-optgroup-Merchant Navy" label="Merchant Navy">
        </optgroup>
        <option @if($education->workingAs == 73) selected @endif value="73">Merchant Naval Officer</option>
        <option @if($education->workingAs == 74) selected @endif value="74">Mariner</option>
        <optgroup id="occupation-optgroup-Sales &amp; Marketing" label="Sales &amp; Marketing">
        </optgroup>
        <option @if($education->workingAs == 75) selected @endif value="75">Marketing Professional</option>
        <option @if($education->workingAs == 76) selected @endif value="76">Sales Professional</option>
        <optgroup id="occupation-optgroup-Science" label="Science">
        </optgroup>
        <option @if($education->workingAs == 77) selected @endif value="77">Biologist / Botanist</option>
        <option @if($education->workingAs == 78) selected @endif value="78">Physicist</option>
        <option @if($education->workingAs == 79) selected @endif value="79">Science Professional (Others)</option>
        <optgroup id="occupation-optgroup-Corporate Professionals" label="Corporate Professionals">
        </optgroup>
        <option @if($education->workingAs == 80) selected @endif value="80">CxO / Chairman / Director / President</option>
        <option @if($education->workingAs == 81) selected @endif value="81">VP / AVP / GM / DGM</option>
        <option @if($education->workingAs == 82) selected @endif value="82">Sr. Manager / Manager</option>
        <option @if($education->workingAs == 83) selected @endif value="83">Consultant / Supervisor / Team Leads</option>
        <option @if($education->workingAs == 84) selected @endif value="84">Team Member / Staff</option>
        <optgroup id="occupation-optgroup-Others" label="Others">
        </optgroup>
        <option @if($education->workingAs == 85) selected @endif value="85">Agent / Broker / Trader / Contractor</option>
        <option @if($education->workingAs == 86) selected @endif value="86">Business Owner / Entrepreneur</option>
        <option @if($education->workingAs == 87) selected @endif value="87">Politician</option>
        <option @if($education->workingAs == 88) selected @endif value="88">Social Worker / Volunteer / NGO</option>
        <option @if($education->workingAs == 89) selected @endif value="89">Sportsman</option>
        <option @if($education->workingAs == 90) selected @endif value="90">Travel &amp; Transport Professional</option>
        <option @if($education->workingAs == 91) selected @endif value="91">Writer</option>
        <optgroup id="occupation-optgroup-Non Working" label="Non Working">
        </optgroup>
        <option @if($education->workingAs == 92) selected @endif value="92">Student</option>
        <option @if($education->workingAs == 93) selected @endif value="93">Retired</option>
        <option @if($education->workingAs == 94) selected @endif value="94">Not working</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Employer Name</label>
                            <input name="employerName" value="{{ $education->employerName }}" class="selecthide" type="text" placeholder="Please enter employer Name">
                          </div>
                          <div class="form_group_wrap">
                            <label>Annual Income</label>
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
                            <label>Country Living in</label>
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
                            <label>State</label>
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
                            <label>City</label>
                            <select id="cities" name="city" class="selecthide">
                        <option value="">Select City</option>
                        @if(count($city) > 0)
                        @foreach($city as $ci)
                        <option @if(!empty($location->city))@if($ci->id == $location->city) selected @endif @endif value="{{ $ci->id }}" >{{ $ci->name }}</option>
                        @endforeach
                        @endif

                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Grew up in</label>
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
                            <label>Pincode</label>
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
                            <label>Religion</label>
                            <select name="religion" class="selecthide">
                        <option  value="">Select religion</option>
                        <option @if($religion->religion == 1) selected @endif value="1" >Hindu</option>
                        <option @if($religion->religion == 2) selected @endif value="2">Muslim</option>
                        <option @if($religion->religion == 3) selected @endif value="3">Christian</option>
                        <option @if($religion->religion == 4) selected @endif value="4">Sikh</option>
                        <option @if($religion->religion == 5) selected @endif value="5">Parsi</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Mother Tongue</label>
                            <select name="motherTongue" class="selecthide">
                        <option value="">Select Mother Tongue</option>
                        <option @if($religion->motherTongue == 1) selected @endif value="1">Hindi</option>
                        <option @if($religion->motherTongue == 2) selected @endif value="2">Marathi</option>
                        <option @if($religion->motherTongue == 3) selected @endif value="3">Punjabi</option>
                        <option @if($religion->motherTongue == 4) selected @endif value="4">Bengali</option>
                        <option @if($religion->motherTongue == 5) selected @endif value="5">Gujarati</option>
                        <option @if($religion->motherTongue == 6) selected @endif value="6">Urdu</option>
                    </select>
                          </div>
                          <div class="form_group_wrap">
                            <label>Community</label>
                            <select name="community" class="selecthide">
                        <option value="">Select</option>
                        <option @if($religion->community == 1) selected @endif value="1">Ahluwalia</option>
                        <option @if($religion->community == 2) selected @endif value="2">Arora</option>
                        <option @if($religion->community == 3) selected @endif value="3">Clean Shaven</option>
                        <option @if($religion->community == 4) selected @endif value="4">Gursikh</option>
                        <option @if($religion->community == 5) selected @endif value="5">Jatt</option>
                        <option @if($religion->community == 6) selected @endif value="6">Kamboj</option>
                        <option @if($religion->community == 7) selected @endif value="7">Kesadhari</option>
                        <option @if($religion->community == 8) selected @endif value="8">Khatri</option>
                        <option @if($religion->community == 9) selected @endif value="9">Kshatriya</option>
                        <option @if($religion->community == 10) selected @endif value="10">Labana</option>
                        <option @if($religion->community == 11) selected @endif value="11">Mazhbi/Majabi</option>
                        <option @if($religion->community == 12) selected @endif value="12">Rajput</option>
                        <option @if($religion->community == 13) selected @endif value="13">Ramdasia</option>
                        <option @if($religion->community == 14) selected @endif value="14">Ramgharia</option>
                        <option @if($religion->community == 15) selected @endif value="15">Ravidasia</option>
                        <option @if($religion->community == 16) selected @endif value="16">Saini</option></select>


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
