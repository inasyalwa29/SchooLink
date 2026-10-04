<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rating & Komentar - Admin SMK Negeri 4 Bogor</title>


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


    <!-- Dashboard CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-dashboard.css') }}"
    >


    <!-- Sidebar CSS -->

    <link
        rel="stylesheet"
        href="{{ asset('css/admin-sidebar.css') }}"
    >


    <style>

        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .top-header {
            min-height: 76px;
            padding: 0 35px;

            display: flex;
            align-items: center;
        }


        .top-header .page-title {

            margin: 0;

            font-size: 25px;
            line-height: 1.3;
            font-weight: 700;

        }



        /* =====================================================
           CONTENT
        ===================================================== */

        .review-content {

            width: 100%;

        }



        /* =====================================================
           CONTENT HEADING
        ===================================================== */

        .content-heading {

            margin-bottom: 25px;

        }


        .content-heading h2 {

            margin-bottom: 7px;

        }


        .content-heading p {

            margin: 0;
            color: #6b7280;

        }



        /* =====================================================
           SUCCESS ALERT
        ===================================================== */

        .review-alert {

            width: 100%;

            background: #eaf8ef;

            border: 1px solid #b7e4c7;

            color: #246b3c;

            border-radius: 10px;

            padding: 13px 18px;

            margin-bottom: 22px;

            font-size: 14px;

            font-weight: 500;

        }



        /* =====================================================
           REVIEW CARD
        ===================================================== */

        .review-card {

            background: #ffffff;

            border-radius: 14px;

            padding: 25px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.06);

            overflow-x: auto;

        }



        /* =====================================================
           TABLE
        ===================================================== */

        .review-table {

            width: 100%;

            border-collapse: collapse;

            min-width: 850px;

        }


        .review-table th {

            background: #1233b5;

            color: #ffffff;

            padding: 14px;

            text-align: left;

            font-size: 14px;

            white-space: nowrap;

        }


        .review-table td {

            padding: 15px 14px;

            border-bottom: 1px solid #e5e7eb;

            vertical-align: top;

            font-size: 14px;

        }


        .review-table tbody tr:hover td {

            background: #f8faff;

        }



        /* =====================================================
           NAMA
        ===================================================== */

        .review-nama {

            font-weight: 700;

            color: #111827;

        }



        /* =====================================================
           RATING
        ===================================================== */

        .review-rating {

            color: #f5b301;

            font-size: 18px;

            white-space: nowrap;

        }



        /* =====================================================
           KOMENTAR
        ===================================================== */

        .review-komentar {

            max-width: 400px;

            line-height: 1.6;

            color: #4b5563;

        }



        /* =====================================================
           TANGGAL
        ===================================================== */

        .review-tanggal {

            color: #6b7280;

            font-size: 13px;

            white-space: nowrap;

        }



        /* =====================================================
           STATUS
        ===================================================== */

        .review-status {

            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 700;

            white-space: nowrap;

        }


        .review-status-approved {

            background: #d1fae5;

            color: #065f46;

        }


        .review-status-pending {

            background: #fef3c7;

            color: #92400e;

        }


        .review-status-lainnya {

            background: #e5e7eb;

            color: #374151;

        }



        /* =====================================================
           ACTION BUTTON
        ===================================================== */

        .review-actions {

            display: flex;

            gap: 7px;

            align-items: center;

            flex-wrap: wrap;

        }


        .review-actions form {

            margin: 0;

        }


        .approve-button {

            border: none;

            background: #16a34a;

            color: #ffffff;

            padding: 9px 14px;

            border-radius: 7px;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s ease;

        }


        .approve-button:hover {

            background: #15803d;

        }


        .delete-button {

            border: none;

            background: #dc2626;

            color: #ffffff;

            padding: 9px 14px;

            border-radius: 7px;

            cursor: pointer;

            font-size: 13px;

            transition: 0.2s ease;

        }


        .delete-button:hover {

            background: #b91c1c;

        }



        /* =====================================================
           EMPTY
        ===================================================== */

        .review-empty {

            text-align: center;

            padding: 55px 20px;

            color: #6b7280;

        }


        .review-empty-icon {

            font-size: 45px;

            margin-bottom: 15px;

        }


        .review-empty h3 {

            margin-bottom: 8px;

            color: #374151;

        }


        .review-empty p {

            margin: 0;

        }



        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 768px) {

            .top-header {

                padding: 0 20px;

            }


            .top-header .page-title {

                font-size: 23px;

            }

        }


        @media (max-width: 480px) {

            .top-header {

                padding: 0 15px;

            }


            .top-header .page-title {

                font-size: 20px;

            }


            .review-card {

                padding: 15px;

            }

        }

    </style>

</head>


