@extends('baseadmin')

@section('staffcss')
    <link href="{{ asset('chain/css/bootstrap-wysihtml5.css') }}" rel="stylesheet" />
@endsection


@section('pageheader')
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <div class="media-body">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                    <li><a href="#">Profil</a></li>

                </ul>
                <h4>Informasi LSP PPHI</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div id="listnotif"></div>

        <div id="suksesnotif"></div>

        <div id="suksesnotifu"></div>
        <div id="suksesnotifd"></div>
        <div class="panel panel-primary-head">
            {{-- <div class="panel-heading row" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                    <h4 class="panel-title">Informasi LSP PPHI</h4>
                    <p>Manajemen pengelolaan data profil, kontak dan anggota LSP.</p>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class=" fa fa-plus"></i>
                        Tambah Data</button>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-primary">
                        <li class="active"><a href="#home4" data-toggle="tab"><strong>Profil LSP</strong></a></li>
                        <li><a href="#profile4" data-toggle="tab"><strong>Kontak LSP</strong></a></li>
                        <li><a href="#about4" data-toggle="tab"><strong>Anggota</strong></a></li>
                        <li><a href="#link" data-toggle="tab"><strong>Link Daftar</strong></a></li>
                        <li><a href="#ib" data-toggle="tab"><strong>Informasi Beranda</strong></a></li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content tab-content-primary mb30">
                        <div class="tab-pane active" id="home4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">

                                            <h4 class="panel-title">Manajemen Profil LSP PPHI</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <form id="formdata" action="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Nama LSP</label>
                                                            <input type="text" name="nama" value="{{ $profil->nama }}"
                                                                placeholder="Input Nama" class="form-control" />
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->

                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Tentang</label>
                                                            <textarea id="wysiwyg" name="tentang" placeholder="Enter text here..." class="form-control"
                                                                rows="7">{!! $profil->tentang !!}</textarea>
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Visi</label>
                                                            <textarea id="wysiwyg2" name="visi" placeholder="Enter text here..." class="form-control"
                                                                rows="7">{!! $profil->visi !!}</textarea>
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Misi</label>
                                                            <textarea id="wysiwyg3" name="misi" placeholder="Enter text here..." class="form-control"
                                                                rows="7">{!! $profil->misi !!}</textarea>
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Kebijakan Mutu</label>
                                                            <textarea id="wysiwyg4" name="mutu" placeholder="Enter text here..." class="form-control"
                                                                rows="7">{!! $profil->mutu !!}</textarea>
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                </form>
                                            </div><!-- row -->


                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-right">
                                            <button id="simpandata" class="btn btn-primary"> Simpan</button>
                                        </div><!-- panel-footer -->
                                    </div><!-- panel -->

                                </div><!-- col-md-6 -->
                            </div><!-- row -->
                        </div><!-- tab-pane -->

                        <div class="tab-pane" id="profile4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">

                                            <h4 class="panel-title">Manajemen Kontak LSP PPHI</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <form id="formdatak" action="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Alamat </label>
                                                            <input type="text" name="alamat" value="{{ $profil->alamat }}"
                                                                placeholder="Input Alamat" class="form-control" />
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email </label>
                                                                <input type="email" name="email"
                                                                    value="{{ $profil->email }}" placeholder="Input Email"
                                                                    class="form-control" />
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Nomor Kontak</label>
                                                                <input type="text" name="no" value="{{ $profil->no }}"
                                                                    placeholder="Input Nomor" class="form-control" />
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Facebook LSP </label>
                                                                <input type="text" name="facebook"
                                                                    value="{{ $profil->facebook }}"
                                                                    placeholder="Input Facebook" class="form-control" />
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Twitter LSP</label>
                                                                <input type="text" name="twitter"
                                                                    value="{{ $profil->twitter }}"
                                                                    placeholder="Input Twitter" class="form-control" />
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Instagram LSP</label>
                                                                <input type="text" name="ig" value="{{ $profil->ig }}"
                                                                    placeholder="Input Instagram" class="form-control" />
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Whatsapp LSP</label>
                                                                <input type="text" name="wa" value="{{ $profil->wa }}"
                                                                    placeholder="Input WA" class="form-control" />
                                                            </div><!-- form-group -->
                                                        </div><!-- col-sm-6 -->
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label ">Titik Lokasi</label>
                                                            <input type="text" name="lokasi" value="{{ $profil->lokasi }}"
                                                                placeholder="Input Lokasi" class="mb2 form-control" />
                                                            <iframe
                                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15895.078138292582!2d119.4825194!3d-5.1407661!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbfa02069ac5b9f72!2sLSP%20PPHI%20(Penyelenggara%20Produk%20Halal%20Indonesia)!5e0!3m2!1sid!2sid!4v1647765474890!5m2!1sid!2sid"
                                                                style="border:0; width: 100%; height: 300px;"
                                                                allowfullscreen=""></iframe>
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                </form>
                                            </div><!-- row -->


                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-right">
                                            <button id="simpandatak" class="btn btn-primary"> Simpan</button>
                                        </div><!-- panel-footer -->
                                    </div><!-- panel -->

                                </div><!-- col-md-6 -->
                            </div><!-- row -->
                        </div><!-- tab-pane -->

                        <div class="tab-pane" id="about4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary widget-messaging">
                                        <div class="panel-heading">
                                            <div class="pull-right">
                                                <a type="button" class="new-msg" data-toggle="modal"
                                                    data-target="#myModal"><i class="fa fa-plus"></i></a>
                                            </div><!-- pull-right -->
                                            <h3 class="panel-title">Manajemen Data Anggota</h3>
                                        </div>

                                        <div class="list-group contact-group">
                                            @foreach ($anggota as $a)
                                                <a href="#" class="list-group-item ">
                                                    <div class="media row ">
                                                        <div class="pull-left px-3">
                                                            <img class="img-online"
                                                                src="{{ asset('gambar/foto/') . '/' . $a->foto }} "
                                                                alt="...">
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ $a->nama }}
                                                                <small>{{ $a->jabatan }}</small>
                                                            </h4>
                                                            <div class="media-content">

                                                                <ul class="list-unstyled">

                                                                    <li><i class="fa fa-envelope-o"></i>
                                                                        {{ $a->email ?? '-' }}</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="pull-right ">
                                                            <button onclick="del({{ $a->id }})"
                                                                class="btn btn-sm btn-danger">Hapus</button>

                                                            <button onclick="edit({{ $a }})"
                                                                class="btn btn-sm btn-primary">Edit</button>
                                                        </div>
                                                    </div><!-- media -->
                                                </a><!-- list-group -->
                                            @endforeach
                                        </div>
                                    </div><!-- panel -->

                                </div><!-- col-md-6 -->
                            </div><!-- row -->
                        </div><!-- tab-pane -->
                        <div class="tab-pane" id="link">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">

                                            <h4 class="panel-title">Link Registrasi</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <form id="formdatal" action="">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Link </label>
                                                            <input type="text" name="link"
                                                                value="{{ $profil->linkregister }}"
                                                                placeholder="Input Link" class="form-control" />
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->


                                                </form>
                                            </div><!-- row -->


                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-right">
                                            <button id="simpandatal" class="btn btn-primary"> Simpan</button>
                                        </div><!-- panel-footer -->
                                    </div><!-- panel -->

                                </div><!-- col-md-6 -->
                            </div><!-- row -->
                        </div><!-- tab-pane -->
                        <div class="tab-pane" id="ib">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">

                                            <h4 class="panel-title">Informasi Beranda</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <form id="formdatab" action="">
                                                    <input type="hidden" name="id" value="{{ $tentang->id }}">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Judul Informasi </label>
                                                            <input type="text" name="judul"
                                                                value="{{ $tentang->judul ?? '-' }}"
                                                                placeholder="Input judul" class="form-control" />
                                                        </div><!-- form-group -->
                                                        <div class="form-group">
                                                            <label class="control-label">Deskripsi </label>
                                                            <textarea class="form-control" name="isi" id="" cols="30" rows="5">{{ $tentang->isi ?? '-' }}</textarea>
                                                        </div><!-- form-group -->
                                                        <div class="form-group">
                                                            <label class="control-label">Nama Ketua </label>
                                                            <input type="text" name="nama"
                                                                value="{{ $tentang->nama ?? '-' }}"
                                                                placeholder="Input Nama" class="form-control" />
                                                        </div><!-- form-group -->
                                                    </div><!-- col-sm-6 -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Gambar 1
                                                                @if ($tentang->foto1 == null)
                                                                    <span class="text-danger">* File tidak ada</span>
                                                                @else
                                                                    <span class="text-success">* File ada</span>
                                                                @endif
                                                            </label>
                                                            <input type="file" name="foto1" class="form-control" />
                                                            @if ($tentang->foto1 != null)
                                                                <a type="button"
                                                                    href="{{ asset('gambar/beranda/') . '/' . $tentang->foto1 }}"
                                                                    target="_blank" class="btn btn-sm btn-primary">Cek
                                                                    Gambar</a>
                                                            @endif

                                                        </div><!-- form-group -->
                                                        <div class="form-group">
                                                            <label class="control-label">Gambar 2
                                                                @if ($tentang->foto2 == null)
                                                                    <span class="text-danger">* File tidak ada</span>
                                                                @else
                                                                    <span class="text-success">* File ada</span>
                                                                @endif
                                                            </label>

                                                            <input type="file" name="foto2" class="form-control" />
                                                            @if ($tentang->foto2 != null)
                                                                <a type="button"
                                                                    href="{{ asset('gambar/beranda/') . '/' . $tentang->foto2 }}"
                                                                    target="_blank" class="btn btn-sm btn-primary">Cek
                                                                    Gambar</a>
                                                            @endif
                                                        </div><!-- form-group -->
                                                        <div class="form-group">
                                                            <label class="control-label">Gambar TTD
                                                                @if ($tentang->ttd == null)
                                                                    <span class="text-danger">* File tidak ada</span>
                                                                @else
                                                                    <span class="text-success">* File ada</span>
                                                                @endif
                                                            </label>
                                                            <input type="file" name="ttd" class="form-control" />
                                                            @if ($tentang->ttd != null)
                                                                <a type="button"
                                                                    href="{{ asset('gambar/beranda/') . '/' . $tentang->ttd }}"
                                                                    target="_blank" class="btn btn-sm btn-primary">Cek
                                                                    Gambar</a>
                                                            @endif
                                                        </div><!-- form-group -->
                                                    </div>


                                                </form>
                                            </div><!-- row -->


                                        </div><!-- panel-body -->
                                        <div class="panel-footer text-right">
                                            <button id="simpandatab" class="btn btn-primary"> Simpan</button>
                                        </div><!-- panel-footer -->
                                    </div><!-- panel -->

                                </div><!-- col-md-6 -->
                            </div><!-- row -->
                        </div><!-- tab-pane -->
                    </div><!-- tab-content -->

                </div><!-- col-md-6 -->



            </div><!-- row -->
        </div>

    </div><!-- contentpanel -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Anggota</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">

                        <form id="formanggota" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <label>Nama</label>
                            <div class="input-group">
                                <input type="text" name="nama" placeholder="Input Nama" class="form-control" />

                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Jabatan</label>
                            <div class="input-group">
                                <input type="text" name="jabatan" placeholder="Input Jabatan" class="form-control" />

                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Email</label>
                            <div class="input-group">
                                <input type="text" name="email" placeholder="Input Email" class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Foto</label>
                            <div class="input-group">
                                <input type="file" name="file" placeholder="Input Foto" class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                        </form>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submitdataanggota" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    <div class="modal fade" id="myModale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Informasi Anggota</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">

                        <form id="formanggotae" enctype="multipart/form-data" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="ide">
                            <label>Nama</label>
                            <div class="input-group">
                                <input type="text" id="namae" name="nama" placeholder="Input Nama"
                                    class="form-control" />

                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Jabatan</label>
                            <div class="input-group">
                                <input type="text" id="jabatane" name="jabatan" placeholder="Input Jabatan"
                                    class="form-control" />

                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Email</label>
                            <div class="input-group">
                                <input type="text" id="emaile" name="email" placeholder="Input Email"
                                    class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Foto</label>
                            <div class="input-group">
                                <input type="file" name="file" placeholder="Input Foto" class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                        </form>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submitdataanggotae" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection

