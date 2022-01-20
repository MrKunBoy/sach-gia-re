@extends('admin.main')

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên slider</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                               placeholder="Nhập tên slider">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sort_by">Sắp xếp</label>
                        <input type="number" name="sort_by" value="1" class="form-control"
                               id="sort_by">
                    </div>
                </div>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label for="price">Url</label>
                <input type="text" name="url" value="{{ old('url') }}" class="form-control" id="url"
                       placeholder="Nhập url">
            </div>

            <div class="form-group">
                <label for="content">Hình ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active">
                    <label for="unactive" class="form-check-label">Không</label>
                </div>
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>


@endsection


