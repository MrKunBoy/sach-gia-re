@extends('crawler.layouts.app_crawler_master')
@section('crawler_content')

    <main role="main" class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Tiêu đề</th>
                    <th>Link</th>
                    <th>Domain</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img width="70px" src="{{$post->thumb}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->post->title ?? "[N\A]"}}</td>
                        <td>{{$post->link}}</td>
                        <td>{{$post->domain}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td><a href="" class="btn btn-xs btn-primary">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $posts -> links() !!}
    </main>

@endsection
