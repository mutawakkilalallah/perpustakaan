<li class="nav-header">DATA POKOK</li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link">
        <i class="nav-icon fas fa-pen-fancy"></i>
        <p>Karya Tulis</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Buku & Novel</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Kitab</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Karya Ilmiah</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/siswa" class="nav-link {{ ($title === "Data Siswa/i" ? "active" : "") }}">
        <i class="nav-icon fas fa-user"></i>
        @if (auth()->user()->akses == "perpus-putra")    
          <p>Siswa</p>
        @elseif (auth()->user()->akses == "perpus-putri")    
          <p>Siswi</p>
        @else   
          <p>Siswa/i</p>
        @endif
        </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link">
        <i class="nav-icon fas fa-user-tie"></i>
        @if (auth()->user()->akses == "perpus-putra")    
          <p>Musyrif</p>
        @elseif (auth()->user()->akses == "perpus-putri")    
          <p>Musyrifah</p>
        @else   
          <p>Musyrif/Musyrifah</p>
        @endif
      </a>
    </li>

<li class="nav-header">KEPUSTAKAAN</li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link">
        <i class="nav-icon fas fa-clipboard-list"></i>
        <p>Peminjaman</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link">
        <i class="nav-icon fas fa-file-signature"></i>
        <p>Ngaji Turast</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Bahtsul Masa'il</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Bahtsul Kutub</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/maintenance" class="nav-link text-success">
        <i class="nav-icon fas fa-caret-right"></i>
        <p>Ibarah / Refrensi</p>
      </a>
    </li>