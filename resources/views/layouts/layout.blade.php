<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <!-- script
    ================================================== -->
    <script src="{{asset('js/modernizr.js')}}"></script>
    <script defer src="{{asset('js/fontawesome/all.min.js')}}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">

</head>

<body id="top">


    <!-- preloader
    ================================================== -->
    <div id="preloader"> 
    	<div id="loader"></div>
    </div>
    @yield('header')

    

    @yield('content')

    @yield('footer')


    

    <!-- Java Script
    ================================================== -->
    <script src="{{asset('js/jquery-3.5.0.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>

</html>