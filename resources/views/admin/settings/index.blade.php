@extends('admin.app')

@section('content')


    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Site Ayarları</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                        class="zmdi zmdi-home"></i> Admin</a></li>
                            <li class="breadcrumb-item active">Site Ayarları</li>
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
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Site Ayar</strong> Ekle</h2>
                                </div>
                                <div class="body">
                                    <div class="panel-group" id="accordion_1" role="tablist"
                                         aria-multiselectable="true">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title"><a role="button" data-toggle="collapse"
                                                                           data-parent="#accordion_1"
                                                                           href="#collapseOne_1"
                                                                           aria-expanded="true"
                                                                           aria-controls="collapseOne_1"> Ayar
                                                        Ekle </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse in"
                                                 role="tabpanel"
                                                 aria-labelledby="headingOne_1">
                                                <div class="panel-body">
                                                    <form id="form-data">
                                                        @csrf
                                                        <div class="form-group row col-md-11">
                                                            <div class="col-md-4 mt-2">
                                                                <input type="text" name="key"
                                                                       class="form-control" required=""
                                                                       placeholder="Anahtar Kelime Yazınız">
                                                            </div>

                                                            <div class="col-md-4 mt-2">
                                                                <select class="form-control show-tick" name="type" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                                    <option value="textarea" data-select2-id="3">
                                                                        Textarea
                                                                    </option>
                                                                    <option value="img">İmage</option>
                                                                    <option value="input">Text</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-4 mt-2">
                                                                <button onclick="createAndUpdateButton()" type="button"
                                                                        class="btn btn-primary btn-block save-btn"> Kaydet
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h2><strong>Site</strong> Ayarları </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                        <tr>
                                            <th>Anahtar Kelime</th>
                                            <th>Değer</th>
                                            <th>İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($settings as $setting)
                                            <tr>
                                                <td>{{$setting->key}}</td>
                                                <td>{{$setting->value}}</td>
                                                <td>
                                                    <a href="{{route('admin.setting.edit',$setting->id)}}"
                                                       class="btn btn-primary">Düzenle</a>
                                                    <button onclick="deleteButton(this,`${{route('admin.setting.destroy',$setting->id)}}`)"
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
    <script>
        const actionUrl = '{{route('admin.setting.create')}}';
        const backUrl = '{{route('admin.setting.index')}}';
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/admin/plugins/bootstrap-select/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
@endsection
