
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Add Mother Tongue</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/mothertongueSave') }}" method="post" enctype="multipart/form-data" class="reset" id="addreligions">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Mother Tongue <span class="red">*</span></label>
      <input type="text" placeholder="Please enter mother tongue" class="form-control " name="name"   id="name">
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
