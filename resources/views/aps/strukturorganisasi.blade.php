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
                    <h1>Kontak</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->

        <section class="content-inner-1">
            <div class="container">
                <div class="section-head style-1 text-center aos-item aos-init aos-animate" data-aos="fade-up"
                    data-aos-duration="800" data-aos-delay="200">
                    <h6 class="sub-title text-primary">Anggota Kami</h6>
                    <h2 class="title m-b20">Struktur Organisasi</h2>
                </div>
                <div class="team-swiper-1 btn-center-lr">
					<div class="swiper-container team-slider">
						<div class="swiper-wrapper">
                            @foreach ($data as $item)
                            <div class="swiper-slide">
								<div class="dz-team style-1 text-center m-b10 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
									<div class="dz-media">
                                        @if ($item->foto == null)
                                        <img src="{{asset('gambar/foto') .'/' . 'user.png'}}" alt="">
@else
<img src="{{asset('gambar/foto') .'/' . $item->foto}}" alt="">
                                        @endif
										<ul class="team-social">
                                          <li>  <h6 class="dz-position text-primary">{{$item->email}}</h6>
                                          </li>
										</ul>
									</div>
									<div class="dz-content">
										<h3 class="dz-name">{{$item->nama}}</h3>
										<h6 class="dz-position text-primary">{{$item->jabatan}}</h6>
									</div>
								</div>
							</div>  
                            @endforeach
						
					
						</div>
					</div>
					<div class="swiper-button">
						<div class="btn-prev swiper-button-prev-team"><i class="las la-angle-left"></i></div>
						<div class="btn-next swiper-button-next-team"><i class="las la-angle-right"></i></div>
					</div>
				</div>
            </div>
        </section>






    </div>
@endsection

@push('js')
@endpush
