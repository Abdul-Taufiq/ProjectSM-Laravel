{{-- body --}}
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-car" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sewa Mobil</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request() -> is('/') ? 'active' : '' }}" >
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    utama
                </div>

                <!-- Nav Item - Pages  Menu -->
                <li class="nav-item {{ request() -> is('sewa*', 'laporan-per-tanggal/sewa', 'add/sewa') ? 'active' : ''}}">
                    <a class="nav-link {{ request() -> is('sewa*', 'laporan-per-tanggal/sewa', 'add/sewa') ? 'aria-expanded= "true"' : 'collapsed'}}"href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                    <span>Data Sewa</span>
                </a>
                <div id="collapseTwo" class="collapse {{ request() -> is('sewa*', 'laporan-per-tanggal/sewa','add/sewa' ) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menampilkan Data:</h6>
                        <a class="collapse-item {{ Request::is('sewa*') ? 'active' : '' }}" href="/sewa">Data Sewa</a>
                        <a class="collapse-item {{ Request::is('sewa/create') ? 'active' : '' }}" href="/sewa/create">Tambah Data Sewa</a>
                        <a class="collapse-item {{ Request::is('laporan-per-tanggal/sewa') ? 'active' : '' }}" href="/laporan-per-tanggal/sewa">Cetak Laporan</a>
                    </div>
                </div>
            </li>

            {{-- Mobil --}}
            <li class="nav-item {{ request() -> is('mobil*', 'laporan-per-tanggal/mobil', 'add/mobil') ? 'active' : ''}}">
                    <a class="nav-link {{ request() -> is('mobil*', 'laporan-per-tanggal/mobil', 'add/mobil') ? 'aria-expanded= "true"' : 'collapsed'}}"href="#" data-toggle="collapse" data-target="#collapseTwomobil"
                    aria-expanded="true" aria-controls="collapseTwomobil">
                    <i class="fa fa-car" aria-hidden="true"></i>
                    <span>Data Mobil</span>
                </a>
                <div id="collapseTwomobil" class="collapse {{ request() -> is('mobil*', 'laporan-per-tanggal/mobil','add/mobil' ) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menampilkan Data:</h6>
                        <a class="collapse-item {{ Request::is('mobil*') ? 'active' : '' }}" href="/mobil">Data Mobil</a>
                        <a class="collapse-item {{ Request::is('add/mobil') ? 'active' : '' }}" href="/add/mobil">Tambah Data Mobil</a>
                        <a class="collapse-item {{ Request::is('laporan-per-tanggal/mobil') ? 'active' : '' }}" href="/laporan-per-tanggal/mobil">Cetak Laporan</a>
                    </div>
                </div>
            </li>

            {{-- Admin --}}
            <li class="nav-item {{ request() -> is('admin*', 'laporan-per-tanggal/admin', 'add/admin') ? 'active' : ''}}">
                    <a class="nav-link {{ request() -> is('admin*', 'laporan-per-tanggal/admin', 'add/admin') ? 'aria-expanded= "true"' : 'collapsed'}}"href="#" data-toggle="collapse" data-target="#collapseTwoadmin"
                    aria-expanded="true" aria-controls="collapseTwoadmin">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <span>Data Admin</span>
                </a>
                <div id="collapseTwoadmin" class="collapse {{ request() -> is('admin*', 'laporan-per-tanggal/admin','add/admin' ) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menampilkan Data:</h6>
                        <a class="collapse-item {{ Request::is('admin*') ? 'active' : '' }}" href="/admin">Data Admin</a>
                        <a class="collapse-item {{ Request::is('add/admin') ? 'active' : '' }}" href="/add/admin">Tambah Data admin</a>
                        <a class="collapse-item {{ Request::is('laporan-per-tanggal/admin') ? 'active' : '' }}" href="/laporan-per-tanggal/admin">Cetak Laporan</a>
                    </div>
                </div>
            </li>

            {{-- pelanggan --}}
            <li class="nav-item {{ request() -> is('pelanggan*', 'laporan-per-tanggal/pelanggan', 'add/pelanggan') ? 'active' : ''}}">
                    <a class="nav-link {{ request() -> is('pelanggan*', 'laporan-per-tanggal/pelanggan', 'add/pelanggan') ? 'aria-expanded= "true"' : 'collapsed'}}"href="#" data-toggle="collapse" data-target="#collapseTwopelanggan"
                    aria-expanded="true" aria-controls="collapseTwopelanggan">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Data Pelanggan</span>
                </a>
                <div id="collapseTwopelanggan" class="collapse {{ request() -> is('pelanggan*', 'laporan-per-tanggal/pelanggan','add/pelanggan' ) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menampilkan Data:</h6>
                        <a class="collapse-item {{ Request::is('pelanggan*') ? 'active' : '' }}" href="/pelanggan">Data Pelanggan</a>
                        <a class="collapse-item {{ Request::is('add/pelanggan') ? 'active' : '' }}" href="/add/pelanggan">Tambah Data Pelanggan</a>
                        <a class="collapse-item {{ Request::is('laporan-per-tanggal/pelanggan') ? 'active' : '' }}" href="/laporan-per-tanggal/pelanggan">Cetak Laporan</a>
                    </div>
                </div>
            </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

        <h4> Sistem Informasi Sewa Mobil </h4>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                    placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>


    <div class="topbar-divider d-none d-sm-block"></div>

</ul>

</nav>