<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="{{ asset('gambar/admin/admin.png') }}" alt="">
        </a>
        <div class="media-body">
            <h6 class="media-heading">{{ Auth::user()->name }}</h6>
            <small
                class="text-muted">{{ Auth::user()->role == '1' ? 'Admin' : (Auth::user()->role == '2' ? 'Editor' : 'Penulis') }}</small>
        </div>
    </div><!-- media -->

    <h5 class="leftpanel-title">MENU</h5>
    <ul class="nav nav-pills nav-stacked">
        @if (Auth::user()->role == '1')
            <li class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"><a href=""><i
                        class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ Request::segment(2) == 'profil-lsp' ? 'active' : '' }}"><a
                    href="{{ url('admin/profil-lsp') }}"><i class="fa fa-home"></i> <span>Informasi LSP
                        PPHI</span></a>
            </li>
            <h5 class="leftpanel-title">Manajemen Data</h5>

            <li class="parent {{ Request::segment(2) == 'data-master' ? 'active' : '' }}"><a href="#"><i
                        class="fa fa-suitcase"></i> <span>Manajemen Berita</span></a>
                <ul class="children">

                    <li class="{{ Request::is('admin/berita') ? 'active' : '' }}"><a
                            href="{{ url('admin/berita') }}">Berita</a></li>
                    <li class="{{ Request::is('admin/kategori') ? 'active' : '' }}"><a
                            href="{{ url('admin/kategori') }}">Kategori</a></li>

                </ul>
            </li>
            <li class="parent {{ Request::segment(2) == 'data-master' ? 'active' : '' }}"><a href="#"><i
                        class="fa fa-suitcase"></i> <span>Manajemen Informasi</span></a>
                <ul class="children">

                    <li class="{{ Request::is('admin/tuk') ? 'active' : '' }}"><a
                            href="{{ url('admin/tuk') }}">TUK</a></li>
                    <li class="{{ Request::is('admin/agenda') ? 'active' : '' }}"><a
                            href="{{ url('admin/agenda') }}">Agenda</a></li>
                    {{-- <li class="{{ Request::is('admin/pengumuman') ? 'active' : '' }}"><a
                            href="{{ url('admin/pengumuman') }}">Pengumuman</a></li> --}}
                    <li class="{{ Request::is('admin/prosedur-uji-kompetensi') ? 'active' : '' }}"><a
                            href="{{ url('admin/prosedur-uji-kompetensi') }}">PUK</a></li>
                    <li class="{{ Request::is('admin/link') ? 'active' : '' }}"><a
                            href="{{ url('admin/link') }}">Link</a></li>
                    <li class="{{ Request::is('admin/banner') ? 'active' : '' }}"><a
                            href="{{ url('admin/banner') }}">Banner</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(2) == 'skema' ? 'active' : '' }}"><a href="{{ url('admin/skema') }}"><i
                        class="fa fa-users"></i> <span>Manajemen
                        Skema</span></a></li>
            <h5 class="leftpanel-title">Manajemen User</h5>

            <li class="{{ Request::segment(2) == 'profil' ? 'active' : '' }}"><a
                    href="{{ url('admin/profil') }}"><i class="fa fa-file"></i> <span>Profil User</span></a>
            </li>
            <li class="{{ Request::segment(2) == 'user' ? 'active' : '' }}"><a href="{{ url('admin/user') }}"><i
                        class="fa fa-file"></i> <span>User</span></a></li>
        @endif
        @if (Auth::user()->role == '2')
        @endif
        <li>

            <a href="#" id="" onclick="logsout()" class="">
                <i class="fa fa-sign-out"></i>

                <span>Logout</span>


            </a>
            <form method="POST" id="flog" class="" action="{{ route('logout') }}">
                @csrf
            </form>

        </li>
    </ul>


</div><!-- leftpanel -->
<script>
    function logsout() {
        var x = document.getElementById('flog');
        x.submit();
    }
</script>
