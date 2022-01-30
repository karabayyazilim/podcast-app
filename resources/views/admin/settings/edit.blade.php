@extends('admin.app')

@section('content')

    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Site Ayar Düzenle</h2>
                        <ul class="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i
                                            class="zmdi zmdi-home"></i> Admin</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.setting.index')}}">Site Ayarlar</a>
                                </li>
                                <li class="breadcrumb-item active">Site Ayar Düzenle</li>
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
                                    @method('PUT')
                                    <label>{{$setting->key}}</label>
                                    @if($setting->type == 'input')
                                        <div class="form-group">
                                            <input type="text" name="value" value="{{$setting->value}}"
                                                   class="form-control"
                                                   placeholder="{{$setting->description}} Adı Yazınız">
                                        </div>
                                    @elseif($setting->type == 'textarea')
                                        <div class="form-group">
                                            <textarea name="value"
                                                      class="form-control" id="" cols="30"
                                                      rows="10">{{$setting->value}}</textarea>
                                        </div>
                                    @else
                                        <div class="form-group ">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" name="value"
                                                           placeholder="Resim Seçin"/>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <button type="button" onclick="createAndUpdateButton()" class="btn btn-primary save-btn">
                                        Kaydet
                                    </button>
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
    <script>
        const actionUrl = '{{route('admin.setting.update', $setting->id)}}';
        const backUrl = '{{route('admin.setting.index')}}';
    </script>
@endsection

@section('css')

@endsection
