<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $profil->nama_sekolah ?? 'BSW - Best Student Website' }}
    </title>

    <meta name="description" content="{{ $profil->deskripsi ?? 'Website resmi sekolah' }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    {{-- link ke css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">

</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar navbar-expand-lg navbar-custom">

        <div class="container">

            <a class="navbar-brand" href="/">
                <i class="bi bi-book-half"></i>

                {{ $profil->nama_sekolah ?? 'BSW' }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <i class="bi bi-list text-white"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#profil">
                            Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berita">
                            Berita
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#pengumuman">
                            Pengumuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#visi-misi">
                            Visi & Misi
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-login">
                            Login
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>


    <!-- ================= HERO ================= -->

    <section class="hero" id="beranda">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <p class="mb-2">
                        SELAMAT DATANG DI
                    </p>

                    <h1>

                        {{ $profil->nama_sekolah ?? 'Best Student Website' }}

                    </h1>

                    <p>

                        {{ $profil->deskripsi ??
                            'Website informasi dan profil sekolah yang menyediakan berbagai informasi untuk siswa, guru, dan masyarakat.' }}

                    </p>

                    <a href="#profil" class="btn-hero">

                        Kenal Lebih Dekat

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


                <div class="col-lg-5 text-center">

                    @if ($profil && $profil->logo)
                        <img src="{{ asset('uploads/profile/' . $profil->logo) }}" class="hero-logo" alt="Logo Sekolah">
                    @else
                        <i class="bi bi-book-half" style="font-size: 180px; color: var(--brand-lime);">
                        </i>
                    @endif

                </div>

            </div>

        </div>

    </section>


    <!-- ================= PROFIL ================= -->

    <section class="section" id="profil">

        <div class="container">

            <div class="section-title">

                <h2>Profil Sekolah</h2>

                <p>
                    Mengenal lebih dekat sekolah kami
                </p>

            </div>

            <div class="profile-card">

                <div class="row align-items-center g-5">

                    <div class="col-lg-5">

                        @if ($profil && $profil->foto)
                            <img src="{{ asset('uploads/profile/' . $profil->foto) }}" class="profile-image"
                                alt="Foto Sekolah">
                        @else
                            <div class="text-center p-5">

                                <i class="bi bi-building" style="font-size: 120px; color: var(--brand-light);">
                                </i>

                            </div>
                        @endif

                    </div>

                    <div class="col-lg-7">

                        <h3>
                            {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                        </h3>

                        <p>
                            {{ $profil->deskripsi ?? 'Deskripsi sekolah belum tersedia.' }}
                        </p>

                        @if ($profil)
                            <div class="row mt-4">

                                <div class="col-md-6 mb-3">

                                    <strong>
                                        <i class="bi bi-person"></i>
                                        Kepala Sekolah
                                    </strong>

                                    <p class="mb-0">
                                        {{ $profil->kepala_sekolah }}
                                    </p>

                                </div>

                                <div class="col-md-6 mb-3">

                                    <strong>
                                        <i class="bi bi-calendar"></i>
                                        Tahun Berdiri
                                    </strong>

                                    <p class="mb-0">
                                        {{ $profil->tahun_berdiri }}
                                    </p>

                                </div>

                                <div class="col-md-6">

                                    <strong>
                                        <i class="bi bi-geo-alt"></i>
                                        Alamat
                                    </strong>

                                    <p class="mb-0">
                                        {{ $profil->alamat }}
                                    </p>

                                </div>

                                <div class="col-md-6">

                                    <strong>
                                        <i class="bi bi-telephone"></i>
                                        Kontak
                                    </strong>

                                    <p class="mb-0">
                                        {{ $profil->kontak }}
                                    </p>

                                </div>

                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ================= Berita ================= -->
    <section class="section berita" id="berita">
        <div class="container">
            <div class="section-title">
                <h2>Berita</h2>
                <p >
                    Berita Update
                </p>
            </div>
            <div class="row g-4">

                @foreach ($berita as $item)
                    <div class="col-md-4">
                        <div class="card h-100">

                            @if ($item->gambar)
                                <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="card-img-top" style="height: 220px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $item->judul }}
                                </h5>

                                <p class="text-muted">
                                    {{ $item->tanggal }}
                                </p>

                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ================= Pengumuman ================= -->
    <section class="section pengumuman" id="pengumuman">
        <div class="container">
            <div class="section-title">
                <h2>Pengumuman</h2>
                <p>
                    informasi & Pemberitahuan
                </p>
            </div>
            <div class="row g-4">
                
                @foreach ($pengumumans as $item)
                    <div class="col-md-4">
                        <div class="card h-100">
                        <h4>Pengumuman</h4>
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $item->judul }}
                                </h5>

                                <p class="text-muted">
                                    {{ $item->isi }}
                                </p>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <!-- ================= VISI MISI ================= -->

    <section class="section visi-misi" id="visi-misi">

        <div class="container">

            <div class="section-title">

                <h2>Visi & Misi</h2>

                <p class="text-light">
                    Landasan dan tujuan sekolah
                </p>

            </div>

            <div class="row g-4">

                <div class="col-lg-6">

                    <div class="visi-card">

                        <i class="bi bi-eye"></i>

                        <h4>Visi</h4>

                        <p>
                            {{ $profil->visi_misi ?? 'Visi sekolah belum tersedia.' }}
                        </p>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="visi-card">

                        <i class="bi bi-bullseye"></i>

                        <h4>Tentang Sekolah</h4>

                        <p>
                            {{ $profil->deskripsi ?? 'Informasi sekolah belum tersedia.' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer>

        <div class="container text-center">

            <p>
                &copy; {{ date('Y') }}

                {{ $profil->nama_sekolah ?? 'BSW - Best Student Website' }}

                . All Rights Reserved.
            </p>

        </div>

    </footer>


    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
