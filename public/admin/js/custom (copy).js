jQuery(document).ready(function () {

var base_url = $('.base_url').val();



$.validator.addMethod("lettersonly", function(value, element) {
         return this.optional(element) || /^[a-z," "]+$/i.test(value);
   }, "Only alphabets are allowed.");

   jQuery.validator.addMethod("noSpace", function(value, element) {
		return value.indexOf(" ") < 0 && value != "";
	}, "Space are not allowed");

   jQuery.validator.addMethod("regex", function(value, element, param){
         return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
      }, "Please enter a valid email address.");

      //////  array validation
      $.validator.addMethod("mytst", function (value, element) {
        var flag = true;
      $("[name^=taxiNumber]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="taxiNumber'+i+'-error" class="has-error">Please enter taxi number.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst1", function (value, element) {
        var flag = true;
      $("[name^=taxiType]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="taxiType'+i+'-error" class="has-error">Please select taxi type.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst2", function (value, element) {
        var flag = true;
      $("[name^=taxiSeat]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="taxiType'+i+'-error" class="has-error">Please enter seat capacity.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst3", function (value, element) {
        var flag = true;
      $("[name^=taxiInspectionExpiryDate]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="taxiInspectionExpiryDate'+i+'-error" class="has-error">Please enter inpection expiry date.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst4", function (value, element) {
        var flag = true;
      $("[name^=vehicleno]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="vehicleno'+i+'-error" class="has-error">Please enter inspection expiry date.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst4", function (value, element) {
        var flag = true;
      $("[name^=vehicleno]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="vehicleno'+i+'-error" class="has-error">Please enter vehicle no.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst5", function (value, element) {
        var flag = true;
      $("[name^=taxiSection]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="taxiSection'+i+'-error" class="has-error">Please enter section.</label>');
      }
      });
      return flag;
      }, "");
      ////// end array validation

    // login
    $("#loginform").validate({
      errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
   rules:
   {
     email: {
       required: true,
       email:true,
       regex: "",
     },
     password: {
       required: true
     },
   },
   messages:
   {
     email: {
       required: "Please enter email address",
     },
     password: {
       required: "Please enter password",

     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // login

    // forgotpassword
    $("#forgotpasswordform").validate({
   rules:
   {
     email: {
       required: true,
       email:true,
       regex: "",
     },
   },
   messages:
   {
     email: {
       required: "Please enter email address",
     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // forgotpassword

    // Newpassword
    $("#newpasswordform").validate({
   rules:
   {
     password: {
       required: true
     },
     confirm_password: {
       required: true,
        equalTo: "#password",
     },
   },
   messages:
   {
     password: {
       required: "Please enter password",
     },
     confirm_password: {
       required: "Confirm password is required",
     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // Newpassword
  // back
 $('.cancel').click(function(){
		parent.history.back();
		return false;
	});

  // back

// vehicle add
$("#addvehicle").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 "taxiNumber[]": {
   mytst:true,
 },
 "taxiType[]": {
  mytst1:true,
 },
 "taxiSeat[]": {
  mytst2:true,
 },
 "taxiInspectionExpiryDate[]": {
   mytst3:true,
 },
 "vehicleno[]": {
   mytst4:true,
 },
 "taxiSection[]": {
  mytst5:true,
 },
},
messages:
{
 "taxiNumber[]": {
   required: "Please enter taxi number",
 },
 "taxiType[]": {
   required: "Please select taxi type",
 },
 "taxiSeat[]": {
   required: "Please enter taxi seat capacity",
 },
 "taxiInspectionExpiryDate[]": {
   required: "Please enter inpection expiry date",
 },
 "vehicleno[]": {
   required: "Please enter vehicle no",
 },
 "taxiSection[]": {
   required: "Please enter taxi section",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// vehicle add


// driver add
$("#adddriver").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 firstName: {
   required: true,
    lettersonly:true,
 },
 lastName: {
   required: true,
    lettersonly:true,
 },
 email: {
   required: true,
   email:true,
   regex: "",
 },
 driverId: {
   required: true
 },
 permitExpiryDate: {
   required: true
 },
 licenceNo: {
   required: true
 },
 licenceExpiryDate: {
   required: true
 },
 driverImage: {
   required: true
 },
 bcdl: {
   required: true
 },
 hiringDate: {
   required: true
 },
 phone: {
   required: true
 },
},
messages:
{
 firstName: {
   required: "Please enter first name",
 },
 lastName: {
   required: "Please enter last name",
 },
 email: {
   required: "Please enter email address",
 },
 driverId: {
   required: "Please enter driverId",
 },
 permitExpiryDate: {
   required: "Please enter permit expiry date",
 },
 licenceNo: {
   required: "Please enter licence no",
 },
 licenceExpiryDate: {
   required: "Please enter licence expiry date",
 },
 driverImage: {
   required: "Please upload driver image",
 },
 bcdl: {
   required: "Please upload bdcl image",
 },
 hiringDate: {
   required: "Please enter hiring date",
 },
 phone: {
   required: "Please enter phone number",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// driver add

// update driver

$("#updatedriver").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 firstName: {
   required: true,
   lettersonly:true,
 },
 lastName: {
   required: true,
    lettersonly:true,
 },
 email: {
   required: true,
   email:true,
   regex: "",
 },
 driverId: {
   required: true
 },
 permitExpiryDate: {
   required: true
 },
 licenceNo: {
   required: true
 },
 licenceExpiryDate: {
   required: true
 },
 hiringDate: {
   required: true
 },
 phone: {
   required: true
 },
},
messages:
{
 firstName: {
   required: "Please enter first name",
 },
 lastName: {
   required: "Please enter last name",
 },
 email: {
   required: "Please enter email address",
 },
 driverId: {
   required: "Please enter driverId",
 },
 permitExpiryDate: {
   required: "Please enter permit expiry date",
 },
 licenceNo: {
   required: "Please enter licence no",
 },
 licenceExpiryDate: {
   required: "Please enter licence expiry date",
 },
 hiringDate: {
   required: "Please enter hiring date",
 },
 phone: {
   required: "Please enter phone number",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// update driver

// add customer

$("#addcustomer").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 accountName: {
   required: true
 },
 accountNumber: {
   required: true
 },
 email: {
   required: true
 },
 contactName: {
   required: true,
   lettersonly:true,
 },
 referenceNumber: {
   required: true
 },
 fax: {
   required: true
 },
 phone: {
   required: true
 },
 address: {
   required: true
 },
 billingType: {
   required: true
 },
},
messages:
{
 accountName: {
   required: "Please enter account name",
 },
 accountNumber: {
   required: "Please enter account number",
 },
 email: {
   required: "Please enter email address",
 },
 contactName: {
   required: "Please enter contact name",
 },
 referenceNumber: {
   required: "Please enter reference number",
 },
 fax: {
   required: "Please enter licence no",
 },
 phone: {
   required: "Please enter phone number",
 },
 address: {
   required: "Please enter address",
 },
 billingType: {
   required: "Please select billing type",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// add customer


// owner add
$("#addowner").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 taxiId: {
   required: true
 },
 ownerName: {
   required: true,
  lettersonly:true,
 },
},
messages:
{
 taxiId: {
   required: "Please select taxi number",
 },
 ownerName: {
   required: "Please enter owner",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// owner add

// trip Update
$("#updatetrip").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 jobId: {
   required: true
 },
 driverId: {
   required: true
 },
 date: {
   required: true
 },
 time: {
   required: true
 },
 badgeId: {
   required: true
 },
 customerName: {
   required: true
 },
 taxiNumber: {
   required: true
 },
 fare: {
   required: true
 },
 account: {
   required: true
 },
 po: {
   required: true
 },
 pickupAddress: {
   required: true
 },
 dropOffAddress: {
   required: true
 },
 pickupDate: {
   required: true
 },
 pickupTime: {
   required: true
 },
 dropOffDate: {
   required: true
 },
 dropOffTime: {
   required: true
 },
 signature: {
   required: true
 },
},
messages:
{
 jobId: {
   required: "Please enter jobId",
 },
 driverId: {
   required: "Please select driver",
 },
 date: {
   required: "Please select date",
 },
 time: {
   required: "Please select date",
 },
 badgeId: {
   required: "Please enter badgeId",
 },
 customerName: {
   required: "Please enter customer name",
 },
 taxiNumber: {
   required: "Please enter taxi number",
 },
 fare: {
   required: "Please enter fare",
 },
 account: {
   required: "Please enter account",
 },
 po: {
   required: "Please enter po",
 },
 pickupAddress: {
   required: "Please enter pickup address",
 },
 dropOffAddress: {
   required: "Please enter dropoff address",
 },
 pickupDate: {
   required: "Please select pickup date",
 },
 pickupTime: {
   required: "Please enter pickup time",
 },
 dropOffDate: {
   required: "Please select dropoff date",
 },
 dropOffTime: {
   required: "Please enter drop time",
 },
 signature: {
   required: "Please select signature",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// trip Update



// pgination
jQuery('body').on('click', '.pagination1 a', function(){
jQuery('.pagination li.active').removeClass('active');
jQuery(this).parent('li').addClass('active');
var page = jQuery(this).attr('href').split('page=')[1];
var pageUrl = jQuery(this).attr('href');
var search = jQuery('.search').val();

// var activeattribute = jQuery('#myTab li a.active').attr('href');
// history.pushState({page: page}, "title "+page, "?page="+page)
// var pagination = "pagination";
$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:page,search:search},
headers : {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
beforeSend  : function () {
  $(".loader_panel").css('display','block');
},
complete: function () {
  $(".loader_panel").css('display','none');
},
dataType: 'json',
success:function(response){
if(response.html)
{

jQuery('.table-responsive').html(response.html);

}
}
});
return false;
});

// pagination

// search
jQuery('body').on('click', '.searchbtn', function(){
// jQuery('.pagination li.active').removeClass('active');
// jQuery(this).parent('li').addClass('active');
var page = 1;
var pageUrl = jQuery('.searchpagelink').val();
var search = jQuery('.search').val();
// var activeattribute = jQuery('#myTab li a.active').attr('href');
// history.pushState({page: page}, "title "+page, "?page="+page)
// var pagination = "pagination";
$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:page,search:search},
headers : {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
beforeSend  : function () {
  $(".loader_panel").css('display','block');
},
complete: function () {
  $(".loader_panel").css('display','none');
},
dataType: 'json',
success:function(response){
if(response.html)
{

jQuery('.table-responsive').html(response.html);

}
}
});
return false;
});

// search

// search trip
jQuery('body').on('click', '.searchtrip', function(){
var page = 1;
var pageUrl = jQuery('.searchpagelink').val();
var startdate = jQuery('.startdate').val();
var enddate = jQuery('.enddate').val();
var owner = jQuery('.owner').val();
$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:page,startdate:startdate,enddate:enddate,owner:owner},
headers : {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
beforeSend  : function () {
  $(".loader_panel").css('display','block');
},
complete: function () {
  $(".loader_panel").css('display','none');
},
dataType: 'json',
success:function(response){
if(response.html)
{
jQuery('.table-responsive').html(response.html);
}
}
});
return false;
});

// search trip

// trip pagination
jQuery('body').on('click', '.trippagination a', function(){
var page = jQuery(this).attr('href').split('page=')[1];

var pageUrl = jQuery('.searchpagelink').val();
var startdate = jQuery('.startdate').val();
var enddate = jQuery('.enddate').val();
var owner = jQuery('.owner').val();
$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:page,startdate:startdate,enddate:enddate,owner:owner},
headers : {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
beforeSend  : function () {
  $(".loader_panel").css('display','block');
},
complete: function () {
  $(".loader_panel").css('display','none');
},
dataType: 'json',
success:function(response){
if(response.html)
{
jQuery('.table-responsive').html(response.html);
}
}
});
return false;
});

// trip pagination

$("#passwordUpdate").validate({
rules:
{
 password: {
   required: true,
   minlength: 6
 },
 confirm_password: {
   required: true,
   equalTo: "#password",
  minlength: 6
 },
},
messages:
{

 password: {
   required: "Please enter password",
   minlength: "Your password must be at least 6 characters long",
},

 confirm_password: {
   required: "Please enter confirm password",
   minlength: "Your password must be at least 6 characters long",
   equalTo:   "Confirm password does not matched."
},
},
submitHandler: function (form)
{
 formSubmit(form);
}
});




    // **********************only number******************************
    $(".numberonly").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
		// Allow: Ctrl+A, Command+A
		(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
		// Allow: home, end, left, right, down, up
		(e.keyCode >= 35 && e.keyCode <= 40)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});
    // **********************only number******************************

    // **********************only character******************************
    $('.characteronly').keypress(function (e) {
        var regex = new RegExp(/^[a-zA-Z\s]+$/);
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else {
            e.preventDefault();
            return false;
        }
    });
    // **********************only character******************************

    // ********************* Image read********************************
	$('body').on('change', '.driverimage', function()
  {
     readURL(this);
  });



	$('body').on('change', '.bdclimage', function()
  {

     readURL1(this);
  });

  $('body').on('change', '.signature', function()
  {

     readURL2(this);
  });
    // ********************* Image read********************************

    // delete vehicle
 $('body').on('click','.deletevehicle',function(){

   var id = $(this).attr('data-id');
   var conf = confirm("Are you sure to delete this record");
   if(conf == true)
   {

   $.ajax({
     url :base_url +'/vehicleDelete',
     type :'post',
     data : {
       id:id
     },
     enctype : 'multipart/form-data',
    headers     : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    dataType    : "json",
     success: function(response){

       $.toast().reset('all');
     var delayTime = 3000;
     if(response.delayTime)
     delayTime = response.delayTime;
     if (response.success)
     {

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

        setTimeout(function() {  location.reload(true);},3000);
     }
     else
     {
       //$(".button-disabled").removeAttr("disabled");
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
         jQuery('#InputEmail').val('');
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
 }

 });
    // delete vehicle

    // delete driver
    $('body').on('click','.driverdelete',function(){

      var id = $(this).attr('data-id');
      var conf = confirm("Are you sure to delete this record");
      if(conf == true)
      {

      $.ajax({
        dataType:'json',
       url :base_url +'/driverdelete',
        type :'post',
        data : {
          id:id
        },
        enctype : 'multipart/form-data',
       headers     : {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },

        success: function(response){

          $.toast().reset('all');
        var delayTime = 3000;
        if(response.delayTime)
        delayTime = response.delayTime;
        if (response.success)
        {
          // $(".data"+id).hide();

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

            setTimeout(function() {  location.reload(true);},1000);
        }
        else
        {
          //$(".button-disabled").removeAttr("disabled");
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
            jQuery('#InputEmail').val('');
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
    }

    });
    // delete vehicle

    // delete customer
    $('body').on('click','.customerdelete',function(){

      var id = $(this).attr('data-id');
      var conf = confirm("Are you sure to delete this record");
      if(conf == true)
      {

      $.ajax({
        dataType:'json',
       url :base_url +'/customerdelete',
        type :'post',
        data : {
          id:id
        },
        enctype : 'multipart/form-data',
       headers     : {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },

        success: function(response){

          $.toast().reset('all');
        var delayTime = 3000;
        if(response.delayTime)
        delayTime = response.delayTime;
        if (response.success)
        {
          // $(".data"+id).hide();

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

            setTimeout(function() {  location.reload(true);},1000);
        }
        else
        {
          //$(".button-disabled").removeAttr("disabled");
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
            jQuery('#InputEmail').val('');
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
    }

    });

    // delete customer
    // delete owner
    $('body').on('click','.deleteowner',function(){

      var id = $(this).attr('data-id');
      var conf = confirm("Are you sure to delete this record");
      if(conf == true)
      {

      $.ajax({
        dataType:'json',
       url :base_url +'/ownerdelete',
        type :'post',
        data : {
          id:id
        },
        enctype : 'multipart/form-data',
       headers     : {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },

        success: function(response){

          $.toast().reset('all');
        var delayTime = 3000;
        if(response.delayTime)
        delayTime = response.delayTime;
        if (response.success)
        {
          // $(".data"+id).hide();

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

            setTimeout(function() {  location.reload(true);},1000);
        }
        else
        {
          //$(".button-disabled").removeAttr("disabled");
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
            jQuery('#InputEmail').val('');
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
    }

    });

    // delete Owner

    // view user
$('body').on('click','.driverviewd',function(){

   var id = $(this).attr('data-id');
   $.ajax({
     dataType:'json',
     url :base_url +'/driverView',
      type :'post',
      data : {
        id:id
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
     if (response.success)
     {
       var gg = response.result;

       var rows = '';

       var dates = new Date(Date.parse(gg.dateofbirth));
       var month = dates.getMonth();
       var day = dates.getDate();
       var year = dates.getFullYear();
        var date = ''+day+'-'+month+'-'+year;

     rows += '<p><b>First Name</b> : '+gg.firstName+' </p>';
     rows += '<p><b>Last Name</b> : '+gg.lastName+' </p>';
     rows += '<p><b>Email</b> : '+gg.email+' </p>';
     rows += '<p><b>DriverId</b> : '+gg.driver_info.driverId+' </p>';
     rows += '<p><b>Permit Expiry Date</b> : '+gg.driver_info.permitExpiryDate+' </p>';
     rows += '<p><b>Licence No</b> : '+gg.driver_info.licenceNo+' </p>';
     rows += '<p><b>Licence Expiry Date</b> : '+gg.driver_info.licenceExpiryDate+' </p>';
     rows += '<p><b>Hiring Date</b> : '+gg.driver_info.hiringDate+' </p>';

     $('.driverdetails').html(rows);
     $('#view').modal('show');
     }

   }
 });
});

// view driver

// customer view
$('body').on('click','.customerviewd',function(){

   var id = $(this).attr('data-id');
   $.ajax({
     dataType:'json',
     url :base_url +'/customerView',
      type :'post',
      data : {
        id:id
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
     if (response.success)
     {
       var gg = response.result;

       var rows = '';

       var dates = new Date(Date.parse(gg.dateofbirth));
       var month = dates.getMonth();
       var day = dates.getDate();
       var year = dates.getFullYear();
        var date = ''+day+'-'+month+'-'+year;

     rows += '<p><b>Account Name</b> : '+gg.accountName	+' </p>';
     rows += '<p><b>Account Number</b> : '+gg.accountNumber +' </p>';
     rows += '<p><b>Contract Name</b> : '+gg.contactName +' </p>';
     rows += '<p><b>Reference Number</b> : '+gg.referenceNumber +' </p>';
     rows += '<p><b>Email</b> : '+gg.email +' </p>';
     rows += '<p><b>Fax</b> : '+gg.fax+' </p>';
     rows += '<p><b>Phone</b> : '+gg.phone+' </p>';
     rows += '<p><b>Address</b> : '+gg.address+' </p>';
     if(gg.billingType == 1)
     {
     rows += '<p><b>Billing Type</b> : Email </p>';
     }
     else if(gg.billingType == 2)
     {
     rows += '<p><b>Billing Type</b> : Mail </p>';

     }
     else if(gg.billingType == 3)
     {
     rows += '<p><b>Billing Type</b> : Fax </p>';

     }

     $('.customerdetails').html(rows);
     $('#view').modal('show');
     }

   }
 });
});

// customer view

// trip view
$('body').on('click','.tripviewd',function(){

   var id = $(this).attr('data-id');
   $.ajax({
     dataType:'json',
     url :base_url +'/tripView',
      type :'post',
      data : {
        id:id
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
     if (response.success)
     {
       var gg = response.result;

       var rows = '';

       var dates = new Date(Date.parse(gg.date));
       var month = dates.getMonth();
       var day = dates.getDate();
       var year = dates.getFullYear();
       var date = ''+day+'-'+month+'-'+year;
       var dates1 = new Date(Date.parse(gg.pickupDate));
       var month1 = dates1.getMonth();
       var day1 = dates1.getDate();
       var year1 = dates1.getFullYear();
       var pickupdate = ''+day1+'-'+month1+'-'+year1;
       var dates2 = new Date(Date.parse(gg.dropOffDate));
       var month2 = dates2.getMonth();
       var day2 = dates2.getDate();
       var year2 = dates2.getFullYear();
       var dropoffdate = ''+day2+'-'+month2+'-'+year2;
     rows +='<div class="row">';
     rows +='<div class="col-md-6">';
     rows += '<p><b>JobId</b> : '+gg.jobId+' </p>';
     rows += '<p><b>Date</b> : '+date+' </p>';
     rows += '<p><b>Time</b> : '+gg.time+' </p>';
     rows += '<p><b>BadgeId</b> : '+gg.badgeId+' </p>';
     rows += '<p><b>Customer Name</b> : '+gg.customerName+' </p>';
     rows += '<p><b>Taxi Number</b> : '+gg.taxiNumber+' </p>';
     rows += '<p><b>Fare</b> : '+gg.fare+' </p>';
     rows += '<p><b>Tip</b> : '+gg.tip+' </p>';
     rows +='</div>';
     rows +='<div class="col-md-6">';
     rows += '<p><b>Account</b> : '+gg.account+' </p>';
     rows += '<p><b>Po</b> : '+gg.po+' </p>';
     rows += '<p><b>Pickup Address</b> : '+gg.pickupAddress+' </p>';
     rows += '<p><b>DropOff Address</b> : '+gg.dropOffAddress+' </p>';
     rows += '<p><b>Pickup Date</b> : '+pickupdate+' </p>';
     rows += '<p><b>Pickup Time</b> : '+gg.pickupTime+' </p>';
     rows += '<p><b>DropOff Date</b> : '+dropoffdate+' </p>';
     rows += '<p><b>DropOff Time</b> : '+gg.dropOffTime+' </p>';
     rows +='</div>';
     rows +='</div>';

     $('.tripdetails').html(rows);
     $('#view').modal('show');
     }

   }
 });
});

// trip view

// change categories status

$('body').on('click','.vehicleStatus',function(){

 var id =  $(this).attr('data-id');
 var status =  $(this).attr('data-status');
 if(status == 1)
 {
 var conf = confirm("Are you sure to change the status to Enable? ");
}
else
{
  var conf = confirm("Are you sure to change the status to Disable?");
}
if(conf == true)
{
$.ajax({
  dataType:'json',
  url :base_url +'/vehicleStatus',
  type : 'post',
  data : {
    id:id,taxiEnable:status
  },
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

    if (response.success)
    {
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

    if(status == 1)
    {
      $(".vehicleStatus"+id).removeClass("btn-danger");
      $(".vehicleStatus"+id).addClass("btn-success");
      $(".vehicleStatus"+id).attr("data-status",'0')
      $(".vehicleStatus"+id).text('Enable');
    }
    else{
      $(".vehicleStatus"+id).removeClass("btn-success");
      $(".vehicleStatus"+id).addClass("btn-danger");
      $(".vehicleStatus"+id).attr('data-status','1')
      $(".vehicleStatus"+id).text('Disable');
     }
    }
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
  }
});
}
});

// vehicle status

// add more vehicles

// add more
$('.addmore').click(function(){
  var rows = '';
var n =  $('.main').length;
var l = n + 1;
rows +='<div class="main main'+l+'">';
rows +='<div class="row">';
rows +='<div class="col-sm-6">';
rows +='<div class="form-group">';
rows +='<label>Taxi Number</label>';
rows +='<input type="text" placeholder="Please enter taxi number" class="form-control" name="taxiNumber[]"   id="taxiNumber'+n+'">';
rows +='</div>';
rows +='</div>';
rows +='<div class="col-sm-6">';
rows +='<div class="form-group">';
rows+='<label>Taxi Type</label>';
rows+='<select name="taxiType[]" class="form-control dropdown-toggle">';
rows+='<option value="">Select Type</option>';
rows+='<option value="1">Sedan</option>';
rows+='<option value="2">Van</option>';
rows+='</select>';
rows+='</div>';
rows+='</div>';
rows+='<div class="col-sm-6">';
rows+='<div class="form-group">';
rows+='<label>Seat Capacity</label>';
rows+='<input type="text" placeholder="Please enter taxi seat capacity" class="form-control numberonly" name="taxiSeat[]"   id="taxiSeat'+n+'">';
rows+='</div>';
rows+='</div>';
rows+='<div class="col-sm-6">';
rows+='<div class="form-group">';
rows+='<label>Inspection Expiry Date</label>';
rows+='<input readonly type="text" placeholder="Please enter inspection expiry date" class="form-control datepicker1" name="taxiInspectionExpiryDate[]"   id="taxiInspectionExpiryDate'+l+'">';
rows+='</div>';
rows+='</div>';
rows+='<div class="col-sm-6">';
rows+='<div class="form-group">';
rows+='<label>Vehicle no</label>';
rows+='<input type="text" placeholder="Please enter vehicle no" class="form-control numberonly" name="vehicleno[]"   id="vehicleno'+n+'">';
rows+='</div>';
rows+='</div>';
rows+='<div class="col-sm-5">';
rows+='<div class="form-group">';
rows+='<label>Taxi Section</label>';
rows+='<input type="text" placeholder="Please enter taxi section" class="form-control characteronly" name="taxiSection[]"   id="taxiSection'+n+'">';
rows+='</div>';
rows+='</div>';
rows+='<div class="col-sm-1">';
rows+='<a class="fieldremove" hand data-id="'+l+'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
rows+='</div>';
rows+='</div>';
rows+='</div>';
$('.mainvehicleform').append(rows);
});
// add more vehicles

////delete field
  $('body').on('click','.fieldremove',function()
  {
    var id = $(this).attr('data-id');
    $('.main'+id).remove();
  });
 ////delete field

});

 // *************** image read*************
 function readURL(input)
 {
    if (input.files && input.files[0])
     {
        var reader = new FileReader();
        reader.onload = function (e)
         {
            $('.dshowimage').attr('src', e.target.result);
            $('.dshowimage').attr('height','100');
            $('.dshowimage').attr('width','100');
         }
        reader.readAsDataURL(input.files[0]);
     }
 }

 function readURL1(input)
 {
    if (input.files && input.files[0])
     {
        var reader = new FileReader();
        reader.onload = function (e)
         {
            $('.bcshowimage').attr('src', e.target.result);
            $('.bcshowimage').attr('height','100');
            $('.bcshowimage').attr('width','100');
         }
        reader.readAsDataURL(input.files[0]);
     }
 }

 function readURL2(input)
 {
    if (input.files && input.files[0])
     {
        var reader = new FileReader();
        reader.onload = function (e)
         {
            $('.signtureshow').attr('src', e.target.result);
            $('.signtureshow').attr('height','100');
            $('.signtureshow').attr('width','100');
         }
        reader.readAsDataURL(input.files[0]);
     }
 }
 // *************** image read*************
 // image read

 // *************** submit function******************

 function formSubmit(form)
{
  $.ajax({
    url         : form.action,
    type        : form.method,
    data        : new FormData(form),
    enctype : 'multipart/form-data',
    contentType : false,
    cache       : false,
    headers     : {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    processData : false,
    dataType    : "json",
    beforeSend  : function () {
      $(".button-disabled").attr("disabled", "disabled");
      $(".loader_panel").css('display','block');
    },
    complete: function () {
      $(".loader_panel").css('display','none');
        $(".button-disabled").attr("disabled",false);
    },
    success: function (response) {

      if(response.url)
      {
        if(response.delayTime)
        setTimeout(function() { window.location.href=response.url;}, response.delayTime);
        else
        window.location.href=response.url;
      }
      $.toast().reset('all');
      var delayTime = 3000;
      if(response.delayTime)
      delayTime = response.delayTime;
      if (response.success)
      {
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

            if (response.modelhide) {

            if (response.delay)
            {

            setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
            }
             else
             {

            $(response.modelhide).modal('hide');
              }
            }
      }
      else
      {

        $(".button-disabled").removeAttr("disabled");
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
        // else
        // {
        //   $.toast({
        //     heading             : 'Error',
        //     text                : response.error_message,
        //     loader              : true,
        //     loaderBg            : '#fff',
        //     showHideTransition  : 'fade',
        //     icon                : 'error',
        //     hideAfter           : delayTime,
        //     position            : 'top-right'
        //   });
        // }
      }

      if(response.validation == false)
      {
          var i = 0;
          $.each(response.errors, function( index, value )
          {
          if (i == 0) {
          $("input[name='"+index+"']").focus();
          }
          var str=value.toString();
          if (str.indexOf('edit') != -1) {
          // will not be triggered because str has _..
          value=str.toString().replace('edit', '');
          }


          // $("input[name='"+index+"']").parents('.form-group').addClass('has-error');
          $("input[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');

          // $("textarea[name='"+index+"']").parents('.form-group').addClass('has-error');
          $("textarea[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');

          // $("select[name='"+index+"']").parents('.form-group').addClass('has-error');
          $("select[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');
          i++;
          });
          $("input[type=submit]").removeAttr("disabled");
          $("button[type=submit]").removeAttr("disabled");
      }

      if(response.ajaxPageCallBack)
      {
        response.formid = form.id;
        ajaxPageCallBack(response);
      }
      if(response.resetform)
        {
         //$('.reset').resetForm();
         $('.reset')[0].reset();
         }
      if(response.url)
      {
        if(response.delayTime)
        setTimeout(function() { window.location.href=response.url;}, response.delayTime);
        else
        window.location.href=response.url;
      }
    },
    error:function(response){
        $.toast({
          heading             : 'Error',
          text                : "Server Error",
          loader              : true,
          loaderBg            : '#fff',
          showHideTransition  : 'fade',
          icon                : 'error',
          hideAfter           : 4000,
          position            : 'top-right'
        });

    }
  });
}
 // *************** submit function******************
 function formSubmit1(form)
{
    $.ajax({
        url         : form.action,
        type        : form.method,
        // data        : form.serialize(),
        data        : new FormData(form),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType : false,
        cache       : false,
        processData : false,
        dataType    : "json",
        beforeSend  : function () {
            $("input[type=submit]").attr("disabled", "disabled");
            $("#preloader").show();
        },
        complete: function () {
            $("#preloader").hide();
            $("input[type=submit]").removeAttr("disabled");
            $("button[type=submit]").removeAttr("disabled");
        },
        success: function (response) {
            console.log(response);
            $("#preloader").hide();
            $("input[type=submit]").removeAttr("disabled");
            if (response.success)
            {
                form.reset();
                toastr.success(response.message,response.delayTime);
                if( response.updateRecord)
                {
                    $.each(response.data, function( index, value )
                    {
                        $(document).find('#tableRow_'+response.data.id).find("td[data-name='"+index+"']").html(value);
                    });
                }
                if( response.addRecord)
                {
                    $.each(response.data, function( index, value )
                    {
                        $("input[name='"+index+"']").parents('.form-group').addClass('has-error');
                        $("input[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');

                        $("select[name='"+index+"']").parents('.form-group').addClass('has-error');
                        $("select[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');
                    });
                }
                if(response.showElement)
                {
                    var showIDs = response.showElement.split(",");
                    $.each(showIDs, function(i, val){ $(val).removeClass('d-none'); });
                }
                if(response.hideElement)
                {
                    var hideIDs = response.hideElement.split(",");
                    $.each(hideIDs, function(i, val){ $(val).addClass('d-none'); });
                }
            }
            if(response.validation===false){
                jQuery.each(response.message,function(index,value){
                    $('#error_'+index).html(value);
                    $('#error_'+index).show();
                    $("input[name='"+index+"']").addClass('is-invalid');
                    $("select[name='"+index+"']").addClass('is-invalid');
                    $("textarea[name='"+index+"']").addClass('is-invalid');
                });
            }
            if(response.error){
                toastr.error(response.message,response.delayTime);
            }
            if(response.html){
                jQuery(response.target).html(response.content);
            }

            if(response.ajaxPageCallBack)
            {
                response.formid = form.id;
                ajaxPageCallBack(response);
            }

            if(response.resetform)
            {
                $('#'+form.id).trigger('reset');
            }
            if(response.submitDisabled)
            {
                $("input[type=submit]").attr("disabled", "disabled");
                $("button[type=submit]").attr("disabled", "disabled");

            }
            if (response.modelhide) {

                if (response.delay)
                    setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
                else
                    $(response.modelhide).modal('hide');
            }
            if(response.url)
            {
                if(response.delayTime)
                    setTimeout(function() { window.location.href=response.url;}, response.delayTime);
                else
                    window.location.href=response.url;
            }
            if (response.reload) {
                if(response.delayTime)
                    setTimeout(function(){  location.reload(); }, response.delayTime)
                else
                    location.reload();
            }

            if (response.elementHide) {
                jQuery(response.elementHide).addClass('d-none');
            }
            if (response.elementShow) {
                jQuery(response.elementShow).removeClass('d-none');
            }

            if (response.customScript=='adminWalletTxn') {
                $('#walletModelForm').attr('action',response.wallet_url);
                $('.w_ag_name').text(response.agent_name);
                $('.w_ag_amt').text(response.wallet_amount);
            }

        },
        error:function(response){
            networkError();
            console.log('Connection Error');
        }
    });
}
