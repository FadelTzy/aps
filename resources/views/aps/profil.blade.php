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
                    <h1>Profil APS</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil APS</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->
        <div class="section-full content-inner bg-white">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-7 col-sm-12 inner-text">
                        <h2 class="title">Profil</h2>
                    {!!$data->tentang!!}
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 m-b30">
                        <aside class="side-bar sticky-top right">

                            <div class="service_menu_nav widget style-1">
                                <ul class="menu">
                                    <li class="menu-item active"><a href="{{url('profil')}}">Profill APS</a></li>
                                    <li class="menu-item"><a href="{{url('visi-misi')}}">Visi & Misi</a></li>
                                    <li class="menu-item "><a href="{{url('landasan-hukum')}}">Landasan Hukum</a></li>
                                    <li class="menu-item"><a href="{{url('ruang-lingkup')}}">Ruang Lingkup</a></li>
                                    <li class="menu-item"><a href="{{url('legalitas')}}">Legalitas</a></li>
                                    <li class="menu-item"><a href="{{url('struktur-organisasi')}}">Struktur Organisasi</a></li>

                                </ul>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
@endpush
