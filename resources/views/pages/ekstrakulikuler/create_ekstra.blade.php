@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">
<div class="row justify-content-center">

    <div class="col-md-7">

        <div class="bg-light rounded p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="mb-1">Tambah Ekstrakurikuler</h4>
                    <p class="text-muted mb-0">
                        Tambahkan data ekstrakurikuler baru
                    </p>
                </div>

                <a href="{{ route('admin.ekskul.index') }}"
                   class="btn-custom btn-custom-light">

                    <i class="bi bi-arrow-left"></i>
                    Kembali

                </a>

            </div>

            <form action="{{ route('admin.ekskul.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- Nama Ekskul --}}
                <div class="mb-3">

                    <label class="form-label">
                        Nama Ekstrakurikuler
                    </label>

                    <input type="text"
                           name="nama_ekskul"
                           class="form-control @error('nama_ekskul') is-invalid @enderror"
                           value="{{ old('nama_ekskul') }}"
                           maxlength="40"
                           placeholder="Contoh: Futsal">

                    @error('nama_ekskul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Pembina --}}
                <div class="mb-3">

                    <label class="form-label">
                        Pembina
                    </label>

                    <input type="text"
                           name="pembina"
                           class="form-control @error('pembina') is-invalid @enderror"
                           value="{{ old('pembina') }}"
                           maxlength="40"
                           placeholder="Nama pembina">

                    @error('pembina')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Jadwal --}}
                <div class="mb-3">

                    <label class="form-label">
                        Jadwal Latihan
                    </label>

                    <input type="text"
                           name="jadwal_latihan"
                           class="form-control @error('jadwal_latihan') is-invalid @enderror"
                           value="{{ old('jadwal_latihan') }}"
                           maxlength="40"
                           placeholder="Contoh: Senin & Rabu, 15:00">

                    @error('jadwal_latihan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">

                    <label class="form-label">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                              rows="5"
                              class="form-control @error('deskripsi') is-invalid @enderror"
                              placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Gambar --}}
                <div class="mb-4">

                    <label class="form-label">
                        Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control @error('gambar') is-invalid @enderror"
                           accept="image/*">

                    <small class="text-muted">
                        Format: JPG, JPEG, PNG. Maksimal 2 MB.
                    </small>

                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">

                    <button type="submit"
                            class="btn-custom btn-custom-primary">

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
