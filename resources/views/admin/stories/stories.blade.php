
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
    <div class="page-content">
      <section class="content-header">
        <ol class="breadcrumb">
          <li class="active">Stories</li>
        </ol>
      </section>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

          </div>
          <div class="col-md-6">
            <div class="refer-btn">
                <a class="btn btn-rounded"  href="{{ url($prefix.'/stories-add')}}">Add Stories</a>
            </div>
         </div>
       </div>

            <div class="table-responsive table-sec">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%">S. No</th>
                            <th style="width: 10%">Image</th>
                            <th style="width: 8%">Description</th>
                            <th style="width: 8%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(count($users) != 0){

                        ?>
                          @foreach($users as $u)
                        <tr class="data">
                            <td>{{ ++$srNo }}</td>
                            <td><img src="{{ asset('stories/'.$u->image) }}" height="100" width="100" ></td>
                            <td>{{ $u->description }}</td>
                            <td >
                             <a href="{{url($prefix.'/stories-edit/'.Crypt::encrypt($u->id))}}"><i class="fa fa-edit"></i></a>
                             <a class="deleterecord" data-link="{{url($prefix.'/stories-delete')}}" data-id="{{ $u->id }}"><i class="fa fa-trash deleterecord"  data-link="{{url($prefix.'/stories-delete')}}"  data-id="{{ $u->id }}" aria-hidden="true"></i></a>
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
                                               <h5 class="messagetext">Are you sure to  delete this record?</h5>
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
