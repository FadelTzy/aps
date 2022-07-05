@extends('indiro')

@section('css')
@endsection

@section('meta')
    {!! SEO::generate(true) !!}
@endsection


@section('body')
    <div class="page-content bg-white">

        <!-- Banner  -->
        <div class="dz-bnr-inr dz-bnr-inr-sm overlay-black-middle text-center"
            style="background-image: url(indiro/images/bnr/bnr1.jpg);">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Kontak</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <section class="content-inner-2 pt-0">
            <div class="map-iframe">
                <iframe src="{{ $data->lokasi }}" style="border:0; width:100%; min-height:100%; margin-bottom: -8px;"
                    allowfullscreen></iframe>
            </div>
        </section>
        <section>
            <div class="container-fluid p-0">
                <div class="row about-bx2 spno">
                    <div class="col-lg-6">
                        <div class="dz-media">
                            <img src="https://indiro.dexignzone.com/wp/demo/wp-content/uploads/2021/12/about34.jpg"
                                alt="Image">
                            <div class="info">
                                <h4 class="name">
                                    {{ $data->nama }} </h4>

                                <p>
                                    Kunjungi Sosial Media Kami </p>

                                <div class="dz-social-icon">
                                    <ul>
                                        <li><a target="_blank" href="{{ $data->facebook }}"
                                                class=" fab fa-facebook-f"></a>
                                        </li>
                                        <li><a target="_blank" href="{{ $data->twitte }}" class=" fab fa-twitter"></a>
                                        </li>
                                        <li><a target="_blank" href="{{ $data->wa }}" class=" fab fa-whatsapp"></a></li>
                                        <li><a target="_blank" href="{{ $data->ig }}" class=" fab fa-instagram"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="dz-info">
                            <div class="section-head">
                                <h2>
                                    Kontak Kami </h2>


                            </div>

                            <div class="section-head  style-1">
                                <h3 class="title ">Get In Touch</h3>
                            </div>
                            <ul class="no-margin">
                                <li class="icon-bx-wraper  left m-b30">
                                    <div class="icon-md">
                                        <span class="icon-cell">
                                            <i class="flaticon-placeholder-1"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class=" dz-tilte ">Alamat Kami</h4>
                                        <p class="font-18">{{ $data->alamat }}
                                        </p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper  left m-b30">
                                    <div class="icon-md">
                                        <span class="icon-cell">
                                            <i class="flaticon-placeholder-1"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class=" dz-tilte ">Nomor</h4>
                                        <p class="font-18">{{ $data->no }}
                                        </p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper  left m-b30">
                                    <div class="icon-md">
                                        <span class="icon-cell">
                                            <i class="flaticon-message"></i>
                                        </span>
                                    </div>
                                    <div class="icon-content">
                                        <h4 class="dz-tilte ">Email Kami</h4>
                                        <p class="font-18"><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="f891969e97b89f95999194">{{ $data->email }}</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </section>






    </div>
@endsection

@push('js')
@endpush
