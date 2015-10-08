<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>BootySYS</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<body>

    @include('partials.header')

    <div id="page-wrapper">
            @include('flash.messages')
            @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        angular.module("app").constant("CSRF_TOKEN", '{{ csrf_token() }}');
    </script>

</body>
</html>