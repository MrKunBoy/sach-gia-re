@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên cửa hàng</label>
                        <input type="text" name="name" value="{{ $shop->name }}" class="form-control" id="name" placeholder="Nhập tên của hàng">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" value="{{ $shop->link }}" class="form-control" id="link" placeholder="Nhập link">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description" >{{ $shop->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea name="content" class="form-control" id="content" >{{ $shop->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Hình ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$shop->thumb}}" target="_blank">
                        <img src="{{$shop->thumb}}" width="100px">
                    </a>
                </div>
                <input type="hidden" value="{{$shop->thumb}}" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$shop->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$shop->active == 0 ? 'checked="' : ''}}>
                    <label for="unactive" class="form-check-label">Không</label>
                </div>
            </div>
            <div class="form-group">
                <label>Hiển thị ở trang chủ</label>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active_home"
                        {{$shop->active_home == 0 ? 'checked="' : ''}}>
                    <label for="unactive" class="form-check-label">Không</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active_home"
                        {{$shop->active_home == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
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
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection


