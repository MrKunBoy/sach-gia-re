@extends('admin.main')

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên khách hàng</label>
                        <input type="text" name="name" value="{{ $customer->name }}" class="form-control" id="name"
                               placeholder="Nhập tên khách hàng">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $customer->email }}" class="form-control" id="email"
                               placeholder="Nhập email">
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" id="phone"
                               placeholder="Nhập số điện thoại">
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" value="{{ $customer->address }}" class="form-control"
                               id="address" placeholder="Nhập địa chỉ">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Giới tính</label>
                <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                        <input {{$customer->gender == 0 ? 'checked="' : ''}} class="form-check-input" type="radio"
                               name="gender" id="inlineRadio1" value="0">
                        <label class="form-check-label" for="nam">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input {{$customer->gender == 1 ? 'checked="' : ''}} class="form-check-input" type="radio"
                               name="gender" id="nu" value="1">
                        <label class="form-check-label" for="nu">Nữ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input {{$customer->gender == 2 ? 'checked="' : ''}} class="form-check-input" type="radio"
                               name="gender" id="khac" value="2">
                        <label class="form-check-label" for="khac">Khác</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="content">Hình ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$customer->thumb}}" target="_blank">
                        <img src="{{$customer->thumb}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$customer->thumb}}">
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$customer->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$customer->active == 0 ? 'checked="' : ''}}>
                    <label for="unactive" class="form-check-label">Không</label>
                </div>
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>


@endsection



