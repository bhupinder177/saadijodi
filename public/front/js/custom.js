

jQuery(document).ready(function () {

var base_url = $('.base_url').val();

// dateofbirth
 $( function() {
  $('.dateofbirth').datepicker({
     dateFormat: 'dd-mm-yy',
     maxDate: 0,
     changeMonth: true,
     changeYear: true,
     // yearRange: "1950:2020"
     yearRange: "1950:"+(new Date().getFullYear()),
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



// delete record

    $('body').on('click','.removedocument',function(){
      var id = $(this).attr('data-id');
      var type = $(this).attr('data-type');
      var type1 = $(this).attr('data-typee');

       if(type1 == 1)
       {
         var counting = $('.rcshow span').length;

         if(counting == 1)
         {
          $('.rcerror').val('');
         }
       }
       else if(type == 2)
       {
         var counting1 = $('.insuranceshow span').length;
         if(counting1 == 1)
         {
          $('.insuranceerror').val('');
         }
      }
       else if(type == 3)
       {
         var counting2 = $('.licenceshow span').length;
         if(counting2 == 1)
         {
           $('.licencerror').val('');
        }
      }
      if(!id)
      {
        $('.doctype'+type).remove();
        $(this).remove();
         //location.reload();
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

    // tabs open and close
    $('body').on('click','.nav.nav-pills li a',function()
  {
    var h = $(this).attr('href');
     $('.nav.nav-pills li a').removeClass('active');
     $('.nav.nav-pills li a').removeClass('show');
     $(this).addClass('active');
     $(this).addClass('show');
      $('.tab-pane').addClass('d-none');
      $('.tab-pane').removeClass('fade');
      $('.tab-pane').removeClass('in');
      $('.tab-pane').removeClass('show');
      $(h).removeClass('d-none');
      $(h).addClass('fade');
      $(h).addClass('in');
      $(h).addClass('active');
      $(h).addClass('show');
  });
    // tabs open and close

    // ********************* Image read********************************
	$('body').on('change', '.profilechange', function()
  {
    readProfileURL(this);
  });
    // ********************* Image read********************************


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

    });
    // delete vehicle


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
       var taxi = response.taxi;

       var rows = '';

       var dates = new Date(Date.parse(gg.dateofbirth));
       var month = dates.getMonth();
       var day = dates.getDate();
       var year = dates.getFullYear();
        var date = ''+day+'-'+month+'-'+year;

     rows += '<p><b>First Name</b> : '+gg.firstName+' </p>';
     rows += '<p><b>Last Name</b> : '+gg.lastName+' </p>';
     rows += '<p><b>Email</b> : '+gg.email+' </p>';
     if(gg.badgeId)
     {
     rows += '<p><b>BadgeId</b> : '+gg.badgeId+' </p>';
     }
     if(gg.driver_info.taxiNumber)
     {
     rows += '<p><b>Taxi Number</b> : '+gg.driver_info.taxiNumber+' </p>';
     }
     if(gg.driver_info.accountId)
     {
     rows += '<p><b>AccountId</b> : '+gg.driver_info.accountId+' </p>';
     }

     if(gg.driver_info.driverImage)
     {
     rows += '<p><b>Profile Image</b> : <img height="100" width="100" src="'+base_url1+'/driver/'+gg.driver_info.driverImage+'"></p>';
     }

     $('.driverdetails').html(rows);
     $('#view').modal('show');
     }

   }
 });
});

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

    // *********************get states********************
// images
    $('body').on('change', '.multipleimageUpload', function(){
        $('#rc-error').remove();

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
     if (response.success)
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

});
// invite send



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
    r += '<span class="doctype1'+e.loaded+'"><img class="doctype1'+e.loaded+' docimg" height="50" width="50" src=' + e.target.result + '>';
   r += '<a data-typee="1" data-type="1'+e.loaded+'"  class="removedocument" ><i  class="fa fa-times" aria-hidden="true"></i></a></span>';
  $('.imagesshow').append(r);
};
