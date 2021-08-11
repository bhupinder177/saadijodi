@include('layouts.header')

<section class="notification_wrapp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="notification_prnt">
          <h2 class="text-center">My Notifications</h2>



            @if(count($notification))
            @foreach($notification as $n)
            <div class="notification-card notification-invitation">
              <div class="card_body_td">
                <table>
                  <tr>
                    <td style="width:70%"><div class="card-title">{{ $n->notificationMessage }} From <a href="{{URL::to('/user-profile/'.$n->userdetail->uniqueId)}}">{{ $n->userdetail->firstName }} {{ $n->userdetail->lastName }}</a></div></td>
                    <td style="width:30%" class="statustd{{ $n->id }}">
                      @if($n->type == 1)
                      @if($n->status == 0)
                      <a data-id="{{ $n->id }}" data-status="1" class="notificationStatus notificationStatus{{ $n->id }} btn btn-primary view_n">Accept</a>
                      <a data-id="{{ $n->id }}" data-status="2" class="notificationStatus notificationStatus{{ $n->id }} btn btn-danger dismiss-notification">Reject</a>
                      @endif
                      @if($n->status == 1)
                      <a  class="btn btn-primary view_n">Accepted</a>
                      @endif
                      @if($n->status == 2)
                      <a  class="btn btn-danger dismiss-notification">Rejected</a>
                      @endif
                      @endif

                    </td>
                  </tr>
                </table>
              </div>
            </div>
            @endforeach
            @else
            <div class="notification-card notification-invitation">
              <div class="card_body_td">
                <table>
                  <tr>
                    <td style="width:100%"><div class="card-title">No Notification</div></td>

                  </tr>
                </table>
              </div>
            </div>
            @endif
            <div class="pagination">{{ $notification->links() }}</div>



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
                             <button type="button" class="btn btn-success notificationUpdate" >Confirm</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                           </div>
                         </div>

                       </div>
                     </div>
                         <!-- confirm modal -->










        </div>

      </div>
    </div>
  </div>
</section>
@include('layouts.footer')
