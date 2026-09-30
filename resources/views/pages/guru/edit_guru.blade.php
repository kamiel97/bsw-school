@extends('admin')

@section('content')

    <div class="container-fluid pt-5 px-4">
        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="bg-light rounded p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                    {{-- Judul --}}
                    <div class="mb-4">
                        <h3 class="mb-1">Edit Data Guru</h3>
                        <p class="text-muted mb-0">
                            Ubah informasi data guru
                        </p>
                    </div>
                    <a href="{{ route('admin.guru.index') }}" class="btn-custom btn-custom-light">
                        <i class="bi bi-arrow-left"></i>
                        Kembali
                    </a>
                    </div>


                    {{-- Pesan error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.guru.update', $guru->id_guru) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- Nama Guru --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Guru</label>

                            <input type="text" name="nama_guru" class="form-control"
                                value="{{ old('nama_guru', $guru->nama_guru) }}" maxlength="40" required>
                        </div>

                        {{-- NIP --}}
                        <div class="mb-3">
                            <label class="form-label">NIP</label>

                            <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}"
                                maxlength="15" required>
                        </div>

                        {{-- Mata Pelajaran --}}
                        <div class="mb-3">
                            <label class="form-label">Mata Pelajaran</label>

                            <input type="text" name="mapel" class="form-control"
                                value="{{ old('mapel', $guru->mapel) }}" maxlength="40" required>
                        </div>

                        {{-- Foto Lama --}}
                        <div class="mb-3">
                            <label class="form-label">Foto Saat Ini</label>
                            <br>

                            @if ($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" width="100" height="100"
                                    class="rounded" style="object-fit: cover;">
                            @endif
                        </div>

                        {{-- Foto Baru --}}
                        <div class="mb-4">
                            <label class="form-label">Ganti Foto</label>

                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>

                        <div class="d-flex gap-2">

                            <button type="submit" class="btn-custom btn-custom-primary">
                                <i class="bi bi-save"></i>
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

@endsection
