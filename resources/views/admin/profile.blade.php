@extends('admin.app')

@section('content')

    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Profil Düzenle</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                        class="zmdi zmdi-home"></i> Admin</a>
                            </li>
                            <li class="breadcrumb-item active">Profil Düzenle</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                            <div class="body">
                                <form id="form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="Adınız" value="{{$user->name}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input disabled type="text" name="email" class="form-control"
                                               placeholder="Email" value="{{$user->email}}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Yeni Şifrenizi Yazınız" value=""/>
                                    </div>
                                    <br>
                                    <button onclick="createAndUpdateButton()" type="button" class="btn btn-primary save-btn">Kaydet</button>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')

    <script src="/backend/js/pages/forms/advanced-form-elements.js"></script>
    <script>
        const actionUrl = '{{route('admin.profile.update')}}';
        const backUrl = '{{route('admin.profile')}}';
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/backend/plugins/bootstrap-select/css/bootstrap-select.css"/>

@endsection
