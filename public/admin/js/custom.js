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


      $.validator.addMethod("mytst10", function (value, element) {
        var flag = true;
      $("[name^=accountId]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="vehicleNo'+i+'-error" class="has-error">Please enter accountId.</label>');
      }
      });
      return flag;
      }, "");

      $.validator.addMethod("mytst11", function (value, element) {
        var flag = true;
      $("[name^=taxiId]").each(function (i, j) {
      $(this).parent('div').find('label.has-error').remove();
      $(this).parent('div').find('label.has-error').remove();
      if ($.trim($(this).val()) == '')
      {
      flag = false;
      $(this).parent('div').append('<label  id="vehicleNo'+i+'-error" class="has-error">Please select taxi.</label>');
      }
      });
      return flag;
      }, "");
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

 // profile update
 $("#profileUpdate").validate({
rules:
{
  firstName: {
    required: true
  },
  lastName: {
    required: true,
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
},
submitHandler: function (form)
{
  formSubmit(form);
}
});

// profile update

  // back
 $('.cancel').click(function(){
		parent.history.back();
		return false;
	});

  // back

// vehicle add
$("#addcoupon").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 coupon: {
   required: true
 },
 discount: {
   required: true,
   number:true,
 },
},
messages:
{
 coupon: {
   required: "Please enter coupon",
 },
 discount: {
   required: "Please enter discount",
 },

},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// vehicle add
// stories add
$("#addstories").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 image: {
   required: true
 },
 description: {
   required: true,
 },
},
messages:
{
 image: {
   required: "Please select image",
 },
 description: {
   required: "Please enter description",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// Stories add
// stories add
$("#updatestories").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 description: {
   required: true,
 },
},
messages:
{
 description: {
   required: "Please enter description",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// Stories add

// country
$("#addcountry").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 name: {
   required: true
 },
},
messages:
{
 name: {
   required: "Please enter country",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// country
// addreligions
$("#addreligions").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 name: {
   required: true
 },
},
messages:
{
 name: {
   required: "This is required",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// addreligions


// city
$("#addcity").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 name: {
   required: true
 },
},
messages:
{
 name: {
   required: "Please enter city",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// city
// state
$("#addstate").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 name: {
   required: true
 },
 timezone: {
   required: true
 },
},
messages:
{
 name: {
   required: "Please enter state",
 },
 timezone: {
   required: "Please enter timezone",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// state

// package add
$("#addpackage").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 name: {
   required: true,
    lettersonly:true,
 },
 price: {
   required: true,
    number:true,
 },
 connects: {
   required: true,
    number:true,
 },
 chat: {
   required: true,
 },
 phoneNumberDisplay: {
   required: true,
 },
 duration: {
   required: true,
 },
 price: {
   required: true,
    number:true,
 },
 description: {
   required: true,
 },
},
messages:
{
 name: {
   required: "Please enter name",
 },
 price: {
   required: "Please enter price",
 },
 chat: {
   required: "This is required",
 },
 connects: {
   required: "This is required",
 },
 phoneNumberDisplay: {
   required: "This is required",
 },
 duration: {
   required: "This is required",
 },
 description: {
   required: "Please enter description",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// package add


// coupon send
// state
$("#couponuser").validate({
  errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
rules:
{
 coupon: {
   required: true
 },
},
messages:
{
 coupon: {
   required: "Please select coupon code",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// state

// coupon send

// pagination
jQuery('body').on('click', '.pagination1 a', function(){
//jQuery('.pagination li.active').removeClass('active');
//jQuery(this).parent('li').addClass('active');
var page = jQuery(this).attr('href').split('page=')[1];
var pageUrl = jQuery(this).attr('href');
var search = jQuery('.search').val();

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

// reset
jQuery('body').on('click', '.getreset', function(){

var pageUrl = jQuery(this).attr('data-href');
$('.search').val('');
$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:1},
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

// Reset

// search
jQuery('body').on('click', '.searchbtn', function(){

var page = 1;
var pageUrl = jQuery('.searchpagelink').val();
var search = jQuery('.search').val();
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


$("#homeUpdate").validate({
rules:
{
 title: {
   required: true
  },
 image: {
   required: true,
 },
},
messages:
{

 title: {
   required: "Please enter tagline",
},
 image: {
   required: "Please select image",
},
},
submitHandler: function (form)
{
 formSubmit(form);
}
});


    // **********************only number******************************
    // $(".numberonly").keydown(function (e) {
    $('body').on('keydown', '.numberonly', function(e){

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
    // $('.characteronly').keypress(function (e) {
      $('body').on('keypress', '.characteronly', function(e){

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


  $('body').on('change', '.ownerprofile', function()
  {

     ownerprofile(this);
  });
    // ********************* Image read********************************

// owner status change
$('body').on('change','.ownerStatuschange',function(){

  var id = $(this).attr('data-id');
  var status = $(this).val();
  $('.userId').val(id);
  $('.userstatus').val(status);
  if(status == 0)
  {
    $('.messagetext').text('Are you sure to change the status to InActive ?');
  }
  else if(status == 1)
  {
    $('.messagetext').text('Are you sure to change the status to Active ?');
  }
  if(status != '')
  {
  $('#confirm').modal('show');
  }

});

// owner status change


// send coupon to user
$('body').on('click','.sendCoupon',function(){

  var id = $(this).attr('data-id');
  var name = $(this).attr('data-name');
  var title = 'Send Coupon Code to '+name;
  $('.coupontitle').html(title);
  $('.couponuserId').val(id);
  $('#couponSendUser').modal('show');

});
// send coupon to user

// owner status change
$('body').on('click','.updatestatus',function(){


  var id = $('.userId').val();
  var status = $('.userstatus').val();
  if(status != '')
  {
  $.ajax({
    url :base_url +'/ownerStatusUpdate',
    type :'post',
    data : {
      id:id,status:status
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
      $('#confirm').modal('hide');


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
// owner status change
    // delete vehicle from edit
    $('body').on('click','.deleterecord',function(){

      var id = $(this).attr('data-id');
      var link = $(this).attr('data-link');
      $('.deleteId').val(id);
      $('.deletelink').val(link);

      $('#deleteconfirm').modal('show');


    });

    // delete driver
    $('body').on('click','.datadelete',function(){

      var id = $('.deleteId').val();
      var link = $('.deletelink').val();

      $.ajax({
        dataType:'json',
       url :link,
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
           $('#deleteconfirm').modal('hide');

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

    });
    // delete vehicle

  });


 function debounce(func, wait, immediate) {
 	var timeout;
 	return function() {
 		var context = this, args = arguments;
 		var later = function() {
 			timeout = null;
 			if (!immediate) func.apply(context, args);
 		};
 		var callNow = immediate && !timeout;
 		clearTimeout(timeout);
 		timeout = setTimeout(later, wait);
 		if (callNow) func.apply(context, args);
 	};
 };

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
      if (response.modelhide)
      {
         if (response.delay)
         setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
         else
         $(response.modelhide).modal('hide');
      }
      if(response.html){
          $(response.target).html(response.html);
      }
      if (response.reload)
      {
         if(response.delayTime)
         setTimeout(function(){  location.reload(); }, response.delayTime)
         else
         location.reload();
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
