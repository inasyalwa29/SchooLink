<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Berita - SMK Negeri 4 Bogor</title>

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

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- CSS Utama Website -->
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

    <!-- CSS Navbar (dipakai semua halaman) -->
    <link
        rel="stylesheet"
        href="{{ asset('css/navbar.css') }}"
    >


    <style>

        /* =====================================================
           DASAR HALAMAN
        ===================================================== */

        html,
        body {
            margin: 0;
            padding: 0;

            min-height: 100%;
        }

        body {
            font-family: 'Poppins', sans-serif;

            background: #f8fbff;

            color: #111827;
        }

        .public-news-page {
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            background: #f8fbff;
        }


        /* =====================================================
           HEADER HALAMAN BERITA
        ===================================================== */

        .news-page-header {
            background: #ffffff;

            color: #111827;

            padding: 35px 8% 70px;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .news-page-navbar {
            width: 100%;
            max-width: 1500px;

            margin: 0 auto 70px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 30px;
        }


        /* BRAND */

        .news-page-brand {
            display: flex;

            align-items: center;

            gap: 12px;

            color: #111827;

            text-decoration: none;
        }

        .news-page-brand img {
            width: 52px;
            height: 52px;

            object-fit: contain;
        }

        .news-page-brand-text {
            display: flex;

            flex-direction: column;
        }

        .news-page-brand-text strong {
            font-size: 1.1rem;

            font-weight: 700;

            letter-spacing: 0.4px;
        }

        .news-page-brand-text span {
            font-size: 0.78rem;

            color: #64748b;
        }


        /* NAVIGATION */

        .news-page-nav {
            display: flex;

            align-items: center;

            gap: 28px;
        }

        .news-page-nav a {
            color: #334155;

            font-size: 0.9rem;

            font-weight: 500;

            text-decoration: none;

            transition: 0.3s ease;
        }

        .news-page-nav a:hover {
            color: #1233b5;
        }

        .news-page-nav a.active {
            color: #1233b5;

            font-weight: 700;
        }


        /* =====================================================
           JUDUL HEADER
        ===================================================== */

        .news-page-title {
            width: 100%;
            max-width: 1500px;

            margin: 0 auto;

            text-align: left;
        }


        /* LABEL BERITA SEKOLAH */

        .news-page-title .title-label {
            display: block;

            color: #1769ff;

            font-size: 17px;

            font-weight: 600;

            letter-spacing: 0.5px;

            margin-bottom: 10px;
        }


        /* JUDUL UTAMA */

        .news-page-title h1 {
            margin: 0 0 15px;

            color: #111827;

            font-size: 42px;

            font-weight: 700;

            line-height: 1.2;
        }


        /* DESKRIPSI */

        .news-page-title p {
            max-width: 1100px;

            margin: 0;

            color: #4b5563;

            font-size: 17px;

            line-height: 1.8;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .news-page-content {
            width: 100%;
            max-width: 1250px;

            margin: 0 auto;

            padding: 65px 6% 80px;

            flex: 1;
        }


        /* =====================================================
           NEWS GRID
        ===================================================== */

        .public-news-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 30px;
        }


        /* =====================================================
           NEWS CARD
        ===================================================== */

        .public-news-card {
            background: #ffffff;

            border-radius: 14px;

            overflow: hidden;

            border: 1px solid #e2e8f0;

            box-shadow:
                0 6px 20px
                rgba(15, 47, 95, 0.07);

            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .public-news-card:hover {
            transform: translateY(-6px);

            box-shadow:
                0 16px 35px
                rgba(15, 47, 95, 0.12);
        }


        /* =====================================================
           FOTO BERITA
        ===================================================== */

        .public-news-photo {
            width: 100%;

            height: 220px;

            overflow: hidden;

            background: #e2e8f0;
        }

        .public-news-photo img {
            width: 100%;

            height: 100%;

            object-fit: cover;

            transition: transform 0.45s ease;
        }

        .public-news-card:hover
        .public-news-photo img {
            transform: scale(1.05);
        }


        /* FOTO KOSONG */

        .public-news-photo.empty {
            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #dbeafe,
                    #eff6ff
                );

            color: #64748b;
        }

        .public-news-photo.empty i {
            font-size: 42px;
        }


        /* =====================================================
           CARD CONTENT
        ===================================================== */

        .public-news-content {
            padding: 22px 22px 24px;
        }


        /* META */

        .public-news-meta {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 10px;

            margin-bottom: 12px;
        }


        /* KATEGORI */

        .public-news-category {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            color: #1233b5;

            background: #eff6ff;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 0.7rem;

            font-weight: 700;
        }


        /* TANGGAL */

        .public-news-date {
            color: #94a3b8;

            font-size: 0.7rem;

            white-space: nowrap;
        }


        /* JUDUL BERITA */

        .public-news-content h2 {
            color: #082a91;

            font-size: 1.15rem;

            font-weight: 700;

            line-height: 1.4;

            margin: 0 0 10px;
        }


        /* RINGKASAN */

        .public-news-content p {
            color: #64748b;

            font-size: 0.82rem;

            line-height: 1.65;

            margin: 0 0 18px;

            display: -webkit-box;

            -webkit-line-clamp: 3;

            -webkit-box-orient: vertical;

            overflow: hidden;
        }


        /* BACA SELENGKAPNYA */

        .public-news-read {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            color: #1233b5;

            font-size: 0.78rem;

            font-weight: 700;

            text-decoration: none;
        }

        .public-news-read i {
            font-size: 0.7rem;

            transition: transform 0.3s ease;
        }

        .public-news-read:hover {
            color: #f59e0b;
        }

        .public-news-read:hover i {
            transform: translateX(4px);
        }


        /* =====================================================
           EMPTY STATE
        ===================================================== */

        .public-news-empty {
            grid-column: 1 / -1;

            min-height: 350px;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            text-align: center;

            background: #ffffff;

            border: 1px dashed #cbd5e1;

            border-radius: 18px;

            padding: 50px 30px;
        }

        .public-news-empty-icon {
            width: 75px;
            height: 75px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #eff6ff;

            color: #1233b5;

            font-size: 1.8rem;

            margin-bottom: 18px;
        }

        .public-news-empty h2 {
            color: #334155;

            font-size: 1.2rem;

            font-weight: 700;

            margin-bottom: 8px;
        }

        .public-news-empty p {
            color: #64748b;

            font-size: 0.85rem;

            margin: 0;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .news-page-footer {
            width: 100%;

            background: #0f172a;

            color: #94a3b8;

            padding: 32px 8%;

            text-align: center;

            margin-top: auto;
        }

        .news-page-footer p {
            margin: 0;

            font-size: 0.85rem;
        }

        .news-page-footer strong {
            color: #ffffff;
        }


        /* =====================================================
           RESPONSIVE 992px
        ===================================================== */

        @media (max-width: 992px) {

            .public-news-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

            .news-page-nav {
                gap: 18px;
            }

            .news-page-nav a {
                font-size: 0.82rem;
            }

            .news-page-title h1 {
                font-size: 36px;
            }

            .news-page-title p {
                font-size: 16px;
            }
        }


        /* =====================================================
           RESPONSIVE 768px
        ===================================================== */

        @media (max-width: 768px) {

            .news-page-header {
                padding:
                    25px
                    6%
                    50px;
            }

            .news-page-navbar {
                margin-bottom: 50px;
            }

            .news-page-nav {
                display: none;
            }

            .news-page-title h1 {
                font-size: 32px;
            }

            .news-page-title p {
                font-size: 15px;

                line-height: 1.7;
            }

            .news-page-content {
                padding:
                    50px
                    6%
                    65px;
            }

            .public-news-grid {
                grid-template-columns: 1fr;
            }

            .public-news-photo {
                height: 220px;
            }
        }


        /* =====================================================
           RESPONSIVE 576px
        ===================================================== */

        @media (max-width: 576px) {

            .news-page-header {
                padding:
                    22px
                    5%
                    45px;
            }

            .news-page-brand img {
                width: 44px;
                height: 44px;
            }

            .news-page-brand-text strong {
                font-size: 0.95rem;
            }

            .news-page-brand-text span {
                font-size: 0.7rem;
            }

            .news-page-title .title-label {
                font-size: 15px;
            }

            .news-page-title h1 {
                font-size: 27px;

                line-height: 1.3;
            }

            .news-page-title p {
                font-size: 14px;

                line-height: 1.7;
            }

            .news-page-content {
                padding:
                    45px
                    5%
                    55px;
            }

            .public-news-content {
                padding:
                    18px
                    18px
                    20px;
            }

            .public-news-content h2 {
                font-size: 1rem;
            }

            .public-news-content p {
                font-size: 0.78rem;
            }

            .public-news-photo {
                height: 200px;
            }

            .news-page-footer {
                padding:
                    28px
                    5%;
            }

            .news-page-footer p {
                font-size: 0.78rem;
            }
        }

    </style>
</head>


<body>

<div class="public-news-page">

    @include('partials.navbar')


    <!-- =================================================
         HEADER
    ================================================== -->

    <header class="news-page-header">

        <!-- =================================================
             JUDUL HEADER
        ================================================== -->

        <div class="news-page-title">
            

            <span class="title-label">
                BERITA SEKOLAH
            </span>


            <h1>
                Berita Terbaru SMK Negeri 4 Bogor
            </h1>


            <p>
                Dapatkan informasi terkini seputar kegiatan,
                pengumuman, prestasi, dan berbagai berita penting
                lainnya dari SMK Negeri 4 Bogor.
            </p>

        </div>


    </header>


    <!-- =================================================
         CONTENT
    ================================================== -->

    <main class="news-page-content">

        <div class="public-news-grid">


            @forelse ($beritas as $berita)


                <!-- =================================================
                     CARD BERITA
                ================================================== -->

                <article class="public-news-card">


                    <!-- FOTO -->

                    @if ($berita->gambar)

                        <div class="public-news-photo">

                            <img
                                src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                alt="{{ $berita->judul }}"
                            >

                        </div>

                    @else

                        <div class="public-news-photo empty">

                            <i class="fa-regular fa-image"></i>

                        </div>

                    @endif


                    <!-- CONTENT -->

                    <div class="public-news-content">


                        <!-- META -->

                        <div class="public-news-meta">


                            <!-- KATEGORI -->

                            <span class="public-news-category">

                                <i class="fa-solid fa-tag"></i>

                                {{ $berita->kategori }}

                            </span>


                            <!-- TANGGAL -->

                            <span class="public-news-date">

                                <i class="fa-regular fa-calendar"></i>

                                {{ $berita->tanggal->format('d F Y') }}

                            </span>


                        </div>


                        <!-- JUDUL -->

                        <h2>
                            {{ $berita->judul }}
                        </h2>


                        <!-- RINGKASAN -->

                        @if ($berita->ringkasan)

                            <p>
                                {{ $berita->ringkasan }}
                            </p>

                        @else

                            <p>
                                Baca berita selengkapnya untuk
                                mengetahui informasi terbaru dari
                                SMK Negeri 4 Bogor.
                            </p>

                        @endif


                        <!-- LINK -->

<a
    href="{{ route('berita.detail', $berita->id) }}"
    class="public-news-read"
>
    Baca Selengkapnya
    <i class="fa-solid fa-arrow-right"></i>
</a>


                    </div>


                </article>


            @empty


                <!-- =================================================
                     EMPTY STATE
                ================================================== -->

                <div class="public-news-empty">

                    <div class="public-news-empty-icon">

                        <i
                            class="fa-regular fa-newspaper"
                        ></i>

                    </div>


                    <h2>
                        Belum Ada Berita
                    </h2>


                    <p>
                        Informasi berita sekolah akan
                        ditampilkan di halaman ini.
                    </p>

                </div>


            @endforelse


        </div>

    </main>


    <!-- =================================================
         FOOTER
    ================================================== -->

    <footer class="news-page-footer">

        <p>

            © {{ date('Y') }}

            <strong>
                SMK Negeri 4 Bogor
            </strong>.

            Semua hak dilindungi.

        </p>

    </footer>


</div>


<!-- =================================================
     BOOTSTRAP JS
================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>