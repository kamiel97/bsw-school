@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@extends('admin')

@section('content')
    <div class="container-fluid pt-5 px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">Data Berita</h3>
                <p class="text-muted mb-0">
                    Daftar berita sekolah
                </p>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">

            <form action="{{ route('admin.berita.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control" style="width: 350px;"
                    placeholder="Cari Galeri">

                <button type="submit" class="btn-custom btn-custom-primary">
                    <i class="bi bi-search"></i>
                </button>

                @if ($search)
                    <a href="{{ route('admin.berita.index') }}" class="btn-custom btn-custom-secondary">
                        Reset
                    </a>
                @endif
            </form>

            <a href="{{ route('admin.berita.create') }}" class="btn-custom btn-custom-primary">

                <i class="bi bi-plus-square"></i>
                Tambah Berita

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
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($beritas as $berita)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                @if ($berita->gambar)
                                    <img src="{{ asset('uploads/berita/' . $berita->gambar) }}" width="80"
                                        height="60" style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <span class="text-muted">
                                        Tidak ada
                                    </span>
                                @endif

                            </td>


                            <td>
                                {{ $berita->judul }}
                            </td>


                            <td>

                                @if ($berita->user)
                                    {{ $berita->user->name }}
                                @else
                                    <span class="text-muted">
                                        User tidak tersedia
                                    </span>
                                @endif

                            </td>


                            <td>
                                {{ $berita->tanggal }}
                            </td>


                            <td>

                                @if ($berita->status == 'Publish')
                                    <span class="badge bg-success">
                                        Publish
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Draft
                                    </span>
                                @endif

                            </td>


                            <td>

                                <a href="{{ route('admin.berita.edit', Crypt::encryptString($berita->id_berita)) }}"
                                    class="table-btn-action" title="Ubah-baris">

                                    <i class="bi bi-pencil"></i>


                                </a>


                                <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}" method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="table-btn-action" title="Hapus-baris"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">

                                        <i class="bi bi-trash"></i>


                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center text-muted">
                                Belum ada berita.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>



    </div>
@endsection
