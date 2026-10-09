<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $beritas->judul }} - BSW</title>

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #F4F6F5;
            color: #051C12;
        }

        .detail-berita {
            padding-top: 120px;
            padding-bottom: 80px;
        }

        .berita-container {
            max-width: 900px;
            margin: auto;
            padding: 40px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(5, 28, 18, 0.07);
        }

        .btn-kembali {
            display: inline-block;
            color: #072F1F;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 25px;
            transition: 0.25s ease;
        }

        .btn-kembali:hover {
            color: #1971d6;
            transform: translateX(-4px);
        }

        .berita-judul {
            font-size: clamp(26px, 4vw, 38px);
            font-weight: 800;
            line-height: 1.35;
            margin-bottom: 18px;
        }

        .berita-meta {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 28px;
        }

        .berita-gambar {
            width: 100%;
            max-height: 480px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 30px;
        }

        .berita-isi {
            font-size: 16px;
            line-height: 1.9;
            color: #343a40;
            overflow-wrap: anywhere;
        }

        @media (max-width: 576px) {
            .berita-container {
                padding: 24px 20px;
                border-radius: 14px;
            }

            .detail-berita {
                padding-top: 100px;
            }
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">

            <a class="navbar-brand" href="{{ route('landing_page') }}">
                <i class="bi bi-book-half"></i>
                BSW
            </a>

            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing_page') }}">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.berita.public') }}">Semua Berita</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    {{-- Detail Berita --}}
    <section class="detail-berita">
        <div class="container">

            <article class="berita-container">

                <a href="{{ route('public.berita.public') }}" class="btn-kembali">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Semua Berita
                </a>

                <h1 class="berita-judul">
                    {{ $beritas->judul }}
                </h1>

                <div class="berita-meta">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ \Carbon\Carbon::parse($beritas->tanggal)->translatedFormat('d F Y') }}

                    @if ($beritas->user)
                        <span class="mx-2">|</span>
                        <i class="bi bi-person me-1"></i>
                        {{ $beritas->user->name }}
                    @endif
                </div>

                @if ($beritas->gambar)
                    <img
                        src="{{ asset('uploads/berita/' . $beritas->gambar) }}"
                        alt="{{ $beritas->judul }}"
                        class="berita-gambar">
                @endif

                <div class="berita-isi">
                    {!! nl2br(e($beritas->isi)) !!}
                </div>

            </article>

        </div>
    </section>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
