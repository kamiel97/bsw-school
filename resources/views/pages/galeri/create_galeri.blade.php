@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="bg-light rounded p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="mb-1">Tambah Galeri</h4>
                        <p class="text-muted mb-0">
                            Tambahkan foto atau video baru
                        </p>
                    </div>

                    <a href="{{ route('admin.galeri.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </div>

                <form action="{{ route('admin.galeri.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Judul
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul') }}"
                            maxlength="50"
                            placeholder="Contoh: Kegiatan Sekolah"
                        >

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            rows="5"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            placeholder="Masukkan keterangan galeri"
                        >{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="form-select @error('kategori') is-invalid @enderror"
                        >

                            <option value="">
                                -- Pilih Kategori --
                            </option>

                            <option value="Foto"
                                {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                Foto
                            </option>

                            <option value="Video"
                                {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                Video
                            </option>

                        </select>

                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            File
                        </label>

                        <input
                            type="file"
                            name="file"
                            class="form-control @error('file') is-invalid @enderror"
                            accept="image/*,video/*"
                        >

                        <small class="text-muted">
                            Foto: JPG, JPEG, PNG.
                            Video: MP4, MOV.
                            Maksimal 10 MB.
                        </small>

                        @error('file')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal') }}"
                        >

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.galeri.index') }}"
                           class="btn btn-secondary">
                            Batal
                        </a>

                        <button type="submit"
                                class="btn btn-primary">

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