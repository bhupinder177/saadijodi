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
