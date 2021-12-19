<li class="nav-header">PENGATURAN</li>
    <li class="nav-item">
      <a href="/user" class="nav-link {{ ($title === "Data User" ? "active" : "") }}">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>User Account</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>Buku</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/master-data/kategori" class="nav-link {{ ($title === "Master Data - Kategori" ? "active text-white" : "text-success") }}">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Kategori</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Lemari</p>
      </a>
    </li>