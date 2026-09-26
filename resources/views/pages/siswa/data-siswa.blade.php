@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Data Siswa</h3>
            <p class="text-muted mb-0">Daftar data siswa sekolah</p>
        </div>

        @if(Auth::user()->role === 'Admin')
            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-square"></i>
                Tambah Siswa
            </a>
        @endif

    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
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
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>

                    @if(Auth::user()->role === 'Admin')
                        <th>Aksi</th>
                    @endif

                </tr>
            </thead>

            <tbody>

                @forelse($siswas as $siswa)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $siswa->nisn }}
                        </td>

                        <td>
                            {{ $siswa->nama_siswa }}
                        </td>

                        <td>
                            {{ $siswa->jenis_kelamin }}
                        </td>

                        <td>
                            {{ $siswa->tahun_masuk }}
                        </td>

                        @if(Auth::user()->role === 'Admin')
                            <td>

                                <a href="{{ route('admin.siswa.edit', $siswa->id_siswa) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data siswa ini?')">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>
                        @endif

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Belum ada data siswa.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
