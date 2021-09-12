
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Home page</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/homeSave') }}" method="post" enctype="multipart/form-data" class="reset" id="homeUpdate">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Tagline <span class="red">*</span></label>
      <input type="text" placeholder="Please enter tagline" @if(!empty($result->title)) value="{{ $result->title }}" @endif class="form-control " name="title"   id="title">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Image<span class="red">*</span></label>
      <input type="file" placeholder="Please enter discount" class="form-control" name="image"   id="image">
        @if(!empty($result->image))<img src="{{ asset('home/'.$result->image) }}" height="100" width="100" >@endif
                          </div>
                      </div>

                    </div>


                 <div class="col-md-12">
                    <button type="submit" class="btn btn-rounded button-disabled" >Update</button>
                    <button type="button" class="cancel btn btn-rounded btn-default button-disabled" >Cancel</button>
                </div>

          </form>

      </div>
  </div>
  </div>






    @include('admin.layouts.footer')
