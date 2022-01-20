<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use App\Models\Crawler\CrawlerPost;
use Illuminate\Http\Request;

class CrawlerPostController extends Controller
{
    public function index()
    {
        $posts = CrawlerPost::with('post:id,title')->orderByRaw('id DESC')->paginate(15);

        $viewData = [
            'title' => 'Danh sách bài viết mới nhất',
            'posts' => $posts
        ];

        return view('crawler.post.index', $viewData);
    }
}
