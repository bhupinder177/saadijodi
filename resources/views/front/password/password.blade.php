@include('layouts.header')

<section class="page-wrapper_login">
			<div class="overlay"></div>
	        <div class="container">
	            <div class="login_register">
              <form action="{{URL::to('/changePasswordSubmit')}}" method="post" id="changePasswordform">

	            	<div class="row">
	            		<div class="col-md-12">
	            			<h3>Change Password</h3>
	            		</div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Current Password <span class="red-text">*</span></label>
                                <input class="input--style-4" type="password"  placeholder="Please enter current password" id="currentpassword" name="currentpassword">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">New Password <span class="red-text">*</span></label>
                                <input class="input--style-4" type="password"  placeholder="Please enter password" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Confirm Password <span class="red-text">*</span></label>
                                <input class="input--style-4" type="password" id="password_confirmation" placeholder="Please enter confirm password"  name="password_confirmation">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    	<div class="col-md-5">
                        	<div class="logn_reigstr_btn">
                        		<button type="submit">Submit</button>
                        	</div>
                        </div>

                	</div>
                </form>

	            </div>
	        </div>
	    </section>
      @include('layouts.footer')
