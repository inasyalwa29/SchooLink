<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}
    </title>


    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- CSS Custom -->
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
           GALERI - RASIO FOTO 4:5
        ===================================================== */

        .gallery-photo {
            width: 100%;
            aspect-ratio: 4 / 5;
            overflow: hidden;
        }

        .gallery-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }


        /* =====================================================
           GALERI RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .gallery-photo {
                aspect-ratio: 4 / 5;
            }

        }


        @media (max-width: 576px) {

            .gallery-photo {
                aspect-ratio: 4 / 5;
            }

        }


        /* =====================================================
           RATING & KOMENTAR PENGUNJUNG
        ===================================================== */

        .review-section {
            padding: 90px 7%;
            background: #f7f9fc;
        }

        .review-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .review-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .review-label {
            display: inline-block;
            color: #1233b5;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .review-heading h2 {
            font-size: 40px;
            font-weight: 800;
            color: #172033;
            margin-bottom: 12px;
        }

        .review-heading p {
            max-width: 650px;
            margin: 0 auto;
            color: #667085;
            line-height: 1.7;
        }


        /* =====================================================
           REVIEW SUMMARY
        ===================================================== */

        .review-summary {
            background: white;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.07);
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .review-average {
            text-align: center;
            min-width: 180px;
        }

        .review-average-number {
            display: block;
            font-size: 48px;
            font-weight: 800;
            color: #1233b5;
            line-height: 1;
            margin-bottom: 10px;
        }

        .review-stars {
            color: #f5b301;
            font-size: 22px;
            letter-spacing: 3px;
        }

        .review-total {
            color: #667085;
            font-size: 14px;
            margin-top: 8px;
        }

        .review-summary-text {
            flex: 1;
        }

        .review-summary-text h3 {
            font-size: 22px;
            font-weight: 700;
            color: #172033;
            margin-bottom: 8px;
        }

        .review-summary-text p {
            color: #667085;
            margin: 0;
            line-height: 1.7;
        }


        /* =====================================================
           REVIEW FORM
        ===================================================== */

        .review-form-card {
            background: white;
            border-radius: 22px;
            padding: 32px;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.07);
            margin-bottom: 40px;
        }

        .review-form-card h3 {
            font-size: 24px;
            font-weight: 750;
            color: #172033;
            margin-bottom: 6px;
        }

        .review-form-description {
            color: #667085;
            margin-bottom: 25px;
        }

        .review-form-group {
            margin-bottom: 20px;
        }

        .review-form-group label {
            display: block;
            font-weight: 650;
            color: #344054;
            margin-bottom: 8px;
        }

        .review-form-control {
            width: 100%;
            border: 1px solid #d0d5dd;
            border-radius: 12px;
            padding: 13px 15px;
            font-size: 15px;
            outline: none;
            transition: 0.2s ease;
            background: #fff;
        }

        .review-form-control:focus {
            border-color: #1233b5;
            box-shadow: 0 0 0 4px rgba(18, 51, 181, 0.08);
        }

        .review-form-control::placeholder {
            color: #98a2b3;
        }

        textarea.review-form-control {
            min-height: 130px;
            resize: vertical;
        }


        /* =====================================================
           STAR INPUT
        ===================================================== */

        .rating-input {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
        }

        .rating-input input {
            display: none;
        }

        .rating-input label {
            font-size: 34px;
            color: #d0d5dd;
            cursor: pointer;
            transition: 0.2s ease;
            margin: 0;
        }

        .rating-input label:hover,
        .rating-input label:hover ~ label,
        .rating-input input:checked ~ label {
            color: #f5b301;
        }

        .review-submit {
            border: none;
            background: #1233b5;
            color: white;
            padding: 13px 24px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .review-submit:hover {
            background: #0d2890;
            transform: translateY(-1px);
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .review-alert {
            border-radius: 12px;
            padding: 14px 17px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .review-alert-success {
            background: #ecfdf3;
            color: #027a48;
            border: 1px solid #abefc6;
        }

        .review-alert-error {
            background: #fef3f2;
            color: #b42318;
            border: 1px solid #fecdca;
        }


        /* =====================================================
           REVIEW LIST
        ===================================================== */

        .review-list-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .review-list-heading h3 {
            margin: 0;
            font-size: 25px;
            font-weight: 750;
            color: #172033;
        }

        .review-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .review-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
            border: 1px solid #eef2f6;
        }

        .review-card-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }

        .review-user {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .review-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #e8edff;
            color: #1233b5;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 17px;
        }

        .review-user-info h4 {
            margin: 0 0 3px;
            font-size: 16px;
            font-weight: 750;
            color: #172033;
        }

        .review-date {
            color: #98a2b3;
            font-size: 12px;
        }

        .review-card-stars {
            color: #f5b301;
            font-size: 15px;
            white-space: nowrap;
        }

        .review-comment {
            color: #475467;
            line-height: 1.7;
            margin: 0;
        }

        .review-empty {
            background: white;
            border-radius: 18px;
            padding: 45px 25px;
            text-align: center;
            border: 1px dashed #d0d5dd;
        }

        .review-empty i {
            font-size: 38px;
            color: #98a2b3;
            margin-bottom: 15px;
        }

        .review-empty h4 {
            color: #344054;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .review-empty p {
            color: #98a2b3;
            margin: 0;
        }


        /* =====================================================
           PROGRAM KEAHLIAN - DATA KOSONG
        ===================================================== */

        .major-empty {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: #f8faff;
            border-radius: 20px;
        }

        .major-empty i {
            font-size: 45px;
            color: #1233b5;
            margin-bottom: 15px;
        }

        .major-empty h3 {
            color: #172033;
            margin-bottom: 8px;
        }

        .major-empty p {
            color: #667085;
            margin: 0;
        }


        /* =====================================================
           PROGRAM KEAHLIAN - IMAGE
        ===================================================== */

        .major-icon img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }


        /* =====================================================
           RESPONSIVE REVIEW
        ===================================================== */

        @media (max-width: 768px) {

            .review-section {
                padding: 65px 5%;
            }

            .review-heading h2 {
                font-size: 32px;
            }

            .review-summary {
                flex-direction: column;
                text-align: center;
            }

            .review-summary-text {
                text-align: center;
            }

            .review-list {
                grid-template-columns: 1fr;
            }

            .review-card-top {
                flex-direction: column;
            }

        }

    </style>

