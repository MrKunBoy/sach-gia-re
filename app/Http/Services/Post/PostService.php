<?php

namespace App\Http\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostService
{
    public function show($id)
    {
        return Post::where('id', $id)
            ->where('active', 1)
            ->firstOrFail();
    }


    public function getAll()
    {
        return Post::orderByRaw('id DESC')->take(10)->get();
    }

    public function getListPage()
    {
        return Post::orderByRaw('id DESC')->paginate(10);
    }

    public function create($request):bool
    {
        try {
            Post::create([
                'title' => (string) $request->input('title'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'thumb' => (string) $request->input('thumb'),
                'slug' => Str::slug($request->input('title'),'-')
            ]);
            Session::flash('success','Thêm bài viết thành công');
        }catch (\Exception $err){
            Session::flash('error','Lỗi thêm bài viết');
            \Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function update($request,$post):bool
    {
        try {
        $post->title = (string) $request->input('title');
        $post->description = (string) $request->input('description');
        $post->content = (string) $request->input('content');
        $post->active = (string) $request->input('active');
        $post->thumb = (string) $request->input('thumb');
        $post->slug = Str::slug($request->input('title'),'-');
        $post->save();

        Session::flash('success','Cập nhật bài viết thành công');

        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật bài viết');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        $post = Post::where('id',$request->input('id'))->first();
        if($post){
            $path = str_replace('storage','public',$post->thumb);
            Storage::delete($path);

            $post->delete();
            return true;

        }else{
            return false;
        }
    }
}
