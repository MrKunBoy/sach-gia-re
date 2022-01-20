
@extends('main')
@section('content')

    @include('head_bottom2')

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Khách hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin khách hàng</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="
                                @if(\Auth::guard('cus')->check())
                                    @if(\Auth::guard('cus')->user()->thumb == null)
                                        /frontend/img/logo/avatar7.png
                                    @else
                                    {{\Auth::guard('cus')->user()->thumb}}
                                    @endif
                                @else
                                    /frontend/img/logo/avatar7.png
                                @endif
                                " alt="Khách hàng" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{\Auth::guard('cus')->user()->name}}</h4>
                                    <p class="text-secondary mb-1">{{\Auth::guard('cus')->user()->email}}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-menu-profile list-group list-group-flush">
                            <li>
                                <a href="/profile" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div>
                                        <img width="24" height="24" src="/frontend/img/logo/hoso.png">
                                        <span class="text-secondary">Hồ sơ</span>
                                    </div>
                                    <span class="lnr lnr-chevron-right"></span>
                                </a>
                            </li>
                            <li>
                                <a href="profile-change-password/{{\Auth::guard('cus')->user()->id}}" class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div>
                                        <img width="24" height="24" src="/frontend/img/logo/change.png">
                                        <span class="text-secondary">Đổi mật khẩu</span>
                                    </div>
                                    <span class="lnr lnr-chevron-right"></span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Tên</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{\Auth::guard('cus')->user()->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{\Auth::guard('cus')->user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Số điện thoại</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{\Auth::guard('cus')->user()->phone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Giới tính</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if(\Auth::guard('cus')->user()->gender == 0)
                                        Nam
                                    @elseif(\Auth::guard('cus')->user()->gender == 1)
                                        Nữ
                                    @else
                                        Khác
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Địa chỉ</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{\Auth::guard('cus')->user()->address}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info" href="/profile-edit/{{\Auth::guard('cus')->user()->id}}">Sửa hồ sơ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
