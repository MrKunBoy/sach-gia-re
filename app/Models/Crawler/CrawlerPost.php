<?php

namespace App\Models\Crawler;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrawlerPost extends Model
{
    use HasFactory;

    protected $table='crawler_posts';
    protected $guarded = [''];

    public function post(){
        return $this->belongsTo(Post::class,'cr_post_id');
    }
}
