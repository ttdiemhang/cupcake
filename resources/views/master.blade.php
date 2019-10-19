<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <script>
        $(".move-top text-right").click(function () {
            return $("body,html").animate({scrollTop:0},400),!1});
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()});
    </script>
    <title>CupCake</title>
</head>

<body>
<div class="container">

@include('frontend.layouts.header')
@include('frontend.layouts.slide')
@include('frontend.layouts.nav')
        <!-- -------------------end menu-------------------- -->
        @yield('content')
    @include('frontend.layouts.footer')

</div>

</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<script type="text/javascript" src="/js/common.js" ></script>

</html>
