@extends('admin')

@section('content')

    <div class="container-fluid pt-5 px-4">
        <div class="row justify-content-center">

            <div class="col-md-7">

                <div class="bg-light rounded p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                    {{-- Judul --}}
                    <div class="mb-4">
                        <h3 class="mb-1">Tambah Data Guru</h3>
                        <p class="text-muted mb-0">
                            Tambahkan data guru baru
                        </p>
                    </div>
                     <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
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

                    <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        {{-- Nama Guru --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Guru</label>

                            <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru') }}"
                                maxlength="40" placeholder="Masukkan nama guru" required>
                        </div>

                        {{-- NIP --}}
                        <div class="mb-3">
                            <label class="form-label">NIP</label>

                            <input type="text" name="nip" class="form-control" value="{{ old('nip') }}"
                                maxlength="15" placeholder="Masukkan NIP" required>
                        </div>

                        {{-- Mata Pelajaran --}}
                        <div class="mb-3">
                            <label class="form-label">Mata Pelajaran</label>

                            <input type="text" name="mapel" class="form-control" value="{{ old('mapel') }}"
                                maxlength="40" placeholder="Masukkan mata pelajaran" required>
                        </div>

                        {{-- Foto --}}
                        <div class="mb-4">
                            <label class="form-label">Foto Guru</label>

                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-flex gap-2">

                             <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i>
                                Simpan
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

@endsection
