@extends('admin.app')

@section('content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Podcastler</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href=""><i
                                        class="zmdi zmdi-home"></i> Admin</a></li>
                            <li class="breadcrumb-item active">Podcastler</li>
                        </ul>

                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                        <a href="{{route('admin.feed.create')}}" class="btn btn-success btn-icon float-right"
                           type="button"><i class="zmdi zmdi-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @foreach($feeds as $feed)
                    <div class="blogitem mb-5 col-lg-6 col-md-6" id="blog-post">
                        <div class="blogitem-image">
                            <a href="{{route('admin.feed.edit',$feed)}}">
                                <img width="100%" height="300" src="/storage/{{$feed->image}}" alt="blog image">
                            </a>
                            <span class="blogitem-date">{{$feed->created_at}}</span>
                        </div>
                        <div class="blogitem-content">
                            <h5><a href=""></a></h5>
                            <p>{{$feed->description}}</p>
                            <a href="a" target="_blank"
                               class="btn btn-outline-dark">Bloğa Git</a>
                            <a href="{{route('admin.feed.edit',$feed)}}"
                               class="btn btn-info">Düzenle</a>
                            <button onclick="deleteButton(this,`${{route('admin.feed.destroy',$feed)}}`)"
                                    class="btn btn-danger">Sil
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="/admin/plugins/sweetalert2/sweetalert2.min.js"></script>

@endsection

@section('css')

@endsection

