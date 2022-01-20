@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')


    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="Nhập tiêu đề">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description" >{{$post->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Nội dung bài viết</label>
                <textarea name="content" class="form-control" id="content" >{{$post->content}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Hình ảnh</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$post->thumb}}" target="_blank">
                        <img src="{{$post->thumb}}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$post->thumb}}">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" id="active" name="active"
                        {{$post->active == 1 ? 'checked="' : ''}}>
                    <label for="active" class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" id="unactive" name="active"
                        {{$post->active == 0 ? 'checked="' : ''}}>
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
    </script>
@endsection
