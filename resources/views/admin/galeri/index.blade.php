<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - Admin SMKN 4 Bogor</title>

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

    <!-- CSS SIDEBAR -->
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >

    <!-- CSS GALERI -->
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-galeri.css') }}"
    >
</head>

<body>

<div class="admin-wrapper">

    {{-- =====================================================
         SIDEBAR ADMIN
         ===================================================== --}}
    @include('admin.layouts.sidebar')


    {{-- =====================================================
         MAIN CONTENT
         ===================================================== --}}
    <main class="main-content">


        {{-- =====================================================
             TOP HEADER
             ===================================================== --}}
        <header class="top-header">

            <div class="page-title">

                <h1>
                    Galeri
                </h1>

                <p>
                    Kelola foto dan dokumentasi kegiatan SMKN 4 Bogor.
                </p>

            </div>


            <div class="header-right">

                {{-- SEARCH --}}
                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="searchGallery"
                        placeholder="Cari..."
                        autocomplete="off"
                    >

                </div>


                {{-- ADMIN PROFILE --}}
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


        {{-- =====================================================
             CONTENT
             ===================================================== --}}
        <section class="content-area">


            {{-- =================================================
                 HEADING
                 ================================================= --}}
            <div class="content-heading">

                <div>

                    <h2>
                        Kelola Galeri
                    </h2>

                    <p>
                        Kelola foto dan dokumentasi kegiatan SMKN 4 Bogor.
                    </p>

                </div>


                {{-- ADD BUTTON --}}
                <button
                    type="button"
                    class="btn-add"
                    data-bs-toggle="modal"
                    data-bs-target="#addGalleryModal"
                >

                    <i class="fa-solid fa-plus"></i>

                    Tambah Foto

                </button>

            </div>


            {{-- =================================================
                 SUCCESS MESSAGE
                 ================================================= --}}
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


            {{-- =================================================
                 ERROR MESSAGE
                 ================================================= --}}
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


            {{-- =================================================
                 STAT
                 ================================================= --}}
            <div class="gallery-stat">

                <div class="stat-icon">

                    <i class="fa-regular fa-image"></i>

                </div>

                <div>

                    <span>
                        Total Foto
                    </span>

                    <strong>
                        {{ $galeri->count() }}
                    </strong>

                </div>

            </div>


            {{-- =================================================
                 SECTION HEADING
                 ================================================= --}}
            <div class="section-heading">

                <h3>
                    Daftar Galeri
                </h3>

                <p>
                    Semua foto dokumentasi yang telah ditambahkan.
                </p>

            </div>


            {{-- =================================================
                 GALLERY GRID
                 ================================================= --}}
            <div
                class="gallery-grid"
                id="galleryGrid"
            >

                @forelse($galeri as $item)

                    <article
                        class="gallery-card"
                        data-title="{{ strtolower($item->judul) }}"
                    >

                        {{-- FOTO --}}
                        <div class="gallery-photo">

                            @if($item->gambar)

                                <img
                                    src="{{ asset('uploads/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}"
                                >

                            @else

                                <div class="gallery-photo-empty">

                                    <i class="fa-regular fa-image"></i>

                                </div>

                            @endif

                        </div>


                        {{-- BODY --}}
                        <div class="gallery-card-body">


                            {{-- DATE --}}
                            <div class="gallery-date">

                                <i class="fa-regular fa-calendar"></i>

                                {{ $item->created_at
                                    ? $item->created_at->format('d M Y')
                                    : '-'
                                }}

                            </div>


                            {{-- TITLE --}}
                            <h3>
                                {{ $item->judul }}
                            </h3>


                            {{-- DESCRIPTION --}}
                            <p class="gallery-description">

                                {{ $item->keterangan }}

                            </p>


                            {{-- ACTION --}}
                            <div class="gallery-actions">


                                {{-- LIHAT --}}
                                <button
                                    type="button"
                                    class="btn-view"
                                    data-bs-toggle="modal"
                                    data-bs-target="#viewGalleryModal{{ $item->id }}"
                                >

                                    <i class="fa-regular fa-eye"></i>

                                    Lihat

                                </button>


                                {{-- EDIT --}}
                                <a
                                    href="{{ route('admin.galeri.edit', $item->id) }}"
                                    class="btn-edit"
                                >

                                    <i class="fa-regular fa-pen-to-square"></i>

                                    Edit

                                </a>


                                {{-- DELETE --}}
                                <form
                                    action="{{ route('admin.galeri.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
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


                    {{-- =================================================
                         VIEW MODAL
                         ================================================= --}}
                    <div
                        class="modal fade"
                        id="viewGalleryModal{{ $item->id }}"
                        tabindex="-1"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content gallery-view-modal">


                                {{-- CLOSE --}}
                                <button
                                    type="button"
                                    class="gallery-modal-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                >

                                    <i class="fa-solid fa-xmark"></i>

                                </button>


                                {{-- IMAGE --}}
                                @if($item->gambar)

                                    <img
                                        src="{{ asset('uploads/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="gallery-view-image"
                                    >

                                @endif


                                {{-- CONTENT --}}
                                <div class="gallery-view-content">

                                    <h2>
                                        {{ $item->judul }}
                                    </h2>


                                    <div class="gallery-view-date">

                                        <i class="fa-regular fa-calendar"></i>

                                        {{ $item->created_at
                                            ? $item->created_at->format('d M Y')
                                            : '-'
                                        }}

                                    </div>


                                    <div class="gallery-view-text">

                                        {{ $item->keterangan }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                @empty


                    {{-- =================================================
                         EMPTY STATE
                         ================================================= --}}
                    <div class="empty-gallery">

                        <div class="empty-gallery-icon">

                            <i class="fa-regular fa-image"></i>

                        </div>


                        <h3>
                            Belum Ada Foto
                        </h3>


                        <p>
                            Belum ada foto yang ditambahkan ke galeri.
                        </p>


                        <button
                            type="button"
                            class="btn-add"
                            data-bs-toggle="modal"
                            data-bs-target="#addGalleryModal"
                        >

                            <i class="fa-solid fa-plus"></i>

                            Tambah Foto

                        </button>

                    </div>

                @endforelse

            </div>

        </section>

    </main>

</div>


{{-- =========================================================
     MODAL TAMBAH FOTO
     ========================================================= --}}
<div
    class="modal fade"
    id="addGalleryModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content add-modal">


            {{-- MODAL HEADER --}}
            <div class="modal-header-custom">

                <div>

                    <h3>
                        Tambah Foto
                    </h3>

                    <p>
                        Tambahkan foto dokumentasi kegiatan sekolah.
                    </p>

                </div>


                <button
                    type="button"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>


            {{-- FORM --}}
            <form
                action="{{ route('admin.galeri.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- BODY --}}
                <div class="modal-body-custom">


                    {{-- JUDUL --}}
                    <div class="form-group-custom">

                        <label>
                            Judul Foto
                        </label>

                        <input
                            type="text"
                            name="judul"
                            placeholder="Masukkan judul foto"
                            required
                        >

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="form-group-custom">

                        <label>
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            rows="4"
                            placeholder="Masukkan keterangan foto"
                            required
                        ></textarea>

                    </div>


                    {{-- FOTO --}}
                    <div class="form-group-custom">

                        <label>
                            Foto
                        </label>


                        <div class="upload-box">

                            <i class="fa-solid fa-cloud-arrow-up"></i>

                            <span>
                                Klik untuk memilih foto
                            </span>

                            <small>
                                JPG, JPEG, PNG, WEBP • Maksimal 2MB
                            </small>


                            <input
                                type="file"
                                name="foto"
                                accept=".jpg,.jpeg,.png,.webp"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- FOOTER --}}
                <div class="modal-footer-custom">


                    {{-- CANCEL --}}
                    <button
                        type="button"
                        class="btn-cancel"
                        data-bs-dismiss="modal"
                    >

                        Batal

                    </button>


                    {{-- SAVE --}}
                    <button
                        type="submit"
                        class="btn-save"
                    >

                        <i class="fa-solid fa-floppy-disk"></i>

                        Simpan Foto

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- =========================================================
     BOOTSTRAP JS
     ========================================================= --}}
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


{{-- =========================================================
     SEARCH GALERI
     ========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('searchGallery');

    const galleryCards =
        document.querySelectorAll('.gallery-card');


    if (!searchInput) {
        return;
    }


    searchInput.addEventListener('input', function () {

        const keyword =
            this.value.toLowerCase().trim();


        galleryCards.forEach(function (card) {

            const title =
                card.dataset.title || '';


            if (title.includes(keyword)) {

                card.style.display = '';

            } else {

                card.style.display = 'none';

            }

        });

    });

});

</script>


</body>
</html>