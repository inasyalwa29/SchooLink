<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Pengguna - Admin SMKN 4 Bogor
    </title>


    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- CSS Sidebar -->
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >


    <!-- CSS Pengguna -->
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-pengguna.css') }}"
    >

</head>


<body>


@php

    $isSuperAdmin =
        auth()->user()->role === 'super_admin';

    $currentRole =
        ucwords(
            str_replace(
                '_',
                ' ',
                auth()->user()->role
            )
        );

@endphp


<div class="admin-wrapper">


    <!-- ======================================================
         SIDEBAR
    ======================================================= -->

    @include('admin.layouts.sidebar')



    <!-- ======================================================
         MAIN CONTENT
    ======================================================= -->

    <main class="main-content">


        <!-- ==================================================
             HEADER
        =================================================== -->

        <header class="top-header">


            <!-- PAGE TITLE -->

            <div class="page-title">

                <h1>
                    Pengguna
                </h1>

                <p>
                    Kelola akun dan hak akses administrator.
                </p>

            </div>



            <!-- HEADER RIGHT -->

            <div class="header-right">


                <!-- SEARCH -->

                <form
                    action="{{ route('admin.pengguna.index') }}"
                    method="GET"
                    class="search-box"
                >

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="search"
                        name="search"
                        id="searchUser"
                        value="{{ request('search') }}"
                        placeholder="Cari nama, email, atau role..."
                        aria-label="Cari nama, email, atau role pengguna"
                        autocomplete="off"
                    >

                </form>



                <!-- ADMIN PROFILE -->

                <a
                    href="{{ route('admin.profil.index') }}"
                    class="admin-profile"
                    title="Profil Admin"
                >


                    <div class="admin-avatar">

                        <i class="fa-solid fa-user"></i>

                    </div>


                    <div class="admin-info">

                        <strong>

                            {{ auth()->user()->name }}

                        </strong>


                        <span>

                            {{ $currentRole }}

                        </span>

                    </div>


                    <i
                        class="fa-solid fa-chevron-right profile-arrow"
                    ></i>


                </a>


            </div>


        </header>



        <!-- ==================================================
             CONTENT
        =================================================== -->

        <section class="content-area">


            <!-- PAGE HEADING -->

            <div class="content-heading">


                <div>

                    <h2>
                        Kelola Pengguna
                    </h2>


                    <p>
                        Kelola akun dan hak akses pengguna admin SMKN 4 Bogor.
                    </p>

                </div>



                <!-- TAMBAH PENGGUNA -->

                @if($isSuperAdmin)

                    <button
                        type="button"
                        class="btn-add-user"
                        data-bs-toggle="modal"
                        data-bs-target="#addUserModal"
                    >

                        <i class="fa-solid fa-user-plus"></i>

                        Tambah Pengguna

                    </button>

                @endif


            </div>



            <!-- ==================================================
                 ALERT SUCCESS
            =================================================== -->

            @if(session('success'))

                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >

                    <i class="fa-solid fa-circle-check"></i>


                    <span>

                        {{ session('success') }}

                    </span>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Tutup"
                    ></button>

                </div>

            @endif



            <!-- ==================================================
                 ALERT ERROR
            =================================================== -->

            @if(session('error'))

                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >

                    <i class="fa-solid fa-circle-exclamation"></i>


                    <span>

                        {{ session('error') }}

                    </span>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Tutup"
                    ></button>

                </div>

            @endif



            <!-- ==================================================
                 VALIDATION ERROR
            =================================================== -->

            @if($errors->any())

                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >

                    <div>

                        <strong>
                            Terjadi kesalahan:
                        </strong>


                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>

                                    {{ $error }}

                                </li>

                            @endforeach

                        </ul>

                    </div>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Tutup"
                    ></button>

                </div>

            @endif



            <!-- ==================================================
                 STATISTIC
            =================================================== -->

            <div class="user-stat-card">


                <div class="stat-icon">

                    <i class="fa-solid fa-users"></i>

                </div>


                <div class="stat-info">

                    <span>
                        Total Pengguna
                    </span>


                    <strong>

                        {{ $totalUsers }}

                    </strong>

                </div>


            </div>



            <!-- ==================================================
                 USER TABLE
            =================================================== -->

            <div class="user-card">


                <div class="user-card-header">


                    <div>

                        <h3>
                            Daftar Pengguna
                        </h3>


                        <p>
                            Daftar akun yang memiliki akses ke halaman administrator.
                        </p>

                    </div>


                </div>



                <div class="table-responsive">


                    <table class="user-table">


                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Pengguna
                                </th>

                                <th>
                                    Email
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Login Terakhir
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>



                        <tbody id="userTableBody">


                            @forelse($users as $user)


                                <tr class="user-row">


                                    <!-- NO -->

                                    <td>

                                        {{ $loop->iteration }}

                                    </td>



                                    <!-- USER -->

                                    <td>

                                        <div class="user-name-cell">


                                            <div class="user-avatar">

                                                <i class="fa-solid fa-user"></i>

                                            </div>


                                            <div class="user-name-info">


                                                <strong>

                                                    {{ $user->name }}

                                                </strong>


                                                <span>

                                                    ID #{{ $user->id }}

                                                </span>


                                            </div>


                                        </div>

                                    </td>



                                    <!-- EMAIL -->

                                    <td>

                                        <span class="user-email">

                                            {{ $user->email }}

                                        </span>

                                    </td>



                                    <!-- ROLE -->

                                    <td>


                                        @php

                                            $roleClass = match($user->role) {

                                                'super_admin'
                                                    => 'role-super-admin',

                                                'editor'
                                                    => 'role-editor',

                                                'staf_admin'
                                                    => 'role-staf-admin',

                                                'staf_it'
                                                    => 'role-staf-it',

                                                default
                                                    => 'role-default',

                                            };

                                        @endphp


                                        <span
                                            class="role-badge {{ $roleClass }}"
                                        >

                                            {{
                                                ucwords(
                                                    str_replace(
                                                        '_',
                                                        ' ',
                                                        $user->role
                                                    )
                                                )
                                            }}

                                        </span>


                                    </td>



                                    <!-- STATUS -->

                                    <td>


                                        @if($user->is_active)


                                            <span
                                                class="status-badge status-active"
                                            >

                                                <i
                                                    class="fa-solid fa-circle"
                                                ></i>

                                                Aktif

                                            </span>


                                        @else


                                            <span
                                                class="status-badge status-inactive"
                                            >

                                                <i
                                                    class="fa-solid fa-circle"
                                                ></i>

                                                Nonaktif

                                            </span>


                                        @endif


                                    </td>



                                    <!-- LAST LOGIN -->

                                    <td>


                                        @if($user->last_login_at)


                                            <span class="last-login">

                                                {{
                                                    $user->last_login_at->format(
                                                        'd M Y, H:i'
                                                    )
                                                }}

                                            </span>


                                        @else


                                            <span class="never-login">

                                                Belum pernah login

                                            </span>


                                        @endif


                                    </td>



                                    <!-- ACTION -->

                                    <td>


                                        @if($isSuperAdmin)


                                            <div class="user-actions">


                                                <!-- EDIT -->

                                                <a
                                                    href="{{ route('admin.pengguna.edit', $user->id) }}"
                                                    class="action-button action-edit"
                                                    title="Edit pengguna"
                                                    aria-label="Edit {{ $user->name }}"
                                                >

                                                    <i
                                                        class="fa-solid fa-pen-to-square"
                                                    ></i>

                                                </a>



                                                <!-- STATUS -->

                                                @if(auth()->id() !== $user->id)


                                                    <form
                                                        action="{{ route('admin.pengguna.status', $user->id) }}"
                                                        method="POST"
                                                        class="action-form"
                                                    >

                                                        @csrf

                                                        @method('PATCH')


                                                        <button
                                                            type="submit"
                                                            class="action-button {{ $user->is_active ? 'action-disable' : 'action-enable' }}"
                                                            title="{{ $user->is_active ? 'Nonaktifkan pengguna' : 'Aktifkan pengguna' }}"
                                                            aria-label="{{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }} {{ $user->name }}"
                                                        >


                                                            @if($user->is_active)

                                                                <i
                                                                    class="fa-solid fa-user-slash"
                                                                ></i>

                                                            @else

                                                                <i
                                                                    class="fa-solid fa-user-check"
                                                                ></i>

                                                            @endif


                                                        </button>

                                                    </form>


                                                @else


                                                    <span
                                                        class="action-button action-disabled"
                                                        title="Akun sendiri tidak dapat dinonaktifkan"
                                                    >

                                                        <i
                                                            class="fa-solid fa-lock"
                                                        ></i>

                                                    </span>


                                                @endif



                                                <!-- DELETE -->

                                                @if(auth()->id() !== $user->id)


                                                    <form
                                                        action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                                        method="POST"
                                                        class="action-form delete-user-form"
                                                    >

                                                        @csrf

                                                        @method('DELETE')


                                                        <button
                                                            type="submit"
                                                            class="action-button action-delete"
                                                            title="Hapus pengguna"
                                                            aria-label="Hapus {{ $user->name }}"
                                                        >

                                                            <i
                                                                class="fa-solid fa-trash"
                                                            ></i>

                                                        </button>

                                                    </form>


                                                @else


                                                    <span
                                                        class="action-button action-disabled"
                                                        title="Akun sendiri tidak dapat dihapus"
                                                    >

                                                        <i
                                                            class="fa-solid fa-lock"
                                                        ></i>

                                                    </span>


                                                @endif


                                            </div>


                                        @else


                                            <span class="text-muted">
                                                Tidak ada akses
                                            </span>


                                        @endif


                                    </td>


                                </tr>


                            @empty


                                <tr>


                                    <td
                                        colspan="7"
                                        class="empty-user"
                                    >


                                        <div
                                            class="empty-user-content"
                                        >


                                            <div
                                                class="empty-user-icon"
                                            >

                                                <i
                                                    class="fa-solid fa-users-slash"
                                                ></i>

                                            </div>


                                            @if(request('search'))


                                                <h3>
                                                    Pengguna Tidak Ditemukan
                                                </h3>


                                                <p>

                                                    Tidak ada pengguna yang sesuai
                                                    dengan pencarian
                                                    "{{ request('search') }}".

                                                </p>


                                            @else


                                                <h3>
                                                    Belum Ada Pengguna
                                                </h3>


                                                <p>
                                                    Belum ada pengguna yang terdaftar.
                                                </p>


                                                @if($isSuperAdmin)

                                                    <button
                                                        type="button"
                                                        class="btn-add-user-empty"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#addUserModal"
                                                    >

                                                        <i
                                                            class="fa-solid fa-user-plus"
                                                        ></i>

                                                        Tambah Pengguna

                                                    </button>

                                                @endif


                                            @endif


                                        </div>


                                    </td>


                                </tr>


                            @endforelse


                        </tbody>


                    </table>


                </div>


            </div>


        </section>


    </main>


