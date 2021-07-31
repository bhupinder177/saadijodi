
@include('layouts.header')

<!-- <div id="cometchat"></div> -->
<section class="chat_wrapp">
  <div class="container">
    <div class="row">

      <div class="col-md-4 chat">
        <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ui class="contacts">
                          @if(count($rooms) > 0)
                          @foreach($rooms as $key =>$room)
                          <!-- user show-->
                          @if($room->user->id == Auth::user()->id)
                           @php $unread = App\Helpers\GlobalFunctions::unreadmessage($room->oppositeUser->id,$room->roomId); @endphp
                           @php $image = App\Helpers\GlobalFunctions::getImage($room->oppositeUser->id); @endphp
                          <li class="person @if($key == 0) active @endif personli{{ $room->oppositeUser->id }}{{ $room->roomId }}" data-sender="{{ Auth::user()->id }}" data-room-key="{{ $key }}" data-receiver="{{ $room->oppositeUser->id }}" data-room="{{ $room->roomId}}">
                              <div class="d-flex bd-highlight">
                                  <div class="img_cont">
                                    @if(!empty($image))
                                    <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle user_img">
                                    @else
                                    <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img">
                                    @endif

                                      <span class="online_icon"></span>
                                  </div>
                                  <div class="user_info">
                                      <span>{{ $room->oppositeUser->firstName }}</span>
                                  </div>
                              </div>
                          </li>
                          @endif
                          <!-- user show -->

                           <!-- opposite user -->
                          @if($room->oppositeUser->id == Auth::user()->id)
                           @php $unread = App\Helpers\GlobalFunctions::unreadmessage($room->user->id,$room->roomId); @endphp
                           @php $image = App\Helpers\GlobalFunctions::getImage($room->user->id); @endphp

                          <li class="person @if($key == 0) active @endif personli{{ $room->user->id }}{{ $room->roomId }}" data-sender="{{ Auth::user()->id }}" data-room-key="{{ $key }}" data-receiver="{{ $room->user->id }}" data-room="{{ $room->roomId}}">
                              <div class="d-flex bd-highlight">
                                  <div class="img_cont">
                                    @if(!empty($image))
                                    <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle user_img">
                                    @else
                                    <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img">
                                    @endif

                                      <span class="online_icon"></span>
                                  </div>
                                  <div class="user_info">
                                      <span>{{ $room->user->firstName }}</span>
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
                        @endif
                        @if($rooms[0]->oppositeUser->id == Auth::user()->id)
                        @php $image = App\Helpers\GlobalFunctions::getImage($rooms[0]->user->id); @endphp
                        @if(!empty($image))
                        <img src="{{ asset('profiles/'.$image->image) }}" class="rounded-circle chatwithimage user_img">
                        @else
                        <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle chatwithimage user_img">
                        @endif
                        <span class="online_icon"></span>
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

                  <div class="action_menu">
                      <ul>
                          <li><i class="fa fa-user-circle"></i> View profile</li>
                          <li><i class="fa fa-users"></i> Add to close friends</li>
                          <li><i class="fa fa-plus"></i> Add to group</li>
                          <li><i class="fa fa-ban"></i> Block</li>
                      </ul>
                  </div>
              </div>

              <div class="card-body msg_card_body @if(count($rooms) > 0) msg_card_body{{ $rooms[0]->roomId }} @endif">
                  @if(count($messages) > 0)
                  @foreach($messages as $m)
                  @if($m->userId == Auth::user()->id)

                  <div class="d-flex justify-content-end mb-4">
                      <div class="msg_cotainer_send">
                          {{ $m->message }}
                          <span class="msg_time_send">{{ $a = date('h:i A',strtotime($timezone, strtotime($m->created_at))) }}, {{ $z = date('d M, Y',strtotime($m->created_at)) }}</span>
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
                 <div class="d-flex justify-content-start mb-4">
                     <div class="img_cont_msg">
                       @if(!empty($profile1))
                       <img src="{{ asset('profiles/'.$profile1->image) }}" class="rounded-circle user_img_msg">
                       @else
                       <img src="{{ asset('front/images/_D.jpg') }}" class="rounded-circle user_img_msg">
                       @endif
                     </div>
                     <div class="msg_cotainer">
                         {{ $m->message }}
                         <span class="msg_time">{{ $a = date('h:i A',strtotime($timezone, strtotime($m->created_at))) }}, {{ $z = date('d M, Y',strtotime($m->created_at)) }}</span>
                     </div>
                 </div>
                 @endif
                  @endforeach
                  @endif


              </div>
             @if(count($rooms) > 0)
              <div class="card-footer">
                <form class="write chatinputForm" action="">
                  <div class="input-group">
                      <div class="input-group-append">
                          <span class="input-group-text attach_btn"><i class="fa fa-paperclip"></i></span>
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
              @else
              <div class="nochat">No Chat</div>
              @endif


          </div>
      </div>

    </div>
  </div>
</section>
@if(count($rooms) > 0)
<script>
var messagesId = "{{$messagesId ?? ''}}";
var host = '{{ env('SOCKET_HOST') }}';
var port = '{{ env('SOCKET_PORT') }}';
var user = '{{ Auth::user()->firstName }}';
var SITE_URL = '{{ URL::to('/') }}';
var roomIdd =  '{{ isset($rooms[0])?$rooms[0]->roomId:'' }}';
@if ($rooms[0]->user->id == Auth::user()->id)
var sender =  '{{ isset($rooms[0])?$rooms[0]->user->id:'' }}';
var receiver =  '{{ isset($rooms[0])?$rooms[0]->oppositeUser->id:'' }}';
@else
var receiver =  '{{ isset($rooms[0])?$rooms[0]->user->id:'' }}';
var sender =  '{{ isset($rooms[0])?$rooms[0]->oppositeUser->id:'' }}';
@endif
</script>
@endif
@include('layouts.footer')
