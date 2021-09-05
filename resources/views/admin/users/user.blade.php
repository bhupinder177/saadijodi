
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
    <div class="page-content">
      <section class="content-header">
        <ol class="breadcrumb">
          <li class="active">Users</li>
        </ol>
      </section>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <form action="{{URL::to($prefix.'/userlist')}}" method="get">
                <div class="row">
            <div class="col-md-7">
              <div class="form-group">
            <input class="form-control search" placeholder="Search" type="text">
            <input type="hidden" class="searchpagelink" value="{{URL::to($prefix.'/userlist')}}">
              </div>
            </div>
            <div class="col-3 col-md-2">
              <div class="form-group">
            <input class="btn btn-success searchbtn" value="Search" type="submit">
              </div>
            </div>
            <div class="col-3 col-md-2">
              <div class="form-group">
            <a class="btn btn-success getreset" value="Reset" data-href="{{ url($prefix.'/userlist') }}">Reset</a>
              </div>
            </div>
           </div>
          </form>
          </div>

       </div>

            <div class="table-responsive table-sec">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">S. No</th>
                            <th style="width: 10%">First Name</th>
                            <th style="width: 10%">Last Name</th>
                            <th style="width: 10%">Email</th>
                            <th style="width: 12%">Status</th>
                            <th style="width: 5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(count($users) != 0){

                        ?>
                          @foreach($users as $u)
                        <tr class="data">
                            <td>{{ ++$srNo }}</td>
                            <td>{{ $u->firstName }}</td>
                            <td>{{ $u->lastName }}</td>
                            <td>{{ $u->email }} </td>


                            <td>
                              <div class="form-group">
                              <select data-id="{{ $u->id }}" class="form-control ownerStatuschange">
                                <option value="">Select Status</option>
                                <option data-id="{{ $u->id }}" @if($u->status == 1) selected @endif   value="1">Active</option>
                                <option data-id="{{ $u->id }}" @if($u->status == 0) selected @endif  value="0">InActive</option>
                              </select>
                            </div>
                            </td>
                            <td>
                              <a class="sendCoupon" data-name="{{ $u->firstName }}" data-id="{{ $u->id }}"><i  data-id="{{ $u->id }}" class="sendCoupon fa fa-gift"></i> </a>
                            </td>

                        </tr>
                        @endforeach
                            <?php
                          }
                          else {?>
                            <tr><td colspan="8"><center>No Record Found</center></td></tr>
                          <?php }?>

                    </tbody>
                </table>
                <div class="pagination1">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- view modal -->
                 <div id="view" class="modal fade" role="dialog">
               <div class="modal-dialog">
                 <div class="modal-content">
                   <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"> Driver Details</h4>
                   </div>
                   <div class="modal-body driverdetails">
                        </div>

                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                   </div>
                 </div>

               </div>
             </div>
                 <!-- view modal -->

                 <!-- confirm modal -->
                              <div id="confirm" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Status</h4>
                                </div>
                                <div class="modal-body driverdetails">
                                  <h5 class="messagetext"></h5>
                                  <input type="hidden" value="" name="id" class="userId">
                                  <input type="hidden" value="" name="status" class="userstatus">
                                     </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success updatestatus" >Confirm</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                              </div>

                            </div>
                          </div>
                              <!-- confirm modal -->



                              <!-- coupon modal -->
                                           <div id="couponSendUser" class="modal fade" role="dialog">
                                             <form class="reset" action="{{URL::to($prefix.'/sendCoupon')}}" id="couponuser" method="post">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                 <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 <h4 class="modal-title coupontitle">Send Coupon</h4>
                                                </div>
                                             <div class="modal-body driverdetails">
                                            <div class="form-group">
                                              <label>Coupon</label>
                                              <select name="coupon" class="form-control">
                                                <option value="">Select Coupon</option>
                                                @if(!empty($allcoupon))
                                                @foreach($allcoupon as $c)
                                                <option value="{{ $c->id }}">{{ $c->coupon }}</option>
                                                @endforeach
                                                @endif
                                              </select>
                                            </div>
                                               <input type="hidden" value="" name="id" class="couponuserId">
                                              </div>

                                             <div class="modal-footer">
                                               <button type="submit" class="btn btn-success " >Submit</button>

                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                             </div>
                                           </div>

                                         </div>
                                       </form>
                                       </div>
                                           <!-- confirm modal -->





    @include('admin.layouts.footer')
