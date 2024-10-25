<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Image/logoweb.png') }}" sizes="16x16" />
    <title>Nội thất 360</title>
    <link rel="stylesheet" href="{{asset('client/assets/base/homepage.css')}}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body>

    <div class="warpper">
        @include('client.layouts.header')
        <hr>

        @include('client.layouts.topnav')

        @yield('slider')

        @yield('content')

        @include('client.layouts.footer')
    </div>

    @yield('scripts')
</body>

</html>