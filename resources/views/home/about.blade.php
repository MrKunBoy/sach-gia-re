@extends('main')
@section('content')

    @include('head_bottom2')

    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="{{route('show-about')}}">Giới thiệu</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>

    <div class="cart-main-area wish-list ptb-50 ptb-sm-60">
        <div class="container">
    <h1>Giới thiệu</h1>
    <p>sachgiare.com là website so sánh giá, review sản phẩm, chia sẻ thông tin khuyến mại, mã giảm giá, kinh nghiệm mua sắm hữu ích. Chúng tôi không bán hàng, vui lòng liên hệ nơi bán để tìm hiểu thêm thông tin.</p>
        </div>
    </div>
    @endsection
