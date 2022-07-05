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
                <div class="col-sm-6 text-center text-sm-start mb-2 mb-sm-0">
                    <h1 class="breadcrumb-title mb-0">

                        Agenda
                    </h1>
                    @if (Request::has('q'))
                        <span>Pencarian :
                            @if (Request::has('q'))
                                keyword {{ Request::get('q') }}
                            @endif
                        </span>
                    @endif

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb d-flex justify-content-center justify-content-sm-end ms-auto">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active"><span>Agenda</span></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section style="margin-top:15px " class=" case-study">
        <div class="container">
            <div style="margin-bottom: 20px" class="row bg-light rounded mt-1 mb-4 mb-md-1 p-2">
                <div class="justify-content-between" style="display: flex;">
                    <div class="col-sm-6 col-lg-3 text-white mb-3 mb-lg-0">

                    </div>

                    <div class="col-sm-6 col-lg-3 ">
                        <div class="widget">
                            <form class="form-inline input-with-btn">
                                <div>
                                    <input type="text" name="q" class="form-control form-control-sm" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 60px" class="row">
                @if ($berita->count() == 0)
                    <div style="height: 300px" class="text-center ">
                        <h6 class="case-study-title">Postingan tidak tersedia, silahkan cari dengan keyword yang berbeda.
                        </h6>
                    </div>
                @endif
                @foreach ($berita as $b)
                    <div class="col-lg-4 col-sm-6 pb-2 mb-4">
                        <div class="case-study-item">

                            <div style="padding-top:20px" class="case-study-info">
                                <div style="display: flex; justify-content: space-between;color:#30b666">
                                    <a class="case-study-category" href="#">{{ $b->lokasi }} </a>
                                    <span class=" case-study-category">{{ $b->tanggal }}</span>
                                </div>
                                <h6 class="case-study-title"><a
                                        href="{{ url('agenda/') . '/' . $b->id }}">{{ $b->judul }}</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach





            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $berita->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection


@push('js')
    <script>
        $("#pilihk").on('change', function(id) {
            $("#formk").trigger('submit');
        })
    </script>
@endpush