<body>


    {{-- =====================================================
         SIDEBAR
         SAMA SEPERTI DASHBOARD
    ====================================================== --}}

    @include('admin.layouts.sidebar')



    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <main class="main-content">


        {{-- =================================================
             NAVBAR / HEADER
        ================================================== --}}

        <header class="top-header">

            <h1 class="page-title">

                Rating & Komentar

            </h1>

        </header>



        {{-- =================================================
             CONTENT AREA
        ================================================== --}}

        <div class="content-area">


            <div class="review-content">


                {{-- =================================================
                     JUDUL HALAMAN
                ================================================== --}}

                <div class="content-heading">

                    <h2>
                        Rating & Komentar
                    </h2>

                    <p>
                        Kelola rating dan komentar yang diberikan
                        oleh pengunjung website SMK Negeri 4 Bogor.
                    </p>

                </div>



                {{-- =================================================
                     SUCCESS NOTIFICATION
                ================================================== --}}

                @if(session('success'))

                    <div class="review-alert">

                        <i class="fa-solid fa-circle-check"></i>

                        &nbsp;

                        {{ session('success') }}

                    </div>

                @endif



                {{-- =================================================
                     REVIEW CARD
                ================================================== --}}

                <section class="review-card">


                    @if($reviews->count() > 0)


                        <table class="review-table">


                            <thead>

                                <tr>

                                    <th>
                                        No
                                    </th>

                                    <th>
                                        Nama
                                    </th>

                                    <th>
                                        Rating
                                    </th>

                                    <th>
                                        Komentar
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Tanggal
                                    </th>

                                    <th>
                                        Aksi
                                    </th>

                                </tr>

                            </thead>



                            <tbody>


                                @foreach($reviews as $review)


                                    <tr>


                                        {{-- NO --}}

                                        <td>

                                            {{ $loop->iteration }}

                                        </td>



                                        {{-- NAMA --}}

                                        <td>

                                            <div class="review-nama">

                                                {{ $review->nama }}

                                            </div>

                                        </td>



                                        {{-- RATING --}}

                                        <td>

                                            <div class="review-rating">


                                                @for($i = 1; $i <= 5; $i++)


                                                    @if($i <= $review->rating)

                                                        ★

                                                    @else

                                                        ☆

                                                    @endif


                                                @endfor


                                            </div>

                                        </td>



                                        {{-- KOMENTAR --}}

                                        <td>

                                            <div class="review-komentar">

                                                {{ $review->komentar }}

                                            </div>

                                        </td>



                                        {{-- STATUS --}}

                                        <td>


                                            @if($review->status === 'approved')


                                                <span
                                                    class="review-status review-status-approved"
                                                >

                                                    Disetujui

                                                </span>


                                            @elseif($review->status === 'pending')


                                                <span
                                                    class="review-status review-status-pending"
                                                >

                                                    Menunggu

                                                </span>


                                            @else


                                                <span
                                                    class="review-status review-status-lainnya"
                                                >

                                                    {{ $review->status }}

                                                </span>


                                            @endif


                                        </td>



                                        {{-- TANGGAL --}}

                                        <td>

                                            <div class="review-tanggal">

                                                {{ $review->created_at?->format('d M Y H:i') }}

                                            </div>

                                        </td>



                                        {{-- AKSI --}}

                                        <td>


                                            <div class="review-actions">


                                                {{-- SETUJUI --}}

                                                @if($review->status === 'pending')


                                                    <form
                                                        action="{{ route('admin.review.approve', $review->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf

                                                        @method('PATCH')


                                                        <button
                                                            type="submit"
                                                            class="approve-button"
                                                        >

                                                            <i class="fa-solid fa-check"></i>

                                                            Setujui

                                                        </button>

                                                    </form>


                                                @endif



                                                {{-- HAPUS --}}

                                                <form
                                                    action="{{ route('admin.review.destroy', $review->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus rating dan komentar ini?');"
                                                >

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        class="delete-button"
                                                    >

                                                        <i class="fa-solid fa-trash"></i>

                                                        Hapus

                                                    </button>

                                                </form>


                                            </div>


                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>


                        </table>


                    @else


                        {{-- =================================================
                             EMPTY STATE
                        ================================================== --}}

                        <div class="review-empty">


                            <div class="review-empty-icon">

                                <i class="fa-regular fa-comments"></i>

                            </div>


                            <h3>

                                Belum ada rating dan komentar

                            </h3>


                            <p>

                                Rating dan komentar dari pengunjung
                                akan muncul di sini.

                            </p>


                        </div>


                    @endif


                </section>


            </div>


        </div>


    </main>



    {{-- =====================================================
         BOOTSTRAP JS
    ====================================================== --}}

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>