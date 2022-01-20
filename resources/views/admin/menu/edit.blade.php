@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" name="name" value="{{$menu->name}}" class="form-control" id="name"
                       placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label for="">Danh mục</label>
                <select class="custom-select rounded-0" name="parent_id">
                    <option value="0" {{$menu->parent_id == 0 ? 'selected' : ''}}>Danh mục cha</option>

                    {!! \App\Helpers\Helper::showMenuOptionSelected($menu->parent_id,$menus) !!}

                </select>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description">{{$menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea name="content" class="form-control" id="content">{{$menu->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$menu->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$menu->active == 0 ? 'checked="' : ''}}>
                    <label for="unactive" class="form-check-label">Không</label>
                </div>
            </div>

            <div class="form-group">
                <label>Hiển thị ở trang chủ</label>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active_home"
                        {{$menu->active_home == 0 ? 'checked="' : ''}}>
                    <label for="unactive" class="form-check-label">Không</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active_home"
                        {{$menu->active_home == 1 ? 'checked="' : ''}}>
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
        CKEDITOR.replace('content');
    </script>
@endsection

