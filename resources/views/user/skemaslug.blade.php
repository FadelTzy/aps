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
                <div class="col-sm-6 text-center text-sm-start mb-1 mb-sm-0">
                    <h1 class="breadcrumb-title mb-0">{{ $skema->judul }}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ url('skema') }}">Skema</a></li>
                        <li class="breadcrumb-item active"><span>{{ $skema->judul }} </span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="" style="margin-top: 15px;margin-bottom:20px">
        <div class="container">
            <div class="row">
                @if ($skema->status == 1)
                    <div class="col-lg-9 order-1 order-lg-1">
                        <div class="blog-post blog-details">

                            <div class="blog-post-content">
                                <h4 class="">Detail Skema</h4>
                                <h6>Kode Skema : </h6>
                                <p>{{ $skema->kd_skema }}</p>
                                <h6>Judul Skema : </h6>
                                <p>{{ $skema->judul }}</p>
                                <h6>Ringkasan Skema : </h6>
                                <div class="blog-post-details">

                                    {!! $skema->ringkasan !!}

                                </div>
                                <h6>Syarat Skema : </h6>
                                <div class="blog-post-details">

                                    {!! $skema->syarat !!}

                                </div>
                                <h6>Daftar Unit Kompetensi : </h6>
                                @php
                                    $tu = DB::table('unit_kompetensis')
                                        ->where('id_skema', $skema->id)
                                        ->get();
                                    $no = 1;
                                @endphp
                                <div class="d-sm-flex bg-light border-radius  mb-md-5 mb-4">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode Unit</th>
                                                <th scope="col">Judul Unit Kompetensi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tu as $t)
                                                <tr>
                                                    <th scope="row">{{ $no++ }}</th>
                                                    <td>{{ $t->kd_unit }}</td>
                                                    <td>{{ $t->judul }}</td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <div class="blog-post-footer d-flex flex-wrap align-items-center mt-5">

                                    <div class="social-info ms-auto mt-2 mt-sm-0">
                                        <a href="#"><i class="fas fa-share-alt me-2"></i>Share</a>
                                        <ul class="social-share">
                                            <li><a
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}">
                                                    <i class="fab fa-facebook-f"></i></a></li>
                                            <li><a
                                                    href="https://twitter.com/intent/tweet?text={{ Str::replace(' ', '+', $skema->judul) }}&url={{ url()->current() }}"><i
                                                        class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://wa.me/?text={{ url()->current() }}"><i
                                                        class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col-lg-3 mt-lg-0 mt-4 mt-sm-5 order-2 order-lg-1">
                        <div class="blog-sidebar">
                            <div class="widget">
                                <h6 class="mb-3">Pendaftaran </h6>

                                <a type="button" href="{{ $skema->registrasi ?? '#' }}"
                                    class=" input-with-btn btn btn-sm btn-primary"> Daftar Skema <i
                                        class="fa fa-file"></i></a>
                                <a type="button" download target="_blank"
                                    href="{{ asset('gambar/skkni/') . '/' . $skema->skkni ?? '-' }}"
                                    class=" input-with-btn btn btn-sm btn-primary"> SKKNI <i class="fa fa-file"></i></a>
                            </div>
                            <div class="widget">
                                <h6 class="mb-3">Kontak Kami </h6>
                                <div class="row">
                                    <div class="col-12 d-flex mb-3">
                                        <div class="text-primary me-3">
                                            <i class="fas fa-2x fa-map-signs"></i>
                                        </div>
                                        <div class="recent-post-info">
                                            <span>Jl. Perintis Kemerdekaan KM.9 Tamalanrea Indah</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex mb-3">
                                        <div class="text-primary me-3">
                                            <i class="far fa-2x fa-envelope"></i>
                                        </div>
                                        <div class="recent-post-info">
                                            <span>lsppphi@gmailxo.com<br> Mon-Fri 8:30am-6:30pm</span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex">
                                        <div class="text-primary me-3">
                                            <i class="fas fa-2x fa-headphones-alt"></i>
                                        </div>
                                        <div class="recent-post-info">
                                            <span>085399463149<br> 24 X 7 online support</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget mb-0">
                                <div class=" me-3">
                                    <img style="width: 75%" class="img-fluid" src="{{ asset('logo/lsp.png') }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!--=================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Classic Left Sidebar -->
@endsection


@push('js')
@endpush
