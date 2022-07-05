@extends('base')

@section('css')
@endsection
@section('meta')
    {!! SEO::generate(true) !!}
@endsection

@section('content')
    <!--=================================
                                                                                            Inner Header -->
    <div class="inner-header bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
                    <h1 class="breadcrumb-title mb-0">Kontak Kami</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active"><span>Kontak</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
                                                                                            Inner Header -->

    <!--=================================
                                                                                            Contact Address -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-8 pe-md-5 border-end border-md-none">
                    <iframe src="{{ Cache::get('tl')[0]->lokasi }}" style="border:0; width: 100%; height: 300px;"
                        allowfullscreen=""></iframe>
                </div>
                <div class="col-md-4 ps-md-5 mt-md-0 mt-4">
                    <h6 class="mb-4"><strong> Get in touch with us</strong></h6>
                    <p>With all the distractions in our lives? Willpower is a good start, but it’s very difficult to stay on
                        track simply through willpower.</p>
                    <hr class="my-4 my-lg-5">
                    <p class="mb-0">{{ Cache::get('tl')[0]->alamat }}</p>
                    <div><strong>Telephone:</strong><span class="text-primary ms-1">
                            {{ Cache::get('tl')[0]->no }}</span></div>
                    <div><strong>E-mail:</strong><span class="text-primary ms-1">{{ Cache::get('tl')[0]->email }} </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=================================
                                                                                            Contact Address -->
@endsection


@push('js')
@endpush
