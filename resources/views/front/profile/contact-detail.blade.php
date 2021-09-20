@include('layouts.header')
<form action="{{URL::to('/contactDetailUpdate')}}" method="post" id="contactUpdate">

<section class="profile_edit_wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="profile-edit-heading">
          <h2>Edit Personal Profile</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="accordion" id="faq">



            <div class="card">
                <div class="card-header" id="faqhead1">
                    <a href="#" class="btn btn-header-link" data-toggle="collapse" data-target="#faq1"
                    aria-expanded="true" aria-controls="faq1">Contact Details</a>
                </div>

                <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                    <div class="card-body">

                        <div class="col-md-12">
                          <div class="form_group_wrap">
                            <label>Mobile </label>
                            <input value="@if(!empty($detail->mobile)){{$detail->mobile}}@endif" placeholder="Please enter mobile number" class="selecthide" type="text" name="mobile">
                          </div>
                          <div class="form_group_wrap">
                            <label>Name Contact Person </label>
                            <input value="@if(!empty($detail->nameContactPerson)){{ $detail->nameContactPerson }} @endif" placeholder="Please enter contact person name" class="selecthide" type="text" name="nameContactPerson">
                          </div>
                          <div class="form_group_wrap">
                            <label>Relation </label>
                            <select   class="selecthide"  name="relationWithMember">
                           <option value=""  >Select Relation</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 1) selected @endif @endif value="1" label="Self" >Self</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 2) selected @endif @endif value="2" label="Parent">Parent</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 3) selected @endif @endif value="3" label="Guardian">Guardian</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 4) selected @endif @endif value="4" label="Sibling">Sibling</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 5) selected @endif @endif value="5" label="Friend">Friend</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 6) selected @endif @endif value="6" label="Relative">Relative</option>
                           <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 7) selected @endif @endif value="7" label="Other">Other</option>
                           </select>
                          </div>



                        </div>

                    </div>
                </div>
            </div>



      <div class="col-md-12">
        <div class="profile_submit">
          <button type="submit" class="edit_submit_btn">Submit</button>
        </div>
      </div>

    </div>
  </div>
</section>
</form>

@include('layouts.footer')
