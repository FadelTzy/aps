<!--=================================
    Header -->
<header class="header header-sticky default">
    <div class="topbar">
        <div class="container">
            <div class="topbar-inner">
                <div class="row">
                    <div class="col-12">
                        <div class="d-block d-md-flex align-items-center text-center">
                            <div class="me-3 d-inline-block">
                                <a href="mailto:info@example.com"><i
                                        class="fas fa-envelope me-2 fa-flip-horizontal"></i>{{ Cache::get('tl')[0]->email }}</a>
                            </div>
                            <div class="me-auto d-inline-block">
                                <a href="#"><i
                                        class="fa fa-phone me-2 fa fa-flip-horizontal"></i>{{ Cache::get('tl')[0]->no }}</a>
                            </div>
                            <div class="social d-inline-block">
                                <ul class="list-unstyled">
                                    <li><a href="{{ Cache::get('tl')[0]->facebook }}"> <i
                                                class="fab fa-facebook-f"></i>
                                        </a></li>
                                    <li><a href="{{ Cache::get('tl')[0]->twitter }}"> <i class="fab fa-twitter"></i>
                                        </a></li>
                                    <li><a href="{{ Cache::get('tl')[0]->wa }}"> <i class="fab fa-whatsapp"></i>
                                        </a></li>
                                    <li><a href="{{ Cache::get('tl')[0]->ig }}"> <i class="fab fa-instagram"></i>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-static-top navbar-expand-xl">
        <div class="container position-relative">
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse"><i
                    class="fas fa-align-left"></i></button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-fluid" src="{{ asset('logo/lsp.png') }}" alt="logo">
            </a>
            <div class="navbar-collapse collapse justify-content-end justify-content-xl-center">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown @if (Request::segment(1) == '') active @endif">
                        <a class="nav-link" href="{{ url('/') }}" id="navbarDropdown"
                            role="button">Beranda</a>

                    </li>
                    <li class="dropdown nav-item @if (Request::segment(1) == 'profil') active @endif">
                        <a class="nav-link" href="{{ url('profil') }}">Profil</a>

                    </li>
                    @php
                        $value = Cache::remember('skemas', 30, function () {
                            return DB::table('skemas')
                                ->select('id', 'judul')
                                ->get();
                        });
                    @endphp
                    <li class="dropdown nav-item @if (Request::segment(1) == 'skema') active @endif">
                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Daftar Skema<i
                                class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach (Cache::get('skemas') as $item)
                                <li><a class="dropdown-item"
                                        href="{{ url('skema/') . '/' . $item->id }}"><span>{{ $item->judul }}</span></a>
                                </li>
                            @endforeach


                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Informasi<i
                                class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('tuk') }}"><span>Tempat Uji Kompetensi
                                        (TUK)</span></a></li>
                            <li><a class="dropdown-item" href="{{ url('pengumuman') }}"><span>Pengumuman
                                    </span></a></li>
                            <li><a class="dropdown-item" href="{{ url('prosedur-uji-kompetensi') }}"><span>Prosedur
                                        Uji Kompetensi
                                    </span></a></li>
                            <li><a class="dropdown-item" href="{{ url('agenda') }}"><span>Agenda
                                    </span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item  @if (Request::segment(1) == 'berita') active @endif">
                        <a class="nav-link" href="{{ asset('berita') }}">Berita</a>
                    </li>
                    <li class="dropdown nav-item @if (Request::segment(1) == 'kontak') active @endif">
                        <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Download<i
                                class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('formulir') }}"><span>Formulir Registrasi
                                        (TUK)</span></a></li>
                            <li><a class="dropdown-item" href="{{ url('skkni') }}"><span>SKKNI
                                    </span></a></li>

                        </ul>
                    </li>
                    <li class="dropdown nav-item header-search">
                        <div class="search">
                            <a class="search-btn not_click" href="javascript:void(0);"></a>
                            <div class="search-box not-click">
                                <form action="https://themes.potenzaglobalsolutions.com/html/finaxo/search.html"
                                    method="get">
                                    <input type="text" class="not-click form-control" name="search"
                                        placeholder="Search.." autofocus>
                                    <button class="search-button" type="submit"> <i
                                            class="fa fa-search not-click"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <a class="btn btn-primary btn-md me-5 me-xl-0 d-none d-sm-block"
                href="{{ Cache::get('tl')[0]->linkregister }}"> DAFTAR SEKARANG </a>
        </div>
    </nav>
</header>
<!--=================================
    Header -->
