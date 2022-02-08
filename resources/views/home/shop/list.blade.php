@extends('main')
@section('content')

    @include('head_bottom2')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="/shops">Danh sách cửa hàng</a></li>
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
                    @foreach($shops as $key => $shop)
                        <div class="col-lg-3 col-sm-12">
                            <a href="/shops/{{$shop->id}}-{{$shop->slug}}.html">
                            <div class="single-latest-shop">

                                <div class="shop">
                                    <img width="100%" src="{{$shop->thumb}}" alt="blog-image">
                                </div>

                                <div class="shop-name">
                                    <span style="font-size: 18px;color: #000000; font-weight: 700;">{{$shop->name}}</span>
                                </div>

                            </div>
                            </a>
                        </div>
                @endforeach
                <!-- Single Blog End -->
                </div>
                <!-- Row End -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="pro-pagination">
                            {!! $shops -> links() !!}
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
