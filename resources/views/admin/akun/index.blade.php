<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Akun Admin - SMKN 4 Bogor
    </title>


    <!-- =========================================================
         BOOTSTRAP
    ========================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- =========================================================
         FONT AWESOME
    ========================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- =========================================================
         SIDEBAR CSS
    ========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >


    <style>

        /* =====================================================
           GLOBAL
        ====================================================== */

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: #f6f8fc;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            color: #1f2937;
        }


        .admin-wrapper {
            min-height: 100vh;
        }


        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .main-content {
            min-height: 100vh;

            margin-left: 290px;

            width: calc(100% - 290px);
        }


        /* =====================================================
           NAVBAR / TOP HEADER
        ====================================================== */

        .top-header {
            min-height: 90px;

            padding: 22px 32px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            background: #ffffff;

            border-bottom: 1px solid #e9edf5;
        }


        .page-title {
            min-width: 0;
        }


        .page-title h1 {
            margin: 0;

            font-size: 26px;

            font-weight: 700;

            color: #172554;
        }


        .page-title p {
            margin: 5px 0 0;

            font-size: 13px;

            color: #6b7280;
        }


        /* =====================================================
           ADMIN PROFILE - KANAN ATAS
        ====================================================== */

        .admin-profile {
            display: flex;

            align-items: center;

            gap: 11px;

            padding: 7px 10px;

            color: inherit;

            text-decoration: none;

            border-radius: 12px;

            transition: .2s ease;

            flex-shrink: 0;
        }


        .admin-profile:hover {
            background: #f5f7fb;
        }


        .admin-avatar {
            width: 42px;

            height: 42px;

            min-width: 42px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #eef3ff;

            color: #1233b5;

            font-size: 17px;
        }


        .admin-info {
            display: flex;

            flex-direction: column;
        }


        .admin-info strong {
            font-size: 13px;

            font-weight: 700;

            color: #1f2937;
        }


        .admin-info span {
            margin-top: 2px;

            font-size: 11px;

            color: #6b7280;
        }


        .profile-arrow {
            margin-left: 5px;

            color: #9ca3af;

            font-size: 11px;
        }


        /* =====================================================
           CONTENT
        ====================================================== */

        .content-area {
            padding: 32px;
        }


        .content-heading {
            margin-bottom: 24px;
        }


        .content-heading h2 {
            margin: 0;

            font-size: 21px;

            font-weight: 700;

            color: #172554;
        }


        .content-heading p {
            margin: 6px 0 0;

            color: #6b7280;

            font-size: 13px;
        }


        /* =====================================================
           ALERT
        ====================================================== */

        .account-alert {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 22px;

            padding: 13px 16px;

            border-radius: 10px;

            font-size: 13px;
        }


        .account-alert-success {
            background: #ecfdf3;

            border: 1px solid #bbf7d0;

            color: #166534;
        }


        .account-alert-error {
            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #b91c1c;
        }


        .account-alert ul {
            margin: 5px 0 0;

            padding-left: 18px;
        }


        .account-alert-close {
            margin-left: auto;

            border: 0;

            background: transparent;

            color: inherit;

            cursor: pointer;
        }


        /* =====================================================
           ACCOUNT GRID
        ====================================================== */

        .account-grid {
            display: grid;

            grid-template-columns:
                minmax(280px, 340px)
                minmax(0, 1fr);

            gap: 24px;

            align-items: start;
        }


        .account-card {
            background: #ffffff;

            border: 1px solid #e7ebf2;

            border-radius: 16px;

            box-shadow:
                0 4px 18px rgba(15, 23, 42, .04);
        }


        /* =====================================================
           PROFILE CARD
        ====================================================== */

        .account-profile-card {
            padding: 28px 24px;

            text-align: center;
        }


        .big-avatar {
            width: 92px;

            height: 92px;

            margin: 0 auto 17px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #eef3ff;

            color: #1233b5;

            font-size: 35px;
        }


        .account-profile-card h3 {
            margin: 0;

            font-size: 19px;

            font-weight: 700;

            color: #1f2937;
        }


        .account-email {
            margin-top: 6px;

            font-size: 13px;

            color: #6b7280;

            word-break: break-word;
        }


        .role-badge {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            margin-top: 15px;

            padding: 7px 12px;

            border-radius: 20px;

            background: #eef3ff;

            color: #1233b5;

            font-size: 11px;

            font-weight: 700;
        }


        .status-account {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            margin-top: 12px;

            font-size: 12px;

            font-weight: 600;

            color: #198754;
        }


        .status-account i {
            font-size: 7px;
        }


        /* =====================================================
           CARD HEADER
        ====================================================== */

        .account-card-header {
            padding: 22px 24px;

            border-bottom: 1px solid #edf0f5;
        }


        .account-card-header h3 {
            margin: 0;

            font-size: 16px;

            font-weight: 700;

            color: #1f2937;
        }


        .account-card-header p {
            margin: 5px 0 0;

            font-size: 12px;

            color: #6b7280;
        }


        .account-card-body {
            padding: 24px;
        }


        /* =====================================================
           FORM
        ====================================================== */

        .form-group-custom {
            margin-bottom: 20px;
        }


        .form-group-custom:last-child {
            margin-bottom: 0;
        }


        .form-group-custom label {
            display: block;

            margin-bottom: 8px;

            font-size: 12px;

            font-weight: 700;

            color: #374151;
        }


        .input-wrapper {
            position: relative;
        }


        .input-wrapper > i {
            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            color: #9ca3af;

            font-size: 14px;

            pointer-events: none;
        }


        .input-wrapper input {
            width: 100%;

            height: 45px;

            padding:
                0 14px 0 42px;

            border: 1px solid #dfe4ec;

            border-radius: 9px;

            background: #ffffff;

            color: #1f2937;

            font-size: 13px;

            outline: none;

            transition: .2s ease;
        }


        .input-wrapper input:focus {
            border-color: #1233b5;

            box-shadow:
                0 0 0 3px rgba(18, 51, 181, .08);
        }


        .form-row-custom {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 18px;
        }


        /* =====================================================
           BUTTON
        ====================================================== */

        .account-button {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            min-height: 43px;

            padding: 0 18px;

            border: 0;

            border-radius: 9px;

            background: #1233b5;

            color: #ffffff;

            font-size: 12px;

            font-weight: 700;

            cursor: pointer;

            transition: .2s ease;
        }


        .account-button:hover {
            background: #0d278d;
        }


        .form-actions {
            display: flex;

            justify-content: flex-end;

            margin-top: 24px;

            padding-top: 20px;

            border-top: 1px solid #edf0f5;
        }


        /* =====================================================
           ACCOUNT INFO
        ====================================================== */

        .account-info-list {
            display: flex;

            flex-direction: column;
        }


        .account-info-item {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 15px 0;

            border-bottom: 1px solid #edf0f5;
        }


        .account-info-item:first-child {
            padding-top: 0;
        }


        .account-info-item:last-child {
            padding-bottom: 0;

            border-bottom: 0;
        }


        .account-info-label {
            display: flex;

            align-items: center;

            gap: 9px;

            color: #6b7280;

            font-size: 12px;
        }


        .account-info-label i {
            width: 18px;

            text-align: center;

            color: #1233b5;
        }


        .account-info-value {
            text-align: right;

            color: #1f2937;

            font-size: 12px;

            font-weight: 600;
        }


        /* =====================================================
           PASSWORD
        ====================================================== */

        .password-toggle {
            position: absolute;

            right: 12px;

            top: 50%;

            transform: translateY(-50%);

            border: 0;

            background: transparent;

            color: #9ca3af;

            cursor: pointer;
        }


        .password-wrapper input {
            padding-right: 45px;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1000px) {

            .main-content {
                margin-left: 0;

                width: 100%;
            }


            .account-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 700px) {

            .top-header {
                padding: 18px;
            }


            .admin-info {
                display: none;
            }


            .content-area {
                padding: 20px;
            }


            .form-row-custom {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<div class="admin-wrapper">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    @include('admin.layouts.sidebar')


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <main class="main-content">


        <!-- =================================================
             NAVBAR
        ================================================== -->

        <header class="top-header">


            <!-- JUDUL -->

            <div class="page-title">

                <h1>
                    Akun Admin
                </h1>

                <p>
                    Kelola informasi dan keamanan akun administrator.
                </p>

            </div>


            <!-- ADMIN DI KANAN -->

            <a
                href="{{ route('admin.akun.index') }}"
                class="admin-profile"
                title="Akun Admin"
            >

                <div class="admin-avatar">

                    <i class="fa-solid fa-user"></i>

                </div>


                <div class="admin-info">

                    <strong>
                        {{ $user->name }}
                    </strong>

                    <span>
                        {{ ucwords(str_replace('_', ' ', $user->role)) }}
                    </span>

                </div>


                <i class="fa-solid fa-chevron-right profile-arrow"></i>

            </a>

        </header>


        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="content-area">


            <div class="content-heading">

                <h2>
                    Informasi Akun
                </h2>

                <p>
                    Informasi akun yang sedang digunakan untuk mengakses administrator.
                </p>

            </div>


            <!-- =================================================
                 SUCCESS
            ================================================== -->

            @if(session('success'))

                <div class="account-alert account-alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>


                    <button
                        type="button"
                        class="account-alert-close"
                        onclick="this.parentElement.remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            <!-- =================================================
                 ERRORS
            ================================================== -->

            @if($errors->any())

                <div class="account-alert account-alert-error">

                    <i class="fa-solid fa-circle-exclamation"></i>


                    <div>

                        <strong>
                            Terjadi kesalahan:
                        </strong>


                        <ul>

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>


                    <button
                        type="button"
                        class="account-alert-close"
                        onclick="this.parentElement.remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            <!-- =================================================
                 ACCOUNT GRID
            ================================================== -->

            <div class="account-grid">


                <!-- =================================================
                     LEFT
                ================================================== -->

                <div>


                    <!-- PROFILE -->

                    <div class="account-card account-profile-card">


                        <div class="big-avatar">

                            <i class="fa-solid fa-user"></i>

                        </div>


                        <h3>
                            {{ $user->name }}
                        </h3>


                        <div class="account-email">
                            {{ $user->email }}
                        </div>


                        <div class="role-badge">

                            <i class="fa-solid fa-shield-halved"></i>

                            {{ ucwords(str_replace('_', ' ', $user->role)) }}

                        </div>


                        <div class="status-account">

                            <i class="fa-solid fa-circle"></i>

                            Akun Aktif

                        </div>

                    </div>


                    <!-- DETAIL AKUN -->

                    <div
                        class="account-card"
                        style="margin-top:20px;"
                    >


                        <div class="account-card-header">

                            <h3>
                                Detail Akun
                            </h3>

                            <p>
                                Informasi dasar akun administrator.
                            </p>

                        </div>


                        <div class="account-card-body">


                            <div class="account-info-list">


                                <div class="account-info-item">

                                    <span class="account-info-label">

                                        <i class="fa-solid fa-id-card"></i>

                                        ID Pengguna

                                    </span>


                                    <span class="account-info-value">

                                        #{{ $user->id }}

                                    </span>

                                </div>


                                <div class="account-info-item">

                                    <span class="account-info-label">

                                        <i class="fa-solid fa-user-shield"></i>

                                        Role

                                    </span>


                                    <span class="account-info-value">

                                        {{ ucwords(str_replace('_', ' ', $user->role)) }}

                                    </span>

                                </div>


                                <div class="account-info-item">

                                    <span class="account-info-label">

                                        <i class="fa-solid fa-circle-check"></i>

                                        Status

                                    </span>


                                    <span class="account-info-value">

                                        {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}

                                    </span>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     RIGHT
                ================================================== -->

                <div>


                    <!-- INFORMASI PRIBADI -->

                    <div class="account-card">


                        <div class="account-card-header">

                            <h3>
                                Informasi Pribadi
                            </h3>

                            <p>
                                Ubah nama dan email akun administrator.
                            </p>

                        </div>


                        <div class="account-card-body">


                            <form
                                action="{{ route('admin.akun.update') }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')


                                <div class="form-row-custom">


                                    <!-- NAMA -->

                                    <div class="form-group-custom">

                                        <label for="name">
                                            Nama Lengkap
                                        </label>


                                        <div class="input-wrapper">

                                            <i class="fa-solid fa-user"></i>


                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                value="{{ old('name', $user->name) }}"
                                                placeholder="Masukkan nama lengkap"
                                                required
                                            >

                                        </div>

                                    </div>


                                    <!-- EMAIL -->

                                    <div class="form-group-custom">

                                        <label for="email">
                                            Email
                                        </label>


                                        <div class="input-wrapper">

                                            <i class="fa-solid fa-envelope"></i>


                                            <input
                                                type="email"
                                                id="email"
                                                name="email"
                                                value="{{ old('email', $user->email) }}"
                                                placeholder="Masukkan email"
                                                required
                                            >

                                        </div>

                                    </div>

                                </div>


                                <div class="form-actions">

                                    <button
                                        type="submit"
                                        class="account-button"
                                    >

                                        <i class="fa-solid fa-floppy-disk"></i>

                                        Simpan Perubahan

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>


                    <!-- KEAMANAN AKUN -->

                    <div
                        class="account-card"
                        style="margin-top:20px;"
                    >


                        <div class="account-card-header">

                            <h3>
                                Keamanan Akun
                            </h3>

                            <p>
                                Ubah password untuk menjaga keamanan akun.
                            </p>

                        </div>


                        <div class="account-card-body">


                            <form
                                action="{{ route('admin.akun.password.update') }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')


                                <!-- PASSWORD SAAT INI -->

                                <div class="form-group-custom">

                                    <label for="current_password">
                                        Password Saat Ini
                                    </label>


                                    <div class="input-wrapper password-wrapper">

                                        <i class="fa-solid fa-lock"></i>


                                        <input
                                            type="password"
                                            id="current_password"
                                            name="current_password"
                                            placeholder="Masukkan password saat ini"
                                            autocomplete="current-password"
                                            required
                                        >


                                        <button
                                            type="button"
                                            class="password-toggle"
                                            onclick="togglePassword('current_password', 'currentPasswordIcon')"
                                            aria-label="Tampilkan password"
                                        >

                                            <i
                                                class="fa-solid fa-eye"
                                                id="currentPasswordIcon"
                                            ></i>

                                        </button>

                                    </div>

                                </div>


                                <!-- PASSWORD BARU DAN KONFIRMASI -->

                                <div class="form-row-custom">


                                    <!-- PASSWORD BARU -->

                                    <div class="form-group-custom">

                                        <label for="password">
                                            Password Baru
                                        </label>


                                        <div class="input-wrapper password-wrapper">

                                            <i class="fa-solid fa-key"></i>


                                            <input
                                                type="password"
                                                id="password"
                                                name="password"
                                                placeholder="Minimal 8 karakter"
                                                autocomplete="new-password"
                                                required
                                            >


                                            <button
                                                type="button"
                                                class="password-toggle"
                                                onclick="togglePassword('password', 'passwordIcon')"
                                                aria-label="Tampilkan password"
                                            >

                                                <i
                                                    class="fa-solid fa-eye"
                                                    id="passwordIcon"
                                                ></i>

                                            </button>

                                        </div>

                                    </div>


                                    <!-- KONFIRMASI -->

                                    <div class="form-group-custom">

                                        <label for="password_confirmation">
                                            Konfirmasi Password
                                        </label>


                                        <div class="input-wrapper password-wrapper">

                                            <i class="fa-solid fa-key"></i>


                                            <input
                                                type="password"
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                placeholder="Ulangi password baru"
                                                autocomplete="new-password"
                                                required
                                            >


                                            <button
                                                type="button"
                                                class="password-toggle"
                                                onclick="togglePassword('password_confirmation', 'confirmationIcon')"
                                                aria-label="Tampilkan password"
                                            >

                                                <i
                                                    class="fa-solid fa-eye"
                                                    id="confirmationIcon"
                                                ></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>


                                <!-- BUTTON -->

                                <div class="form-actions">

                                    <button
                                        type="submit"
                                        class="account-button"
                                    >

                                        <i class="fa-solid fa-key"></i>

                                        Ubah Password

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>


                </div>

            </div>

        </section>

    </main>

</div>


<!-- =========================================================
     BOOTSTRAP JS
========================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- =========================================================
     PASSWORD TOGGLE
========================================================== -->

<script>

    function togglePassword(
        inputId,
        iconId
    ) {

        const input =
            document.getElementById(inputId);

        const icon =
            document.getElementById(iconId);


        if (!input || !icon) {
            return;
        }


        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove(
                'fa-eye'
            );

            icon.classList.add(
                'fa-eye-slash'
            );

        } else {

            input.type = 'password';

            icon.classList.remove(
                'fa-eye-slash'
            );

            icon.classList.add(
                'fa-eye'
            );

        }

    }

</script>


</body>

</html>