@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">
<div class="row justify-content-center">

    <div class="col-md-7">

        <div class="bg-light rounded p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="mb-1">Tambah Siswa</h4>
                    <p class="text-muted mb-0">Tambahkan data siswa baru</p>
                </div>

                <a href="{{ route('admin.siswa.index') }}" class="btn-custom btn-custom-light">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>

            <form action="{{ route('admin.siswa.store') }}" method="POST">

                @csrf

                {{-- NISN --}}
                <div class="mb-3">
                    <label class="form-label">NISN</label>

                    <input type="text"
                           name="nisn"
                           class="form-control @error('nisn') is-invalid @enderror"
                           value="{{ old('nisn') }}"
                           maxlength="10"
                           placeholder="Masukkan NISN">

                    @error('nisn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>

                    <input type="text"
                           name="nama_siswa"
                           class="form-control @error('nama_siswa') is-invalid @enderror"
                           value="{{ old('nama_siswa') }}"
                           maxlength="40"
                           placeholder="Masukkan nama siswa">

                    @error('nama_siswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>

                    <select name="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror">

                        <option value="">-- Pilih Jenis Kelamin --</option>

                        <option value="Laki-Laki"
                            {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>

                        <option value="Perempuan"
                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tahun Masuk --}}
                <div class="mb-4">
                    <label class="form-label">Tahun Masuk</label>

                    <input type="number"
                           name="tahun_masuk"
                           class="form-control @error('tahun_masuk') is-invalid @enderror"
                           value="{{ old('tahun_masuk') }}"
                           min="2000"
                           max="2100"
                           placeholder="Contoh: 2026">

                    @error('tahun_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">

                    <button type="submit" class="btn-custom btn-custom-primary">
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
