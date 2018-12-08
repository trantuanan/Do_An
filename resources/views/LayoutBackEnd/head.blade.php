<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{!! asset('upload/icon/logo.png') !!}"/>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script> -->
    <script type="text/javascript" src="/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="/js/masonry.pkgd.js"></script>
    <script type="text/javascript" src="/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="/js/custom.js"></script>
    <!-- <script type="text/javascript" src="/js/dateFormat.js"></script> -->
</head>