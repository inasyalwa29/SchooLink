<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Berita | Admin SMKN 4 Bogor</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    {{-- Sidebar --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >

    {{-- CSS Halaman --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-berita-edit.css') }}"
    >
</head>

<body>

<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.layouts.sidebar')


    {{-- MAIN CONTENT --}}
    <main class="main-content">

        {{-- HEADER --}}
        <header class="admin-header">

            <div class="header-left">
                <div class="page-title">
                    <h1>Edit Berita</h1>
                    <p>Perbarui informasi berita SMKN 4 Bogor.</p>
                </div>
            </div>

            <div class="header-right">

                {{-- Search --}}
                <div class="header-search">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        placeholder="Cari..."
                        aria-label="Cari"
                    >
                </div>

                {{-- Notification --}}
                <button
                    type="button"
                    class="notification-button"
                    aria-label="Notifikasi"
                >
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
                </button>

                {{-- Admin Profile --}}
                <div class="admin-profile">

                    <div class="admin-avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="admin-info">
                        <strong>{{ auth()->user()->name }}</strong>

                        <span>
                            {{ ucwords(str_replace('_', ' ', auth()->user()->role)) }}
                        </span>
                    </div>

                    <i class="fa-solid fa-chevron-down profile-arrow"></i>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <div class="content-container">

            {{-- Breadcrumb --}}
            <div class="breadcrumb-wrapper">

                <a href="{{ route('admin.berita.index') }}">
                    <i class="fa-solid fa-newspaper"></i>
                    Berita
                </a>

                <i class="fa-solid fa-chevron-right"></i>

                <span>Edit Berita</span>

            </div>


            {{-- FORM CARD --}}
            <div class="edit-card">

                <div class="edit-card-header">

                    <div>
                        <h2>
                            <i class="fa-solid fa-pen-to-square"></i>
                            Edit Berita
                        </h2>

                        <p>
                            Silakan ubah informasi berita sesuai kebutuhan.
                        </p>
                    </div>

                </div>


                {{-- Validation Error --}}
                @if ($errors->any())

                    <div class="alert alert-danger custom-alert">

                        <div class="alert-icon">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>

                        <div>
                            <strong>Data belum dapat disimpan.</strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                @endif


                {{-- FORM --}}
                <form
                    action="{{ route('admin.berita.update', $berita->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="news-form"
                >

                    @csrf
                    @method('PUT')


                    {{-- JUDUL --}}
                    <div class="form-group">

                        <label for="judul">
                            Judul Berita
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="{{ old('judul', $berita->judul) }}"
                            placeholder="Masukkan judul berita"
                            required
                        >

                        @error('judul')
                            <small class="error-text">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- TANGGAL + KATEGORI --}}
                    <div class="form-row">

                        {{-- TANGGAL --}}
                        <div class="form-group">

                            <label for="tanggal">
                                Tanggal
                                <span>*</span>
                            </label>

                            <div class="input-icon">

                                <i class="fa-regular fa-calendar"></i>

                                <input
                                    type="date"
                                    id="tanggal"
                                    name="tanggal"
                                    value="{{ old('tanggal', optional($berita->tanggal)->format('Y-m-d')) }}"
                                    required
                                >

                            </div>

                            @error('tanggal')
                                <small class="error-text">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>


                        {{-- KATEGORI --}}
                        <div class="form-group">

                            <label for="kategori">
                                Kategori
                                <span>*</span>
                            </label>

                            <div class="input-icon">

                                <i class="fa-solid fa-layer-group"></i>

                                <select
                                    id="kategori"
                                    name="kategori"
                                    required
                                >

                                    <option value="">
                                        Pilih kategori
                                    </option>

                                    <option
                                        value="Sekolah"
                                        {{ old('kategori', $berita->kategori) == 'Sekolah' ? 'selected' : '' }}
                                    >
                                        Sekolah
                                    </option>

                                    <option
                                        value="Prestasi"
                                        {{ old('kategori', $berita->kategori) == 'Prestasi' ? 'selected' : '' }}
                                    >
                                        Prestasi
                                    </option>

                                    <option
                                        value="Kegiatan"
                                        {{ old('kategori', $berita->kategori) == 'Kegiatan' ? 'selected' : '' }}
                                    >
                                        Kegiatan
                                    </option>

                                    <option
                                        value="Pengumuman"
                                        {{ old('kategori', $berita->kategori) == 'Pengumuman' ? 'selected' : '' }}
                                    >
                                        Pengumuman
                                    </option>

                                    <option
                                        value="Lainnya"
                                        {{ old('kategori', $berita->kategori) == 'Lainnya' ? 'selected' : '' }}
                                    >
                                        Lainnya
                                    </option>

                                </select>

                            </div>

                            @error('kategori')
                                <small class="error-text">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>


                    {{-- RINGKASAN --}}
                    <div class="form-group">

                        <label for="ringkasan">
                            Ringkasan
                        </label>

                        <textarea
                            id="ringkasan"
                            name="ringkasan"
                            rows="4"
                            placeholder="Masukkan ringkasan singkat berita"
                        >{{ old('ringkasan', $berita->ringkasan) }}</textarea>

                        @error('ringkasan')
                            <small class="error-text">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- ISI BERITA --}}
                    <div class="form-group">

                        <label for="isi">
                            Isi Berita
                            <span>*</span>
                        </label>

                        <textarea
                            id="isi"
                            name="isi"
                            rows="10"
                            placeholder="Masukkan isi lengkap berita"
                            required
                        >{{ old('isi', $berita->isi) }}</textarea>

                        @error('isi')
                            <small class="error-text">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- FOTO --}}
                    <div class="form-group">

                        <label for="gambar">
                            Foto Berita
                        </label>

                        <p class="form-help">
                            Kosongkan jika tidak ingin mengganti foto.
                            Format JPG, JPEG, atau PNG. Maksimal 2 MB.
                        </p>


                        {{-- FOTO LAMA --}}
                        @if ($berita->gambar)

                            <div class="current-image-wrapper">

                                <div class="current-image">

                                    <img
                                        src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                                        alt="{{ $berita->judul }}"
                                    >

                                </div>

                                <div class="current-image-info">

                                    <span class="current-image-label">
                                        Foto Saat Ini
                                    </span>

                                    <strong>
                                        {{ $berita->gambar }}
                                    </strong>

                                </div>

                            </div>

                        @else

                            <div class="no-image">

                                <i class="fa-regular fa-image"></i>

                                <span>
                                    Belum ada foto berita.
                                </span>

                            </div>

                        @endif


                        {{-- UPLOAD FOTO BARU --}}
                        <div class="upload-wrapper">

                            <label
                                for="gambar"
                                class="upload-box"
                            >

                                <i class="fa-solid fa-cloud-arrow-up"></i>

                                <strong>
                                    Pilih foto baru
                                </strong>

                                <span>
                                    Klik untuk memilih file
                                </span>

                            </label>

                            <input
                                type="file"
                                id="gambar"
                                name="gambar"
                                accept=".jpg,.jpeg,.png"
                            >

                        </div>

                        <div
                            id="selected-file"
                            class="selected-file"
                        ></div>

                        @error('gambar')
                            <small class="error-text">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- ACTION --}}
                    <div class="form-actions">

                        <a
                            href="{{ route('admin.berita.index') }}"
                            class="btn-back"
                        >
                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali
                        </a>

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


{{-- Preview Nama File --}}
<script>

    const imageInput = document.getElementById('gambar');
    const selectedFile = document.getElementById('selected-file');

    if (imageInput) {

        imageInput.addEventListener('change', function () {

            if (this.files.length > 0) {

                const file = this.files[0];

                selectedFile.innerHTML = `
                    <i class="fa-solid fa-file-image"></i>
                    <span>${file.name}</span>
                `;

                selectedFile.classList.add('show');

            } else {

                selectedFile.innerHTML = '';
                selectedFile.classList.remove('show');

            }

        });

    }

</script>

</body>
</html>