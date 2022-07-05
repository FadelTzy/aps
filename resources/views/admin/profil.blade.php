@extends('baseadmin')

@section('staffcss')
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
                <h4>Manajemen Profil Akun</h4>
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

                    <h4 class="panel-title">Manajemen Profil Akun</h4>
                    <p class="text-white" style="color: white">Administrator</p>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form id="tambahdata" class=" form-horizontal form-bordered">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">
                                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                            <label>Nama </label>
                                            <div class="input-group">
                                                <input type="text" value="{{ Auth::user()->name }}" name="name"
                                                    placeholder="Enter Text" class="form-control" />
                                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                            </div><!-- input-group -->

                                            <br>


                                            <label>Username </label>
                                            <div class="input-group">
                                                <input type="text" value="{{ Auth::user()->username }}" name="username"
                                                    placeholder="Enter Text" class="form-control" />
                                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                            </div><!-- input-group -->

                                            <br>

                                            <label>Email </label>
                                            <div class="input-group">
                                                <input type="text" value="{{ Auth::user()->email }}" name="email"
                                                    placeholder="Enter Text" class="form-control" />
                                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                            </div><!-- input-group -->

                                            <br>
                                            <label>Reset Password </label>
                                            <div class="input-group">
                                                <input type="text" name="password" placeholder="Enter Text"
                                                    class="form-control" />
                                                <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                            </div><!-- input-group -->
                                            <br>
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
            data = confirm("Apakah anda yakin ingin merubah data profil ?");
            if (data) {
                $("#tambahdata").trigger('submit');
            }
        });


        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('admin.store') }}',
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
                        location.reload();
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
