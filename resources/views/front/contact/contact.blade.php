@include('layouts.header')
<!-- <section class="map_wrapp">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109782.69919949504!2d76.6273400302204!3d30.698452818605396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fee906da6f81f%3A0x512998f16ce508d8!2sSahibzada%20Ajit%20Singh%20Nagar%2C%20Punjab!5e0!3m2!1sen!2sin!4v1626430473464!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section> -->

<section class="contact_sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hdng">
          <h1>Contact us for more information or<br>
            to share your wedding vision with us.</h1>
        </div>
      </div>
    </div>

<form action="{{URL::to('/contactSave')}}" method="post" class="reset" id="contactform">
    <div class="row">

      <div class="col-md-6">
        <div class="form__field">
          <label>Name</label>
          <input type="text" name="name" class="name characteronly" id="name">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form__field">
          <label>E-mail</label>
          <input type="email" name="email"  class="email" id="email">
        </div>
      </div>

      <div class="col-md-12">
        <div class="form__field">
          <label>Message</label>
          <textarea rows="4" name="message" class="message" id="message"></textarea>
        </div>
      </div>

      <div class="col-md-12">
        <div class="btn_con">
          <button type="submit">Submit</button>
        </div>
      </div>

    </div>
  </form>

  </div>
</section>

@include('layouts.footer')
