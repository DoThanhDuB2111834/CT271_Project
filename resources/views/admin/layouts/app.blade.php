<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>admin</title>
  <link rel="icon" href="{{ asset('logo_web_noi_that_favocon_icon.png') }}" type="image/x-icon" />
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  @yield('css')
  <!-- Fonts and icons -->
  <script src="{{ asset('admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["{{asset('admin/assets/css/fonts.min.css')}}"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/assets/css/plugins.min.css')}}" />
  <link rel="stylesheet" href="{{asset('admin/assets/css/kaiadmin.min.css')}}" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
      @include('admin.layouts.header')

      @yield('content')

      @include('admin.layouts.footer')
    </div>

    <!-- Custom template | don't include it in your project! -->

    <!-- End Custom template -->
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('admin/assets/js/core/jquery-3.7.1.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>

  <!-- jQuery Scrollbar -->
  <script src="{{asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

  <!-- Chart JS -->
  <script src="{{asset('admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

  <!-- jQuery Sparkline -->
  <script src="{{asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

  <!-- Chart Circle -->
  <script src="{{asset('admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

  <!-- Datatables -->
  <script src="{{asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

  <!-- Bootstrap Notify -->
  <script src="{{asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

  <!-- jQuery Vector Maps -->
  <script src="{{asset('admin/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
  <script src="{{asset('admin/assets/js/plugin/jsvectormap/world.js')}}"></script>

  <!-- Sweet Alert -->
  <script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

  <!-- Kaiadmin JS -->
  <script src="{{asset('admin/assets/js/kaiadmin.min.js')}}"></script>

  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  @yield('scripts')
</body>

</html>