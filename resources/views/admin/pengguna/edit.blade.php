<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Pengguna - Admin SMKN 4 Bogor</title>


    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    {{-- CSS Sidebar --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >


    {{-- CSS Edit Pengguna --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-pengguna-edit.css') }}"
    >

</head>


<body>

<div class="admin-wrapper">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    @include('admin.layouts.sidebar')


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main-content">


        {{-- =================================================
             TOPBAR
        ================================================== --}}

        <header class="topbar">

            <h1 class="topbar-title">
                Edit Pengguna
            </h1>


            <div class="admin-profile">

                <i class="fa-solid fa-circle-user"></i>

                <div class="admin-profile-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        {{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                    </span>

                </div>

            </div>

        </header>


        {{-- =================================================
             CONTENT
        ================================================== --}}

        <section class="content">


            {{-- PAGE HEADER --}}

            <div class="page-header">

                <h2>
                    Edit Pengguna
                </h2>

                <p>
                    Ubah informasi akun pengguna yang dipilih.
                </p>

            </div>


            {{-- =================================================
                 FORM CARD
            ================================================== --}}

            <div class="form-card">


                <div class="form-card-header">

                    <div class="form-card-icon">

                        <i class="fa-solid fa-user-pen"></i>

                    </div>

                    <div>

                        <h3>
                            Informasi Pengguna
                        </h3>

                        <p>
                            Perbarui data akun pengguna.
                        </p>

                    </div>

                </div>


                <div class="form-card-body">


                    <form
                        action="{{ route('admin.pengguna.update', $user->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PUT')


                        {{-- =====================================
                             NAMA
                        ====================================== --}}

                        <div class="form-group-custom">

                            <label
                                for="name"
                            >
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $user->name) }}"
                                placeholder="Masukkan nama lengkap"
                                required
                            >

                            @error('name')

                                <div class="error-text">

                                    <i class="fa-solid fa-circle-exclamation"></i>

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- =====================================
                             EMAIL
                        ====================================== --}}

                        <div class="form-group-custom">

                            <label
                                for="email"
                            >
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email', $user->email) }}"
                                placeholder="Masukkan email"
                                required
                            >

                            @error('email')

                                <div class="error-text">

                                    <i class="fa-solid fa-circle-exclamation"></i>

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- =====================================
                             ROLE
                        ====================================== --}}

                        <div class="form-group-custom">

                            <label
                                for="role"
                            >
                                Role
                            </label>

                            <select
                                name="role"
                                id="role"
                                required
                            >

                                <option
                                    value="super_admin"
                                    {{ old('role', $user->role) === 'super_admin' ? 'selected' : '' }}
                                >
                                    Super Admin
                                </option>

                                <option
                                    value="editor"
                                    {{ old('role', $user->role) === 'editor' ? 'selected' : '' }}
                                >
                                    Editor
                                </option>

                                <option
                                    value="staf_admin"
                                    {{ old('role', $user->role) === 'staf_admin' ? 'selected' : '' }}
                                >
                                    Staf Admin
                                </option>

                                <option
                                    value="staf_it"
                                    {{ old('role', $user->role) === 'staf_it' ? 'selected' : '' }}
                                >
                                    Staf IT
                                </option>

                            </select>

                            @error('role')

                                <div class="error-text">

                                    <i class="fa-solid fa-circle-exclamation"></i>

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- =====================================
                             PASSWORD
                        ====================================== --}}

                        <div class="form-group-custom">

                            <label
                                for="password"
                            >
                                Password Baru

                                <span class="optional-text">
                                    (opsional)
                                </span>

                            </label>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Kosongkan jika tidak ingin mengubah password"
                            >

                            <small class="form-help">
                                Isi hanya jika ingin mengganti password pengguna.
                                Minimal 6 karakter.
                            </small>

                            @error('password')

                                <div class="error-text">

                                    <i class="fa-solid fa-circle-exclamation"></i>

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- =====================================
                             BUTTON
                        ====================================== --}}

                        <div class="button-area">


                            <a
                                href="{{ route('admin.pengguna.index') }}"
                                class="btn-back"
                            >

                                <i class="fa-solid fa-arrow-left"></i>

                                <span>
                                    Kembali
                                </span>

                            </a>


                            <button
                                type="submit"
                                class="btn-save"
                            >

                                <i class="fa-solid fa-floppy-disk"></i>

                                <span>
                                    Simpan Perubahan
                                </span>

                            </button>


                        </div>

                    </form>

                </div>

            </div>

        </section>

    </main>

</div>


{{-- Bootstrap JS --}}

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>