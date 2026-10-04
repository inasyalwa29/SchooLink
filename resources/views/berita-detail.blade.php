<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - SMK Negeri 4 Bogor</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f8fafc;
            color: #0f172a;
            font-family: 'Poppins', sans-serif;
        }

        /* =========================
           DETAIL BERITA
        ========================= */

        .detail-container {
            width: 100%;
            padding: 50px 20px 70px;
        }

        .detail-wrap {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Judul */
        .detail-title {
            margin: 0 0 15px;
            font-size: 42px;
            line-height: 1.25;
            font-weight: 800;
            color: #0f172a;
        }

        /* Tanggal */
        .detail-date {
            margin-bottom: 25px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
        }

        .detail-date i {
            margin-right: 7px;
            color: #2563eb;
        }

        /* Ringkasan */
        .detail-summary {
            margin-bottom: 35px;
            padding: 20px 25px;
            border-left: 5px solid #2563eb;
            border-radius: 0 10px 10px 0;
            background: #eff6ff;
            color: #334155;
            font-size: 17px;
            line-height: 1.8;
        }

        /* =========================
           FOTO UTAMA
           TIDAK DIPOTONG
        ========================= */

        .detail-image {
            width: 100%;
            max-width: 1000px;
            height: auto;
            display: block;
            margin: 0 auto 35px;
            object-fit: contain;
            border-radius: 14px;
            background: #e2e8f0;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.12);
        }

        /* Isi berita */
        .detail-body {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            color: #334155;
            font-size: 16px;
            line-height: 1.9;
        }

        .detail-body p {
            margin-bottom: 20px;
        }

        /* =========================
           BERITA LAINNYA
        ========================= */

        .related-section {
            margin-top: 70px;
        }

        .related-title {
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
        }

        .related-card {
            height: 100%;
            overflow: hidden;
            border: none;
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
            transition: 0.3s ease;
        }

        .related-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.12);
        }

        .related-photo {
            width: 100%;
            height: auto;
            display: block;
            object-fit: contain;
            background: #e2e8f0;
        }

        .related-content {
            padding: 20px;
        }

        .related-date {
            margin-bottom: 8px;
            color: #64748b;
            font-size: 12px;
        }

        .related-date i {
            margin-right: 5px;
            color: #2563eb;
        }

        .related-content h3 {
            margin: 0 0 12px;
            font-size: 18px;
            line-height: 1.5;
            font-weight: 700;
            color: #0f172a;
        }

        .related-content a {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .related-content a:hover {
            color: #1d4ed8;
        }

        /* =========================
           FOOTER
        ========================= */

        .detail-footer {
            width: 100%;
            max-width: 900px;
            margin: 60px auto 0;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            text-align: center;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .detail-container {
                padding: 35px 15px 50px;
            }

            .detail-title {
                font-size: 30px;
            }

            .detail-summary {
                padding: 16px 18px;
                font-size: 15px;
                line-height: 1.7;
            }

            .detail-body {
                font-size: 15px;
                line-height: 1.8;
            }

            .related-title {
                font-size: 24px;
            }

            .related-content h3 {
                font-size: 17px;
            }
        }

        @media (max-width: 480px) {

            .detail-title {
                font-size: 25px;
            }

            .detail-date {
                font-size: 12px;
            }

            .detail-summary {
                font-size: 14px;
            }

            .detail-body {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    @include('partials.navbar')


    {{-- =========================
         DETAIL BERITA
    ========================= --}}

    <main class="detail-container">

        <div class="detail-wrap">

            {{-- Judul --}}
            <h1 class="detail-title">
                {{ $berita->judul }}
            </h1>

            {{-- Tanggal --}}
            <div class="detail-date">
                <i class="fa-regular fa-calendar"></i>

                {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}
            </div>


            {{-- Ringkasan --}}
            @if (!empty($berita->ringkasan))
                <div class="detail-summary">
                    {{ $berita->ringkasan }}
                </div>
            @endif


            {{-- =========================
                 FOTO UTAMA
                 TIDAK DIPOTONG
            ========================= --}}

            @if ($berita->gambar)
                <img
                    class="detail-image"
                    src="{{ asset('uploads/berita/' . $berita->gambar) }}"
                    alt="{{ $berita->judul }}"
                    loading="eager"
                    decoding="async"
                >
            @endif


            {{-- =========================
                 ISI BERITA
            ========================= --}}

            <div class="detail-body">

                @if (!empty($berita->isi))
                    @php
                        $paragraphs = preg_split(
                            "/\r\n|\r|\n/",
                            trim($berita->isi)
                        );
                    @endphp

                    @foreach ($paragraphs as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p>
                                {!! nl2br(e($paragraph)) !!}
                            </p>
                        @endif
                    @endforeach
                @endif

            </div>


            {{-- =========================
                 BERITA LAINNYA
            ========================= --}}

            @if ($beritaLain->count() > 0)

                <section class="related-section">

                    <h2 class="related-title">
                        Berita Lainnya
                    </h2>

                    <div class="row g-4">

                        @foreach ($beritaLain as $item)

                            <div class="col-md-4">

                                <article class="related-card">

                                    {{-- Foto --}}
                                    @if ($item->gambar)

                                        <img
                                            class="related-photo"
                                            src="{{ asset('uploads/berita/' . $item->gambar) }}"
                                            alt="{{ $item->judul }}"
                                            loading="lazy"
                                            decoding="async"
                                        >

                                    @endif


                                    <div class="related-content">

                                        <div class="related-date">
                                            <i class="fa-regular fa-calendar"></i>

                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                        </div>


                                        <h3>
                                            {{ $item->judul }}
                                        </h3>


                                        <a href="{{ route('berita.detail', $item->id) }}">

                                            Baca Selengkapnya

                                            <i class="fa-solid fa-arrow-right"></i>

                                        </a>

                                    </div>

                                </article>

                            </div>

                        @endforeach

                    </div>

                </section>

            @endif


            {{-- Footer --}}
            <div class="detail-footer">

                &copy; {{ date('Y') }} SMK Negeri 4 Bogor.
                Semua hak dilindungi.

            </div>

        </div>

    </main>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>