</div>



<!-- ==========================================================
     MODAL TAMBAH PENGGUNA
=========================================================== -->

@if($isSuperAdmin)

<div
    class="modal fade"
    id="addUserModal"
    tabindex="-1"
    aria-labelledby="addUserModalLabel"
    aria-hidden="true"
>


    <div
        class="modal-dialog modal-dialog-centered modal-lg"
    >


        <div class="modal-content user-modal">


            <!-- MODAL HEADER -->

            <div class="modal-header">


                <div>

                    <h5
                        class="modal-title"
                        id="addUserModalLabel"
                    >

                        Tambah Pengguna

                    </h5>


                    <p class="modal-subtitle">

                        Tambahkan akun baru untuk mengakses administrator.

                    </p>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Tutup"
                ></button>


            </div>



            <!-- FORM -->

            <form
                action="{{ route('admin.pengguna.store') }}"
                method="POST"
                autocomplete="off"
            >

                @csrf


                <div class="modal-body">


                    <!-- NAMA + EMAIL -->

                    <div class="form-row-custom">


                        <!-- NAMA -->

                        <div class="form-group-custom">


                            <label for="name">

                                Nama Lengkap

                            </label>


                            <div class="input-icon">


                                <i class="fa-solid fa-user"></i>


                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama lengkap"
                                    autocomplete="off"
                                    required
                                >


                            </div>


                        </div>



                        <!-- EMAIL -->

                        <div class="form-group-custom">


                            <label for="email">

                                Email

                            </label>


                            <div class="input-icon">


                                <i class="fa-solid fa-envelope"></i>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email"
                                    autocomplete="off"
                                    autocapitalize="none"
                                    spellcheck="false"
                                    required
                                >


                            </div>


                        </div>


                    </div>



                    <!-- PASSWORD + ROLE -->

                    <div class="form-row-custom">


                        <!-- PASSWORD -->

                        <div class="form-group-custom">


                            <label for="password">

                                Password

                            </label>


                            <div class="input-icon password-input">


                                <i class="fa-solid fa-lock"></i>


                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Minimal 6 karakter"
                                    autocomplete="new-password"
                                    required
                                >


                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="toggleUserPassword()"
                                    aria-label="Tampilkan password"
                                >

                                    <i
                                        class="fa-solid fa-eye"
                                    ></i>

                                </button>


                            </div>


                        </div>



                        <!-- ROLE -->

                        <div class="form-group-custom">


                            <label for="role">

                                Role Pengguna

                            </label>


                            <div class="input-icon select-icon">


                                <i
                                    class="fa-solid fa-user-shield"
                                ></i>


                                <select
                                    id="role"
                                    name="role"
                                    required
                                >

                                    <option value="">
                                        Pilih role
                                    </option>


                                    <option
                                        value="super_admin"
                                        {{ old('role') === 'super_admin' ? 'selected' : '' }}
                                    >
                                        Super Admin
                                    </option>


                                    <option
                                        value="editor"
                                        {{ old('role') === 'editor' ? 'selected' : '' }}
                                    >
                                        Editor
                                    </option>


                                    <option
                                        value="staf_admin"
                                        {{ old('role') === 'staf_admin' ? 'selected' : '' }}
                                    >
                                        Staf Admin
                                    </option>


                                    <option
                                        value="staf_it"
                                        {{ old('role') === 'staf_it' ? 'selected' : '' }}
                                    >
                                        Staf IT
                                    </option>

                                </select>


                            </div>


                        </div>


                    </div>


                </div>



                <!-- MODAL FOOTER -->

                <div class="modal-footer">


                    <button
                        type="button"
                        class="btn-modal-cancel"
                        data-bs-dismiss="modal"
                    >

                        Batal

                    </button>


                    <button
                        type="submit"
                        class="btn-modal-save"
                    >

                        <i
                            class="fa-solid fa-user-plus"
                        ></i>

                        Tambah Pengguna

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>

