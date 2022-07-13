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
                    <li><a href="#">Dashboard</a></li>

                </ul>
                <h4>Dashboard</h4>
            </div>
        </div><!-- media -->
    </div><!-- pageheader -->
@endsection
@section('contentpage')
    <div class="contentpanel">
        <div class="alert alert-info">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>SELAMAT DATANG DI,</strong> WEB ADMIN ASP <a class="alert-link" href="">
        </div>
        <div class="row row-stat">
            <div class="col-md-3">
                <div class="panel panel-success-alt noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns" style="display: none;">
                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title=""
                                data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-graduation-cap"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total Pelatihan</h5>
                            <h1 class="mt5">{{$Pelatihan}}</h1>
                        </div><!-- media-body -->


                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-3 -->

            <div class="col-md-3">
                <div class="panel panel-primary noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns" style="display: none;">
                            <a href="" class="panel-close tooltips" data-toggle="tooltip" title=""
                                data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-file"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total Berita</h5>
                            <h1 class="mt5">{{ $Berita }}</h1>
                        </div><!-- media-body -->


                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-3 -->

            <div class="col-md-3">
                <div class="panel panel-dark noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns" style="display: none;">
                            <a href="" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title=""
                                data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-calendar"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total Konsultan Manajemen</h5>
                            <h1 class="mt5">{{ $Konsultasi }}</h1>
                        </div><!-- media-body -->


                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-3 -->
            <div class="col-md-3">
                <div class="panel panel-dark noborder">
                    <div class="panel-heading noborder">
                        <div class="panel-btns" style="display: none;">
                            <a href="" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title=""
                                data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                        </div><!-- panel-btns -->
                        <div class="panel-icon"><i class="fa fa-users"></i></div>
                        <div class="media-body">
                            <h5 class="md-title nomargin">Total User</h5>
                            <h1 class="mt5">{{ $User }}</h1>
                        </div><!-- media-body -->


                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- col-md-3 -->
        </div>
    </div><!-- contentpanel -->
@endsection

@push('staffjs')
@endpush
