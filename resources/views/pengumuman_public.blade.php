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

                SEMUA PENGUMUMAN
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
                        <a class="nav-link" href="{{ route('landing_page') }}#pengumuman">
                            Pengumuman
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL BERITA --}}
    <div class="container mt-5 p-5">
        <div class="row g-4">
            @foreach ($pengumumans as $pengumuman)
                <div class="col-md-4">
                    <div class="card -100">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $pengumuman->judul }}
                            </h5>
                            <p class="text-muted">
                                {{ $pengumuman->tanggal }}
                            </p>
                            <p class="text-muted">
                                {{ $pengumuman->isi }}
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
