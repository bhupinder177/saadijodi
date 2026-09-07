@include('layouts.header')

<style>
  /* ===================== Contact Details (shared .ep-* system) ===================== */
  .ep-wrap{
    --pink:#e5006d; --violet:#7b2ff7; --navy:#14213d;
    --ink:#2b3040; --muted:#8b93a7; --line:#e7eaf3; --field:#f6f7fb; --bg:#eef1f8;
    background:var(--bg); padding:34px 0 64px; font-family:'Poppins',sans-serif; color:var(--ink);
  }
  .ep-wrap *{box-sizing:border-box;}
  .ep-wrap .ep-container{max-width:720px;margin:0 auto;padding:0 16px;}

  .ep-top-head{margin-bottom:22px;}
  .ep-top-head h1{margin:0;font-size:26px;font-weight:700;color:var(--navy);display:flex;align-items:center;gap:8px;}
  .ep-top-head h1 .fa{color:var(--pink);font-size:19px;}
  .ep-top-head p{margin:6px 0 0;font-size:13px;color:var(--muted);}

  .ep-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:22px 22px 24px;
    box-shadow:0 10px 30px rgba(20,33,61,.05);}
  .ep-card-head{display:flex;align-items:center;gap:11px;margin-bottom:18px;}
  .ep-card-ic{width:34px;height:34px;border-radius:10px;display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,var(--pink),var(--violet));color:#fff;font-size:15px;flex:none;}
  .ep-card-head h3{margin:0;font-size:15.5px;font-weight:700;color:var(--pink);}

  .ep-fields{display:grid;gap:16px;}
  .ep-field{display:flex;flex-direction:column;}
  .ep-field label{font-size:12px;font-weight:600;color:#4a5063;margin-bottom:6px;}
  .ep-field label .req{color:var(--pink);}
  .ep-input{width:100%;padding:11px 13px;font-size:13px;font-family:inherit;color:var(--ink);
    background:var(--field);border:1px solid var(--line);border-radius:10px;transition:border-color .15s,box-shadow .15s,background .15s;}
  .ep-input:focus{outline:none;background:#fff;border-color:var(--pink);box-shadow:0 0 0 3px rgba(229,0,109,.12);}
  select.ep-input{appearance:none;-webkit-appearance:none;
    background-image:url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20width='12'%20height='8'%3E%3Cpath%20fill='%238b93a7'%20d='M0%200l6%208%206-8z'/%3E%3C/svg%3E");
    background-repeat:no-repeat;background-position:right 13px center;padding-right:32px;}

  .ep-note{display:flex;gap:9px;align-items:flex-start;margin-top:16px;padding:11px 13px;border-radius:10px;
    background:#eef3ff;border:1px solid #d9e5ff;font-size:11.5px;color:var(--muted);line-height:1.55;}
  .ep-note .fa{color:var(--violet);margin-top:1px;}

  .ep-actions{display:flex;justify-content:flex-end;gap:14px;margin-top:20px;}
  .ep-btn-cancel{background:#fff;border:1px solid var(--line);border-radius:10px;padding:12px 30px;font-size:14px;
    font-weight:600;color:#5a6076;text-decoration:none;}
  .ep-btn-cancel:hover{border-color:#c9cede;color:var(--navy);}
  .ep-btn-save,.ep-btn-save:hover{background:linear-gradient(90deg,var(--pink),var(--violet));color:#fff;border:none;
    border-radius:10px;padding:12px 36px;font-size:14px;font-weight:600;cursor:pointer;
    box-shadow:0 10px 22px rgba(123,47,247,.28);display:inline-flex;align-items:center;gap:8px;}
  .ep-btn-save:hover{filter:brightness(1.05);}

  .ep-wrap label.has-error,.ep-wrap .has-error{color:var(--pink)!important;}
  .ep-wrap input.has-error,.ep-wrap select.has-error{border-color:var(--pink)!important;}

  @media (max-width:520px){ .ep-actions{flex-direction:column-reverse;} .ep-actions a,.ep-actions button{width:100%;text-align:center;justify-content:center;} }
</style>

<form action="{{URL::to('/contactDetailUpdate')}}" method="post" id="contactUpdate">

<section class="ep-wrap">
  <div class="ep-container">

    <div class="ep-top-head">
      <h1><i class="fa fa-phone"></i> Contact Details</h1>
      <p>How our team and matches can reach you</p>
    </div>

    <div class="ep-card">
      <div class="ep-card-head">
        <span class="ep-card-ic"><i class="fa fa-address-book-o"></i></span>
        <h3>Contact Details</h3>
      </div>

      <div class="ep-fields">
        <div class="ep-field">
          <label>Mobile <span class="req">*</span></label>
          <input value="@if(!empty($detail->mobile)){{ $detail->mobile }}@endif" placeholder="Please enter mobile number" class="ep-input selecthide" type="text" name="mobile">
        </div>
        <div class="ep-field">
          <label>Name of Contact Person</label>
          <input value="@if(!empty($detail->nameContactPerson)){{ trim($detail->nameContactPerson) }}@endif" placeholder="Please enter contact person name" class="ep-input selecthide" type="text" name="nameContactPerson">
        </div>
        <div class="ep-field">
          <label>Relation</label>
          <select class="ep-input selecthide" name="relationWithMember">
            <option value="">Select Relation</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 1) selected @endif @endif value="1">Self</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 2) selected @endif @endif value="2">Parent</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 3) selected @endif @endif value="3">Guardian</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 4) selected @endif @endif value="4">Sibling</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 5) selected @endif @endif value="5">Friend</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 6) selected @endif @endif value="6">Relative</option>
            <option @if(!empty($detail->relationWithMember)) @if($detail->relationWithMember == 7) selected @endif @endif value="7">Other</option>
          </select>
        </div>
      </div>

      <div class="ep-note">
        <i class="fa fa-lock"></i>
        Your contact details are kept private and are only shared with members you connect with.
      </div>

      <div class="ep-actions">
        <a href="{{ URL::to('/profile') }}" class="ep-btn-cancel">Cancel</a>
        <button type="submit" class="ep-btn-save edit_submit_btn"><i class="fa fa-floppy-o"></i> Save Details</button>
      </div>
    </div>

  </div>
</section>
</form>

@include('layouts.footer')
