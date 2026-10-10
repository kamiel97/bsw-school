<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BSW - Best Student Website</title>

    <!-- SEO Optimization -->

    <meta name="description" content="Best Student Website">

    <meta name="author" content="BSW Team">

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="assets/images/image.png">

    <!-- Local Third-Party Libraries (100% Offline Compatible) -->

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Main Design System & Custom Stylesheet -->

    <link rel="stylesheet" href={{ asset('assets/css/main.css') }}>

</head>


<body>


    <!-- ==========================================
             START: Sidebar Component
             Highly polished, dark-green sticky navigation
             ========================================== -->

    <div class="sidebar-wrapper {{ request()->routeIs(
        'admin.user.create',
        'admin.user.edit',
        'admin.guru.create',
        'admin.guru.edit',
        'admin.siswa.create',
        'admin.siswa.edit',
        'admin.ekskul.create',
        'admin.ekskul.edit',
        'admin.berita.create',
        'admin.berita.edit',
        'admin.galeri.create',
        'admin.galeri.edit',
        'admin.pengumuman.create',
        'admin.pengumuman.edit',
        'admin.profile.edit',
    )
        ? 'sidebar-disabled'
        : '' }}"
        id="sidebar">

        <!-- Brand Logo / Identity -->

        <a href={{ '#' }} class="sidebar-brand">

            <i class="bi bi-book-half"></i>

            <span class="brand-title"  style="font-family: Plus Jakarta, serif">BSW</span>

        </a>


        <!-- Navigation Menu -->
        <div class="sidebar-menu-section">
            <ul class="sidebar-menu-list">

                <li class="sidebar-menu-item">

                    <a class="sidebar-menu-link {{ request()->is('dashboard') ? 'active' : '' }} "
                        href={{ 'dashboard' }}>

                        <i class="bi bi-grid-fill"></i>

                        <span>Beranda</span>

                    </a>

                </li>

            </ul>
        </div>
        <div class="flex-grow-1 overflow-y-auto">

            <!-- Group: Menu -->

            <div class="sidebar-menu-section">

                <div class="sidebar-menu-section">

                    <div class="sidebar-menu-title">
                        Akademik
                    </div>


                    <ul class="sidebar-menu-list">

                        <li class="sidebar-menu-item">

                            <a class="sidebar-menu-link {{ request()->is('guru') ? 'active' : '' }} "
                                href={{ 'guru' }}>

                                <i class="bi bi-person-vcard-fill"></i>

                                <span>Data guru</span>

                            </a>

                        </li>


                        <li class="sidebar-menu-item">

                            <a class="sidebar-menu-link {{ request()->is('siswa') ? 'active' : '' }} "
                                href={{ 'siswa' }}>

                                <i class="bi bi-people"></i>

                                <span>Data siswa</span>

                            </a>

                        </li>

                    </ul>
                    <ul class="sidebar-menu-list">

                        <li class="sidebar-menu-item">

                            <a class="sidebar-menu-link {{ request()->is('ekstra') ? 'active' : '' }} "
                                href={{ 'ekstra' }}>

                                <i class="bi bi-person-arms-up"></i>

                                <span>Ekstrakurikuler</span>

                            </a>

                        </li>

                    </ul>

                </div>

                <div class="sidebar-menu-title">
                    Publikasi
                </div>

                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a class="sidebar-menu-link {{ request()->is('galeri') ? 'active' : '' }} "
                            href={{ 'galeri' }}>

                            <i class="bi bi-images"></i>

                            <span>Galeri</span>

                        </a>

                    </li>

                </ul>
                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a class="sidebar-menu-link {{ request()->is('berita') ? 'active' : '' }} "
                            href={{ 'berita' }}>

                            <i class="bi bi-newspaper"></i>

                            <span>Berita</span>

                        </a>

                    </li>

                </ul>
                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a class="sidebar-menu-link {{ request()->is('pengumuman') ? 'active' : '' }} "
                            href={{ 'pengumuman' }}>

                            <i class="bi bi-bell"></i>

                            <span>Pengumuman</span>

                        </a>

                    </li>
                </ul>

            </div>


            {{-- ====================================== --}}

            <!-- Group: Components Sidebar-->




            <div class="sidebar-menu-section">

                <div class="sidebar-menu-title">
                    Lainnya
                </div>
                <ul class="sidebar-menu-list">

                    <li class="sidebar-menu-item">

                        <a class="sidebar-menu-link {{ request()->is('profile') ? 'active' : '' }} "
                            href={{ 'profile' }}>

                            <i class="bi bi-info-circle-fill"></i>

                            <span>Profile Sekolah</span>

                        </a>

                    </li>

                </ul>
                <ul class="sidebar-menu-list">

                    @if (Auth::user()->role === 'Admin')
                        <li class="sidebar-menu-item">

                            <a class="sidebar-menu-link {{ request()->is('user') ? 'active' : '' }} "
                                href={{ 'user' }}>

                                <i class="bi bi-person"></i>

                                <span>Pengguna</span>

                            </a>

                        </li>
                    @endif

                </ul>


            </div>
        </div>
    </div>


    <!-- ==========================================
             END: Sidebar Component
             ========================================== -->


    <!-- ==========================================
             START: Main Content Area
             ========================================== -->

    <div class="main-wrapper">

        <!-- START: Top Navbar Component -->

        <header class="navbar-custom">

            <div class="navbar-left">

                <!-- Desktop sidebar toggle (visible on large screens only) -->

                <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
                    id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">

                    <i class="bi bi-list"></i>

                </button>


                <!-- Mobile sidebar toggle -->

                <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation">

                    <i class="bi bi-list"></i>

                </button>

            </div>


            <!-- search-cari -->

            <div class="navbar-search-wrapper">

                {{-- <input type="text" class="navbar-search-input" placeholder="Cari data atau menu..." id="main-search">

                <button class="navbar-search-btn" aria-label="Search">

                    <i class="bi bi-search"></i>

                </button> --}}

            </div>


            <!-- Right actions -->

            <div class="navbar-actions">

                <!-- Logout -->

                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn-custom btn-custom-danger">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>
                </div>



        </header>

        <!-- END: Top Navbar Component -->


        <!-- START: Dashboard Header Banner -->

        <div class="page-header">


            <div class="school-date">

                <i class="bi bi-calendar3"></i>

                <span>
                    {{ date('d F Y') }}
                </span>

            </div>

        </div>

        <!-- END: Dashboard Header Banner -->


        <!-- START: Main Layout Grid (2 Columns: Dashboard + Performance Pane) -->

        <div class="row g-4">

            @yield('content')

        </div>

        <!-- END: Main Layout Grid -->


        <!-- START: Footer Component -->

        <footer class="footer-custom">

            <div class="footer-left">

                <span class="footer-logo">

                    <i class="bi bi-book-half"></i>

                    BSW

                </span>


                <span class="footer-separator">
                    |
                </span>


                <span class="footer-copy">

                    &copy; {{ date('Y') }} BSW - Best Student Website

                </span>

            </div>


            <div class="footer-right">

                <span class="footer-copy">

                    Sistem Informasi Sekolah

                </span>

            </div>

        </footer>

        <!-- END: Footer Component -->

    </div>


    <!-- ==========================================
             END: Main Content Area
             ========================================== -->


    <!-- Local Third-Party Libraries Script dependencies -->

    <script src={{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <script src={{ asset('assets/libs/apexcharts/apexcharts.min.js') }}></script>

    <script src={{ asset('assets/libs/flatpickr/flatpickr.min.js') }}></script>


    <!-- Local dashboard interactions controller -->

    <script src="assets/js/dashboard.js"></script>

</body>

</html>
