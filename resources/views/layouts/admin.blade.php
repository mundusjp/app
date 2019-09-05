<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('admin.parts.head')
<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    @include('admin.parts.navbar')
    @include('admin.parts.sidebar')
    @yield('content')
    @include('admin.parts.footer')
    @include('admin.parts.footer-script')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
  </div>
  <!-- ./wrapper -->
</body>
</html>
