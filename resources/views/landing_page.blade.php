<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profil->nama_sekolah ?? 'BSW - Best Student Website' }}</title>
    <meta name="description" content="{{ $profil->deskripsi ?? 'Website resmi sekolah' }}">

    {{-- Font Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>

  {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-book-half"></i>
                {{ $profil->nama_sekolah ?? 'BSW' }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pengumuman">Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="#visi-misi">Visi & Misi</a></li>
                </ul>
            </div>
        </div>
    </nav>


  {{-- hero/utama --}}
    <section class="hero" id="beranda">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">
                    <p class="hero-eyebrow">SELAMAT DATANG DI</p>

                    <h1 class="hero-title">
                        {{ $profil->nama_sekolah ?? 'Best Student Website' }}
                    </h1>

                    <p class="hero-desc">
                        {{ $profil->deskripsi ?? 'Website informasi dan profil sekolah yang menyediakan berbagai informasi untuk siswa, guru, dan masyarakat.' }}
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
                        <i class="bi bi-book-half hero-logo-icon"></i>
                    @endif
                </div>

            </div>
        </div>
    </section>

{{-- akademi --}}
    <section class="section akademik" id="akademik">
        <div class="container">
            <div class="row g-4">

                {{-- siswa --}}
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <span>Total</span>
                                <h2>{{  $jumlahsiswa }}</h2>
                            </div>
                            <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                        </div>
                        <div class="stat-bottom">
                            <h4>Jumlah Siswa</h4>
                            <small>Siswa terdaftar</small>
                        </div>
                    </div>
                </div>

                {{-- guru --}}
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <span>Total</span>
                                <h2>{{ $jumlahguru }}</h2>
                            </div>
                            <div class="stat-icon"><i class="bi bi-person-workspace"></i></div>
                        </div>
                        <div class="stat-bottom">
                            <h4>Jumlah Guru</h4>
                            <a href="{{ route('admin.guru.index') }}">
                                Lihat semua data
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- ekstra --}}
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <span>Total</span>
                                <h2>{{ $jumlahekstra }}</h2>
                            </div>
                            <div class="stat-icon"><i class="bi bi-trophy-fill"></i></div>
                        </div>
                        <div class="stat-bottom">
                            <h4>Ekstrakurikuler</h4>
                            <a href="{{ route('admin.ekskul.index') }}">
                                Lihat semua data
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- galeri --}}
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <span>Total</span>
                                <h2>{{ $jumlahgaleri }}</h2>
                            </div>
                            <div class="stat-icon"><i class="bi bi-images"></i></div>
                        </div>
                        <div class="stat-bottom">
                            <h4>Galeri</h4>
                            <a href="{{ route('admin.galeri.index') }}">
                                Lihat semua data
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


{{-- profil --}}
    <section class="section profile" id="profil">
        <div class="container">
            <div class="section-title">
                <h2>Profil Sekolah</h2>
                <p>Kenali lebih dekat sekolah kami</p>
            </div>

            <div class="profile-wrapper">
                <div class="profile-image-box">
                    @if ($profil && $profil->foto)
                        <img src="{{ asset('uploads/profile/' . $profil->foto) }}" class="profile-image" alt="Foto Sekolah">
                    @else
                        <div class="profile-placeholder">
                            <i class="bi bi-building"></i>
                        </div>
                    @endif
                </div>

                <div class="profile-content">
                    <span class="profile-label">PROFIL SEKOLAH</span>
                    <h3>{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</h3>
                    <p class="profile-description">
                        {{ $profil->deskripsi ?? 'Deskripsi sekolah belum tersedia.' }}
                    </p>

                    @if ($profil)
                        <div class="profile-details">
                            <div class="profile-detail">
                                <i class="bi bi-person"></i>
                                <div>
                                    <span>Kepala Sekolah</span>
                                    <strong>{{ $profil->kepala_sekolah }}</strong>
                                </div>
                            </div>
                            <div class="profile-detail">
                                <i class="bi bi-calendar3"></i>
                                <div>
                                    <span>Tahun Berdiri</span>
                                    <strong>{{ $profil->tahun_berdiri }}</strong>
                                </div>
                            </div>
                            <div class="profile-detail">
                                <i class="bi bi-geo-alt"></i>
                                <div>
                                    <span>Alamat</span>
                                    <strong>{{ $profil->alamat }}</strong>
                                </div>
                            </div>
                            <div class="profile-detail">
                                <i class="bi bi-telephone"></i>
                                <div>
                                    <span>Kontak</span>
                                    <strong>{{ $profil->kontak }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


{{-- berita --}}
    <section class="section berita" id="berita">
        <div class="container">
            <div class="section-title">
                <h2>Berita</h2>
                <p>Berita Update</p>
                <a href="{{ route('berita.public') }}" class="btn btn-public mt-3">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                @foreach ($berita->take(3) as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="berita-card h-100">
                            <div class="berita-image">
                                @if ($item->gambar)
                                    <img src="{{ asset('uploads/berita/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                @else
                                    <div class="berita-placeholder">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="berita-content">
                                <div class="berita-date">
                                    <i class="bi bi-newspaper"></i>
                                    {{ $item->tanggal }}
                                </div>
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


   {{-- pengumuman --}}
    <section class="section pengumuman" id="pengumuman">
        <div class="container">
            <div class="section-title">
                <h2>Pengumuman</h2>
                <p>Informasi & Pemberitahuan</p>
                <a href="{{ route('pengumuman.public') }}" class="btn btn-public mt-3">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                @foreach ($pengumumans as $pengumuman)
                    <div class="col-md-6 col-lg-4">
                        <div class="pengumuman-card h-100">
                            <div class="pengumuman-icon">
                                <i class="bi bi-megaphone-fill"></i>
                            </div>
                            <div class="pengumuman-content">
                                <div class="pengumuman-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ $pengumuman->tanggal }}
                                </div>
                                <h3>{{ $pengumuman->judul }}</h3>
                                <p>{{ $pengumuman->isi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


  {{-- visi misi --}}
    <section class="section visi-misi" id="visi-misi">
        <div class="container">
            <div class="section-title">
                <h2>Visi & Misi</h2>
                <p>Landasan dan tujuan sekolah</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="visi-card h-100">
                        <div class="visi-icon">
                            <i class="bi bi-eye"></i>
                        </div>
                        <div class="visi-content">
                            <span>VISI SEKOLAH</span>
                            <h3>Visi</h3>
                            <p>{{ $profil->visi_misi ?? 'Visi sekolah belum tersedia.' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="visi-card h-100">
                        <div class="visi-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="visi-content">
                            <span>TENTANG SEKOLAH</span>
                            <h3>Tentang Sekolah</h3>
                            <p>{{ $profil->deskripsi ?? 'Informasi sekolah belum tersedia.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


{{-- footerr --}}
    <footer>
        <div class="container text-center">
            <p>
                &copy; {{ date('Y') }}
                {{ $profil->nama_sekolah ?? 'BSW - Best Student Website' }}.
                All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
