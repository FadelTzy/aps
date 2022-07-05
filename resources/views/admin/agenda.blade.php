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
                    <li><a href="#">Agenda</a></li>

                </ul>
                <h4>Manajemen Agenda</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div class="panel panel-primary-head">
            <div class="panel-heading row" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                    <h4 class="panel-title">Agenda</h4>
                    <p>Manajemen pengelolaan data Agenda.</p>
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
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Status</th>
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
                    <h4 class="modal-title" id="myModalLabel">Form Create</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">

                        <form id="tambahdata" class=" form-horizontal form-bordered">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Judul Agenda</label>
                                    <div class="input-group">
                                        <input type="text" name="judul" placeholder="Input Agenda" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Tanggal Kegiatan</label>
                                    <div class="input-group">
                                        <input type="date" name="tanggal" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Lokasi</label>
                                    <div class="input-group">
                                        <input type="text" name="lokasi" placeholder="Input Lokasi"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-6">


                                    <label>Deskripsi Ringkas</label>
                                    <div style="width: 100%" class="input-group">
                                        <textarea placeholder="Enter Text..." class="form-control" name="deskripsi" id="" cols="30"
                                            rows="10"></textarea> <span class="input-group-addon"><i
                                                class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Status</label>
                                    <div style="width: 100%" class="input-group form-inline">
                                        <div class="rdio  rdio-primary">
                                            <input type="radio" name="status" id="radioDefault" value="1"
                                                checked="checked" />
                                            <label for="radioDefault">Daring</label>
                                        </div>

                                        <div class="rdio  rdio-primary">
                                            <input type="radio" name="status" value="2" id="radioPrimary" />
                                            <label for="radioPrimary">Luring</label>
                                        </div>



                                    </div><!-- input-group -->
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
                    <h4 class="modal-title" id="myModalLabelu">Edit Agenda</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-body nopadding">

                        <form id="upddata" class="form-horizontal form-bordered">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="id" id="idu">
                                    <label>Judul Agenda</label>
                                    <div class="input-group">
                                        <input type="text" id="judulu" name="judul" placeholder="Input Agenda"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Tanggal Kegiatan</label>
                                    <div class="input-group">
                                        <input type="date" id="tanggalu" name="tanggal" class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Lokasi</label>
                                    <div class="input-group">
                                        <input type="text" id="lokasiu" name="lokasi" placeholder="Input Lokasi"
                                            class="form-control" />
                                        <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                </div>
                                <div class="col-md-6">


                                    <label>Deskripsi Ringkas</label>
                                    <div style="width: 100%" class="input-group">
                                        <textarea id="deskripsiu" class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea> <span class="input-group-addon"><i
                                                class=" fa fa-check"></i></span>
                                    </div><!-- input-group -->
                                    <br>
                                    <label>Status</label>
                                    <div style="width: 100%" class="input-group form-inline">
                                        <div class="rdio  rdio-primary">
                                            <input type="radio" name="statusu" id="radioDefault2" value="1" />
                                            <label for="radioDefault2">Daring</label>
                                        </div>

                                        <div class="rdio  rdio-primary">
                                            <input type="radio" name="statusu" value="2" id="radioPrimary2" />
                                            <label for="radioPrimary2">Luring</label>
                                        </div>



                                    </div><!-- input-group -->
                                </div>

                            </div>


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
                url: '{{ route('agenda.store') }}',
                data: data,
                type: "POST",
                success: function(id) {
                    console.log(id);
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

        function staffupd(id) {
            $('#myModalu').modal('show');
            $("#idu").val(id.id);
            $("#judulu").val(id.judul);
            $("#tanggalu").val(id.tgl);
            $("#deskripsiu").val(id.deskripsi);
            $("#lokasiu").val(id.lokasi);
            var $radios = $('input:radio[name=statusu]');
            $radios.filter('[value=' + id.status + ']').prop('checked', true);


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
                    url: url + '/admin/agenda/' + id,
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
        $("#upddata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('agenda.edit') }}',
                data: data,
                type: "POST",
                success: function(id) {
                    $('#myModalu').modal('hide');

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
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Mengubah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');
                        tabel.ajax.reload();

                    }
                }
            })


        })
        jQuery(document).ready(function() {

            tabel = $("#basicTable").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "30%",

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

                    },
                    {
                        orderable: false,

                        targets: 4,
                        width: "20%",

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('agenda.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'judul',
                        data: 'judul'
                    },
                    {
                        nama: 'tanggal',
                        data: 'tanggal'
                    },
                    {
                        nama: 'tiklos',
                        data: 'tiklos'
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
