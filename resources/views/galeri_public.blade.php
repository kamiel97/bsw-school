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

                Ekstrakulikuler
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
                </ul>

            </div>

        </div>

    </nav>

    {{-- ALL EKSTRA --}}
    <div class="container mt-5 p-5">
        <div class="section-title">
            <h2>Galeri</h2>
            <p>Publikasi dan Dokumentasi</p>
            <hr>
        </div>
        <div class="row g-4">
            @foreach ($galeris as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="galeri-card h-100">
                        <div class="galeri-image">
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

                        <div class="galeri-content">
                            <h3>{{ $item->judul }}</h3>
                            <hr>
                            <div class="container">
                                <p><i class="bi bi-info-circle-fill">   </i> <strong>Keterangan : </strong>{{ $item->keterangan }}</p>
                                <p><strong>Kategori : </strong>{{ $item->kategori }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
