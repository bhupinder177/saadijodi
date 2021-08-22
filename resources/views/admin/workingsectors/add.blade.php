
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Add Working Sectors</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/workingsectorsSave') }}" method="post" enctype="multipart/form-data" class="reset" id="addreligions">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Working Sectors <span class="red">*</span></label>
      <input type="text" placeholder="Please enter working sector" class="form-control " name="name"   id="name">
                          </div>
                      </div>



                    </div>


                 <div class="col-md-12">
                    <button type="submit" class="btn btn-rounded button-disabled" >Save</button>
                    <button type="button" class="cancel btn btn-rounded btn-default button-disabled" >Cancel</button>
                </div>

          </form>

      </div>
  </div>
  </div>






    @include('admin.layouts.footer')
