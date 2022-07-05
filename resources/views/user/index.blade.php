@extends('base')

@section('css')
    <link rel="stylesheet" href="{{ asset('finaxo/css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('finaxo/css/swiper/swiper.min.css') }}" />
@endsection
@section('meta')
    {!! SEO::generate(true) !!}
@endsection

@section('content')
    <section class="slider-03">
        <div id="main-slider" class="swiper-container">
            <div class="swiper-wrapper">
                @php
                    $banner = DB::table('banners')
                        ->orderBy('nama', 'asc')
                        ->get();
                @endphp
                @foreach ($banner as $br)
                    <div class="swiper-slide slide-03"
                        style="background-image:linear-gradient(rgba(0, 0, 0, 0.527),rgba(0, 0, 0, 0.4)) , url(gambar/banner/{{ $br->file }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <div class="container h-100">
                            @if ($br->model == 1)
                            @else
                                <div
                                    class="row d-flex h-100 @if ($br->model == 2) justify-content-center @endif @if ($br->model == 3) justify-content-start @endif @if ($br->model == 4) justify-content-end @endif">
                                    <div
                                        class="col-lg-8 col-md-10 col-sm-12 @if ($br->model == 2) text-center @endif @if ($br->model == 3)  @endif @if ($br->model == 4) text-end @endif align-self-center">
                                        <div class="banner-content">
                                            <img class="img-fluid"
                                                data-swiper-animation="@if ($br->model == 2) zoomIn @endif @if ($br->model == 3) fadeInRight @endif @if ($br->model == 4) fadeInLeft @endif"
                                                data-duration="2.0s" data-delay="0.2s"
                                                src="{{ asset('finaxo/images/slider/home-03/03.png') }}" alt="#">
                                            <div class="content">
                                                <h6 class="text-white mb-0 lead fw-bold" data-swiper-animation="fadeInDown"
                                                    data-duration="2.0s" data-delay="0.4s">{{ $br->judul }}</h6>
                                                <h2 class="animated mb-0 text-white h1" data-swiper-animation="fadeInDown"
                                                    data-duration="2.0s" data-delay="0.6s">{{ $br->isi }}
                                                </h2>
                                                @if (filled($br->url))
                                                    <a class="animated btn btn-light mt-3" data-swiper-animation="fadeInUp"
                                                        data-duration="2.0s" data-delay="0.8s" href="{{ $br->url }}"><i
                                                            class="far fa-arrow-alt-circle-right"></i></a></a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i
                    class="fa fa-angle-left" aria-hidden="true"></i> </div>
            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="fa fa-angle-right"
                    aria-hidden="true"></i></div>

        </div>
    </section>
    <section class="py-lg-5 pt-md-0 position-relative">
        <div class="py-lg-5 pt-md-0 half-overlay left-position">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-lg-0 mb-4 position-relative">
                        <div class="row">
                            <div class="col-sm-5 mb-sm-0 mb-4">
                                <img class="img-fluid rounded pb-2"
                                    src="{{ asset('gambar/beranda/') . '/' . $tentang->foto2 }}""
                                                                                                                                                                                                                                                                                                                                                                            alt="
                                    logo">

                            </div>
                            <div class="col-sm-7">
                                <img class="img-fluid rounded"
                                    src="{{ asset('gambar/beranda/') . '/' . $tentang->foto1 }}" alt="logo">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-title">
                            <span class="pre-title">Tentang Kami </span>
                            <h2>{{ $tentang->judul }} </h2>
                        </div>
                        <p class="lead mb-4">{{ $tentang->isi }}</p>

                        <div class="row">
                            <div class="col-sm-6 mb-sm-0 mb-4">
                                <h6>{{ $tentang->nama }}</h6>

                                <img class="img-fluid rounded" src="{{ asset('gambar/beranda/') . '/' . $tentang->ttd }}"
                                    alt="logo">
                                <span class="text-primary"> Kepala LSP </span>

                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="space-ptb">
        <div class="container" style="background-image: url('finaxo/images/bg/pattern-01.png');">

            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="section-title">
                        <span class="pre-title"> </span>
                        <h2>Kebijakan Mutu</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6 mb-sm-0 mb-4">
                            <img class="img-fluid rounded" src="{{ asset('logo/lsp.png') }}" alt="logo">
                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-md-0 mb-4">
                    <div class="feature-info feature-info-style-1">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('finaxo/images/service/feature-icon/01.svg') }}"
                                alt="logo">
                        </div>
                        <div class="feature-info-content">
                            <h6 class="feature-info-title">Memberikan jaminan kualitas (quality insurance) dan jaminan
                                keselamatan (saffety insurance) dalam proses sertifikasi kompetensi kerja dari LSP-PPHI yang
                                independen sesuai pedoman BNSP.</h6>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-md-0 mb-4">
                    <div class="feature-info feature-info-style-1">
                        <div class="feature-info-icon">
                            <img class="img-fluid" src="{{ asset('finaxo/images/service/feature-icon/02.svg') }}"
                                alt="logo">
                        </div>
                        <div class="feature-info-content">
                            <h6 class="feature-info-title">Menjadikan LSP-PPHI berkualitas, komitmen dan konsisten
                                terhadap moral, ramah, berintegritas dan professional serta taat hukum.</h6>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="section-title">
                        <span class="pre-title">We're Good At </span>
                        <h2>Skema Sertifikasi </h2>
                    </div>
                    <a class="btn btn-outline-primary" href="{{ url('skema') }}">Daftar Skema</a>
                </div>

                @foreach ($skema as $is => $i)
                    <div
                        class="col-md-6 col-lg-4 @if ($is != 4) mb-4 mb-sm-5 @endif   @if ($is == 2) mb-lg-0 @endif @if ($is == 3) mb-md-0 @endif">
                        <div class="feature-info feature-info-style-2 h-100">
                            <div class="feature-info-icon">
                                <i class="flaticon-team"></i>
                            </div>
                            <div class="feature-info-content">
                                <h6 class="feature-info-title">{{ $i->judul }}</h6>

                                <div class="d-grid">
                                    <a href="{{ url('skema/') . '/' . $i->id }}" class="btn btn-primary">Detail
                                        Skema</a>
                                </div>
                            </div>
                            <div class="feature-info-bg" style="background-image: url('finaxo/images/service/01.jpg');">
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <section class="case-study-section mb-5">
        <div class="space-ptb bg-holder bg-primary" style="background-image: url('finaxo/images/bg/pattern-01.png');">
            <div class="container">
                <div class="section-title text-center pb-5 pb-lg-3">
                    <span class="pre-title text-white">Berita</span>
                    <h2 class="text-white">Berita Terbaru</h2>
                </div>
            </div>
        </div>
        <div class="case-study mt-n6">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    @foreach ($berita as $ib => $i)
                        <div class="col-sm-12 col-lg-4 mb-lg-0 mb-4">
                            <div class="case-study-item">
                                <div class="case-study-img">
                                    <img style="height: 250px" class="img-fluid"
                                        src="{{ asset('gambar/thumbnail/') . '/' . $i->gambar }}" alt="">
                                    <a href="{{ url('berita/') . '/' . $i->slug }}"><i
                                            class="far fa-arrow-alt-circle-right"></i></a>
                                </div>
                                <div class="case-study-info">
                                    <div style="display: flex; justify-content: space-between;color:#30b666">
                                        <a class="case-study-category" href="#">{{ $i->kategori->nama }} </a>
                                        <span class=" case-study-category">{{ $i->tanggal }}</span>
                                    </div>
                                    <h6 class="case-study-title"><a
                                            href="{{ url('berita/slug') }}">{{ $i->judul }}</a></h6>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <section class="space-pb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel our-clients" data-nav-arrow="false" data-items="6" data-md-items="5"
                        data-sm-items="4" data-xs-items="3" data-xx-items="1" data-space="30" data-autoheight="true"
                        data-autospeed="4000">
                        @foreach ($link as $item)
                            <div class="item">
                                <a href="{{ $item->meta }}"><img class="img-fluid p-3"
                                        src="{{ asset('/gambar/link') . '/' . $item->gambar }}"
                                        alt="{{ $item->nama }}"></a>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
    <script src="{{ asset('finaxo/js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('finaxo/js/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('finaxo/js/swiperanimation/SwiperAnimation.min.js') }}"></script>
@endpush
