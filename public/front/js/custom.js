

jQuery(document).ready(function () {

var base_url = $('.base_url').val();

setTimeout(function() {
 $('.alert').hide('fast');
}, 5000);
//user logout update
jQuery('body').on('keyup', '#email', function(){
 $('#email-error').html('');
});
// pagination
jQuery('body').on('click', '.pagination a', function(){
//jQuery('.pagination li.active').removeClass('active');
//jQuery(this).parent('li').addClass('active');
var page = jQuery(this).attr('href').split('page=')[1];
var pageUrl = jQuery(this).attr('href');
var search = jQuery('.search').val();
var type = jQuery('.sorttype').val();
var sort = jQuery('.sortby').val();
var perpage = jQuery('.perpage').val();

$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:page,search:search,type:type,sort:sort,perpage:perpage},
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


// perpage
jQuery('body').on('change', '.perpage', function(){
var page = 1;
var pageUrl = jQuery('.searchpagelink').val();
var perpage = jQuery(this).val();
var search = jQuery('.search').val();

$.ajax({
type : 'GET',
cache : false,
url : pageUrl,
data : {page:page,perpage:perpage,search:search},
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

// perpage change



// vehicle sorting
jQuery('body').on('click', '.taxinumberSorting', function(){
var sort = jQuery(this).attr('data-id');
var type = jQuery(this).attr('data-type');
var search = jQuery('.search').val();
var link = jQuery('.searchpagelink').val();

$.ajax({
type : 'GET',
cache : false,
url : link,
data : {type:type,sort:sort,search:search},
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

// vehicle sorting

// user status change
$('body').on('change','.companyStatuschange',function(){

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

// user status change

// user logout
$('body').on('click','.logoutUser',function(){

  var id = $(this).attr('data-id');
  $('.userId').val(id);

  $('#logoutconfirm').modal('show');

});

// user logout

$('body').on('click','.updateslogout',function(){

  var id = $('.userId').val();


  $.ajax({
    url :base_url +'/userlogoutUpdate',
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
      $('#logoutconfirm').modal('hide');



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

});


// user status change
$('body').on('click','.updatestatus',function(){


  var id = $('.userId').val();
  var status = $('.userstatus').val();
  if(status != '')
  {
  $.ajax({
    url :base_url +'/userStatusUpdate',
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
// user status change


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

 function logout()
 {
   var base_url = $('.base_url').val();

 $.ajax({
   dataType:'json',
  url :base_url+'/checkLogout',
  type : 'get',
  headers     : {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(response)
   {
 		 if(response.success)
     {
       if(response.result.logout == 1)
       {
         $("#logout-form").submit();

       }
     }
 	 }
 	 });
  }

// setInterval('online()', 20000);
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
            $('.showprofile').attr('src', e.target.result);
            $('.showprofile').attr('height','100');
            $('.showprofile').attr('width','100');
         }
        reader.readAsDataURL(input.files[0]);
     }
 }
