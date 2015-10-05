<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>BootySYS</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="container">
        @include('flash.messages')
        @yield('content')
    </div>

</body>
</html>