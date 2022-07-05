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
                    <li><a href="#">Link Eksternal </a></li>

                </ul>
                <h4>Manajemen Link Eksternal</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div class="panel panel-primary-head">
            <div class="panel-heading row" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                    <h4 class="panel-title">Link</h4>
                    <p>Manajemen pengelolaan data Link.</p>
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
                        <th>Nama Link</th>
                        <th>Logo </th>
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
                                <div class="col-md-7">
                                    <label>Nama Link</label>
                                    <div class="input-group">
                                        <input type="text" name="nama" placeholder="Input Nama Link"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Link</label>
                                    <div class="input-group">
                                        <input type="text" name="link" placeholder="Input Link" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-5">
                                    <label>Logo</label>
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
                                <div class="col-md-7">
                                    <label>Nama Link</label>
                                    <div class="input-group">
                                        <input type="text" id="namau" name="nama" placeholder="Input Lokasi"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Link</label>
                                    <div class="input-group">
                                        <input type="text" id="linku" name="link" placeholder="Input Link"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-5">
                                    <label>Logo</label>
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
                url: '{{ route('link.store') }}',
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
                        console.log(elem)

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
                url: '{{ url('admin/link/edit') }}',
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
                        $('#myModalu').modal('hide');
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
            $("#idu").val(id.id);
            $("#namau").val(id.judul);
            $("#linku").val(id.meta);

            if (id.gambar != null) {
                var html = `<img src="${url + '/gambar/link/' + id.gambar}"
                                    class="img-thumbnail mt-1" id="previewu" alt="">
                                    <button id="btndelim"
                                    onclick="deleteimage(['${id.id}' , '${id.gambar}'])" type="button"
                                    class="btn btn-sm btn-danger">Hapus</button>`;
                $("#justtag").html(html);
            } else {
                var html = ` <img src="" class="img-thumbnail mt-1" id="previewu" alt="">
`
                $("#justtag").html(html);

            }

        }

        function deleteimage(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            console.log(id);
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/link/gambar',
                    type: "POST",
                    data: {
                        id: id[0],
                        file: id[1]
                    },
                    success: function(e) {
                        console.log(e);
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            tabel.ajax.reload();

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
            console.log(id);
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/link/' + id,
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
                        width: "25%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "40%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "15%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('link.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'judul',
                        data: 'judul'
                    },
                    {
                        nama: 'gambarx',
                        data: 'gambarx'
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
