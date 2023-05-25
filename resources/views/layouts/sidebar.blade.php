<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile border-bottom">
        <a href="#" class="nav-link flex-column">
          <div class="nav-profile-image">
            <img src="../assets/images/faces/face1.jpg" alt="profile" />
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
            <span class="font-weight-semibold mb-1 mt-2 text-center">Antonio Olson</span>
          </div>
        </a>
      </li>
      <li class="pt-2 pb-1">
        <span class="nav-item-head">MENU</span>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('dashboard') }}" active>
          <i class="mdi mdi-compass-outline menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('role') }}">
          <i class="mdi mdi-contacts menu-icon"></i>
          <span class="menu-title">Role</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('jadwal.mapel') }}">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Jadwal Mapel</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas') }}l">
          <i class="mdi mdi-chart-bar menu-icon"></i>
          <span class="menu-title">Kelas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('krs') }}">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">KRS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('mapel') }}">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Mata Pelajaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('nilai') }}">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('semester') }}">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">Semester</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('thn.ajaran') }}">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">tahun Ajaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('krs') }}">
          <i class="mdi mdi-table-large menu-icon"></i>
          <span class="menu-title">KRS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('absensi') }}">
          <i class="mdi mdi-bell menu-icon"></i>
          <span class="menu-title">Absensi</span>
        </a>
      </li>
      <li class="nav-item pt-3">
        <a class="nav-link" href="http://bootstrapdash.com/demo/plus-free/documentation/documentation.html" target="_blank">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>