<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Leen Task</title>
    @yield('css')
</head>
<body>
    @yield('content')
</body>

@yield('js')
</html>

