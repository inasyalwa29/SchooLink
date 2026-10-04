<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Program Keahlian - SMK Negeri 4 Bogor</title>


    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    {{-- BOOTSTRAP --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- CSS --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/program-keahlian.css') }}"
    >


    {{-- CSS NAVBAR (dipakai semua halaman) --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/navbar.css') }}"
    >

</head>


<body>


@include('partials.navbar')



{{-- =====================================================
     HEADER
===================================================== --}}

<section class="program-header">
    <div class="container">

        <div class="program-header-content">

            <span class="program-label">
                PROGRAM KEAHLIAN
            </span>

            <h1>
                Temukan Potensimu,<br>
                Bangun Masa Depanmu
            </h1>

            <p>
                SMK Negeri 4 Bogor menyediakan berbagai program
                keahlian yang dirancang untuk mengembangkan
                pengetahuan, keterampilan, kreativitas, dan
                pengalaman peserta didik sebagai bekal menghadapi
                dunia kerja, industri, maupun melanjutkan pendidikan.
            </p>

        </div>

    </div>

</section>



{{-- =====================================================
     PROGRAM KEAHLIAN
===================================================== --}}

<section class="program-section">

    <div class="container">

        <div class="program-intro">

            <span>
                PILIHAN KOMPETENSI
            </span>

            <h2>
                Program Keahlian
                <strong>SMK Negeri 4 Bogor</strong>
            </h2>

            <p>
                Setiap program keahlian memiliki karakteristik dan
                keunggulannya masing-masing. Pilih bidang yang sesuai
                dengan minat dan kembangkan keterampilan untuk
                mempersiapkan masa depan.
            </p>

        </div>


        <div class="program-grid">


            {{-- =================================================
                 TPFL
            ================================================== --}}

            <article class="program-card">

                {{-- HEADER JURUSAN --}}
                <div class="program-card-header">

                    <div class="program-heading">

                        <div class="program-logo">

                            <img
                                src="{{ asset('images/tp.jpg') }}"
                                alt="Logo TPFL"
                            >

                        </div>


                        <div class="program-title">

                            <div class="program-title-top">

                                <span class="program-code">
                                    KODE: TPFL
                                </span>

                                <span class="program-field">
                                    Bidang Manufaktur
                                </span>

                            </div>

                            <h2>
                                Teknik Pengelasan dan Fabrikasi Logam
                            </h2>

                            <p>
                                Welding Technology &amp; Industrial Steel Fabrication
                            </p>

                        </div>

                    </div>


                    <div class="program-partner">
                        ⚙ Standar AWS &amp; KS Industri
                    </div>

                </div>


                {{-- ISI --}}
                <div class="program-card-body">

                    <div class="description">

                        <span class="section-label">
                            DESKRIPSI PROGRAM
                        </span>

                        <p>
                            Program keahlian presisi tinggi yang melatih peserta
                            didik dalam berbagai teknik pengelasan standar industri
                            internasional (SMAW, GMAW/MIG-MAG, GTAW/TIG, OAW)
                            serta fabrikasi konstruksi baja, perpipaan industri
                            (piping), dan manufaktur perkapan/alat berat.
                            Melatih kedisiplinan dan standar K3
                            (Keselamatan dan Kesehatan Kerja).
                        </p>

                    </div>


                    <div class="program-info-grid">

                        {{-- KOMPETENSI --}}
                        <div class="info-box">

                            <h3>
                                ⚒ Kompetensi Keahlian Inti
                            </h3>

                            <ul>

                                <li>
                                    Pengelasan SMAW (Shielded Metal Arc Welding)
                                    Posisi 1G–6G
                                </li>

                                <li>
                                    Pengelasan GMAW / MIG MAG pada Baja Karbon
                                    &amp; Paduan
                                </li>

                                <li>
                                    Pengelasan GTAW / TIG Argon untuk Stainless
                                    Steel &amp; Aluminium
                                </li>

                                <li>
                                    Fabrikasi Logam, Pemotongan CNC Plasma,
                                    &amp; Perakitan Konstruksi
                                </li>

                                <li>
                                    Uji Mutu Las Non Destructive Testing (NDT)
                                    &amp; Standar K3
                                </li>

                            </ul>

                        </div>


                        {{-- PROSPEK --}}
                        <div class="info-box">

                            <h3>
                                ⚒ Prospek Karier Lulusan
                            </h3>

                            <ul>

                                <li>
                                    Welder Profesional Industri Manufaktur
                                    &amp; Migas
                                </li>

                                <li>
                                    Inspector Las / Quality Control (QC Welding)
                                </li>

                                <li>
                                    Teknisi Fabrikasi Konstruksi Baja &amp;
                                    Perkapalan
                                </li>

                                <li>
                                    Wirausahawan Bengkel Fabrikasi Logam Mandiri
                                </li>

                                <li>
                                    Drafter Fabrikasi &amp; Estimator
                                    Konstruksi Baja
                                </li>

                            </ul>

                        </div>


                        {{-- FASILITAS --}}
                        <div class="info-box">

                            <h3>
                                🏠 Fasilitas &amp; Workshop
                            </h3>

                            <p>
                                Bengkel Praktik Pengelasan dengan booth las
                                bersertifikasi, Mesin Las Modern (Inverter),
                                Mesin CNC Plasma Cutting, dan Alat Uji
                                Kekerasan / Bending Test.
                            </p>


                            <div class="scheme">

                                <span>
                                    SKEMA LSP-P1 BNSP:
                                </span>

                                <strong>
                                    Pengelasan Pelat &amp; Pipa SMAW / GTAW
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </article>



            {{-- =================================================
                 TO
            ================================================== --}}

            <article class="program-card">

                <div class="program-card-header">

                    <div class="program-heading">

                        <div class="program-logo">

                            <img
                                src="{{ asset('images/to.jpg') }}"
                                alt="Logo Teknik Otomotif"
                            >

                        </div>


                        <div class="program-title">

                            <div class="program-title-top">

                                <span class="program-code">
                                    KODE: TO
                                </span>

                                <span class="program-field">
                                    Bidang Otomotif
                                </span>

                            </div>

                            <h2>
                                Teknik Otomotif
                            </h2>

                            <p>
                                Automotive Technology, Engine Management &amp;
                                EV Systems
                            </p>

                        </div>

                    </div>


                    <div class="program-partner">
                        ⚙ Kelas Industri Astra Daihatsu
                    </div>

                </div>


                <div class="program-card-body">

                    <div class="description">

                        <span class="section-label">
                            DESKRIPSI PROGRAM
                        </span>

                        <p>
                            Membekali peserta didik dengan pemahaman menyeluruh
                            tentang teknologi kendaraan ringan dan roda empat,
                            meliputi overhaul mesin, sistem injeksi bahan bakar
                            elektronik (EFI), sistem kelistrikan bodi, sistem
                            pemindah tenaga (power train), transmisi otomatis,
                            hingga pengenalan teknologi kendaraan hybrid dan
                            listrik (EV). Didukung kurikulum kelas industri
                            PT Astra Daihatsu Motor.
                        </p>

                    </div>


                    <div class="program-info-grid">

                        <div class="info-box">

                            <h3>
                                🚗 Kompetensi Keahlian Inti
                            </h3>

                            <ul>

                                <li>
                                    Perawatan &amp; Perbaikan Mesin
                                    (Engine Tune Up &amp; Overhaul)
                                </li>

                                <li>
                                    Diagnosis Sistem EFI via Diagnostic
                                    Computer Scanner
                                </li>

                                <li>
                                    Sistem Pemindah Tenaga
                                    (Kopling, Transmisi &amp; Gardan)
                                </li>

                                <li>
                                    Sistem Kemudi, Rem (ABS), Suspensi
                                    &amp; Chasis
                                </li>

                                <li>
                                    Kelistrikan Bodi, AC Mobil, &amp;
                                    Dasar Kendaraan Listrik (EV)
                                </li>

                            </ul>

                        </div>


                        <div class="info-box">

                            <h3>
                                ⚙ Prospek Karier Lulusan
                            </h3>

                            <ul>

                                <li>
                                    Teknisi Mekanik Bengkel Resmi
                                    (Astra, Daihatsu, Toyota)
                                </li>

                                <li>
                                    Service Advisor &amp; Quality Control
                                    Otomotif
                                </li>

                                <li>
                                    Teknisi Spesialis Kelistrikan &amp;
                                    Tata Udara Mobil
                                </li>

                                <li>
                                    Wirausahawan Bengkel &amp;
                                    Auto Detailing Mandiri
                                </li>

                                <li>
                                    Teknisi Perakitan Manufaktur Kendaraan
                                    Bermotor
                                </li>

                            </ul>

                        </div>


                        <div class="info-box">

                            <h3>
                                🏠 Fasilitas &amp; Workshop
                            </h3>

                            <p>
                                Workshop Otomotif Standar Agen Resmi
                                (Astra Daihatsu), Lift Hidrolik, Alat Scan
                                Diagnostic EFI Canggih, Engine Stand EFI Modern,
                                dan Mesin Spooling Balancing.
                            </p>


                            <div class="scheme">

                                <span>
                                    SKEMA LSP-P1 BNSP:
                                </span>

                                <strong>
                                    Pemeliharaan Berkala Kendaraan Ringan
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </article>



            {{-- =================================================
                 PPLG
            ================================================== --}}

            <article class="program-card">

                <div class="program-card-header">

                    <div class="program-heading">

                        <div class="program-logo">

                            <img
                                src="{{ asset('images/pplg.jpg') }}"
                                alt="Logo PPLG"
                            >

                        </div>


                        <div class="program-title">

                            <div class="program-title-top">

                                <span class="program-code">
                                    KODE: PPLG
                                </span>

                                <span class="program-field">
                                    Bidang TIK
                                </span>

                            </div>

                            <h2>
                                Pengembangan Perangkat Lunak dan Gim
                            </h2>

                            <p>
                                Software Engineering, Mobile &amp; Game Development
                            </p>

                        </div>

                    </div>


                    <div class="program-partner">
                        ⚙ LSP-P1 Terlisensi BNSP
                    </div>

                </div>


                <div class="program-card-body">

                    <div class="description">

                        <span class="section-label">
                            DESKRIPSI PROGRAM
                        </span>

                        <p>
                            Menyiapkan peserta didik menjadi talenta digital
                            yang kompeten dalam rekayasa perangkat lunak,
                            perancangan aplikasi berbasis web, mobile,
                            komputasi awan (cloud), serta pengembangan gim
                            dan animasi. Siswa dibekali logika pemrograman
                            tingkat lanjut, UI/UX design, database engineering,
                            serta metodologi pengembangan agile.
                        </p>

                    </div>


                    <div class="program-info-grid">

                        <div class="info-box">

                            <h3>
                                💻 Kompetensi Keahlian Inti
                            </h3>

                            <ul>

                                <li>
                                    Pemrograman Web
                                    (Fullstack Web Development)
                                </li>

                                <li>
                                    Pemrograman Berorientasi Objek
                                    &amp; Mobile App
                                    (Flutter, Kotlin)
                                </li>

                                <li>
                                    Rekayasa Basis Data &amp;
                                    Cloud Computing
                                </li>

                                <li>
                                    Desain Antarmuka Pengguna
                                    (UI/UX) &amp; Interaktif Multimedia
                                </li>

                                <li>
                                    Pengujian Perangkat Lunak &amp;
                                    Quality Assurance (QA)
                                </li>

                            </ul>

                        </div>


                        <div class="info-box">

                            <h3>
                                💼 Prospek Karier Lulusan
                            </h3>

                            <ul>

                                <li>
                                    Junior Software Developer /
                                    Web Developer
                                </li>

                                <li>
                                    Mobile Application Developer
                                    (Android / iOS)
                                </li>

                                <li>
                                    Frontend / Backend Engineer
                                </li>

                                <li>
                                    Database Administrator &amp;
                                    IT Technical Support
                                </li>

                                <li>
                                    Game Programmer &amp;
                                    UI/UX Designer
                                </li>

                            </ul>

                        </div>


                        <div class="info-box">

                            <h3>
                                🖥 Fasilitas &amp; Workshop
                            </h3>

                            <p>
                                Laboratorium Komputer Software Engineering
                                modern, spesifikasi tinggi, Ruang Riset
                                Inovasi IoT, dan Inkubator Bisnis Digital
                                KR4BAT Creative.
                            </p>


                            <div class="scheme">

                                <span>
                                    SKEMA LSP-P1 BNSP:
                                </span>

                                <strong>
                                    Pemrogram Junior (Junior Developer)
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </article>



            {{-- =================================================
                 TJKT
            ================================================== --}}

            <article class="program-card">

                <div class="program-card-header">

                    <div class="program-heading">

                        <div class="program-logo">

                            <img
                                src="{{ asset('images/tjkt.jpg') }}"
                                alt="Logo TJKT"
                            >

                        </div>


                        <div class="program-title">

                            <div class="program-title-top">

                                <span class="program-code">
                                    KODE: TJKT
                                </span>

                                <span class="program-field">
                                    Bidang TIK
                                </span>

                            </div>

                            <h2>
                                Teknik Jaringan Komputer dan Telekomunikasi
                            </h2>

                            <p>
                                Network Infrastructure, Cyber Security &amp;
                                Cloud Architecture
                            </p>

                        </div>

                    </div>


                    <div class="program-partner">
                        ⚙ MikroTik &amp; Cisco Academy
                    </div>

                </div>


                <div class="program-card-body">

                    <div class="description">

                        <span class="section-label">
                            DESKRIPSI PROGRAM
                        </span>

                        <p>
                            Berfokus pada penguasaan instalasi, konfigurasi,
                            dan administrasi infrastruktur jaringan komputer
                            berskala enterprise, routing, switching, serta
                            optik (fiber optic), serta keamanan siber dan
                            komputasi jaringan terdistribusi. Bekerja sama
                            erat dengan MikroTik Academy dan Cisco Networking
                            Academy.
                        </p>

                    </div>


                    <div class="program-info-grid">

                        <div class="info-box">

                            <h3>
                                🖧 Kompetensi Keahlian Inti
                            </h3>

                            <ul>

                                <li>
                                    Instalasi &amp; Konfigurasi Jaringan
                                    LAN, WAN, dan MAN
                                </li>

                                <li>
                                    Administrasi Server Linux &amp;
                                    Cloud Server Management
                                </li>

                                <li>
                                    Teknologi Jaringan Fiber Optic
                                    (Fiber Splicing &amp; OTDR)
                                </li>

                                <li>
                                    Keamanan Jaringan Komputer
                                    (Cyber &amp; Network Security)
                                </li>

                                <li>
                                    Sistem Komunikasi Nirkabel &amp;
                                    VoIP
                                </li>

                            </ul>

                        </div>


                        <div class="info-box">

                            <h3>
                                👥 Prospek Karier Lulusan
                            </h3>

                            <ul>

                                <li>
                                    Network Administrator &amp; Engineer
                                </li>

                                <li>
                                    System Administrator /
                                    DevOps Junior
                                </li>

                                <li>
                                    Fiber Optic Technician &amp;
                                    Telecommunication Specialist
                                </li>

                                <li>
                                    Junior Cyber Security Analyst
                                </li>

                                <li>
                                    Technical IT Infrastructure Support
                                </li>

                            </ul>

                        </div>


                        <div class="info-box">

                            <h3>
                                🖧 Fasilitas &amp; Workshop
                            </h3>

                            <p>
                                Laboratorium Jaringan Komputer Cisco &amp;
                                MikroTik, Rak Server Rackmount standar Data
                                Center, Fusion Splicer Fiber Optic, dan
                                Perangkat Pengujian Jaringan Industri.
                            </p>


                            <div class="scheme">

                                <span>
                                    SKEMA LSP-P1 BNSP:
                                </span>

                                <strong>
                                    Teknisi Utama Jaringan Komputer
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </article>


        </div>

    </div>

</section>



{{-- =====================================================
     BOTTOM SECTION
===================================================== --}}

<section class="program-bottom">

    <div class="container">

        <div class="program-bottom-content">

            <span>
                MASA DEPAN DIMULAI DARI SINI
            </span>

            <h2>
                Kembangkan Potensi dan Raih Masa Depanmu
            </h2>

            <p>
                Bersama SMK Negeri 4 Bogor, setiap keterampilan
                yang dipelajari menjadi langkah untuk membangun
                masa depan yang lebih siap, mandiri, dan kompeten.
            </p>

        </div>

    </div>

</section>



{{-- =====================================================
     FOOTER
===================================================== --}}

<footer class="program-footer">

    <p>
        © 2026 SMK Negeri 4 Bogor. All Rights Reserved.
    </p>

</footer>



<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


</body>

</html>
