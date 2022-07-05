@extends('baseadmin')

@section('staffcss')
    <link href="{{ asset('chain/css/style.datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('chain/responsive/1.0.1/css/dataTables.responsive.css') }}" rel="stylesheet">
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
                    <li><a href="#">Banner</a></li>

                </ul>
                <h4>Manajemen Banner</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div class="panel panel-primary-head">
            <div class="panel-heading row" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                    <h4 class="panel-title">Banner</h4>
                    <p>Manajemen pengelolaan data Banner.</p>
                </div>
                <div class="col-xs-6 text-right">
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class=" fa fa-plus"></i>
                        Tambah Data</button>
                </div>
            </div><!-- panel-heading -->

            <div id="listnotif">

            </div>

            <div id="suksesnotif"></div>

            <div id="suksesnotifu"></div>
            <div id="suksesnotifd"></div>
            <table id="basicTable" class="table table-striped table-hover table-bordered ">
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Urutan</th>
                        <th>Judul </th>
                        <th>Pesan </th>
                        <th>Gambar</th>
                        <th>Aksi</th>

                    </tr>
                </thead>

            </table>
        </div><!-- panel -->

    </div><!-- contentpanel -->
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">

                        <form id="tambahdata" class=" form-horizontal form-bordered">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor Urutan</label>
                                    <div class="input-group">
                                        <input type="number" name="urut" placeholder="Input Urutan"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->

                                    <br>
                                    <label>Judul Konten</label>
                                    <div class="input-group">
                                        <input type="text" name="judul" placeholder="Input Judul" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->

                                    <br>
                                    <label>Isi Konten</label>
                                    <div class="input-group">
                                        <input type="text" name="isi" placeholder="Input Isi" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->

                                    <br>
                                    <label>URL</label>
                                    <div class="input-group">
                                        <input type="text" name="url" placeholder="Input URL" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <label>Model</label>
                                    <div style="width: 100%" class="input-group">
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="model" id="radioDefault" value="1" />
                                            <label for="radioDefault">Tanpa Model</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input checked="checked" type="radio" name="model" value="2"
                                                id="radioPrimary" />
                                            <label for="radioPrimary">Model Tengah</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="model" value="3" id="radioPrimary1" />
                                            <label for="radioPrimary1">Model Kanan</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="model" value="4" id="radioPrimary2" />
                                            <label for="radioPrimary2">Model Kiri</label>
                                        </div>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Gambar Background</label>
                                    <div class="input-group">
                                        <input type="file" name="file" id="fileP" class="form-control">
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <img src="" class="img-thumbnail mt-1" id="preview" alt="">
                                    <div class="d-none" id="infoimage"></div>
                                    <br>
                                </div>
                            </div>


                            <br>

                        </form>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submitdata" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->


    <div class="modal fade" id="myModalu" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabelu">Edit TUK</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">

                        <form id="upddata" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idu">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor Urutan</label>
                                    <div class="input-group">
                                        <input type="number" id="urutu" name="urut" placeholder="Input Urutan"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->

                                    <br>
                                    <label>Judul Konten</label>
                                    <div class="input-group">
                                        <input type="text" name="judul" id="judulu" placeholder="Input Judul"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->

                                    <br>
                                    <label>Isi Konten</label>
                                    <div class="input-group">
                                        <input type="text" name="isi" id="isiu" placeholder="Input Isi"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>URL</label>
                                    <div class="input-group">
                                        <input type="text" name="url" id="urlu" placeholder="Input URL"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <label>Model</label>
                                    <div style="width: 100%" class="input-group">
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="modelu" id="radioDefaultu" value="1" />
                                            <label for="radioDefaultu">Tanpa Model</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="modelu" value="2" id="radioPrimaryu" />
                                            <label for="radioPrimaryu">Model Tengah</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="modelu" value="3" id="radioPrimaryu1" />
                                            <label for="radioPrimaryu1">Model Kanan</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="modelu" value="4" id="radioPrimaryu2" />
                                            <label for="radioPrimaryu2">Model Kiri</label>
                                        </div>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Gambar Background</label>
                                    <div class="input-group">
                                        <input type="file" name="file" id="filePu" class="form-control">
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <div id="justtag"></div>
                                    <div class="d-none" id="infoimageu"></div>
                                    <br>
                                </div>
                            </div>


                            <br>


                        </form>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submitdatau" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection

