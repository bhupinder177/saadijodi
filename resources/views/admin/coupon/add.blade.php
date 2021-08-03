
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Add Coupon</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">

            <form action="{{ url($prefix.'/couponSave') }}" method="post" enctype="multipart/form-data" class="reset" id="addcoupon">

                    <div class="row">

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Coupon <span class="red">*</span></label>
      <input type="text" placeholder="Please enter coupon" class="form-control " name="coupon"   id="coupon">
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Discount (%)<span class="red">*</span></label>
      <input type="text" placeholder="Please enter discount" class="form-control" name="discount"   id="discount">
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
