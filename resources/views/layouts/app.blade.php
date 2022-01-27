<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" href="https://www.42istanbul.com.tr/wp-content/uploads/2021/04/42_istanbul-1.svg" type="image/png">
    <link rel="shortcut icon" href="https://www.42istanbul.com.tr/wp-content/uploads/2021/04/42_istanbul-1.svg">
    <!-- Custom Css -->
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/style.min.css">

    <style>
        body {
            overflow: hidden;
            background: #ececec;
        }
    </style>

<body class="theme-blush">
<div id="app">

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="/admin/bundles/libscripts.bundle.js"></script>
<script src="/admin/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>
