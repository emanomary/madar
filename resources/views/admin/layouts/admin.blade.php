<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('Admin/assets/images/ico/apple-icon-120.png')}}">

    {{-- FAVICON --}}
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="{{asset('Admin/assets/images/logo/favicon.png')}}">
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/vendors.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/custom-rtl.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/assets/css-rtl/core/colors/palette-gradient.css')}}">
    @yield('style')
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Admin/asset/css/style-rtl.css')}}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top Header-->
@include('admin.includes.header')

<!-- Sidebar -->
@include('admin.includes.sidebar')

<!-- Sidebar -->
@yield('content')

<!-- Footer-->
@include('admin.includes.footer')

<!-- BEGIN VENDOR JS-->
<script src="{{asset('Admin/assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('Admin/assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('Admin/assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"
        type="text/javascript"></script>
<script src="{{asset('Admin/assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('Admin/assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('Admin/assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
@yield('script')
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
{{--
<script src="{{asset('Admin/assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script>
--}}
<!-- END PAGE LEVEL JS-->
</body>
</html>
