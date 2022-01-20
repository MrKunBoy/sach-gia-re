<!-- Latest Blog Area Start Here -->
<div class="blog-area ptb-95 off-white-bg ptb-sm-55">
    <div class="container">
        <div class="like-product-area">
            <h2 class="section-ttitle2 mb-30">Bài viết mới nhất</h2>
            <!-- Latest Blog Active Start Here -->
            <div class="latest-blog-active owl-carousel">
                <!-- Single Blog Start -->
                @foreach($posts as $key => $post)
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
                @endforeach
                <!-- Single Blog End -->
            </div>
            <!-- Latest Blog Active End Here -->
        </div>
        <!-- main-product-tab-area-->
    </div>
    <!-- Container End -->
</div>
<!-- Latest Blog s Area End Here -->

<!-- Support Area Start Here -->
<div class="support-area bdr-top">
    <div class="container">
        <div class="d-flex flex-wrap text-center">
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-gift"></i>
                </div>
                <div class="support-desc">
                    <h6>Ưu đãi</h6>
                    <span>Hàng ngàn ưu đãi hấp dẫn.</span>
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-rocket"></i>
                </div>
                <div class="support-desc">
                    <h6>Nhanh chóng</h6>
                    <span>Tìm kiêm nhanh chống, thuận tiện.</span>
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-lock"></i>
                </div>
                <div class="support-desc">
                    <h6>Bảo mật</h6>
                    <span>Bảo mật uy tính, đáng tin cậy.</span>
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-enter-down"></i>
                </div>
                <div class="support-desc">
                    <h6>Tự tin chọn lựa</h6>
                    <span>Thoải mái lựa chọn sản phẩm.</span>
                </div>
            </div>
            <div class="single-support">
                <div class="support-icon">
                    <i class="lnr lnr-users"></i>
                </div>
                <div class="support-desc">
                    <h6>Trợ giúp 24/7</h6>
                    <span>Trung tâm trợ giúp phục vụ 24/7.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Support Area End Here -->
<!-- Footer Area Start Here -->
<footer class="off-white-bg2 pt-95 bdr-top pt-sm-55">
    <!-- Footer Top Start -->
    <div class="footer-top">
        <div class="container">
            <!-- Signup Newsletter Start -->
            <div class="row mb-60">
                <div class="col-xl-7 col-lg-7 ml-auto mr-auto col-md-8">
                    <div class="news-desc text-center mb-30">
                        <h3>Đăng ký bản tin</h3>
                        <p>Hãy là người đầu tiên đăng ký nhận bản tin ngày hôm nay</p>
                    </div>
                    <div class="newsletter-box">
                        <form action="#">
                            <input class="subscribe" placeholder="Nhập email của bạn" name="email" id="subscribe" type="text">
                            <button type="submit" class="submit">đăng ký!</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Signup-Newsletter End -->
            <div class="row">
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Thông tin</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="about.html">Giới thiệu</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Điều khoản & Điều kiện</a></li>
                                <li><a href="contact.html">Câu hỏi thường gặp</a></li>
                                <li><a href="login.html">Thông tin sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Dịch vụ khách hàng</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                                <li><a href="#">Danh sách mong muốn</a></li>
                                <li><a href="#">Hồ sơ trang web</a></li>
                                <li><a href="#">Phiếu quà tặng</a></li>
                                <li><a href="#">Sơ đồ trang web</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Bổ sung</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">Nhãn hiệu</a></li>
                                <li><a href="#">Phiếu quà tặng</a></li>
                                <li><a href="#">Bản tin</a></li>
                                <li><a href="#">Chi nhánh</a></li>
                                <li><a href="#">Đặc biệt</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Tài khoản của tôi</h3>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="contact.html">Liên hệ</a></li>
                                <li><a href="#">Lợi nhuận</a></li>
                                <li><a href="#">Tài khoản</a></li>
                                <li><a href="#">Bản tin</a></li>
                                <li><a href="#">Yêu thích</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer mb-sm-40">
                        <h3 class="footer-title">Tài khoản của tôi</h3>
                        <div class="footer-content">
                            <ul class="footer-list address-content">
                                <li><i class="lnr lnr-map-marker"></i> Địa chỉ: Ngư Thủy Bắc,Lệ Thủy, Quảng Bình</li>
                                <li><i class="lnr lnr-envelope"></i><a href="mailto:mail@mail.com">Email: tn757922@mail.com</a></li>
                                <li>
                                    <i class="lnr lnr-phone-handset"></i><a class="navbar-tel" href="tel:+00 151515">Phone: +899633453</a>
                                </li>
                            </ul>
                            <div class="payment mt-25 bdr-top pt-30">
                                <a href="#"><img class="img" src="/frontend/img/payment/1.png" alt="payment-image"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Top End -->
    <!-- Footer Middle Start -->
    <div class="footer-middle text-center">
        <div class="container">
            <div class="footer-middle-content pt-20 pb-30">
                <ul class="social-footer">
                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                    <!-- <li><a href="#"><img src="img\icon\social-img1.png" alt="google play"></a></li>
                    <li><a href="#"><img src="img\icon\social-img2.png" alt="app store"></a></li> -->
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Middle End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom pb-30">
        <div class="container">

            <div class="copyright-text text-center">
                <p><a target="_blank" href="http://sachgiare.com:81/">sachgiare.com</a> - So sánh, tìm kiếm giá sách rẻ nhất</p>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Bottom End -->
