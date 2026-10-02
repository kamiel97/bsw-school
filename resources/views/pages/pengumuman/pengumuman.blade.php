@php
     use Illuminate\Support\Facades\Crypt;
@endphp
@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="mb-1">Data Pengumuman</h3>
                <p class="text-muted mb-0">
                    Daftar pengumuman sekolah
                </p>
            </div>

            <a href="{{ route('admin.pengumuman.create') }}"
               class="btn-custom btn-custom-primary">

                <i class="bi bi-plus-square"></i>
                Tambah Pengumuman

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
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($pengumumans as $pengumuman)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $pengumuman->judul }}
                            </td>

                            <td>
                                {{ Str::limit($pengumuman->isi, 50) }}
                            </td>

                            <td>

                                @if($pengumuman->user)

                                    {{ $pengumuman->user->name }}

                                @else

                                    <span class="text-muted">
                                        User tidak tersedia
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $pengumuman->tanggal }}
                            </td>

                            <td>

                                @if($pengumuman->status == 'Publish')

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

                                <a href="{{ route('admin.pengumuman.edit',Crypt::encryptString ($pengumuman->id_pengumuman)) }}"
                                   class="table-btn-action" title="Ubah-baris">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form action="{{ route('admin.pengumuman.destroy', $pengumuman->id_pengumuman) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="table-btn-action delete" title="Hapus-baris"
                                            onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">

                                        <i class="bi bi-trash"></i>
                                        

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted">

                                Belum ada pengumuman.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    

</div>

@endsection

