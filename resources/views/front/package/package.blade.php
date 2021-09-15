@include('layouts.header')

<section class="Member_ship_wrapp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="member_h">
          <h3>Upgrade now & Get Premium benefits for upto 4 weeks extra, FREE!</h3>
        </div>
      </div>
       @if(count($packages) > 0)
       @foreach($packages as $k=>$p)
      <div class="col-lg-4">
        <div class="card @if($k == 0)bg-success @endif @if($k == 1)bg-warning @endif @if($k == 2)bg-danger @endif mb-5 mb-lg-0 rounded-lg shadow">
          <div class="card-header">
            <h5 class="card-title text-uppercase text-center">{{ $p->name }}</h5>
            <h6 class="h1 text-center">${{ $p->price }}<span class="h6">/ @if($p->duration == 6)Life Time @elseif($p->duration == 1 ) 1 months @elseif($p->duration == 2) 2 month @elseif($p->duration == 3) 3 months @elseif($p->duration == 4) 6 months @elseif($p->duration == 5) 12 months @endif</span></h6>
          </div>
          <div class="card-body bg-light rounded-bottom">
            <ul class="list-unstyled mb-4">
              <?php echo $p->description; ?>
            </ul>
            @if(!empty($selected) && $p->id == $selected->packageId)
            <a  class="btn btn-block @if($k == 0)btn-primary @endif @if($k == 1)btn-primary @endif @if($k == 2)btn-primary @endif  text-uppercase rounded-lg py-3">Selected</a>

            @else
            <a href="{{URL::to('/payment/'.Crypt::encrypt($p->id))}}" class="btn btn-block @if($k == 0)btn-primary @endif @if($k == 1)btn-primary @endif @if($k == 2)btn-primary @endif  text-uppercase rounded-lg py-3">Continue</a>
            @endif
          </div>
        </div>
      </div>
      @endforeach
       @endif


    </div>

    <div class="row">
      <div class="col-md-12">
        <h2 class="qustn_wrap">You have questions. We have the answers…</h2>
      </div>

      <div class="col-md-6 mb_color">
        <div class="quest_ans_box">
          <h4>What are some of the benefits of Premium plans?</h4>
          <p>As a Premium member, you can chat unlimited with your Matches, view their contact numbers and view hidden photos. You also get Premium Assistance on priority. These benefits will help you to accelerate your partner search.</p>
        </div>
      </div>

      <div class="col-md-6 mb_color">
        <div class="quest_ans_box">
          <h4>What offers and discounts can I avail?</h4>
          <p>We keep you informed from time to time whenever you are eligible for different discounts and offers. Login frequently to check and avail the best available offer.</p>
        </div>
      </div>

      <div class="col-md-6 mb_color">
        <div class="quest_ans_box">
          <h4>What payment options do you offer?</h4>
          <p>We offer multiple Online and Offline payment options for you to pick and choose from based on your location. Choose your preferred plan and move forward to see the various options available to you.</p>
        </div>
      </div>

      <div class="col-md-6 mb_color">
        <div class="quest_ans_box">
          <h4>How can I be safe on Saadi jodi?</h4>
          <p>We go to great lengths to make sure you get the best possible experience here. Every single profile is screened & your matches are tailored to your preferences. But if you still have any unpleasant experience please do report the same to us.</p>
        </div>
      </div>

    </div>

  </div>


</section>
@include('layouts.footer')
