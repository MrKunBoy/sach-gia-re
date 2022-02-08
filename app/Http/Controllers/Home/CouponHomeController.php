<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Coupon\CouponService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Post\PostService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Shop\ShopService;
use App\Http\Services\Wishlist\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponHomeController extends Controller
{
    protected $menuService;
    protected $productService;
    protected $wishlistService;
    protected $postService;
    protected $couponService;
    protected $shopService;

    public function __construct(MenuService $menuService, ProductService $productService,
                                WishlistService $wishlistService,PostService $postService,
                                CouponService $couponService, ShopService $shopService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
        $this->postService = $postService;
        $this->couponService = $couponService;
        $this->shopService = $shopService;
    }

    public function index()
    {

        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }

        return view('home.coupon.list',[
            'title' => 'Mã giảm giá',
            'menus' => $this->menuService->getAlls(),
            'product_new' => $this->productService->getNew4(),
            'countwishlist' => $countWishList,
            'posts' => $this->postService->getListPage(),
            'coupons' => $this->couponService->getListPage(),
            'shops' => $this->shopService->getShopAll()
        ]);
    }


}
