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
                    <h1>Konsultasi</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Konsultasi</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <section class="content-inner">
            <div class="container">
                <div class="clearfix">
                    <div class="row sort-space">

                  
                        <div class="col-lg-2 col-md-2 ">

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="ft-row m-b0">
                                <form action="">
                                    <div class="input-group">
                                        <input name="cari" required="required" type="text" placeholder="Konsultasi"
                                            class="form-control form-control-sm">
                                        <button type="submit" class="btn btn-sm"><i
                                                class="fas fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    @if ($berita->count() == 0)
                        <div style="height: 300px" class="text-center ">
                            <h6 class="">Postingan tidak tersedia, silahkan cari dengan keyword yang
                                berbeda.
                            </h6>
                        </div>
                    @endif
                    <ul id="masonry" class="row blog-masonry">
                        @foreach ($berita as $b)
                            <li class="card-container grid-item col-xl-4 col-md-6">
                                <div class="dz-card style-1 shadow m-b30">
                                    <div class="dz-media">
                                        <a href="{{ url('konsultasi/') . '/' . $b->slug }}">
                                            @if ($b->image == null)
                                            <img
                                            src="{{ asset('gambar/konsultasi/') . '/' . 'konsul.png' }}"
                                            alt="">
                                                @else
                                                <img
                                                src="{{ asset('gambar/konsultasi/') . '/' . $b->image }}"
                                                alt="">
                                            @endif
                                         </a>
                                    </div>
                                    <div class="dz-info">
                                        <div class="dz-meta">
                                            <ul>
                                                <li class="post-date">{{ $b->tanggal }} </li>
\
                                            </ul>
                                        </div>
                                        <h4 class="dz-title"><a
                                                href="{{ url('konsultasi/') . '/' . $b->slug }}">{{ $b->judul }}</a></h4>
                                            <p>{{$b->keterangan}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center m-b30 d-flex justify-content-center">
                        {{ $berita->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('js')
    <script src="{{ asset('indiro/vendor/imagesloaded/imagesloaded.js') }}"></script>
    <script>
        $("#pilkar").change(function() {
            $("#formpilkan").submit();
        })
    </script>
@endpush
