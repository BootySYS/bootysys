<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>pazzam&reg;</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Patua+One|Paytone+One|Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="logged-in" ng-app="app">

    @include('partials.header')
    <div id="page-wrapper">
            @include('flash.messages')
            @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>