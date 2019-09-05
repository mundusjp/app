<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('user.parts.head')
<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('user.parts.navbar')
    @include('user.parts.sidebar')
    @yield('content')
    @include('user.parts.footer')
    @include('user.parts.footer-script')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  </div>
  <!-- ./wrapper -->
</body>
</html>
