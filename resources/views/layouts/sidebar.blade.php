<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->role_user == 'mahasiswa')
            <li class="nav-item {{ request()->is('mahasiswa/konsultasi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('konsultasi.index') }}">
                    <i class="icon-mail menu-icon"></i>
                    <span class="menu-title">Konsultasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('jadwal*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('mahasiswa.lihatjadwal') }}">
                    <i class="icon-air-play menu-icon"></i>
                    <span class="menu-title">Lihat Jadwal</span>
                </a>
            </li>
        @elseif (Auth::user()->role_user == 'konselor')
            <li class="nav-item {{ request()->is('konselor/jadwal*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jadwal.index') }}">
                    <i class="icon-air-play menu-icon"></i>
                    <span class="menu-title">Jadwal</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('konselor/rekapdata*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('konselor.rekapdata') }}">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Rekap Data</span>
                </a>
            </li>
        @elseif (Auth::user()->role_user == 'admin')
            <li class="nav-item {{ request()->is('admin/rekapdata*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Rekap Data</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
