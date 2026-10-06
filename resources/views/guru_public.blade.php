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

                GURU
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
                        <a class="nav-link" href="{{ route('landing_page') }}#guru">
                            Guru
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL GURU --}}
    <div class="container mt-5 p-5">
        <div class="section-title">
            <h2>Guru</h2>
            <p>Staf Pendidikan & Tenaga Kerja</p>
            <hr>
        </div>
        <div class="row g-4">
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
                            <p>{{ $item->mapel }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
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
