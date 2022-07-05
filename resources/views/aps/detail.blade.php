@extends('indiro')

@section('css')
@endsection

@section('meta')
    {!! SEO::generate(true) !!}
@endsection
@section('body')
    <div class="page-content bg-white">

        <!-- Banner  -->
        <div class="dz-bnr-inr dz-bnr-inr-sm my-paroller overlay-black-middle text-center" id="my-element"
            data-paroller-factor="-0.5" data-paroller-direction="horizontal"
            style="background-image: url({{ asset('gambar/thumbnail/') . '/' . $data->gambar }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>{{ $data->judul }}</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item">Berita</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->kategori->nama }}</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <section class="content-inner">
            <div class="min-container">
                <div class="row">
                    <div class="col-xl-12 m-b40">
                        <div class="dz-card style-1 blog-single">
                            <div class="dz-media">
                                <img src="{{ asset('indiro/images/blog/large/pic1.jpg') }}" alt="">
                            </div>
                            <div class="dz-info">
                                <div class="dz-meta">
                                    <ul>
                                        <li class="post-date"><i class="fa fa-calendar"></i> {{ $data->tanggal }}</li>
                                        <li class="post-author"><a href="javascript:void(0);"><i class="fa fa-user"></i> By
                                                Admin APS</a></li>
                                        <li class="post-author"><a
                                                href="{{ url('berita') . '?kategori=' . $data->kategori->id }}"><i
                                                    class="fa fa-user"></i>
                                                {{ $data->kategori->nama }}</a></li>
                                    </ul>
                                </div>
                                <h2 class="dz-title">{{ $data->judul }}
                                </h2>
                                <div style="text-align: justify">
                                    <p class="m-b40 text-justify"> {!! $data->deskripsi !!}
                                    </p>
                                </div>
                            </div>
                            <div class="dz-share-post">
                                <div class="dz-social-icon">
                                    <h6 class="title">Share:</h6>
                                    <ul>
                                        <li><a class="fab fa-facebook-f"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"></a>
                                        </li>
                                        <li><a class="fab fa-twitter"
                                                href="https://twitter.com/intent/tweet?text={{ Str::replace(' ', '+', $data->judul) }}&url={{ url()->current() }}"></a>
                                        </li>
                                        <li><a class="fab fa-whatsapp"
                                                href="https://wa.me/?text={{ url()->current() }}"></a></li>
                                    </ul>
                                </div>
                                <div class="post-tags">
                                    <a href="javascript:void(0);"> {{ $data->meta }}
                                    </a>

                                </div>
                            </div>
                            <div class="widget-title">
                                <h4 class="title">
                                    Berita Terbaru </h4>
                            </div>
                            <div class="row extra-blog style-1">
                                @foreach ($bt as $b)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="dz-card blog-grid style-1 shadow m-sm-b30">
                                            <div class="dz-media ">
                                                <img width="555" height="400"
                                                    src="{{ asset('gambar/thumbnail/') . '/' . $b->gambar }}"
                                                    class="attachment-indiro_555x400 size-indiro_555x400 wp-post-image"
                                                    alt="" loading="lazy">
                                            </div>
                                            <div class="dz-info">
                                                <div class="dz-meta">
                                                    <ul>
                                                        <li class="post-date">
                                                            <span>
                                                                {{ $b->tanggal }} </span>
                                                        </li>
                                                        <li class="post-author">
                                                            <a href="#">
                                                                By
                                                                <strong>
                                                                    ADMIN APS
                                                                </strong>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <h5 class="dz-title p-2">
                                                    <a href="{{ url('berita/') . '/' . $b->slug }}">
                                                        {{ $b->judul }} </a>
                                                </h5>

                                                <a href="{{ url('berita/') . '/' . $b->slug }}"
                                                    class="btn btn-primary btnstyle1 ">READ MORE</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach




                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

@push('js')
@endpush
