@extends('admin.main')

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên slider</label>
                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control" id="name"
                               placeholder="Nhập tên slider">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sort_by">Sắp xếp</label>
                        <input type="number" name="sort_by" value="{{$slider->sort_by}}" class="form-control"
                               id="sort_by">
                    </div>
                </div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label for="price">Url</label>
                <input type="text" name="url" value="{{ $slider->url }}" class="form-control" id="url"
                       placeholder="Nhập url">
            </div>

            <div class="form-group">
                <label for="content">Hình ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$slider->thumb}}" target="_blank">
                        <img src="{{$slider->thumb}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$slider->thumb}}">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$slider->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$slider->active == 0 ? 'checked="' : ''}}>
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


