@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="bg-light rounded p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h4 class="mb-1">Profil Sekolah</h4>
                <p class="text-muted mb-0">
                    Informasi profil sekolah
                </p>
            </div>

            <a href="{{ route('admin.profile.edit') }}"
               class="btn btn-primary">

                <i class="bi bi-pencil-square"></i>
                Edit Profil

            </a>

        </div>


        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if($profil)

            <div class="row">

                {{-- Foto Sekolah --}}
                <div class="col-md-4 text-center mb-4">

                    @if($profil->foto)

                        <img
                            src="{{ asset('uploads/profile/' . $profil->foto) }}"
                            class="img-fluid rounded"
                            style="max-height: 250px; object-fit: cover;"
                        >

                    @else

                        <div class="text-muted">
                            Belum ada foto sekolah.
                        </div>

                    @endif

                </div>


                {{-- Informasi Sekolah --}}
                <div class="col-md-8">

                    <div class="mb-3">

                        <label class="fw-bold">
                            Nama Sekolah
                        </label>

                        <p class="mb-0">
                            {{ $profil->nama_sekolah }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <label class="fw-bold">
                            Kepala Sekolah
                        </label>

                        <p class="mb-0">
                            {{ $profil->kepala_sekolah }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <label class="fw-bold">
                            NPSN
                        </label>

                        <p class="mb-0">
                            {{ $profil->npsn }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <label class="fw-bold">
                            Alamat
                        </label>

                        <p class="mb-0">
                            {{ $profil->alamat }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <label class="fw-bold">
                            Kontak
                        </label>

                        <p class="mb-0">
                            {{ $profil->kontak }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <label class="fw-bold">
                            Tahun Berdiri
                        </label>

                        <p class="mb-0">
                            {{ $profil->tahun_berdiri }}
                        </p>

                    </div>

                </div>

            </div>


            <hr>


            {{-- Logo --}}
            <div class="mb-4">

                <label class="fw-bold">
                    Logo Sekolah
                </label>

                <div class="mt-2">

                    @if($profil->logo)

                        <img
                            src="{{ asset('uploads/profile/' . $profil->logo) }}"
                            width="120"
                            height="120"
                            style="object-fit: contain;"
                        >

                    @else

                        <p class="text-muted">
                            Belum ada logo.
                        </p>

                    @endif

                </div>

            </div>


            {{-- Visi Misi --}}
            <div class="mb-4">

                <label class="fw-bold">
                    Visi & Misi
                </label>

                <p class="mt-2">
                    {!! nl2br(e($profil->visi_misi)) !!}
                </p>

            </div>


            {{-- Deskripsi --}}
            <div class="mb-2">

                <label class="fw-bold">
                    Deskripsi Sekolah
                </label>

                <p class="mt-2">
                    {!! nl2br(e($profil->deskripsi)) !!}
                </p>

            </div>


        @else

            <div class="text-center py-5">

                <i class="bi bi-building fs-1 text-muted"></i>

                <h5 class="mt-3">
                    Profil sekolah belum tersedia.
                </h5>

                <p class="text-muted">
                    Silakan tambahkan informasi profil sekolah.
                </p>

                <a href="{{ route('admin.profile.edit') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-square"></i>
                    Tambah Profil

                </a>

            </div>

        @endif

    </div>

</div>

@endsection