@endif



<!-- ==========================================================
     BOOTSTRAP JS
=========================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>



<script>


/* =========================================================
   KONFIRMASI HAPUS
========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const deleteForms =
            document.querySelectorAll(
                '.delete-user-form'
            );


        deleteForms.forEach(
            function (form) {


                form.addEventListener(
                    'submit',
                    function (event) {


                        const confirmed =
                            confirm(
                                'Apakah kamu yakin ingin menghapus pengguna ini?'
                            );


                        if (!confirmed) {

                            event.preventDefault();

                        }

                    }
                );

            }
        );

    }
);



/* =========================================================
   TOGGLE PASSWORD
========================================================= */

function toggleUserPassword()
{

    const password =
        document.getElementById(
            'password'
        );


    const button =
        document.querySelector(
            '#addUserModal .password-toggle'
        );


    if (
        !password ||
        !button
    ) {

        return;

    }


    const icon =
        button.querySelector(
            'i'
        );


    if (
        password.type === 'password'
    ) {


        password.type = 'text';


        icon.classList.remove(
            'fa-eye'
        );


        icon.classList.add(
            'fa-eye-slash'
        );


        button.setAttribute(
            'aria-label',
            'Sembunyikan password'
        );


    } else {


        password.type = 'password';


        icon.classList.remove(
            'fa-eye-slash'
        );


        icon.classList.add(
            'fa-eye'
        );


        button.setAttribute(
            'aria-label',
            'Tampilkan password'
        );

    }

}



/* =========================================================
   AUTO OPEN MODAL JIKA VALIDASI GAGAL
========================================================= */

@if($isSuperAdmin && $errors->any())

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const modalElement =
            document.getElementById(
                'addUserModal'
            );


        if (modalElement) {


            const addUserModal =
                new bootstrap.Modal(
                    modalElement
                );


            addUserModal.show();

        }

    }
);

@endif


</script>


</body>

</html>