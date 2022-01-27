@extends('admin.app')

@section('content')

    <section class="content">
        <div class="">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Karabay Yazılım</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                        class="zmdi zmdi-home"></i> Admin</a>
                            </li>
                            <li class="breadcrumb-item active">Admin Panel</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="/admin/bundles/datatablescripts.bundle.js"></script>
    <script src="/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="/admin/js/pages/tables/jquery-datatable.js"></script>
    <script src="/admin/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="backend/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css"/>
    <link rel="stylesheet" href="backend/plugins/charts-c3/plugin.css"/>
@endsection
