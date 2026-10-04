<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Profil - {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}
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
         GOOGLE FONT
    ========================================================== -->

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


    <!-- =========================================================
         CSS PUBLIC PROFIL
    ========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/profil.css') }}"
    >


    <!-- =========================================================
         CSS NAVBAR (dipakai semua halaman)
    ========================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/navbar.css') }}"
    >

</head>

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
            
    <div class="profile-hero-overlay"></div>

    <div class="profile-hero-content">

        <span class="profile-hero-label">
            PROFIL SEKOLAH
        </span>


        <h1>

            Mengenal
            <br>

            <strong>
                {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}
            </strong>

        </h1>


        <p>
            Sekolah Menengah Kejuruan yang berkomitmen membentuk
            generasi kompeten, berkarakter, mandiri, dan siap
            menghadapi dunia industri.
        </p>


        <div class="profile-breadcrumb">

            <a href="{{ route('beranda') }}">
                Beranda
            </a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>
                Profil
            </span>

        </div>

    </div>

</section>


<!-- =========================================================
     TENTANG SEKOLAH
========================================================== -->

<section class="school-introduction">

    <div class="profile-container">


        <!-- TEXT -->

        <div class="introduction-text">

            <span class="section-label">
                TENTANG SEKOLAH
            </span>


            <h2>

                Membangun Generasi
                <strong>
                    Vokasi yang Unggul
                </strong>

            </h2>


            @if($schoolProfile?->deskripsi)

                {!! nl2br(e($schoolProfile->deskripsi)) !!}

            @else

                <p>
                    {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}
                    merupakan sekolah menengah kejuruan yang berkomitmen
                    memberikan pendidikan berkualitas dengan mengembangkan
                    kompetensi, karakter, kreativitas, dan keterampilan
                    peserta didik.
                </p>


                <p>
                    Melalui berbagai program dan kegiatan pengembangan diri,
                    sekolah mempersiapkan peserta didik agar mampu melanjutkan
                    pendidikan, memasuki dunia kerja, maupun menjadi pribadi
                    yang mandiri dan berdaya saing.
                </p>

            @endif


            <!-- ALAMAT -->

            <div class="school-address">

                <div class="address-icon">

                    <i class="fa-solid fa-location-dot"></i>

                </div>


                <div>

                    <strong>
                        Alamat Sekolah
                    </strong>

                    <span>
                        {{ $schoolProfile?->alamat ?? 'Jl. Raya Tajur No.141, Kota Bogor, Jawa Barat' }}
                    </span>

                </div>

            </div>

        </div>


        <!-- SCHOOL CARD -->

        <div class="introduction-card">

            <div class="school-logo">

                <img
                    src="{{ $schoolProfile?->logo_sekolah
                        ? asset('uploads/sekolah/' . $schoolProfile->logo_sekolah)
                        : asset('images/logo sekolah.jpg') }}"
                    alt="Logo {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}"
                >

            </div>


            <span>
                {{ $schoolProfile?->nama_sekolah ?? 'SMK NEGERI 4 BOGOR' }}
            </span>


            <strong>
                {{ $schoolProfile?->nama_panggilan ?? 'SMK Negeri 4 Bogor' }}
            </strong>


            <p>
                Sekolah Vokasi Berkarakter dan Siap Industri
            </p>

        </div>

    </div>

</section>


<!-- =========================================================
     DATA PROFIL SEKOLAH
========================================================== -->

