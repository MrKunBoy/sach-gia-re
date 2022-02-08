@extends('main')
@section('content')

    @include('head_bottom2')

<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="/">Trang chủ</a></li>
                <li class="active"><a href="/posts">Bài viết</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Blog Page Start Here -->
<div class="blog ptb-50  ptb-sm-60">
    <div class="container">
        <div class="main-blog">
            <div class="row">
                <!-- Single Blog Start -->
                @foreach($posts as $key => $post)
                <div class="col-lg-6 col-sm-12">

                        <div class="single-latest-blog">
                            <div class="blog-img">
                                <a href="/posts/{{$post->id}}-{{$post->slug}}.html"><img src="{{$post->thumb}}" alt="blog-image"></a>
                            </div>
                            <div class="blog-desc">
                                <h4><a href="/posts/{{$post->id}}-{{$post->slug}}.html">{{$post->title}}</a></h4>
                                <ul class="meta-box d-flex">
                                </ul>
                                <p>{{$post->description}}</p>
                                <a class="readmore" href="/posts/{{$post->id}}-{{$post->slug}}.html">Xem thêm</a>
                            </div>
                            <div class="blog-date">
                                <span>{{App\Helpers\Helper::day($post->updated_at)}}</span>
                                T{{App\Helpers\Helper::month($post->updated_at)}}
                            </div>
                        </div>

                </div>
            @endforeach
                <!-- Single Blog End -->
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="pro-pagination">
                        {!! $posts -> links() !!}
                    </div>
                    <!-- Product Pagination Info -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Blog Page End Here -->
@endsection
