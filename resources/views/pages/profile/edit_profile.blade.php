@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="bg-light rounded p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="mb-4">
            <h4 class="mb-1">Edit Profil Sekolah</h4>
            <p class="text-muted mb-0">
                Ubah informasi profil sekolah
            </p>
        </div>
         <a href="{{ route('admin.profile') }}"
                   class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
         </a>
         </div>

        <form action="{{ route('admin.profile.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- Nama Sekolah --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text"
                           name="nama_sekolah"
                           class="form-control"
                           value="{{ old('nama_sekolah', $profil->nama_sekolah ?? '') }}"
                           required>
                </div>

                {{-- Kepala Sekolah --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kepala Sekolah</label>
                    <input type="text"
                           name="kepala_sekolah"
                           class="form-control"
                           value="{{ old('kepala_sekolah', $profil->kepala_sekolah ?? '') }}"
                           required>
                </div>

                {{-- NPSN --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">NPSN</label>
                    <input type="text"
                           name="npsn"
                           class="form-control"
                           value="{{ old('npsn', $profil->npsn ?? '') }}"
                           required>
                </div>

                {{-- Kontak --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kontak</label>
                    <input type="text"
                           name="kontak"
                           class="form-control"
                           value="{{ old('kontak', $profil->kontak ?? '') }}"
                           required>
                </div>

                {{-- Tahun Berdiri --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tahun Berdiri</label>
                    <input type="number"
                           name="tahun_berdiri"
                           class="form-control"
                           value="{{ old('tahun_berdiri', $profil->tahun_berdiri ?? '') }}"
                           required>
                </div>

                {{-- Alamat --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              rows="3"
                              required>{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                </div>

                {{-- Visi Misi --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Visi & Misi</label>
                    <textarea name="visi_misi"
                              class="form-control"
                              rows="5"
                              required>{{ old('visi_misi', $profil->visi_misi ?? '') }}</textarea>
                </div>

                {{-- Deskripsi --}}
                <div class="col-12 mb-3">
                    <label class="form-label">Deskripsi Sekolah</label>
                    <textarea name="deskripsi"
                              class="form-control"
                              rows="5"
                              required>{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                </div>

                {{-- Foto --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Foto Sekolah</label>

                    @if($profil && $profil->foto)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/profile/' . $profil->foto) }}"
                                 width="150"
                                 height="100"
                                 style="object-fit: cover;"
                                 class="rounded">
                        </div>
                    @endif

                    <input type="file"
                           name="foto"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">
                </div>

                {{-- Logo --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label">Logo Sekolah</label>

                    @if($profil && $profil->logo)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/profile/' . $profil->logo) }}"
                                 width="100"
                                 height="100"
                                 style="object-fit: contain;"
                                 class="rounded">
                        </div>
                    @endif

                    <input type="file"
                           name="logo"
                           class="form-control"
                           accept=".jpg,.jpeg,.png">
                </div>

            </div>

            {{-- Error Validasi --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Tombol --}}
            <div class="d-flex gap-2">
                <button type="submit"
                        class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

