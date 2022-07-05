@extends('base')

@section('css')
    <link rel="stylesheet" href="{{ asset('finaxo/css/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('finaxo/css/swiper/swiper.min.css') }}" />
@endsection
@section('meta')
    {!! SEO::generate(true) !!}
@endsection

@section('content')
    <div class="inner-header bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
                    <h1 class="breadcrumb-title mb-0">Profil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active"><span>Profil</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="" style="margin-top: 15px; margin-bottom: 20px">
        <div class="container">
            <div class="row d-flex align-content-center flex-wrap">

                <div class="col-md-12 align-self-center ps-3 ps-lg-12">
                    <div class="row">
                        <div class="col-md-5 col-lg-4 col-xl-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-who-we-are-tab" data-bs-toggle="pill"
                                    href="#v-pills-who-we-are" role="tab" aria-controls="v-pills-who-we-are"
                                    aria-selected="true">LSP PPHI</a>
                                <a class="nav-link" id="v-pills-our-vision-tab" data-bs-toggle="pill"
                                    href="#v-pills-our-vision" role="tab" aria-controls="v-pills-our-vision"
                                    aria-selected="false">Visi</a>
                                <a class="nav-link" id="v-pills-our-mission-tab" data-bs-toggle="pill"
                                    href="#v-pills-our-mission" role="tab" aria-controls="v-pills-our-mission"
                                    aria-selected="false">Misi</a>
                                <a class="nav-link" id="v-pills-our-history-tab" data-bs-toggle="pill"
                                    href="#v-pills-our-history" role="tab" aria-controls="v-pills-our-history"
                                    aria-selected="false">Kebijakan Mutu</a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8 col-xl-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-who-we-are" role="tabpanel"
                                    aria-labelledby="v-pills-who-we-are-tab">
                                    <div class="row">
                                        <h6 class="mb-3">Tentang LSP PPHI</h6>
                                        {!! $profil->tentang !!}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-our-vision" role="tabpanel"
                                    aria-labelledby="v-pills-our-vision-tab">
                                    <h6 class="mb-3">Visi</h6>
                                    {!! $profil->visi !!}


                                </div>
                                <div class="tab-pane fade" id="v-pills-our-mission" role="tabpanel"
                                    aria-labelledby="v-pills-our-mission-tab">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <h6 class="mb-3">Misi </h6>
                                            {!! $profil->misi !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-our-history" role="tabpanel"
                                    aria-labelledby="v-pills-our-history-tab">
                                    <h6 class="mb-3">Kebijakan Mutu</h6>
                                    {!! $profil->mutu !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <span class="pre-title">List of people</span>
                        <h2>Meet Our Team</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel team owl-nav-bottom-center" data-nav-dots="false" data-nav-arrow="true"
                        data-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-xx-items="1"
                        data-space="30" data-autoheight="true">
                        <div class="item">
                            <div class="team team-style-2">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('finaxo/images/team/01.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-title">Michael Bean</h6>
                                    <span class="team-designation">Marketing Expert</span>
                                    <a class="btn-link" href="#">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team team-style-2">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('finaxo/images/team/02.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-title">Mellissa Doe</h6>
                                    <span class="team-designation">Sales and Marketing</span>
                                    <a class="btn-link" href="#">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team team-style-2">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('finaxo/images/team/05.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-title">Alice Williams</h6>
                                    <span class="team-designation">Marketing Expert</span>
                                    <a class="btn-link" href="#">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team team-style-2">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('finaxo/images/team/03.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-title">Paul Flavius</h6>
                                    <span class="team-designation">Tax Consultant</span>
                                    <a class="btn-link" href="#">View Profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="team team-style-2">
                                <div class="team-img">
                                    <img class="img-fluid" src="{{ asset('finaxo/images/team/05.jpg') }}" alt="">
                                </div>
                                <div class="team-info">
                                    <h6 class="team-title">Alice Williams</h6>
                                    <span class="team-designation">Marketing Expert</span>
                                    <a class="btn-link" href="#">View Profile</a>
                                </div>
                            </div>
                        </div>
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
