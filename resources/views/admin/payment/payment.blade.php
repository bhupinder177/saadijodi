
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
    <div class="page-content">
      <section class="content-header">
        <ol class="breadcrumb">
          <li class="active">Payments</li>
        </ol>
      </section>

        <div class="container-fluid">


            <div class="table-responsive table-sec">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">S. No</th>
                            <th style="width: 10%">User Name</th>
                            <th style="width: 5%">Amount($)</th>
                            <th style="width: 5%">Coupon Amount</th>
                            <th style="width: 10%">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(count($users) != 0){

                        ?>
                          @foreach($users as $u)
                        <tr class="data">
                            <td>{{ ++$srNo }}</td>
                            <td>{{ $u->user->firstName.' '.$u->user->lastName }}</td>
                            <td>{{ $u->amount }}</td>
                            <td>{{ $u->coupon }}</td>
                            <td>{{ date('d-m-Y',strtotime($u->created_at)) }}</td>

                        </tr>
                        @endforeach
                            <?php
                          }
                          else {?>
                            <tr><td colspan="4"><center>No Record Found</center></td></tr>
                          <?php }?>

                    </tbody>
                </table>
                <div class="pagination1">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>




                              <!-- delete confirm modal -->
                                           <div id="deleteconfirm" class="modal fade" role="dialog">
                                         <div class="modal-dialog">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                               <h4 class="modal-title">Delete</h4>
                                             </div>
                                             <div class="modal-body driverdetails">
                                               <h5 class="messagetext">Are you sure to  delete this record ?</h5>
                                               <input type="hidden" value="" name="id" class="deleteId">
                                               <input type="hidden" value="" name="link" class="deletelink">
                                                  </div>

                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-success datadelete" >Delete</button>
                                               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                             </div>
                                           </div>

                                         </div>
                                       </div>
                                           <!-- delete confirm modal -->



    @include('admin.layouts.footer')
