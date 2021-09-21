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

      // number and chacter only
      $.validator.addMethod("AlphabetandNumbers", function(value, element) {
          return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
          }, "Only Alphabets and Numbers allowed.");
      // number and chacter only
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

 // signup
  $("#registerform").validate({
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
     required: true,
     minlength: 6,
   },
   password_confirmation: {
     required: true,
     equalTo: "#password",
   },
   firstName: {
     required: true,
     lettersonly:true,
   },
   lastName: {
     required: true,
     lettersonly:true,
   },
   phone: {
     required: true,
     number:true,
    minlength:10,
    maxlength:12,

   },
   gender: {
     required: true,

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
   password_confirmation: {
     required: "Confirm password is required",
     equalTo:"Confirm password does not match",
   },
   firstName: {
     required: "Please enter first name",
   },
   lastName: {
     required: "Please enter last name",
   },
   phone: {
     required: "Please enter phone number",
     minlength:"Must be a valid phone number between 10 to 12 digits",
   maxlength:"Must be a valid phone number between 10 to 12 digits",
   },
   gender: {
     required: "Please select gender",
   },
 },
 submitHandler: function (form)
 {
   formSubmit(form);
 }
});

// signup

    // forgotpassword
    $("#forgotpasswordform").validate({
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
      errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
   rules:
   {
     password: {
       required: true
     },
     password_confirmation: {
       required: true,
        equalTo: "#password",
     },
   },
   messages:
   {
     password: {
       required: "Please enter password",
     },
     password_confirmation: {
       required: "Please enter Confirm password",
     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // Newpassword

    // ChangeNewpassword
    $("#changePasswordform").validate({
      errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
   rules:
   {
     currentpassword: {
       required: true,
     },
     password: {
       required: true,
     },
     password_confirmation: {
       required: true,
        equalTo: "#password",
     },
   },
   messages:
   {
     currentpassword: {
       required: "Please enter current password",
     },
     password: {
       required: "Please enter new password",
     },
     password_confirmation: {
       required: "Please enter Confirm password",
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
   errorClass: "has-error",
 highlight: function(element, errorClass) {
     //$(element).parents('.form-group').addClass(errorClass);
 },
 unhighlight: function(element, errorClass, validClass) {
   //  $(element).parents('.form-group').removeClass(errorClass);
 },
rules:
{
  profilecreatedby: {
    required: true
  },
  gender: {
    required: true,
  },
  dateOfBirth: {
    required: true,
  },
  height: {
    required: true,
  },
  maritalStatus: {
    required: true,
  },
  about: {
    required: true,
  },
  // diet: {
  //   required: true,
  // },
  // fatherStatus: {
  //   required: true,
  // },
  // motherStatus: {
  //   required: true,
  // },
  // familyLocation: {
  //   required: true,
  // },
  // nativePlace: {
  //   required: true,
  // },
  // familyType: {
  //   required: true,
  // },
  // bloodGroup: {
  //   required: true,
  // },
  highestQualification: {
    required: true,
  },
  workingWith: {
    required: true,
  },
  workingAs: {
    required: true,
  },
  employerName: {
    required: true,
  },
  income: {
    required: true,
  },
  religion: {
    required: true,
  },
  motherTongue: {
    required: true,
  },
  community: {
    required: true,
  },
  country: {
    required: true,
  },
  state: {
    required: true,
  },
  city: {
    required: true,
  },
  pincode: {
    required: true,
  },
  grewUp: {
    required: true,
  },
  // birthCountry: {
  //   required: true,
  // },
  // birthCity: {
  //   required: true,
  // },
  // manglik: {
  //   required: true,
  // },
},
messages:
{
  profilecreatedby: {
    required: "This is required",
  },
  gender: {
    required: "Please select gender",
  },
  dateOfBirth: {
    required: "Please select date of birth",
  },
  height: {
    required: "Please select height",
  },
  maritalStatus: {
    required: "Please select martial status",
  },
  about: {
    required: "Please enter about",
  },
  // diet: {
  //   required: "Please select diet",
  // },
  // fatherStatus: {
  //   required: "Please select father status",
  // },
  // motherStatus: {
  //   required: "Please select mother status",
  // },
  // familyLocation: {
  //   required: "Please enter family location",
  // },
  // nativePlace: {
  //   required: "Please enter native place",
  // },
  // familyType: {
  //   required: "Please select family type",
  // },
  // bloodGroup: {
  //   required: "Please select blood group",
  // },
  highestQualification: {
    required: "Please select education",
  },
  workingWith: {
    required: "Please select working with",
  },
  workingAs: {
    required: "Please select working as",
  },
  employerName: {
    required: "Please enter employer name",
  },
  income: {
    required: "Please select income",
  },
  religion: {
    required: "Please select religion",
  },
  motherTongue: {
    required: "Please select mother tongue",
  },
  community: {
    required: "Please select community",
  },
  country: {
    required: "Please select country",
  },
  state: {
    required: "Please select state",
  },
  city: {
    required: "Please select city",
  },
  grewUp: {
    required: "Please select grew Up in",
  },
  pincode: {
    required: "Please enter pincode",
  },
  // birthCountry: {
  //   required: "Please select birth country",
  // },
  // birthCity: {
  //   required: "Please enter birth city",
  // },
  // manglik: {
  //   required: "This is required",
  // },
},
submitHandler: function (form)
{
  formSubmit(form);
}
});

// profile update

// partner update
$("#partnerPreferenceUpdate").validate({
  errorClass: "has-error",
highlight: function(element, errorClass) {
    //$(element).parents('.form-group').addClass(errorClass);
},
unhighlight: function(element, errorClass, validClass) {
  //  $(element).parents('.form-group').removeClass(errorClass);
},
rules:
{

 height: {
   required: true,
 },
 maritalStatus: {
   required: true,
 },
 // diet: {
 //   required: true,
 // },
 highestQualification: {
   required: true,
 },
 workingWith: {
   required: true,
 },
 workingAs: {
   required: true,
 },
 // income: {
 //   required: true,
 // },
 religion: {
   required: true,
 },
 motherTongue: {
   required: true,
 },
 community: {
   required: true,
 },
 country: {
   required: true,
 },
 state: {
   required: true,
 },
 city: {
   required: true,
 },
},
messages:
{
 height: {
   required: "Please select height",
 },
 maritalStatus: {
   required: "Please select martial status",
 },
 // diet: {
 //   required: "Please select diet",
 // },
 highestQualification: {
   required: "Please select education",
 },
 workingWith: {
   required: "Please select working with",
 },
 workingAs: {
   required: "Please select working as",
 },
 // income: {
 //   required: "Please select income",
 // },
 religion: {
   required: "Please select religion",
 },
 motherTongue: {
   required: "Please select mother tongue",
 },
 community: {
   required: "Please select community",
 },
 country: {
   required: "Please select country",
 },
 state: {
   required: "Please select state",
 },
 city: {
   required: "Please select city",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});

// partner update


// contact update

 $("#contactUpdate").validate({
   errorClass: "has-error",
 highlight: function(element, errorClass) {
     //$(element).parents('.form-group').addClass(errorClass);
 },
 unhighlight: function(element, errorClass, validClass) {
   //  $(element).parents('.form-group').removeClass(errorClass);
 },
rules:
{
  mobile: {
    required: true,
    number:true,
    minlength:10,
    maxlength:12,
  },
  nameContactPerson: {
    required: true,
    lettersonly:true,
  },
  relationWithMember: {
    required: true,
  },
},
messages:
{
  mobile: {
    required: "Please enter mobile number",
    minlength:"Must be a valid mobile number between 10 to 12 digits",
  maxlength:"Must be a valid mobile number between 10 to 12 digits",
  },
  nameContactPerson: {
    required: "This is required",
  },
  relationWithMember: {
    required: "This is required",
  },
},
submitHandler: function (form)
{
  formSubmit(form);
}
});

// contact update

// contact form validation
$("#contactform").validate({
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
 name: {
   required: true,
 },
 message: {
   required: true,
 },
},
messages:
{
 email: {
   required: "Please enter email address",
 },
 name: {
   required: "Please enter name",
 },
 message: {
   required: "Please enter message",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});
// contact form validation


  // back
 $('.cancel').click(function(){
		parent.history.back();
		return false;
	});

  // back

});
  // End jquery



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
      $(".preloader").css('display','block');
    },
    complete: function () {
      $(".preloader").css('display','none');
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
          form.reset();
         //$('.reset')[0].reset();
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
