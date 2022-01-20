<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use App\Models\Crawler\CrawlerShop;
use Illuminate\Http\Request;

class CrawlerShopController extends Controller
{
    public function index()
    {
        $shops = CrawlerShop::with('shop:id,name')->orderByRaw('id DESC')->paginate(15);

        $viewData = [
            'title' => 'Danh sách cửa hàng mới nhất',
            'shops' => $shops
        ];

        return view('crawler.shop.index', $viewData);
    }
}
