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

                Galeri
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">

                <i class="bi bi-list text-white"></i>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                       <a href="{{ route('landing_page') }}#galeri" class="btn btn-hero btn-sm rounded-pill px-3">
                           <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </li>
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL galeri --}}
    <div class="container mt-5 p-5">
        <div class="section-title d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
            <div class="text-start">
                <h3 class="fw-bold mb-1" style="color: #1B4F75">GALERI</h3>
                <p class="text-muted mb-2">Pubilikasi & Dokumentasi</p>
                <div style="width: 300px; height: 4px; background: #1B4F75; border-radius: 4px;"></div>
            </div>
            <form action="{{ route('galeri.public') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control"
                    style="width: 400px;" placeholder="Cari Foto & Video">

                <button type="submit" class="btn" style="background: #1B4F75;">
                     <i class="bi bi-search" style="color: white"></i>
                </button>

                @if ($search)
                    <a href="{{ route('galeri.public') }}" class="btn btn-secondary">
                        Reset
                    </a>
                @endif
            </form>
        </div>
        <div class="row g-4">
            @foreach ($galeris as $item)
                <div class="col-md-6 col-lg-4">
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
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
