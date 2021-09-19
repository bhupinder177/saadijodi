

jQuery(document).ready(function () {

var base_url = $('.base_url').val();

// dateofbirth
 $( function() {
  $('.dateofbirth').datepicker({
     dateFormat: 'dd-mm-yy',
     minDate: new Date(1900,1-1,1), maxDate: '-18Y',
     defaultDate: new Date(1970,1-1,1),

     // maxDate: 0,
     //changeMonth: true,
     //changeYear: true,
     // yearRange: "1950:2020"
     //yearRange: "1950:"+(new Date().getFullYear()),
     changeMonth: true,
      changeYear: true,
      yearRange: '-110:-18',
     onSelect: function (e) {
        var id = $(this).attr('id');
         $('#'+id+'-error').html('');
       }
  });
 });
 //dateofbirth

setTimeout(function() {
 $('.alert').hide('fast');
}, 5000);
//user logout update
jQuery('body').on('keyup', '#email', function(){
 $('#email-error').html('');
});
// pagination




// delete record

    $('body').on('click','.removedocument',function(){
      var id = $(this).attr('data-id');
      var type = $(this).attr('data-type');
      var type1 = $(this).attr('data-typee');

      //  if(type1 == 1)
      //  {
      //    var counting = $('.rcshow span').length;
      //
      //    if(counting == 1)
      //    {
      //     $('.rcerror').val('');
      //    }
      //  }
      //  else if(type == 2)
      //  {
      //    var counting1 = $('.insuranceshow span').length;
      //    if(counting1 == 1)
      //    {
      //     $('.insuranceerror').val('');
      //    }
      // }
      //  else if(type == 3)
      //  {
      //    var counting2 = $('.licenceshow span').length;
      //    if(counting2 == 1)
      //    {
      //      $('.licencerror').val('');
      //   }
      // }
      if(!id)
      {
        $('.doctype'+type).remove();
        $('.removedocument'+id).remove();
      }
      else
      {
       $.ajax({
       type : 'POST',
       cache : false,
       url : base_url + '/deleteImages',
       data:{
         id:id
       },
       headers : {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       dataType: 'json',
       beforeSend  : function () {
         $(".button-disabled").attr("disabled", "disabled");
         $(".preloader").css('display','block');
       },
       complete: function () {
         $(".preloader").css('display','none');
           $(".button-disabled").attr("disabled",false);
       },
       success:function(response)
       {
         $('.docimg'+id).remove();
         $('.removedocument'+id).remove();
        //  location.reload();
       }
       });
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



    // ********************* Image read********************************
	$('body').on('change', '.profilechange', function()
  {
    readProfileURL(this);
  });
    // ********************* Image read********************************


    // delete vehicle from edit
    $('body').on('click','.notificationStatus',function(){

      var id = $(this).attr('data-id');
      var status = $(this).attr('data-status');
      $('.notificationId').val(id);
      $('.notificationStatus').val(status);
      if(status == 1)
      {
        var msg = "Are you sure want to accept this notification?";
      }
      else if(status == 2)
      {
        var msg = "Are you sure want to reject this notification?";
      }
      $('.messagetext').html(msg);
      $('#notificationconfirm').modal('show');

    });

    // delete driver
    $('body').on('click','.notificationUpdate',function(){

      var id = $('.notificationId').val();
      var status = $('.notificationStatus').val();
      var link = $('.notificationlink').val();

      $.ajax({
        dataType:'json',
        url :link,
        type :'post',
        data : {
          id:id,status:status
        },
        enctype : 'multipart/form-data',
       headers     : {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       beforeSend  : function () {
         $(".preloader").css('display','block');
       },
       complete: function () {
         $(".preloader").css('display','none');
       },

        success: function(response){

          $.toast().reset('all');
        var delayTime = 3000;
        if(response.delayTime)
        delayTime = response.delayTime;
        if (response.success)
        {
          if(status == 1)
          {
          $('.statustd'+id).html('<a class="btn btn-primary view_n">Accepted</a>')
          }
          else if(status == 2)
          {
            $('.statustd'+id).html('<a class="btn btn-danger dismiss-notification">Rejected</a>')
          }
           $('#notificationconfirm').modal('hide');
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

    // check package
    $('body').on('click','.chatRoomJoin',function(){

      var id = $(this).attr('data-id');


      $.ajax({
        dataType:'json',
        url :base_url+'/checkPackage',
        type :'post',
        data : {
          id:id
        },
        enctype : 'multipart/form-data',
       headers     : {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       beforeSend  : function () {
         $(".preloader").css('display','block');
       },
       complete: function () {
         $(".preloader").css('display','none');
       },

        success: function(response){

          $.toast().reset('all');
        var delayTime = 3000;
        if(response.delayTime)
        delayTime = response.delayTime;
        if (response.success == "true")
        {
          if(response.url)
          {
            if(response.delayTime)
            setTimeout(function() { window.location.href=response.url;}, response.delayTime);
            else
            window.location.href=response.url;
          }
        }
        else
        {
          $('#planalert').modal('show');
        }

        }
      });

    });

    // check package



// view driver

jQuery('body').on('change', '#country', function()
    {
      var id = $(this).val()
      $.ajax({
      type : 'POST',
      cache : false,
      url : base_url + '/getState',
      data : {countryId:id},
      headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      success:function(response){
      if(response.success == "true")
      {
        var  list ='';
      	list +='<option value="">Select State</option>';
      	$.each(response.result,function(key, value){
      	var id = value.id;
      	var name = value.name;
      	list +='<option data-text="'+name+'" value="'+id+'">'+name+'</option>';
      });

      $('#states').html(list);
      }
      }
      });
    });

    jQuery('body').on('change', '#states', function()
    {
      var id = $(this).val()
      $.ajax({
      type : 'POST',
      cache : false,
      url : base_url + '/getCity',
      data : {stateId:id},
      headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      success:function(response){
      if(response.success == "true")
      {
      var  list ='';
      	list +='<option value="">Select City</option>';
      	$.each(response.result,function(key, value){
      	var id = value.id;
      	var name = value.name;
      	list +='<option data-text="'+name+'" value="'+id+'">'+name+'</option>';
      });
      $('#cities').html(list);
      }
      }
      });
    });

    // applycoupon

    

    // *********************get states********************
// images
    $('body').on('change', '.multipleimageUpload', function(){



          var aa = true;
         if (this.files && this.files[0]) {
           for (var i = 0; i < this.files.length; i++) {
             var files = this.files;
             var type = files[0].type.split("/");
             if($.inArray(type[1], ['png','jpg','jpeg']) == -1)
             {
               aa = false;
             }
             else
             {
             var reader = new FileReader();
             reader.onload = rcURL;
             reader.readAsDataURL(this.files[i]);
              }
             }
            }

       });

// images

// invite send
$('body').on('click','.inviteUser',function(){
  var id = $(this).attr('data-id');

   $.ajax({
   type : 'POST',
   cache : false,
   url : base_url + '/inviteSend',
   data:{
     id:id
   },
   headers : {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },
   dataType: 'json',
   beforeSend  : function () {
     $(".button-disabled").attr("disabled", "disabled");
     $(".preloader").css('display','block');
   },
   complete: function () {
     $(".preloader").css('display','none');
       $(".button-disabled").attr("disabled",false);
   },
   success:function(response)
   {
     $.toast().reset('all');
     var delayTime = 3000;
     if (response.success == true)
        {
          $('.conect_nww'+id).addClass('d-none');
          $('.conect_nwwed'+id).removeClass('d-none');

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
        $('#planalert').modal('show');
        }

   }
   });

});
// invite send

// change country in filter
jQuery('body').on('change', '.countryChange', function()
    {
      var id = $(this).val()
      $.ajax({
      type : 'POST',
      cache : false,
      url : base_url + '/getState',
      data : {countryId:id},
      headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      success:function(response){
      if(response.success == "true")
      {
        var  list ='';
       list +='<option value="">Select State</option>';
       $.each(response.result,function(key, value){
       var id = value.id;
       var name = value.name;
       list +='<option data-text="'+name+'" value="'+id+'">'+name+'</option>';
      });
      $('.statefilter').removeClass('d-none');
      $('.stateChange').html(list);
      }
      }
      });
    });

    jQuery('body').on('change', '.stateChange', function()
    {
      var id = $(this).val()
      $.ajax({
      type : 'POST',
      cache : false,
      url : base_url + '/getCity',
      data : {stateId:id},
      headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'json',
      success:function(response){
      if(response.success == "true")
      {
      var  list ='';
       list +='<option value="">Select City</option>';
       $.each(response.result,function(key, value){
       var id = value.id;
       var name = value.name;
       list +='<option data-text="'+name+'" value="'+id+'">'+name+'</option>';
      });
      $('.cityfilter').removeClass('d-none');
      $('.cityChange').html(list);
      }
      }
      });
    });

// change country in filter



});

function online()
{
  var base_url = $('.base_url').val();

$.ajax({
 url :base_url+'/online',
 type : 'get',
 headers     : {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 },
 success: function(response){
		 ///console.log(response);
	 }
	 });
 }


setInterval('online()', 20000);
// setInterval('logout()', 20000);

 // *************** image read*************

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

 function readProfileURL(input)
 {
    if (input.files && input.files[0])
     {
        var reader = new FileReader();
        reader.onload = function (e)
         {
            $('.profileshow').attr('src', e.target.result);
            $('.profileshow').attr('height','50');
            $('.profileshow').attr('width','50');
         }
        reader.readAsDataURL(input.files[0]);
     }
 }

 function rcURL(e) {

   var r = '';
   var a = '';
   a = Math.floor(Math.random() * 6) + 1;
  r += '<span class="doctype1'+a+'"><img class="doctype1'+a+' docimg" height="50" width="50" src=' + e.target.result + '>';
   r += '<a data-typee="1" data-type="1'+a+'"  class="removedocument" ><i  class="fa fa-times" aria-hidden="true"></i></a></span>';
   console.log(r);
   $('.imagesshow').append(r);
};
