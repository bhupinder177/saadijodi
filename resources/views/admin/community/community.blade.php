
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
    <div class="page-content">
      <section class="content-header">
        <ol class="breadcrumb">
          <li class="active">Community</li>
        </ol>
      </section>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <form action="{{URL::to('/community')}}" method="get">
                <div class="row">
            <div class="col-md-7">
              <div class="form-group">
            <input class="form-control search" placeholder="Search" type="text">
            <input type="hidden" class="searchpagelink" value="{{URL::to($prefix.'/community')}}">
              </div>
            </div>
            <div class="col-3 col-md-2">
              <div class="form-group">
            <input class="btn btn-success searchbtn" value="Search" type="submit">
              </div>
            </div>
            <div class="col-3 col-md-2">
              <div class="form-group">
            <a class="btn btn-success getreset" value="Reset" data-href="{{ url($prefix.'/community') }}">Reset</a>
              </div>
            </div>
           </div>
          </form>
          </div>
          <div class="col-md-6">
            <div class="refer-btn">
                <a class="btn btn-rounded"  href="{{ url($prefix.'/community-add')}}">Add community</a>
            </div>
         </div>
       </div>

            <div class="table-responsive table-sec">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">S. No</th>
                            <th style="width: 10%">Community</th>
                            <th style="width: 8%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(count($users) != 0){

                        ?>
                          @foreach($users as $u)
                        <tr class="data">
                            <td>{{ ++$srNo }}</td>
                            <td>{{ $u->name }}</td>

                            <td >
                              @if(count($u->religiondetail) == 0)
                             <a href="{{url($prefix.'/community-edit/'.Crypt::encrypt($u->id))}}"><i class="fa fa-edit"></i></a>
                             <a class="deleterecord" data-link="{{url($prefix.'/community-delete')}}" data-id="{{ $u->id }}"><i class="fa fa-trash deleterecord"  data-link="{{url($prefix.'/community-delete')}}"  data-id="{{ $u->id }}" aria-hidden="true"></i></a>
                             @endif
                             </td>
                        </tr>
                        @endforeach
                            <?php
                          }
                          else {?>
                            <tr><td colspan="3"><center>No Record Found</center></td></tr>
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
