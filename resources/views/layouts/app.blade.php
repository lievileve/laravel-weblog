<!DOCTYPE html>
<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="post_container">
    @include('partials.nav')
    @yield('content')
</div>
</body>
</html>