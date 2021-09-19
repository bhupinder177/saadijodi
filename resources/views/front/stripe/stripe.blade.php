<!DOCTYPE html>
<html>
<head>
	<title>Saadi</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="{{ asset('front/css/jquery.toast.css') }}">
		<link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

				/* new added css */
				.panel.panel-default.credit-card-box {
	background: #fff;
	padding: 0 0;
	margin-top: 60px;
	border-radius: 0;
	border: none;
	box-shadow: 0px 0px 14px 2px #d4d4d4;
}
.panel-default > .panel-heading {
	color: #444;
	background-color: #f3f3f3;
	border-color: #000;
	display: block;
}
.panel-default > .panel-heading {
	color: #444;
	background-color: #f3f3f3;
	border-color: #000;
	display: block;
}
.panel-body {
	padding: 30px 20px;
}
.form-group {
	margin-bottom: 25px;
}
label {
	display: inline-block;
	max-width: 100%;
	margin-bottom: 5px;
	font-weight: 500;
	font-size: 15px;
}
.form-control {
	display: block;
	width: 100%;
	padding: 10px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 1px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.form-control:focus {
	border-color: #e1103894;
	outline: 0;
	-webkit-box-shadow: none;
	box-shadow: none;
}
.btn-primary:hover {
	color: #fff;
	background-color: #e11038;
}
input.btn.btn-success.applycoupon {
    margin-top: 22px;
}
				/* new added css */
    </style>
</head>
<body>
		<input type="hidden" value="{{ URL::to('/') }}" class="base_url">
	<div style="display:none" class="preloader">
	 <div class="loader"></div>
	</div>
<div class="container">


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >
                            <img class="img-responsive pull-right" src="{{ asset('front/images/payment.png') }}">
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

										<div class='form-row row'>
												<div class='col-md-12 error form-group hide'>
														<div class='alert-danger alert'>Please correct the errors and try
																again.</div>
												</div>
										</div>

                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' placeholder="Please enter name on card" name="name" size='4' type='text'>
                            </div>
                        </div>
												<input type="hidden" name="packageId" class="packageId" value="{{ $id }}">

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' placeholder="Please enter card number" class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' maxlength="2" placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' maxlength="4" placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
												<div class="form-now row">


                            <div class='col-xs-12 col-md-6 form-group'>
                                <label class='control-label'>Coupon Code</label> <input
                                    autocomplete='off' placeholder="Please enter coupon code" class='form-control couponcode' name="coupon" size='20'
                                    type='text'>
                            </div>

                            <div class='col-xs-12 col-md-6 form-group'>
                                    <input type="button" value="Apply Coupon" class='btn btn-success applycoupon' >
                            </div>
														  <div class='col-xs-12 col-md-12 form-group'>
														<div class="discount">

														</div>
													</div>
											</div>



                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block paymentbtn" type="submit">Pay Now (${{ $package->price }})</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{ asset('front/js/jquery.toast.js') }}"></script>
<script src="{{ asset('front/js/validation.js') }}"></script>
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $('.alert-danger').removeClass('hide');

        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
          $('.alert-danger').addClass('hide');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }

  });

  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            // $form.get(0).submit();
						$('.alert-danger').removeClass('hide');
						formSubmit($form.get(0));
        }
    }

});

jQuery(document).ready(function () {


$('body').on('click','.applycoupon',function(){

	var id = $('.couponcode').val();
	var packageId = $('.packageId').val();


	$.ajax({
		dataType:'json',
		url :base_url+'/ApplyCoupon',
		type :'post',
		data : {
			id:id,packageId:packageId
		},
		enctype : 'multipart/form-data',
	 headers     : {
		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 },
	 beforeSend  : function () {
		 $(".loader_panel").css('display','block');
	 },
	 complete: function () {
		 $(".loader_panel").css('display','none');
	 },

		success: function(response){

			$.toast().reset('all');
		var delayTime = 3000;
		if(response.delayTime)
		delayTime = response.delayTime;
		if (response.success)
		{
			 var a = '<h6>Discount: '+response.result.discount+'%</h6>';
			 $('.paymentbtn').html('Pay Now ($'+response.result.payable+')');
			 $('.discount').html(a);
			$.toast({
				heading             : 'Success',
				text                : response.success_message,
				loader              : true,
				loaderBg            : '#fff',
				showHideTransition  : 'fade',
				icon                : 'success',
				hideAfter           : delayTime,
				position            : 'top-right'
			});
			// setTimeout(function() {  location.reload(true);},3000);
		}
		else
		{

			if( response.formErrors)
			{
				$.toast({
					heading             : 'Error',
					text                : response.errors,
					loader              : true,
					loaderBg            : '#fff',
					showHideTransition  : 'fade',
					icon                : 'error',
					hideAfter           : delayTime,
					position            : 'top-right'
				});
			}
			else
			{
				$.toast({
					heading             : 'Error',
					text                : response.error_message,
					loader              : true,
					loaderBg            : '#fff',
					showHideTransition  : 'fade',
					icon                : 'error',
					hideAfter           : delayTime,
					position            : 'top-right'
				});
			}
		}

		}
	});

});
});
// Apply coupon
</script>
</html>
