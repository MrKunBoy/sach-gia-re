<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use App\Models\Crawler\CrawlerProduct;
use Illuminate\Http\Request;

class CrawlerProductController extends Controller
{
    public function index()
    {
//        $products = CrawlerProduct::with('category:id,name')->orderByRaw('id DESC')->paginate(50);
        $products = CrawlerProduct::where('id','!=',0)->orderByRaw('id DESC')->paginate(50);
        $viewData = [
            'title' => 'Danh sách sách mới nhất',
            'products' => $products
        ];

        return view('crawler.product.index',$viewData);
    }
}
