<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('cabinet.partials.head')
    <link rel="canonical" href="{{ request()->url() }}">
    <title>@yield('title')</title>

</head>

<body>
@include('cabinet.partials.sidebar')
<main class="content">
    @include('cabinet.partials.header')

    @yield('content')

    @include('cabinet.partials.footer')
</main>
@stack('scripts')
</body>

</html>
