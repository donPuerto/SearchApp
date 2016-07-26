<!DOCTYPE html>
@include('include.ie-support')
<head>
    <title> @yield('title','Laravel Application') </title>
    @include('include.meta')
    @yield('css-header')
    @yield('script-header')
</head>
<body>

@yield('content')

@yield('script-footer')
</body>
</html>
