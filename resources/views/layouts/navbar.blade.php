<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-kendo navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
          <div class="dropdown-divider"></div>
          <span class="dropdown-item dropdown-header">{{ Auth::user()->email }}</span>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item dropdown-footer" href="{{ route('profile.edit') }}">Profile</a>
          <div class="dropdown-divider"></div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item dropdown-footer" type="submit">Logout</button>
          </form>         
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->