</head>


<body>

@include('partials.navbar')

<!-- =====================================================
     1. BERANDA / HERO
====================================================== -->

<section
    class="hero"
    id="beranda"
    style="--hero-image: url('{{ asset('images/sekolah gede.jpeg') }}');"
>

    <div class="hero-bg-image"></div>

    <div class="hero-blue-overlay"></div>


    <div class="hero-container">


        <!-- =================================================
             HERO CONTENT
        ================================================== -->

        <div class="hero-content">

            <p class="hero-welcome">

                Selamat datang Di Website Resmi

            </p>


            <h1>

                {{ $schoolProfile?->nama_sekolah ?? 'SMK NEGERI 4 BOGOR' }}

            </h1>


            <p class="hero-description">

                {{ $schoolProfile?->deskripsi
                    ?? 'Temukan berbagai informasi dan layanan sekolah dalam satu platform yang terintegrasi. Bersama-sama, kita wujudkan pendidikan yang inovatif, berkarakter, dan siap menghadapi perkembangan teknologi.' }}

            </p>


            <a
                href="{{ route('profil') }}"
                class="yellow-button"
            >

                Jelajahi sekolah

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </div>

</section>



<!-- =====================================================
     2. TENTANG SEKOLAH
====================================================== -->

<section
    class="about-section"
    id="tentang"
>

    <div class="about-photo">

        <img
            src="{{ asset('images/sekolah gede.jpeg') }}"
            alt="{{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}"
        >

    </div>


    <div class="about-content">

        <h2>
            Tentang
            {{ $schoolProfile?->nama_sekolah ?? 'SMKN 4 Bogor' }}
        </h2>


        @if($schoolProfile?->deskripsi)

            <p>
                {!! nl2br(e($schoolProfile->deskripsi)) !!}
            </p>

        @else

            <p>
                SMKN 4 Bogor adalah Sekolah Menengah Kejuruan Negeri
                yang berkomitmen mencetak lulusan berkarakter, kompeten,
                dan siap menghadapi dunia kerja maupun melanjutkan pendidikan.
            </p>

            <p>
                Dengan dukungan tenaga pendidik profesional, fasilitas yang
                memadai, serta program keahlian yang relevan dengan kebutuhan
                industri, SMKN 4 Bogor terus menghadirkan pendidikan berkualitas
                untuk membentuk generasi yang kreatif, inovatif, dan berdaya saing.
            </p>

        @endif


        <div class="about-values">

            <div>{{ $schoolProfile?->nilai_1 ?? 'Berkarakter' }}</div>

            <div>{{ $schoolProfile?->nilai_2 ?? 'Inovatif' }}</div>

            <div>{{ $schoolProfile?->nilai_3 ?? 'Kompeten' }}</div>

            <div>{{ $schoolProfile?->nilai_4 ?? 'Siap Kerja' }}</div>

        </div>

    </div>

</section>


<!-- =====================================================
     3. SAMBUTAN KEPALA SEKOLAH
====================================================== -->

<section
    class="principal-section"
    id="sambutan"
