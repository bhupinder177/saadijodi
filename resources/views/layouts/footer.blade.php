<footer class="sj-site-footer">
  <div class="container">
    <div class="sj-footer-grid">

      <div class="sj-footer-about">
        <a href="{{URL::to('/')}}" class="sj-footer-brand">
          <img src="{{ asset('front/images/logo.png') }}" alt="Saadi Jodi">
        </a>
        <p>
          Saadi Jodi is the leading matrimonial website, founded with an aim to please people with
          their perfect match. It is a social networking site helping you to connect different religion
          and region. We are here to serve worldwide customers and successfully we've touched more than
          1000+ lives.
        </p>
        <h3>Follow Us</h3>
        <ul class="sj-footer-social">
          <li><a target="_blank" href="http://www.facebook.com/saadijodii"><i class="fa fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a target="_blank" href="http://www.instagram.com/saadijodi"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>

      <div class="sj-footer-col">
        <h2>Help &amp; Support</h2>
        <ul>
          <li><a href="{{URL::to('/contact-us')}}"><i class="fa fa-angle-right"></i> Contact Us</a></li>
          <li><a href="{{URL::to('/faqs')}}"><i class="fa fa-angle-right"></i> FAQs</a></li>
          <li><a href="{{URL::to('/term-conditions')}}"><i class="fa fa-angle-right"></i> Terms and Conditions</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i> Sitemap</a></li>
        </ul>
      </div>

      <div class="sj-footer-col">
        <h2>Information</h2>
        <ul>
          <li><a href="{{URL::to('/about-us')}}"><i class="fa fa-angle-right"></i> About Us</a></li>
          <li><a href="{{URL::to('/privacy-policy')}}"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i> Success Stories</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i> Blog</a></li>
        </ul>
      </div>

      <div class="sj-footer-col sj-footer-news">
        <h2>Subscribe to Newsletter</h2>
        <p>Get updates on new members and premium offers.</p>
        <form class="sj-news-form" onsubmit="event.preventDefault();">
          <input type="email" name="email" placeholder="Enter your email" required>
          <button type="submit" aria-label="Subscribe"><i class="fa fa-paper-plane"></i></button>
        </form>
      </div>

    </div>
  </div>

  <div class="sj-footer-bottom">
    <div class="container">
      <span>&copy; {{ date('Y') }} Saadi Jodi. All Rights Reserved.</span>
      <span class="sj-footer-legal">
        <a href="{{URL::to('/privacy-policy')}}">Privacy Policy</a>
        <a href="{{URL::to('/term-conditions')}}">Terms &amp; Conditions</a>
      </span>
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

@php
  $socketHost = env('SOCKET_HOST', '127.0.0.1');
  $socketPort = env('SOCKET_PORT', '3000');
@endphp
<script src="{{ 'http://'.$socketHost.':'.$socketPort.'/socket.io/socket.io.js' }}"></script>
<script src="{{ asset('front/js/socket-front.js') }}" type="text/javascript" charset="utf-8"></script>

<script>
$( function() {
 if ( $( "#slider-range" ).length ) {
   var startMin = parseInt( $('.ageMin').val(), 10 ) || 23;
   var startMax = parseInt( $('.ageMax').val(), 10 ) || 30;
   $( "#slider-range" ).slider({
     range: true,
     min: 18,
     max: 45,
     values: [ startMin, startMax ],
     slide: function( event, ui ) {
       $( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
       $('.ageMin').val(ui.values[0]);
       $('.ageMax').val(ui.values[1]);
     }
   });
   $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
     " - " + $( "#slider-range" ).slider( "values", 1 ) );
 }
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
