<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    @include('front.partials.head')
</head>
<body>

@include('front.partials.header')

@yield('content')

@include('front.partials.footer')

</body>
</html>
