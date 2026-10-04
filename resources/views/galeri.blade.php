<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri | SMK Negeri 4 Bogor</title>

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

    <!-- CSS WEBSITE UTAMA -->
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <style>

        /* =====================================================
           HEADER GALERI
        ====================================================== */

        .gallery-header {
            background: #ffffff;

            /* Jarak dari navbar */
            padding: 55px 0 75px;
        }

        .gallery-header-content {
            max-width: 1050px;
        }

        .gallery-label {
            display: block;

            color: #1749b8;

            font-size: 12px;
            font-weight: 600;

            letter-spacing: 1px;

            margin-bottom: 8px;
        }

        .gallery-header h1 {
            margin: 0 0 14px;

            color: #111827;

            font-size: 38px;
            font-weight: 700;

            line-height: 1.2;
        }

        .gallery-header p {
            margin: 0;

            color: #4b5563;

            font-size: 15px;

            line-height: 1.8;

            max-width: 1050px;
        }


        /* =====================================================
           SECTION GALERI
        ====================================================== */

        .gallery-section {
            background: #f8fafc;

            /* Jarak antara header dan bagian foto */
            padding: 85px 0 90px;
        }


        /* =====================================================
           JUDUL FOTO
        ====================================================== */

        .gallery-title {
            text-align: center;

            margin-bottom: 0;
        }

        .gallery-title-label {
            display: block;

            color: #1769ff;

            font-size: 16px;
            font-weight: 600;

            margin-bottom: 10px;
        }

        .gallery-title h2 {
            color: #111827;

            font-size: 34px;
            font-weight: 700;

            margin: 0 0 12px;
        }

        .gallery-title p {
            color: #4b5563;

            font-size: 16px;

            margin: 0;
        }


        /* =====================================================
           GRID FOTO
        ====================================================== */

        .gallery-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 24px;

            /* Jarak antara teks dan foto */
            margin-top: 65px;
        }


        /* =====================================================
           FOTO 4 : 5
        ====================================================== */

        .gallery-item {
            position: relative;

            width: 100%;

            aspect-ratio: 4 / 5;

            overflow: hidden;

            border-radius: 8px;

            background: #e9eef7;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform 0.4s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.04);
        }


        /* =====================================================
           OVERLAY JUDUL FOTO
        ====================================================== */

        .gallery-overlay {
            position: absolute;

            inset: 0;

            display: flex;

            align-items: flex-end;

            padding: 20px;

            background: linear-gradient(
                to top,
                rgba(0, 0, 0, 0.68),
                rgba(0, 0, 0, 0.10) 55%,
                transparent
            );

            opacity: 0;

            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h5 {
            color: #ffffff;

            font-size: 15px;
            font-weight: 600;

            line-height: 1.4;

            margin: 0;
        }


        /* =====================================================
           EMPTY STATE
        ====================================================== */

        .gallery-empty {
            background: #ffffff;

            border-radius: 12px;

            padding: 70px 30px;

            text-align: center;

            box-shadow:
                0 5px 20px rgba(0, 0, 0, 0.04);
        }


        /* =====================================================
           RESPONSIVE TABLET
        ====================================================== */

        @media (max-width: 1199px) {

            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);

                gap: 20px;
            }

        }


        /* =====================================================
           RESPONSIVE HP
        ====================================================== */

        @media (max-width: 767px) {

            .gallery-header {
                padding: 40px 0 50px;
            }

            .gallery-header h1 {
                font-size: 28px;
            }

            .gallery-header p {
                font-size: 14px;
                line-height: 1.7;
            }

            .gallery-section {
                padding: 60px 0 70px;
            }

            .gallery-title-label {
                font-size: 14px;
            }

            .gallery-title h2 {
                font-size: 28px;
            }

            .gallery-title p {
                font-size: 14px;
                line-height: 1.6;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);

                gap: 12px;

                margin-top: 45px;
            }

            .gallery-overlay {
                padding: 12px;
            }

            .gallery-overlay h5 {
                font-size: 12px;
            }

        }


        /* =====================================================
           HP KECIL
        ====================================================== */

        @media (max-width: 400px) {

            .gallery-grid {
                gap: 9px;
            }

        }

    </style>
</head>


