<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{$title}}</title>

{{--<link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">--}}
<link rel="icon" href="/backend/admin/favicon.ico">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/backend/admin/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="/backend/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/backend/admin/dist/css/adminlte.min.css">
<link rel="stylesheet" href="/backend/admin/css/product.css">

@yield('head')
