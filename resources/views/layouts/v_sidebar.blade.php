  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('templates/')}}/index3.html" class="brand-link">
      <img src="{{asset('templates/')}}/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('templates/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          @if (Auth::user()->level == 1)
          <li class="nav-item has-treeview">
            <a href="/dashboard" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/siswa" class="nav-link {{ request()->is('siswa') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Siswa
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          @endif
          @if (Auth::user()->level == 2)
          <li class="nav-item has-treeview">
            <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          @endif
          @if (Auth::user()->level == 3)
          <li class="nav-item has-treeview">
            <a href="/dashboard" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/guru" class="nav-link {{ request()->is('guru') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Guru
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          @endif
          {{-- <li class="nav-item has-treeview">
            <a href="/dashboard" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/guru" class="nav-link {{ request()->is('guru') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Guru
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/siswa" class="nav-link {{ request()->is('siswa') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Siswa
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="/user" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                User
                <i class="right fas"></i>
              </p>
            </a>
          </li> --}}
          <li class="nav-item has-treeview">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-tachometer-alt"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>