@include('layouts.header')

<section class="page-wrapper_login">
			<div class="overlay"></div>
	        <div class="container">
	            <div class="login_register">
              <form action="{{URL::to('/forgotPassword')}}" method="post" id="forgotpasswordform">

								@if(Session::has('message'))
								<p class="alert alert-success">{{ Session::get('message') }}</p>
								@endif
								@if(Session::has('failed'))
								<p class="alert alert-danger">{{ Session::get('failed') }}</p>
								@endif
	            	<div class="row">
	            		<div class="col-md-12">
	            			<h3>Forgot Password</h3>
	            		</div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" id="email" placeholder="Please enter email" type="text" name="email">
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
