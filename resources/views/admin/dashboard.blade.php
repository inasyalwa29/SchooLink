<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - SMK Negeri 4 Bogor</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Font Awesome
         Tetap dipakai karena SIDEBAR masih menggunakan icon -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <!-- Dashboard CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-dashboard.css') }}"
    >

    <!-- Sidebar CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >

    <style>
        /* =========================================
           NOTIFICATION
        ========================================= */

        .login-notification {
            width: 100%;
            background: #eaf8ef;
            border: 1px solid #b7e4c7;
            color: #246b3c;
            border-radius: 10px;
            padding: 13px 18px;
            margin-bottom: 22px;
            font-size: 14px;
            font-weight: 500;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            transition: opacity 0.25s ease;
        }

        .login-notification button {
            border: none;
            background: transparent;

            color: #246b3c;

            font-size: 20px;
            line-height: 1;

            cursor: pointer;
            padding: 0;
        }


        /* =========================================
           TOP HEADER
        ========================================= */

        .top-header {
            min-height: 76px;
            padding: 0 35px;

            display: flex;
            align-items: center;
        }

        .top-header .page-title {
            margin: 0;

            font-size: 25px;
            line-height: 1.3;
            font-weight: 700;
        }


        /* =========================================
           RESPONSIVE HEADER
        ========================================= */

        @media (max-width: 768px) {

            .top-header {
                padding: 0 20px;
            }

            .top-header .page-title {
                font-size: 23px;
            }

        }


        @media (max-width: 480px) {

            .top-header {
                padding: 0 15px;
            }

            .top-header .page-title {
                font-size: 20px;
            }

        }
    </style>
</head>


