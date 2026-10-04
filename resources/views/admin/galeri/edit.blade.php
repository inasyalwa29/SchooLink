<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Galeri</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Galeri</h4>
                </div>

                <div class="card-body">

                    {{-- Pesan error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- Form Edit --}}
                    <form action="{{ route('admin.galeri.update', $galeri->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')


                        {{-- Judul --}}
                        <div class="mb-3">
                            <label class="form-label">
                                Judul Galeri
                            </label>

                            <input
                                type="text"
                                name="judul"
                                class="form-control"
                                value="{{ old('judul', $galeri->judul) }}"
                                required
                            >
                        </div>


                        {{-- Keterangan --}}
                        <div class="mb-3">
                            <label class="form-label">
                                Keterangan
                            </label>

                            <textarea
                                name="keterangan"
                                class="form-control"
                                rows="5"
                                required
                            >{{ old('keterangan', $galeri->keterangan) }}</textarea>
                        </div>


                        {{-- Foto Lama --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Foto Saat Ini
                            </label>

                            <br>

                            @if ($galeri->gambar)

                                <img
                                    src="{{ asset('uploads/' . $galeri->gambar) }}"
                                    alt="{{ $galeri->judul }}"
                                    style="width: 250px; height: 160px; object-fit: cover; border-radius: 10px;"
                                >

                            @else

                                <p class="text-muted">
                                    Tidak ada foto.
                                </p>

                            @endif

                        </div>


                        {{-- Foto Baru --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Ganti Foto
                            </label>

                            <input
                                type="file"
                                name="foto"
                                class="form-control"
                                accept="image/*"
                            >

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto.
                            </small>

                        </div>


                        {{-- Tombol --}}
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary">
                                Simpan Perubahan
                            </button>

                            <a
                                href="{{ route('admin.galeri.index') }}"
                                class="btn btn-secondary">
                                Batal
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>