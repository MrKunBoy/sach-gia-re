@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên sách</th>
                <th>Hình ảnh</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Danh mục</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>
                    <a href="{{$product->thumb}}" target="_blank">
                        <img src="{{$product->thumb}}" width="50px">
                    </a>
                </td>
                <td>
                    @if($product->price != 0)
                    {{number_format($product->price)}} ₫
                    @endif
                </td>
                <td>
                    @if($product->price_sale != 0)
                    {{number_format($product->price_sale)}} ₫
                    @endif
                </td>
                <td>
                    @if($product->menu != '')
                    {{$product->menu->name}}
                    @endif
                </td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$product->id}},'/admin/products/destroy')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $products->links() !!}
@endsection
