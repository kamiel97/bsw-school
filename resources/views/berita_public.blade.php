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

            SEMUA BERITA
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
        <div class="row g-4">
            @foreach ($beritas as $berita)
                <div class="col-md-4">
                    <div class="card -100">
                        @if ($berita->gambar)
                                <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="card-img-top" style="height: 220px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $berita->judul }}
                                </h5>

                                <p class="text-muted">
                                    {{ $berita->tanggal }}
                                </p>

                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}
                                </p>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
