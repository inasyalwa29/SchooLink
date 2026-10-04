<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Admin - SMKN 4 Bogor</title>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <!-- CSS Register -->
    <link rel="stylesheet" href="{{ asset('css/admin-register.css') }}">
</head>

<body>

<div class="register-page">

    <!-- Background -->
    <div class="background"></div>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Register Card -->
    <div class="register-card">

        <!-- Logo -->
        <div class="logo-wrapper">
            <img
                src="{{ asset('images/logo sekolah.jpg') }}"
                alt="SMKN 4 Bogor"
                class="school-logo"
            >
        </div>

        <!-- Judul -->
        <h1>Daftar Admin</h1>

        <p class="subtitle">
            Buat akun untuk mengelola website SMKN 4 Bogor
        </p>

        <!-- Error -->
        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Register -->
        <form action="{{ route('admin.register.process') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="input-group">
                <label for="nama">Nama Lengkap</label>

                <div class="input-wrapper">
                    <i class="fa-solid fa-user input-icon"></i>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('nama') }}"
                        required
                    >
                </div>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>

                <div class="input-wrapper">
                    <i class="fa-solid fa-envelope input-icon"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                        required
                    >
                </div>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">Kata Sandi</label>

                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        required
                    >

                    <button
                        type="button"
                        class="show-password"
                        onclick="togglePassword('password', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Konfirmasi Password -->
            <div class="input-group">
                <label for="password_confirmation">
                    Konfirmasi Kata Sandi
                </label>

                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Masukkan ulang kata sandi"
                        required
                    >

                    <button
                        type="button"
                        class="show-password"
                        onclick="togglePassword('password_confirmation', this)"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Persetujuan -->
            <div class="agreement">
                <label>
                    <input
                        type="checkbox"
                        name="agreement"
                        value="1"
                        {{ old('agreement') ? 'checked' : '' }}
                        required
                    >

                    <span>
                        Saya menyetujui penggunaan akun admin
                    </span>
                </label>
            </div>

            <!-- Tombol Daftar -->
            <button type="submit" class="register-button">
                Daftar
            </button>

        </form>

        <!-- Login -->
        <div class="login-link">
            Sudah punya akun?
            <a href="{{ route('admin.login') }}">
                Masuk di sini
            </a>
        </div>

        <!-- Kembali ke Website -->
        <a href="{{ url('/') }}" class="back-home">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke website
        </a>

    </div>

</div>

<!-- Toggle Password -->
<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';

            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';

            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>