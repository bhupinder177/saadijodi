
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Edit Story</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/stories-update') }}" method="post" enctype="multipart/form-data" class="reset" id="updatestories">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Image <span class="red">*</span></label>
      <input type="file"  class="form-control " name="image"   id="image">
      <img src="{{ asset('stories/'.$result->image) }}" height="100" width="100" >
        <input type="hidden" name="id" value="{{Crypt::encrypt($result->id)}}">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
      <textarea type="text" placeholder="Please enter description" class="form-control " name="description"   id="description">{{ $result->description }}</textarea>
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
<!-- ///ddasdd -->





    @include('admin.layouts.footer')
