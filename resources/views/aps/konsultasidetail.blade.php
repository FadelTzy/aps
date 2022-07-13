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
            style="background-image: url({{ asset('gambar/konsultasi/') . '/' . $data->image }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>{{ $data->judul }}</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Konsultasi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $data->judul }}</li>
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
                    <div class="col-xl-8 col-lg-8 m-b40">
                        <div class="dz-card style-1 blog-single">

                            <div class="dz-info">

                                <ul class="nav nav-tabs style-1 m-b30">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="javascript:void(0);" data-bs-toggle="tab"
                                            data-bs-target="#oneTab1">Deskripsi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tab"
                                            data-bs-target="#oneTab2">Paket Konsultasi</a>
                                    </li>
                                 
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="oneTab1">
                                        <h2 class="dz-title"> Deskripsi
                                        </h2>
                                        {!! $data->deskripsi !!}
                                        <h2 class="dz-title"> Manfaat
                                        </h2>
                                        {!! $data->manfaat !!}

                                    </div>
                                    <div class="tab-pane fade" id="oneTab2">
                                        <h2 class="dz-title"> Materi
                                        </h2>
                                        {!! $data->paket !!}
                                    </div>
                                 
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
                                    <a href="javascript:void(0);">{{ $data->keterangan }}</a>

                                </div>
                            </div>
                        </div>
                        <h2 class="dz-title"> Konsultasi Terkait
                        </h2>
                        <br>
                        <ul id="masonry" class="row blog-masonry" style="position: relative; ">
                            @foreach ($bt as $item)
                            <li class="card-container grid-item col-xl-6 col-md-6"
                            style="">
                            <div class="dz-card style-1 shadow m-b30">
                                <div class="dz-media">
                                    <a href="{{url('konsultasi') . '/' . $item->slug}}">
                                        @if ($data->image == null)
                                        <img src="{{asset('gambar/konsultasi') .'/' . 'none.jpg'}}"
                                        alt="">
                                        @else
                                        <img src="{{asset('gambar/konsultasi') .'/' . $data->image}}"
                                            alt="">
                                        @endif
                                        </a>
                                </div>
                                <div class="dz-info">
                                  
                                    <h4 class="dz-title"><a href="{{url('konsultasi') . '/' . $item->slug}}">{{$item->judul}}</a></h4>
                                    <p>{{$item->keterangan}}</p>
                                </div>
                            </div>
                        </li>
                            @endforeach
                           
                        
                      
                        </ul>
                        <!-- Author Profile -->



                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <aside class="side-bar sticky-top right">
                            <div class="widget style-1">
                                <div class="widget-title">
                                    <h4 class="title">Informasi konsultasi</h4>
                                </div>
                                @if ($data->image == null)
                                    <img style="width: 100%" src="{{ asset('gambar/konsultasi/') . '/' . 'none.jpg' }}"
                                        alt="">
                                @else
                                    <img style="width: 100%" src="{{ asset('gambar/konsultasi/') . '/' . $data->image }}"
                                        alt="">
                                @endif
                                <ul class="list-check-circle black">
                                    <li>Jl. Perintis Kemerdekaan KM.9 Tamalanrea Indah</li>
                                    <li>lsppphi@gmailxo.com
                                        Mon-Fri 8:30am-6:30pm</li>
                                    <li>085399463149
                                        24 X 7 online support
                                    </li>

                                </ul>
                                <div class="mt-4 text-center"><a href="javascript:void(0);"
                                        class="btn btn-primary btn-border m-r10 m-b10">Daftar</a><a
                                        href="{{$data->file}}" class="btn btn-primary btn-border m-r10 m-b10">File</a>
                                </div>
                            </div>
                            <div class="widget style-1">
                                <div class="widget-title">
                                    <h4 class="title">Search</h4>
                                </div>
                                <div class="search-bx">
                                    <form action="{{url('konsultasi')}}" role="search">
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







                        </aside>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

@push('js')
<script src="{{ asset('indiro/vendor/imagesloaded/imagesloaded.js') }}"></script>

@endpush
