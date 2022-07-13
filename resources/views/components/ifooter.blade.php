   <!-- Footer -->
   <footer class="site-footer style-3 bg-secondary" id="footer">
       <div class="footer-top">
           <div class="container">
               <div class="row">
                   <div class="col-xl-4 col-lg-4 col-sm-8 aos-item" data-aos="fade-up" data-aos-duration="400"
                       data-aos-delay="100">
                       <div class="widget widget_about">
                           <div class="footer-logo logo-white">
                               <a href="index.html"><img src="{{ asset('indiro/images/logo/nps.png') }}"
                                       alt="" /></a>
                           </div>
                           <div class="widget widget_getintuch">
                               <ul>
                                   <li>
                                       <i class="flaticon-placeholder"></i>
                                       <span>Alamat: {{ Cache::get('tl')[0]->alamat }}</span>
                                   </li>
                                   <li>
                                       <i class="flaticon-call"></i>
                                       <span>Telpon: {{ Cache::get('tl')[0]->no }}</span>
                                   </li>
                                   <li>
                                       <i class="flaticon-chat-1"></i>
                                       <span>Email:
                                           <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                               data-cfemail="b0c3d5c2c6d9d3d5c3f0d5c8d1ddc0dcd59ed3dfdd">
                                               {{ Cache::get('tl')[0]->email }}</a></span>
                                   </li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-2 col-sm-4 col-6 aos-item" data-aos="fade-up" data-aos-duration="400"
                       data-aos-delay="200">
                       <div class="widget widget_services">
                           <h4 class="footer-title">Pelayanan</h4>
                           <ul>
                               <li><a target="_blank" href="{{url('pelatihan')}}">Pelatihan</a></li>
                               <li><a target="_blank" href="{{url('konsultasi')}}">Konsultasi</a></li>
                               <li><a target="_blank" href="{{url('informasi')}}">Informasi</a></li>
                               <li><a target="_blank" href="{{url('berita')}}">Berita APS</a></li>
                               <li><a target="_blank" href="{{url('kontak')}}">Kontak</a></li>
                           </ul>
                       </div>
                   </div>
                 
                   <div class="col-xl-6 col-lg-6 col-sm-12 aos-item" data-aos="fade-up" data-aos-duration="400"
                       data-aos-delay="300">
                       <div class="widget recent-posts-entry">
                           <h4 class="footer-title">Latest Post</h4>
                           <div class="widget-post-bx">
                        
                               @foreach (Cache::get('bp') as $item)
                               <div class="widget-post clearfix">
                                <div class="dz-media">
                                    <img src="{{asset('gambar/thumbnail') . '/' . $item->gambar}}" alt="">
                                </div>
                                <div class="dz-info">
                                    <h6 class="title"><a href="blog-details.html">{{$item->judul}}</a></h6>
                                    <div class="dz-meta">
                                        <ul>
                                            <li class="post-date"> <i class="las la-calendar"></i> {{$item->tanggal}} </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>   
                               @endforeach
                           
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- footer bottom part -->
       <div class="container">
           <div class="footer-bottom">
               <div class="row align-items-center">
                   <div class="col-lg-6 col-md-8 text-md-start text-center mb-md-0 mb-3">
                       <span class="copyright-text">Copyright © 2022 <a href="https://aps.com/"
                               target="_blank">{{ Cache::get('tl')[0]->nama }}</a>. All rights reserved.</span>
                   </div>
                   <div class="col-lg-6 col-md-4 text-md-end text-center">
                       <div class=" float-md-end float-center">
                           <ul class="justify-content-center">
                               <li><a target="_blank" href="https://www.facebook.com/">
                                       Develop and design by Antangdev
                                   </a>
                               </li>

                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </footer>
<script>
    function dejavu() {
        $("#beritasearch").trigger('submit');
    }
</script>