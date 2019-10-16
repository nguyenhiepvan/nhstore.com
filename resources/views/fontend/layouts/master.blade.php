<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <meta name="description" content="Orise-ecommerce">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <!-- Page Title -->
  @yield('title')
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/fontend/img/favicon.png')}}" type="image/png" />
  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('assets/fontend/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/media.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/normalize.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/owl.transitions.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/jquery.bxslider.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/elegant-icons.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/fontend/css/flexslider.css')}}">
  @yield('css')
</head>
<body>
  <!-- Loader Begin -->
  <div class="loader">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>
    <p>orise</p>
  </div>
  <!-- Loader End -->
  <!-- Back To Top Begin -->
  <div id="back-top">
    <a href="#" class="scroll">
      <i class="arrow_carrot-up"></i>
    </a>
  </div>
  <!-- Back To Top End -->
  <!-- Site Wrapper Begin -->
  <div class="wrapper">
    <!-- Header Begin -->
    @include('fontend.layouts.header')
    <!-- header End -->
    @yield('content')
    <!-- Footer Begin -->
    @include('fontend.layouts.footer')
    <!-- Footer End -->
    <!-- Popup Newsletter Begin -->
    <div class="modal popup-newsletter fade" id="newsletterModal">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon_close"></i>close</button>
      <div id="newsletter-popup" class="block">
        <div class="block_content">
          <form method="post" target="_blank" class="subscription-form">
            <div class="popup-title">
              <h2>Get Our Email Letter</h2>
            </div>
            <!-- /popup-title -->
            <div class="popup-text">Subscribe to the Orise mailing list to receive updates on new arrivals, special offers and other discount information.</div>
            <!-- /popup-text -->
            <input class="inputletter" id="newsletter-input-popup" type="text" name="email" value="" placeholder="Enter your mail..." required>
            <button type="submit" class="btn-form">Subscribe!</button>
            <!-- /btn-form -->
          </form>
          <!-- /form -->
        </div>
        <!-- /block_content -->
        <div class="newsletter-popup-bottom">
          <input id="checker" type="checkbox">
          <label for="checker">Don't show this popup again</label>
        </div>
        <!-- /newsletter-popup-bottom -->
      </div>
      <!-- /newsletter-popup -->
    </div>
    <!-- Popup Newsletter End -->
  </div>
  <!-- Site Wrapper End -->
  <!--- Scripts -->
  <script src="{{asset('assets/fontend/js/lib/jquery.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/lib/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/lib/moderniz.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/scripts.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/jquery.bxslider.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/jquery.flexslider-min.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/flexslider-init.js')}}"></script>
  <script src="{{asset('assets/fontend/js/vendors/smoothscroll.js')}}"></script>
  @yield('script')
</body>
</html>