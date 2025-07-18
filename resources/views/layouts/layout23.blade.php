
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('Dsite/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('Dsite/image/favicon.ico')}}">
    <title>@yield('title')</title>
</head>
<body>
    @yield('header')

    @yield('content')

    

    @yield('footer')
    <script type="text/javascript" src="{{asset('Dsite/index.js')}}" ></script>
</body>
</html>