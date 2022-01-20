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
                    <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            @include('home.alert')
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
                                <a href="/profile"
                                   class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <div>
                                        <img width="24" height="24" src="/frontend/img/logo/hoso.png">
                                        <span class="text-secondary">Hồ sơ</span>
                                    </div>
                                    <span class="lnr lnr-chevron-right"></span>
                                </a>
                            </li>
                            <li>
                                <a href="/profile"
                                   class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
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
                    <form action="" method="POST">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mật khẩu</h6>
                                    </div>
                                    <input type="password" name="password" class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mật khẩu mới</h6>
                                    </div>
                                    <input type="password" name="new_password" class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nhập lại mật khẩu mới</h6>
                                    </div>
                                    <input type="password" name="confirm_password" value=""
                                           class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection

