
@extends('main')
@section('content')

    @include('head_bottom2')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/posts">Bài viết</a></li>
                    <li class="active"><a href="#">{{$title}}</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Single Blog Page Start Here -->
    <div class="single-blog ptb-100  ptb-sm-60">
        <div class="container">
            <div class="row">
                <!-- Single Blog Sidebar Start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside>
                        <div class="single-sidebar latest-pro mb-30">
                            <h3 class="sidebar-title">Tìm kiếm</h3>
                            <form>
                                <input type="text" class="form-control">
                                <input style="margin-top: 10px" type="submit" class="btn btn-info" value="Tìm">
                            </form>
                        </div>
                        <div class="tags mb-30">
                            <h3 class="sidebar-title">Tags</h3>
                            <div class="sidbar-style">
                                <ul class="tag-list">
                                    <li><a href="#">Sách mới</a></li>
                                    <li><a href="#">Review</a></li>
                                    <li><a href="#">Đánh giá</a></li>
                                    <li><a href="#">Tin tức</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-img ">
                            <a href="shop.html"><img src="/frontend/img/banner/banner-sidebar.jpg" alt="slider-banner"></a>
                        </div>

                    </aside>
                </div>
                <!-- Single Blog Sidebar End -->
                <!-- Single Blog Sidebar Description Start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="single-sidebar-desc mb-all-40">
                        <div class="sidebar-img">
                            <img src="{{$post_detail->thumb}}" alt="single-blog-img">
                        </div>
                        <div class="sidebar-post-content">
                            <h3 class="sidebar-lg-title">{{$post_detail->title}}</h3>
                            <ul class="post-meta d-sm-inline-flex">
                                <li>Reviewsach.net</li>
                                <li><span> Ngày cập nhật: {{date_format($post_detail->updated_at,"d/m/Y")}}</span></li>
                            </ul>
                        </div>
                        <div class="sidebar-desc mb-50">
                            {!! $post_detail->content !!}
                        </div>
                        <!-- Contact Email Area Start -->
                        <div class="blog-detail-contact">
                            <h3 class="mb-15 leave-reply">Phản hồi</h3>
                            <div class="submit-review">
                                <form>
                                    <div class="form-group">
                                        <label for="usr">Tên của bạn:</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>
                                    <div class="form-group">
                                        <label for="usr">Email của bạn:</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="web-address">Website Url:</label>
                                        <input type="text" class="form-control" id="web-address">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub">Tiêu đề:</label>
                                        <input type="text" class="form-control" id="sub">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Nội dung:</label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                    <div class="sbumit-reveiew">
                                        <input value="Gửi" class="return-customer-btn" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Contact Email Area End -->
                    </div>
                </div>
                <!-- Single Blog Sidebar Description End -->
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Single Blog Page End Here -->

@endsection
