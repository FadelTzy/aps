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
                    <h1>Berita</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
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

                        <div class="col-lg-5 col-md-5 col-sm-12 ">
                            <form action="" id="formpilkan">
                                <select name="kategori" class="form-select" id="pilkar"
                                    aria-label="Default select example">
                                    <option selected disabled>Pilih Kategori Berita</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 ">

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="ft-row m-b0">
                                <form action="">
                                    <div class="input-group">
                                        <input name="cari" required="required" type="text" placeholder="Cari Berita"
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
                                        <a href="blog-details.html"><img
                                                src="{{ asset('gambar/thumbnail/') . '/' . $b->gambar }}"
                                                alt=""></a>
                                    </div>
                                    <div class="dz-info">
                                        <div class="dz-meta">
                                            <ul>
                                                <li class="post-date">{{ $b->tanggal }} </li>
                                                <li class="post-date bg-primary">{{ $b->kategori->nama }} </li>

                                            </ul>
                                        </div>
                                        <h4 class="dz-title"><a
                                                href="{{ url('berita/') . '/' . $b->slug }}">{{ $b->judul }}</a></h4>

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
