@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="bg-light rounded p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="mb-1">Edit Berita</h4>
                        <p class="text-muted mb-0">
                            Perbarui data berita
                        </p>
                    </div>

                    <a href="{{ route('admin.berita.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </div>


                <form action="{{ route('admin.berita.update', $berita->id_berita) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="mb-3">

                        <label class="form-label">
                            Judul Berita
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $berita->judul) }}"
                            maxlength="50"
                            placeholder="Masukkan judul berita"
                        >

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Isi Berita
                        </label>

                        <textarea
                            name="isi"
                            rows="8"
                            class="form-control @error('isi') is-invalid @enderror"
                            placeholder="Masukkan isi berita"
                        >{{ old('isi', $berita->isi) }}</textarea>

                        @error('isi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Tanggal
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal', $berita->tanggal) }}"
                        >

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                        >

                            <option value="Publish"
                                {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft"
                                {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Gambar Saat Ini
                        </label>

                        <div>

                            @if($berita->gambar)

                                <img
                                    src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                    width="180"
                                    height="120"
                                    style="object-fit: cover; border-radius: 8px;"
                                >

                            @else

                                <p class="text-muted">
                                    Belum ada gambar.
                                </p>

                            @endif

                        </div>

                    </div>


                    <div class="mb-4">

                        <label class="form-label">
                            Ganti Gambar
                        </label>

                        <input
                            type="file"
                            name="gambar"
                            class="form-control @error('gambar') is-invalid @enderror"
                            accept="image/*"
                        >

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
                            Format JPG, JPEG, PNG. Maksimal 2 MB.
                        </small>

                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.berita.index') }}"
                           class="btn btn-secondary">
                            Batal
                        </a>

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save"></i>
                            Update

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

