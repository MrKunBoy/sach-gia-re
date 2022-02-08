@extends('admin.main')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên sách</th>
            <th>Khách hàng</th>
            <th>Nội dung</th>
            <th>Bình luận chính</th>
            <th>Ngày gửi</th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $key => $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="/san-pham/{{$comment->product->id}}-{{$comment->product->slug}}.html" target="_blank">{{$comment->product->name}}</a></td>
                <td>{{$comment->customer->email}}</td>
                <td>{{$comment->content}}
                    @if($comment->status == 1 && $comment->customer_id != 1)
                        <ul class="list-rep">
                        <p>Trả lời:</p>
                        @foreach($comments as $key2 => $comm_reply)
                            @if($comm_reply->comment_parent_id == $comment->id)
                                <li>{{$comm_reply->content}}</li>
                            @endif
                        @endforeach
                        </ul>
                        <textarea class="form-control reply-comment-{{$comment->id}}"></textarea>
                        <button data-comment_id="{{$comment->id}}" data-url="/admin/comments/reply-comment"
                                class="btn-success btn-sm mt-1 btn-reply-comment">Trả lời</button>
                    @endif

                </td>
                <td>{{$comment->comment_parent_id}}</td>
                <td>{{$comment->created_at}}</td>
                <td>
                    @if($comment->status == 0)
                        <a class="btn btn-primary btn-sm" href="/admin/comments/duyet/{{$comment->id}}">
                            Duyệt
                        </a>
                    @else
                        <a class="btn btn-danger btn-sm" href="/admin/comments/bo-duyet/{{$comment->id}}">
                            Bỏ duyệt
                        </a>
                    @endif
                </td>
                <td>
                    <a class="btn btn-danger btn-sm"
                       onclick="removeCmt({{$comment->id}},'/admin/comments/destroy')">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $comments->links() !!}
@endsection


