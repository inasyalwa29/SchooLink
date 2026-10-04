{{-- SIDEBAR ADMIN SMKN 4 BOGOR --}}

<aside class="admin-sidebar" id="adminSidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">

        <div class="brand-logo">
            <img
                src="{{ asset('images/logo sekolah.jpg') }}"
                alt="Logo SMKN 4 Bogor"
            >
        </div>

        <div class="brand-text">
            <h2>SMKN 4 BOGOR</h2>
            <span>ADMINISTRATOR</span>
        </div>

        {{-- TOGGLE SIDEBAR --}}
        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            aria-label="Tutup sidebar"
            title="Tutup sidebar"
        >
            <i class="fa-solid fa-chevron-left"></i>
        </button>

    </div>


    {{-- SIDEBAR CONTENT --}}
    <div class="sidebar-content">

        {{-- MENU UTAMA --}}
        <div class="sidebar-section">

            <div class="sidebar-section-title">
                MENU UTAMA
            </div>


            {{-- DASHBOARD --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                data-tooltip="Dashboard"
            >

                <span class="sidebar-icon">
                    <i class="fa-solid fa-chart-pie"></i>
                </span>

                <span class="sidebar-link-text">
                    Dashboard
                </span>

            </a>


            {{-- PROFIL SEKOLAH --}}
            <a
                href="{{ route('admin.profil.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}"
                data-tooltip="Profil Sekolah"
            >

                <span class="sidebar-icon">
                    <i class="fa-solid fa-school"></i>
                </span>

                <span class="sidebar-link-text">
                    Profil Sekolah
                </span>

            </a>


            {{-- GALERI --}}
            <a
                href="{{ route('admin.galeri.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"
                data-tooltip="Galeri"
            >

                <span class="sidebar-icon">
                    <i class="fa-solid fa-images"></i>
                </span>

                <span class="sidebar-link-text">
                    Galeri
                </span>

            </a>


            {{-- BERITA --}}
            <a
                href="{{ route('admin.berita.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"
                data-tooltip="Berita"
            >

                <span class="sidebar-icon">
                    <i class="fa-solid fa-newspaper"></i>
                </span>

                <span class="sidebar-link-text">
                    Berita
                </span>

            </a>

        </div>


        {{-- PENGELOLAAN --}}
        <div class="sidebar-section">

            <div class="sidebar-section-title">
                PENGELOLAAN
            </div>


            {{-- PENGGUNA --}}
            @if(auth()->check() && auth()->user()->role === 'super_admin')

                <a
                    href="{{ route('admin.pengguna.index') }}"
                    class="sidebar-link {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}"
                    data-tooltip="Pengguna"
                >

                    <span class="sidebar-icon">
                        <i class="fa-solid fa-users"></i>
                    </span>

                    <span class="sidebar-link-text">
                        Pengguna
                    </span>

                </a>

            @endif


            {{-- RATING & KOMENTAR --}}
            <a
                href="{{ route('admin.review.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.review.*') ? 'active' : '' }}"
                data-tooltip="Rating & Komentar"
            >

                <span class="sidebar-icon">
                    <i class="fa-solid fa-comments"></i>
                </span>

                <span class="sidebar-link-text">
                    Rating & Komentar
                </span>

            </a>

        </div>

    </div>


    {{-- SIDEBAR BOTTOM --}}
    <div class="sidebar-bottom">

        {{-- LOGOUT --}}
        <button
            type="button"
            class="sidebar-logout"
            data-tooltip="Keluar"
            data-bs-toggle="modal"
            data-bs-target="#logoutModal"
        >

            <i class="fa-solid fa-arrow-right-from-bracket"></i>

            <span>
                Keluar
            </span>

        </button>

    </div>

</aside>


{{-- =========================================================
     MODAL LOGOUT
========================================================= --}}

<div
    class="modal fade"
    id="logoutModal"
    tabindex="-1"
    aria-labelledby="logoutModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content logout-modal">

            {{-- HEADER --}}
            <div class="modal-header">

                <div>

                    <h5
                        class="modal-title"
                        id="logoutModalLabel"
                    >
                        Konfirmasi Keluar
                    </h5>

                    <p class="logout-subtitle">
                        Masukkan kata sandi untuk melanjutkan.
                    </p>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Tutup"
                ></button>

            </div>


            {{-- BODY --}}
            <div class="modal-body">

                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                    id="logoutForm"
                >

                    @csrf


                    <div class="logout-form-group">

                        <label for="logoutPassword">
                            Kata Sandi
                        </label>


                        <div class="logout-password-wrapper">

                            <i class="fa-solid fa-lock logout-lock"></i>


                            <input
                                type="password"
                                name="password"
                                id="logoutPassword"
                                class="logout-password-input"
                                placeholder="Masukkan kata sandi"
                                autocomplete="current-password"
                            >


                            <button
                                type="button"
                                class="logout-password-toggle"
                                onclick="toggleLogoutPassword()"
                                aria-label="Tampilkan password"
                            >

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>


                        {{-- ERROR PASSWORD --}}
                        @if ($errors->has('password'))

                            <div class="logout-error">

                                <i class="fa-solid fa-circle-exclamation"></i>

                                <span>
                                    {{ $errors->first('password') }}
                                </span>

                            </div>

                        @endif

                    </div>


                    {{-- FOOTER BUTTON --}}
                    <div class="logout-modal-footer">

                        <button
                            type="button"
                            class="btn-logout-cancel"
                            data-bs-dismiss="modal"
                        >
                            Batal
                        </button>


                        <button
                            type="submit"
                            class="btn-logout-confirm"
                        >

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Keluar

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     LOGOUT SCRIPT
========================================================= --}}

