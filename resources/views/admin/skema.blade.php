@extends('baseadmin')

@section('staffcss')
    <link href="{{ asset('chain/css/bootstrap-wysihtml5.css') }}" rel="stylesheet" />

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
                    <li><a href="#">Skema</a></li>

                </ul>
                <h4>Manajemen Skema</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div class="panel panel-primary-head">
            <div class="panel-heading row" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                    <h4 class="panel-title">Skema</h4>
                    <p>Manajemen pengelolaan data skema</p>
                </div>
                <div class="col-xs-6 text-right">
                    <a class="btn btn-info" type="button" href="{{ route('skema.create') }}"><i
                            class=" fa fa-plus"></i>
                        Tambah Data</a>
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
                        <th>Kode Skema</th>
                        <th>Judul</th>
                        <th>Register</th>
                        <th>SKKNI</th>
                        <th>Aksi</th>

                    </tr>
                </thead>

            </table>
        </div><!-- panel -->

    </div><!-- contentpanel -->
    <div class="modal fade" id="tambahuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabelus"
        aria-hidden="hidden">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabelus">Tambah Data</h4>
                    <p id="namaskema2"></p>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">
                        <form id="tambahskema" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="kd_skema" id="kd_skema">
                            <label>Kode</label>
                            <div class="input-group">
                                <input type="text" id="" name="kode" placeholder="Input Kategori" class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Nama Unit</label>
                            <div class="input-group">
                                <input type="text" id="" name="unit" placeholder="Input Kategori" class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                        </form>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submitskema" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    <div class="modal fade" id="updateuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabelus"
        aria-hidden="hidden">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabelus">Tambah Data</h4>
                    <p id="namaskema3"></p>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">
                        <form id="updateskema" class="form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idus">
                            <label>Kode</label>
                            <div class="input-group">
                                <input type="text" id="kodeu" name="kode" placeholder="Input Kategori"
                                    class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                            <br>
                            <label>Nama Unit</label>
                            <div class="input-group">
                                <input type="text" id="unitu" name="unit" placeholder="Input Kategori"
                                    class="form-control" />
                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                            </div><!-- input-group -->
                        </form>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="updateskemas" class="btn btn-primary">Simpan</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    <div class="modal fade" id="uk" tabindex="0" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabelu">Edit Unit Kompetensi</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-heading row" style="margin-bottom: 10px;">
                        <div class="col-xs-6">
                            <h4 id="namaskema" class="panel-title">Skema</h4>
                            <p>Manajemen pengolahan data unit Kompetensi</p>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a class="btn btn-sm btn-info" onclick="tambahuk()" type="button"><i class=" fa fa-plus"></i>
                                Tambah Data</a>
                        </div>
                    </div><!-- panel-heading -->
                    <div class="panel-body nopadding">

                        <table id="basicTable2" class="table table-striped table-hover table-bordered ">
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Unit</th>
                                    <th>Unit</th>

                                    <th>Aksi</th>

                                </tr>
                            </thead>

                        </table>
                    </div><!-- panel-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection

@push('staffjs')
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

    <script src="{{ asset('chain/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('chain/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('chain/js/wysihtml5-0.3.0.min.js') }}"></script>
    <script src="{{ asset('chain/js/bootstrap-wysihtml5.js') }}"></script>
    <script src="{{ asset('chain/responsive/1.0.1/js/dataTables.responsive.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;

        function staffupd(id) {
            $('#myModalu').modal('show');
            $("#idu").val(id.id);
            $("#namau").val(id.nama);
        }

        function tambahuk() {
            $('#uk').modal('hide');
            $('#tambahuk').modal('show');
        }
        $("#submitskema").on('click', function() {
            $("#tambahskema").trigger('submit');
        });
        $("#updateskemas").on('click', function() {
            $("#updateskema").trigger('submit');
        });
        $("#tambahskema").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('unit.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    $.LoadingOverlay("hide");
                    $("#tambahskema").trigger('reset');
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
                        $('#tambahuk').modal('hide');
                        $('#uk').modal('show');
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data Unit</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        tabel2.ajax.reload();
                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#updateskema").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('unit.edit') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
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
                        $('#updateuk').modal('hide');
                        $('#uk').modal('show');
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data Unit</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        tabel2.ajax.reload();
                        tabel.ajax.reload();

                    }
                }
            })


        })

        function updateuk(id) {
            $('#uk').modal('hide');
            $('#updateuk').modal('show');
            $("#idus").val(id.id);
            $("#kodeu").val(id.kd_unit);
            $("#unitu").val(id.judul);

            console.log(id);
        }

        function uk(id) {
            $('#uk').modal('show');
            $("#namaskema").html(id.judul)
            $("#namaskema2").html(id.judul)
            $("#namaskema3").html(id.judul)

            $("#kd_skema").val(id.id)
            if ($.fn.DataTable.isDataTable("#basicTable2")) {
                $('#basicTable2').DataTable().clear().destroy();
            }
            tabel2 = $("#basicTable2").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "25%",

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
                    url: "{{ route('unit.index') }}",
                    data: {
                        id: id.id
                    }
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'kd_unit',
                        data: 'kd_unit'
                    },
                    {
                        nama: 'judul',
                        data: 'judul'
                    },

                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });
            console.log(id)
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
                    url: url + '/admin/skema/' + id,
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

        function staffdel2(id) {
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
                    url: url + '/admin/unit/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            tabel2.ajax.reload();

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
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "25%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 4,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 5,
                        width: "30%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('skema.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'kd_skema',
                        data: 'kd_skema'
                    },
                    {
                        nama: 'judul',
                        data: 'judul'
                    },
                    {
                        nama: 'register',
                        data: 'register'
                    },
                    {
                        nama: 'fileskkni',
                        data: 'fileskkni'
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
