<?php
    $web = App\Models\WebSettingsModel::where('settings_id', 1)->first(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{$web->title}}</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landing_page')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('landing_page')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('landing_page')}}/assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

  .rating-box {
    position: relative;
    background: #fff;
    padding: 25px 50px 35px;
    border-radius: 25px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
  }
  .rating-box header {
    font-size: 22px;
    color: #dadada;
    font-weight: 500;
    margin-bottom: 20px;
    text-align: center;
  }
  .rating-box .stars {
    display: flex;
    align-items: center;
    gap: 25px;
  }
  .stars i {
    color: #e6e6e6;
    font-size: 35px;
    cursor: pointer;
    transition: color 0.2s ease;
  }
  .stars i.active {
    color: #ff9c1a;
  }
</style>
</head>
  <body>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">{{$web->title}}</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('landing-page')}}" class="@if(Route::currentRouteName() == 'landing-page' || Route::currentRouteName() == '/' ){{'active'}} @endif">Home</a></li>
          <li><a href="{{route('landing-page/announcements')}}" class="@if(Route::currentRouteName() == 'landing-page/announcements'){{'active'}} @endif">Announcements</a></li>
          <li><a href="{{route('landing-page' , '#faqs')}}">FAQs</a></li>
          <li><a href="{{route('landing-page' , '#about')}}">About</a></li>
          <li><a href="{{route('landing-page' , '#gallery')}}">Gallery</a></li>
          <li><a href="{{route('landing-page' , '#feedback')}}">Feedback</a></li>
          <li><a href="{{route('landing-page' , '#recent-posts')}}">Threads</a></li>
          <li><a href="{{route('landing-page/polls')}}" class="@if(Route::currentRouteName() == 'landing-page/polls'){{'active'}} @endif">Polls</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @auth
          <a class="btn-getstarted" href="{{route('dashboard')}}">Dashboard</a>
      @endauth
      @guest
            <a class="btn-getstarted" href="{{route('login')}}">Get Started</a>
      @endguest

    </div>
  </header>

  
    @yield('content')

    <!-- CoreUI and necessary plugins-->
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/simplebar/js/simplebar.min.js"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>

<footer id="footer" class="footer position-relative light-background">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-about">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="sitename">{{$web->title}}</span>
      </a>
      <p>{{$web->about}}</p>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Useful Links</h4>
      <ul>
         <li><a href="{{route('landing-page')}}" class="@if(Route::currentRouteName() == 'landing-page' || Route::currentRouteName() == '/' ){{'active'}} @endif">Home</a></li>
          <li><a href="{{route('landing-page/announcements')}}" class="@if(Route::currentRouteName() == 'landing-page/announcements'){{'active'}} @endif">Announcements</a></li>
          <li><a href="{{route('landing-page' , '#faqs')}}">FAQs</a></li>
          <li><a href="{{route('landing-page' , '#about')}}">About</a></li>
          <li><a href="{{route('landing-page' , '#gallery')}}">Gallery</a></li>
          <li><a href="{{route('landing-page' , '#feedback')}}">Feedback</a></li>
          <li><a href="{{route('landing-page' , '#recent-posts')}}">Threads</a></li>
          <li><a href="{{route('landing-page/polls')}}" class="@if(Route::currentRouteName() == 'landing-page/polls'){{'active'}} @endif">Polls</a></li>

      </ul>
    </div>


    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
      <h4>Contact Us</h4>
      <p>{{$web->address}}</p>
      <p>{{$web->contact_number}}</p>
      <p><strong>Email:</strong> <span>{{$web->email_address}}</span></p>
    </div>

  </div>
</div>
<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="sitename">{{$web->title}}</strong> <span>All Rights Reserved</span></p>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you've purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
  </div>
</div>
</footer>
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
<script type="module">
   // Select all elements with the "i" tag and store them in a NodeList called "stars"
      const stars = document.querySelectorAll(".stars i");
      var starRating = document.querySelector("#starRating");
      // Loop through the "stars" NodeList
      stars.forEach((star, index1) => {
        // Add an event listener that runs a function when the "click" event is triggered
        star.addEventListener("click", () => {
          // Loop through the "stars" NodeList Again
          stars.forEach((star, index2) => {
            // Add the "active" class to the clicked star and any stars with a lower index
            // and remove the "active" class from any stars with a higher index
            index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
            starRating.value = index1;

          });
        });
      });
      console.log(stars);
</script>
<!-- Vendor JS Files -->
<script src="{{asset('landing_page')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/aos/aos.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('landing_page')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="{{asset('landing_page')}}/assets/js/main.js"></script>

</body>
