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
                        <a href="{{ route('landing_page') }}" class="nav-link">
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing_page') }}#berita">
                            Berita
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL BERITA --}}
    <div class="container mt-5 p-5">
        <div class="section-title">
            <h2>Berita</h2>
            <p>Berita Update</p>
            <hr>
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
