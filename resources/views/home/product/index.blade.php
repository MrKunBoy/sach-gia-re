@extends('main')
@section('content')

    @include('head_bottom2')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/danh-muc/{{$product->menu->id}}-{{$product->menu->slug}}.html">
                            {{$product->menu->name}}
                        </a>
                    </li>
                    <li class="active"><a href="#">{{$title}}</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail ptb-50 ptb-sm-60">
        <div class="container">
            <div class="thumb-bg">
                <div class="row">
                    <!-- Main Thumbnail Image Start -->
                    <div class="col-lg-4 mb-all-40">
                        <!-- Thumbnail Large Image start -->
                        <div class="tab-content">
                            <div id="thumb" class="tab-pane fade show active">
                                <a data-fancybox="images" href="{{$product->thumb}}">
                                    <img src="{{$product->thumb}}" alt="product-view">
                                </a>
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                    </div>
                    <!-- Main Thumbnail Image End -->
                    <!-- Thumbnail Description Start -->
                    <div class="col-lg-8">
                        <div class="thubnail-desc fix">
                            <h3 class="product-header">{{$product->name}}</h3>
                            <div class="rating-summary fix mtb-10">
                                <div class="rating">
                                    @for ($i = 1; $i <= $total_rating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                    @for ($i = 1; $i <= 5-$total_rating; $i++)
                                         <i class="fa fa-star-o"></i>
                                    @endfor

                                    <p></p>
                                </div>

                            </div>
                            <div class="pro-price mtb-30">
                                <p class="d-flex align-items-center">
                                    <span class="prev-price">{{number_format($product->price) }} ₫</span>
                                    <span class="price">{{number_format($product->price_sale) }} ₫</span>
                                    <span class="saving-price">giảm {{ceil(($product->price - $product->price_sale)/$product->price*100)}}%</span>
                                </p>
                            </div>
                            <p class="mb-20 pro-desc-details">{{$product->description}}</p>

                            <div class="box-quantity d-flex hot-product2">

                                <div class="pro-actions">
                                    <div class="actions-primary">
                                        <a href="{{$product->link}}" target="_blank" title="Tới nơi bán"> Tới nơi bán rẻ
                                            nhất</a>
                                    </div>

                                </div>
                            </div>

                            <div class="pro-ref mt-20">
                                <div class="action-wishlist actions-secondary">
                                    <a class="mr-10" href="compare.html" title="" data-original-title="Compare">
                                        <i class="lnr lnr-sync"></i>
                                        <span>So sánh</span>
                                    </a>
                                    @if(\Auth::guard('cus')->check())
                                        <a title="Yêu thích" style="cursor: pointer"
                                           onclick="addWishLish('{{$product->id}}','{{\Auth::guard('cus')->user()->id}}','0','/them-yeu-thich')">
                                            <i class="lnr lnr-heart"></i>
                                            <span>Yêu thích</span>
                                        </a>
                                    @else
                                        <a href="{{route('show-form-login')}}"
                                           onclick="alert('Bạn cần đăng nhập để tiếp tục')">
                                            <i class="lnr lnr-heart"></i>
                                            <span>Yêu thích</span>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="socila-sharing mt-25">
                                <span>Ngày cập nhật: {{date_format($product->updated_at,'d-m-Y')}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Description End -->
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-100 pb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc nav tabs-area" role="tablist">
                        <li><a id="sosanhgia" data-toggle="tab" href="#sosanh">So sánh giá</a></li>
                        <li><a data-toggle="tab" href="#description">Mô tả</a></li>
                        <li><a data-toggle="tab" href="#detail">Thông tin chi tiết</a></li>
                        <li><a class="active" id="binhluan" data-toggle="tab" href="#tabcoments">Bình luận</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content border-default">
                        <div id="sosanh" class="tab-pane fade">
                            @foreach($locations as $location)
                                <div class="row compare-item">
                                    <div class="col-lg-2">

                                        <a class="compare-merchant" href="{{$location->link}}" target="_blank">
                                        <span class="compare-logo">
                                            @if($location->domain == 'vinabook.com')
                                                <img width="110px" class="lazyload"
                                                     src="/frontend/img/shop/vinabook.png">
                                            @elseif($location->domain == 'salabookz.com')
                                                <img width="110px" class="lazyload"
                                                     src="/frontend/img/shop/salabook.png">
                                            @else
                                                <img width="110px" class="lazyload" src="/frontend/img/shop/fahasa.jpg">
                                            @endif
                                        </span>
                                            <span>{{$location->domain}}</span>
                                        </a>


                                    </div>
                                    <div class="col-lg-10">
                                        <div class="compare-item-wrap">
                                            <div class="compare-item-container">
                                                <div class="compare-info">
                                                    <h3 class="compare-product-title">
                                                        <a class="store-item is-trusted" href="{{$location->link}}"
                                                           target="_blank">{{$location->name}}</a>
                                                    </h3>
                                                    <div>Ngày cập
                                                        nhật: {{date_format($location->updated_at,'d-m-Y')}}</div>
                                                </div>
                                                <div class="compare-market">
                                                    <p><span class="price">
                                                {{number_format($location->price_sale)}} ₫
                                            </span>
                                                        <del class="prev-price">
                                                            {{number_format($location->price)}} ₫
                                                        </del>
                                                    </p>
                                                </div>
                                                <div class="compare-button">
                                                    <a class="compare-product-view" href="{{$location->link}}"
                                                       target="_blank">
                                                        Tới nơi bán
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div id="description" class="tab-pane fade">

                            {!! $product->content !!}
                        </div>
                        <div id="detail" class="tab-pane fade">

                            {!! $product->details !!}
                        </div>
                        <div id="tabcoments" class="tab-pane fade show active">
                            <!-- Reviews Start -->
                            <div class="row">
                                <!-- Reviews Start -->
                                <div class="col-lg-5 review border-default universal-padding">
                                    {{--                                    <form action="">--}}
                                    <h2 class="review-title mb-30">Viết bình luận</h2>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span style="font-size: 15px">Đánh giá sao</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <!-- Single Review List End -->

                                    </ul>
                                    <!-- Reviews Field Start -->
                                    <div class="riview-field mt-20 mb-10">
                                        <input type="hidden" name="id_product" value="{{$product->id}}">
                                        @if(\Auth::guard('cus')->check())
                                            <div class="form-group">
                                                <label class="req" for="comments">Nội dung đánh giá</label>
                                                <textarea name="content-comment" class="content-comment form-control"
                                                          rows="5" id="comments"
                                                          required="required"></textarea>
                                            </div>
                                            <button type="submit"
                                                    onclick="addComment('{{$product->id}}','{{\Auth::guard('cus')->user()->id}}','/add-comment')"
                                                    class="customer-btn">Gửi đánh giá
                                            </button>
                                        @else
                                            <div class="form-group">
                                                <label class="req" for="comments">Nội dung đánh giá</label>
                                                <textarea class="form-control" rows="5" id="comments"></textarea>
                                            </div>
                                            <input class="btn-submit-comment-unactive" disabled="disabled" type="submit"
                                                   value="Gửi đánh giá" class="customer-btn">
                                        @endif
                                    </div>
                                    <!-- Reviews Field Start -->
                                    {{--                                    </form>--}}
                                </div>
                                <!-- Reviews End -->
                                <div class="col-lg-7 review border-default universal-padding">
                                    <div class="group-title">
                                        <h2>Nhận xét</h2>
                                    </div>
                                    @foreach($comments as $key => $comment)
                                        <div class="pt-10 row compare-item">
                                            <div class="col-lg-1">
                                                <a class="compare-merchant" href="#" target="_blank">
                                                    <span class="compare-logo">
                                                        @if($comment->customer->thumb == null)
                                                        <img width="50px" class="rounded-circle"
                                                             src="/frontend/img/logo/avatar7.png">
                                                        @else
                                                            <img width="50px" class="rounded-circle"
                                                                 src="{{$comment->customer->thumb}}">
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="compare-item-wrap">
                                                    <div class="m-0 compare-item-container">
                                                        <div class="m-0 compare-info"
                                                             style="flex: initial; max-width: 100%;">
                                                            <h3 class="mt-0 compare-product-title"
                                                                style="font-size: 18px">
                                                                <a class="store-item is-trusted" style="color: green">
                                                                    {{$comment->customer->email}}
                                                                </a>
                                                            </h3>
                                                            <div class="d-flex">
                                                                <span class="mr-20"
                                                                      style="font-style: italic">{{date_format($comment->created_at,'d-m-Y') }}</span>
                                                                <ul class="review-list">
                                                                    <!-- Single Review List Start -->
                                                                    <li>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </li>
                                                                    <!-- Single Review List End -->
                                                                </ul>
                                                            </div>
                                                            <div style="font-size: 16px">{{$comment->content}}</div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @foreach($comment_reply as $key1 => $comment_rep)
                                        @if($comment_rep->comment_parent_id == $comment->id)
                                        <div class="comamin-reply-admin pt-10 row compare-item">
                                            <div class="col-lg-1">
                                                <a class="compare-merchant" href="#" target="_blank">
                                                    <span class="compare-logo">
{{--                                                        @if($comment->customer->thumb == null)--}}
                                                            <img width="50px" class="rounded-circle"
                                                                 src="{{$comment_rep->customer->thumb}}">
{{--                                                        else--}}
{{--                                                            <img width="50px" class="rounded-circle"--}}
{{--                                                                 src="{{$comment->customer->thumb}}">--}}
{{--                                                        @endif@--}}
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="compare-item-wrap">
                                                    <div class="m-0 compare-item-container">
                                                        <div class="m-0 compare-info"
                                                             style="flex: initial; max-width: 100%;">
                                                            <h3 class="mt-0 compare-product-title"
                                                                style="font-size: 18px">
                                                                <a class="store-item is-trusted" style="color: green">
                                                                    @Admin
                                                                </a>
                                                            </h3>
                                                            <div class="d-flex">
                                                                <span class="mr-20"
                                                                      style="font-style: italic">{{date_format($comment_rep->created_at,'d-m-Y') }}</span>
                                                            </div>
                                                            <div style="font-size: 16px">{{$comment_rep->content}}</div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <!-- Reviews End -->

                            </div>
                        </div>
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->
    <!-- Realted Products Start Here -->
    <div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
        <div class="container">
            <!-- Product Title Start -->
            <div class="post-title pb-30">
                <h2>Sách liên quan</h2>
            </div>
            <!-- Product Title End -->
            <!-- Hot Deal Product Activation Start -->
            <div class="hot-deal-active owl-carousel">
                <!-- Single Product Start -->
                @foreach($productsMore as $key => $product)
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html">
                                <img height="230px" class="primary-img" src="{{$product->thumb}}" alt="single-product">

                            </a>
                            <!-- <div class="countdown" data-countdown="2020/03/01"></div> -->
                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal"
                               title="Quick View"><i
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
                                    <a href="/san-pham/{{$product->id}}-{{$product->slug}}.html" title="So sánh giá"> So
                                        sánh giá</a>
                                </div>
                                <div class="actions-secondary">
                                    <a href="#" title="Compare"><i class="lnr lnr-sync"></i>
                                        <span>So sánh</span></a>
                                    @if(\Auth::guard('cus')->check())
                                        <a title="Yêu thích" style="cursor: pointer"
                                           onclick="addWishLish('{{$product->id}}','{{\Auth::guard('cus')->user()->id}}','0','/them-yeu-thich')">
                                            <i class="lnr lnr-heart"></i>
                                            <span>Yêu thích</span>
                                        </a>
                                    @else
                                        <a href="{{route('show-form-login')}}"
                                           onclick="alert('Bạn cần đăng nhập để tiếp tục')">
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
    <!-- Realated Products End Here -->
@endsection
