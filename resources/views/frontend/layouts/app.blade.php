<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}/">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/style.css') }}">
    <title>Facebook Seo</title>

    <!-- Feel free to remove these styles or customise in your own stylesheet 👍 -->
    <style>
        .attribution {
            font-size: 11px;
            text-align: center;
        }

        .attribution a {
            color: hsl(228, 45%, 44%);
        }
    </style>

@yield('style')

</head>
<body class="font-sans antialiased">
    @include('frontend.layouts.header')
    {{--            @include('layouts.menu')--}}

    <div id="app">
        @yield('content')
    </div>
    @include('frontend.layouts.footer')
</body>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
<script src="{{ mix('js/app.js') }}" defer></script>
<script src="{{ asset('app/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('app/js/script.js') }}"></script>
@yield('script')

</html>
