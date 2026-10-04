{{-- resources/views/partials/navbar.blade.php --}}
{{-- Navbar bersama untuk semua halaman publik. Pakai: @include('partials.navbar') --}}

<nav class="navbar navbar-expand-lg site-navbar sticky-top">

    <div class="container-fluid">

        <!-- LOGO + NAMA SEKOLAH -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('beranda') }}">

            <img
                src="{{ asset('images/logo sekolah.jpg') }}"
                width="45"
                height="45"
                class="rounded-circle me-2"
                alt="Logo SMK Negeri 4 Bogor"
            >

            <div>
                <strong class="d-block">SMK Negeri 4 Bogor</strong>
                <small>NEBRAZKA</small>
            </div>

        </a>

        <!-- TOGGLE MOBILE -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarUtama"
            aria-controls="navbarUtama"
            aria-expanded="false"
            aria-label="Buka navigasi"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarUtama">

            <div class="navbar-nav ms-auto">

                <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                   href="{{ route('beranda') }}">Beranda</a>

                <a class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}"
                   href="{{ route('profil') }}">Profil</a>

                <a class="nav-link {{ request()->routeIs('program.keahlian') ? 'active' : '' }}"
                   href="{{ route('program.keahlian') }}">Program Keahlian</a>

                <a class="nav-link {{ request()->routeIs('kontak') ? 'active' : '' }}"
                   href="{{ route('kontak') }}">Kontak</a>

                <a class="nav-link {{ request()->routeIs('berita.public') ? 'active' : '' }}"
                   href="{{ route('berita.public') }}">Berita</a>

            </div>

        </div>

    </div>

</nav>