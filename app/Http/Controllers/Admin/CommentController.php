<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Comment\CommentService;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        return view('admin.comment.list',[
            'title'=>'Danh sách bình luận',
            'comments' => $this->commentService->getListPage()
        ]);
    }

    public function reply_comment(Request $request){
        $comment_id =$_POST['comment_id'];
        $content = $_POST['content_comment'];
        $result = $this->commentService->reply_comment((int)$comment_id,(string)$content);
//        $result = true;
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Trả lời bình luận thành công'
            ]);
        }

        return response()->json([ 'error' => true]);
    }

    public function duyet(Comment $comment)
    {
        $result = $this->commentService->duyet($comment);

        if($result){
            return redirect('/admin/comments/list');
        }
        return redirect()->back();
    }

    public function boduyet(Comment $comment)
    {
        $result = $this->commentService->boduyet($comment);

        if($result){
            return redirect('/admin/comments/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->commentService->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bình luận'
            ]);
        }
        return response()->json([
            'error' => true
        ]);

    }
}
