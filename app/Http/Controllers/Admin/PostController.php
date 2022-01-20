<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    public function index()
    {
        return view('admin.post.list',[
            'title'=> 'Danh sách Bài viết',
            'posts' => $this->postService->getListPage()
        ]);
    }

    public function create()
    {
        return view('admin.post.add',[
            'title' => 'Thêm mới bài viết'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'thumb'=>'required',
            'description'=>'required',
            'content'=>'required'
        ]);

        $this->postService->create($request);

        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('admin.post.edit',[
            'title'=> 'Chỉnh sửa bài viết',
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title'=>'required',
            'thumb'=>'required',
            'description'=>'required',
            'content'=>'required'
        ]);

        $result = $this->postService->update($request, $post);

        if($result){
            return redirect('/admin/posts/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->postService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài viết thành công'
            ]);
        }

        return response()->json([ 'error' => true]);
    }
}