<body>


    {{-- =====================================================
         SIDEBAR
         JANGAN DIUBAH
         ICON SIDEBAR TETAP ADA
    ====================================================== --}}

    @include('admin.layouts.sidebar')


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main-content">


        {{-- =================================================
             HEADER
        ================================================== --}}

        <header class="top-header">

            <h1 class="page-title">
                Dashboard
            </h1>

        </header>


        {{-- =================================================
             CONTENT
        ================================================== --}}

        <div class="content-area">


            {{-- =================================================
                 LOGIN SUCCESS NOTIFICATION
            ================================================== --}}

            @if(session('login_success'))

                <div
                    class="login-notification"
                    id="loginNotification"
                >

                    <span>
                        {{ session('login_success') }}
                    </span>

                    <button
                        type="button"
                        onclick="closeNotification()"
                    >
                        &times;
                    </button>

                </div>

            @endif



            {{-- =================================================
                 CONTENT HEADING
            ================================================== --}}

            <div class="content-heading">

                <h2>
                    Dashboard Admin
                </h2>

                <p>
                    Ringkasan informasi dan aktivitas website
                    SMK Negeri 4 Bogor.
                </p>

            </div>



            {{-- =================================================
                 WELCOME CARD
            ================================================== --}}

            <section class="welcome-card">


                <div class="welcome-content">

                    <span class="welcome-label">
                        ADMIN PANEL
                    </span>


                    <h2>
                        Hello, {{ auth()->user()->name }}
                    </h2>


                    <p>
                        Selamat datang di halaman administrator
                        SMK Negeri 4 Bogor. Kelola informasi website
                        sekolah dengan mudah melalui dashboard ini.
                    </p>


                    <div class="welcome-buttons">


                        <a
                            href="{{ route('admin.berita.index') }}"
                            class="welcome-primary"
                        >
                            Tambah Berita
                        </a>


                        <a
                            href="{{ route('admin.galeri.index') }}"
                            class="welcome-secondary"
                        >
                            Upload Galeri
                        </a>


                    </div>

                </div>



                <div class="welcome-image">

                    <img
                        src="{{ asset('images/sekolah gede.jpeg') }}"
                        alt="SMK Negeri 4 Bogor"
                    >

                </div>


            </section>



            {{-- =================================================
                 STATISTICS
            ================================================== --}}

            <section class="stats-grid">


                {{-- TOTAL BERITA --}}

                <div class="stat-card">

                    <div class="stat-content">

                        <span class="stat-label">
                            Total Berita
                        </span>

                        <strong class="stat-value">
                            {{ \App\Models\Berita::count() }}
                        </strong>

                        <span class="stat-description">
                            Berita di website
                        </span>

                    </div>

                </div>



                {{-- TOTAL GALERI --}}

                <div class="stat-card">

                    <div class="stat-content">

                        <span class="stat-label">
                            Total Galeri
                        </span>

                        <strong class="stat-value">
                            {{ \App\Models\Galeri::count() }}
                        </strong>

                        <span class="stat-description">
                            Foto dan dokumentasi
                        </span>

                    </div>

                </div>



                {{-- PROGRAM KEAHLIAN --}}

                <div class="stat-card">

                    <div class="stat-content">

                        <span class="stat-label">
                            Program Keahlian
                        </span>

                        <strong class="stat-value">
                            4
                        </strong>

                        <span class="stat-description">
                            Program keahlian
                        </span>

                    </div>

                </div>



                {{-- EKSTRAKURIKULER --}}

                <div class="stat-card">

                    <div class="stat-content">

                        <span class="stat-label">
                            Ekstrakurikuler
                        </span>

                        <strong class="stat-value">
                            8
                        </strong>

                        <span class="stat-description">
                            Kegiatan siswa
                        </span>

                    </div>

                </div>


            </section>



            {{-- =================================================
                 DASHBOARD GRID
            ================================================== --}}

            <section class="dashboard-grid">


                {{-- =================================================
                     AKTIVITAS TERBARU
                ================================================== --}}

                <div class="dashboard-card">


                    <div class="card-header">

                        <div>

                            <h3>
                                Aktivitas Terbaru
                            </h3>

                            <p>
                                Kelola konten website sekolah
                            </p>

                        </div>

                    </div>



                    <div class="activity-list">


                        {{-- BERITA --}}

                        <div class="activity-item">

                            <div class="activity-text">

                                <strong>
                                    Berita
                                </strong>

                                <span>
                                    Kelola berita sekolah
                                </span>

                            </div>


                            <a
                                href="{{ route('admin.berita.index') }}"
                                class="activity-link"
                            >
                                Lihat
                            </a>

                        </div>



                        {{-- GALERI --}}

                        <div class="activity-item">

                            <div class="activity-text">

                                <strong>
                                    Galeri
                                </strong>

                                <span>
                                    Kelola foto dan dokumentasi
                                </span>

                            </div>


                            <a
                                href="{{ route('admin.galeri.index') }}"
                                class="activity-link"
                            >
                                Lihat
                            </a>

                        </div>



                        {{-- PROFIL --}}

                        <div class="activity-item">

                            <div class="activity-text">

                                <strong>
                                    Profil Sekolah
                                </strong>

                                <span>
                                    Kelola informasi sekolah
                                </span>

                            </div>


                            <a
                                href="{{ route('admin.profil.index') }}"
                                class="activity-link"
                            >
                                Lihat
                            </a>

                        </div>


                    </div>

                </div>



                {{-- =================================================
                     INFORMASI SEKOLAH
                ================================================== --}}

                <div class="dashboard-card">


                    <div class="card-header">

                        <div>

                            <h3>
                                Informasi Sekolah
                            </h3>

                            <p>
                                Data utama SMK Negeri 4 Bogor
                            </p>

                        </div>

                    </div>



                    <div class="school-info-list">


                        <div class="school-info-item">

                            <span>
                                Nama Sekolah
                            </span>

                            <strong>
                                SMK Negeri 4 Bogor
                            </strong>

                        </div>



                        <div class="school-info-item">

                            <span>
                                Nama Singkat
                            </span>

                            <strong>
                                SMKN 4 Bogor
                            </strong>

                        </div>



                        <div class="school-info-item">

                            <span>
                                Nama Panggilan
                            </span>

                            <strong>
                                NEBRAZKA
                            </strong>

                        </div>



                        <div class="school-info-item">

                            <span>
                                Akreditasi
                            </span>

                            <strong>
                                A
                            </strong>

                        </div>



                        <div class="school-info-item">

                            <span>
                                Lokasi
                            </span>

                            <strong>
                                Kota Bogor
                            </strong>

                        </div>


                    </div>



                    <a
                        href="{{ route('admin.profil.index') }}"
                        class="view-profile"
                    >
                        Lihat Profil Sekolah
                    </a>


                </div>


            </section>


        </div>


    </main>



    {{-- =====================================================
         JAVASCRIPT
    ====================================================== --}}

    <script>

        function closeNotification() {

            const notification =
                document.getElementById('loginNotification');

            if (notification) {

                notification.style.opacity = '0';

                setTimeout(function () {

                    notification.remove();

                }, 250);

            }

        }


        document.addEventListener('DOMContentLoaded', function () {

            const notification =
                document.getElementById('loginNotification');


            if (notification) {

                setTimeout(function () {

                    closeNotification();

                }, 3000);

            }

        });

    </script>



    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>