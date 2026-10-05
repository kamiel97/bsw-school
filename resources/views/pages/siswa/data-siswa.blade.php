@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Data Siswa</h3>
            <p class="text-muted mb-0">Daftar data siswa sekolah</p>
        </div>
    </div>

         <div class="d-flex justify-content-between align-items-center mb-3">

            <form action="{{ route('admin.siswa.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" value="{{ $search }}" class="form-control" style="width: 350px;"
                    placeholder="Cari Siswa">

                <button type="submit" class="btn-custom btn-custom-primary">
                    <i class="bi bi-search"></i>
                </button>

                @if ($search)
                    <a href="{{ route('admin.siswa.index') }}" class="btn-custom btn-custom-secondary">
                        Reset
                    </a>
                @endif
            </form>

            @if (Auth::user()->role === 'Admin')
                <a href="{{ route('admin.siswa.create') }}" class="btn-custom btn-custom-primary">
                    <i class="bi bi-plus-square"></i> Tambah Siswa
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

                                <a href="{{ route('admin.siswa.edit',Crypt::encryptString($siswa->id_siswa)) }}"
                                  class="table-btn-action" title="Ubah-baris">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.siswa.destroy', $siswa->id_siswa) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="table-btn-action delete" title="Hapus-baris"
                                            onclick="return confirm('Yakin ingin menghapus data siswa ini?')">

                                        <i class="bi bi-trash"></i>

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
