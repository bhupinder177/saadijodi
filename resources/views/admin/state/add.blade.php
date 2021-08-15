
@include('admin.layouts.header')
@include('admin.layouts.sidebar')


<div class="page-content">
  <section class="content-header">
    <ol class="breadcrumb">
      <li class="active">Country:{{ $country->name }} | Add State</li>
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
                         <label>Time Zone <span class="red">*</span></label>
                         <select   name="timezone"  id="timezone" class="form-control" >
                           <option value="">Select timezone</option>
                           @if(!empty($zones))
                           @foreach($zones as $z)
                           @php $time = $z['zone'].' '.$z['diff_from_GMT'] @endphp
                           <option  value="{{ $z['zone'] }} {{ $z['diff_from_GMT'] }}">{{ $z['zone'] }} {{ $z['diff_from_GMT'] }} </option>
                           @endforeach
                           @endif
                         </select>
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
