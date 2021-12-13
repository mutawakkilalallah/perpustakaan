<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-success navbar-light fixed-top">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a
        class="nav-link text-white"
        data-widget="pushmenu"
        href="#"
        role="button"
        ><i class="fas fa-bars"></i
      ></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown user-menu">
      <a
        href="#"
        class="nav-link dropdown-toggle"
        data-toggle="dropdown"
        aria-expanded="false"
      >
        <img
          src="/img/{{ $user->photo }}"
          class="user-image img-circle elevation-2"
          alt="User Image"
        />
        <div class="d-none d-md-inline">
          <span class="text-white">{{ $user->nama }}</span>
        </div>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
        style="left: inherit; right: 0px"
      >
        <!-- User image -->
        <li class="user-header bg-success">
          <img
            src="/img/{{ $user->photo }}"
            class="img-circle elevation-2"
            alt="User Image"
          />

          <p>
            &#64;{{ auth()->user()->username }}
            <small>( {{ auth()->user()->akses }} )</small>
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <form action="/logout" method="POST">
            @csrf
            <a href="/user/profile/{{ auth()->user()->uuid }}" class="btn btn-default btn-flat">Profil</a>
            <button type="submit" class="btn btn-default btn-flat float-right">Keluar</button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
