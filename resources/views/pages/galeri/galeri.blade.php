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

            <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-square"></i>
                Tambah Galeri
            </a>
        </div>

        @if(session('success'))
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

                                @if($galeri->kategori == 'Foto')

                                    <img
                                        src="{{ asset('uploads/galeri/' . $galeri->file) }}"
                                        width="80"
                                        height="60"
                                        style="object-fit: cover; border-radius: 6px;"
                                    >

                                @else

                                    <span class="badge bg-dark">
                                        <i class="bi bi-camera-video"></i>
                                        Video
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $galeri->judul }}
                            </td>

                            <td>
                                {{ Str::limit($galeri->keterangan, 50) }}
                            </td>

                            <td>

                                @if($galeri->kategori == 'Foto')
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

                                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}"
                                   class="btn btn-sm btn-warning">

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form
                                    action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    >

                                        <i class="bi bi-trash"></i>
                                        Hapus

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