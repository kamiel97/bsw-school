<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail-guru</title>
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    {{-- Font Plus Jakarta Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- link ke css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">

        <div class="container">

            <a class="navbar-brand" href="/">
                <i class="bi bi-book-half" style="  font-family:'plus Jakarta', serif ;"></i>

                GURU
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <i class="bi bi-list"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing_page') }}#guru">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.guru.public') }}">Semua Guru</a></li>
                </ul>

            </div>

        </div>

    </nav>
    <div class="container guru-detail-wrapper mt-5">
        <div class="row g-4 g-lg-5 align-items-start">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="guru-card h-100">
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6">
                <div class="section-detail guru-detail-content">
                    <hr>
                    <p>Nama</p>
                    <h2 class="guru-detail-nama mt-0 mb-4">{{ $guru->nama_guru }}</h2>
                    <hr>
                    <p>Mata Pelajaran</p>
                    <h2 class="guru-detail-mapel mb-4 mb-lg-5 mt-3">
                        <i class="bi bi-book-half me-2 me-lg-3"></i>{{ $guru->mapel }}
                    </h2>
                    <hr>
                    <p>NIP</p>
                    <h2 class="guru-detail-nip">{{ $guru->nip }}</h2>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
