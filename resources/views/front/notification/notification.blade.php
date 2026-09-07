@include('layouts.header')

<style>
  /* ===================== Notifications (shared .ep-* system) ===================== */
  .ep-notif{
    --pink:#e5006d; --violet:#7b2ff7; --navy:#14213d;
    --ink:#2b3040; --muted:#8b93a7; --line:#e7eaf3; --field:#f6f7fb; --bg:#eef1f8;
    background:var(--bg); padding:38px 0 66px; font-family:'Poppins',sans-serif; color:var(--ink);
  }
  .ep-notif *{box-sizing:border-box;}
  .ep-notif .ep-container{max-width:860px;margin:0 auto;padding:0 16px;}

  .ep-notif-head{text-align:center;margin-bottom:26px;}
  .ep-notif-head h2{margin:0;font-size:26px;font-weight:700;color:var(--navy);}
  .ep-notif-head p{margin:6px 0 0;font-size:13px;color:var(--muted);}

  .ep-notif-list{display:flex;flex-direction:column;gap:14px;}
  .ep-notif-card{display:flex;align-items:center;gap:14px;background:#fff;border:1px solid var(--line);
    border-radius:14px;padding:16px 18px;box-shadow:0 8px 24px rgba(20,33,61,.05);transition:box-shadow .15s;}
  .ep-notif-card:hover{box-shadow:0 12px 30px rgba(20,33,61,.09);}
  .ep-notif-card.is-unread{border-color:#ffd0e5;background:#fff8fb;}

  .ep-notif-ic{width:42px;height:42px;flex:none;border-radius:12px;display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,var(--pink),var(--violet));color:#fff;font-size:17px;}
  .ep-notif-ic.type-2{background:linear-gradient(135deg,#16a34a,#3dd68c);}

  .ep-notif-body{flex:1;min-width:0;}
  .ep-notif-msg{font-size:13.5px;color:var(--ink);line-height:1.5;}
  .ep-notif-msg a{color:var(--pink);font-weight:600;text-decoration:none;}
  .ep-notif-msg a:hover{text-decoration:underline;}
  .ep-notif-meta{font-size:11.5px;color:var(--muted);margin-top:3px;}
  .ep-notif-meta .dot{display:inline-block;width:6px;height:6px;border-radius:50%;background:var(--pink);margin-right:6px;vertical-align:middle;}

  .ep-notif-actions{display:flex;gap:8px;flex:none;}
  .ep-notif .ep-notif-actions .btn,
  .ep-notif .ep-notif-actions a.view_n,
  .ep-notif .ep-notif-actions a.dismiss-notification{
    border:none;border-radius:9px;padding:8px 16px;font-size:12.5px;font-weight:600;cursor:pointer;line-height:1;text-decoration:none;}
  .ep-notif .ep-notif-actions .btn-primary,
  .ep-notif .ep-notif-actions a.view_n{background:linear-gradient(90deg,var(--pink),var(--violet));color:#fff;box-shadow:0 6px 16px rgba(123,47,247,.25);}
  .ep-notif .ep-notif-actions .btn-danger,
  .ep-notif .ep-notif-actions a.dismiss-notification{background:#fff;color:#e11d48;border:1px solid #f6c6d2;box-shadow:none;}
  .ep-notif .ep-notif-actions a.view_n,
  .ep-notif .ep-notif-actions a.dismiss-notification{pointer-events:none;opacity:.85;}

  .ep-notif-empty{text-align:center;background:#fff;border:1px dashed var(--line);border-radius:14px;padding:44px 20px;color:var(--muted);}
  .ep-notif-empty .fa{font-size:34px;color:#c9cede;margin-bottom:12px;}
  .ep-notif-empty p{margin:0;font-size:14px;font-weight:600;color:var(--navy);}

  .ep-notif .pagination{display:flex;justify-content:center;gap:6px;list-style:none;padding:0;margin:26px 0 0;flex-wrap:wrap;}
  .ep-notif .pagination .page-link{display:block;min-width:38px;text-align:center;padding:8px 11px;
    border:1px solid var(--line);border-radius:9px;background:#fff;color:#5a6076;font-size:13px;text-decoration:none;}
  .ep-notif .pagination .page-link:hover{border-color:var(--pink);color:var(--pink);}
  .ep-notif .pagination .page-item.active .page-link{background:linear-gradient(90deg,var(--pink),var(--violet));border-color:transparent;color:#fff;}
  .ep-notif .pagination .page-item.disabled .page-link{opacity:.5;}

  @media (max-width:600px){
    .ep-notif-card{flex-wrap:wrap;}
    .ep-notif-actions{width:100%;}
    .ep-notif .ep-notif-actions .btn,.ep-notif .ep-notif-actions a{flex:1;text-align:center;}
  }
</style>

<section class="ep-notif">
  <div class="ep-container">

    <div class="ep-notif-head">
      <h2>My Notifications</h2>
      <p>Invitations and updates from members interested in your profile</p>
    </div>

    @if(count($notification))
    <div class="ep-notif-list">
      @foreach($notification as $n)
      <div class="ep-notif-card notification-invitation @if($n->read == 0) is-unread @endif">
        <div class="ep-notif-ic @if($n->type == 2) type-2 @endif">
          <i class="fa @if($n->type == 1) fa-user-plus @elseif($n->type == 2) fa-check @else fa-bell @endif"></i>
        </div>

        <div class="ep-notif-body">
          <div class="ep-notif-msg">
            {{ $n->notificationMessage }}
            @if(!empty($n->userdetail))
            From <a href="{{URL::to('/user-profile/'.$n->userdetail->uniqueId)}}">{{ $n->userdetail->firstName }} {{ $n->userdetail->lastName }}</a>
            @endif
          </div>
          <div class="ep-notif-meta">
            @if($n->read == 0)<span class="dot"></span>@endif
            @if(!empty($n->date)){{ \Carbon\Carbon::parse($n->date)->diffForHumans() }}@endif
          </div>
        </div>

        <div class="ep-notif-actions statustd{{ $n->id }}">
          @if($n->type == 1)
            @if($n->status == 0)
            <a data-id="{{ $n->id }}" data-status="1" class="notificationStatus notificationStatus{{ $n->id }} btn btn-primary view_n" style="pointer-events:auto;opacity:1;">Accept</a>
            <a data-id="{{ $n->id }}" data-status="2" class="notificationStatus notificationStatus{{ $n->id }} btn btn-danger dismiss-notification" style="pointer-events:auto;opacity:1;">Reject</a>
            @elseif($n->status == 1)
            <a class="btn btn-primary view_n">Accepted</a>
            @elseif($n->status == 2)
            <a class="btn btn-danger dismiss-notification">Rejected</a>
            @endif
          @endif
        </div>
      </div>
      @endforeach
    </div>

    <div class="ep-pagination">{{ $notification->links('pagination::bootstrap-4') }}</div>
    @else
    <div class="ep-notif-empty">
      <i class="fa fa-bell-o"></i>
      <p>No notifications yet</p>
    </div>
    @endif

    <!-- confirm modal -->
    <div id="notificationconfirm" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body driverdetails">
            <h5 class="messagetext"></h5>
            <input type="hidden" value="" name="id" class="notificationId">
            <input type="hidden" value="" name="status" class="notificationStatus">
            <input type="hidden" value="{{URL::to('/notificationUpdate/')}}" name="link" class="notificationlink">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success notificationUpdate">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <!-- confirm modal -->

  </div>
</section>

@include('layouts.footer')
