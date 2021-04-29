<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{$setting->site_name}}</title>
    <link href="{{asset('MadarTemplate/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('MadarTemplate/assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('MadarTemplate/assets/css/lightbox.css')}}" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="{{asset('Admin/assets/images/logo/'.$setting->favicon)}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="{{asset('MadarTemplate/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

{{--START HEADER--}}
@include('site.includes.header')
{{--END HEADER--}}

{{--CONTENT--}}
@yield('content')

{{--START FOOTER--}}
@include('site.includes.footer')
{{--END FOOTER--}}

{{--START SCRIPTS--}}
<script type="text/javascript" src="{{asset('MadarTemplate/assets/js/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('MadarTemplate/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('MadarTemplate/assets/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('MadarTemplate/assets/js/main.js')}}"></script>
</body>
</html>
