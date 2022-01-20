@extends('main')
@section('content')

    @include('head_bottom2')

    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb">
                <ul class="d-flex align-items-center">
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="{{route('show-contact')}}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>

    <!-- Contact Email Area Start -->
    <div class="contact-area ptb-50 ptb-sm-60">
        <div class="container">
            <h3 class="mb-20">Liên hệ chúng tôi</h3>
            <form id="contact-form" class="contact-form" action="mail.php" method="post">
                <div class="address-wrapper row">
                    <div class="col-md-12">
                        <div class="address-fname">
                            <input class="form-control" type="text" name="name" placeholder="Tên">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="address-email">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="address-web">
                            <input class="form-control" type="text" name="website" placeholder="Website">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="address-subject">
                            <input class="form-control" type="text" name="subject" placeholder="Tiêu đề">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="address-textarea">
                            <textarea name="message" class="form-control" placeholder="Nội dung"></textarea>
                        </div>
                    </div>
                </div>
                <p class="form-message">
                <div class="footer-content mail-content clearfix">
                    <div class="send-email float-md-right">
                        <input value="Gửi" class="return-customer-btn" type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Email Area End -->
    <!-- Google Map Start -->
    <div class="goole-map">
        <div id="map" style="height:400px; width: 100%"></div>
    </div>
    <!-- Google Map End -->
@endsection
