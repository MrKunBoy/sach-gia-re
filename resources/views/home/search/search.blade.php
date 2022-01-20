@extends('main')
@section('content')

    @include('head_bottom2')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="#">{{$title}}</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Page Start -->
    <div class="main-shop-page pb-100 ptb-sm-60">
        <div class="container">
            <!-- Row End -->
            <div class="row">
                <!-- Sidebar Shopping Option Start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="sidebar">
                        <!-- Sidebar Electronics Categorie Start -->
{{--                        <div class="electronics mb-40">--}}
{{--                            <h3 class="sidebar-title">{{$title}}</h3>--}}
{{--                            <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">--}}
{{--                                <ul>--}}
{{--                                    {!! \App\Helpers\Helper::menuschid($menuChild,$menu->id)!!}--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <!-- category-menu-end -->--}}
{{--                        </div>--}}
                        <!-- Sidebar Electronics Categorie End -->
                        <!-- Price Filter Options Start -->
                    {{--                        <div class="search-filter mb-40">--}}
                    {{--                            <h3 class="sidebar-title">Lọc theo giá</h3>--}}
                    {{--                            <form action="#" class="sidbar-style">--}}
                    {{--                                <div id="slider-range"></div>--}}
                    {{--                                <input type="text" id="amount" class="amount-range" readonly="">--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                    <!-- Price Filter Options End -->

                        <!-- Product Top Start -->
                        <div class="top-new mb-40">
                            <h3 class="sidebar-title">Mới nhất</h3>
                            <div class="side-product-active owl-carousel">
                                <div class="side-pro-item">
                                    @foreach($product_new as $product)
                                        <div class="single-product single-product-sidebar">
                                            <!-- Product Image Start -->
                                            <div class="pro-img">
                                                <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">
                                                    <img class="primary-img" src="{{$product->thumb}}" alt="single-product">
                                                </a>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="pro-content">
                                                <h4><a class="name-product-new" href="/san-pham/{{$product->id}}-{{$product->slug}}.html">{{$product->name}}</a></h4>
                                                <p><span class="price">{{number_format($product->price)}} ₫</span><del class="prev-price">{{number_format($product->price_sale)}} ₫</del></p>
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
                                <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a>
                                </li>
                                <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
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
                                        <option value="{{\Request::url()}}?sort_by=kytu_az">Lọc theo tên, A đến Z</option>
                                        <option value="{{\Request::url()}}?sort_by=kytu_za">Lọc theo tên, Z đến A</option>
                                        <option value="{{\Request::url()}}?sort_by=tang_dan">Giá thấp đến cao</option>
                                        <option value="{{\Request::url()}}?sort_by=giam_dan">Giá cao đến thấp</option>
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
                            <div id="grid-view" class="tab-pane fade show active">
                                <div class="row">
                                    <!-- Single Product Start -->
                                    @foreach($products as $key => $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">
                                                        <img height="260px" class="primary-img"
                                                             src="{{$product->thumb}}" alt="single-product">

                                                    </a>
                                                    <!-- <div class="countdown" data-countdown="2020/03/01"></div> -->
                                                    <a href="#" class="quick_view" data-toggle="modal"
                                                       data-target="#myModal" title="Quick View"><i
                                                            class="lnr lnr-magnifier"></i></a>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <div class="pro-info">
                                                        <h4><a href="#">{{$product->name}}</a></h4>
                                                        @if($product->price_sale == 0)
                                                            <p>
                                                                <span class="price">
                                                                    {{number_format($product->price,0,',','.')}} ₫
                                                                </span>
                                                                <del class="prev-price">
                                                                </del>
                                                            </p>
                                                        @else
                                                            <p>
                                                                <span class="price">
                                                                    {{number_format($product->price_sale,0,',','.')}} ₫
                                                                </span>
                                                                <del class="prev-price">
                                                                    {{number_format($product->price,0,',','.')}} ₫
                                                                </del>
                                                            </p>
                                                        @endif
                                                        <div class="label-product l_sale">+ {{$product->total_shop}} chỗ
                                                            bán
                                                        </div>
                                                    </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html" title="So sánh giá"> So
                                                                sánh giá</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" title="Compare"><i class="lnr lnr-sync"></i>
                                                                <span>So sánh</span></a>
                                                            <a href="#" title="WishList"><i class="lnr lnr-heart"></i>
                                                                <span>Yêu thích</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                        </div>
                                        <!-- Single Product End -->
                                    @endforeach
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- #grid view End -->
                            <div id="list-view" class="tab-pane fade">
                                <!-- Single Product Start -->
                                @foreach($products as $key => $product)
                                    <div class="single-product">
                                        <div class="row">
                                            <!-- Product Image Start -->
                                            <div class="col-lg-4 col-md-5 col-sm-12">
                                                <div class="pro-img">
                                                    <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">
                                                        <img class="primary-img" src="{{$product->thumb}}"
                                                             alt="single-product">
                                                    </a>
                                                    <a href="#" class="quick_view" data-toggle="modal"
                                                       data-target="#myModal" title="Quick View"><i
                                                            class="lnr lnr-magnifier"></i></a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                            </div>
                                            <!-- Product Image End -->
                                            <!-- Product Content Start -->
                                            <div class="col-lg-8 col-md-7 col-sm-12">
                                                <div class="pro-content hot-product2">
                                                    <h4><a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">{{$product->name}}</a></h4>
                                                    <p><span class="price">
                                                        @if($product->price_sale == 0)
                                                                {{number_format($product->price)}} ₫
                                                            @else
                                                                {{number_format($product->price_sale)}} ₫
                                                            @endif
                                                    </span></p>
                                                    <p>{{$product->description}}</p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html" title="So sánh giá"> So
                                                                sánh giá</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" title="Compare"><i class="lnr lnr-sync"></i>
                                                                <span>So sánh</span></a>
                                                            <a href="#" title="WishList"><i class="lnr lnr-heart"></i>
                                                                <span>Yêu thích</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Content End -->
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                @endforeach
                            </div>
                            {!! $products -> links() !!}
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

