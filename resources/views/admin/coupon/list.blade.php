@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tiêu đề</th>
            <th>Mã</th>
            <th>Mô tả</th>
            <th>Hạn dùng</th>
            <th>Cửa hàng</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coupons as $key => $coupon)
            <tr>
                <td>{{$coupon->id}}</td>
                <td>{{$coupon->title}}</td>
                <td>{{$coupon->coupon_code}}</td>
                <td>{{$coupon->description}}</td>
                <td>{{$coupon->due_date}}</td>
                <td>{{$coupon->shop->name}}</td>
                <td>{!! \App\Helpers\Helper::active($coupon->active) !!}</td>
                <td>{{$coupon->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/coupons/edit/{{$coupon->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$coupon->id}},'/admin/coupons/destroy')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $coupons->links() !!}
@endsection