<script>

function toggleLogoutPassword()
{
    const password =
        document.getElementById('logoutPassword');

    const button =
        document.querySelector(
            '#logoutModal .logout-password-toggle'
        );

    if (!password || !button) {
        return;
    }


    const icon =
        button.querySelector('i');


    if (password.type === 'password') {

        password.type = 'text';

        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');

        button.setAttribute(
            'aria-label',
            'Sembunyikan password'
        );

    } else {

        password.type = 'password';

        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');

        button.setAttribute(
            'aria-label',
            'Tampilkan password'
        );

    }
}



{{-- =========================================================
     AUTO OPEN MODAL JIKA PASSWORD SALAH / KOSONG
========================================================= --}}

document.addEventListener(
    'DOMContentLoaded',
    function ()
    {

        @if ($errors->has('password') || session('logout_modal'))

            const logoutModalElement =
                document.getElementById('logoutModal');


            if (logoutModalElement) {

                const logoutModal =
                    new bootstrap.Modal(
                        logoutModalElement
                    );

                logoutModal.show();

            }

        @endif

    }
);



{{-- =========================================================
     SIDEBAR COLLAPSE SCRIPT
========================================================= --}}

document.addEventListener(
    'DOMContentLoaded',
    function ()
    {

        const sidebar =
            document.getElementById('adminSidebar');

        const toggleButton =
            document.getElementById('sidebarToggle');


        if (!sidebar || !toggleButton) {
            return;
        }


        const savedState =
            localStorage.getItem('smkn4_sidebar');


        if (savedState === 'collapsed') {

            document.body.classList.add(
                'sidebar-collapsed'
            );

        }


        toggleButton.addEventListener(
            'click',
            function ()
            {

                document.body.classList.toggle(
                    'sidebar-collapsed'
                );


                const isCollapsed =
                    document.body.classList.contains(
                        'sidebar-collapsed'
                    );


                localStorage.setItem(
                    'smkn4_sidebar',
                    isCollapsed
                        ? 'collapsed'
                        : 'expanded'
                );


                updateToggleButton(
                    isCollapsed
                );

            }
        );



        function updateToggleButton(
            isCollapsed
        )
        {

            const icon =
                toggleButton.querySelector('i');


            if (!icon) {
                return;
            }


            if (isCollapsed) {

                icon.classList.remove(
                    'fa-chevron-left'
                );

                icon.classList.add(
                    'fa-chevron-right'
                );


                toggleButton.setAttribute(
                    'aria-label',
                    'Buka sidebar'
                );

                toggleButton.setAttribute(
                    'title',
                    'Buka sidebar'
                );


            } else {

                icon.classList.remove(
                    'fa-chevron-right'
                );

                icon.classList.add(
                    'fa-chevron-left'
                );


                toggleButton.setAttribute(
                    'aria-label',
                    'Tutup sidebar'
                );

                toggleButton.setAttribute(
                    'title',
                    'Tutup sidebar'
                );

            }

        }


        updateToggleButton(
            document.body.classList.contains(
                'sidebar-collapsed'
            )
        );

    }
);

</script>