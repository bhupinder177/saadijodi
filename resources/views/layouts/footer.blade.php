<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="footer_wrap">
          <p>
            Saadi Jodi is the leading matrimonial website, founded with an aim to please people with their perfect match. It is a social networking site helps you to connect different religion and region. We are here to serve worldwide customers and successfully we’ve touched more than 1000+ lives.

          </p>
          <h3>Follow Us</h3>
          <ul>
            <li>
              <a target="_blank" href="http://www.facebook.com/saadijodii">
              <i class="fa fa-facebook-square"></i>
            </a>
            </li>
            <li>
              <i class="fa fa-twitter-square"></i>
            </li>
            <li>
              <i class="fa fa-linkedin"></i>
            </li>
            <li>
              <a target="_blank" href="http://www.instagram.com/saadijodi">
              <i class="fa fa-instagram"></i>
              </a>
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
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/term-conditions')}}">Terms and Conditions</a>
            </li>

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
            <!-- <li>
              <i class="fa fa-angle-right"></i><a href="{{URL::to('/refund-policy')}}">Refund Policy</a>
            </li> -->


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


  @if(!empty(Auth::User()->id))
  @php $allrooms = App\Helpers\GlobalFunctions::allRooms(Auth::User()->id); @endphp
@if(count($allrooms) > 0)
<script>
var messagesId = "{{$messagesId ?? ''}}";
var host = '{{ env('SOCKET_HOST') }}';
var port = '{{ env('SOCKET_PORT') }}';
var user = '{{ Auth::user()->firstName }}';
var SITE_URL = '{{ URL::to('/') }}';
var roomIdd =  '{{ isset($allrooms[0])?$allrooms[0]->roomId:'' }}';
@if ($allrooms[0]->user->id == Auth::user()->id)
var sender =  '{{ isset($allrooms[0])?$allrooms[0]->user->id:'' }}';
var receiver =  '{{ isset($allrooms[0])?$allrooms[0]->oppositeUser->id:'' }}';
@else
var receiver =  '{{ isset($allrooms[0])?$allrooms[0]->user->id:'' }}';
var sender =  '{{ isset($allrooms[0])?$allrooms[0]->oppositeUser->id:'' }}';
@endif
</script>
@endif
@endif

<?php
// if(request()->segment(1) == "message")
// {
	?>
<script src="{{ asset('front/js/socket-front.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="https://app.saadijodi.com/socket.io/socket.io.js"></script>
<?php
 // }
?>

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
