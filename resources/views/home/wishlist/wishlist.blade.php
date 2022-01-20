
@extends('main')
@section('content')

    @include('head_bottom2')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="/">Trang chủ</a></li>
                <li class="active"><a href="{{route('show-wishlist')}}">Yêu thích</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Wish List Start -->
<div class="cart-main-area wish-list ptb-50 ptb-sm-60">
    <div class="container">
        @if(\Auth::guard('cus')->check())
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4>Sách</h4>
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-remove">Xóa</th>
                                <th class="product-thumbnail">Hình ảnh</th>
                                <th class="product-name">Tên sách</th>
                                <th class="product-price">Giá khuyến mãi</th>
                                <th class="product-price">Giá bán</th>
                                <th class="product-quantity">Nơi bán</th>
                                <th class="product-subtotal"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist_product as $wishlist)

                                {!! \App\Helpers\Helper::showWishlistPro($wishlist,$products) !!}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h4 style="margin-top: 50px">Mã giảm giá</h4>
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-remove">Xóa</th>
                                <th class="product-name">Giảm</th>
                                <th class="product-price">Tiêu đề</th>
                                <th class="product-price">Điều kiện</th>
                                <th class="product-quantity">Hạn dùng</th>
                                <th class="product-subtotal"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist_coupon as $wishlist)

                                {!! \App\Helpers\Helper::showWishlistCop($wishlist,$coupons) !!}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                </form>
                <!-- Form End -->
            </div>
        </div>
    @else
            <h1>Chưa có sản phẩm yêu thích</h1>
        @endif
        <!-- Row End -->
    </div>
</div>
<!-- Wish List End -->

@endsection
