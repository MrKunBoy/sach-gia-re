@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <a href="{{$post->thumb}}" target="_blank">
                        <img src="{{$post->thumb}}" width="70px">
                    </a>
                </td>
                <td>{{$post->description}}</td>
                <td>{!! \App\Helpers\Helper::active($post->active) !!}</td>
                <td>{{$post->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/posts/edit/{{$post->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$post->id}},'/admin/posts/destroy')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $posts->links() !!}
@endsection

