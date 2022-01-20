@extends('crawler.layouts.app_crawler_master')
@section('crawler_content')

    <main role="main" class="container-fluid">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Slug</th>
{{--                <th>Category</th>--}}
                <th>Price</th>
                <th>Price sale</th>
                <th>Link</th>
                <th>Update</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img width="70px" src="{{$product->thumb}}"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->slug}}</td>
{{--                    <td>{{$product->product->name ?? "[N\A]"}}</td>--}}
                    <td>{{$product->price}}</td>
                    <td>{{$product->price_sale}}</td>
                    <td>{{$product->link}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td><a href="" class="btn btn-xs btn-primary">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products -> links() !!}
    </main>

@endsection





