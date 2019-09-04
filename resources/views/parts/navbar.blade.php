<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <form id="logout" method="POST" action="{{route('logout')}}">
          @csrf
          <a class="nav-link" href="javascript:{}" onclick="document.getElementById('logout').submit();">
            <i class="fa fa-sign-out"></i>Log out
          </a>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
