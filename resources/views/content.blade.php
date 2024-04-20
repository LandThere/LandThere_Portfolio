<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title', 'Home')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{asset ('asset/images/lm.png')}}">
    <!-- <link rel="stylesheet" href="{{asset ('asset/css/open-iconic-bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset ('asset/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset ('asset/css/aos.css')}}">
    <!-- <link rel="stylesheet" href="{{asset ('asset/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset ('asset/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset ('asset/css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset ('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/styles.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  @yield('content')
  <script src="{{asset ('asset/js/jquery.min.js')}}"></script>
  <script src="{{asset ('asset/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <!-- <script src="{{asset ('asset/js/popper.min.js')}}"></script>
  <script src="{{asset ('asset/js/bootstrap.min.js')}}"></script>
  <script src="{{asset ('asset/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset ('asset/js/jquery.waypoints.min.js')}}"></script> -->
  <script src="{{asset ('asset/js/jquery.stellar.min.js')}}"></script>
  <!-- <script src="{{asset ('asset/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset ('asset/js/jquery.magnific-popup.min.js')}}"></script> -->
  <script src="{{asset ('asset/js/aos.js')}}"></script>
  <!-- <script src="{{asset ('asset/js/jquery.animateNumber.min.js')}}"></script> -->
  <script src="{{asset ('asset/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnNahiAE9r8sLhxGgiE0IhHtMRgR-spGU"></script>

  <script src="{{asset ('asset/js/script.js')}}"></script>
  <script src="{{asset ('asset/js/main.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </body>
</html>