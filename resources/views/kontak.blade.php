<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - SMK Negeri 4 Bogor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

    <link rel="stylesheet"
          href="{{ asset('css/navbar.css') }}">

</head>

<body>

@include('partials.navbar')


<!-- ================= HEADER ================= -->

<section class="py-5"
         style="background:#f5f7fb;">

    <div class="container py-4">

        <span class="text-primary fw-semibold">
            KONTAK
        </span>

        <h1 class="fw-bold mt-2">
            Hubungi Kami
        </h1>

        <p class="text-secondary fs-5">
            Informasi kontak dan lokasi SMK Negeri 4 Bogor.
        </p>

    </div>

</section>


<!-- ================= INFORMASI UTAMA ================= -->

<section class="py-5">

    <div class="container">

        <div class="row g-4">


            <!-- INFORMASI KONTAK -->

            <div class="col-lg-5">

                <div class="border rounded-3 p-4 h-100">

                    <h3 class="fw-bold mb-4">
                        Informasi Sekolah
                    </h3>


                    <!-- ALAMAT -->

                    <div class="d-flex gap-3 mb-4">

                        <i class="fa-solid fa-location-dot text-primary fs-4"></i>

                        <div>

                            <strong class="d-block">
                                Alamat
                            </strong>

                            <span class="text-secondary">
                                Jl. Raya Tajur, Kp. Buntar,
                                Kelurahan Muarasari,
                                Kecamatan Bogor Selatan,
                                Kota Bogor, Jawa Barat.
                            </span>

                        </div>

                    </div>


                    <!-- TELEPON -->

                    <div class="d-flex gap-3 mb-4">

                        <i class="fa-solid fa-phone text-primary fs-4"></i>

                        <div>

                            <strong class="d-block">
                                Telepon
                            </strong>

                            <span class="text-secondary">
                                082260168886
                            </span>

                        </div>

                    </div>


                    <!-- EMAIL -->

                    <div class="d-flex gap-3 mb-4">

                        <i class="fa-solid fa-envelope text-primary fs-4"></i>

                        <div>

                            <strong class="d-block">
                                Email
                            </strong>

                            <span class="text-secondary">
                                smkn4@smkn4bogor.sch.id
                            </span>

                        </div>

                    </div>


                    <!-- WEBSITE -->

                    <div class="d-flex gap-3 mb-4">

                        <i class="fa-solid fa-globe text-primary fs-4"></i>

                        <div>

                            <strong class="d-block">
                                Website
                            </strong>

                            <span class="text-secondary">
                                SMK Negeri 4 Bogor
                            </span>

                        </div>

                    </div>


                    <!-- AKREDITASI -->

                    <div class="d-flex gap-3">

                        <i class="fa-solid fa-award text-primary fs-4"></i>

                        <div>

                            <strong class="d-block">
                                Akreditasi
                            </strong>

                            <span class="text-secondary">
                                A
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            <!-- MAP -->

            <div class="col-lg-7">

                <div class="border rounded-3 overflow-hidden">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0498396124403!2d106.82211897499403!3d-6.640733393353805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16b61e813%3A0x310408d1d32238c3!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer class="py-4"
        style="background:#101b31;color:white;">

    <div class="container text-center">

        © 2026 SMK Negeri 4 Bogor. All Rights Reserved.

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>