<section class="py-5"
         style="background:#f5f7fb;">

    <div class="container">

        <div class="text-center mb-5">

            <span class="text-primary fw-semibold">
                PROFIL SEKOLAH
            </span>

            <h2 class="fw-bold mt-2">
                Data SMK Negeri 4 Bogor
            </h2>

            <p class="text-secondary">
                Informasi lengkap mengenai identitas, pendirian,
                lokasi, dan media sosial sekolah.
            </p>

        </div>


        <div class="row g-4">


            <!-- IDENTITAS SEKOLAH -->

            <div class="col-lg-6">

                <div class="bg-white border rounded-3 p-4 h-100">

                    <h4 class="fw-bold mb-4">
                        Identitas Sekolah
                    </h4>


                    <div class="mb-3">

                        <strong>
                            Nama Sekolah
                        </strong>

                        <p class="text-secondary mb-0">
                            {{ $schoolProfile?->nama_sekolah ?? 'SMK NEGERI 4 BOGOR' }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            NPSN
                        </strong>

                        <p class="text-secondary mb-0">
                            20258095
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Jenjang Pendidikan
                        </strong>

                        <p class="text-secondary mb-0">
                            SMK
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Status Sekolah
                        </strong>

                        <p class="text-secondary mb-0">
                            Negeri
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Akreditasi
                        </strong>

                        <p class="text-secondary mb-0">
                            {{ $schoolProfile?->akreditasi ?? 'A' }}
                        </p>

                    </div>


                    <div>

                        <strong>
                            Kurikulum
                        </strong>

                        <p class="text-secondary mb-0">
                            Kurikulum Merdeka
                        </p>

                    </div>

                </div>

            </div>


            <!-- DATA PENDIRIAN -->

            <div class="col-lg-6">

                <div class="bg-white border rounded-3 p-4 h-100">

                    <h4 class="fw-bold mb-4">
                        Data Pendirian
                    </h4>


                    <div class="mb-3">

                        <strong>
                            Tanggal SK Pendirian
                        </strong>

                        <p class="text-secondary mb-0">
                            15 Juni 2009
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            SK Pendirian
                        </strong>

                        <p class="text-secondary mb-0">
                            421.45-177 Tahun 2009
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Status
                        </strong>

                        <p class="text-secondary mb-0">
                            Negeri
                        </p>

                    </div>


                    <div>

                        <strong>
                            SK Izin Operasional / Tgl SK
                        </strong>

                        <p class="text-secondary mb-0">
                            421.45-177 Tahun 2009 / 15 Juni 2009
                        </p>

                    </div>

                </div>

            </div>


            <!-- LOKASI -->

            <div class="col-lg-6">

                <div class="bg-white border rounded-3 p-4 h-100">

                    <h4 class="fw-bold mb-4">
                        Lokasi Sekolah
                    </h4>


                    <div class="mb-3">

                        <strong>
                            Alamat Sekolah
                        </strong>

                        <p class="text-secondary mb-0">
                            {{ $schoolProfile?->alamat ?? 'Jl. Raya Tajur, Kp. Buntar, Kelurahan Muarasari, Kecamatan Bogor Selatan, Kota Bogor' }}
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Kelurahan
                        </strong>

                        <p class="text-secondary mb-0">
                            Muarasari
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Kecamatan
                        </strong>

                        <p class="text-secondary mb-0">
                            Kecamatan Bogor Selatan
                        </p>

                    </div>


                    <div class="mb-3">

                        <strong>
                            Kota
                        </strong>

                        <p class="text-secondary mb-0">
                            Kota Bogor
                        </p>

                    </div>


                    <div>

                        <strong>
                            Provinsi
                        </strong>

                        <p class="text-secondary mb-0">
                            Jawa Barat
                        </p>

                    </div>

                </div>

            </div>


            <!-- MEDIA SOSIAL -->

            <div class="col-lg-6">

                <div class="bg-white border rounded-3 p-4 h-100">

                    <h4 class="fw-bold mb-4">
                        Media Sosial
                    </h4>


                    <div class="d-flex align-items-center gap-3 mb-4">

                        <i class="fa-brands fa-instagram text-primary fs-3"></i>

                        <div>

                            <strong class="d-block">
                                Instagram
                            </strong>

                            <span class="text-secondary">
                                @smkn4bogor
                            </span>

                        </div>

                    </div>


                    <div class="d-flex align-items-center gap-3 mb-4">

                        <i class="fa-brands fa-facebook text-primary fs-3"></i>

                        <div>

                            <strong class="d-block">
                                Facebook
                            </strong>

                            <span class="text-secondary">
                                SMK Negeri 4 Bogor
                            </span>

                        </div>

                    </div>


                    <div class="d-flex align-items-center gap-3">

                        <i class="fa-brands fa-youtube text-primary fs-3"></i>

                        <div>

                            <strong class="d-block">
                                Youtube
                            </strong>

                            <span class="text-secondary">
                                SMK Negeri 4 Bogor
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     NILAI SEKOLAH
========================================================== -->

<section class="values-section">

    <div class="profile-container">

        <div class="section-heading-left">

            <span class="section-label">
                NILAI SEKOLAH
            </span>

            <h2>
                Karakter yang Menjadi <strong>Identitas Kami</strong>
            </h2>

            <p>
                Nilai-nilai utama yang menjadi dasar dalam membentuk peserta didik
                {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.
            </p>

        </div>


        <div class="values-grid">

            <div class="value-card">

                <span class="value-number">
                    01
                </span>

                <h3>
                    Berkarakter
                </h3>

                <p>
                    Membentuk peserta didik yang memiliki sikap disiplin,
                    bertanggung jawab, dan berakhlak baik.
                </p>

            </div>


            <div class="value-card">

                <span class="value-number">
                    02
                </span>

                <h3>
                    Inovatif
                </h3>

                <p>
                    Mendorong peserta didik untuk berpikir kreatif, adaptif, dan
                    mampu menciptakan solusi baru.
                </p>

            </div>


            <div class="value-card">

                <span class="value-number">
                    03
                </span>

                <h3>
                    Kompeten
                </h3>

                <p>
                    Mengembangkan keterampilan sesuai bidang keahlian dan
                    kebutuhan dunia industri.
                </p>

            </div>


            <div class="value-card">

                <span class="value-number">
                    04
                </span>

                <h3>
                    Siap Kerja
                </h3>

                <p>
                    Mempersiapkan lulusan agar memiliki kompetensi dan kesiapan
                    memasuki dunia kerja.
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     SAMBUTAN KEPALA SEKOLAH
========================================================== -->

<section class="public-principal-section">

    <div class="profile-container">


        <div class="section-heading-center">

            <span class="section-label">
                SAMBUTAN KEPALA SEKOLAH
            </span>


            <h2>

                Pesan untuk
                <strong>
                    Generasi Masa Depan
                </strong>

            </h2>

        </div>


        <div class="public-principal-wrapper">


            <!-- FOTO -->

            <div class="public-principal-photo">

                <div class="public-principal-photo-frame">

                    <img
                        src="{{ $schoolProfile?->foto_kepala_sekolah
                            ? asset('uploads/sekolah/' . $schoolProfile->foto_kepala_sekolah)
                            : asset('images/kepala-sekolah.jpeg') }}"
                        alt="{{ $schoolProfile?->nama_kepala_sekolah ?? 'Kepala Sekolah' }}"
                    >

                </div>


                <div class="public-principal-name">

                    <strong>
                        {{ $schoolProfile?->nama_kepala_sekolah ?? 'Kepala SMK Negeri 4 Bogor' }}
                    </strong>

                    <span>
                        {{ $schoolProfile?->jabatan_kepala_sekolah ?? 'Kepala Sekolah' }}
                    </span>

                </div>

            </div>


            <!-- MESSAGE -->

            <div class="public-principal-message">

                <i class="fa-solid fa-quote-left"></i>


                @if($schoolProfile?->sambutan_kepala_sekolah)

                    <div class="principal-message-text">

                        {!! nl2br(e($schoolProfile->sambutan_kepala_sekolah)) !!}

                    </div>

                @else

                    <p>
                        Selamat datang di
                        {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.
                    </p>


                    <p>
                        Kami berkomitmen memberikan pendidikan berkualitas
                        guna mencetak lulusan yang berkarakter, kompeten,
                        mandiri, dan siap menghadapi dunia kerja maupun
                        melanjutkan pendidikan ke jenjang yang lebih tinggi.
                    </p>

                @endif

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     STRUKTUR ORGANISASI
========================================================== -->

<section class="organization-section">

    <div class="profile-container">


        <div class="section-heading-center">

            <span class="section-label">
                STRUKTUR ORGANISASI
            </span>


            <h2>

                Struktur Organisasi
                <strong>
                    Sekolah
                </strong>

            </h2>


            <p>
                Setiap bagian memiliki peran dan tanggung jawab
                dalam mendukung kegiatan pendidikan di sekolah.
            </p>

        </div>


        <div class="organization-chart">


            <!-- KEPALA SEKOLAH -->

            <div class="organization-main">

                <div class="organization-icon">

                    <i class="fa-solid fa-user-tie"></i>

                </div>


                <div>

                    <span>
                        PIMPINAN SEKOLAH
                    </span>

                    <h3>
                        Kepala Sekolah
                    </h3>

                </div>

            </div>


            <div class="organization-line"></div>


            <!-- ORGANISASI -->

            <div class="organization-grid">


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-book-open"></i>

                    </div>


                    <div>

                        <strong>
                            Wakil Kepala Sekolah
                        </strong>

                        <span>
                            Bidang Kurikulum
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-users"></i>

                    </div>


                    <div>

                        <strong>
                            Wakil Kepala Sekolah
                        </strong>

                        <span>
                            Bidang Kesiswaan
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-building"></i>

                    </div>


                    <div>

                        <strong>
                            Wakil Kepala Sekolah
                        </strong>

                        <span>
                            Sarana dan Prasarana
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-handshake"></i>

                    </div>


                    <div>

                        <strong>
                            Wakil Kepala Sekolah
                        </strong>

                        <span>
                            Hubungan Masyarakat
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-file-lines"></i>

                    </div>


                    <div>

                        <strong>
                            Kepala Tata Usaha
                        </strong>

                        <span>
                            Administrasi Sekolah
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-wallet"></i>

                    </div>


                    <div>

                        <strong>
                            Keuangan
                        </strong>

                        <span>
                            Pengelolaan Keuangan
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-user-group"></i>

                    </div>


                    <div>

                        <strong>
                            Kepegawaian
                        </strong>

                        <span>
                            Administrasi Kepegawaian
                        </span>

                    </div>

                </div>


                <div class="organization-item">

                    <div class="organization-item-icon">

                        <i class="fa-solid fa-folder-open"></i>

                    </div>


                    <div>

                        <strong>
                            Kesekretariatan
                        </strong>

                        <span>
                            Administrasi dan Surat-Menyurat
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     EKSTRAKURIKULER
========================================================== -->

<section
    class="extracurricular-section"
    id="ekstrakurikuler"
>

    <div class="profile-container">


        <div class="section-heading-center">

            <span class="section-label">
                PENGEMBANGAN SISWA
            </span>


            <h2>

                Ekstrakurikuler
                <strong>
                    {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}
                </strong>

            </h2>


            <p>
                Wadah bagi peserta didik untuk mengembangkan minat,
                bakat, kreativitas, dan prestasi.
            </p>

        </div>


        <div class="extracurricular-grid">


            @forelse($ekstrakurikulers as $ekstrakurikuler)


                <div class="extracurricular-card">


                    <!-- GAMBAR -->

                    <div class="extracurricular-image">


                        @if($ekstrakurikuler->gambar)

                            <img
                                src="{{ asset('uploads/ekstrakurikuler/' . $ekstrakurikuler->gambar) }}"
                                alt="{{ $ekstrakurikuler->nama }}"
                            >

                        @else

                            <div class="extracurricular-empty-image">

                                <span>
                                    Belum ada foto
                                </span>

                            </div>

                        @endif

                    </div>


                    <!-- CONTENT -->

                    <div class="extracurricular-content">


                        <span>
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
                                Kegiatan pengembangan minat dan bakat
                                peserta didik
                                {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.
                            </p>

                        @endif


                    </div>

                </div>


            @empty


                <div class="empty-public">

                    <i class="fa-solid fa-people-group"></i>

                    <h3>
                        Belum Ada Ekstrakurikuler
                    </h3>

                    <p>
                        Informasi ekstrakurikuler belum tersedia.
                    </p>

                </div>


            @endforelse

        </div>

    </div>

</section>


<!-- =========================================================
     COPYRIGHT
========================================================== -->

<div class="copyright">

    © 2026
    {{ $schoolProfile?->nama_sekolah ?? 'SMK Negeri 4 Bogor' }}.
    All Rights Reserved.

</div>


</body>

</html>