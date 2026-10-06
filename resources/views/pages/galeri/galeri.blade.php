@extends('admin')

@section('content')
    <div class="container-fluid pt-5 px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Data Galeri</h3>
                <p class="text-muted mb-0">
                    Daftar foto dan video sekolah
                </p>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">

            <form action="{{ route('admin.galeri.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control" style="width: 350px;"
                    placeholder="Cari Galeri">

                <button type="submit" class="btn-custom btn-custom-primary">
                    <i class="bi bi-search"></i>
                </button>

                @if ($search)
                    <a href="{{ route('admin.galeri.index') }}" class="btn-custom btn-custom-secondary">
                        Reset
                    </a>
                @endif
            </form>

            <a href="{{ route('admin.galeri.create') }}" class="btn-custom btn-custom-primary">
                <i class="bi bi-plus-square"></i>
                Tambah Galeri
            </a>

        </div>



        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>File</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($galeris as $galeri)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                @if ($galeri->kategori == 'Foto')
                                    <img src="{{ asset('uploads/galeri/' . $galeri->file) }}" width="80" height="60"
                                        style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <video class="video-preview" controls width="80" height="60">
                                        <source src="{{ asset('uploads/galeri/' . $galeri->file) }} " type="video/mp4">
                                    </video>
                                @endif
                                <style>
                                    .video-preview {
                                        width: 80px;
                                        height: 60px;
                                        object-fit: cover;
                                        transition: 0.3s;
                                    }

                                    .video-preview:focus {
                                        width: 500px;
                                        height: 300px;
                                    }
                                </style>

                            </td>

                            <td>
                                {{ $galeri->judul }}
                            </td>

                            <td>
                                {{ Str::limit($galeri->keterangan, 50) }}
                            </td>

                            <td>

                                @if ($galeri->kategori == 'Foto')
                                    <span class="badge bg-primary">
                                        Foto
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Video
                                    </span>
                                @endif

                            </td>

                            <td>
                                {{ $galeri->tanggal }}
                            </td>

                            <td>

                                <a href="{{ route('admin.galeri.edit', Crypt::encryptString($galeri->id_galeri)) }}"
                                    class="table-btn-action" title="Ubah-baris">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="table-btn-action delete" title="Hapus-baris"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="bi bi-trash"></i>


                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center text-muted">
                                Belum ada data galeri.
                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>



    </div>
@endsection