@push('staffjs')
    <script src="{{ asset('chain/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('chain/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('chain/responsive/1.0.1/js/dataTables.responsive.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;

        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
        fileP.onchange = evt => {
            const [file] = fileP.files
            if (file) {
                preview.src = URL.createObjectURL(file)
                $("#infoimage").removeClass("d-none").html('File Size: ' + bytesToSize(fileP.files[0].size))
            }
        }
        $("#preview").on('click', function() {
            $("#fileP").val('');
            preview.src = '';
            $("#preview").html('');
            $("#infoimage").html('');
        })
        filePu.onchange = evt => {
            const [file] = filePu.files
            if (file) {
                previewu.src = URL.createObjectURL(file)
                $("#infoimageu").removeClass("d-none").html('File Size: ' + bytesToSize(filePu.files[0].size))
            }
            $("#btndelim").hide();
        }
        $(document).ready(function() {
            $("#previewu").on('click', function() {
                $("#filePu").val('');
                previewu.src = '';
                $("#previewu").html('');
                $("#infoimageu").html('');

            })
        });

        $("#submitdata").on('click', function() {
            $("#tambahdata").trigger('submit');
        });
        $("#submitdatau").on('click', function() {
            $("#upddata").trigger('submit');
        });
        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('banner.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    $("#fileP").val('');
                    preview.src = '';
                    $("#preview").html('');
                    $("#infoimage").html('');
                    $.LoadingOverlay("hide");
                    $("#tambahdata").trigger('reset');
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

                    } else {
                        $('#myModal').modal('hide');
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#upddata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/banner/edit') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    $('#myModalu').modal('hide');
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

                    } else {
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Mengubah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        tabel.ajax.reload();

                    }
                }
            })


        })

        function staffupd(id) {
            $('#myModalu').modal('show');
            var $radios = $('input:radio[name=modelu]');
            $radios.filter('[value=' + id.model + ']').prop('checked', true);
            $("#idu").val(id.id);
            $("#urutu").val(id.nama);
            $("#judulu").val(id.judul);
            $("#isiu").val(id.isi);
            $("#urlu").val(id.url);

            if (id.file != null) {
                var html = `<img src="${url + '/gambar/banner/' + id.file}"
                                    class="img-thumbnail mt-1" id="previewu" alt="">`;

                $("#justtag").html(html);
            } else {
                var html = ` < img src = ""
                class = "img-thumbnail mt-1"
                id = "previewu"
                alt = "" >
                    `
                $("#justtag").html(html);

            }

        }

        function deleteimage(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/tuk/gambar',
                    type: "POST",
                    data: {
                        id: id[0],
                        file: id[1]
                    },
                    success: function(e) {
                        tabel.ajax.reload();
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            $("#btndelim").hide();
                            $("#filePu").val('');
                            previewu.src = '';
                            $("#previewu").html('');
                            $('#suksesnotifd').html(
                                '<div class="alert alert-success alert-dismissible rounded " role="alert">    <strong>Berhasil Menghapus Gambar</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                            );
                        } else {
                            alert('gagal menghapus foto')
                        }
                    }
                })

            }
        }

        function staffdel(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/banner/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            tabel.ajax.reload();
                            $('#suksesnotifd').html(
                                '<div class="alert alert-success alert-dismissible rounded " role="alert">    <strong>Berhasil Menghapus Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                            );
                        }
                    }
                })

            }
        }

        jQuery(document).ready(function() {

            tabel = $("#basicTable").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "20%",

                    }, {
                        orderable: false,

                        targets: 4,
                        width: "35%",

                    },
                    {
                        orderable: false,

                        targets: 5,
                        width: "15%",

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('banner.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'nama',
                        data: 'nama'
                    },
                    {
                        nama: 'judul',
                        data: 'judul'
                    },
                    {
                        name: 'isi',
                        data: 'isi',
                    },
                    {
                        name: 'gambar',
                        data: 'gambar',
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });



        });
    </script>
@endpush
