<?php
  // echo "<pre>";
  // print_r($rooms->toArray());
  // die;

 ?>
@include('layouts.header')

<!-- <div id="cometchat"></div> -->
<div class="ChatSection">
  <div class="container clearfix">
    <div class="chatData">
    <div class="people-list" id="people-list">

      <ul class="list">

        @if(count($rooms) > 0)
        @foreach($rooms as $key =>$room)
        @if($room->driverId == Auth::user()->id)
        @php $unread = App\Helpers\GlobalFunctions::unreadmessage($room->customer->id,$room->roomId); @endphp

        <li class="clearfix person @if($key == 0) active @endif chat-div personli{{ $room->customer->id }}{{ $room->roomId }}" data-sender="{{ Auth::user()->id }}" data-room-key="{{ $key }}" data-receiver="{{ $room->customer->id }}" data-room="{{ $room->roomId}}">
          @if($room->customer->image)
          <img src="{{ asset('profileimages/'.$room->customer->image) }}" alt="avatar" />
          @else
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
          @endif
          <div class="about">
            <div class="name"> {{ ucwords($room->customer->firstName) }} {{ $room->customer->lastName }}</div>
            @if(!empty($room->post))
            <div class="status">{{ ucwords($room->post->from) }} To {{ ucwords($room->post->destination) }}</div>
            @endif
            @if(!empty($room->postrequest))
            <div class="status">{{ ucwords($room->postrequest->origin) }} To {{ ucwords($room->postrequest->destination) }}</div>
            @endif

            <span class="@if($unread == 0) d-none @endif unread{{ $room->customer->id }}{{ $room->roomId }} msg_count unread">{{ $unread }}</span>

            <!-- <div class="status">
              <i class="fa fa-circle online"></i> online
            </div> -->
          </div>
        </li>
        @endif
        @if($room->customerId == Auth::user()->id)
        @php $unread = App\Helpers\GlobalFunctions::unreadmessage($room->driver->id,$room->roomId); @endphp

        <li class="clearfix person @if($key == 0) active @endif chat-div personli{{ $room->driver->id }}{{ $room->roomId }}"  data-sender="{{ Auth::user()->id }}" data-room-key="{{ $key }}" data-receiver="{{ $room->driver->id }}" data-room="{{ $room->roomId}}">
          @if($room->driver->image)
          <img src="{{ asset('profileimages/'.$room->driver->image) }}" alt="avatar" />
          @else
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
          @endif
          <div class="about">
            <div class="name"> {{ ucwords($room->driver->firstName) }}  {{ $room->driver->lastName }}</div>
            @if(!empty($room->post))
            <div class="status">{{ ucwords($room->post->from) }} To {{ ucwords($room->post->destination) }}</div>
            @endif
            @if(!empty($room->postrequest))
            <div class="status">{{ ucwords($room->postrequest->origin) }} To {{ ucwords($room->postrequest->destination) }}</div>
            @endif
            <span class="@if($unread == 0) d-none @endif unread{{ $room->driver->id }}{{ $room->roomId }} msg_count unread">{{ $unread }}</span>
            <!-- <div class="status">
              <i class="fa fa-circle online"></i> online
            </div> -->
          </div>
        </li>
        @endif

        @endforeach
        @endif







      </ul>
    </div>

    <div class="chat chatmaindiv">
      <div class="chat_wrap1">
            @if(count($rooms) > 0)

      <div class="chat-header clearfix">


          @if($rooms[0]->driverId == Auth::user()->id)
          @if(!empty($rooms[0]->customer->image))
          <img src="{{ asset('profileimages/'.$rooms[0]->customer->image) }}" alt="avatar" />
          @else
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
          @endif
        <div class="chat-about chat-active chat-active{{ $rooms[0]->roomId }}" data-room="{{ $rooms[0]->roomId }}" data-offset="{{ $offset }}" data-sendername="{{ $rooms[0]->driver->firstName }} {{ $rooms[0]->driver->lastName }}" data-receivername="{{ $rooms[0]->customer->firstName }} {{ $rooms[0]->customer->lastName }}" data-receiver="{{ $rooms[0]->customer->id }}" data-sender="{{ $rooms[0]->driver->id }}">
          <div class="chat-with">{{ ucwords($rooms[0]->customer->firstName) }} {{ $rooms[0]->customer->lastName }}</div>
          @if(!empty($rooms[0]->post))
          <div class="chat-with">{{ ucwords($rooms[0]->post->from) }} To {{ ucwords($rooms[0]->post->destination) }}</div>
          @endif
          @if(!empty($rooms[0]->postrequest))
          @if($rooms[0]->postrequest->userId == $rooms[0]->customer->id)
          @php $price = App\Helpers\GlobalFunctions::getOnenotification($rooms[0]->driver->id,$rooms[0]->postrequest->id); @endphp
          @endif
          @if($rooms[0]->postrequest->userId != $rooms[0]->driver->id)
          @php $price = App\Helpers\GlobalFunctions::getOnenotification($rooms[0]->customer->id,$rooms[0]->postrequest->id); @endphp
          @endif

          <div class="chat-with">{{ ucwords($rooms[0]->postrequest->origin) }} To {{ ucwords($rooms[0]->postrequest->destination) }} @if(!empty($price)), Price:<span>{{ $rooms[0]->postrequest->postcountry->currencySymbol }} {{ $rooms[0]->postrequest->postcountry->currencyCode }}</span>@endif <span class="updatedprice">{{ $price->price }}</span>@if($rooms[0]->postrequest->userId != Auth::user()->id)
            @if($rooms[0]->postrequest->status != 1)<a class="editrequestprice" data-id="{{ $price->id }}"><i class="fa fa-edit"></i></a> @endif @endif</div>
          @endif
        </div>
        @endif
        @if($rooms[0]->customerId == Auth::user()->id)

        @if(!empty($rooms[0]->driver->image))

        <img src="{{ asset('profileimages/'.$rooms[0]->driver->image) }}" alt="avatar" />
        @else
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg" alt="avatar" />
        @endif
        <div class="chat-about chat-active chat-active{{ $rooms[0]->roomId }}" data-room="{{ $rooms[0]->roomId }}" data-offset="{{ $offset }}" data-sendername="{{ $rooms[0]->customer->firstName }} {{ $rooms[0]->customer->lastName }}" data-receivername="{{ $rooms[0]->driver->firstName }} {{ $rooms[0]->driver->lastName }}" data-receiver="{{ $rooms[0]->driver->id }}" data-sender="{{ $rooms[0]->customer->id }}">
          <div class="chat-with">{{ $rooms[0]->driver->firstName ?? '' }} {{ $rooms[0]->driver->lastName ?? ''  }}</div>
          @if(!empty($rooms[0]->post))
          <div class="chat-with">{{ ucwords($rooms[0]->post->from) }} To {{ ucwords($rooms[0]->post->destination) }}</div>
          @endif

          @if(!empty($rooms[0]->postrequest))
          @if($rooms[0]->postrequest->userId == $rooms[0]->customer->id)
          @php $price = App\Helpers\GlobalFunctions::getOnenotification($rooms[0]->driver->id,$rooms[0]->postrequest->id); @endphp
          @endif
          @if($rooms[0]->postrequest->userId != $rooms[0]->driver->id)
          @php $price = App\Helpers\GlobalFunctions::getOnenotification($rooms[0]->customer->id,$rooms[0]->postrequest->id); @endphp
          @endif
          <?php print_r($price);die; ?>
          <div class="chat-with">{{ ucwords($rooms[0]->postrequest->origin) }} To {{ ucwords($rooms[0]->postrequest->destination) }} @if(!empty($price)), Price:@if(!empty($rooms[0]->postrequest->postcountry))<span>{{ $rooms[0]->postrequest->postcountry->currencySymbol }} {{ $rooms[0]->postrequest->postcountry->currencyCode }}</span>@endif <span class="updatedprice">{{ $price->price }}</span>@if($rooms[0]->postrequest->userId != Auth::user()->id)
            @if($rooms[0]->postrequest->status != 1)<a class="editrequestprice" data-id="{{ $price->id }}"><i class="fa fa-edit"></i></a>@endif @endif @endif</div>
          @endif
        </div>
        @endif

      </div> <!-- end chat-header -->
      @endif

      <!-- start chat-history -->
      <div class="chat-history chat_wrap">

        <ul class="chathistoryul @if(count($rooms) > 0)chathistoryul{{ $rooms[0]->roomId }} @endif">

          @if(count($messages) > 0)
          @foreach($messages as $message)
          <li class="clearfix new {{ $message->id }} message-scroll" data-mes="{{ $message->id }}">
            <div class="message-data @if($message->userId == Auth::user()->id)align-right @else text-left @endif ">
              <span class="message-data-time" >{{ $a = date('h:i A',strtotime($timezone, strtotime($message->created_at))) }}</span> &nbsp; &nbsp;
              <span class="message-data-name" >{{ $message->user->firstName }} {{ $message->user->lastName }}</span> <i class="fa fa-circle me"></i>
            </div>
            <div class="message @if($message->userId == Auth::user()->id)other-message float-right @else my-message  @endif ">
             {{ $message->message }}
            </div>
          </li>
          @endforeach
          @endif
          @if(count($rooms) == 0)
          <center><h4>No chats</h4></center>
          @endif

          <!-- <li>
            <div class="message-data text-left">
              <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
              <span class="message-data-time">10:12 AM, Today</span>
            </div>
            <div class="message my-message">
              Are we meeting today? Project has been already finished and I have results to show you.
            </div>
          </li> -->

        </ul>

      </div>
     </div>
      <!-- end chat-history -->
      @if(count($rooms) > 0)
     <form class="write chatinputForm" action="">
      <div class="chat-message clearfix">
        <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
        <input type="hidden" value="{{ Auth::user()->firstName }}" id="handle">
        <input type="hidden" value="{{ Auth::user()->id }}" name="sender" >
        <button>Send</button>
        <div class="bubble you d-none @if(count($rooms) > 0) typing{{ $rooms[0]->roomId }} @endif ">
              <div class="typing-loader"></div>
          </div>
      </div> <!-- end chat-message -->
    </form>

    @endif


    </div> <!-- end chat -->

  </div> <!-- end container -->
</div>


<!-- price update popup -->
<div id="priceconfirm" class="modal fade" role="dialog">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Price</h4>
                   </div>
                   <div class="modal-body">
                     <form>
                     <div class="form-group">
                       <label>Price</label>
                       <input type="text" name="price" class="numberonly chatpostRequestPrice form-control">
                     </div>
                     <input type="hidden" value="" name="postRequestId" class="chatpostrequestId">
                   </form>
                        </div>

                   <div class="modal-footer">
                     <button type="button" class="btn btn-success chatrequestPriceUpdate" >Update</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                   </div>
                 </div>

               </div>
             </div>
<!-- price update popup -->


</div>
@if(count($rooms) > 0)
<script>
var messagesId = "{{$messagesId ?? ''}}";
var host = '{{ env('SOCKET_HOST') }}';
var port = '{{ env('SOCKET_PORT') }}';
var user = '{{ Auth::user()->firstName }}';
var SITE_URL = '{{ URL::to('/') }}';
var roomIdd =  '{{ isset($rooms[0])?$rooms[0]->roomId:'' }}';
@if ($rooms[0]->driver->id == Auth::user()->id)
var sender =  '{{ isset($rooms[0])?$rooms[0]->driver->id:'' }}';
var receiver =  '{{ isset($rooms[0])?$rooms[0]->customer->id:'' }}';
@else
var receiver =  '{{ isset($rooms[0])?$rooms[0]->driver->id:'' }}';
var sender =  '{{ isset($rooms[0])?$rooms[0]->customer->id:'' }}';
@endif
</script>
@endif
@include('layouts.footer')
