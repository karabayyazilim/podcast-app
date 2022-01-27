<!doctype html>
<html class="no-js " lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>42 Kafası | Admin Panel</title>
    <link rel="shortcut icon" href="">
    <link rel="apple-touch-icon" href="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="icon" href="" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('/admin/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/admin/plugins/charts-c3/plugin.css')}}"/>
    <link rel="stylesheet"
          href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/morrisjs/morris.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/admin/plugins/toastr/toastr.min.css')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('/admin/css/style.min.css')}}">

    <style>
        input[type=text] {
            color: #ded4d4 !important;
        }

        input[type=email] {
            color: #ded4d4 !important;
        }

        input[type=password] {
            color: #ded4d4 !important;
        }
    </style>
</head>
@yield('css')
<body>
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('/admin/images/loader.svg')}}" width="48"
                                 height="48"></div>
        <p>Lütfen Bekleyiniz...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>


<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <li class="dropdown">
            <a href="javascript:void(0);" class="dropdown-toggle" title="App" data-toggle="dropdown" role="button"><i
                    class="zmdi zmdi-apps"></i></a>
            <ul style="height: 300px;" class="dropdown-menu slideUp2">
                <li class="header">Uygulama Kısayolları</li>
                <li class="body">
                    <ul class="menu app_sortcut list-unstyled">
                        <li class="">
                            <a href="">
                                <div class="icon-circle mb-2 bg-blue"><i class="zmdi zmdi-blogger"></i></div>
                                <p class="mb-0">Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li><a href="{{route('logout')}}" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>
<button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="/"><span class="m-l-10">Karabay Yazılım</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="/"><img src="https://www.karabayyazilim.com/uploads/hakkimizda/IMG_9231.JPG" alt="User"></a>
                    <div class="detail">
                        <h6>{{ Auth::user()->name }}</h6>
                        <small>Super Admin</small>
                    </div>
                </div>
            </li>

            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{route('admin.home')}}"><i
                        class="zmdi zmdi-home"></i><span>Anasayfa</span></a></li>
            <li class="{{ (request()->is('admin/feed')) ? 'active' : '' }}"><a href="{{route('admin.feed.index')}}"><i
                        class="zmdi zmdi-radio"></i><span>Podcast</span></a></li>
            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{route('admin.speaker.index')}}"><i
                        class="zmdi zmdi-speaker"></i><span>Konuşmacılar</span></a></li>
            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{route('admin.profile')}}"><i
                        class="zmdi zmdi-speaker"></i><span>Profil</span></a></li>
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm {{Auth::user()->role == '1' ? ' ' : 'd-none'}}">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i
                    class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Tema Seçeneği</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light">
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark">
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Renk Kaplamaları</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                        </li>
                        <li data-theme="blue" class="active">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</aside>


@yield('content')

<script src="{{asset('/admin/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('/admin/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('/admin/bundles/mainscripts.bundle.js')}}"></script>

<script src="{{asset('/admin/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('/admin/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('/admin/bundles/c3.bundle.js')}}"></script>

<script src="{{asset('/admin/js/pages/index.js')}}"></script>
<script src="{{url('https://unpkg.com/axios/dist/axios.min.js')}}"></script>
<script src="{{asset('/admin/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('/admin/plugins/toastr/custom-toastr.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{asset('js/post.js')}}"></script>

<link href="{{url('https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<script src="{{url('https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css')}}"></script>
<script>
    $(function () {
        $('#toggle-two').bootstrapToggle({
            on: 'On',
            off: 'Off'
        });
    })
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@yield('js')

