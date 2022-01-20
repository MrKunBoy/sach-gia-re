<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Coupon\CouponService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Post\PostService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Wishlist\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostHomeController extends Controller
{
    protected $menuService;
    protected $productService;
    protected $wishlistService;
    protected $postService;

    public function __construct(MenuService $menuService, ProductService $productService,
                                WishlistService $wishlistService,PostService $postService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
        $this->postService = $postService;
    }


    public function index(Request $request, $id, $slug = '')
    {

        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }


        return view('home.coupon.list',[
            'title' => 'Danh sách bài viết',
            'menus' => $this->menuService->getAlls(),
            'product_new' => $this->productService->getNew4(),
            'countwishlist' => $countWishList,
            'posts' => $this->postService->getListPage(),
        ]);
    }

    public function show($id='',$slug='')
    {
        $post = $this->postService->show($id);
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }

        return view('home.coupon.post',[
            'title' => $post->title,
            'menus' => $this->menuService->getAlls(),
            'product_new' => $this->productService->getNew4(),
            'countwishlist' => $countWishList,
            'posts' => $this->postService->getListPage(),
            'post_detail' => $post,
        ]);
    }
}
