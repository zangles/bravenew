<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Add Your favicon here -->
    <!--<link rel="icon" href="img/favicon.ico">-->

    <title>{{ env('APP_NAME') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/web/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ asset('css/web/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/web/style.css') }}" rel="stylesheet">
</head>

<body id="page-top">
@yield('content')

<script src="{{ asset('js/web/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('js/web/pace.min.js') }}"></script>
<script src="{{ asset('js/web/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/web/classie.js') }}"></script>
<script src="{{ asset('js/web/cbpAnimatedHeader.js') }}"></script>
<script src="{{ asset('js/web/wow.min.js') }}"></script>
<script src="{{ asset('js/web/inspinia.js') }}"></script>
@yield('script')
</body>

</html>
