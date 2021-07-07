@include('layouts.header')

<form action="{{URL::to('/profileUpdate')}}" method="post" id="profileUpdate">

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
                                <label>Marital status</label>
                                <select class="selecthide">
                            <option value="">Select</option>
                            <option value="1">Never Married</option>
                            <option value="2">Divorced</option>
                            <option value="3">Awaiting Divorce</option>
                        </select>
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
                              <select class="selecthide">
                          <option selected="selected">Select</option>
                          <option>Employed</option>
                          <option>Business</option>
                          <option>Retired</option>
                          <option>Not Employed</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>State living in</label>
                              <select class="selecthide">
                          <option selected="selected">Select</option>
                          <option>Employed</option>
                          <option>Business</option>
                          <option>Retired</option>
                          <option>Not Employed</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>City / District</label>
                              <select class="selecthide">
                          <option selected="selected">Select</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
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
                              <select class="selecthide">
                          <option selected="selected">Self</option>
                          <option>Parent / Guardian</option>
                          <option>Sibling</option>
                          <option>Friend</option>
                          <option>Other</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Working With</label>
                              <select class="selecthide">
                          <option selected="selected">Private Company</option>
                          <option>Government / Public Sector</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Profession area</label>
                              <select class="selecthide">
                          <option selected="selected">Accounting, Banking & Finance</option>
                          <option>Administration & HR</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Annual income</label>
                              <select class="selecthide">
                          <option selected="selected">Upto INR 1 Lakh</option>
                          <option>INR 1 Lakh to 2 Lakh</option>
                          <option>INR 2 Lakh to 4 Lakh</option>
                          <option>INR 4 Lakh to 7 Lakh</option>
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
                              <label>Profile created by</label>
                              <select class="selecthide">
                          <option selected="selected">Self</option>
                          <option>Parent / Guardian</option>
                          <option>Sibling</option>
                          <option>Friend</option>
                          <option>Other</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Diet</label>
                              <select class="selecthide">
                          <option selected="selected">Veg</option>
                          <option>Non-Veg</option>
                          <option>Occasionally Non-Veg</option>
                          <option>Eggetarian</option>
                          <option>Jain</option>
                          <option>Vegan</option>
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
                              <select class="selecthide">
                          <option selected="selected">Hindu</option>
                          <option>Muslim</option>
                          <option>Christian</option>
                          <option>Sikh</option>
                          <option>Parsi</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Mother Tongue</label>
                              <select class="selecthide">
                          <option selected="selected">Hindi</option>
                          <option>Marathi</option>
                          <option>Punjabi</option>
                          <option>Bengali</option>
                          <option>Gujarati</option>
                          <option>Urdu</option>
                      </select>
                            </div>
                            <div class="form_group_wrap">
                              <label>Manglik / Chevvai Dosham</label>
                              <select class="selecthide">
                          <option selected="selected">Select</option>
                          <option>Athreyasya / Athreyasa</option>
                          <option>Kashyapa / Kaashyapa</option>
                          <option>Kashyapa / Kaashyapa</option>
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
