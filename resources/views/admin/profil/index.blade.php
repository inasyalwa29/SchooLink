<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Profil Sekolah - Admin SMKN 4 Bogor
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
         CSS PROFIL
    ========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-profil.css') }}"
    >


    <!-- =========================================================
         CSS SIDEBAR
    ========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >

</head>


<body>

<div class="admin-wrapper">


    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

    @include('admin.layouts.sidebar')


    <!-- =========================================================
         MAIN CONTENT
    ========================================================== -->

    <main class="main-content">


        <!-- =========================================================
             HEADER
        ========================================================== -->

        <header class="top-header">

            <div class="page-title">

                <h1>
                    Profil Sekolah
                </h1>

            </div>


            <div class="header-right">


                <!-- SEARCH -->

                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        placeholder="Cari..."
                        aria-label="Pencarian"
                    >

                </div>


                <!-- =================================================
                     ADMIN PROFILE
                ================================================== -->

                <div class="dropdown admin-profile">

                    <button
                        type="button"
                        class="admin-profile-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >

                        <div class="admin-avatar">

                            <i class="fa-solid fa-user"></i>

                        </div>


                        <div class="admin-info">

                            <strong>
                                {{ auth()->user()->name }}
                            </strong>

                            <span>
                                {{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                            </span>

                        </div>


                        <i class="fa-solid fa-chevron-down profile-arrow"></i>

                    </button>


                    <!-- ACCOUNT DROPDOWN -->

                    <ul class="dropdown-menu dropdown-menu-end admin-profile-menu">

                        <li class="dropdown-header">

                            <div
                                style="
                                    display:flex;
                                    align-items:center;
                                    gap:12px;
                                "
                            >

                                <div
                                    style="
                                        width:42px;
                                        height:42px;
                                        min-width:42px;
                                        border-radius:50%;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        background:#eef3ff;
                                        color:#1233b5;
                                    "
                                >

                                    <i class="fa-solid fa-user"></i>

                                </div>


                                <div>

                                    <strong
                                        style="
                                            display:block;
                                            font-size:14px;
                                            color:#1f2937;
                                        "
                                    >
                                        {{ auth()->user()->name }}
                                    </strong>


                                    <span
                                        style="
                                            display:block;
                                            margin-top:2px;
                                            font-size:12px;
                                            color:#6b7280;
                                        "
                                    >
                                        {{ auth()->user()->email }}
                                    </span>

                                </div>

                            </div>

                        </li>


                        <li>

                            <hr class="dropdown-divider">

                        </li>


                        <!-- ROLE -->

                        <li>

                            <div
                                style="
                                    padding:8px 16px;
                                    font-size:13px;
                                "
                            >

                                <div
                                    style="
                                        display:flex;
                                        align-items:center;
                                        justify-content:space-between;
                                        gap:20px;
                                    "
                                >

                                    <span style="color:#6b7280;">

                                        <i
                                            class="fa-solid fa-shield-halved"
                                            style="
                                                width:18px;
                                                margin-right:6px;
                                            "
                                        ></i>

                                        Role

                                    </span>


                                    <strong
                                        style="
                                            color:#1233b5;
                                            font-size:12px;
                                        "
                                    >
                                        {{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                                    </strong>

                                </div>

                            </div>

                        </li>


                        <!-- STATUS -->

                        <li>

                            <div
                                style="
                                    padding:4px 16px 8px;
                                    font-size:13px;
                                "
                            >

                                <div
                                    style="
                                        display:flex;
                                        align-items:center;
                                        justify-content:space-between;
                                        gap:20px;
                                    "
                                >

                                    <span style="color:#6b7280;">

                                        <i
                                            class="fa-solid fa-circle-check"
                                            style="
                                                width:18px;
                                                margin-right:6px;
                                            "
                                        ></i>

                                        Status

                                    </span>


                                    <strong
                                        style="
                                            color:#198754;
                                            font-size:12px;
                                        "
                                    >
                                        Aktif
                                    </strong>

                                </div>

                            </div>

                        </li>


                        <li>

                            <hr class="dropdown-divider">

                        </li>


                        <!-- DASHBOARD -->

                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('admin.dashboard') }}"
                            >

                                <i class="fa-solid fa-gauge-high"></i>

                                Dashboard

                            </a>

                        </li>


                        <!-- LOGOUT -->

                        <li>

                            <button
                                type="button"
                                class="dropdown-item dropdown-logout"
                                data-bs-toggle="modal"
                                data-bs-target="#modalKonfirmasiLogout"
                            >

                                <i class="fa-solid fa-arrow-right-from-bracket"></i>

                                Keluar

                            </button>

                        </li>

                    </ul>

                </div>

            </div>

        </header>


        <!-- =========================================================
             CONTENT
        ========================================================== -->

        <section class="content-area">


            <!-- =================================================
                 HEADING
            ================================================== -->

            <div class="content-heading">

                <div>

                    <h2>
                        Informasi Sekolah
                    </h2>

                    <p>
                        Kelola informasi utama dan identitas
                        SMKN 4 Bogor.
                    </p>

                </div>

            </div>


            <!-- =================================================
                 ALERT SUCCESS
            ================================================== -->

            @if(session('success'))

                <div class="profile-alert profile-alert-success">

                    <i class="fa-solid fa-circle-check"></i>

                    <div>
                        {{ session('success') }}
                    </div>


                    <button
                        type="button"
                        class="alert-close"
                        onclick="this.parentElement.remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            <!-- =================================================
                 ALERT ERROR
            ================================================== -->

            @if($errors->any())

                <div class="profile-alert profile-alert-error">

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
                        class="alert-close"
                        onclick="this.parentElement.remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif


            <!-- =================================================
                 FORM PROFIL SEKOLAH
            ================================================== -->

            <form
                id="schoolProfileForm"
                action="{{ route('admin.profil.update') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <input
                    type="hidden"
                    name="nilai_1"
                    value="{{ old('nilai_1', $schoolProfile->nilai_1 ?? 'Berkarakter') }}"
                >

                <input
                    type="hidden"
                    name="nilai_2"
                    value="{{ old('nilai_2', $schoolProfile->nilai_2 ?? 'Inovatif') }}"
                >

                <input
                    type="hidden"
                    name="nilai_3"
                    value="{{ old('nilai_3', $schoolProfile->nilai_3 ?? 'Kompeten') }}"
                >

                <input
                    type="hidden"
                    name="nilai_4"
                    value="{{ old('nilai_4', $schoolProfile->nilai_4 ?? 'Siap Kerja') }}"
                >


                <div class="profile-layout">


                    <!-- =================================================
                         IDENTITAS SEKOLAH
                    ================================================== -->

                    <div class="profile-card identity-card">

                        <div class="card-header">

                            <div>

                                <h3>
                                    Identitas Sekolah
                                </h3>

                                <p>
                                    Informasi dasar mengenai sekolah.
                                </p>

                            </div>

                        </div>


                        <div class="form-content">

                            <div class="form-row">

                                <div class="form-group-custom">

                                    <label for="nama_sekolah">
                                        Nama Sekolah
                                    </label>

                                    <input
                                        id="nama_sekolah"
                                        name="nama_sekolah"
                                        form="schoolProfileForm"
                                        type="text"
                                        value="{{ old('nama_sekolah', $schoolProfile->nama_sekolah ?? 'SMK Negeri 4 Bogor') }}"
                                        placeholder="Masukkan nama sekolah"
                                        required
                                    >

                                </div>


                                <div class="form-group-custom">

                                    <label for="nama_singkat">
                                        Nama Singkat
                                    </label>

                                    <input
                                        id="nama_singkat"
                                        name="nama_singkat"
                                        form="schoolProfileForm"
                                        type="text"
                                        value="{{ old('nama_singkat', $schoolProfile->nama_singkat ?? 'KR4BAT') }}"
                                        placeholder="Masukkan nama singkat"
                                    >

                                </div>

                            </div>


                            <div class="form-group-custom">

                                <label for="alamat_sekolah">
                                    Alamat Sekolah
                                </label>

                                <textarea
                                    id="alamat_sekolah"
                                    name="alamat"
                                    form="schoolProfileForm"
                                    rows="3"
                                    placeholder="Masukkan alamat sekolah"
                                >{{ old('alamat', $schoolProfile->alamat ?? 'Jalan Raya Tajur, Kampung Buntar, RT 02/RW 08, Kelurahan Muarasari, Kecamatan Bogor Selatan, Kota Bogor, Jawa Barat 16137.') }}</textarea>

                            </div>


                            <div class="form-row">

                                <div class="form-group-custom">

                                    <label for="telepon">
                                        Nomor Telepon
                                    </label>

                                    <input
                                        id="telepon"
                                        name="telepon"
                                        form="schoolProfileForm"
                                        type="text"
                                        value="{{ old('telepon', $schoolProfile->telepon ?? '+62 251 2752729') }}"
                                        placeholder="Masukkan nomor telepon"
                                    >

                                </div>


                                <div class="form-group-custom">

                                    <label for="email_sekolah">
                                        Email Sekolah
                                    </label>

                                    <input
                                        id="email_sekolah"
                                        name="email"
                                        form="schoolProfileForm"
                                        type="email"
                                        value="{{ old('email', $schoolProfile->email ?? '') }}"
                                        placeholder="Masukkan email sekolah"
                                    >

                                </div>

                            </div>


                            <div class="form-group-custom">

                                <label for="website">
                                    Website
                                </label>

                                <input
                                    id="website"
                                    name="website"
                                    form="schoolProfileForm"
                                    type="text"
                                    value="{{ old('website', $schoolProfile->website ?? 'smkn4bogor.sch.id') }}"
                                    placeholder="Masukkan alamat website"
                                >

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         LOGO SEKOLAH
                    ================================================== -->

                    <div class="profile-card logo-card">

                        <div class="card-header">

                            <div>

                                <h3>
                                    Logo Sekolah
                                </h3>

                                <p>
                                    Gunakan logo resmi sekolah.
                                </p>

                            </div>

                        </div>


                        <div class="logo-upload-content">

                            <div class="school-logo-preview">

                                <img
                                    src="{{ asset('images/logo sekolah.jpg') }}"
                                    alt="Logo SMKN 4 Bogor"
                                >

                            </div>


                            <h4>
                                Logo SMKN 4 Bogor
                            </h4>


                            <p>
                                JPG, JPEG, PNG atau WEBP
                                <br>
                                Maksimal ukuran 2MB
                            </p>


                            <label
                                class="upload-button"
                                for="logo_sekolah"
                            >

                                <i class="fa-solid fa-cloud-arrow-up"></i>

                                Ganti Logo


                                <input
                                    id="logo_sekolah"
                                    name="logo_sekolah"
                                    form="schoolProfileForm"
                                    type="file"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                            </label>

                        </div>

                    </div>


                    <!-- =================================================
                         TENTANG SEKOLAH
                    ================================================== -->

                    <div class="profile-card about-card">

                        <div class="card-header">

                            <div>

                                <h3>
                                    Tentang Sekolah
                                </h3>

                                <p>
                                    Deskripsi singkat mengenai sekolah.
                                </p>

                            </div>

                        </div>


                        <div class="form-content">

                            <div class="form-group-custom">

                                <label for="deskripsi_sekolah">
                                    Deskripsi Sekolah
                                </label>

                                <textarea
                                    id="deskripsi_sekolah"
                                    name="deskripsi"
                                    form="schoolProfileForm"
                                    rows="6"
                                    placeholder="Tuliskan deskripsi mengenai SMKN 4 Bogor..."
                                >{{ old('deskripsi', $schoolProfile->deskripsi ?? "SMKN 4 Bogor adalah Sekolah Menengah Kejuruan Negeri yang berkomitmen mencetak lulusan berkarakter, kompeten, dan siap menghadapi dunia kerja maupun melanjutkan pendidikan.

Dengan dukungan tenaga pendidik profesional, fasilitas yang memadai, serta program keahlian yang relevan dengan kebutuhan industri, SMKN 4 Bogor terus menghadirkan pendidikan berkualitas untuk membentuk generasi yang kreatif, inovatif, dan berdaya saing.") }}</textarea>

                            </div>


                            <div class="form-row">

                                <div class="form-group-custom">

                                    <label for="nama_panggilan">
                                        Nama Panggilan
                                    </label>

                                    <input
                                        id="nama_panggilan"
                                        name="nama_panggilan"
                                        form="schoolProfileForm"
                                        type="text"
                                        value="{{ old('nama_panggilan', $schoolProfile->nama_panggilan ?? 'SMKN 4') }}"
                                        placeholder="Nama panggilan sekolah"
                                    >

                                </div>


                                <div class="form-group-custom">

                                    <label for="akreditasi">
                                        Akreditasi
                                    </label>

                                    <select
                                        id="akreditasi"
                                        name="akreditasi"
                                        form="schoolProfileForm"
                                    >

                                        <option value="">
                                            Pilih Akreditasi
                                        </option>

                                        <option
                                            value="A"
                                            {{ old('akreditasi', $schoolProfile->akreditasi ?? 'A') === 'A' ? 'selected' : '' }}
                                        >
                                            A
                                        </option>

                                        <option
                                            value="B"
                                            {{ old('akreditasi', $schoolProfile->akreditasi ?? 'A') === 'B' ? 'selected' : '' }}
                                        >
                                            B
                                        </option>

                                        <option
                                            value="C"
                                            {{ old('akreditasi', $schoolProfile->akreditasi ?? 'A') === 'C' ? 'selected' : '' }}
                                        >
                                            C
                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         MOTTO
                    ================================================== -->

                    <div class="profile-card motto-card">

                        <div class="card-header">

                            <div>

                                <h3>
                                    Motto Sekolah
                                </h3>

                                <p>
                                    Motto dan nilai utama sekolah.
                                </p>

                            </div>

                        </div>


                        <div class="motto-content">

                            <div class="motto-box">

                                <strong>
                                    HEBAT
                                </strong>

                                <span>
                                    Handal, Energik, Berkarakter,
                                    Aktif, dan Terampil
                                </span>

                            </div>


                            <div class="form-group-custom">

                                <label for="motto">
                                    Motto
                                </label>

                                <input
                                    id="motto"
                                    name="motto"
                                    form="schoolProfileForm"
                                    type="text"
                                    value="{{ old('motto', $schoolProfile->motto ?? 'HEBAT') }}"
                                >

                            </div>


                            <div class="form-group-custom">

                                <label for="penjelasan_motto">
                                    Penjelasan Motto
                                </label>

                                <textarea
                                    id="penjelasan_motto"
                                    name="penjelasan_motto"
                                    form="schoolProfileForm"
                                    rows="4"
                                >{{ old('penjelasan_motto', $schoolProfile->penjelasan_motto ?? 'Handal, Energik, Berkarakter, Aktif, dan Terampil') }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     SAMBUTAN KEPALA SEKOLAH
                ================================================== -->

                <div class="profile-card principal-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Sambutan Kepala Sekolah
                            </h3>

                            <p>
                                Kelola foto, nama, dan sambutan kepala sekolah.
                            </p>

                        </div>

                    </div>


                    <div class="principal-content">

                        <div class="principal-photo-section">

                            <div class="principal-photo">

                                <img
                                    src="{{ $schoolProfile?->foto_kepala_sekolah ? asset('uploads/sekolah/' . $schoolProfile->foto_kepala_sekolah) : asset('images/kepala-sekolah.jpeg') }}"
                                    alt="Foto Kepala Sekolah"
                                >

                            </div>


                            <label
                                class="upload-button"
                                for="foto_kepala_sekolah"
                            >

                                <i class="fa-solid fa-camera"></i>

                                Ganti Foto


                                <input
                                    id="foto_kepala_sekolah"
                                    name="foto_kepala_sekolah"
                                    form="schoolProfileForm"
                                    type="file"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                            </label>


                            <small>
                                JPG, JPEG, PNG, WEBP • Maksimal 2MB
                            </small>

                        </div>


                        <div class="principal-form">

                            <div class="form-row">

                                <div class="form-group-custom">

                                    <label for="nama_kepala_sekolah">
                                        Nama Kepala Sekolah
                                    </label>

                                    <input
                                        id="nama_kepala_sekolah"
                                        name="nama_kepala_sekolah"
                                        form="schoolProfileForm"
                                        type="text"
                                        value="{{ old('nama_kepala_sekolah', $schoolProfile->nama_kepala_sekolah ?? 'Drs. Mulya Murprihartono, M.Si') }}"
                                        placeholder="Masukkan nama kepala sekolah"
                                    >

                                </div>


                                <div class="form-group-custom">

                                    <label for="jabatan_kepala_sekolah">
                                        Jabatan
                                    </label>

                                    <input
                                        id="jabatan_kepala_sekolah"
                                        name="jabatan_kepala_sekolah"
                                        form="schoolProfileForm"
                                        type="text"
                                        value="{{ old('jabatan_kepala_sekolah', $schoolProfile->jabatan_kepala_sekolah ?? 'Kepala Sekolah') }}"
                                        placeholder="Masukkan jabatan"
                                    >

                                </div>

                            </div>


                            <div class="form-group-custom">

                                <label for="sambutan_kepala_sekolah">
                                    Sambutan Kepala Sekolah
                                </label>


                                <textarea
                                    id="sambutan_kepala_sekolah"
                                    name="sambutan_kepala_sekolah"
                                    form="schoolProfileForm"
                                    rows="8"
                                    placeholder="Tuliskan sambutan kepala sekolah..."
                                >{{ old('sambutan_kepala_sekolah', $schoolProfile->sambutan_kepala_sekolah ?? "Selamat datang di Website Resmi SMK Negeri 4 Bogor. Website ini menjadi media informasi dan komunikasi untuk memperkenalkan profil sekolah, program keahlian, prestasi, serta berbagai kegiatan yang kami laksanakan.

Kami berkomitmen memberikan pendidikan berkualitas guna mencetak lulusan yang berkarakter, kompeten, dan siap menghadapi dunia kerja maupun melanjutkan pendidikan ke jenjang yang lebih tinggi.") }}</textarea>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     STRUKTUR ORGANISASI
                ================================================== -->

                <div class="profile-card profile-full-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Struktur Organisasi
                            </h3>

                            <p>
                                Informasi struktur organisasi SMKN 4 Bogor.
                            </p>

                        </div>

                    </div>


                    <div class="structure-content">

                        <div class="structure-main">

                            <div class="structure-item principal">

                                <i class="fa-solid fa-user-tie"></i>

                                <div>

                                    <strong>
                                        Kepala Sekolah
                                    </strong>

                                    <span>
                                        Memimpin dan mengelola seluruh kegiatan sekolah.
                                    </span>

                                </div>

                            </div>


                            <div class="structure-line"></div>


                            <div class="structure-grid">

                                <div class="structure-item">

                                    <i class="fa-solid fa-book-open"></i>

                                    <div>

                                        <strong>
                                            Wakil Kepala Sekolah
                                        </strong>

                                        <span>
                                            Kurikulum
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-users"></i>

                                    <div>

                                        <strong>
                                            Wakil Kepala Sekolah
                                        </strong>

                                        <span>
                                            Kesiswaan
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-building"></i>

                                    <div>

                                        <strong>
                                            Wakil Kepala Sekolah
                                        </strong>

                                        <span>
                                            Sarana dan Prasarana
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-handshake"></i>

                                    <div>

                                        <strong>
                                            Wakil Kepala Sekolah
                                        </strong>

                                        <span>
                                            Humas
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-file-lines"></i>

                                    <div>

                                        <strong>
                                            Kepala Tata Usaha
                                        </strong>

                                        <span>
                                            Administrasi Sekolah
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-wallet"></i>

                                    <div>

                                        <strong>
                                            Keuangan
                                        </strong>

                                        <span>
                                            Pengelolaan keuangan sekolah
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-user-group"></i>

                                    <div>

                                        <strong>
                                            Kepegawaian
                                        </strong>

                                        <span>
                                            Administrasi kepegawaian
                                        </span>

                                    </div>

                                </div>


                                <div class="structure-item">

                                    <i class="fa-solid fa-folder-open"></i>

                                    <div>

                                        <strong>
                                            Kesekretariatan
                                        </strong>

                                        <span>
                                            Administrasi dan surat-menyurat
                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     PROGRAM KEAHLIAN
                ================================================== -->

                <div class="profile-card profile-full-card program-profile-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Program Keahlian
                            </h3>

                            <p>
                                Program keahlian yang tersedia di SMKN 4 Bogor.
                            </p>

                        </div>

                    </div>


                    <div class="program-content">

                        @forelse($programKeahlians as $programKeahlian)

                            <div class="program-item">

                                <div class="program-icon">

                                    @if($programKeahlian->logo)

                                        <img
                                            src="{{ asset('uploads/program-keahlian/' . $programKeahlian->logo) }}"
                                            alt="Logo {{ $programKeahlian->singkatan }}"
                                        >

                                    @else

                                        <i class="fa-solid fa-graduation-cap"></i>

                                    @endif

                                </div>


                                <div>

                                    <strong>
                                        {{ $programKeahlian->singkatan }}
                                    </strong>

                                    <span>
                                        {{ $programKeahlian->nama }}
                                    </span>

                                    @if($programKeahlian->deskripsi)

                                        <span>
                                            {{ $programKeahlian->deskripsi }}
                                        </span>

                                    @else

                                        <span>
                                            Informasi program keahlian SMKN 4 Bogor.
                                        </span>

                                    @endif

                                </div>

                            </div>

                        @empty

                            <div class="ekskul-empty">

                                <div class="ekskul-empty-icon">

                                    <i class="fa-solid fa-graduation-cap"></i>

                                </div>


                                <h4>
                                    Belum Ada Program Keahlian
                                </h4>


                                <p>
                                    Data program keahlian belum tersedia.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </form>


            <!-- =================================================
                 EKSTRAKURIKULER
                 FORM PROFIL SEKOLAH SUDAH DITUTUP DI ATAS
            ================================================== -->

            <div class="profile-card profile-full-card ekskul-profile-card">

                <div class="card-header">

                    <div>

                        <h3>
                            Ekstrakurikuler
                        </h3>

                        <p>
                            Kelola kegiatan ekstrakurikuler sekolah.
                        </p>

                    </div>


                    <div class="card-header-actions">

                        <button
                            type="button"
                            class="btn-add-ekskul"
                            data-bs-toggle="modal"
                            data-bs-target="#modalTambahEkskul"
                        >
                            Tambah Ekstrakurikuler
                        </button>

                    </div>

                </div>


                <div class="program-content ekskul-content">

                    @forelse($ekstrakurikulers as $ekstrakurikuler)

                        <div class="program-item ekskul-item">


                            <!-- GAMBAR -->

                            <div class="ekskul-item-visual">

                                @if($ekstrakurikuler->gambar)

                                    <img
                                        src="{{ asset('uploads/ekstrakurikuler/' . $ekstrakurikuler->gambar) }}"
                                        alt="{{ $ekstrakurikuler->nama }}"
                                    >

                                @else

                                    <span style="font-size:10px; color:#7b879b;">
                                        Belum ada foto
                                    </span>

                                @endif

                            </div>


                            <!-- INFORMASI -->

                            <div class="ekskul-item-info">

                                <strong>
                                    {{ $ekstrakurikuler->nama }}
                                </strong>

                                <span>
                                    {{ $ekstrakurikuler->deskripsi ?: 'Belum ada deskripsi.' }}
                                </span>

                            </div>


                            <!-- ACTION -->

                            <div class="ekskul-item-actions">


                                <!-- EDIT -->

                                <button
                                    type="button"
                                    class="btn-ekskul-edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditEkskul{{ $ekstrakurikuler->id }}"
                                    title="Edit"
                                >
                                    Edit
                                </button>


                                <!-- DELETE -->

                                <form
                                    action="{{ route('admin.profil.ekstrakurikuler.destroy', $ekstrakurikuler->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus ekstrakurikuler ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-ekskul-delete"
                                        title="Hapus"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </div>


                        <!-- =================================================
                             MODAL EDIT EKSTRAKURIKULER
                        ================================================== -->

                        <div
                            class="modal fade"
                            id="modalEditEkskul{{ $ekstrakurikuler->id }}"
                            tabindex="-1"
                            aria-hidden="true"
                        >

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content ekskul-modal">


                                    <div class="modal-header">

                                        <div>

                                            <h5 class="modal-title">
                                                Edit Ekstrakurikuler
                                            </h5>

                                            <p class="modal-subtitle">
                                                Perbarui informasi ekstrakurikuler.
                                            </p>

                                        </div>


                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                        ></button>

                                    </div>


                                    <form
                                        action="{{ route('admin.profil.ekstrakurikuler.update', $ekstrakurikuler->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data"
                                    >

                                        @csrf

                                        @method('PUT')


                                        <div class="modal-body">


                                            <div class="form-group-custom">

                                                <label>
                                                    Nama Ekstrakurikuler
                                                </label>

                                                <input
                                                    type="text"
                                                    name="nama"
                                                    value="{{ $ekstrakurikuler->nama }}"
                                                    required
                                                >

                                            </div>


                                            <div class="form-group-custom">

                                                <label>
                                                    Deskripsi
                                                </label>

                                                <textarea
                                                    name="deskripsi"
                                                    rows="4"
                                                    placeholder="Masukkan deskripsi ekstrakurikuler..."
                                                >{{ $ekstrakurikuler->deskripsi }}</textarea>

                                            </div>


                                            <div class="form-group-custom">

                                                <label>
                                                    Foto Ekstrakurikuler
                                                </label>


                                                @if($ekstrakurikuler->gambar)

                                                    <div class="current-ekskul-photo">

                                                        <img
                                                            src="{{ asset('uploads/ekstrakurikuler/' . $ekstrakurikuler->gambar) }}"
                                                            alt="{{ $ekstrakurikuler->nama }}"
                                                        >

                                                    </div>

                                                @endif


                                                <label class="ekskul-upload-box">

                                                    <div class="ekskul-upload-icon">

                                                        <i class="fa-solid fa-cloud-arrow-up"></i>

                                                    </div>


                                                    <div>

                                                        <strong>
                                                            Pilih foto baru
                                                        </strong>

                                                        <span>
                                                            JPG, JPEG, PNG, WEBP • Maksimal 10MB
                                                        </span>

                                                    </div>


                                                    <input
                                                        type="file"
                                                        name="gambar"
                                                        accept=".jpg,.jpeg,.png,.webp"
                                                    >

                                                </label>

                                            </div>

                                        </div>


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
                                                Simpan Perubahan
                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty


                        <div class="ekskul-empty">

                            <div class="ekskul-empty-icon">
                                Belum ada foto
                            </div>


                            <h4>
                                Belum Ada Ekstrakurikuler
                            </h4>


                            <p>
                                Tambahkan kegiatan ekstrakurikuler pertama.
                            </p>


                            <button
                                type="button"
                                class="btn-add-ekskul-empty"
                                data-bs-toggle="modal"
                                data-bs-target="#modalTambahEkskul"
                            >
                                Tambah Ekstrakurikuler
                            </button>

                        </div>


                    @endforelse

                </div>

            </div>


            <!-- =================================================
                 MODAL TAMBAH EKSTRAKURIKULER
            ================================================== -->

            <div
                class="modal fade"
                id="modalTambahEkskul"
                tabindex="-1"
                aria-hidden="true"
            >

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content ekskul-modal">


                        <!-- HEADER -->

                        <div class="modal-header">

                            <div>

                                <h5 class="modal-title">
                                    Tambah Ekstrakurikuler
                                </h5>

                                <p class="modal-subtitle">
                                    Tambahkan kegiatan ekstrakurikuler baru.
                                </p>

                            </div>


                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                            ></button>

                        </div>


                        <!-- =================================================
                             FORM TAMBAH EKSTRAKURIKULER
                        ================================================== -->

                        <form
                            action="{{ route('admin.profil.ekstrakurikuler.store') }}"
                            method="POST"
                            enctype="multipart/form-data"
                        >

                            @csrf


                            <div class="modal-body">


                                <!-- NAMA -->

                                <div class="form-group-custom">

                                    <label for="nama_ekstrakurikuler">
                                        Nama Ekstrakurikuler
                                    </label>

                                    <input
                                        id="nama_ekstrakurikuler"
                                        type="text"
                                        name="nama"
                                        placeholder="Contoh: Futsal"
                                        required
                                    >

                                </div>


                                <!-- DESKRIPSI -->

                                <div class="form-group-custom">

                                    <label for="deskripsi_ekstrakurikuler">
                                        Deskripsi
                                    </label>

                                    <textarea
                                        id="deskripsi_ekstrakurikuler"
                                        name="deskripsi"
                                        rows="4"
                                        placeholder="Contoh: Kegiatan olahraga futsal..."
                                    ></textarea>

                                </div>


                                <!-- FOTO -->

                                <div class="form-group-custom">

                                    <label>
                                        Foto Ekstrakurikuler
                                    </label>


                                    <label class="ekskul-upload-box">

                                        <div class="ekskul-upload-icon">

                                            <i class="fa-solid fa-cloud-arrow-up"></i>

                                        </div>


                                        <div>

                                            <strong>
                                                Pilih foto ekstrakurikuler
                                            </strong>

                                            <span>
                                                JPG, JPEG, PNG, WEBP • Maksimal 10MB
                                            </span>

                                        </div>


                                        <input
                                            type="file"
                                            name="gambar"
                                            accept=".jpg,.jpeg,.png,.webp"
                                        >

                                    </label>

                                </div>

                            </div>


                            <!-- FOOTER -->

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

                                    <i class="fa-solid fa-plus"></i>

                                    Tambahkan

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 SAVE BUTTON PROFIL
            ================================================== -->

            <div class="save-section">

                <button
                    type="submit"
                    form="schoolProfileForm"
                    class="btn-save-profile"
                >

                    <i class="fa-solid fa-floppy-disk"></i>

                    Simpan Perubahan

                </button>

            </div>


        </section>

    </main>

</div>


<!-- =========================================================
     MODAL KONFIRMASI LOGOUT
========================================================== -->

<div
    class="modal fade"
    id="modalKonfirmasiLogout"
    tabindex="-1"
    aria-labelledby="modalKonfirmasiLogoutLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <!-- HEADER -->

            <div class="modal-header">

                <div>

                    <h5
                        class="modal-title"
                        id="modalKonfirmasiLogoutLabel"
                    >
                        Konfirmasi Keluar
                    </h5>

                    <p
                        class="mb-0"
                        style="
                            margin-top:4px;
                            font-size:13px;
                            color:#6b7280;
                        "
                    >
                        Masukkan kata sandi akun untuk melanjutkan.
                    </p>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Tutup"
                ></button>

            </div>


            <!-- FORM LOGOUT -->

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                autocomplete="off"
            >

                @csrf


                <div class="modal-body">


                    <!-- INFO AKUN -->

                    <div
                        style="
                            display:flex;
                            align-items:center;
                            gap:12px;
                            padding:12px;
                            margin-bottom:18px;
                            border-radius:10px;
                            background:#f8f9fa;
                        "
                    >

                        <div
                            style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                                border-radius:50%;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                background:#eef3ff;
                                color:#1233b5;
                            "
                        >

                            <i class="fa-solid fa-user"></i>

                        </div>


                        <div>

                            <strong
                                style="
                                    display:block;
                                    font-size:14px;
                                    color:#1f2937;
                                "
                            >
                                {{ auth()->user()->name }}
                            </strong>


                            <span
                                style="
                                    display:block;
                                    margin-top:2px;
                                    font-size:12px;
                                    color:#6b7280;
                                "
                            >
                                {{ auth()->user()->email }}
                            </span>

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group-custom">

                        <label for="logout_password">
                            Kata Sandi
                        </label>


                        <div style="position:relative;">

                            <input
                                id="logout_password"
                                type="password"
                                name="password"
                                placeholder="Masukkan kata sandi"
                                autocomplete="current-password"
                                required
                                style="
                                    width:100%;
                                    padding-right:48px;
                                "
                            >


                            <button
                                type="button"
                                onclick="toggleLogoutPassword()"
                                aria-label="Tampilkan kata sandi"
                                style="
                                    position:absolute;
                                    right:12px;
                                    top:50%;
                                    transform:translateY(-50%);
                                    border:0;
                                    background:transparent;
                                    color:#6b7280;
                                    cursor:pointer;
                                "
                            >

                                <i
                                    class="fa-solid fa-eye"
                                    id="logoutPasswordIcon"
                                ></i>

                            </button>

                        </div>


                        @if($errors->has('logout_password'))

                            <small
                                style="
                                    display:block;
                                    margin-top:6px;
                                    color:#dc3545;
                                "
                            >
                                {{ $errors->first('logout_password') }}
                            </small>

                        @endif

                    </div>

                </div>


                <!-- FOOTER -->

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

                        <i class="fa-solid fa-arrow-right-from-bracket"></i>

                        Konfirmasi Keluar

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- =========================================================
     BOOTSTRAP JS
========================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- =========================================================
     LOGOUT PASSWORD SCRIPT
========================================================== -->

<script>

    function toggleLogoutPassword() {

        const password =
            document.getElementById('logout_password');

        const icon =
            document.getElementById('logoutPasswordIcon');


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


    /*
    |------------------------------------------------------------------
    | BUKA KEMBALI MODAL LOGOUT JIKA PASSWORD SALAH
    |------------------------------------------------------------------
    */

    @if($errors->has('logout_password'))

        document.addEventListener('DOMContentLoaded', function () {

            const logoutModal =
                document.getElementById('modalKonfirmasiLogout');


            if (logoutModal) {

                const modal =
                    new bootstrap.Modal(logoutModal);

                modal.show();

            }

        });

    @endif

</script>


</body>

</html>