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
                        <label for="name">Tên sách</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name" placeholder="Nhập tên sách">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="price">Giá gốc</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Nhập giá bán">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control select2" name="menu_id" >
                            {!! \App\Helpers\Helper::showMenuOptionSelected($product->menu_id,$menus) !!}

                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="price_sale">Giá khuyến mãi</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}" class="form-control" id="price_sale" placeholder="Nhập giá khuyến mãi">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>

            <div class="form-group">
                <label for="link">Tên sách</label>
                <input type="text" name="link" value="{{ $product->link }}" class="form-control" id="link" placeholder="Nhập link">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description" >{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea name="content" class="form-control" id="content" >{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="details">Thông tin chi tiết</label>
                <textarea name="details" class="form-control" id="details" >{{ $product->details }}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Hình ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$product->thumb}}" target="_blank">
                        <img src="{{$product->thumb}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$product->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$product->active == 0 ? 'checked="' : ''}}>
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
@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
        CKEDITOR.replace( 'details' );

    </script>
@endsection

