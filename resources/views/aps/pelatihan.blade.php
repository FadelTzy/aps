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
                    <h1>Pelatihan</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelatihan</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <section class="content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4">
                        <aside class="side-bar sticky-top left">
                            <div class="widget style-1">
                                <div class="widget-title">
                                    <h4 class="title">Search</h4>
                                </div>
                                <div class="search-bx">
                                    <form role="search">
                                        <div class="input-group">
                                            <input name="cari" class="form-control" placeholder="Search Here..."
                                                type="text">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary sharp radius-no"><i
                                                        class="fa fa-search scale3"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="widget style-1 widget_categories">
                                <div class="widget-title">
                                    <h4 class="title">Kategori Pelatihan</h4>
                                </div>
                                <ul>
                                    @foreach ($kater as $item)
                                        
                                    <li class="cat-item"><a href="{{ url('pelatihan') .'?kategori=' . $item->id }}">{{$item->judul}}</a></li>
                                    @endforeach
                               
                                </ul>
                            </div>




                        </aside>
                    </div>
                    <div class="col-xl-8 col-lg-8 m-b40">
                        @if ($berita->count() == 0)
                        <div style="height: 300px" class="text-center ">
                            <h6 class="">Postingan tidak tersedia, silahkan cari dengan keyword yang
                                berbeda.
                            </h6>
                        </div>
                    @endif
                        @foreach ($berita as $item)
                        <div class="dz-card style-1 blog-half shadow m-b30">
                            <div class="dz-media">
                                <a href="blog-details.html">
                                    @if ($item->image == null)
                                    <img src="{{asset('gambar/pelatihan/none.jpg')}}" alt="">
                                    @else
                                    <img src="{{asset('gambar/pelatihan/') . '/' . $item->image }}" alt="">

                                    @endif
                                </a>
                            </div>
                            <div class="dz-info">
                                <div class="dz-meta">
                                    <ul>
                                        <li class="post-date">{{$item->kategori->judul}}</li>
                                    </ul>
                                </div>
                                <h3 class="dz-title"><a href="{{url('pelatihan') . '/' . $item->slug}}">{{$item->judul}}</a></h3>
                         <p>{{$item->keterangan}}</p>

                            </div>
                        </div>
                        @endforeach
                  
              
                    
                        <nav aria-label="Blog Pagination">
                            {{ $berita->links('vendor.pagination.bootstrap-4') }}

                        </nav>
                    </div>
                </div>
            </div>
        </section>


        <!-- Subscribe -->
        <section class="section-full dz-subscribe style-1">
            <div class="container">
                <div class="subscribe-inner row align-items-center">
                    <div class="col-lg-9 mb-lg-0 mb-4">
                        <div class="call-box3">
                            <i class="fas fa-phone icon"></i>
                            <h4 class="title">123 45 789 Email : andimuhfadel@gmail.com</h4>
                            <span class="text-white">Senin - Jumat : 09:00 Am - 12:00 PM</span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <form class="dzSubscribe" action="script/mailchamp.php" method="post">
                            <div class="form-group">
                                <div class="input-group">

                                    <button name="submit" value="Submit" type="submit" class="btn btn-success">Kirim
                                        Pesan WA <i class="fa fa-phone"></i></button>
                                </div>
                            </div>
                        </form>
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
