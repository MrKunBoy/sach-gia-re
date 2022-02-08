@extends('main')
@section('content')

    @include('head_bottom1')
    @include('home.alert')
    <!-- Categorie Menu & Slider Area End Here -->
    <!-- Brand Banner Area Start Here -->
    <div class="image-banner pb-50 off-white-bg">
        <div class="container">
            <div class="col-img">
                <a href="#"><img src="/template/img/banner/h1-banner.jpg" alt="image banner"></a>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Brand Banner Area End Here -->
    <!-- Giá tốt mỗi ngày Start Here -->
    <div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
        <div class="container">
            <!-- Product Title Start -->
            <div class="post-title pb-30">
                <h2>giá tốt mỗi ngày</h2>
            </div>
            <!-- Product Title End -->
            <!-- Hot Deal Product Activation Start -->
            <div class="hot-deal-active owl-carousel">
                <!-- Single Product Start -->
                @foreach($product_new as $key => $product)
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">
                            <img height="230px" class="primary-img" src="{{$product->thumb}}" alt="single-product">

                        </a>
                        <!-- <div class="countdown" data-countdown="2020/03/01"></div> -->
                        <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i
                                class="lnr lnr-magnifier"></i></a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="#">{{$product->name}}</a></h4>
                            @if($product->price_sale == 0)
                                <p><span class="price">
                                                {{number_format($product->price,0,',','.')}} ₫
                                            </span>
                                    <del class="prev-price">
                                    </del>
                                </p>
                            @else
                                <p><span class="price">
                                                {{number_format($product->price_sale,0,',','.')}} ₫
                                            </span>
                                    <del class="prev-price">
                                        {{number_format($product->price,0,',','.')}} ₫
                                    </del>
                                </p>
                            @endif
                            <div class="label-product l_sale">+ {{$product->total_shop}} chỗ bán</div>
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="san-pham/{{$product->id}}-{{$product->slug}}.html" title="So sánh giá"> So sánh giá</a>
                            </div>
                            <div class="actions-secondary">
                                <a href="#" title="So sánh">
                                    <i class="lnr lnr-sync"></i>
                                    <span>So sánh</span>
                                </a>
                                @if(\Auth::guard('cus')->check())
                                <a title="Yêu thích" style="cursor: pointer" onclick="addWishLish('{{$product->id}}','{{\Auth::guard('cus')->user()->id}}','0','/them-yeu-thich')">
                                    <i class="lnr lnr-heart"></i>
                                    <span>Yêu thích</span>
                                </a>
                                @else
                                    <a href="{{route('show-form-login')}}" onclick="alert('Bạn cần đăng nhập để tiếp tục')">
                                        <i class="lnr lnr-heart"></i>
                                        <span>Yêu thích</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-new">new</span>
                </div>
            @endforeach
                <!-- Single Product End -->

            </div>
            <!-- Hot Deal Product Active End -->

        </div>
        <!-- Container End -->
    </div>
    <!-- Giá tốt mỗi ngày End Here -->


    <!-- Top mã giảm giá Start Here -->
    <div class="main-brand-banner pt-95 pb-100 pt-sm-55 pb-sm-60">
        <div class="container">
            <div class="section-ttitle mb-30">
                <h2>Top mã giảm giá</h2>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-3">
                    <div class="col-img">
                        <img class="banner-topma" src="/frontend/img/banner/baner_left.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Brand Banner Start -->
                    <div class="brand-banner owl-carousel">
                        <div class="single-brand">
                            <a href="/shops/2-cua-hang-tiki.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-tiki.png"
                                             alt="brand-image"></a>
                            <a href="/shops/1-cua-hang-shopee.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-shopee.png"
                                             alt="brand-image"></a>
                            <a href="/shops/3-cua-hang-lazada.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-lazada-vietnam.png"
                                             alt="brand-image"></a>
                        </div>
                        <div class="single-brand">
                            <a href="/shops/6-cua-hang-fahasa.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-adayroi.png"
                                             alt="img_topma brand-image"></a>
                            <a href="/shops/12-cua-hang-aeoneshop.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-aeoneshop.png"
                                             alt="brand-image"></a>
                            <a href="/shops/11-cua-hang-yes24.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-yes24-vietnam.png"
                                             alt="brand-image"></a>
                        </div>
                        <div class="single-brand">
                            <a href="/shops/9-cua-hang-airbnb.html"><img class="img_topma img" src="/frontend/img/top_ma/airbnb-200x100.png"
                                             alt="brand-image"></a>
                            <a href="/shops/10-cua-hang-fpt-shop.html"><img class="img_topma img" src="/frontend/img/top_ma/fpt-shop-200x100.png"
                                             alt="brand-image"></a>
                            <a href="/shops/13-cua-hang-cellphones.html"><img class="img_topma img" src="/frontend/img/top_ma/cellphones-200x100.png"
                                             alt="brand-image"></a>
                        </div>
                        <div class="single-brand">
                            <a href="/shops/14/cua-hang-fado.html"><img class="img_topma img"
                                             src="/frontend/img/top_ma/logo-fado-200x100.png"
                                             alt="brand-image"></a>
                            <a href="/shops/15/cua-hang-vietravel.html"><img class="img_topma img" src="/frontend/img/top_ma/vietravel-200x100.png"
                                             alt="brand-image"></a>
                            <a href="/shops/16-cua-hang-the-face-shop.html"><img class="img_topma img" src="/frontend/img/top_ma/the-face-shop-200x100.png"
                                             alt="brand-image"></a>
                        </div>
                        <div class="single-brand">
                            <a href="/shops/18-cua-hang-vua-bia.html"><img class="img_topma img" src="/frontend/img/top_ma/ma-giam-gia-vuabia.png"
                                             alt="brand-image"></a>
                            <a href="/shops/17-cua-hang-agoda.html"><img class="img_topma img" src="/frontend/img/top_ma/agoda-200x100.png"
                                             alt="brand-image"></a>
                            <a href="/shops/19-cua-hang-shop-vnexpress.html"><img class="img_topma img" src="/frontend/img/top_ma/shop-vnexpress-200x100.png"
                                             alt="brand-image"></a>
                        </div>
                    </div>
                    <!-- Brand Banner End -->

                </div>
                <div class="col-lg-3">
                    <div class="col-img">
                        <img class="banner-topma" src="/frontend/img/banner/banner_right.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Top mã giảm giá Area End Here -->

    <!-- Danh mục sách Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-15">
                    <div class="section-ttitle">
                        <h2>Danh mục sách</h2>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        @foreach($menus as $key => $menu)
                        <li class="nav-item">
                            <a class="nav-link {{$key == 0 ? 'active' : ''}}" data-toggle="tab" href="#{{$menu->slug}}">{{$menu->name}}</a>
                        </li>
                        @endforeach

                    </ul>

                </div>

                <!-- Tab Contetn Start -->
                <div class="tab-content">

                    @foreach($menus as $key => $menu)

                    <div id="{{$menu->slug}}" class="tab-pane fade {{$key == 0 ? 'show active' : ''}}">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            @foreach($product_all as $key => $product)
                                @if($product->menu_id == $menu->id)
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="san-pham/{{$product->id}}-{{$product->slug}}.html">
                                        <img height="230px" class="primary-img" src="{{$product->thumb}}"
                                             alt="single-product">
                                    </a>
                                    <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal"
                                       title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a href="#">{{$product->name}}</a></h4>
                                        @if($product->price_sale == 0)
                                        <p><span class="price">
                                                {{number_format($product->price,0,',','.')}} ₫
                                            </span>
                                            <del class="prev-price">
                                            </del>
                                        </p>
                                        @else
                                            <p><span class="price">
                                                {{number_format($product->price_sale,0,',','.')}} ₫
                                            </span>
                                                <del class="prev-price">
                                                    {{number_format($product->price,0,',','.')}} ₫
                                                </del>
                                            </p>
                                        @endif
                                        <div class="label-product l_sale">+ {{$product->total_shop}} chỗ bán</div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="san-pham/{{$product->id}}-{{$product->slug}}.html" title="So sánh giá"> So sánh giá</a>
                                        </div>
                                        <div class="actions-secondary">
                                            <a href="#" title="Compare"><i class="lnr lnr-sync"></i>
                                                <span>So sánh</span></a>
                                            @if(\Auth::guard('cus')->check())
                                                <a title="Yêu thích" style="cursor: pointer" onclick="addWishLish('{{$product->id}}','{{\Auth::guard('cus')->user()->id}}','0','/them-yeu-thich')">
                                                    <i class="lnr lnr-heart"></i>
                                                    <span>Yêu thích</span>
                                                </a>
                                            @else
                                                <a href="{{route('show-form-login')}}" onclick="alert('Bạn cần đăng nhập để tiếp tục')">
                                                    <i class="lnr lnr-heart"></i>
                                                    <span>Yêu thích</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                                    @endif
                                @endforeach
                        </div>
                        <!-- Arrivals Product Activation End Here -->
                    </div>
                    @endforeach

                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Danh mục sách End Here -->

    <!-- Mã khuyến mãi Start Here -->
    <div class="second-arrivals-product pb-45 pb-sm-5">
        <div class="container">
            <div class="main-product-tab-area">
                <div class="tab-menu mb-15">
                    <div class="section-ttitle">
                        <h2>Mã giảm giá</h2>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav tabs-area" role="tablist">
                        @foreach($shops as $key => $shop)
                        <li class="nav-item">
                            <a class="nav-link {{$key == 0 ? 'active' : ''}}" data-toggle="tab" href="#{{$shop->slug}}">{{$shop->name}}</a>
                        </li>
                        @endforeach

                    </ul>

                </div>

                <!-- Tab Contetn Start -->
                <div class="tab-content">
                    @foreach($shops as $key => $shop)
                    <div id="{{$shop->slug}}" class="tab-pane fade {{$key == 0 ? 'show active' : ''}}">
                        <!-- Arrivals Product Activation Start Here -->
                        <div class="best-seller-pro-active owl-carousel">
                            <!-- Single Product Start -->
                            @foreach($coupons as $key => $coupon)
                                @if($coupon->shop_id == $shop->id)
                            <div class="single-coupon">
                                <div class="coupon-top pro-info">
                                    <h4><a class="name-coupon" href="{{$coupon->slug}}.html">Giảm {{$coupon->title}}</a></h4>
                                    <p class="des-coupon-p"><span class="des-coupon">{{$coupon->description}}</span></p>

                                    <p class="time-coupon--icon"><span class="lnr lnr-clock"></span><span style="margin-left: 5px">{{$coupon->due_date}}</span>
                                    </p>
                                    <p class="apply-coupon-p"><span class="apply-coupon"><strong>Điều kiện: </strong>{{$coupon->content}}</span></p>
                                </div>
                                <!-- Product Content Start -->
                                <div class="coupon-bottom pro-content">
                                    <div class="">
                                        <div class="coupon-primary actions-primary">
                                            <a style="cursor: pointer; color: #ffffff" onclick="copyCode('{{$coupon->coupon_code}}')"> Lấy mã</a>
                                        </div>
                                        <div class="coupon-secondary actions-secondary">
                                            <a class="coupon-add-far" href="{{$coupon->link}}" title="Chi tiết"
                                               target="_blank"><i class="lnr lnr-location"></i>
                                                <span>Chi tiết</span></a>
                                            @if(\Auth::guard('cus')->check())
                                                <a class="coupon-add-far" title="Yêu thích" style="cursor: pointer" onclick="addWishLish('0','{{\Auth::guard('cus')->user()->id}}','{{$coupon->id}}','/them-yeu-thich')">
                                                    <i class="lnr lnr-heart"></i>
                                                    <span>Yêu thích</span>
                                                </a>
                                            @else
                                                <a class="coupon-add-far" href="{{route('show-form-login')}}" onclick="alert('Bạn cần đăng nhập để tiếp tục')">
                                                    <i class="lnr lnr-heart"></i>
                                                    <span>Yêu thích</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                            <!-- Single Product End -->
                                @endif
                            @endforeach
                        </div>
                        <!-- Arrivals Product Activation End Here -->
                    </div>
                    @endforeach
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- main-product-tab-area-->
        </div>
        <!-- Container End -->
    </div>
    <!-- Mã khuyến mãi End Here -->



@endsection

