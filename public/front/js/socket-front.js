$(function () {
  // var dybSocket = location.protocol+'//'+host+':'+port+'';
  var dybSocket = location.protocol+'//'+host+':'+port+'';
  // var socket = io('http://127.0.0.1:3000');
 //var socket = io(dybSocket);
  var socket = io('https://app.saadijodi.com');

  /*************************** chat**********************/
  // chat submit
  socket.on('updatechat', function (room, senderId, receiver, data) {
    $('.typing'+room).addClass('d-none');
    var dataMessage = data;
  //  var senderId = $('.chat-active'+room).attr('data-sender');
  //  var sendername = $('.chat-active'+room).attr('data-sendername');
    ///var receivername = $('.chat-active'+room).attr('data-receivername');
    let data_offset = parseInt($('.chat-active').attr('data-offset'));
      data_offset += 1;
    $('.chat-active').attr('data-offset',data_offset);

    if(senderId == sender)
    {

      // let enq_id = $('#enq_room_list').find('li.active').attr('data-enq-id');
      $.ajax({
        url: SITE_URL + '/saveChat',
        type: "post",
        data: {
          'message': data,
          'roomId' : room,
          'receiver' : receiver,
          'userId' : sender
        },
        headers     : {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        success: function (data) {
          var row = '';
          row +='<div class="d-flex justify-content-end mb-4">';
          row +='<div class="msg_cotainer_send">'+dataMessage+'<span class="msg_time_send">'+data.time+'</span></div>';
          row +='<div class="img_cont_msg"><img src="'+data.image+'" class="rounded-circle user_img_msg">';
          row +='</div></div>';

          $('.msg_card_body'+room).append(row);
          $(".msg_card_body").animate({ scrollTop: $(".msg_card_body")[0].scrollHeight}, 1000);

        },
        error: function (data) {
          console.log(data, error);
        }
      });
    }
    else if(senderId != sender)
    {
      $.ajax({
        url: SITE_URL + '/gettime',
        type: "post",
        data: {
          'userId' : sender
        },
        headers     : {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        success: function (data) {
      var row ='';
      row +='<div class="d-flex justify-content-start mb-4">';
      row +='<div class="img_cont_msg"><img src="'+data.image+'" class="rounded-circle user_img_msg"></div>';
      row +='<div class="msg_cotainer">'+dataMessage+'<span class="msg_time">'+data.time+'</span></div></div>';
      $('.msg_card_body'+room).append(row);
      $(".msg_card_body").animate({ scrollTop: $(".msg_card_body")[0].scrollHeight}, 1000);

    },
    error: function (data) {
      console.log(data, error);
       }
     });
    }


  });

  // show new message alert on inactive user screen
  socket.on('allusermessage', function(room, sender, receiver, data) {
    // var senderId = $('.typing'+room).parents('.chat-div').attr('data-sender');
    // var receiverId = $('.typing'+room).parents('.chat-div').attr('data-receiver');
    // var roomIdd = $('.typing'+room).parents('.chat-active').attr('data-room');
    var senderId = $('.chat-div').attr('data-sender');
    var receiverId = $('.chat-div').attr('data-receiver');
    var roomIdd = $('.chat-active').attr('data-room');
    // console.log(senderId);
    // console.log(receiverId);
    // console.log(roomIdd);
    // console.log(sender+' sender '+senderId+' '+receiver+' receiver '+receiverId);
    // var ko = isOnScreen( jQuery( '#tab15-tab' ) );console.log('hjjjjj '+ko);
    if(($('.personli'+receiverId).hasClass('active') != true) && (receiver == senderId))
    {
      var currentCount = $.trim($('.personli'+receiverId+room).find('.msg_count').html());
      if(currentCount == '')
      currentCount = 0;
      else
      currentCount = currentCount;
      $('.personli'+receiverId+room).parent().prepend($('.personli'+receiverId+room).clone(true,true));
      // $('.personli'+receiverId+room).addClass('un-read-message');

      $('.unread'+receiverId+room).removeClass('d-none');
      // $('.personli'+receiverId+room).find('.msg_count').html(parseInt(currentCount)+1);
      $('.unread'+receiverId+room).html(parseInt(currentCount)+1);
      $('.personli'+receiverId+room).last().remove();
      // $('.msg_badge').html(parseInt($('.msg_badge').html())+1);
      // setTimeout(function(){
      //   $.getScript(SITE_URL+"/js/chat-plugin.js");
      // },500);
    }
    if(($('.personli'+receiverId+room).hasClass('active') == true) && (receiver == senderId))
    {
      //$('.personli'+receiverId+room).trigger('click');
    }
  });


// readMessage
$(document).on('click', '.chathistoryul,.chatinputForm', function () {
var room = $('.chat-active').attr('data-room');
var receiver = $('.chat-active').attr('data-receiver');
var currentCount = $.trim($('.unread'+receiver+room).html());
var count = parseInt(currentCount);
if(count)
{
$.ajax({
  url: SITE_URL + '/readmessage',
  type: "post",
  data: {
    'roomId' : room,
    'receiver' : receiver,
  },
  headers     : {
 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  success: function (data) {
    if(data.success == "true")
    {
    $('.unread'+receiver+room).html('');
    $('.unread'+receiver+room).addClass('d-none');
    }
  },
  error: function (data) {
    console.log(data, error);
     }
  });
  }
})
// readMessage

  // typing event
  socket.on('showtyping', function(room,sender){
    var senderId = $('.typing'+room).parents('.chat-div').attr('data-sender');
    var receiverId = $('.typing'+room).parents('.chat-div').attr('data-receiver');
    if(senderId != sender)
    $('.typing'+room).removeClass('d-none');

    setTimeout(function(){
      let ele2 = $('.chat_wrap[data-room-id="'+room+'"]');
      ele2.animate({ scrollTop: ele2.prop('scrollHeight')}, 1000);
      $('.typing'+room).addClass('d-none');
    },3500);
    return false;
  });

  // set user
  if(roomIdd)
  {
    $(".msg_card_body").animate({ scrollTop: $(".msg_card_body")[0].scrollHeight}, 1000);
    socket.emit('switchRoom', roomIdd);
    socket.emit('adduser', roomIdd, sender, receiver);
  }

  // click event on chat person
  $(document).on('click', '.person', function (event) {
    var sender = $(this).attr('data-sender');
    var receiver = $(this).attr('data-receiver');
    var room = $(this).attr('data-room');
    var room_key = $(this).attr('data-room-key');
    $(this).removeClass('un-read-message');
    $('.person').removeClass('active');
    $(this).addClass('active');
    $(this).find('.msg_count').html('');
    $('.left-mobile').hide();
    $('.right-mobile').show();
    socket.emit('switchRoom', room);
    socket.emit('adduser', room, sender, receiver);
    $('.unread'+receiver+room).addClass('d-none');
    $('.msg_card_body').addClass('msg_card_body'+room);

    $(document).find('#message-to-send').val('');
    $.ajax({
      url: SITE_URL + '/getlatesthistory',
      type: "post",
      data: {
        'data_room' : room,
        'sender' : receiver,
      },
      headers     : {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
      success: function (data) {

        let ele = $(document).find('.msg_card_body');
        ele.html(data.rhtml);
        ele.attr('data-offset', '10');
        $(".chatWith").text('Chat with '+data.user);
        $(".chatwithimage").data('src',data.image);
        $(".msg_card_body").animate({ scrollTop: $(".msg_card_body")[0].scrollHeight}, 1000);
        ele.animate({ scrollTop: ele.prop("scrollHeight")}, 1000);
      },
      error: function (data) {
        console.log(data);
      }
    });
  });

  // send message with enter
  $(document).on('submit', '.chatinputForm', function (event) {

    if($('#message-to-send').val() != '')
    {

      var roomId = $('.active-chat').attr('data-room');
      event.preventDefault();
      socket.emit('sendchat', $('#message-to-send').val());
      $('#message-to-send').val('');
    }
    return false;
  });

  $(document).on('keypress',function(e) {
    if(e.which == 13) {
      if($('#message-to-send').val() != '')
      {
        var roomId = $('.active-chat').attr('data-room');
        event.preventDefault();
        socket.emit('sendchat', $('#message-to-send').val());
        $('#message-to-send').val('');
      }
      return false;
    }
});

  // keyup on text input
  $(document).on('keyup', '#message-to-send', function () {

    var sender = $('.chat-active').attr('data-sender');
    var roomId = $('.chat-active').attr('data-room');
    socket.emit('showtyping',roomId,sender);
  });

  // get preview message on scroll up
  $('.chat_wrap').scroll(function () {
    let className = $('.chathistoryul li:first-child').attr('data-mes');
    if($(this).scrollTop() < 1) {


      let ele = $(this);
      let data_offset = parseInt($('.chat-active').attr('data-offset'));
      let data_room = $('.chat-active').attr('data-room');
      $.ajax({
        url: SITE_URL + '/getoldMessage',
        type: "post",
        data: {
          'data_offset': data_offset,
          'data_room' : data_room,
        },
        headers     : {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
        success: function (data)
        {
          $('.chathistoryul'+data_room).prepend(data.rhtml);
          data_offset += 10;
          console.log(data_offset);
          $('.chat-active').attr('data-offset',data_offset);
          isOnScreen(ele,className);
        },
        error: function (data) {
          console.log(data);
        }
      });

    }
  })

  $('.btn-back').on('click', function(){
    $('.right-mobile').hide();
    $('.left-mobile').show();
  })
  if ($(window).width() < 767) {
    // console.log($(window).width());
    $('#left-chat').addClass('left-mobile');
    $('#right-panel').addClass('right-mobile');
  } else {
    // console.log($(window).width());
    $('#left-chat').removeClass('left-mobile');
    $('#right-panel').removeClass('right-mobile');
  }

  function scrollset()
  {
    $(".chat_wrap").scrollTop( $(".chat_wrap").height() );
  }

  function isOnScreen(elem,className) {
    //console.log(elem);
    //console.log("ssss fdfddffdfdfddfdffddf");
    // if the element doesn't exist, abort
     $(window).scrollTop($(this).scrollTop());
   $( ".chat_wrap .message-scroll[data-mes='"+className+"']")[0].scrollIntoView();return false
    // if( elem.length == 0 ) {
    //   return;
    // }
    // var $window = jQuery(window)
    // var viewport_top = $window.scrollTop()
    // var viewport_height = $window.height()
    // var viewport_bottom = viewport_top + viewport_height
    // var $elem = jQuery(elem)
    // var top = elem.offset().top;
    // var height = elem.height();
    // var bottom = top + height;
    // return (top >= viewport_top && top < viewport_bottom) ||
    // (bottom > viewport_top && bottom <= viewport_bottom) ||
    // (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
  }
});
