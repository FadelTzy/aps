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
                    <h1 class="breadcrumb-title mb-0">Formulir Registrasi LSP PPHI</h1>
                </div>
                <div class="col-sm-3">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="{{ url('formulir') }}">Download Formulir</a></li>
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
                        <div class="blog-post-image">

                            <div class="blog-post-content">

                                <div class="blog-post-details">
                                    @php $no = 1; @endphp
                                    <div class="d-sm-flex bg-light border-radius  mb-md-5 mb-4">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Formulir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($skema as $t)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td> <a class="text-dark"
                                                                href="{{ url('skema/') . '/' . $t->slug }}">{{ $t->judul }}</a>
                                                        </td>
                                                        <td><a type="button" href="{{ $t->registrasi ?? '#' }}"
                                                                class="btn btn-sm btn-success">Unduh <i
                                                                    class="fa fa-arrow-circle-down"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="blog-post-footer d-flex flex-wrap align-items-center mt-5">
                                    <div class="social-info ms-auto mt-2 mt-sm-0">
                                        <a href="#"><i class="fas fa-share-alt me-2"></i>Share</a>
                                        <ul class="social-share">
                                            <li><a
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">
                                                    <i class="fab fa-facebook-f"></i></a></li>
                                            <li><a
                                                    href="https://twitter.com/intent/tweet?text={{ Str::replace(' ', '+', 'Formulir Registrasi') }}&url={{ url()->current() }}"><i
                                                        class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://wa.me/?text={{ url()->current() }}"><i
                                                        class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 my-sm-5">

                        </div>
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
                            <h6 class="mb-3">Kategori Berita</h6>
                            <ul class="list-unstyled mb-0">

                                @foreach ($kategori as $item)
                                    <li class="d-flex align-items-center mb-2">
                                        <i class="fa fa-arrow-right text-primary me-2"></i><a
                                            href="{{ url('berita') . '?k=' . $item->id }}"
                                            class="text-dark me-auto">{{ $item->nama }}</a>
                                    </li>
                                @endforeach
                            </ul>
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
                                            <a class="text-dark" href="#"><b>{{ $b->judul }}</b></a>
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
    </section>
@endsection


@push('js')
@endpush
