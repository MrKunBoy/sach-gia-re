@extends('admin.main')

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" value="{{ $coupon->title }}" class="form-control" id="title"
                               placeholder="Nhập tiêu đề khuyến mãi">
                    </div>
                    <div class="form-group">
                        <label for="coupon_code">Mã khuyến mãi</label>
                        <input type="text" name="coupon_code" value="{{ $coupon->coupon_code }}" class="form-control"
                               id="coupon_code" placeholder="Nhập mã khuyến mãi">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" value="{{ $coupon->link}}" class="form-control" id="link"
                               placeholder="Nhập link">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="due_date">Hạn dùng</label>
                        <input type="text" name="due_date" value="{{ $coupon->due_date }}" class="form-control"
                               id="due_date" placeholder="Nhập hạn dùng">
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <div class="form-group">
                <label for="">Cửa hàng</label>
                <select class="form-control select2" name="shop_id">
                    @foreach($shops as $shop)
                        <option
                            {{$shop->id == $coupon->shop_id ? 'selected' : ''}}  value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description">{{ $coupon->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea name="content" class="form-control" id="content">{{ $coupon->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$coupon->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$coupon->active == 0 ? 'checked="' : ''}}>
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




