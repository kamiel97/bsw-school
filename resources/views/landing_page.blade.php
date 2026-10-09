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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

{{-- na body ditambah ini biar pas scrol dan link active --}}
<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-smooth-scroll="true" tabindex="0">

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
                    <li class="nav-item"><a class="nav-link" href="#guru">Guru</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ekstra">Ekstrakurikuler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pengumuman">Pengumuman</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
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

                    <a href="#profil" class="btn-custom btn-hero">
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
            <div class="row g-4 justify-content-center">

                {{-- siswa --}}
                <div class="col-md-6 col-lg-3">
                    <div class="stat-card">
                        <div class="stat-top">
                            <div>
                                <span>Total</span>
                                <h2>{{ $jumlahsiswa }}</h2>
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
                            <a href="{{ route('guru.public') }}">
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
                            <a href="{{ route('ekstra.public') }}">
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
                            <a href="{{ route('galeri.public') }}">
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
                        <img src="{{ asset('uploads/profile/' . $profil->foto) }}" class="profile-image"
                            alt="Foto Sekolah">
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
        <div class="container" style="margin-top: 100px">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="visi-card h-100">
                        <div class="visi-content">
                            <h3>Visi & Misi</h3>
                            <span>Landasan dan tujuan sekolah</span>
                            <hr>
                            <p style="white-space: pre-line;">
                                {{ $profil->visi_misi ?? 'Visi sekolah belum tersedia.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- guru --}}
    <section class="section guru" id="guru">
        <div class="container">
            <div class="section-title">
                <h2>Guru</h2>
                <p>Staf Pendidikan & Tenaga Kerja</p>
                <a href="{{ route('guru.public') }}" class="btn btn-public mt-3">
                    Lihat Semua
                </a>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($gurus as $item)
                    <div class="col-md-6 col-lg-3">
                        <div class="guru-card h-100">
                            <div class="guru-image">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_guru }}">
                                @else
                                    <div class="guru-placeholder">
                                        <i class="bi bi-person"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="guru-content">
                                <h3>{{ $item->nama_guru }}</h3>

                                <p><i class="bi bi-book-half me-2" style="color: #1B4F75"></i>{{ $item->mapel }}</p>

                                <button class="btn-custom btn-detail">lihat selengkapnya</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ekskul --}}
    <section class="section ekstrakulikuler" id="ekstra">
        <div class="container">
            <div class="section-title">
                <h2>Ekstrakulikuler</h2>
                <p>Kembangkan Minat dan Bakatmu</p>
                <a href="{{ route('ekstra.public') }}" class="btn btn-public mt-3">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4">
                @foreach ($ekstras as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="ekstra-card h-100">
                            <div class="ekstra-image">
                                @if ($item->gambar)
                                    <img src="{{ asset('uploads/ekstrakurikuler/' . $item->gambar) }}"
                                        alt="{{ $item->nama_ekskul }}">
                                @endif
                            </div>

                            <div class="ekstra-content">
                                <h3>{{ $item->nama_ekskul }}</h3>
                                <hr>
                                <div class="container">
                                    <p><i class="bi bi-person-fill"> </i><strong>Pembina :</strong>
                                        {{ $item->pembina }}</p>
                                    <p><i class="bi bi-clock-fill"> </i><strong>Jadwal :</strong>
                                        {{ $item->jadwal_latihan }}</p>
                                    <p>{{ $item->deskripsi }}</p>
                                </div>
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

            <div class="row g-4 justify-content-center">
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

            <div class="row g-4 justify-content-center">
                @foreach ($berita as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="berita-card h-100">
                            <div class="berita-image">
                                @if ($item->gambar)
                                    <img src="{{ asset('uploads/berita/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}">
                                @else
                                    <div class="berita-placeholder">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                @endif
                            </div>

                            <div class="berita-content">
                                <h3><i class="bi bi-newspaper me-2"></i>{{ $item->judul }}</h3>
                                <div class="berita-date">
                                    {{ $item->tanggal }}
                                </div>
                                <a href="" style="text-decoration: none; color: #4DA3FF">Lihat Selengkapnya <i
                                        class="bi bi-arrow-right"></i></a>
                                {{-- <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}</p> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- galeri --}}
    <section class="section galeri" id="galeri">
        <div class="container">
            <div class="section-title">
                <h2>Galeri</h2>
                <p>Publikasi & Dokumentasi</p>
                <a href="{{ route('galeri.public') }}" class="btn btn-public mt-3">
                    Lihat Semua
                </a>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($galeris as $item)
                    <div class="col-lg-4">
                        <div class="galeri-card h-100">
                            <div class="galeri-image rounded-top">
                                @if ($item->kategori == 'Foto')
                                    <img src="{{ asset('uploads/galeri/' . $item->file) }}"
                                        style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <video class="video-preview" controls>
                                        <source src="{{ asset('uploads/galeri/' . $item->file) }} " type="video/mp4">
                                    </video>
                                @endif
                                <style>
                                    .video-preview {
                                        width: 100%;
                                        height: 100%;
                                        object-fit: cover;
                                        transition: 0.3s;
                                    }
                                </style>
                            </div>

                            <div class="galeri-content mt-1">
                                <div class="container d-flex justify-content-between align-items-center">
                                    <h3>{{ $item->judul }}</h3>
                                    <p><strong>Kategori : </strong>{{ $item->kategori }}</p>
                                </div>
                                <hr class="my-2">
                                <p class="mt-0 mb-0"><i class="bi bi-info-circle-fill me-1"> </i> <strong>Keterangan :
                                    </strong>{{ $item->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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
