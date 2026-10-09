<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Pengumuman - BSW</title>
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

                <i class="bi bi-list text-white"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a href="{{ route('landing_page') }}#guru" class="btn btn-hero btn-sm rounded-pill px-3">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL GURU --}}
    <div class="container mt-5 p-5">
        <div class="section-title d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
            <div class="text-start">
                <h3 class="fw-bold mb-1" style="color: #1B4F75; ">GURU</h3>
                <p class="text-muted mb-2">Staf Pendidikan & Tenaga Kerja</p>
                <div style="width: 300px; height: 4px; background: #1B4F75; border-radius: 4px;"></div>
            </div>
            <form action="{{ route('public.guru.public') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control"
                    style="width: 400px;" placeholder="Cari nama atau mapel">

                <button type="submit" class="btn" style="background: #1B4F75;">
                    <i class="bi bi-search" style="color: white"></i>
                </button>

                @if ($search)
                    <a href="{{ route('public.guru.public') }}" class="btn btn-secondary">
                        Reset
                    </a>
                @endif
            </form>
        </div>
        {{-- card --}}
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

                            <p><i class="bi bi-book-half me-2" style="color: #1B4F75"></i>{{ $item->mapel }}</p>

                            <a href="{{ route('detail.guru.detail', Crypt::encryptString($item->id_guru)) }}"
                                class="btn-custom btn-detail">
                                Lihat Selengkapnya
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
