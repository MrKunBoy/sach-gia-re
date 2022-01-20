
<!-- Banner Popup Start -->
<div class="popup_banner">
    <span class="popup_off_banner">×</span>
    <div class="banner_popup_area">
        <img src="/frontend/img/banner/BigSale_T1221_mainbanner__1263x60.jpg" alt="">
    </div>
</div>
<!-- Banner Popup End -->

<!-- Newsletter Popup Start -->
<div class="popup_wrapper">
    <div class="test">
        <span class="popup_off">Close</span>
        <div class="subscribe_area text-center mt-60">
            <h2>Đăng ký nhận bản tin</h2>
            <p>Theo dõi danh sách gửi thư để nhận thông tin cập nhật về hàng mới, ưu đãi đặc biệt và thông tin giảm giá
                khác.</p>
            <div class="subscribe-form-group">
                <form action="#">
                    <input autocomplete="off" type="text" name="message" id="message" placeholder="Nhập địa chỉ email">
                    <button type="submit">Đăng ký</button>
                </form>
            </div>
            <div class="subscribe-bottom mt-15">
                <input type="checkbox" id="newsletter-permission">
                <label for="newsletter-permission">Không hiển thị cửa sổ bật lên này một lần nữa</label>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Popup End -->
<!-- Main Header Area Start Here -->
<header>

    <!-- Header Middle Start Here -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-3 col-md-12">
                    <div class="logo mb-all-30">
                        <a href="/"><img class="img-logo" src="/frontend/img/logo/logocam.png" alt="logo-image"></a>
                    </div>
                </div>
                <!-- Categorie Search Box Start Here -->
                <div class="col-lg-6 col-md-8 ml-auto mr-auto col-10">
                    <div class="categorie-search-box">
                        <form action="{{route('tim-kiem')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <select class="bootstrap-select" name="search_pro_bycate">
                                    <option value="0">Tất cả danh mục</option>
                                    @foreach($menuparents as $key => $menusearch)
                                    <option value="{{$menusearch->id}}">{{$menusearch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="keywords_submit" placeholder="Nhập sách tìm giá">
{{--                            <button><i class="lnr lnr-magnifier"></i></button>--}}
                            <input type="submit" name="search_btn" class="btn-tim-kiem" value="Tìm kiếm">
                        </form>
                    </div>
                </div>
                <!-- Categorie Search Box End Here -->
                <!-- Cart Box Start Here -->
                <div class="col-lg-3 col-md-12">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                            <li><a class="navbar-cart" href="#">
                                    {{--                                    <i class="navbar-cart--icon far fa-bell"></i>--}}
                                    <span class="navbar-cart--icon lnr lnr-alarm"></span>
                                    <span class="navbar-cart--text">THÔNG BÁO</span>
                                </a>
                            @if(\Auth::guard('cus')->check())
                                <!-- Dropdown Start -->
                                <ul class="dropdown-notify ht-dropdown">

                                    <h3 class="header__favorite-heading">Thông Báo Mới Nhận</h3>
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="/frontend/img/notify/ma_shopee.png" alt=""
                                                 class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">[SHOPEE]- Free vận chuyển Đơn hàng đầu tiên</span>
                                                <span
                                                    class="header__notify-description">Mã giảm giá cập nhật mới nhất</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a href="" class="header__notify-link">
                                            <img src="/frontend/img/notify/ma_shopee.png" alt=""
                                                 class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">SHOPEE – VOUCHER GIẢM 20K DÀNH CHO KHÁCH HÀNG MỚI</span>
                                                <span
                                                    class="header__notify-description">Mã giảm giá cập nhật mới nhất</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="/frontend/img/notify/ma_shopee.png" alt=""
                                                 class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Mã Giảm Giá 10%</span>
                                                <span
                                                    class="header__notify-description">Mã giảm giá cập nhật mới nhất</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item header__notify-item--viewed">
                                        <a href="" class="header__notify-link">
                                            <img src="/frontend/img/notify/ma_shopee.png" alt=""
                                                 class="header__notify-img">
                                            <div class="header__notify-info">
                                                <span class="header__notify-name">Mã Giảm Giá 5%</span>
                                                <span class="header__notify-description">Mã giảm giá cập nhật mới nhất</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="header__notify-item">
                                        <a class="header__notify-all" href="#">Xem tất cả</a>
                                    </li>

                                </ul>
                            @endif
                            <li>
                                <a class="navbar-cart" href="/wishlist">
                                    <i class="navbar-cart--icon lnr lnr-heart"></i>
{{--                                    @if(\Auth::guard('cus')->check())--}}
{{--                                    <span class="header__favorite-notice">3</span>--}}
{{--                                    @endif--}}
                                    <span class="navbar-cart--text">YÊU THÍCH ({{$countwishlist}})</span>

                                </a>
                            </li>
                            <li>

                                @if(\Auth::guard('cus')->check())
                                <a class="navbar-cart" href="{{route('show-profile-home')}}">
                                    <span class="navbar-cart--icon lnr lnr-user"></span>
                                    <span class="navbar-cart--text">TÀI KHOẢN</span>
                                </a>
                                <!-- Dropdown Start -->
                                <ul class="dropdown-account ht-dropdown">
                                    <li class="dropdown-account--link"><a href="{{route('show-profile-home')}}">Thông tin tài khoản</a></li>

                                    <li class="dropdown-account--link"><a href="{{route('logout-home')}}">Đăng xuất</a>
                                    </li>
                                </ul>
                                @else
                                <a class="navbar-cart" href="{{route('show-form-register')}}">
                                    <span class="navbar-cart--icon lnr lnr-enter"></span>
                                    <span class="navbar-cart--text">SIGN UP/LOGIN</span>
                                </a>
                            @endif
                                <!-- Dropdown End -->
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Cart Box End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End Here -->
    <!-- Header Bottom Start Here -->
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                    <span class="categorie-title">Danh mục sách hay</span>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 ">
                    <nav class="d-none d-lg-block">
                        <ul class="header-bottom-list d-flex">
                            <li class="active"><a href="/">Trang chủ</a></li>
                            <li><a href="/coupons">Mã giảm giá</a></li>
                            <li><a href="/shops">Cửa hàng</a> </li>
                            <li><a href="/posts">Bài viết</a>
{{--                                <i class="fa fa-angle-down"></i>--}}
{{--                                <ul class="ht-dropdown">--}}
{{--                                    <li><a href="#">Đánh giá</a></li>--}}
{{--                                    <li><a href="#">Tin tức</a></li>--}}
{{--                                </ul>--}}
                            </li>
                            <li><a href="/abouts">Giới thiệu</a></li>
                            <li><a href="/contacts">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="/">Trang chủ</a></li>
                                <li><a href="/coupons">Mã giảm giá</a></li>
                                <li><a href="/shops">Cửa hàng</a></li>
                                <li><a href="/posts">Bài viết </a>
{{--                                    <ul>--}}
{{--                                        <li><a href="#">Đánhh giá</a></li>--}}
{{--                                        <li><a href="#">Tin tức</a></li>--}}
{{--                                    </ul>--}}
                                </li>
                                <li><a href="/abouts">Giới thiệu</a></li>
                                <li><a href="/contacts">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End Here -->
    <!-- Mobile Vertical Menu Start Here -->
    <div class="container d-block d-lg-none">
        <div class="vertical-menu mt-30">
            <span class="categorie-title mobile-categorei-menu">Danh mục sách hay</span>
            <nav>
                <div id="cate-mobile-toggle"
                     class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                    <ul>

                        {!! \App\Helpers\Helper::menusmobile($menus)!!}
                    </ul>
                </div>
                <!-- category-menu-end -->
            </nav>
        </div>
    </div>
    <!-- Mobile Vertical Menu Start End -->
</header>
<!-- Main Header Area End Here -->
<!-- Categorie Menu & Slider Area Start Here -->


