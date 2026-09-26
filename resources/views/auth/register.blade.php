<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - BSW</title>

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="assets/images/image.png">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">


</head>

<body>

    <div class="register-card">

        <!-- Logo -->
        <div class="register-logo">
            <i class="bi bi-book-half"></i>
        </div>

        <!-- Nama -->
        <div class="register-title">
            <h2>BSW </h2>
            <small class="text-colors-blue">Best Student Website</small>
        </div>

        {{-- <form action="{{ route('register.store') }}" method="POST"> --}}

            @csrf

            <!-- Nama -->
            <div>
                <label class="register-label">
                    Nama
                </label>
                <input type="text" name="name" class="register-input" placeholder="Masukkan nama" required>

                <label class="register-label">Username</label>
                <input type="text" name="username" class="register-input" placeholder="Username" required>
            </div>


            <!-- Email -->
            <div>
                <label class="register-label">
                    Email
                </label>

                <input type="email" name="email" class="register-input" placeholder="Masukkan email" required>
            </div>

            <!-- Password -->
            <div>
                <label class="register-label">
                    Password
                </label>

                <input type="password" name="password" class="register-input" placeholder="Masukkan password" required>
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="register-label">
                    Konfirmasi Password
                </label>

                <input type="password" name="password_confirmation" class="register-input" placeholder="Ulangi password"
                    required>
            </div>

            <!-- Register -->
            <button type="submit" class="register-button">
                Register
            </button>

        </form>

        <!-- Login -->
        <div class="login-link">
            Sudah punya akun?
            <a href="{{ url('/login') }}">
                Login
            </a>
        </div>

    </div>

</body>

</html>
