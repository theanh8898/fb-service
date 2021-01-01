<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- displays site properly based on user's device -->

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
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

<body>
<div class="container-full inside-page">

    @include('backend.layouts.menu')

    <div class="main-content">

        @include('backend.layouts.header')

        @yield('content')
    </div>
</div>

<!-- javascript -->

<script src="{{ asset('app/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://kit.fontawesome.com/c78d876d94.js" crossorigin="anonymous"></script>
<script src="{{ asset('app/js/script.js') }}"></script>
@yield('script')
</body>

</html>
