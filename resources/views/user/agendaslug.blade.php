@extends('base')

@section('css')
@endsection

@section('meta')
    {!! SEO::generate(true) !!}
@endsection
@section('content')
    <div class="inner-header bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-9 text-center text-sm-start mb-2 mb-sm-0">
                    <h1 class="breadcrumb-title mb-0">{{ $data->judul }}</h1>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('agenda') }}"><i
                                    class="fas fa-home me-1"></i>Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('agenda') }}">Agenda</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-1">
                    <div class="blog-post blog-details">

                        <div class="blog-post-content">
                            <h1 class="breadcrumb-title">Agenda LSP PPHI
                            </h1>
                            <div class="blog-post-info">
                                <div class="blog-post-author">
                                    <a href="#" class="btn btn-link"><i
                                            class="far fa-folder-open"></i>{{ $data->lokasi }}</a>
                                </div>
                                <div class="blog-post-date"><a href="#"><i
                                            class="far fa-calendar"></i>{{ $data->tanggal }}
                                    </a>
                                </div>
                                <div class="blog-post-date"><a href="#"><i
                                            class="far fa-calendar"></i>{{ $data->status == 1 ? 'Luring' : 'During' }}
                                    </a>
                                </div>
                            </div>
                            <div class="blog-post-details">
                                {!! $data->deskripsi !!}
                            </div>
                            <div class="blog-post-footer d-flex flex-wrap align-items-center mt-5">
                                <div class="social-info ms-auto mt-2 mt-sm-0">
                                    <a href="#"><i class="fas fa-share-alt me-2"></i>Share</a>
                                    <ul class="social-share">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">
                                                <i class="fab fa-facebook-f"></i></a></li>
                                        <li><a
                                                href="https://twitter.com/intent/tweet?text={{ Str::replace(' ', '+', $data->judul) }}&url={{ url()->current() }}"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://wa.me/?text={{ url()->current() }}"><i
                                                    class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mt-sm-5">
                            <nav class="navigation post-navigation">
                                <div class="nav-links">
                                    <div class="nav-previous">
                                        @if (filled($previous))
                                            <a href="{{ url('agenda/') . '/' . $previous->id }}"><span
                                                    class="pagi-text"> PREV</span><span
                                                    class="nav-title">{{ $previous->judul }}</span></a>
                                        @endif
                                    </div>
                                    <div class="nav-next">
                                        @if (filled($next))
                                            <a href="{{ url('agenda/') . '/' . $next->id }}"><span
                                                    class="nav-title">{{ $next->judul }}</span> <span
                                                    class="pagi-text">NEXT</span></a>
                                        @endif

                                    </div>
                                </div>
                            </nav>
                        </div>

                        <hr class="my-4 my-sm-5">

                    </div>
                </div>
                <div class="col-lg-3 mt-lg-0 mt-4 mt-sm-5 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="widget">
                            <h6 class="mb-3">Pencarian </h6>
                            <form action="{{ url('berita') }}" class="form-inline input-with-btn">
                                <div class="mb-3">
                                    <input type="text" name="q" class="form-control form-control-sm"
                                        placeholder="Cari berita..">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <div class="widget">
                            <h6 class="mb-3">Berita Terbaru </h6>
                            <div class="row">
                                @foreach ($bt as $b)
                                    <div class="col-12 d-flex mb-3">
                                        <div class="recent-post-img avatar avatar-lg me-3">
                                            <img class="img-fluid"
                                                src="{{ asset('gambar/thumbnail/') . '/' . $b->gambar }}" alt="">
                                        </div>
                                        <div class="recent-post-info">
                                            <small class="d-block">{{ $b->tanggal }}</small>
                                            <a class="text-dark"
                                                href="{{ url('berita') . '/' . $b->slug }}"><b>{{ $b->judul }}</b></a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>


                        <div class="widget mb-0">
                            <div class=" me-3">
                                <img style="width: 75%" class="img-fluid" src="{{ asset('logo/lsp.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
@endpush
