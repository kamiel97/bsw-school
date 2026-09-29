@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    {{-- Selamat Datang --}}
    <div class="bg-light rounded p-4 mb-4">

        <h4 class="mb-1">
            Selamat Datang, {{ $user->name }}! 👋
        </h4>

        <p class="text-muted mb-0">
            Selamat datang kembali di Dashboard BSW.
        </p>

    </div>


    {{-- Jumlah Data --}}
    <div class="row g-4">

        {{-- User --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">User</p>
                    <h4>{{ $jumlahUser }}</h4>
                </div>

                <i class="bi bi-people dashboard-icon"></i>

            </div>
        </div>


        {{-- Guru --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">Guru</p>
                    <h4>{{ $jumlahGuru }}</h4>
                </div>

                <i class="bi bi-person-workspace dashboard-icon"></i>

            </div>
        </div>


        {{-- Siswa --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">Siswa</p>
                    <h4>{{ $jumlahSiswa }}</h4>
                </div>

                <i class="bi bi-mortarboard dashboard-icon"></i>

            </div>
        </div>


        {{-- Berita --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">Berita</p>
                    <h4>{{ $jumlahBerita }}</h4>
                </div>

                <i class="bi bi-newspaper dashboard-icon"></i>

            </div>
        </div>


        {{-- Pengumuman --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">Pengumuman</p>
                    <h4>{{ $jumlahPengumuman }}</h4>
                </div>

                <i class="bi bi-megaphone dashboard-icon"></i>

            </div>
        </div>


        {{-- Ekstrakurikuler --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">Ekstrakurikuler</p>
                    <h4>{{ $jumlahEkskul }}</h4>
                </div>

                <i class="bi bi-trophy dashboard-icon"></i>

            </div>
        </div>


        {{-- Galeri --}}
        <div class="col-sm-6 col-xl-3">
            <div class="dashboard-card">

                <div>
                    <p class="dashboard-label">Galeri</p>
                    <h4>{{ $jumlahGaleri }}</h4>
                </div>

                <i class="bi bi-images dashboard-icon"></i>

            </div>
        </div>

    </div>

</div>


<style>

.dashboard-card {
    background-color: var(--brand-forest-dark);
    border-radius: 12px;
    padding: 24px;
    min-height: 130px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    transition: 0.2s ease;
}

.dashboard-card:hover {
    background-color: #5b67757e;
    transform: translateY(-3px);
}

.dashboard-label {
    color: #ffffff;
    margin-bottom: 8px;
}

.dashboard-card h4 {
    color: #ffffff;
    margin: 0;
    font-weight: 700;
}

.dashboard-icon {
    color: #ffffff;
    font-size: 42px;
}

</style>

@endsection

