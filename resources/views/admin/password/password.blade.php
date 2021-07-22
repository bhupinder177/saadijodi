
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Change Password</li>
    </ol>
  </section>
      <div class="container-fluid">


          <div class="">


            <form action="{{ url($prefix.'/passwordUpdate') }}" method="post" enctype="multipart/form-data" class="reset" id="passwordUpdate">

                    <div class="row">

                      <div class="col-sm-8">
                          <div class="form-group">
                            <label>Password</label>
      <input type="password" placeholder="Please enter password" class="form-control" name="password"   id="password">
                          </div>
                      </div>

                      <div class="col-sm-8">
                          <div class="form-group">
                            <label>Confirm password</label>
      <input type="password" placeholder="Please enter confirm password" class="form-control" name="confirm_password"   id="confirm_password">
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
