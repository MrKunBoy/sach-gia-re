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
                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin khách hàng</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            @include('home.alert')
            <form action="/profile-edit/{{$customer->id}}" method="POST">
                <div class="row gutters-sm">

                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="mt-3">
                                        <div class="form-group">
                                            <div id="image_show">
                                                <a href="{{$customer->thumb}}" target="_blank">
                                                    <img src="{{$customer->thumb}}" class="rounded-circle" width="150px">
                                                </a>
                                            </div>
                                            <h4 for="upload">Hình ảnh</h4>
                                            <input type="file" name="file" class="form-control" id="upload">

                                            <input type="hidden" name="thumb" id="thumb" value="{{$customer->thumb}}">
                                        </div>

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
                                    <a href="/profile-change-password/{{$customer->id}}"
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
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tên</h6>
                                    </div>
                                    <input type="text" name="name" value="{{$customer->name}}" class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <input disabled type="text" name="email" value="{{$customer->email}}" class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Số điện thoại</h6>
                                    </div>
                                    <input type="text" name="phone" value="{{$customer->phone}}" class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Giới tính</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-check form-check-inline">
                                            <input {{$customer->gender == 0 ? 'checked="' : ''}} class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0">
                                            <label class="form-check-label" for="nam">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input {{$customer->gender == 1 ? 'checked="' : ''}} class="form-check-input" type="radio" name="gender" id="nu" value="1">
                                            <label class="form-check-label" for="nu">Nữ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input {{$customer->gender == 2 ? 'checked="' : ''}} class="form-check-input" type="radio" name="gender" id="khac" value="2">
                                            <label class="form-check-label" for="khac">Khác</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Địa chỉ</h6>
                                    </div>
                                    <input type="text" name="address" value="{{$customer->address}}" class="col-sm-9 form-control"/>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @csrf
            </form>
        </div>
    </div>


@endsection
