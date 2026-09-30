@php
    use Illuminate\Support\Facades\Crypt;
@endphp
@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    {{-- Judul dan tombol tambah --}}
    <div class="d-flex align-items-center justify-content-between mb-4">

        <div>
            <h3 class="mb-1">Data Guru</h3>
            <p class="text-muted mb-0">Kelola data guru sekolah</p>
        </div>

        @if(Auth::user()->role === 'Admin')
            <a href="{{ route('admin.guru.create') }}" class="btn-custom btn-custom-primary">
                <i class="bi bi-plus-square"></i> Tambah Guru
            </a>
        @endif

    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Card tabel --}}
    <div class="bg-light rounded p-4">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Guru</th>
                        <th>NIP</th>
                        <th>Mata Pelajaran</th>

                        @if(Auth::user()->role === 'Admin')
                            <th>Aksi</th>
                        @endif

                    </tr>
                </thead>

                <tbody>

                    @forelse($gurus as $guru)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                @if($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}"
                                         width="50"
                                         height="50"
                                         class="rounded-circle"
                                         style="object-fit: cover;">
                                @else
                                    <i class="bi bi-person-circle fs-2 text-muted"></i>
                                @endif
                            </td>

                            <td>
                                {{ $guru->nama_guru }}
                            </td>

                            <td>
                                {{ $guru->nip }}
                            </td>

                            <td>
                                {{ $guru->mapel }}
                            </td>

                            @if(Auth::user()->role === 'Admin')
                                <td>

                                    <a href="{{ route('admin.guru.edit', Crypt::encryptString($guru->id_guru)) }}"
                                       class="table-btn-action" title="Ubah-baris">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.guru.destroy', $guru->id_guru) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data guru ini?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="table-btn-action delete" title="Hapus-baris">
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                </td>
                            @endif

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data guru.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

