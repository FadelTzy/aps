<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Admin</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        <li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard.admin') }}" class="nav-link "><i
                    class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item {{ Request::segment(2) == 'profil-lsp' ? 'active' : '' }}">
            <a href="{{ route('dashboard.admin') }}" class="nav-link "><i
                    class="fas fa-fire"></i><span>Informasi SLP PPHI</span></a>
        </li>
        <li class="menu-header">Manajemen Data</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Manajemen Berita</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Berita</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Kategori</a> </li>

            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Manajemen Pelatihan</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">Pelatihan</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Kategori</a> </li>

            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                <span>Manajemen Informasi</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="layout-default.html">TUK</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Agenda</a> </li>
                <li><a class="nav-link" href="layout-transparent.html">Pengumuman</a> </li>
                <li><a class="nav-link" href="layout-transparent.html">PUK</a> </li>
                <li><a class="nav-link" href="layout-transparent.html">Link</a> </li>
            </ul>
        </li>
        <li class="nav-item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard.admin') }}" class="nav-link "><i
                    class="fas fa-fire"></i><span>Manajemen Skema</span></a>
        </li>
        <li class="menu-header">Manajemen User</li>
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                <span>User</span></a></li>
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                <span>Profil User</span></a></li>
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                <span>Kontak</span></a></li>
    </ul>

    <div class=" mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Keluar
        </a>
    </div>
</aside>
