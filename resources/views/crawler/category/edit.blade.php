@extends('crawler.layouts.app_crawler_master')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('crawler_content')

    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" value="{{ $category->link }}" class="form-control" id="link">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="domain">Domain</label>
                        <input type="text" name="domain" value="{{ $category->domain }}" class="form-control" id="domain">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="cr_total_page">Tổng trang</label>
                        <input type="number" name="cr_total_page" value="{{ $category->cr_total_page }}" class="form-control" id="cr_total_page">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" class="form-control" id="description" >{{$category->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" class="form-control" id="content" >{{$category->content}}</textarea>
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
