<?php

namespace App\Http\Services\Comment;

use App\Models\Comment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CommentService
{
//    Home

    public function getComment($id)
    {
        return Comment::where('product_id',$id)->where('status',1)->where('comment_parent_id',0)
            ->with('customer')
            ->orderByRaw('id DESC')
            ->get();
    }

    public function getCommentReply($id){
        return Comment::where('product_id',$id)->where('status',1)->where('comment_parent_id','!=',0)
            ->with('customer')
            ->orderByRaw('id DESC')
            ->get();
    }

    public function getRating($id){
        return (integer)Comment::where('product_id',$id)->where('status',1)->where('comment_parent_id',0)
            ->avg('rating');
    }

    public function add_comment($customer_id, $product_id,$content){
        try {
            Comment::create([
                'customer_id' => (int)$customer_id,
                'product_id' => (int)$product_id,
                'content' => (string)$content,
                'rating' => 5,
                'comment_parent_id' => 0
            ]);
            return true;
        }catch (\Exception $err){
            \Log::info($err->getMessage());
            return false;
        }
    }

    public function reply_comment($comment_id,$content){
        try {
            $comment = Comment::where('id', $comment_id)->first();
            Comment::create([
                'customer_id' => 1,
                'product_id' => $comment->product_id,
                'content' => (string)$content,
                'rating' => 5,
                'comment_parent_id' => $comment->id,
                'status' => 1,
            ]);
            return true;
        }catch (\Exception $err){
            \Log::info($err->getMessage());
            return false;
        }
    }




//  Admin
    public function getListPage()
    {
        return Comment::orderByRaw('status ASC')->paginate(20);
    }

    public function duyet($comment): bool
    {
        $cm = Comment::where('id',$comment->id)->first();
        $comment->customer_id = $cm->customer_id;
        $comment->product_id = $cm->product_id;
        $comment->content = $cm->content;
        $comment->rating = $cm->rating;
        $comment->status = 1;
        $comment->comment_parent_id = $cm->comment_parent_id;
        $comment->save();

        Session::flash('success', 'Duyệt bình luận thành công');
        return true;

    }
    public function boduyet($comment){
        $cm = Comment::where('id',$comment->id)->first();
        $comment->customer_id = $cm->customer_id;
        $comment->product_id = $cm->product_id;
        $comment->content = $cm->content;
        $comment->rating = $cm->rating;
        $comment->status = 0;
        $comment->comment_parent_id = $cm->comment_parent_id;
        $comment->save();

        Session::flash('success', 'Bỏ duyệt bình luận thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $comment = Comment::where('id', $id)->first();
        if ($comment) {
            return Comment::where('id', $id)->orWhere('comment_parent_id', $id)->delete();
        }

        return false;
    }
}
