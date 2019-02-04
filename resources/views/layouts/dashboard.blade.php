<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'T-shirts') }}</title>

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('css/dashboard.css')) }}" rel="stylesheet">        
</head>
<body>
    @include('includes.dashboard.navbar')

    <div class="wrapper">

        @include('includes.dashboard.sidebar')

        <div id="content">
            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    {!! toastr()->render() !!}
</body>
</html>