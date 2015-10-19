<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>BootySYS</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Patua+One|Paytone+One' rel='stylesheet' type='text/css'>
</head>
<body class="logged-in">

    @include('partials.header')

    <div id="page-wrapper">
            <small class="text-muted pull-right" style="margin-top: 10px; position: absolute; right: 28px;"><i class="fa fa-quote-right"></i>
                {{ Inspiring::quote() }}
            </small>

            @include('flash.messages')
            @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>