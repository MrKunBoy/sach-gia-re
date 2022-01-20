@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Hình ảnh</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Trạng thái</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{$customer->id}}</td>
                <td>
                    <a href="{{$customer->thumb}}" target="_blank">
                        <img src="{{$customer->thumb}}" width="50px">
                    </a>
                </td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
                <td>
                    @if($customer->gender == 0)
                        Nam
                    @elseif($customer->gender == 1)
                        Nữ
                    @else
                        Khác
                    @endif
                </td>
                <td>{{$customer->address}}</td>
                <td>{!! \App\Helpers\Helper::active($customer->active) !!}</td>
                <td>{{$customer->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/customers/edit/{{$customer->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $customers->links() !!}
@endsection

