<?php

namespace App\View\Composers;

use App\Http\Services\Post\PostService;
use Illuminate\View\View;

class PostComposer
{
    protected $post;

    public function __construct(PostService $post)
    {
        $this->post = $post;
    }

    public function compose(View $view)
    {

        $view->with('posts',$this->post->getAll());
    }
}
