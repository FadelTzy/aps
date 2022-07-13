@extends('indiro')

@section('css')
@endsection

@section('meta')
    {!! SEO::generate(true) !!}
@endsection

@section('body')
    <div class="page-content bg-white">

        <div class="main-slider3">
            <div class="swiper-container main-swiper3 banner-inner">

                <div class="swiper-wrapper">
                    @foreach ($banner as $item)
                    <div class="swiper-slide overlay-black-middle"
                    style="background-image: url({{ 'gambar/banner/' . $item->file }}); background-size: cover;">
                    <div class="banner-content container">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="title" data-swiper-parallax="-500">{{$item->judul}} </h1>
                                <p data-swiper-parallax="-1000">{{$item->isi}}
                                </p>
                                <div data-swiper-parallax="-1500">
                                    <a href="{{$item->url}}"
                                        class="btn btn-sm btn-primary btn-border btn-border-white m-r10 m-b10"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
           
                </div>
            </div>
            <div class="swiper-container slider-thumbs-wraper main-swiper-thumb3">
                <div class="swiper-wrapper">
                    @foreach ($banner as $i)
                    <div class="swiper-slide">
                        <div class="slider-thumbs">
                            <div class="dz-media">
                                <img src="{{asset('gambar/banner/') .'/' . $i->file}}" alt="{{$i->judul}}">
                            </div>
                            <div class="dz-info">
                                <h4 class="title">{{$i->judul}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
        <section class="content-inner-1" style="background-image:url('indiro/images/pattern/pattern1.jpg');">
            <div class="container">
                <div class="section-head text-center style-1">
                    <h5 class="text-primary sub-title">Our Services</h5>
                    <h2 class="title m-b20">PT. PUTRA AHMAD SEJAHTERA</h2>
                    <div class="i center style-5 m-b30">
                        <img class="logo-img" width="" src="indiro/images/logo/nps.png" alt="">

                    </div>
                </div>

            </div>
        </section>
        <section class="content-inner "
            style="background-image:url('indiro/images/background/bg5.jpg');background-size:cover;background-position:bottom;">
            <div class="container">
                <div class="row about-style8">
                    <div class="col-lg-6 m-b30 align-self-center aos-item aos-init aos-animate" data-aos="fade-up"
                        data-aos-duration="500" data-aos-delay="300">
                        <div class="about-content">
                            <div class="section-head style-1">
                                <h5 class="sub-title text-primary"></h5>
                                <h3 class="title m-b20">TENTANG KAMI</h3>
                                <p>{{$te->isi}} </p>
                            </div>
                            <a href="{{url('profil')}}" class="btn btn-primary btn-border m-r10 m-b10">Profil APS</a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b30">
                        <div class="dz-media">
                            <div class="split-box split-active">
                                <img src="indiro/images/about/about14.jpg" alt=""
                                    class="aos-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="400"
                                    data-aos-delay="400">
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-inner-2 overlay-black-dark"
            style="background-image:url('indiro/images/background/bg20.jpg');background-position:center;background-size:cover;">
            <div class="container-fluid p-0">
                <div class="section-head style-1 text-center">
                    <h5 class="sub-title text-primary">Management System & Business Consulting</h5>
                    <h2 class="title m-b20 text-white">LAYANAN KAMI
                    </h2>
                </div>
                <div
                    class="swiper-container service-slider-2 image-slider-wrapper swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                    <div class="swiper-wrapper" id="swiper-wrapper-78ba10ef33812ddd9" aria-live="off"
                        style="transform: translate3d(-1835px, 0px, 0px); transition-duration: 0ms;">
                     
                        <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" role="group"
                            aria-label="5 / 11" style="width: 367px;">
                            <div class="image-box">
                                <div class="dz-media">
                                    <img src="{{asset('konsulbu.jpeg')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3><a href="{{url('konsultasi')}}" class="text-white">Konsultan Manajemen</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" role="group"
                            aria-label="6 / 11" style="width: 367px;">
                            <div class="image-box">
                                <div class="dz-media">
                                    <img src="{{asset('latihanbu.jpg')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3><a href="{{url('pelatihan')}}" class="text-white">Pelatihan</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="3" role="group"
                        aria-label="6 / 11" style="width: 367px;">
                        <div class="image-box">
                            <div class="dz-media">
                                <img src="{{asset('sertibu.jpg')}}" alt="">
                            </div>
                            <div class="info">
                                <h3><a href="{{url('sertifikasi')}}" class="text-white">Sertifikasi Kompetensi</a></h3>
                            </div>
                        </div>
                    </div>
              
                    </div>
                    <div class="button-prev swiper-button-prev-service" tabindex="0" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-78ba10ef33812ddd9"><i
                            class="fa fa-angle-left"></i></div>
                    <div class="button-next swiper-button-next-service" tabindex="0" role="button"
                        aria-label="Next slide" aria-controls="swiper-wrapper-78ba10ef33812ddd9"><i
                            class="fa fa-angle-right"></i></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>

        </section>
        <section class="content-inner-1"
            style="background-image:url('indiro/images/background/bg9.jpg');background-size: cover;background-position: top;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 aos-item" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">
                        <div class="section-head style-1">
                            <h3 class="title m-b30">PELATIHAN</h3>
                            <div class="exp-row">
                                <h2 class="year counter">{{$tp}}</h2>
                                <p>TOTAL <span>KELAS</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="400"
                        data-aos-delay="400">
                        <h5 class="m-b30">Kami akan memberikan pelatihan-pelatihan bagi perusahaan, karyawan, perorangan, maupun mahasiswa yang bertujuan untuk meningkatkan kompetensi dan daya saing di dunia kerja. </h5>
                        <a href="{{url('pelatihan')}}" class="btn btn-primary btn-border btn-border m-r10 m-b10">Pelatihan</a>
                    </div>
                </div>

                <div class="swiper-container content-slider">
                    <div class="swiper-wrapper">
                        @foreach ($pelatihan as $item)
                        <div class="swiper-slide aos-item" data-aos="fade-up" data-aos-duration="400"
                        data-aos-delay="600">
                        <div class="content-box2 overlay-shine">
                            <div class="dz-info">
                                <h3 class="title">{{$item->judul}}</h3>
                                <p>{{$item->keterangan}} </p>
                            </div>
                            <div class="dz-media m-b30">
                                @if ($item->image == null)
                                <img src="{{asset('gambar/pelatihan') . '/' .'none.jpg'}}" alt="">

                                    @else
                                    <img src="{{asset('gambar/pelatihan') . '/' .$item->image}}" alt="">

                                @endif
                            </div>
                            <div class="dz-bottom">
                                <a href="{{url('pelatihan/').$item->slug}}" class="btn-link">Selengkapnya<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                 
                    
                    </div>
                    <div class="swiper-pagination-content m-t30 swiper-pagination text-center"></div>
                </div>
            </div>
        </section>

        <section class="content-inner-4 about-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="swiper-container about-main-slider about-swiper">

                            <h6 class="sub-title text-primary">Konsultan Manajemen</h6>
                            <h1 class="title m-b20 text-white">KONSULTASI</h1>
                            <h5 class="text-white">Kami akan memberikan bimbingan intensif sesuai dengan maksud dan tujuan organisasi sehingga memperoleh manfaat dan nilai tambah bagi organisasi dan karyawannya </h5>
                        </div>
                        <div class="swiper-container about-main-slider about-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($konsultasi as $item)
                                <div class="swiper-slide" data-title="{{$item->judul}}">
                                    <div class="section-head style-1">

                                        <p class="text-white" data-swiper-parallax="-1500"><a class="text-white text-bold" href="{{url('konsultasi/').'/' .$item->slug}}">{{$item->judul}}</a></p>
                                    </div>

                                </div>
                                @endforeach
                         
                            </div>


                        </div>
                        <a href="{{url('konsultasi')}}" data-swiper-parallax="-1000"
                            class="btn btn-primary btn-border-white btn-border m-r10 m-b10">Konsultasi</a>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination-about about-pagination"></div>
            <div class="swiper-container about-bg-slider bg-about-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="dz-media">
                            <img src="indiro/images/background/bg10.jpg" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="content-inner-1 bg-white aos-item" data-aos="fade-in" data-aos-duration="400"
            data-aos-delay="100">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h5 class="text-primary sub-title">Testimonials</h5>
                    <h2 class="title">What Our Clients Say!</h2>
                </div>
                <div class="swiper-container testimonial-swiper4 slider-btn-1">
                    <div class="swiper-wrapper">
                        @foreach ($testi as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-4">
                                <div class="testimonial-pic">
                                    <img src="{{asset('gambar/client/').'/'.$item->gambar}}" alt="">
                                </div>
                                <div class="testimonial-info">
                                    <div class="testimonial-text">
                                        <p>{{$item->pesan}}</p>
                                    </div>
                                    <h5 class="testimonial-name">{{$item->nama}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                     
                     
                    </div>
                    <div class="swiper-button">
                        <div class="button-prev swiper-button-prev4"><i class="fa fa-angle-left"></i></div>
                        <div class="button-next swiper-button-next4"><i class="fa fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-inner-1 overlay-black-middle" style="background-image:url('indiro/images/background/bg14.jpg');background-size:cover;background-position:center;">
			<div class="container">
				<div class="section-head style-1 text-center aos-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">
					<h3 class="title m-b20 text-white">Formulir Pendaftaran Pelatihan & Konsultan Manajemen</h3>
					<p class="text-white">Silahkan Mengisi Form Pendaftaran Pada Tombol Di Bawah Untuk Mendapatkan Informasi Tambahan Tentang Training Yang Diinginkan</p>
                    <br>
                    <a target="_blank" href=" {{ Cache::get('tl')[0]->linkregister }}" name="button"type="button" class="btn btn-primary btn-border-white btn-border m-r10 m-b10">Daftar Sekarang</a>

				</div>
	
			</div>
		</section>
        <section class="content-inner bg-white">
            <div class="container">
                <div class="section-head text-center style-1">
                    <h5 class="text-primary sub-title">Daftar</h5>
                    <h2 class="title">MITRA KERJA KAMI</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach ($mitra as $item)
                    <div class="col-lg-3 col-md-3 aos-item aos-init aos-animate" data-aos="fade-up"
                    data-aos-duration="400" data-aos-delay="100">
                    <div class="i center style-5 m-b30">
                        <a target="_blank" href="{{$item->jabatan}}">
                            <img class="logo-img" width="100%" src="{{asset('gambar/mitra/') .'/'.$item->gambar}}" alt="Gambar {{$item->nama}}">
                        </a>
                    </div>
                </div>     
                    @endforeach
         
                </div>

            </div>
        </section>
        <section class="content-inner bg-white">
            <div class="container">
                <div class="section-head text-center style-1">
                    <h5 class="text-primary sub-title">Daftar</h5>
                    <h2 class="title">CLIENT KAMI</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach ($client as $item)
                    <div class="col-lg-3 col-md-3 aos-item aos-init aos-animate" data-aos="fade-up"
                    data-aos-duration="400" data-aos-delay="100">
                    <div class="i center style-5 m-b30">
                        <img class="logo-img" width="100%" src="{{asset('gambar/clientlist/') .'/'.$item->gambar}}" alt="Gambar {{$item->nama}}">
                    </div>
                </div>     
                    @endforeach
         
                </div>

            </div>
        </section>
        <section class="content-inner">
			<div class="container">
				<div class="section-head text-center style-1">
					<h5 class="text-primary sub-title">Latest Blog</h5>
					<h2 class="title">LATEST ARTICLES UPDATED</h2>
				</div>
				<div class="row">
                    @foreach (Cache::get('bp') as $item)
                    <div class="col-lg-4 aos-item" data-aos="fade-up" data-aos-duration="200" data-aos-delay="100">
						<div class="dz-card style-3 overlay-shine ">
							<div class="dz-media">
								<a href="blog-details.html"><img src="{{asset('gambar/thumbnail') .'/' . $item->gambar}}" alt=""></a>
								<div class="dz-meta">
									<ul>
										<li class="post-date"><i class="far fa-calendar-alt"></i> {{$item->tanggal}}</li>
									</ul>
								</div>
							</div>
							<div class="dz-info">
								<h2 class="dz-title"><a href="{{url('berita').'/' . $item->slug}}">{{$item->judul}}.</a></h2>
							</div>
						</div>
					</div>
                    @endforeach
			
			
				</div>
				<div class="text-center m-b30">
					<a href="{{url('berita')}}" class="btn btn-primary btn-border m-r10 m-b10">Selengkapnya</a>
				</div>
			</div>
		</section>
        <section class="section-full dz-subscribe style-1">
            <div class="container">
                <div class="subscribe-inner row align-items-center">
                    <div class="col-lg-9 mb-lg-0 mb-4">
                        <div class="call-box3">
                            <i class="fas fa-phone icon"></i>
                            <h4 class="title">No: {{ Cache::get('tl')[0]->no }}, Email: {{ Cache::get('tl')[0]->email }}</h4>
                            <br>
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
@endpush
