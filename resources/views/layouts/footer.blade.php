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
              <i class="fa fa-angle-right"></i><a href="#">Contact us</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">FAQs</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Success Stories</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Mobile Matrimony</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Payment Option</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Member Demograph</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="footer_mainu">
          <h2>Information</h2>
          <ul>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">About Us</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Privacy Policy</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Refund Policy</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Report Misuse</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Terms and Condition</a>
            </li>
            <li>
              <i class="fa fa-angle-right"></i><a href="#">Blog</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.toast.js') }}"></script>
<script src="{{ asset('front/js/validation.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>

<script>
  $("#slider-range").slider({
    range: true,
    min: 0,
    max: 45,
    step: 20,
    slide: function( event, ui ) {
      $( "#min-price").html(ui.values[ 0 ]);

      suffix = '';
      if (ui.values[ 1 ] == $( "#max-price").data('max') ){
         suffix = ' +';
      }
      $( "#max-price").html(ui.values[ 1 ] + suffix);
    }
  })

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

    function myFunction(imgs) {
      var expandImg = document.getElementById("expandedImg");
      var expandImg1 = document.getElementById("expandedImg1");
      expandImg1.hide();
      var imgText = document.getElementById("imgtext");
      expandImg.src = imgs.src;
      imgText.innerHTML = imgs.alt;
      expandImg.parentElement.style.display = "block";
    }
</script>
</body>
</html>
