
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Add Stories</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/storiesSave') }}" method="post" enctype="multipart/form-data" class="reset" id="addstories">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Image <span class="red">*</span></label>
      <input type="file"  class="form-control " name="image"   id="image">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
      <textarea type="text" placeholder="Please enter description" class="form-control " name="description"   id="description"></textarea>
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
