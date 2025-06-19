<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
     <!-- Sidebar Search -->
<div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      {{-- Dashboard (Dropdown) --}}
      <li class="nav-item {{ request()->is('dashboard*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Statistik</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dokters.create') }}" class="nav-link {{ request()->is('dokters/create') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Register Dokter</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('periksa.pasien') }}" class="nav-link {{ request()->is('periksas*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Periksa Pasien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('periksa.dokter') }}" class="nav-link {{ request()->is('periksas*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Periksa Dokter</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('obats.index') }}" class="nav-link {{ request()->is('obats*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manajemen Obat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('periksa.create') }}" class="nav-link {{ request()->is('periksa*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Periksa Pasien Diagnosa</p>
            </a>
          </li>
        </ul>
      </li>

      {{-- Pasien (Dropdown) --}}
      <li class="nav-item {{ request()->is('pasiens*') || request()->is('obats*') || request()->is('dokters*') || request()->is('periksas*') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ request()->is('pasiens*') || request()->is('obats*') || request()->is('dokters*') || request()->is('periksas*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-database"></i>
          <p>
            Pasien
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('pasiens.index') }}" class="nav-link {{ request()->is('pasiens*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manajemen Pasien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dokters.index') }}" class="nav-link {{ request()->is('dokters*') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Dokter</p>
            </a>
          </li>

        </ul>
      </li>

      {{-- Tambahan menu lainnya --}}
      <li class="nav-item">
        <a href="" class="nav-link {{ request()->routeIs('widgets') ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Widgets
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->

    </div>
  </aside>
