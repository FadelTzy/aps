   <!-- Footer -->
   <footer class="site-footer style-3 bg-secondary" id="footer">
       <div class="footer-top">
           <div class="container">
               <div class="row">
                   <div class="col-xl-4 col-lg-4 col-sm-8 aos-item" data-aos="fade-up" data-aos-duration="800"
                       data-aos-delay="200">
                       <div class="widget widget_about">
                           <div class="footer-logo logo-white">
                               <a href="index.html"><img src="{{ asset('indiro/images/logo/nps.png') }}"
                                       alt="" /></a>
                           </div>
                           <div class="widget widget_getintuch">
                               <ul>
                                   <li>
                                       <i class="flaticon-placeholder"></i>
                                       <span> {{ Cache::get('tl')[0]->alamat }}</span>
                                   </li>
                                   <li>
                                       <i class="flaticon-call"></i>
                                       <span> {{ Cache::get('tl')[0]->no }}</span>
                                   </li>
                                   <li>
                                       <i class="flaticon-chat-1"></i>
                                       <span>
                                           <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                               data-cfemail="b0c3d5c2c6d9d3d5c3f0d5c8d1ddc0dcd59ed3dfdd">
                                               {{ Cache::get('tl')[0]->email }}</a></span>
                                   </li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-2 col-sm-4 col-6 aos-item" data-aos="fade-up" data-aos-duration="800"
                       data-aos-delay="400">
                       <div class="widget widget_services">
                           <h4 class="footer-title">Our Links</h4>
                           <ul>
                               <li><a href="index.html">Home</a></li>
                               <li><a href="about-us.html">About Us</a></li>
                               <li><a href="services.html">Services</a></li>
                               <li><a href="blog-grid.html">News</a></li>
                               <li><a href="contact-us.html">Contact Us</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-xl-2 col-lg-2 col-sm-4 col-6 aos-item" data-aos="fade-up" data-aos-duration="800"
                       data-aos-delay="600">
                       <div class="widget widget_services">
                           <h4 class="footer-title">Other Links</h4>
                           <ul>
                               <li><a href="javascript:void(0);">FAQ</a></li>
                               <li><a href="javascript:void(0);">Support</a></li>
                               <li><a href="javascript:void(0);">Help</a></li>
                               <li><a href="javascript:void(0);">Privacy Policy</a></li>
                               <li><a href="javascript:void(0);">Terms Of Use</a></li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-xl-4 col-lg-4 col-sm-8 aos-item" data-aos="fade-up" data-aos-duration="800"
                       data-aos-delay="800">
                       <div class="widget recent-posts-entry">
                           <h4 class="footer-title">Latest Post</h4>
                           <div class="widget-post-bx">
                               <div class="widget-post clearfix">
                                   <div class="dz-media">
                                       {{-- <img src="images/blog/recent-blog/pic1.jpg" alt=""> --}}
                                   </div>
                                   <div class="dz-info">
                                       <h6 class="title"><a href="blog-details.html">Aliqua sodales vestibulum
                                               risus nterdum malesuad</a></h6>
                                       <div class="dz-meta">
                                           <ul>
                                               <li class="post-date"> <i class="las la-calendar"></i> 7 March,
                                                   2022</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               <div class="widget-post clearfix">
                                   <div class="dz-media">
                                       {{-- <img src="images/blog/recent-blog/pic2.jpg" alt=""> --}}
                                   </div>
                                   <div class="dz-info">
                                       <h6 class="title"><a href="blog-details.html">How To Make Money From The
                                               Agency Phenomenon</a></h6>
                                       <div class="dz-meta">
                                           <ul>
                                               <li class="post-date"> <i class="las la-calendar"></i> 7 March,
                                                   2022 </li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
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
