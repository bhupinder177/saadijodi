
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Edit Package</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/packages-update') }}" method="post" enctype="multipart/form-data" class="reset" id="addpackage">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Name <span class="red">*</span></label>
      <input type="text" placeholder="Please enter name" value="{{ $result->name }}" class="form-control characteronly" name="name"   id="name">
      <input type="hidden" value="{{Crypt::encrypt($result->id)}}" name="id">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Price($) <span class="red">*</span></label>
      <input type="text" placeholder="Please enter price" value="{{ $result->price }}" class="form-control" name="price"   id="price">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Connects <span class="red">*</span></label>
      <input type="text" placeholder="Please enter connects" value="{{ $result->connects }}" class="form-control" name="connects"   id="connects">
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Chat Available <span class="red">*</span></label>
      <select  class="form-control" name="chat"   id="chat">
        <option value="">Select Chat</option>
        <option @if($result->chat == 1) selected @endif value="1">Yes</option>
        <option @if($result->chat == 2) selected @endif value="2">No</option>
      </select>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Phone Display <span class="red">*</span></label>
      <select  class="form-control" name="phoneNumberDisplay"   id="phoneNumberDisplay">
        <option value="">Select </option>
        <option @if($result->phoneNumberDisplay == 1) selected @endif value="1">Yes</option>
        <option @if($result->phoneNumberDisplay == 2) selected @endif value="2">No</option>
      </select>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Duration <span class="red">*</span></label>
      <select  class="form-control" name="duration"   id="duration">
        <option value="">Select </option>
        <option @if($result->duration == 1) selected @endif value="1">1 Month</option>
        <option @if($result->duration == 2) selected @endif value="2">2 Month</option>
        <option @if($result->duration == 3) selected @endif value="3">3 Month</option>
        <option @if($result->duration == 4) selected @endif value="4">6 Month</option>
        <option @if($result->duration == 5) selected @endif value="5">12 Month</option>
        <option @if($result->duration == 6) selected @endif value="6">Life Time</option>
      </select>
                          </div>
                      </div>

                      <div class="col-sm-12">
                          <div class="form-group">
                            <label>Description <span class="red">*</span></label>
                    <textarea type="text" placeholder="Please enter description" class="form-control" name="description"   id="description">{{ $result->description }}</textarea>
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
<!-- ///ddasdd -->





    @include('admin.layouts.footer')
