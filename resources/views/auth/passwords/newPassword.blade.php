@include('layouts.header')

<section class="page-wrapper_login">
			<div class="overlay"></div>
	        <div class="container">
	            <div class="login_register">
              <form action="{{URL::to('/newPasswordUpdate')}}" method="post" id="newpasswordform">

								@if(Session::has('message'))
								<p class="alert alert-success">{{ Session::get('message') }}</p>
								@endif
								@if(Session::has('failed'))
								<p class="alert alert-danger">{{ Session::get('failed') }}</p>
								@endif
	            	<div class="row">
	            		<div class="col-md-12">
	            			<h3>New Password</h3>
	            		</div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">New Password</label>
                                <input class="input--style-4" id="password" placeholder="Please enter new password" type="password" name="password">
                                <input class="input--style-4" id="email"  type="hidden" name="email" value="{{ $email}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Confirm Password</label>
                                <input class="input--style-4" id="password_confirmation" placeholder="Please enter new password" type="password" name="password_confirmation">
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
