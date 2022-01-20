@extends('crawler.layouts.app_crawler_master')
@section('crawler_content')

    <main role="main" class="container-fluid">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Link</th>
                <th>Domain</th>
                <th>Status</th>
                <th>Create</th>
                <th>Update</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cate)
            <tr>
                <td>{{$cate->id}}</td>
                <td>{{$cate->name}}</td>
                <td>{{$cate->slug}}</td>
                <td>{{$cate->category->name ?? "[N\A]"}}</td>
                <td>{{$cate->link}}</td>
                <td>{{$cate->domain}}</td>
                <td>
                    <span class="text-{{$cate->getStatus($cate->status)['class']}}">
                        {{$cate->getStatus($cate->status)['name']}}
                    </span>
                </td>
                <td>{{$cate->created_at}}</td>
                <td>{{$cate->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/crawler/category/edit/{{$cate->id}}">
                        Edit
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {!! $categories -> links() !!}
    </main>

@endsection




