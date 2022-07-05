<!--=================================
    footer-->
<footer class="space-pt footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-contact-address">

                    <h6 class="text-white mb-4">Where To Find Us </h6>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fas fa-map-signs mt-2"></i>
                            <div class="address-info">
                                <h6>Alamat </h6>
                                <p> {{ Cache::get('tl')[0]->alamat }} </p>
                            </div>
                        </li>
                        <li>
                            <i class="far fa-envelope mt-2"></i>
                            <div class="address-info">
                                <h6>Email</h6>
                                <p> {{ Cache::get('tl')[0]->email }} Mon-Fri 8:30am-6:30pm </p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-headphones-alt mt-2"></i>
                            <div class="address-info">
                                <h6>No Telephone</h6>
                                <p>{{ Cache::get('tl')[0]->no }} </p>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-8  mt-4 mt-md-0">
                <h3 class="text-white mb-3">Informasi Terbaru LSP PPHI
                </h3>

                <div class="footer-link">
                    <div class="row">
                        <div class="col-sm-4 mt-4 mt-md-5">
                            <h6 class="text-white">Informasi</h6>
                            <ul class="list-unstyled">
                                <li><a href="{{ url('tuk') }}"><span>Tempat Uji Kompetensi (TUK)</span></a></li>
                                <li><a href="{{ url('pengumuman') }}"><span>Pengumuman</span></a></li>
                                <li><a href="{{ url('prosedur-uji-kompetensi') }}"><span>Prosedur Uji
                                            Kompetensi</span></a></li>
                                <li><a href="{{ url('agenda') }}"><span>Agenda</span></a></li>

                            </ul>
                        </div>
                        <div class="col-sm-4 mt-4 mt-md-5">
                            <h6 class="text-white">Berita & Pengumuman</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="list-unstyled">
                                        <li><a href="{{ url('berita') . '?k=2' }}"><span>Berita</span></a></li>
                                        <li><a href="{{ url('pengumuman') }}"><span>Pengumuman</span></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-4 mt-4 mt-md-5">
                            <div class="follow-us ">
                                <h6 class="text-white mb-4">Follow Us </h6>
                                <ul class="list-unstyled">
                                    <li><a href="{{ Cache::get('tl')[0]->facebook }}"><i
                                                class="fab fa-3x fa-facebook-f"></i></a></li>
                                    <li><a href="{{ Cache::get('tl')[0]->twitter }}"><i
                                                class="fab fa-3x fa-twitter"></i></a></li>
                                    <li><a href="{{ Cache::get('tl')[0]->ig }}"><i
                                                class="fab fa-3x fa-instagram"></i></a>
                                    </li>
                                    <li><a href="{{ Cache::get('tl')[0]->wa }}"><i
                                                class="fab fa-whatsapp fa-3x"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0 text-white"> &copy; Copyright <span id="copyright">
                            <script>
                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                            </script>
                        </span> <a href="index.html"> LSP PPHI </a> All Rights Reserved </p>
                </div>
                <div class="col-md-6  mt-2 mt-md-0 copyright text-md-end">
                    Develop and design by <a href="https://www.instagram.com/antangdev/"> Antangdev</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=================================
    footer-->
