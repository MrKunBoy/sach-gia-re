@extends('main')
@section('content')

    @include('head_bottom2')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/shops">Cửa hàng</a></li>
                    <li class="active"><a href="#">{{$title}}</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->

    <div class="breadcrumb-area mt-30 mb-30">
        <div class="container">
            <div class="breadcrumb">
                <div class="inner shadow-box">
                    <div class="inner-content clearfix d-flex">
                        <div class="header-thumb m-auto">
                            <div class="header-store-thumb">
                                <a rel="nofollow" target="_blank" title="{{$shop_detail->name}}" href="{{$shop_detail->link}}">
                                    <img width="200" height="100" src="{{$shop_detail->thumb}}" alt="{{$shop_detail->name}}" title="{{$shop_detail->name}}">						</a>
                            </div>

                        </div>
                        <div class="header-content ml-30">
                            <h1>{{$shop_detail->description}}</h1>
                            {!! $shop_detail->content !!}
                            <!-- kk-star-ratings -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </div>

    <!-- Shop Page Start -->
    <div class="main-shop-page pb-100 ptb-sm-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="sidebar">
                        <!-- Sidebar Electronics Categorie Start -->
                        <div class="electronics mb-40">
                            <h3 class="sidebar-title">Danh sách cửa hàng</h3>
                            <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                <ul>
                                    @foreach($shops as $shop)
                                        <li><a href="/shops/{{$shop->id}}-{{$shop->slug}}.html">{{$shop->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- category-menu-end -->
                        </div>
                        <!-- Sidebar Electronics Categorie End -->

                        <!-- Product Top Start -->
                        <div class="top-new mb-40">
                            <h3 class="sidebar-title">Sách Mới nhất</h3>
                            <div class="side-product-active owl-carousel">
                                <div class="side-pro-item">
                                    @foreach($product_new as $product)
                                        <div class="single-product single-product-sidebar">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">
                                                    <img class="primary-img" src="{{$product->thumb}}"
                                                         alt="single-product">
                                                </a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a class="name-product-new"
                                                       href="/san-pham/{{$product->id}}-{{$product->slug}}.html">{{$product->name}}</a>
                                                </h4>
                                                <p><span class="price">{{number_format($product->price_sale)}} ₫</span>
                                                    <del class="prev-price">{{number_format($product->price)}}₫
                                                    </del>
                                                </p>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Product Top End -->
                        <!-- Single Banner Start -->
                        <div class="col-img">
                            <a href="shop.html"><img src="/frontend/img/banner/banner-sidebar.jpg" alt="slider-banner"></a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
                <!-- Sidebar Shopping Option End -->
                <!-- Product Categorie List Start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Grid & List View Start -->
                    <div
                        class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                        <div class="grid-list-view  mb-sm-15">
                            <ul class="nav tabs-area d-flex align-items-center">
                                {{--                                <li><a  data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a>--}}
                                {{--                                </li>--}}
                                <li><a class="active" data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Toolbar Short Area Start -->
                        <div class="main-toolbar-sorter clearfix">
                            <div class="toolbar-sorter d-flex align-items-center">
                                <label>Sắp xếp:</label>
                                <form>
                                    @csrf
                                    <select name="sort" id="sort" class="sorter-wide">
                                        <option value="{{\Request::url()}}?sort_by=none" selected="">Mặc định</option>
                                        <option value="{{\Request::url()}}?sort_by=kytu_az">Lọc theo tên, A đến Z
                                        </option>
                                        <option value="{{\Request::url()}}?sort_by=kytu_za">Lọc theo tên, Z đến A
                                        </option>
                                        <option value="{{\Request::url()}}?sort_by=sap_het_han">Sắp hết hạn</option>
                                        <option value="{{\Request::url()}}?sort_by=da_het_han">Dã hết hạn</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- Toolbar Short Area End -->

                    </div>
                    <!-- Grid & List View End -->
                    <div class="main-categorie mb-all-40">
                        <!-- Grid & List Main Area End -->
                        <div class="tab-content fix">
                            <div id="list-view" class="tab-pane fade show active">
                                <!-- Single Product Start -->
                                @foreach($coupons as $key => $coupon)
                                    <div class="mb-pb-5 single-product">
                                        <div class="row">
                                            <!-- Product Image Start -->
                                            <div class="padd-right-0 col-lg-3 col-md-5 col-sm-12">
                                                <div class="store-thumb-link mgg-code">
                                                    <div class="store-thumb text-thumb">
                                                        {{$coupon->title}}            </div>
                                                </div>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="padd-left-0 col-lg-9 col-md-7 col-sm-12 ">
                                                <div class="p-l-15 backgr-coupon pro-content hot-product2">
                                                    <h4 style="height: 50px" class="mb-0"><a style="white-space: pre-wrap"
                                                                                             href="/">{{$coupon->description}}</a></h4>
                                                    <p class="mt-0">Hạn SD: {{$coupon->due_date}}</p>
                                                    <div class="mt-10-impo pro-actions">
                                                        <div class="actions-primary">
                                                            <a target="_blank" href="{{$coupon->link}}" onclick="copyCode('{{$coupon->coupon_code}}')"> Lấy mã</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="{{$coupon->link}}" title="Chi tiết"
                                                               target="_blank"><i class="lnr lnr-location"></i>
                                                                <span>Chi tiết</span></a>
                                                            @if(\Auth::guard('cus')->check())
                                                                <a title="Yêu thích" style="cursor: pointer"
                                                                   onclick="addWishLish('0','{{\Auth::guard('cus')->user()->id}}',{{$coupon->id}},'/them-yeu-thich')">
                                                                    <i class="lnr lnr-heart"></i>
                                                                    <span>Yêu thích</span>
                                                                </a>
                                                            @else
                                                                <a title="Yêu thích" href="{{route('show-form-login')}}"
                                                                   onclick="alert('Bạn cần đăng nhập để tiếp tục')">
                                                                    <i class="lnr lnr-heart"></i>
                                                                    <span>Yêu thích</span>
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div style="margin-left: 170px"><a class="dieu-kien"
                                                                                           style="cursor: pointer"
                                                                                           onclick="addClass({{$coupon->id}})">Điều
                                                                kiện <i class="lnr lnr-lnr lnr-chevron-down"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                        <div class="coupon-footer coupon-listing-footer">
                                            <div id="dieukien_{{$coupon->id}}" class="reveal-content">
                                                <p>{{$coupon->content}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->

                                @endforeach
                            </div>
                            {!! $coupons -> links() !!}
                        </div>
                        <!-- Grid & List Main Area End -->
                    </div>
                </div>
                <!-- product Categorie List End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Shop Page End -->

@endsection
