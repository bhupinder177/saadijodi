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
                                <label >Age <span class="red-text">*</span></label>
                                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                <input type="hidden" class="ageMin" name="ageMin" value="23">
                                <input type="hidden" class="ageMax" name="ageMax" value="30">

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


                              <div class="form_group_wrap">
                                <label>Marital status <span class="red-text">*</span></label>
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
                              <label>Country living in <span class="red-text">*</span></label>
                              <select name="country" id="country" class="selecthide">
                          <option value="">Select Country</option>
                          @if(count($allcountry) > 0)
                          @foreach($allcountry as $c)
                          <option @if(!empty($detail->country))@if($c->id == $detail->country) selected @endif @endif value="{{ $c->id }}" >{{ $c->name }}</option>
                          @endforeach
                          @endif
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>State living in <span class="red-text">*</span></label>
                              <select name="state" id="states" class="selecthide">
                              <option value="">Select State</option>
                              @if(count($states) > 0)
                              @foreach($states as $s)
                              <option @if(!empty($detail->state))@if($s->id == $detail->state) selected @endif @endif value="{{ $s->id }}" >{{ $s->name }}</option>
                              @endforeach
                              @endif


                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>City / District <span class="red-text">*</span></label>
                              <select id="cities" name="city" class="selecthide">
                          <option value="">Select City</option>
                          @if(count($city) > 0)
                          @foreach($city as $co)
                          <option @if(!empty($detail->city))@if($co->id == $detail->city) selected @endif @endif value="{{ $co->id }}" >{{ $co->name }}</option>
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
                              <label>Qualification <span class="red-text">*</span></label>
                              <select name="highestQualification" class="selecthide">
                                <option value="">Select Qualification</option>
                                @if($allqualification)
                                @foreach($allqualification as $q)
                                <option @if(!empty($detail->highestQualification)) @if($detail->highestQualification == $q->id) selected @endif @endif value="{{ $q->id }}">{{ $q->name }}</option>
                                @endforeach
                                @endif

                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Working With <span class="red-text">*</span></label>
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
                              <label>Annual income <span class="red-text">*</span></label>
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
                              <label>Diet <span class="red-text">*</span></label>
                              <select name="diet" class="selecthide">
                                <option value="" >Select diet</option>
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
                  </div>
              </div>




              <div class="card">
                  <div class="card-header" id="faqhead2">
                      <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2341"
                      aria-expanded="true" aria-controls="faq2341">Religious Background</a>
                  </div>

                  <div id="faq2341" class="collapse show" aria-labelledby="faqhead2" data-parent="#faq2341">
                      <div class="card-body">

                          <div class="col-md-12">
                            <div class="form_group_wrap">
                              <label>Religion <span class="red-text">*</span></label>
                              <select name="religion" class="selecthide">
                                <option  value="">Select religion</option>
                                @if($allreligion)
                                @foreach($allreligion as $rel)
                                <option @if(!empty($detail->religion)) @if($detail->religion == $rel->id) selected @endif @endif value="{{ $rel->id }}" >{{ ucwords($rel->name) }}</option>
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
                                <option @if(!empty($detail->community)) @if($detail->community == $comunity->id) selected @endif @endif value="{{ $comunity->id }}">{{ $comunity->name }}</option>
                                @endforeach
                                @endif
                        </select>

                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Mother Tongue <span class="red-text">*</span></label>
                              <select name="motherTongue" class="selecthide">
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
