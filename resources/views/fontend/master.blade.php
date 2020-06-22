<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('fontend/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body class=" ">

@include('fontend.inc.header')


<div class="content-wrapper">
  @yield('content');
</div>

<!-- Footer -->

@include('fontend.inc.footer')



<script src="{{asset('fontend/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('fontend/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('fontend/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('fontend/js/theme-plugins.js')}}"></script>
<script src="{{asset('fontend/js/main.js')}}"></script>
<script src="{{asset('fontend/js/form-actions.js')}}"></script>

<script src="{{asset('fontend/js/velocity.min.js')}}"></script>
<script src="{{asset('fontend/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('fontend/js/animation.velocity.min.js')}}"></script>

<!-- ...end JS Script -->


</body>

<!-- Mirrored from theme.crumina.net/html-seosight/16_shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:04 GMT -->
</html>
