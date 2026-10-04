<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Berita - Admin SMKN 4 Bogor
    </title>


    <!-- =====================================================
         BOOTSTRAP
    ====================================================== -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- =====================================================
         SIDEBAR CSS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >


    <!-- =====================================================
         BERITA CSS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-berita.css') }}"
    >


    <style>

        /* =====================================================
           MAIN CONTENT
        ====================================================== */

        .main-content {
            min-height: 100vh;
            margin-left: 290px;
            width: calc(100% - 290px);
        }


        /* =====================================================
           TOP HEADER
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


        /* =====================================================
           PAGE TITLE
        ====================================================== */

        .page-title {
            min-width: 0;
            flex-shrink: 0;
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
           HEADER RIGHT
        ====================================================== */

        .header-right {
            display: flex;
            align-items: center;

            gap: 18px;

            margin-left: auto;
        }


        /* =====================================================
           SEARCH BOX
        ====================================================== */

        .search-box {
            width: 250px;

            height: 42px;

            display: flex;
            align-items: center;

            gap: 9px;

            padding: 0 13px;

            background: #f8fafc;

            border: 1px solid #e5e9f0;

            border-radius: 10px;
        }


        .search-box i {
            color: #9ca3af;

            font-size: 13px;
        }


        .search-box input {
            width: 100%;

            border: 0;
            outline: none;

            background: transparent;

            color: #1f2937;

            font-size: 12px;
        }


        .search-box input::placeholder {
            color: #9ca3af;
        }


        /* =====================================================
           ADMIN PROFILE
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


        /* =====================================================
           ADMIN AVATAR
        ====================================================== */

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


        /* =====================================================
           ADMIN INFO
        ====================================================== */

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


        /* =====================================================
           PROFILE ARROW
        ====================================================== */

        .profile-arrow {
            margin-left: 5px;

            color: #9ca3af;

            font-size: 11px;
        }


        /* =====================================================
           RESPONSIVE
        ====================================================== */

        @media (max-width: 1000px) {

            .main-content {
                margin-left: 0;

                width: 100%;
            }

        }


        @media (max-width: 850px) {

            .search-box {
                width: 210px;
            }

        }


        @media (max-width: 700px) {

            .top-header {
                padding: 18px;
            }


            .header-right {
                gap: 8px;
            }


            .search-box {
                width: 190px;
            }


            .admin-info {
                display: none;
            }

        }


        @media (max-width: 560px) {

            .top-header {
                gap: 12px;
            }


            .page-title h1 {
                font-size: 22px;
            }


            .page-title p {
                font-size: 11px;
            }


            .search-box {
                width: 150px;
            }


            .admin-profile {
                padding: 5px;
            }


            .profile-arrow {
                display: none;
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
             TOP HEADER
        ================================================== -->

        <header class="top-header">


            <!-- =================================================
                 PAGE TITLE
            ================================================== -->

            <div class="page-title">

                <h1>
                    Berita
                </h1>

                <p>
                    Kelola informasi dan berita terbaru SMKN 4 Bogor.
                </p>

            </div>


            <!-- =================================================
                 HEADER RIGHT
            ================================================== -->

            <div class="header-right">


                <!-- =================================================
                     SEARCH BERITA
                ================================================== -->

                <form
                    action="{{ route('admin.berita.index') }}"
                    method="GET"
                    class="search-box"
                >

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        name="search"
                        id="searchNews"
                        value="{{ request('search') }}"
                        placeholder="Cari nama kegiatan..."
                        autocomplete="off"
                    >

                </form>


                <!-- =================================================
                     ADMIN PROFILE
                ================================================== -->

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
                            {{ auth()->user()->name }}
                        </strong>

                        <span>
                            {{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                        </span>

                    </div>


                    <i class="fa-solid fa-chevron-right profile-arrow"></i>

                </a>


            </div>

        </header>



        <!-- =================================================
             CONTENT
        ================================================== -->

        <section class="content-area">


            <!-- =================================================
                 HEADING
            ================================================== -->

            <div class="content-heading">


                <div>

                    <h2>
                        Kelola Berita
                    </h2>

                    <p>
                        Kelola informasi dan berita terbaru SMKN 4 Bogor.
                    </p>

                </div>


                <!-- ADD BUTTON -->

                <button
                    type="button"
                    class="btn-add"
                    data-bs-toggle="modal"
                    data-bs-target="#addNewsModal"
                >

                    <i class="fa-solid fa-plus"></i>

                    Tambah Berita

                </button>


            </div>



            <!-- =================================================
                 SUCCESS ALERT
            ================================================== -->

            @if(session('success'))

                <div class="alert-success-custom">

                    <i class="fa-solid fa-circle-check"></i>

                    <span>
                        {{ session('success') }}
                    </span>

                    <button
                        type="button"
                        onclick="this.parentElement.remove()"
                    >

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>

            @endif



            <!-- =================================================
                 ERROR ALERT
            ================================================== -->

            @if($errors->any())

                <div class="alert-danger-custom">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>

                        @foreach($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif



            <!-- =================================================
                 STAT
            ================================================== -->

            <div class="news-stat">


                <div class="stat-icon">

                    <i class="fa-regular fa-newspaper"></i>

                </div>


                <div>

                    <span>
                        Total Berita
                    </span>

                    <strong>
                        {{ $beritas->count() }}
                    </strong>

                </div>


            </div>



            <!-- =================================================
                 SECTION HEADING
            ================================================== -->

            <div class="section-heading">

                <div>

                    <h3>
                        Daftar Berita
                    </h3>

                    @if(request('search'))

                        <p>
                            Hasil pencarian untuk:
                            <strong>"{{ request('search') }}"</strong>
                        </p>

                    @else

                        <p>
                            Semua berita yang telah ditambahkan.
                        </p>

                    @endif

                </div>

            </div>



            <!-- =================================================
                 NEWS GRID
            ================================================== -->

            <div
                class="news-grid"
                id="newsGrid"
            >


                @forelse($beritas as $berita)


                    <!-- =================================================
                         NEWS CARD
                    ================================================== -->

                    <article
                        class="news-card"
                    >


                        <!-- FOTO -->

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


                            <!-- KATEGORI -->

                            @if($berita->kategori)

                                <span class="news-category">

                                    {{ $berita->kategori }}

                                </span>

                            @endif


                        </div>



                        <!-- BODY -->

                        <div class="news-card-body">


                            <!-- DATE -->

                            <div class="news-date">

                                <i class="fa-regular fa-calendar"></i>

                                {{ $berita->tanggal
                                    ? $berita->tanggal->format('d M Y')
                                    : '-'
                                }}

                            </div>



                            <!-- TITLE -->

                            <h3>

                                {{ $berita->judul }}

                            </h3>



                            <!-- SUMMARY -->

                            @if($berita->ringkasan)

                                <p class="news-summary">

                                    {{ $berita->ringkasan }}

                                </p>

                            @else

                                <p class="news-summary">

                                    Tidak ada ringkasan berita.

                                </p>

                            @endif



                            <!-- ACTIONS -->

                            <div class="news-actions">


                                <!-- VIEW -->

                                <button
                                    type="button"
                                    class="btn-view"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewNewsModal{{ $berita->id }}"
                                >

                                    <i class="fa-regular fa-eye"></i>

                                    Lihat

                                </button>



                                <!-- EDIT -->

                                <a
                                    href="{{ route('admin.berita.edit', $berita->id) }}"
                                    class="btn-edit"
                                >

                                    <i class="fa-regular fa-pen-to-square"></i>

                                    Edit

                                </a>



                                <!-- DELETE -->

                                <form
                                    action="{{ route('admin.berita.destroy', $berita->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="btn-delete"
                                    >

                                        <i class="fa-regular fa-trash-can"></i>

                                        Hapus

                                    </button>

                                </form>


                            </div>


                        </div>


                    </article>



                    <!-- =================================================
                         VIEW MODAL
                    ================================================== -->

                    <div
                        class="modal fade"
                        id="viewNewsModal{{ $berita->id }}"
                        tabindex="-1"
                        aria-hidden="true"
                    >


                        <div class="modal-dialog modal-lg modal-dialog-centered">


                            <div class="modal-content news-view-modal">


                                <!-- CLOSE -->

                                <button
                                    type="button"
                                    class="news-modal-close"
                                    data-bs-dismiss="modal"
                                >

                                    <i class="fa-solid fa-xmark"></i>

                                </button>



                                <!-- IMAGE -->

                                @if($berita->gambar)

                                    <img
                                        src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                        alt="{{ $berita->judul }}"
                                        class="news-view-image"
                                    >

                                @endif



                                <!-- CONTENT -->

                                <div class="news-view-content">


                                    <!-- CATEGORY -->

                                    @if($berita->kategori)

                                        <span class="news-view-category">

                                            {{ $berita->kategori }}

                                        </span>

                                    @endif



                                    <!-- TITLE -->

                                    <h2>

                                        {{ $berita->judul }}

                                    </h2>



                                    <!-- DATE -->

                                    <div class="news-view-date">

                                        <i class="fa-regular fa-calendar"></i>

                                        {{ $berita->tanggal
                                            ? $berita->tanggal->format('d M Y')
                                            : '-'
                                        }}

                                    </div>



                                    <!-- SUMMARY -->

                                    @if($berita->ringkasan)

                                        <div class="news-view-summary">

                                            {{ $berita->ringkasan }}

                                        </div>

                                    @endif



                                    <!-- CONTENT -->

                                    <div class="news-view-text">

                                        {!! nl2br(e($berita->isi)) !!}

                                    </div>


                                </div>


                            </div>


                        </div>


                    </div>


                @empty


                    <!-- =================================================
                         EMPTY / SEARCH NOT FOUND
                    ================================================== -->

                    <div class="empty-news">


                        <div class="empty-news-icon">

                            @if(request('search'))

                                <i class="fa-solid fa-magnifying-glass"></i>

                            @else

                                <i class="fa-regular fa-newspaper"></i>

                            @endif

                        </div>


                        @if(request('search'))

                            <h3>
                                Berita Tidak Ditemukan
                            </h3>


                            <p>
                                Tidak ada berita atau nama kegiatan yang cocok
                                dengan pencarian
                                "<strong>{{ request('search') }}</strong>".
                            </p>


                            <a
                                href="{{ route('admin.berita.index') }}"
                                class="btn-add"
                                style="text-decoration: none;"
                            >

                                <i class="fa-solid fa-rotate-left"></i>

                                Tampilkan Semua Berita

                            </a>

                        @else

                            <h3>
                                Belum Ada Berita
                            </h3>


                            <p>
                                Belum ada berita yang ditambahkan.
                            </p>


                            <button
                                type="button"
                                class="btn-add"
                                data-bs-toggle="modal"
                                data-bs-target="#addNewsModal"
                            >

                                <i class="fa-solid fa-plus"></i>

                                Tambah Berita

                            </button>

                        @endif


                    </div>


                @endforelse


            </div>


        </section>


    </main>


</div>



<!-- =========================================================
     MODAL TAMBAH BERITA
========================================================== -->

<div
    class="modal fade"
    id="addNewsModal"
    tabindex="-1"
    aria-hidden="true"
>


    <div class="modal-dialog modal-lg modal-dialog-centered">


        <div class="modal-content add-news-modal">


            <!-- HEADER -->

            <div class="news-modal-header">


                <div>

                    <h3>
                        Tambah Berita
                    </h3>

                    <p>
                        Tambahkan berita baru untuk website sekolah.
                    </p>

                </div>


                <button
                    type="button"
                    data-bs-dismiss="modal"
                >

                    <i class="fa-solid fa-xmark"></i>

                </button>


            </div>



            <!-- FORM -->

            <form
                action="{{ route('admin.berita.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <!-- BODY -->

                <div class="news-modal-body">


                    <!-- JUDUL -->

                    <div class="form-group-custom">

                        <label for="judul">
                            Judul Berita
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            placeholder="Masukkan judul berita"
                            required
                        >

                    </div>



                    <!-- ROW -->

                    <div class="form-row-custom">


                        <!-- TANGGAL -->

                        <div class="form-group-custom">

                            <label for="tanggal">
                                Tanggal
                            </label>

                            <input
                                type="date"
                                id="tanggal"
                                name="tanggal"
                                value="{{ date('Y-m-d') }}"
                                required
                            >

                        </div>



                        <!-- KATEGORI -->

                        <div class="form-group-custom">

                            <label for="kategori">
                                Kategori
                            </label>

                            <select
                                id="kategori"
                                name="kategori"
                                required
                            >

                                <option value="">
                                    Pilih Kategori
                                </option>

                                <option value="Sekolah">
                                    Sekolah
                                </option>

                                <option value="Prestasi">
                                    Prestasi
                                </option>

                                <option value="Kegiatan">
                                    Kegiatan
                                </option>

                                <option value="Pengumuman">
                                    Pengumuman
                                </option>

                                <option value="Lainnya">
                                    Lainnya
                                </option>

                            </select>

                        </div>


                    </div>



                    <!-- RINGKASAN -->

                    <div class="form-group-custom">

                        <label for="ringkasan">
                            Ringkasan
                        </label>

                        <textarea
                            id="ringkasan"
                            name="ringkasan"
                            placeholder="Masukkan ringkasan berita"
                            rows="3"
                        ></textarea>

                    </div>



                    <!-- ISI -->

                    <div class="form-group-custom">

                        <label for="isi">
                            Isi Berita
                        </label>

                        <textarea
                            id="isi"
                            name="isi"
                            placeholder="Masukkan isi berita"
                            rows="6"
                            required
                        ></textarea>

                    </div>



                    <!-- GAMBAR -->

                    <div class="form-group-custom">

                        <label>
                            Gambar Berita
                        </label>


                        <div class="upload-news-box">

                            <i class="fa-solid fa-cloud-arrow-up"></i>

                            <span>
                                Klik untuk memilih gambar
                            </span>

                            <small>
                                JPG, JPEG, PNG maksimal 2MB
                            </small>


                            <input
                                type="file"
                                name="gambar"
                                accept="image/*"
                            >

                        </div>


                    </div>


                </div>



                <!-- FOOTER -->

                <div class="news-modal-footer">


                    <!-- BATAL -->

                    <button
                        type="button"
                        class="btn-cancel"
                        data-bs-dismiss="modal"
                    >

                        Batal

                    </button>



                    <!-- SIMPAN -->

                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Berita

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


</body>

</html>