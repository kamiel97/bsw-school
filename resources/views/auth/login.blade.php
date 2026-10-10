<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - BSW</title>

    <!-- Favicon -->

    <link rel="icon" type="image/png" href="assets/images/image.png">

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>

<body>

    <div class="login-card">

        <!-- Logo -->
        <div class="login-logo">
            <i class="bi bi-book-half"></i>
        </div>

        <!-- Nama -->
        <div class="login-title">
            <h2  style="font-family: Plus Jakarta, serif">BSW </h2>
            <small class="text-colors-blue">Best Student Website</small>
        </div>



      <form action="{{ route('login.process') }}" method="POST">
            @csrf

            {{-- Pesan error login --}}
            @if ($errors->any())
                <div class="login-error">
                    <i class="bi bi-exclamation-circle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- username --}}
            <div>
                <label class="login-label">
                    Username
                </label>

                <input name="username" class="login-input" placeholder="Masukkan username"
                    value="{{ old('username') }}" required>
            </div>

            {{-- Password --}}
            <div>
                <label class="login-label">
                    Password
                </label>

                <input type="password" name="password" class="login-input" placeholder="Masukkan password" required>
            </div>

            {{-- Login --}}
            <button type="submit" class="login-button">
                Login
            </button>
        </form>


    </div>

</body>

</html>
