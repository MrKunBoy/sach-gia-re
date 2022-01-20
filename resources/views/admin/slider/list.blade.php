@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên slider</th>
            <th>Hình ảnh</th>
            <th>Url</th>
            <th>Sắp xếp</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>
                    <a href="{{$slider->thumb}}" target="_blank">
                        <img src="{{$slider->thumb}}" width="70px">
                    </a>
                </td>
                <td style="width: 350px">
                    <a href="{{$slider->url}}" target="_blank">
                    {{$slider->url}}
                    </a>
                </td>
                <td> {{$slider->sort_by}} </td>

                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{$slider->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{$slider->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$slider->id}},'/admin/sliders/destroy')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $sliders->links() !!}
@endsection
