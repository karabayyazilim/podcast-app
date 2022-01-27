@extends('admin.app')

@section('content')

    <section class="content blog-page">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Podcast Düzenle</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class="zmdi zmdi-home"></i>
                                    Admin</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('admin.feed.index')}}">Podcastler</a></li>
                            <li class="breadcrumb-item active">Podcast Düzenle</li>
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

                                <center>
                                    <div class="img-fluid">
                                        <img style="width: 80%; height: auto;" src="/storage/{{$feed->image}}"
                                             id="coverImageShow" alt="feed image">
                                    </div>
                                </center>
                                <br><br>

                                <hr style="height: 50px"/>
                                <form id="form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <h2 class="card-inside-title">Resim Seçin</h2>
                                        <input id="coverImage" type="file" class="form-control" name="image"
                                               placeholder="Resim Seçin"/>
                                    </div>

                                    <div class="form-group">
                                        <h2 class="card-inside-title">Ses Dosyası Seçin</h2>
                                        <input id="coverImage" type="file" class="form-control" name="src_url"
                                               placeholder="Ses Dosyası Seçin"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control"
                                               placeholder="Feed Başlığı Yazınız" value="{{$feed->title}}"/>
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="4" name="description" class="form-control no-resize"
                                                  placeholder="Açıklama...">{{$feed->description}}</textarea>
                                    </div>
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

    <script src="/admin/plugins/summernote/dist/summernote.js"></script>
    <script src="/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="/admin/plugins/momentjs/moment.js"></script>
    <script src="/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="/admin/js/pages/forms/basic-form-elements.js"></script>
    <script>
        $("#coverImage").change(function () {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#coverImageShow').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    <script>
        const actionUrl = '{{route('admin.feed.update', $feed)}}';
        const backUrl = '{{route('admin.feed.index')}}';
    </script>

@endsection

@section('css')

    <link rel="stylesheet" href="/admin/plugins/summernote/dist/summernote.css"/>
    <link rel="stylesheet" href="/admin/plugins/bootstrap-select/css/bootstrap-select.css"/>
    <link href="/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
@endsection
