
@include('layouts.header')

<style>
  /* ===================== Chat — light / pink retheme (markup unchanged) ===================== */
  .chat_wrapp{
    --pink:#e5006d; --violet:#7b2ff7; --navy:#14213d; --muted:#8b93a7;
    --line:#e7eaf3; --field:#f6f7fb;
    background:#eef1f8 !important; padding:34px 0 56px !important; font-family:'Poppins',sans-serif;
  }
  .chat_wrapp .card{
    height:560px !important; border:1px solid var(--line) !important; border-radius:16px !important;
    background-color:#fff !important; box-shadow:0 12px 34px rgba(20,33,61,.07) !important; overflow:hidden;
  }
  .chat_wrapp .card-header,
  .chat_wrapp .card-footer{background:#fff !important; border-color:var(--line) !important;}
  .chat_wrapp .card-header.msg_head{border-bottom:1px solid var(--line) !important; padding:14px 18px;}
  .chat_wrapp .card-footer{border-top:1px solid var(--line) !important; padding:12px 14px;}
  .chat_wrapp .contacts_body{padding:10px !important;}

  /* Contacts list */
  .chat_wrapp .contacts li{padding:10px 12px; margin-bottom:6px !important; border-radius:12px; cursor:pointer; transition:background .15s;}
  .chat_wrapp .contacts li:hover{background:var(--field);}
  .chat_wrapp .active,
  .chat_wrapp .contacts li.active{background:linear-gradient(90deg,rgba(229,0,109,.12),rgba(123,47,247,.12)) !important;}
  .chat_wrapp .user_img{height:52px; width:52px; border:2px solid #fff; box-shadow:0 2px 8px rgba(20,33,61,.12);}
  .chat_wrapp .img_cont{height:52px; width:52px;}
  .chat_wrapp .user_info{margin-left:12px;}
  .chat_wrapp .user_info span{font-size:15px; font-weight:600; color:var(--navy);}
  .chat_wrapp .user_info span.msg_count{display:inline-flex; align-items:center; justify-content:center;
    min-width:20px; height:20px; padding:0 6px; margin-left:8px; font-size:11px; font-weight:700; color:#fff;
    background:var(--pink); border-radius:20px;}
  .chat_wrapp .chatWith{font-size:16px; font-weight:700; color:var(--navy);}

  /* Presence dots */
  .chat_wrapp .online_icon{height:13px; width:13px; background-color:#22c55e; bottom:0; right:2px; border:2px solid #fff;}
  .chat_wrapp .offline_icon{position:absolute; height:13px; width:13px; background-color:#c2c8d4;
    border-radius:50%; bottom:0; right:2px; border:2px solid #fff;}

  /* Message area */
  .chat_wrapp .msg_card_body{padding:20px 18px; background:#f8f9fc;}
  .chat_wrapp .user_img_msg{height:34px; width:34px; border:2px solid #fff; box-shadow:0 2px 6px rgba(20,33,61,.12);}
  .chat_wrapp .img_cont_msg{height:34px; width:34px;}
  .chat_wrapp .msg_cotainer{margin-left:10px; border-radius:14px 14px 14px 4px; background:#fff;
    border:1px solid var(--line); color:var(--navy); padding:10px 13px; font-size:13.5px; max-width:70%; box-shadow:0 3px 10px rgba(20,33,61,.05);}
  .chat_wrapp .msg_cotainer_send{margin-right:10px; border-radius:14px 14px 4px 14px;
    background:linear-gradient(135deg,var(--pink),var(--violet)); color:#fff; padding:10px 13px; font-size:13.5px; max-width:70%;
    box-shadow:0 6px 16px rgba(123,47,247,.22);}
  .chat_wrapp .msg_time,
  .chat_wrapp .msg_time_send{color:var(--muted); font-size:10.5px;}
  .chat_wrapp .nochat{text-align:center; color:var(--muted); font-size:14px; font-weight:600; padding:60px 0;}

  /* Composer */
  .chat_wrapp .type_msg{background-color:var(--field) !important; border:1px solid var(--line) !important;
    color:var(--navy) !important; border-radius:12px !important; height:48px !important; resize:none;}
  .chat_wrapp .type_msg:focus{background:#fff !important; border-color:var(--pink) !important; box-shadow:0 0 0 3px rgba(229,0,109,.12) !important;}
  .chat_wrapp .type_msg::placeholder{color:var(--muted);}
  .chat_wrapp .chatinputForm .input-group{gap:10px; align-items:center; flex-wrap:nowrap;}
  .chat_wrapp .send_btn{border-radius:12px !important; background:linear-gradient(135deg,var(--pink),var(--violet)) !important;
    border:0 !important; color:#fff !important; width:48px; height:48px; display:flex; align-items:center; justify-content:center;
    box-shadow:0 8px 18px rgba(123,47,247,.28);}

  /* Header action menu */
  .chat_wrapp #action_menu_btn{color:var(--muted); font-size:18px;}
  .chat_wrapp #action_menu_btn:hover{color:var(--pink);}
  .chat_wrapp .action_menu{background:#fff; color:var(--navy); border:1px solid var(--line);
    box-shadow:0 12px 30px rgba(20,33,61,.15); border-radius:12px; padding:8px 0;}
  .chat_wrapp .action_menu ul li{padding:9px 16px; font-size:13px;}
  .chat_wrapp .action_menu ul li a{color:var(--navy); text-decoration:none;}
  .chat_wrapp .action_menu ul li i{color:var(--pink);}
  .chat_wrapp .action_menu ul li:hover{background:var(--field);}

  /* Scrollbars */
  .chat_wrapp .msg_card_body::-webkit-scrollbar,
  .chat_wrapp .contacts_body::-webkit-scrollbar{width:7px;}
  .chat_wrapp .msg_card_body::-webkit-scrollbar-thumb,
  .chat_wrapp .contacts_body::-webkit-scrollbar-thumb{background:#d4d9e6; border-radius:20px;}

  @media (max-width:767px){
    .chat_wrapp .card{height:auto !important; min-height:420px;}
  }
</style>

<!-- <div id="cometchat"></div> -->
<section class="chat_wrapp">
  <div class="container">
    <div class="row">

      <div class="col-md-4 chat">
        <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <!-- <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div> -->
                    <div class="card-body contacts_body">
                        <ui class="contacts">
                          @if(count($rooms) > 0)

                          @foreach($rooms as $key =>$room)
                          <!-- user show-->
                          @if($room->user->id == Auth::user()->id)
                           @php $unread = App\Helpers\GlobalFunctions::unreadmessage($room->oppositeUser->id,$room->roomId); @endphp
                           @php $image = App\Helpers\GlobalFunctions::getImage($room->oppositeUser->id); @endphp
                          <li class="person @if($key == 0) active @endif chat-div personli{{ $room->oppositeUser->id }}{{ $room->roomId }}" data-sender="{{ Auth::user()->id }}" data-room-key="{{ $key }}" data-receiver="{{ $room->oppositeUser->id }}" data-uniqueid="{{ $room->oppositeUser->uniqueId }}" data-room="{{ $room->roomId}}">
                              <div class="d-flex bd-highlight">
                                  <div class="img_cont">
                                    @if(!empty($image))
                                    <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle user_img">
                                    @else
                                    <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img">
                                    @endif
                                    @php
                                    $date = Date('Y-m-d H:i:s');
                                    $time = 0;
                                    @endphp
                                    <?php if(isset($room->oppositeUser->online))
                                      {
                                      $time = strtotime($date) - strtotime($room->oppositeUser->online->date);
                                      }
                                      else
                                      {
                                      $time = 22;
                                      }
                                      ?>
                                    @if($time > 20)
                                    <span class="offline_icon"></span>
                                    @else
                                    <span class="online_icon"></span>
                                    @endif
                                  </div>
                                  <div class="user_info">
                                      <span>{{ $room->oppositeUser->firstName }}</span>
                                        <span class="@if($unread == 0) d-none @endif unread{{ $room->oppositeUser->id }}{{ $room->roomId }} msg_count unread">{{ $unread }}</span>
                                  </div>
                              </div>
                          </li>
                          @endif
                          <!-- user show -->

                           <!-- opposite user -->
                          @if($room->oppositeUser->id == Auth::user()->id)
                           @php $unread = App\Helpers\GlobalFunctions::unreadmessage($room->user->id,$room->roomId); @endphp
                           @php $image = App\Helpers\GlobalFunctions::getImage($room->user->id); @endphp

                          <li class="person @if($key == 0) active @endif chat-div personli{{ $room->user->id }}{{ $room->roomId }}" data-sender="{{ Auth::user()->id }}" data-room-key="{{ $key }}" data-receiver="{{ $room->user->id }}" data-uniqueid="{{ $room->user->uniqueId }}" data-room="{{ $room->roomId}}">
                              <div class="d-flex bd-highlight">
                                  <div class="img_cont">
                                    @if(!empty($image))
                                    <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle user_img">
                                    @else
                                    <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img">
                                    @endif
                                    @php
                                    $date = Date('Y-m-d H:i:s');
                                    $time = 0;
                                    @endphp
                                  <?php if(isset($room->user->online))
                                    {
                                    $time = strtotime($date) - strtotime($room->user->online->date);
                                    }
                                    else
                                    {
                                    $time = 22;
                                    }
                                    ?>
                                    @if($time > 20)
                                    <span class="offline_icon"></span>
                                    @else
                                    <span class="online_icon"></span>
                                    @endif

                                      <span class="online_icon"></span>
                                  </div>
                                  <div class="user_info">
                                      <span>{{ $room->user->firstName }}</span>
                                      <span class="@if($unread == 0) d-none @endif unread{{ $room->user->id }}{{ $room->roomId }} msg_count unread">{{ $unread }}</span>

                                  </div>
                              </div>
                          </li>
                         @endif
                         <!-- opposite user -->

                          @endforeach
                          @endif

                        </ui>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <div class="col-md-8 chat">
          <div class="card">

              <div class="card-header msg_head">
                  <div class="d-flex bd-highlight">
                      <div class="img_cont">
                        @if(count($rooms) > 0)
                        @if($rooms[0]->user->id == Auth::user()->id)
                        @php $image = App\Helpers\GlobalFunctions::getImage($rooms[0]->oppositeUser->id); @endphp
                        @if(!empty($image))
                        <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle chatwithimage user_img">
                        @else
                        <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle chatwithimage user_img">
                        @endif
                        @php
                        $date = Date('Y-m-d H:i:s');
                        $time2 = 0;
                        @endphp
                        <?php if(isset($rooms[0]->oppositeUser->online))
                          {
                          $time2 = strtotime($date) - strtotime($rooms[0]->oppositeUser->online->date);
                          }
                          else
                          {
                          $time2 = 22;
                          }
                          ?>
                        @if($time2 > 20)
                        <span class="offline_icon"></span>
                        @else
                        <span class="online_icon"></span>
                        @endif
                        @endif
                        @if($rooms[0]->oppositeUser->id == Auth::user()->id)
                        @php $image = App\Helpers\GlobalFunctions::getImage($rooms[0]->user->id); @endphp
                        @if(!empty($image))
                        <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle chatwithimage user_img">
                        @else
                        <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle chatwithimage user_img">
                        @endif
                        @php
                        $date = Date('Y-m-d H:i:s');
                        $time1 = 0;
                        @endphp
                        <?php if(isset($rooms[0]->user->online))
                          {
                          $time1 = strtotime($date) - strtotime($rooms[0]->user->online->date);
                          }
                          else
                          {
                          $time1 = 22;
                          }
                          ?>
                        @if($time1 > 20)
                        <span class="offline_icon"></span>
                        @else
                        <span class="online_icon"></span>
                        @endif
                        @endif
                        @endif
                      </div>
                      @if(count($rooms) > 0)
                      <div class="user_info">
                          <span class="chatWith">Chat with @if(count($rooms) > 0) @if($rooms[0]->user->id == Auth::user()->id) {{ $rooms[0]->oppositeUser->firstName }} @endif @if($rooms[0]->oppositeUser->id == Auth::user()->id) {{ $rooms[0]->user->firstName }} @endif @endif</span>
                      </div>
                      @endif
                  </div>

                  <span id="action_menu_btn"><i class="fa fa-ellipsis-v"></i></span>

                  @php
                    $partnerUniqueId = '';
                    if(count($rooms) > 0){
                      $partnerUniqueId = ($rooms[0]->user->id == Auth::user()->id) ? $rooms[0]->oppositeUser->uniqueId : $rooms[0]->user->uniqueId;
                    }
                  @endphp
                  <div class="action_menu">
                      <ul>
                          <li><a class="viewProfileLink" href="{{ $partnerUniqueId ? URL::to('/user-profile/'.$partnerUniqueId) : '#' }}" target="_blank" rel="noopener"><i class="fa fa-user-circle"></i> View profile</a></li>
                          <li><i class="fa fa-ban"></i> Block</li>
                      </ul>
                  </div>
              </div>

              <div class="card-body msg_card_body chat-active @if(count($rooms) > 0) msg_card_body{{ $rooms[0]->roomId }} @endif" data-offset="{{ $offset }}" @if(count($rooms) > 0) @if($rooms[0]->oppositeUser->id == Auth::user()->id) data-receiver="{{ $rooms[0]->user->id }}" @endif @if($rooms[0]->user->id == Auth::user()->id) data-receiver="{{ $rooms[0]->oppositeUser->id }}" @endif @endif data-room="@if(count($rooms) > 0){{ $rooms[0]->roomId }}@endif">
                  @if(count($messages) > 0)
                  @foreach($messages as $m)
                  @if($m->userId == Auth::user()->id)

                  <div class="d-flex justify-content-end mb-4" data-mes="{{ $m->id }}">
                      <div class="msg_cotainer_send">
                          {{ $m->message }}
                          <span class="msg_time_send">{{ optional($m->created_at)->format('h:i A') }}, {{ optional($m->created_at)->format('d M, Y') }}</span>
                      </div>
                      <div class="img_cont_msg">
                        @php $profile = App\Helpers\GlobalFunctions::getImage($m->userId); @endphp

                        @if(!empty($profile))
                        <img src="{{ asset('profiles/'.$profile->image) }}" class="rounded-circle user_img_msg">
                        @else
                        <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img_msg">
                        @endif
                      </div>
                  </div>

                  @endif
                 @if($m->userId != Auth::user()->id)
                 @php $profile1 = App\Helpers\GlobalFunctions::getImage($m->userId); @endphp
                 <div class="d-flex justify-content-start mb-4" data-mes="{{ $m->id }}">
                     <div class="img_cont_msg">
                       @if(!empty($profile1))
                       <img src="{{ asset('profiles/'.$profile1->image) }}" class="rounded-circle user_img_msg">
                       @else
                       <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img_msg">
                       @endif
                     </div>
                     <div class="msg_cotainer">
                         {{ $m->message }}
                         <span class="msg_time">{{ optional($m->created_at)->format('h:i A') }}, {{ optional($m->created_at)->format('d M, Y') }}</span>
                     </div>
                 </div>
                 @endif
                  @endforeach
                  @else
                  <div class="nochat">No Chat</div>
                  @endif


              </div>
             @if(count($rooms) > 0)
              <div class="card-footer">
                <form class="write chatinputForm" action="">
                  <div class="input-group">
                      <div class="input-group-append">
                          <!-- <span for="uploadimage" class="input-group-text attach_btn"><i class="fa fa-paperclip"></i></span>
                          <input type="file" id="uploadimage" class="uploadimge"> -->
                      </div>
                      <textarea name="message-to-send" id="message-to-send" class="form-control type_msg" placeholder="Type your message..."></textarea>
                      <input type="hidden" value="{{ Auth::user()->firstName }}" id="handle">
                      <input type="hidden" value="{{ Auth::user()->id }}" name="sender" >
                      <div class="input-group-append">
                        <button type="submit" class="input-group-text send_btn"><i class="fa fa-location-arrow"></i></button>
                      </div>
                  </div>
                </form>
              </div>

              @endif


          </div>
      </div>

    </div>
  </div>
</section>
<script>
var messagesId = "{{$messagesId ?? ''}}";
var host = '{{ env('SOCKET_HOST') }}';
var port = '{{ env('SOCKET_PORT') }}';
var user = '{{ Auth::user()->firstName }}';
var SITE_URL = '{{ URL::to('/') }}';
var roomIdd = '';
var sender = '{{ Auth::user()->id }}';
var receiver = '';
@if(count($rooms) > 0)
roomIdd = '{{ $rooms[0]->roomId }}';
@if ($rooms[0]->user->id == Auth::user()->id)
sender = '{{ $rooms[0]->user->id }}';
receiver = '{{ $rooms[0]->oppositeUser->id }}';
@else
receiver = '{{ $rooms[0]->user->id }}';
sender = '{{ $rooms[0]->oppositeUser->id }}';
@endif
@endif
</script>
@include('layouts.footer')
