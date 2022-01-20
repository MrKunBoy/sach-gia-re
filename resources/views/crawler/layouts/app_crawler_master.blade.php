
<!doctype html>
<html lang="en">
<head>
    @include('crawler.layouts.head')
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/admin"><i class="fas fa-home"></i> Trang quản trị</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            @foreach(config('nav.crawler.nav') as $nav)
            <li class="nav-item {{\Request::route()->getName() == $nav['route'] ? 'active' : ''}}">
                <a class="nav-link" href="{{route($nav['route'])}}">{{$nav['name']}}</span></a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
<div class="card-header">
    <h3 class="card-title">{{$title}}</small></h3>
</div>
@include('crawler.layouts.alert')
@yield('crawler_content')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@include('crawler.layouts.footer')
</body>
</html>

