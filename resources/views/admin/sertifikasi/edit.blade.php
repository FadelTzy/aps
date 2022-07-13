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
                    <li><a href="#">Sertifikasi Kompentensi</a></li>
                    <li><a href="#">Edit</a></li>
                </ul>
                <h4>Manajemen Sertifikasi Kompentensi</h4>
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
            <form id="tambahdata" class=" form-horizontal form-bordered">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Form Edit</h4>
                                <input type="hidden" name="teks" id="tempatsinggah2">
                                <input type="hidden" name="teksman" id="tempatsinggah3">
                                <input type="hidden" name="tekspak" id="tempatsinggah4">

                                <label>Judul Sertifikasi Kompentensi</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $data->judul }}" name="judul" placeholder="Enter Text"
                                        class="form-control" />
                                    <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                                </div><!-- input-group -->

                                <br>
                                <label>Isi Deskripsi</label>
                                <div class="input-group">
                                    <textarea id="ckeditor" name="deskripsi" class="form-control" rows="10">{{ $data->deskripsi }} </textarea> <span class="input-group-addon"><i
                                            class=" fa fa-check"></i></span>
                                </div><!-- input-group -->
                                <br>
                                <label>Manfaat</label>
                                <div class="input-group">
                                    <textarea id="ckeditor2" name="manfaat" class="form-control" rows="10">{{ $data->manfaat }} </textarea> <span class="input-group-addon"><i
                                            class=" fa fa-check"></i></span>
                                </div><!-- input-group -->
                                <br>
                                <label>Paket</label>
                                <div class="input-group">
                                    <textarea id="ckeditor3" name="paket" class="form-control" rows="10">{{ $data->paket }} </textarea> <span class="input-group-addon"><i
                                            class=" fa fa-check"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4" style="margin-top: 20px">
                        <label>Gambar Berita</label>

                        <div class="input-group  text-right" style="width: 100%">
                            <input type="file" name="file" id="fileP" class="form-control">
                            @if ($data->image != null)
                                <img src="{{ asset('gambar/sertifikasi') . '/' . $data->image }}"
                                    class="img-thumbnail mt-1" id="preview" alt="">
                                <button id="btndelim"
                                    onclick="deleteimage(['{{ $data->id }}' , '{{ $data->image }}'])" type="button"
                                    class="btn btn-sm btn-danger">Hapus</button>
                            @else
                                <img src="" class="img-thumbnail mt-1" id="preview" alt="">
                            @endif
                            <div class="d-none" id="infoimage"></div>
                        </div>
          
                        <br>
                        <label>Link File Google Drive</label>

                        <div class="input-group" style="width: 100%">
                            <input type="text" value="{{$data->file}}" name="link" id="link" class="form-control">
          
                        </div>
                        <br>
                        <label>Status Post</label>
                        <div style="width: 100%" class="input-group">
                            <div class="rdio rdio-primary">
                                <input type="radio" name="status" id="radioDefault" value="1"
                                    @if ($data->status == 1) checked @endif />
                                <label for="radioDefault">Posting</label>
                            </div>

                            <div class="rdio rdio-primary">
                                <input type="radio" name="status" value="2" @if ($data->status == 2) checked @endif
                                    id="radioPrimary" />
                                <label for="radioPrimary">Pending</label>
                            </div>
                        </div><!-- input-group -->
                        <br>
                        <label>Keywords</label>
                        <div class="input-group">
                            <input type="text" value="{{ $data->keterangan }}" name="keyword" placeholder="Enter Text"
                                class="form-control" />
                            <span class="input-group-addon"><i class=" fa fa-check"></i></span>
                        </div><!-- input-group -->
                    </div>
                </div>

                <br>

            </form>
            <div class="panel-heading row" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                    <a href="{{ route('sertifikasi.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
                <div class="col-xs-6 text-right">
                    <button id="submitdata" class="btn btn-success"><i class=" fa  fa-cloud-download"></i>
                        Simpan</button>
                </div>
            </div><!-- panel-heading -->
        </div><!-- panel -->

    </div><!-- contentpanel -->
@endsection

@push('staffjs')
    <script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>

    <script src="{{ asset('chain/js/wysihtml5-0.3.0.min.js') }}"></script>
    <script src="{{ asset('chain/js/bootstrap-wysihtml5.js') }}"></script>
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
        $("#submitdata").on('click', function() {
            $("#tambahdata").trigger('submit');
        });
        getDe = CKEDITOR.replace('ckeditor', {
            height: 300,
            filebrowserUploadUrl: '{{ route('ckeditor.image', ['_token' => csrf_token()]) }}'
        });
        getDe2 = CKEDITOR.replace('ckeditor2', {
            height: 300,
            filebrowserUploadUrl: '{{ route('ckeditor.image', ['_token' => csrf_token()]) }}'
        });
        getDe3 = CKEDITOR.replace('ckeditor3', {
            height: 300,
            filebrowserUploadUrl: '{{ route('ckeditor.image', ['_token' => csrf_token()]) }}'
        });
        CKEDITOR.instances['ckeditor'].setData(`{!! $data->deskripsi !!}`);
        CKEDITOR.instances['ckeditor2'].setData(`{!! $data->manfaat !!}`);
        CKEDITOR.instances['ckeditor3'].setData(`{!! $data->paket !!}`);

        $("#tambahdata").on('submit', function(id) {
            $("#tempatsinggah2").val(getDe.getData());
            $("#tempatsinggah3").val(getDe2.getData());

            $("#tempatsinggah4").val(getDe3.getData());

            id.preventDefault();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/sertifikasi/edit') . '/' . $data->id }}',
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
                    url: url + '/admin/sertifikasi/gambar',
                    type: "POST",
                    data: {
                        id: id[0],
                        file: id[1]
                    },
                    success: function(e) {
                        console.log(e);
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            $("#btndelim").hide();
                            $("#fileP").val('');
                            preview.src = '';
                            $("#preview").html('');
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
    </script>
@endpush