>

    <div class="principal-wrapper">


        <!-- FOTO -->

        <div class="principal-photo-area">

            <div class="principal-photo-card">


                <div class="principal-photo">


                    @if($schoolProfile?->foto_kepala_sekolah)

                        <img
                            src="{{ asset('uploads/sekolah/' . $schoolProfile->foto_kepala_sekolah) }}"
                            alt="{{ $schoolProfile->nama_kepala_sekolah ?? 'Kepala Sekolah' }}"
                        >

                    @else

                        <img
                            src="{{ asset('images/kepala-sekolah.jpeg') }}"
                            alt="Kepala Sekolah SMK Negeri 4 Bogor"
                        >

                    @endif


                </div>


                <!-- IDENTITAS -->

                <div class="principal-profile">


                    <h3>

                        {{ $schoolProfile?->nama_kepala_sekolah
                            ?? 'Drs. Mulya Murprihartono, M.Si' }}

                    </h3>


                    <p>

                        {{ $schoolProfile?->jabatan_kepala_sekolah
                            ?? 'Kepala SMK Negeri 4 Bogor' }}

                    </p>


                    <span class="principal-period">

                        Periode 2020 – Sekarang

                    </span>


                </div>

            </div>

        </div>



        <!-- ISI SAMBUTAN -->

        <div class="principal-message">


            <span class="principal-tag">

                <span class="principal-tag-dot"></span>

                SAMBUTAN KEPALA SEKOLAH

            </span>


            <h2>

                Membangun Generasi Vokasi
                <br>
                yang Unggul &amp; Berkarakter

            </h2>


            <div class="principal-quote">

                <p>

                    “Pendidikan berkualitas adalah jembatan utama
                    untuk mencetak generasi muda yang mandiri,
                    berkarakter luhur, dan siap memimpin masa depan bangsa.”

                </p>

            </div>


            <div class="principal-text">


                @if($schoolProfile?->sambutan_kepala_sekolah)

                    {!! nl2br(e($schoolProfile->sambutan_kepala_sekolah)) !!}

                @else

                    <p>

                        Selamat datang di Website Resmi
                        {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.
                        Website ini menjadi media informasi dan komunikasi
                        untuk memperkenalkan profil sekolah, program keahlian,
                        prestasi, serta berbagai kegiatan yang kami laksanakan.

                    </p>


                    <p>

                        Kami berkomitmen memberikan pendidikan berkualitas
                        guna mencetak lulusan yang berkarakter, kompeten,
                        dan siap menghadapi dunia kerja maupun melanjutkan
                        pendidikan ke jenjang yang lebih tinggi.

                    </p>


                    <p>

                        Semoga sarana informasi ini bermanfaat bagi seluruh
                        civitas akademika, orang tua peserta didik, dunia
                        industri, serta masyarakat luas untuk mempererat
                        sinergi demi kemajuan pendidikan vokasi di Indonesia.

                    </p>

                @endif


            </div>


            <div class="principal-signature">


                <div class="signature-text">


                    <span>
                        SALAM HANGAT,
                    </span>


                    <strong>

                        {{ $schoolProfile?->nama_kepala_sekolah
                            ?? 'Drs. Mulya Murphihartono, M.Si' }}

                    </strong>


                    <small>

                        {{ $schoolProfile?->jabatan_kepala_sekolah
                            ?? 'Kepala SMKN 4 Bogor' }}

                    </small>


                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     4. STRUKTUR ORGANISASI
====================================================== -->

<section
    class="structure-section"
    id="struktur"
>

    <div class="structure-content">


        <div class="structure-heading">


            <span class="structure-label">

                TATA KELOLA INSTITUSI

            </span>


            <h2>

                Bagan Struktur Organisasi
                <br>
                Resmi

            </h2>


            <p>

                Bagan tata kelola resmi dan hierarki kepemimpinan
                {{ $schoolProfile?->nama_sekolah ?? 'SMKN 4 Bogor' }}
                Tahun Ajaran 2024/2025

            </p>


        </div>



        <div class="organization-chart">


            <div class="org-top">


                <div class="org-leader-card">


                    <div class="org-card-header">


                        <div>

                            <span class="org-small-label">
                                PUCUK PIMPINAN
                            </span>


                            <strong>
                                Kepala Sekolah
                            </strong>

                        </div>


                        <div class="org-card-icon">

                            <i class="fa-solid fa-building-columns"></i>

                        </div>


                    </div>


                    <div class="org-card-body">


                        <h3>

                            {{ $schoolProfile?->nama_kepala_sekolah
                                ?? 'Drs. Mulya Murprihartono, M.Si' }}

                        </h3>


                        <span class="org-nip">

                            NIP. 19670728 200501 1 006

                        </span>


                    </div>


                </div>

            </div>


            <div class="org-main-line"></div>


            <div class="org-branches">


                <div class="org-branch">


                    <div class="org-branch-card">


                        <div class="org-card-header">


                            <div>

                                <span class="org-small-label">

                                    BIDANG AKADEMIK &amp; KESISWAAN

                                </span>


                                <strong>

                                    Wakil Kepala Sekolah

                                </strong>

                            </div>


                            <div class="org-card-icon">

                                <i class="fa-solid fa-users"></i>

                            </div>


                        </div>


                        <div class="org-department-grid">


                            <div class="org-department">

                                <span>
                                    WAKASEK BIDANG
                                </span>

                                <strong>
                                    Kurikulum
                                </strong>

                                <small>
                                    Standardisasi &amp; Pembelajaran Vokasi
                                </small>

                            </div>


                            <div class="org-department">

                                <span>
                                    WAKASEK BIDANG
                                </span>

                                <strong>
                                    Kesiswaan
                                </strong>

                                <small>
                                    Karakter &amp; Kegiatan Pelajar
                                </small>

                            </div>


                            <div class="org-department">

                                <span>
                                    WAKASEK BIDANG
                                </span>

                                <strong>
                                    Sarana &amp; Prasarana
                                </strong>

                                <small>
                                    Fasilitas Bengkel &amp; Lab Mutakhir
                                </small>

                            </div>


                            <div class="org-department">

                                <span>
                                    WAKASEK BIDANG
                                </span>

                                <strong>
                                    Hubungan Masyarakat
                                </strong>

                                <small>
                                    Kemitraan Industri &amp; DUDI
                                </small>

                            </div>


                        </div>

                    </div>

                </div>



                <div class="org-branch">


                    <div class="org-branch-card">


                        <div class="org-card-header">


                            <div>

                                <span class="org-small-label">

                                    BIDANG ADMINISTRASI

                                </span>


                                <strong>

                                    Kepala Tata Usaha

                                </strong>

                            </div>


                            <div class="org-card-icon">

                                <i class="fa-solid fa-briefcase"></i>

                            </div>


                        </div>


                        <div class="org-service-list">


                            <div class="org-service">


                                <div>

                                    <span>
                                        SUB-UNIT LAYANAN
                                    </span>

                                    <strong>
                                        Kepegawaian
                                    </strong>

                                    <small>
                                        Administrasi Guru, Tenaga Kependidikan &amp; Kinerja
                                    </small>

                                </div>


                                <i class="fa-regular fa-address-book"></i>


                            </div>



                            <div class="org-service">


                                <div>

                                    <span>
                                        SUB-UNIT LAYANAN
                                    </span>

                                    <strong>
                                        Keuangan
                                    </strong>

                                    <small>
                                        Akuntabilitas BOS, Anggaran Operasional &amp; SPJ
                                    </small>

                                </div>


                                <i class="fa-regular fa-credit-card"></i>


                            </div>



                            <div class="org-service">


                                <div>

                                    <span>
                                        SUB-UNIT LAYANAN
                                    </span>

                                    <strong>
                                        Kesekretariatan
                                    </strong>

                                    <small>
                                        Persuratan, Arsip Digital &amp; Kearsipan Sekolah
                                    </small>

                                </div>


                                <i class="fa-regular fa-folder"></i>


                            </div>


                        </div>

                    </div>

                </div>


            </div>

        </div>

    </div>

</section>



<!-- =====================================================
     5. PROGRAM KEAHLIAN
====================================================== -->

<section
    class="major-section"
    id="jurusan"
>


    <div class="major-heading">


        <span class="major-label">

            KOMPETENSI KEAHLIAN UNGGULAN

        </span>


        <h2>

            Mencetak Talenta Vokasi Siap
            <br>
            Industri

        </h2>


        <p>

            Membekali peserta didik dengan kurikulum mutakhir,
            standardisasi, sertifikasi kompetensi, dan integrasi
            kemitraan strategis dunia industri.

        </p>


    </div>



    <div class="major-grid">


        @forelse($programKeahlians as $programKeahlian)


            @php

                $nama = $programKeahlian->nama
                    ?? $programKeahlian->nama_program
                    ?? 'Program Keahlian';

                $singkatan = $programKeahlian->singkatan
                    ?? $programKeahlian->kode
                    ?? '';

                $kategori = $programKeahlian->kategori
                    ?? 'KOMPETENSI KEAHLIAN';

                $deskripsi = $programKeahlian->deskripsi
                    ?? 'Program keahlian yang mempersiapkan peserta didik agar memiliki kompetensi sesuai kebutuhan dunia kerja dan industri.';

                $sertifikasi = $programKeahlian->sertifikasi
                    ?? null;

                $kompetensi = [];


                if (!empty($programKeahlian->kompetensi)) {

                    if (is_array($programKeahlian->kompetensi)) {

                        $kompetensi = $programKeahlian->kompetensi;

                    } else {

                        $decoded = json_decode(
                            $programKeahlian->kompetensi,
                            true
                        );


                        if (is_array($decoded)) {

                            $kompetensi = $decoded;

                        } else {

                            $kompetensi = preg_split(
                                '/\r\n|\r|\n/',
                                $programKeahlian->kompetensi
                            );

                        }

                    }

                }


                if (empty($kompetensi)) {

                    $kompetensi = array_filter([

                        $programKeahlian->kompetensi_1 ?? null,

                        $programKeahlian->kompetensi_2 ?? null,

                        $programKeahlian->kompetensi_3 ?? null,

                        $programKeahlian->kompetensi_4 ?? null,

                    ]);

                }

            @endphp



            <div class="major-card">


                <div class="major-icon">


                    @if($programKeahlian->logo)

                        <img
                            src="{{ asset('uploads/program-keahlian/' . $programKeahlian->logo) }}"
                            alt="{{ $nama }}"
                        >

                    @else

                        <div
                            style="
                                width:100%;
                                height:100%;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                            "
                        >

                            <i class="fa-solid fa-graduation-cap"></i>

                        </div>

                    @endif


                </div>



                <span class="major-category">

                    {{ strtoupper($kategori) }}

                </span>



                <h3>

                    {{ $singkatan }}

                </h3>



                <p class="major-name">

                    {{ $nama }}

                </p>



                <div class="major-detail">


                    <span class="detail-title">

                        KOMPETENSI UTAMA

                    </span>



                    @if(count($kompetensi) > 0)


                        <ul>


                            @foreach($kompetensi as $item)


                                @if(is_string($item) && trim($item) !== '')

                                    <li>

                                        {{ $item }}

                                    </li>

                                @endif


                            @endforeach


                        </ul>


                    @else


                        <p style="margin: 10px 0 0;">

                            {{ $deskripsi }}

                        </p>


                    @endif


                </div>



                @if($sertifikasi)


                    <div class="major-certification">


                        <span>

                            SERTIFIKASI INDUSTRI

                        </span>


                        <strong>

                            {{ $sertifikasi }}

                        </strong>


                    </div>


                @endif


            </div>


        @empty


            <div class="major-empty">


                <i class="fa-solid fa-graduation-cap"></i>


                <h3>

                    Belum Ada Program Keahlian

                </h3>


                <p>

                    Data program keahlian belum tersedia.

                </p>


            </div>


        @endforelse


    </div>



    <a
        href="{{ route('program.keahlian') }}"
        class="blue-button"
    >

        Lihat Selengkapnya

        <i class="fa-solid fa-arrow-right"></i>

    </a>


</section>



<!-- =====================================================
     6. EKSTRAKURIKULER
====================================================== -->

<section
    class="extra-section"
    id="ekstrakurikuler"
>


    <div class="extra-heading">


        <div class="extra-label">

            PENGEMBANGAN KARAKTER &amp; PRESTASI

        </div>


        <h2>

            Ekstrakurikuler

        </h2>


        <p>

            Temukan minatmu, kembangkan bakatmu, dan ciptakan
            prestasimu. Beragam ekstrakurikuler menjadi wadah
            untuk belajar, berkreasi, dan tumbuh menjadi pribadi
            yang percaya diri serta berdaya saing.

        </p>


    </div>



    <div class="extra-grid">


        @forelse($ekstrakurikulers as $ekstrakurikuler)


            <div class="extra-card">


                <div class="extra-photo">


                    @if($ekstrakurikuler->gambar)

                        <img
                            src="{{ asset('uploads/ekstrakurikuler/' . $ekstrakurikuler->gambar) }}"
                            alt="{{ $ekstrakurikuler->nama }}"
                        >

                    @else

                        <div class="extra-photo-empty">

                            <i class="fa-regular fa-image"></i>

                        </div>

                    @endif


                </div>



                <div class="extra-content">


                    <span class="extra-category">

                        KEGIATAN SISWA

                    </span>


                    <h3>

                        {{ $ekstrakurikuler->nama }}

                    </h3>


                    @if($ekstrakurikuler->deskripsi)

                        <p>

                            {{ $ekstrakurikuler->deskripsi }}

                        </p>

                    @else

                        <p>

                            Informasi kegiatan ekstrakurikuler
                            {{ $schoolProfile?->nama_sekolah ?? 'SMKN 4 Bogor' }}.

                        </p>

                    @endif


                </div>


            </div>


        @empty


            <div class="extra-empty">


                <i class="fa-solid fa-users"></i>


                <h3>

                    Belum Ada Ekstrakurikuler

                </h3>


                <p>

                    Data ekstrakurikuler belum tersedia.

                </p>


            </div>


        @endforelse


    </div>

</section>



<!-- =====================================================
     7. ORGANISASI SISWA
====================================================== -->

<section class="student-section">


    <div class="section-heading">

        <h2>

            Organisasi Siswa

        </h2>

    </div>



    <div class="student-container">


        <div class="student-row">


            <div class="student-logo">

                <img
                    src="{{ asset('images/logo osiss.jpe') }}"
                    alt="OSIS"
                >

            </div>


            <div class="student-text">


                <h3>

                    Organisasi Intra Siswa

                </h3>


                <p>

                    OSIS (Organisasi Siswa Intra Sekolah) pada dasarnya
                    berfungsi sebagai wadah utama bagi siswa untuk belajar
                    memimpin, mengasah keterampilan soft skills, dan
                    mengelola berbagai kegiatan di sekolah.

                </p>


                <p>

                    OSIS juga menjadi fasilitator dan penampung aspirasi
                    siswa agar suara siswa dapat disampaikan kepada pihak
                    sekolah, sekaligus menjadi penggerak berbagai kegiatan
                    positif di lingkungan sekolah.

                </p>


            </div>

        </div>



        <div class="student-row">


            <div class="student-logo">

                <img
                    src="{{ asset('images/logo mpk.jpg') }}"
                    alt="MPK"
                >

            </div>


            <div class="student-text">


                <h3>

                    Majelis Perwakilan Kelas

                </h3>


                <p>

                    MPK (Majelis Perwakilan Kelas) berfungsi sebagai
                    lembaga legislatif di tingkat sekolah yang bertugas
                    mengawasi dan mengevaluasi kinerja OSIS.

                </p>


                <p>

                    MPK juga berperan menampung serta menyalurkan aspirasi
                    siswa dari setiap kelas serta menyusun aturan dan
                    menyelenggarakan pemilihan pengurus OSIS/MPK.

                </p>


            </div>

        </div>



        <div class="organization-values">


            <div>

                <i class="fa-solid fa-users"></i>

                <span>

                    Wadah Aspirasi Siswa

                </span>

            </div>


            <div>

                <i class="fa-solid fa-bullhorn"></i>

                <span>

                    Penggerak Kegiatan Positif

                </span>

            </div>


            <div>

                <i class="fa-solid fa-handshake"></i>

                <span>

                    Membangun Karakter &amp; Kepemimpinan

                </span>

            </div>


            <div>

                <i class="fa-solid fa-bullseye"></i>

                <span>

                    Mewujudkan Sekolah Yang Lebih Baik

                </span>

            </div>


        </div>

    </div>

</section>



<!-- =====================================================
     8. BERITA TERKINI
====================================================== -->

<section
    class="news-section"
    id="berita"
>


    <div class="section-heading left-heading">


        <h2>

            Berita Terbaru

        </h2>


    </div>



    <div class="news-grid">


        @forelse($beritas as $berita)


            <article class="news-card">


                <div class="news-photo">


                    @if($berita->gambar)

                        <img
                            src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                        >

                    @else

                        <div class="news-photo-empty">

                            <i class="fa-regular fa-image"></i>

                        </div>

                    @endif


                </div>



                <div class="news-content">


                    <span>

                        {{ $berita->tanggal->format('d F Y') }}

                    </span>


                    <h3>

                        {{ $berita->judul }}

                    </h3>


                    <p>

                        {{ $berita->ringkasan }}

                    </p>


                    <a href="{{ route('berita.detail', $berita->id) }}">

                    Baca Selengkapnya

                    <i class="fa-solid fa-arrow-right"></i>
                    </a>


                </div>


            </article>


        @empty


            <div class="news-empty">


                <i class="fa-regular fa-newspaper"></i>


                <h3>

                    Belum Ada Berita

                </h3>


                <p>

                    Belum ada berita yang dipublikasikan.

                </p>


            </div>


        @endforelse


    </div>

</section>



<!-- =====================================================
     9. GALERI KEGIATAN
====================================================== -->

<section
    class="gallery-section"
    id="galeri"
>


    <div class="section-heading">


        <h2>

            Galeri Kegiatan

        </h2>


        <p>

            Dokumentasi kegiatan dan aktivitas
            {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.

        </p>


    </div>



    <div class="gallery-grid">


        @forelse($galeri as $item)


            <div class="gallery-item">


                <div class="gallery-photo">


                    <img
                        src="{{ asset('uploads/' . $item->gambar) }}"
                        alt="{{ $item->judul }}"
                    >


                </div>


                <div class="gallery-info">


                    <h3>

                        {{ $item->judul }}

                    </h3>


                    <span>

                        <i class="fa-regular fa-calendar"></i>

                        {{ $item->created_at->format('d F Y') }}

                    </span>


                </div>


            </div>


        @empty


            <div class="gallery-empty">


                <i class="fa-regular fa-images"></i>


                <h3>

                    Belum Ada Foto

                </h3>


                <p>

                    Dokumentasi kegiatan sekolah belum tersedia.

                </p>


            </div>


        @endforelse


    </div>

</section>



<!-- =====================================================
     10. RATING & KOMENTAR
====================================================== -->

<section
    class="review-section"
    id="ulasan"
>


    <div class="review-container">


        <div class="review-heading">


            <span class="review-label">

                ULASAN PENGUNJUNG

            </span>


            <h2>

                Bagaimana Pengalaman Anda?

            </h2>


            <p>

                Berikan penilaian dan komentar Anda mengenai
                Website
                {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.

            </p>


        </div>



        <!-- SUCCESS -->

        @if(session('review_success'))


            <div class="review-alert review-alert-success">


                <i class="fa-solid fa-circle-check me-2"></i>


                {{ session('review_success') }}


            </div>


        @endif



        <!-- ERROR -->

        @if($errors->any())


            <div class="review-alert review-alert-error">


                <strong>

                    Data belum dapat dikirim.

                </strong>


                <ul class="mb-0 mt-2">


                    @foreach($errors->all() as $error)


                        <li>

                            {{ $error }}

                        </li>


                    @endforeach


                </ul>


            </div>


        @endif



        @php

            $approvedReviews = ($reviews ?? collect())
                ->where('status', 'approved');

            $reviewCount = $approvedReviews->count();

            $averageRating = $reviewCount > 0
                ? round($approvedReviews->avg('rating'), 1)
                : 0;

        @endphp



        <!-- SUMMARY -->

        <div class="review-summary">


            <div class="review-average">


                <span class="review-average-number">

                    {{ number_format($averageRating, 1) }}

                </span>


                <div class="review-stars">


                    @for($i = 1; $i <= 5; $i++)


                        @if($averageRating >= $i)

                            <i class="fa-solid fa-star"></i>

                        @elseif($averageRating >= ($i - 0.5))

                            <i class="fa-solid fa-star-half-stroke"></i>

                        @else

                            <i class="fa-regular fa-star"></i>

                        @endif


                    @endfor


                </div>


                <div class="review-total">

                    {{ $reviewCount }}
                    {{ $reviewCount == 1 ? 'ulasan' : 'ulasan' }}

                </div>


            </div>



            <div class="review-summary-text">


                <h3>

                    Rating Pengunjung

                </h3>


                <p>

                    Rating diberikan oleh pengunjung yang telah
                    memberikan penilaian pada website sekolah.

                </p>


            </div>


        </div>



        <!-- FORM -->

        <div class="review-form-card">


            <h3>

                Berikan Penilaian Anda

            </h3>


            <p class="review-form-description">

                Pendapat Anda membantu kami meningkatkan kualitas
                website sekolah.

            </p>



            <form
                action="{{ route('review.store') }}"
                method="POST"
            >

                @csrf



                <!-- NAMA -->

                <div class="review-form-group">


                    <label for="reviewNama">

                        Nama

                    </label>


                    <input
                        type="text"
                        name="nama"
                        id="reviewNama"
                        class="review-form-control"
                        placeholder="Masukkan nama Anda"
                        value="{{ old('nama') }}"
                        maxlength="100"
                        required
                    >


                </div>



                <!-- RATING -->

                <div class="review-form-group">


                    <label>

                        Rating

                    </label>



                    <div class="rating-input">


                        <input
                            type="radio"
                            name="rating"
                            id="rating5"
                            value="5"
                            {{ old('rating') == 5 ? 'checked' : '' }}
                            required
                        >

                        <label
                            for="rating5"
                            title="Sangat Baik"
                        >

                            <i class="fa-solid fa-star"></i>

                        </label>



                        <input
                            type="radio"
                            name="rating"
                            id="rating4"
                            value="4"
                            {{ old('rating') == 4 ? 'checked' : '' }}
                        >

                        <label
                            for="rating4"
                            title="Baik"
                        >

                            <i class="fa-solid fa-star"></i>

                        </label>



                        <input
                            type="radio"
                            name="rating"
                            id="rating3"
                            value="3"
                            {{ old('rating') == 3 ? 'checked' : '' }}
                        >

                        <label
                            for="rating3"
                            title="Cukup"
                        >

                            <i class="fa-solid fa-star"></i>

                        </label>



                        <input
                            type="radio"
                            name="rating"
                            id="rating2"
                            value="2"
                            {{ old('rating') == 2 ? 'checked' : '' }}
                        >

                        <label
                            for="rating2"
                            title="Kurang"
                        >

                            <i class="fa-solid fa-star"></i>

                        </label>



                        <input
                            type="radio"
                            name="rating"
                            id="rating1"
                            value="1"
                            {{ old('rating') == 1 ? 'checked' : '' }}
                        >

                        <label
                            for="rating1"
                            title="Sangat Kurang"
                        >

                            <i class="fa-solid fa-star"></i>

                        </label>


                    </div>


                </div>



                <!-- KOMENTAR -->

                <div class="review-form-group">


                    <label for="reviewKomentar">

                        Komentar

                    </label>


                    <textarea
                        name="komentar"
                        id="reviewKomentar"
                        class="review-form-control"
                        placeholder="Tuliskan pengalaman atau pendapat Anda..."
                        maxlength="1000"
                        required
                    >{{ old('komentar') }}</textarea>


                </div>



                <button
                    type="submit"
                    class="review-submit"
                >

                    <i class="fa-solid fa-paper-plane me-2"></i>

                    Kirim Ulasan

                </button>


            </form>


        </div>



        <!-- DAFTAR REVIEW -->

        <div class="review-list-heading">


            <h3>

                Komentar Pengunjung

            </h3>


        </div>



        @if($approvedReviews->count() > 0)


            <div class="review-list">


                @foreach($approvedReviews as $review)


                    <article class="review-card">


                        <div class="review-card-top">


                            <div class="review-user">


                                <div class="review-avatar">

                                    {{ strtoupper(substr($review->nama, 0, 1)) }}

                                </div>


                                <div class="review-user-info">


                                    <h4>

                                        {{ $review->nama }}

                                    </h4>


                                    <span class="review-date">

                                        {{ $review->created_at->format('d M Y') }}

                                    </span>


                                </div>


                            </div>



                            <div class="review-card-stars">


                                @for($i = 1; $i <= 5; $i++)


                                    @if($i <= $review->rating)

                                        <i class="fa-solid fa-star"></i>

                                    @else

                                        <i class="fa-regular fa-star"></i>

                                    @endif


                                @endfor


                            </div>


                        </div>



                        <p class="review-comment">

                            {{ $review->komentar }}

                        </p>


                    </article>


                @endforeach


            </div>


        @else


            <div class="review-empty">


                <i class="fa-regular fa-comment-dots"></i>


                <h4>

                    Belum Ada Ulasan

                </h4>


                <p>

                    Jadilah pengunjung pertama yang memberikan
                    rating dan komentar.

                </p>


            </div>


        @endif


    </div>

</section>



<!-- =====================================================
     11. FOOTER / KONTAK
====================================================== -->

<footer
    class="footer"
    id="kontak"
>


    <div class="footer-container">


        <!-- ABOUT -->

        <div class="footer-about">


            <div class="footer-brand">


                <div>


                    @if($schoolProfile?->logo_sekolah)


                        <img
                            src="{{ asset('uploads/sekolah/' . $schoolProfile->logo_sekolah) }}"
                            alt="Logo {{ $schoolProfile->nama_sekolah ?? 'SMKN 4 Bogor' }}"
                        >


                    @else


                        <img
                            src="{{ asset('images/logo sekolah.jpg') }}"
                            alt="Logo SMKN 4 Bogor"
                        >


                    @endif


                </div>



                <div>


                    <strong>

                        {{ $schoolProfile?->nama_sekolah ?? 'SMK NEGERI 4 BOGOR' }}

                    </strong>


                    <span>

                        {{ $schoolProfile?->nama_panggilan ?? 'Kota Bogor' }}

                    </span>


                </div>


            </div>



            <p>

                {{ $schoolProfile?->deskripsi
                    ?? 'Mewujudkan generasi unggul, berkarakter, dan kompeten di bidang teknologi dan kejuruan.' }}

            </p>



            <div class="social-icons">


                <a href="#">

                    <i class="fa-brands fa-tiktok"></i>

                </a>


                <a href="#">

                    <i class="fa-brands fa-youtube"></i>

                </a>


                <a href="#">

                    <i class="fa-brands fa-instagram"></i>

                </a>


            </div>


        </div>



        <!-- TAUTAN -->

        <div class="footer-column">


            <h3>

                Tautan Cepat

            </h3>


            <a href="{{ route('beranda') }}">

                Beranda

            </a>


            <a href="{{ route('profil') }}">

                Profil Sekolah

            </a>


            <a href="{{ route('program.keahlian') }}">

                Program Keahlian

            </a>


            <a href="{{ route('kontak') }}">

                Kontak

            </a>


            <a href="{{ route('berita.public') }}">

                Berita

            </a>


        </div>



        <!-- KONTAK -->

        <div class="footer-column">


            <h3>

                Kontak Kami

            </h3>



            <p>

                <i class="fa-solid fa-location-dot"></i>

                {{ $schoolProfile?->alamat
                    ?? 'Jalan Raya Tajur, Kampung Buntar, RT 02/RW 08, Kelurahan Muarasari, Kecamatan Bogor Selatan, Kota Bogor, Jawa Barat 16137.' }}

            </p>



            <p>

                <i class="fa-solid fa-phone"></i>

                {{ $schoolProfile?->telepon ?? '+62 251 2752729' }}

            </p>



            @if($schoolProfile?->email)

                <p>

                    <i class="fa-solid fa-envelope"></i>

                    {{ $schoolProfile->email }}

                </p>

            @endif



            @if($schoolProfile?->website)

                <p>

                    <i class="fa-solid fa-globe"></i>

                    {{ $schoolProfile->website }}

                </p>

            @endif


        </div>



        <!-- MAP -->

        <div class="footer-column">


            <h3>

                Lokasi

            </h3>


            <div class="map-wrapper">


                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0498396124403!2d106.82211897499403!3d-6.640733393353805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16b61e813%3A0x310408d1d32238c3!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                    width="100%"
                    height="180"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                >
                </iframe>


            </div>


        </div>


    </div>


</footer>



<!-- =====================================================
     COPYRIGHT
====================================================== -->

<div class="copyright">


    © 2026

    {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.

    All Rights Reserved.


</div>



<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>