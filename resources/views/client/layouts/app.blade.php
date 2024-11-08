<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('logo_web_noi_that_favocon_icon.png') }}" sizes="16x16" type="image/x-icon" />
    <title>Nội thất 360</title>
    <link rel="stylesheet" href="{{asset('client/assets/base/CSS/homepage.css')}}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body>
    @include('client.layouts.authModal')
    <div class="warpper">
        @include('client.layouts.header')
        <hr>

        @include('client.layouts.topnav')

        @yield('slider')

        @yield('content')

        @include('client.layouts.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('client/assets/base/JS/base.js')}}"></script>

    @if (session('message'))
        <script>
            await Swal.fire({
                title: "Thành công!",
                text: <?php    echo "\"" . session('message') . "\"" ?>,
                icon: <?php    echo "\"" . session('state') . "\"" ?? "success" ?>,
            });
        </script>
    @endif
    @yield('scripts')
    @if (auth()->check())
        <script type="module" src="{{asset('client/assets/base/JS/handleCartForUser.js')}}"></script>
    @else
        <script type="module" src="{{asset('client/assets/base/JS/handlerCartForGuestUser.js')}}"></script>
    @endif
</body>


</html>