@push('staffjs')
    <script src="{{ asset('chain/js/wysihtml5-0.3.0.min.js') }}"></script>
    <script src="{{ asset('chain/js/bootstrap-wysihtml5.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js ">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;
        $("#simpandata").on('click', function() {
            $("#formdata").trigger('submit');
        });
        $("#simpandatak").on('click', function() {
            $("#formdatak").trigger('submit');
        });
        $("#simpandatab").on('click', function() {
            $("#formdatab").trigger('submit');
        });
        $("#simpandatal").on('click', function() {
            $("#formdatal").trigger('submit');
        });
        $("#submitdataanggota").on('click', function() {
            $("#formanggota").trigger('submit');
        });
        $("#submitdataanggotae").on('click', function() {
            $("#formanggotae").trigger('submit');
        });
        $("#formdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('profil-lsp.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible  show mt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        location.reload();

                    }
                }
            })


        });
        $("#formdatak").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('profil-lsp.storek') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible  show mt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        location.reload();

                    }
                }
            })


        });
        $("#formdatab").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('profil-lsp.storeb') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible  show mt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        location.reload();

                    }
                }
            })


        });
        $("#formdatal").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('profil-lsp.storel') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible  show mt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        location.reload();

                    }
                }
            })


        });
        $("#formanggota").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('anggota-lsp.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible  show mt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                    }
                    $("#myModal").modal('hide');
                }
            })


        });
        $("#formanggotae").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('anggota-lsp.storeu') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div class="alert alert-danger alert-dismissible  show mt-3" role="alert">';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                    }
                    $("#myModal").modal('hide');
                }
            })


        });

        function edit(id) {
            $("#myModale").modal('show');
            $("#namae").val(id.nama);
            $("#jabatane").val(id.jabatan);
            $("#emaile").val(id.email);
            $("#ide").val(id.id);
        }

        function del(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            alert(id);
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/anggota-lsp/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            location.reload();
                            $('#suksesnotifd').html(
                                '<div class="alert alert-success alert-dismissible rounded " role="alert">    <strong>Berhasil Menghapus Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                            );
                        }
                    }
                })

            }
        }
        jQuery(document).ready(function() {
            // HTML5 WYSIWYG Editor
            jQuery('#wysiwyg').wysihtml5({
                color: true,
                html: true
            });
            jQuery('#wysiwyg2').wysihtml5({
                color: true,
                html: true
            });
            jQuery('#wysiwyg3').wysihtml5({
                color: true,
                html: true
            });
            jQuery('#wysiwyg4').wysihtml5({
                color: true,
                html: true
            });
        });
    </script>
@endpush
