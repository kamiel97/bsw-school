@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="mb-1">Data User</h3>

        @if(Auth::user()->role === 'Admin')
            <a href="{{ route('admin.user.create') }}" class="btn-custom btn-custom-primary">
                <i class="bi bi-plus-square"></i>
                 Tambah User
            </a>
        @endif

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>

                    @if(Auth::user()->role === 'Admin')
                        <th>Aksi</th>
                    @endif

                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->username }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->role }}
                        </td>

                        <td>

                            @if($user->id_user == Auth::id())

                                <span class="badge bg-success">
                                    <i class="bi bi-circle-fill"></i>
                                    Aktif
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    <i class="bi bi-circle-fill"></i>
                                 Tidak Aktif
                                </span>

                            @endif

                        </td>

                        @if(Auth::user()->role === 'Admin')
                            <td>

                                <a href="{{ route('admin.user.edit', $user->id_user) }}"
                                   class="table-btn-action" title="Ubah-baris">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                
                                {{-- cek user yg login --}}
                                @if($user->id_user != Auth::id())

                                    <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="table-btn-action delete" title="Hapus-baris"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                @endif

                            </td>
                        @endif

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection
