@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="bg-light rounded p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div>
                        <h4 class="mb-1">Edit Pengumuman</h4>
                        <p class="text-muted mb-0">
                            Perbarui data pengumuman
                        </p>
                    </div>

                    <a href="{{ route('admin.pengumuman.index') }}"
                       class="btn btn-secondary">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </div>

                <form action="{{ route('admin.pengumuman.update', $pengumuman->id_pengumuman) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Judul Pengumuman
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control @error('judul') is-invalid @enderror"
                            value="{{ old('judul', $pengumuman->judul) }}"
                            maxlength="50"
                            placeholder="Masukkan judul pengumuman"
                        >

                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Isi Pengumuman
                        </label>

                        <textarea
                            name="isi"
                            rows="8"
                            class="form-control @error('isi') is-invalid @enderror"
                            placeholder="Masukkan isi pengumuman"
                        >{{ old('isi', $pengumuman->isi) }}</textarea>

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
                            value="{{ old('tanggal', $pengumuman->tanggal) }}"
                        >

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                        >

                            <option value="Publish"
                                {{ old('status', $pengumuman->status) == 'Publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="Draft"
                                {{ old('status', $pengumuman->status) == 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="d-flex justify-content-end gap-2">

                        <a href="{{ route('admin.pengumuman.index') }}"
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

