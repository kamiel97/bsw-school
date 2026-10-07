<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Pengumuman - BSW</title>
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    {{-- link ke css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">

        <div class="container">

            <a class="navbar-brand" href="/">
                <i class="bi bi-book-half"></i>

                PENGUMUMAN
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <i class="bi bi-list text-white"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                  <li class="nav-item">
                       <a href="{{ route('landing_page') }}#pengumuman" class="btn btn-hero btn-sm rounded-pill px-3">
                           <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL BERITA --}}
    <div class="container mt-5 p-5">
        <div class="section-title d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
            <div class="text-start">
                <h3 class="fw-bold mb-1" style="color: #1B4F75;">PENGUMUMAN</h3>
                <p class="text-muted mb-2">Informasi & Pemberitahuan</p>
                <div style="width: 300px; height: 4px; background: #1B4F75; border-radius: 4px;"></div>
            </div>
            <form action="{{ route('pengumuman.public') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control"
                    style="width: 400px;" placeholder="Cari Pengumuman">

                <button type="submit" class="btn" style=" background:#1B4F75;">
                    <i class="bi bi-search" style="color: white"></i>
                </button>

                @if ($search)
                    <a href="{{ route('pengumuman.public') }}" class="btn btn-secondary">
                        Reset
                    </a>
                @endif
            </form>
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
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
