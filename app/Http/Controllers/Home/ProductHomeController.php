<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Wishlist\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductHomeController extends Controller
{
    protected $menuService;
    protected $productService;
    protected $wishlistService;

    public function __construct(MenuService $menuService, ProductService $productService,
                                WishlistService $wishlistService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
    }


    public function index($id = '', $slug = ''){
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        $location = $this->productService->location($id);
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }

        return view('home.product.index',[
            'title'=> $product->name,
            'menus' => $this->menuService->getAlls(),
            'product' => $product,
            'productsMore' => $productsMore,
            'locations' => $location,
            'countwishlist' => $countWishList,
        ]);
    }

}
