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
                    <h1>Relasi / Mitra Kerja APS</h1>
                    <!-- Breadcrumb Row -->
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Relasi / Mitra Kerja APS</li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb Row End -->
                </div>
            </div>
        </div>
        <!-- Banner End -->
        <section class="content-inner">
			<div class="container">
           
                <div class="section-head style-1 text-center aos-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
					<h6 class="sub-title text-primary">Our Experts</h6>
					<h2 class="title m-b20">Relasi &amp; Mitra Kerja</h2>
				</div>
				<div class="row">
                    @foreach ($data as $item)
                    <div class="col-lg-4 col-md-6">
						<div class="dz-team style-1 text-center m-b30">
							<div class="dz-media">
								<img src="{{asset('gambar/mitra') .'/' . $item->gambar}}" alt="">
							</div>
							<div class="dz-content">
								<h4 class="dz-name"> <a href="{{$item->jabatan}}"> {{$item->nama}} </a></h4>
							</div>
						</div>
					</div>  
                    @endforeach
		
				</div>
  
			</div>
		</section>

    </div>
@endsection

@push('js')
@endpush
