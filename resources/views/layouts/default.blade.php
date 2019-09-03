<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('parts.head')
<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('parts.navbar')
    @include('parts.sidebar')
    @yield('content')
    @include('parts.footer')
    @include('parts.footer-script')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  </div>
  <!-- ./wrapper -->
</body>
</html>
