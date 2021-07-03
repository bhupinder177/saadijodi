@include('layouts.header')

<section class="page-wrapper_login">
			<div class="overlay"></div>
	        <div class="container">
	            <div class="login_register">
              <form action="{{URL::to('/userRegister')}}" method="post" id="registerform">

	            	<div class="row">
	            		<div class="col-md-12">
	            			<h3>Register</h3>
	            		</div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">first name</label>
                                <input class="input--style-4" placeholder="Please enter first name" id="firstName"  type="text" name="firstName">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">last name</label>
                                <input class="input--style-4" id="lastName" placeholder="Please enter last name" type="text" name="lastName">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="text" id="email" placeholder="Please enter email" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" id="phone" placeholder="Please enter phone" type="text" name="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="password"  placeholder="Please enter password" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Confirm Password</label>
                                <input class="input--style-4" type="password" id="password_confirmation" placeholder="Please enter confirm password"  name="password_confirmation">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    	<div class="col-md-5">
                        	<div class="logn_reigstr_btn">
                        		<button type="submit">Register</button>
                        	</div>
                        </div>

                	</div>
                </form>

	            </div>
	        </div>
	    </section>
      @include('layouts.footer')
