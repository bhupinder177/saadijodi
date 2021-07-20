<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="footer_wrap">
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting <br>industry. Lorem Ipsum has been the industry's standard dummy<br> text ever since the 1500 swhen an unknown printer took a galley<br> of type and scrambled it to make a type specimen book.
          </p>
          <h3>Follow Us</h3>
          <ul>
            <li>
              <i class="fa fa-facebook-square"></i>
            </li>
            <li>
              <i class="fa fa-twitter-square"></i>
            </li>
            <li>
              <i class="fa fa-linkedin"></i>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="footer_mainu">
          <h2>Help & Support</h2>
          <ul>
            <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/contact-us')}}">Contact us</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/faqs')}}">FAQs</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/term-conditions')}}">Terms and Condition</a>
            </li>
            <!-- <li>
              <i class="fa fa-angle-right"></i><a href="#">Success Stories</a>
            </li> -->
            <!-- <li>
              <i class="fa fa-angle-right"></i><a href="#">Mobile Matrimony</a>
            </li> -->

            <!-- <li>
              <i class="fa fa-angle-right"></i><a href="#">Member Demograph</a>
            </li> -->
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="footer_mainu">
          <h2>Information</h2>
          <ul>
            <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/about-us')}}">About Us</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/privacy-policy')}}">Privacy Policy</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/refund-policy')}}">Refund Policy</a>
            </li>


          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.toast.js') }}"></script>
<script src="{{ asset('front/js/validation.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
<?php
if(request()->segment(1) == "message")
{
	?>
<script src="{{ asset('front/js/socket-front.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="https://app.saadijodi.com/socket.io/socket.io.js"></script>
<?php } ?>

<script>
$( function() {
 $( "#slider-range" ).slider({
   range: true,
   min: 18,
   max: 45,
   values: [ 23,30],
   slide: function( event, ui ) {
     $( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
     $('.ageMin').val(ui.values[0]);
     $('.ageMax').val(ui.value[1]);
   }
 });
 $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
   " - " + $( "#slider-range" ).slider( "values", 1 ) );
} );

</script>
<script>
  $(document).ready(function(){
      $('.customer-logos').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1500,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: [{
              breakpoint: 768,
              settings: {
                  slidesToShow: 2
              }
          }, {
              breakpoint: 520,
              settings: {
                  slidesToShow: 1
              }
          }]
      });
  });

    function myFunction(imgs)
    {
      var src = imgs.src;
      var m = document.getElementById("showimages");
      m.src = src;
    }
</script>
</body>
</html>
