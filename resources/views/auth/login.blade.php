@include('layouts.header')

<section class="page-wrapper_login">
			<div class="overlay"></div>
	        <div class="container">
	            <div class="login_register">
              <form action="{{URL::to('/userlogin')}}" method="post" id="loginform">

								@if(Session::has('message'))
								<p class="alert alert-success">{{ Session::get('message') }}</p>
								@endif
								@if(Session::has('failed'))
								<p class="alert alert-danger">{{ Session::get('failed') }}</p>
								@endif
	            	<div class="row">
	            		<div class="col-md-12">
	            			<h3>Login</h3>
	            		</div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Email <span class="red-text">*</span></label>
                                <input class="input--style-4" id="email" placeholder="Please enter email" type="text" name="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Password <span class="red-text">*</span></label>
                                <input class="input--style-4" id="password" placeholder="Please enter password" type="password" name="password">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    	<div class="col-md-5">
                        	<div class="logn_reigstr_btn">
                        		<button type="submit">Login</button>
                        	</div>
                        </div>
                        <div class="col-md-7">
                        	<div class="check_Box_cstm">
                        		<a class="container_box" href="{{URL::to('/forgot-password')}}">Forgot Password?</a>
                        	</div>
                        </div>
                	</div>
                  </form>

	            </div>
	        </div>
	    </section>
      @include('layouts.footer')
