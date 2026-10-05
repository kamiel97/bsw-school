@extends('admin')

@section('content')
    <div class="container-fluid pt-5 px-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Data Ekstrakurikuler</h3>
                <p class="text-muted mb-0">
                    Daftar ekstrakurikuler sekolah
                </p>
            </div>


        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">

            <form action="{{ route('admin.ekskul.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control" style="width: 350px;"
                    placeholder="Cari Ekskul">

                <button type="submit" class="btn-custom btn-custom-primary">
                    <i class="bi bi-search"></i>
                </button>

                @if ($search)
                    <a href="{{ route('admin.ekskul.index') }}" class="btn-custom btn-custom-secondary">
                        Reset
                    </a>
                @endif
            </form>

            <a href="{{ route('admin.ekskul.create') }}" class="btn-custom btn-custom-primary">
                <i class="bi bi-plus-square"></i>
                Tambah Ekstrakurikuler
            </a>

        </div>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabel --}}
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Ekskul</th>
                        <th>Pembina</th>
                        <th>Jadwal Latihan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($ekstras as $ekstra)
                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                @if ($ekstra->gambar)
                                    <img src="{{ asset('uploads/ekstrakurikuler/' . $ekstra->gambar) }}" width="70"
                                        height="50" style="object-fit: cover; border-radius: 6px;">
                                @else
                                    <span class="text-muted">
                                        Tidak ada
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $ekstra->nama_ekskul }}
                            </td>

                            <td>
                                {{ $ekstra->pembina }}
                            </td>

                            <td>
                                {{ $ekstra->jadwal_latihan }}
                            </td>

                            <td>
                                {{ Str::limit($ekstra->deskripsi, 50) }}
                            </td>

                            <td>

                                <a href="{{ route('admin.ekskul.edit', Crypt::encryptString($ekstra->id_ekstrakurikuler)) }}"
                                    class="table-btn-action" title="Ubah-baris">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.ekskul.destroy', $ekstra->id_ekstrakurikuler) }}"
                                    method="POST" class="d-inline">

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
                                Belum ada data ekstrakurikuler.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>


    </div>
@endsection
