<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Berita - BSW</title>
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

                BERITA
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <i class="bi bi-list text-white"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                   <li class="nav-item">
                       <a href="{{ route('landing_page') }}#berita" class="btn btn-hero btn-sm rounded-pill px-3">
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
                <h3 class="fw-bold mb-1" style="color: #1B4F75;">BERITA</h3>
                <p class="text-muted mb-2">Berita Update</p>
                <div style="width: 300px; height: 4px; background: #1B4F75; border-radius: 4px;"></div>
            </div>
            <form action="{{ route('berita.public') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control"
                    style="width: 400px;" placeholder="Cari Berita">

                <button type="submit" class="btn" style="background:#1B4F75">
                    <i class="bi bi-search" style="color: white"></i>
                </button>

                @if ($search)
                    <a href="{{ route('berita.public') }}" class="btn btn-secondary">
                        Reset
                    </a>
                @endif
            </form>
        </div>
        <div class="row g-4">
            @foreach ($beritas as $item)
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
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
