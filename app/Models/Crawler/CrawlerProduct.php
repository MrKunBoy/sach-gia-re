<?php

namespace App\Models\Crawler;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrawlerProduct extends Model
{
    use HasFactory;

    protected $table='crawler_products';
    protected $guarded = [''];

//    public function product(){
//        return $this->belongsTo(Product::class,'cr_product_id');
//    }

}
