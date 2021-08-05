
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Country:{{ $country->name }} Add State</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/stateSave') }}" method="post" enctype="multipart/form-data" class="reset" id="addstate">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>State <span class="red">*</span></label>
      <input type="text" placeholder="Please enter state" class="form-control " name="name"   id="name">
      <input type="hidden" name="country_id" value="{{ $country->id }}">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Timezone <span class="red">*</span></label>
      <input type="text" placeholder="Please enter timezone" class="form-control " name="timezone"   id="timezone">
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
