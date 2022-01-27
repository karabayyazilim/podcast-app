@extends('admin.app')

@section('content')


    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Konuşmacılar</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                        class="zmdi zmdi-home"></i> Admin</a></li>
                            <li class="breadcrumb-item active">Konuşmacılar</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                        <a href="{{route('admin.speaker.create')}}" class="btn btn-success btn-icon float-right"
                           type="button"><i class="zmdi zmdi-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>Konuşmacılar</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>Adı Soyadı</th>
                                            <th>İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($speakers as $speaker)
                                            <tr>
                                                <td>{{$speaker->name}}</td>
                                                <td>
                                                    <a href="{{route('admin.speaker.edit', $speaker)}}"
                                                       class="btn btn-primary">Düzenle</a>
                                                    <button onclick="deleteButton(this,`${{route('admin.speaker.destroy',$speaker)}}`)"
                                                            class="btn btn-danger "><i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('js')
    <script src="/admin/bundles/datatablescripts.bundle.js"></script>
    <script src="/admin/js/pages/tables/jquery-datatable.js"></script>
    <script src="/admin/js/pages/forms/advanced-form-elements.js"></script>

@endsection

@section('css')
    <link rel="stylesheet" href="/admin/plugins/bootstrap-select/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
@endsection
