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
                                <form action="{{url('berita')}}" id="beritasearch" action="#">
                                    <input name="cari" value="" type="text" class="form-control"
                                        placeholder="Search">
                                    <span id="quik-search-remove"><i class="ti-close"></i></span>
                                </form>
                            </div>
                            <a class="search-link" id="quik-search-btn" onclick="dejavu()" href="javascript:void(0);">
                                <i class="fas fa-search"></i>
                            </a>
                        </div>
                        <a href=" {{ Cache::get('tl')[0]->linkregister }}"
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
                                <li><a href="{{ url('/profil') }}">Profil Perusahaan</a></li>
                                <li><a href="{{url('visi-misi')}}">Visi & Misi</a></li>
                                <li><a href="{{url('tenaga-ahli')}}">Profil Tenaga Ahli</a></li>
                                <li><a href="{{url('mitra-kerja')}}">Relasi / Mitra Kerja</a></li>
                                <li><a href="{{url('client-aps')}}">Client APS</a></li>

                            </ul>
                        </li>

                        <li class="sub-menu-down"><a href="{{ url('pelatihan')}}"><span>Pelatihan</span></a>
                            <ul class="sub-menu">
                                @foreach (Cache::get('mp') as $item)
                                    <li><a href="{{ url('pelatihan').'?kategori=' . $item->id }}">{{$item->judul}}
                                    </a></li>
                                @endforeach
                              

                            </ul>
                        </li>
                        <li class="sub-menu-down"><a href="{{ url('konsultasi')}}"><span>Konsultasi</span></a>
                            <ul class="sub-menu">
                                @foreach (Cache::get('kl') as $item)
                                <li><a href="{{ url('konsultasi').'/' . $item->slug }}">{{$item->judul}}
                                </a></li>
                            @endforeach
                               
                            </ul>
                        </li>
                        <li class="sub-menu-down"><a href="{{ url('sertifikasi')}}"><span>Sertifikasi</span></a>
                            <ul class="sub-menu">
                                @foreach (Cache::get('sr') as $item)
                                <li><a href="{{ url('sertifikasi').'/' . $item->slug }}">{{$item->judul}}
                                </a></li>
                            @endforeach
                               
                            </ul>
                        </li>
                        <li><a href="{{ url('berita') }}"><span>Berita</span></a></li>

                        <li class="sub-menu-down"><a href="#"><span>E - Dokumen</span></a>
                            <ul class="sub-menu">
                                @foreach (Cache::get('edok') as $item)
                                <li><a target="_blank" href="{{  url($item->meta) }}">{{$item->judul}}
                                </a></li>
                            @endforeach
                               
                            </ul>
                        </li>                        <li><a href="{{ url('kontak') }}"><span>Kontak</span></a></li>

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
