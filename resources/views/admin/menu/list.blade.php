@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên danh mục</th>
                <th>Hiển thị trang chủ</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! App\Helpers\Helper::menulist($menus) !!}
        </tbody>
    </table>

    {!! $menus -> links() !!}


@endsection


