<header class="site-header mo-left header style-3">

    <div class="top-bar">
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center">
                <div class="dz-topbar-center">
                    <p class="help-text"><strong>Need Help ?</strong>Email : {{ Cache::get('tl')[0]->email }} , Call :
                        {{ Cache::get('tl')[0]->no }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix ">
            <div class="container-fluid clearfix">
                <!-- Website Logo -->
                <div class="logo-header mostion logo-white">
                    <a href="index.html"><img src="{{ asset('indiro/images/logo/nps.png') }}" alt=""></a>
                </div>
                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- Extra Nav -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        <div class="search-inhead">
                            <div class="dz-quik-search On">
                                <form action="#">
                                    <input name="search" value="" type="text" class="form-control"
                                        placeholder="Search">
                                    <span id="quik-search-remove"><i class="ti-close"></i></span>
                                </form>
                            </div>
                            <a class="search-link" id="quik-search-btn" href="javascript:void(0);">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <a href="javascript:void(0);"
                            class="btn btn-secondary d-xl-inline-block d-none btn-border btn-border-secondary m-r10 m-b10">DAFTAR
                            SEKARANG</a>
                    </div>
                </div>
                <!-- Extra Nav -->

                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <div class="logo-header logo-dark">
                        <a href="index.html"><img src="{{ asset('indiro/images/logo.png') }}" alt=""></a>
                    </div>
                    <ul class="nav navbar-nav navbar navbar-left">
                        <li><a href="{{ url('/') }}"><span>Beranda</span></a>

                        </li>
                        <li class="sub-menu-down"><a href="javascript:void(0);"><span>Tentang Kami</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('/tentang-kami/profil') }}">Profil Perusahaan</a></li>
                                <li><a href="index.html">Visi & Misi</a></li>
                                <li><a href="index-2.html">Profil Tenaga Ahli</a></li>
                                <li><a href="index-3.html">Relasi / Mitra Kerja</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu-down"><a href="javascript:void(0);"><span>Pelatihan</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('pelatihan') }}">Pelatihan A</a></li>
                                <li><a href="blog-large-right-sidebar.html">Pelatihan B</a></li>
                                <li><a href="blog-list-sidebar.html">Pelatihan C</a></li>
                                <li><a href="blog-list-left-sidebar.html">Pelatihan D</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu-down"><a href="javascript:void(0);"><span>Konsultasi</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('konsultasi') }}">Konsultasi A</a></li>
                                <li><a href="blog-large-right-sidebar.html">Konsultasi B</a></li>
                                <li><a href="blog-list-sidebar.html">Konsultasi C</a></li>
                                <li><a href="blog-list-left-sidebar.html">Konsultasi D</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('berita') }}"><span>Berita</span></a>

                        <li><a href="#"><span>E - Dokumen</span></a>

                        <li><a href="{{ url('kontak') }}"><span>Kontak</span></a>

                    </ul>
                    <div class="dz-social-icon">
                        <ul>
                            <li><a class="fab fa-facebook-f" href="https://www.facebook.com/"></a></li>
                            <li><a class="fab fa-twitter" href="https://twitter.com/?lang=en"></a></li>
                            <li><a class="fab fa-linkedin-in" href="https://www.linkedin.com/"></a></li>
                            <li><a class="fab fa-instagram" href="https://www.instagram.com/?hl=en"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->
</header>
