@extends('admin')

@section('content')

<div class="container-fluid pt-5 px-4">

    <div class="bg-light rounded p-4">

        <h4 class="mb-4">Edit User</h4>

        <form action="{{ route('admin.user.update', $user->id_user) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $user->name) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>

                <input type="text"
                       name="username"
                       class="form-control"
                       value="{{ old('username', $user->username) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>

                <input type="password"
                       name="password"
                       class="form-control">

                <small class="text-muted">
                    Kosongkan jika password tidak ingin diubah.
                </small>
            </div>

            <div class="mb-4">
                <label class="form-label">Role</label>

                <select name="role" class="form-select" required>

                    <option value="Admin"
                        {{ $user->role == 'Admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="Operator"
                        {{ $user->role == 'Operator' ? 'selected' : '' }}>
                        Operator
                    </option>

                </select>
            </div>

            <a href="{{ route('admin.user.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i>
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>

@endsection