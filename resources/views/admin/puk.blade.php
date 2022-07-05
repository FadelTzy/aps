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
                    <li><a href="#">PUK</a></li>
                </ul>
                <h4>Manajemen PUK</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div class="panel panel-primary-head">


            <div id="listnotif">

            </div>
            <div id="suksesnotif"></div>
            <div id="suksesnotifu"></div>
            <div id="suksesnotifd"></div>
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h4 class="panel-title">Manajemen Prosedur Uji Kompetensi (PUK)</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="tambahdata" class=" form-horizontal form-bordered">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <input type="hidden" name="teks" id="tempatsinggah2">
                                            <input type="hidden" name="id" value="{{ $data->id }}">

                                            <label>Judul </label>
                                            <div class="input-group">
                                                <input type="text" value="{{ $data->judul }}" name="judul"
                                                    placeholder="Enter Text" class="form-control" />
                                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                            </div><!-- input-group -->

                                            <br>
                                            <label>Isi</label>
                                            <div class="input-group">
                                                <textarea id="ckeditor" name="isi" class="form-control" rows="10"></textarea> <span class="input-group-addon"><i
                                                        class=" fa fa-check"></i></span>
                                            </div><!-- input-group -->

                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                            </div>

                            <br>

                        </form>
                    </div><!-- row -->


                </div><!-- panel-body -->
                <div class="panel-footer text-right">
                    <button id="simpandata" class="btn btn-primary"> Simpan</button>
                </div><!-- panel-footer -->
            </div><!-- panel -->


        </div><!-- panel -->

    </div><!-- contentpanel -->
@endsection

@push('staffjs')
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

    <script src="{{ asset('chain/js/wysihtml5-0.3.0.min.js') }}"></script>
    <script src="{{ asset('chain/js/bootstrap-wysihtml5.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;
        $("#simpandata").on('click', function() {
            $("#tambahdata").trigger('submit');
        });
        getDe = CKEDITOR.replace('ckeditor', {
            height: 400,
            filebrowserUploadUrl: '{{ route('ckeditor.image', ['_token' => csrf_token()]) }}'
        });
        CKEDITOR.instances['ckeditor'].setData("{!! $data->text !!}");

        $("#tambahdata").on('submit', function(id) {
            $("#tempatsinggah2").val(getDe.getData());
            id.preventDefault();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('puk.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
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
                        $('#suksesnotifu').html(
                            '<div class="alert alert-success mt-2 alert-dismissible  rounded " id="suksesnotifu" role="alert">    <strong>Berhasil Menambah Data</strong>    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                        );
                        $("#listnotif").html('');

                    }
                }
            })


        })

        function staffupd(id) {
            $('#myModalu').modal('show');
            $("#idu").val(id.id);
            $("#namau").val(id.nama);
        }
    </script>
@endpush