</footer>
<!-- Footer Area End Here -->
<!-- Quick View Content Start -->
{{--<div class="main-product-thumbnail quick-thumb-content">--}}
{{--    <div class="container">--}}
{{--        <!-- The Modal -->--}}
{{--        <div class="modal fade" id="myModal">--}}
{{--            <div class="modal-dialog modal-lg modal-dialog-centered">--}}
{{--                <div class="modal-content">--}}
{{--                    <!-- Modal Header -->--}}
{{--                    <div class="modal-header">--}}
{{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                    </div>--}}
{{--                    <!-- Modal body -->--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="row">--}}
{{--                            <!-- Main Thumbnail Image Start -->--}}
{{--                            <div class="col-lg-5 col-md-6 col-sm-5">--}}
{{--                                <!-- Thumbnail Large Image start -->--}}
{{--                                <div class="tab-content">--}}
{{--                                    <div id="thumb-1" class="tab-pane fade show active">--}}
{{--                                        <a data-fancybox="images" href="img\products\35.jpg"><img src="img\products\35.jpg" alt="product-view"></a>--}}
{{--                                    </div>--}}
{{--                                    <div id="thumb-2" class="tab-pane fade">--}}
{{--                                        <a data-fancybox="images" href="img\products\13.jpg"><img src="img\products\13.jpg" alt="product-view"></a>--}}
{{--                                    </div>--}}
{{--                                    <div id="thumb-3" class="tab-pane fade">--}}
{{--                                        <a data-fancybox="images" href="img\products\15.jpg"><img src="img\products\15.jpg" alt="product-view"></a>--}}
{{--                                    </div>--}}
{{--                                    <div id="thumb-4" class="tab-pane fade">--}}
{{--                                        <a data-fancybox="images" href="img\products\4.jpg"><img src="img\products\4.jpg" alt="product-view"></a>--}}
{{--                                    </div>--}}
{{--                                    <div id="thumb-5" class="tab-pane fade">--}}
{{--                                        <a data-fancybox="images" href="img\products\5.jpg"><img src="img\products\5.jpg" alt="product-view"></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Thumbnail Large Image End -->--}}
{{--                                <!-- Thumbnail Image End -->--}}
{{--                                <div class="product-thumbnail mt-20">--}}
{{--                                    <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">--}}
{{--                                        <a class="active" data-toggle="tab" href="#thumb-1"><img src="img\products\35.jpg" alt="product-thumbnail"></a>--}}
{{--                                        <a data-toggle="tab" href="#thumb-2"><img src="img\products\13.jpg" alt="product-thumbnail"></a>--}}
{{--                                        <a data-toggle="tab" href="#thumb-3"><img src="img\products\15.jpg" alt="product-thumbnail"></a>--}}
{{--                                        <a data-toggle="tab" href="#thumb-4"><img src="img\products\4.jpg" alt="product-thumbnail"></a>--}}
{{--                                        <a data-toggle="tab" href="#thumb-5"><img src="img\products\5.jpg" alt="product-thumbnail"></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Thumbnail image end -->--}}
{{--                            </div>--}}
{{--                            <!-- Main Thumbnail Image End -->--}}
{{--                            <!-- Thumbnail Description Start -->--}}
{{--                            <div class="col-lg-7 col-md-6 col-sm-7">--}}
{{--                                <div class="thubnail-desc fix mt-sm-40">--}}
{{--                                    <h3 class="product-header">Printed Summer Dress</h3>--}}
{{--                                    <div class="pro-price mtb-30">--}}
{{--                                        <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span class="price">$15.19</span><span class="saving-price">save 8%</span></p>--}}
{{--                                    </div>--}}
{{--                                    <p class="mb-20 pro-desc-details">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>--}}
{{--                                    <div class="product-size mb-20 clearfix">--}}
{{--                                        <label>Size</label>--}}
{{--                                        <select class="">--}}
{{--                                            <option>S</option>--}}
{{--                                            <option>M</option>--}}
{{--                                            <option>L</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="color mb-20">--}}
{{--                                        <label>color</label>--}}
{{--                                        <ul class="color-list">--}}
{{--                                            <li>--}}
{{--                                                <a class="orange active" href="#"></a>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <a class="paste" href="#"></a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="box-quantity d-flex">--}}
{{--                                        <form action="#">--}}
{{--                                            <input class="quantity mr-40" type="number" min="1" value="1">--}}
{{--                                        </form>--}}
{{--                                        <a class="add-cart" href="cart.html">add to cart</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="pro-ref mt-15">--}}
{{--                                        <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Thumbnail Description End -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Modal footer -->--}}
{{--                    <div class="custom-footer">--}}
{{--                        <div class="socila-sharing">--}}
{{--                            <ul class="d-flex">--}}
{{--                                <li>share</li>--}}
{{--                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Quick View Content End -->
</div>
<!-- Main Wrapper End Here -->


<!-- jquery 3.2.1 -->
<script src=" /frontend/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Countdown js -->
<script src=" /frontend/js/jquery.countdown.min.js"></script>
<!-- Mobile menu js -->
<script src=" /frontend/js/jquery.meanmenu.min.js"></script>
<!-- ScrollUp js -->
<script src=" /frontend/js/jquery.scrollUp.js"></script>
<!-- Nivo slider js -->
<script src=" /frontend/js/jquery.nivo.slider.js"></script>
<!-- Fancybox js -->
<script src=" /frontend/js/jquery.fancybox.min.js"></script>
<!-- Jquery nice select js -->
<script src=" /frontend/js/jquery.nice-select.min.js"></script>
<!-- Jquery ui price slider js -->
<script src=" /frontend/js/jquery-ui.min.js"></script>
<!-- Owl carousel -->
<script src=" /frontend/js/owl.carousel.min.js"></script>
<!-- Bootstrap popper js -->
<script src=" /frontend/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src=" /frontend/js/bootstrap.min.js"></script>
<!-- Plugin js -->
<script src=" /frontend/js/plugins.js"></script>
<!-- Main activaion js -->
<script src=" /frontend/js/main.js"></script>
<!--upload-->
<script src="/frontend/js/upload.js "></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVgMenRywdyO2lPZQZl5iLzuxopSZr3dI&callback=initMap&libraries=&v=weekly"
    async
></script>
