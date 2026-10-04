<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMKN 4 Bogor</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
</head>

<body>

<div class="admin-login-page">
    
    {{-- GLASS CONTAINER DI SAMPING --}}
    <div class="login-glass-container">
        <div class="login-box">

            {{-- LOGO --}}
            <div class="brand-logo">
                <img src="{{ asset('images/sekolah gede.jpeg') }}" alt="Logo SMKN 4 Bogor">
            </div>

            {{-- HEADING --}}
            <div class="login-heading">
                <h2>Masuk</h2>
                <p>Silahkan Masuk Untuk Mengelola Website Sekolah</p>
            </div>

            {{-- ERROR NOTIFICATION --}}
            @if(session('login_error'))
                <div class="login-alert error-alert">
                    <div class="alert-icon">
                        <i class="fa-solid fa-xmark"></i>
                    </div>

                    <div class="alert-content">
                        <strong>Gagal Masuk</strong>
                        <span>{{ session('login_error') }}</span>
                    </div>

                    <button type="button" class="alert-close" onclick="closeAlert(this)">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif


            {{-- ERROR VALIDASI / LOGIN --}}
            @if($errors->any())
                <div class="login-alert error-alert">
                    <div class="alert-icon">
                        <i class="fa-solid fa-xmark"></i>
                    </div>

                    <div class="alert-content">
                        <strong>Gagal Masuk</strong>

                        @foreach($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>

                    <button type="button" class="alert-close" onclick="closeAlert(this)">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            @endif


            {{-- FORM --}}
            <form action="{{ route('admin.login.process') }}" method="POST" autocomplete="off">
                @csrf

                {{-- EMAIL --}}
                <div class="form-group">
                    <label for="email">Email</label>

                    <div class="form-input">
                        <i class="fa-regular fa-user"></i>

                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Masukkan Email" 
                            value="{{ old('email') }}" 
                            autocomplete="off" 
                            required
                        >
                    </div>
                </div>


                {{-- PASSWORD --}}
                <div class="form-group">
                    <label for="password">Kata Sandi</label>

                    <div class="form-input">
                        <i class="fa-solid fa-lock"></i>

                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Masukkan Kata Sandi" 
                            autocomplete="new-password" 
                            required
                        >

                        <button 
                            type="button" 
                            class="password-toggle" 
                            onclick="togglePassword()" 
                            aria-label="Tampilkan kata sandi"
                        >
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>


                {{-- OPTIONS --}}
                <div class="form-options">
                    <label class="remember">
                        <input type="checkbox" name="remember" value="1">
                        <span>Ingat Saya</span>
                    </label>

                    <a href="#" class="forgot-password">
                        Lupa Kata Sandi?
                    </a>
                </div>


                {{-- BUTTON --}}
                <button type="submit" class="submit-button">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <span>Masuk</span>
                </button>

            </form>


            {{-- FOOTER / COPYRIGHT --}}
            <div class="login-card-footer">
                <i class="fa-regular fa-copyright"></i> 
                2026 SMK Negeri 4 Bogor. All Rights Reserved.
            </div>

        </div>
    </div>

</div>


<script>

    /* =====================================================
       TOGGLE PASSWORD
    ===================================================== */

    function togglePassword() {

        const password = document.getElementById('password');
        const icon = document.querySelector('.password-toggle i');

        if (password.type === 'password') {

            password.type = 'text';

            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');

        } else {

            password.type = 'password';

            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');

        }
    }


    /* =====================================================
       CLOSE ALERT
    ===================================================== */

    function closeAlert(button) {

        const alert = button.closest('.login-alert');

        if (!alert) return;

        alert.classList.add('hide-alert');

        setTimeout(function () {
            alert.remove();
        }, 300);
    }


    /* =====================================================
       AUTO CLOSE ALERT
    ===================================================== */

    document.addEventListener('DOMContentLoaded', function () {

        const alert = document.querySelector('.login-alert');

        if (!alert) return;

        setTimeout(function () {

            const closeButton = alert.querySelector('.alert-close');

            if (closeButton) {
                closeAlert(closeButton);
            }

        }, 4000);

    });

</script>

</body>
</html>