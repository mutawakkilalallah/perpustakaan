<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link bg-success">
    <img
      src="/img/logo.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: 0.8"
    />
    <span class="brand-text font-weight-bold">MAKTABAH</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar text-sm">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul
        class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false"
      >
        <li class="nav-item">
          <a href="/" class="nav-link {{ ($title === "Dashboard" ? "active" : "") }}">
            <i class="nav-icon far fa-chart-bar"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/maintenance" class="nav-link">
            <i class="nav-icon fas fa-qrcode"></i>
            <p>Scan QR Code</p>
          </a>
        </li>

        {{-- sysadmin --}}
        @if (auth()->user()->akses == "sysadmin")
          @include('components.supervisorSidebar')
          @include('components.adminSidebar')
          @include('components.sysadminSidebar')
        @elseif (auth()->user()->akses == "admin")
          @include('components.supervisorSidebar')
          @include('components.adminSidebar')
        @else
          @include('components.supervisorSidebar')
        @endif
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