<body>

    <!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">

    <div class="container">

        <a class="navbar-brand d-flex align-items-center"
           href="{{ route('beranda') }}">

            <img
                src="{{ asset('images/logo sekolah.jpg') }}"
                width="45"
                height="45"
                class="rounded-circle me-2"
                alt="Logo SMK Negeri 4 Bogor"
            >

            <div>

                <strong class="d-block">
                    SMK NEGERI 4 BOGOR
                </strong>

                <small>
                    KR4BAT
                </small>

            </div>

        </a>


        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarKontak"
            aria-controls="navbarKontak"
            aria-expanded="false"
            aria-label="Buka navigasi"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        <div
            class="collapse navbar-collapse"
            id="navbarKontak"
        >

            <div class="navbar-nav ms-auto">

                <a
                    class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                    href="{{ route('beranda') }}"
                >
                    Beranda
                </a>


                <a
                    class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}"
                    href="{{ route('profil') }}"
                >
                    Profil
                </a>


                <a
                    class="nav-link {{ request()->routeIs('program.keahlian') ? 'active' : '' }}"
                    href="{{ route('program.keahlian') }}"
                >
                    Program Keahlian
                </a>


                <a
                    class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                    href="{{ route('kontak') }}"
                >
                    Kontak
                </a>


                <a
                    class="nav-link {{ request()->routeIs('berita.public') ? 'active' : '' }}"
                    href="{{ route('berita.public') }}"
                >
                    Berita
                </a>

            </div>

        </div>

    </div>

</nav>


    <!-- =====================================================
         HEADER GALERI
    ====================================================== -->

    <section class="gallery-header">

        <div class="container">

            <div class="gallery-header-content">

                <span class="gallery-label">
                    DOKUMENTASI SEKOLAH
                </span>


                <h1>
                    Galeri Kegiatan SMK Negeri 4 Bogor
                </h1>


                <p>
                    Rekam jejak kegiatan akademik, praktik vokasi,
                    ekstrakurikuler, dan prestasi civitas akademika
                    SMK Negeri 4 Bogor (KR4BAT) dalam menciptakan
                    generasi unggul berdaya saing global.
                </p>

            </div>

        </div>

    </section>



    <!-- =====================================================
         GALERI FOTO
    ====================================================== -->

    <section class="gallery-section">

        <div class="container">


            <!-- JUDUL FOTO -->

            <div class="gallery-title">

                <span class="gallery-title-label">
                    DOKUMENTASI SEKOLAH
                </span>


                <h2>
                    Foto Kegiatan
                </h2>


                <p>
                    Lihat berbagai kegiatan yang berlangsung
                    di SMK Negeri 4 Bogor.
                </p>

            </div>



            <!-- GRID FOTO -->

            @forelse($galeri as $item)

                @if($loop->first)

                    <div class="gallery-grid">

                @endif


                    <div class="gallery-item">

                        <img
                            src="{{ asset('uploads/' . $item->gambar) }}"
                            alt="{{ $item->judul }}"
                        >


                        <!-- JUDUL SAAT HOVER -->

                        <div class="gallery-overlay">

                            <h5>
                                {{ $item->judul }}
                            </h5>

                        </div>

                    </div>


                @if($loop->last)

                    </div>

                @endif


            @empty

                <div class="gallery-empty">

                    <div
                        class="mb-3 text-primary"
                        style="font-size: 45px;"
                    >

                        <i class="fa-regular fa-images"></i>

                    </div>


                    <h4 class="fw-bold">
                        Belum Ada Foto
                    </h4>


                    <p class="text-muted mb-0">
                        Dokumentasi kegiatan sekolah
                        belum tersedia.
                    </p>

                </div>

            @endforelse

        </div>

    </section>



    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer
        class="py-4 text-white"
        style="background: #0d1728;"
    >

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <strong>
                        SMK NEGERI 4 BOGOR
                    </strong>


                    <p
                        class="small mb-0 mt-1"
                        style="color: #aebbd0;"
                    >
                        Handal, Energik, Berkarakter,
                        Aktif, dan Terampil.
                    </p>

                </div>


                <div
                    class="col-md-6 text-md-end mt-3 mt-md-0"
                >

                    <small style="color: #aebbd0;">

                        Jl. Raya Tajur No.141, Kota Bogor

                    </small>

                </div>

            </div>

        </div>

    </footer>



    <!-- =====================================================
         BOOTSTRAP JS
    ====================================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>