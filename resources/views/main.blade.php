<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('head')
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Main Wrapper Start Here -->
<div class="wrapper">

@include('header')

    @yield('content')

<!-- Main Wrapper End Here -->

@include('footer')
</body>
</html>
