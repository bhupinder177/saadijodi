@if(count($messages) > 0)
@foreach($messages as $m)
@if($m->userId == Auth::user()->id)

<div class="d-flex justify-content-end mb-4" data-mes="{{ $m->id }}">
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
       <span class="msg_time">{{ $a = date('h:i A',strtotime($timezone, strtotime($m->created_at))) }}, {{ $z = date('d M, Y',strtotime($m->created_at)) }}</span>
   </div>
</div>
@endif
@endforeach
@endif
