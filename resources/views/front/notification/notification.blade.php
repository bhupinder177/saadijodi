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
                    <td style="width:70%"><div class="card-title">{{ $n->notificationMessage }}</div></td>
                    <td style="width:30%">
                      <a  class="btn btn-primary view_n">View</a>
                      <a  class="btn btn-danger dismiss-notification">Dismiss</a>
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














        </div>

      </div>
    </div>
  </div>
</section>
@include('layouts.footer')
