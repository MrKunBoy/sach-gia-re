@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên cửa hàng</th>
            <th>Hình ảnh</th>
            <th>Link</th>
            <th>Active home</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shops as $key => $shop)
            <tr>
                <td>{{$shop->id}}</td>
                <td>{{$shop->name}}</td>
                <td>
                    <a href="{{$shop->thumb}}" target="_blank">
                        <img src="{{$shop->thumb}}" width="70px">
                    </a>
                </td>
                <td>{{$shop->link}}</td>
                <td>{!! \App\Helpers\Helper::active($shop->active_home) !!}</td>
                <td>{!! \App\Helpers\Helper::active($shop->active) !!}</td>
                <td>{{$shop->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/shops/edit/{{$shop->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$shop->id}},'/admin/shops/destroy')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $shops->links() !!}
@endsection


