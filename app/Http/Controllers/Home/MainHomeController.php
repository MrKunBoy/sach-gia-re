<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Shop\ShopService;
use App\Http\Services\Coupon\CouponService;
use App\Http\Services\Wishlist\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

class MainHomeController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected $shop;
    protected $coupon;
    protected $wishlistService;


    public function __construct(SliderService $slider, MenuService $menu, ProductService $product,
    ShopService $shop, CouponService $coupon,WishlistService $wishlistService)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->shop = $shop;
        $this->coupon = $coupon;
        $this->wishlistService = $wishlistService;
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
        return view('home.home',[
            'title'=> 'sachgiare.com - So sánh, tìm kiếm giá sách rẻ nhất',
            'sliders'=>$this->slider->getAll(),
            'menus' => $this->menu->getMenuHome(),
            'menuss' => $this->menu->getAlls(),
            'product_new' => $this->product->getNewProduct(),
            'product_all' => $this->product->getAllProduct(),
            'shops' => $this->shop->getShopHome(),
            'coupons' => $this->coupon->getAllCoupon(),
            'countwishlist' => $countWishList,

        ]);
    }

    public function search(Request $request)
    {
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }
        $keysearch = $request->input('keywords_submit');
        $id_cate = $request->input('search_pro_bycate');
        if($id_cate == 0){
            $products = $this->product->getProductKey($keysearch);
//            if(isset($_GET['sort_by'])){
//                $sort_by = $_GET['sort_by'];
//                $products = $this->product->getProductKeySort($keysearch,$sort_by);
//            }else{
//                $products = $this->product->getProductKey($keysearch);
//            }
        }else{
            $products = $this->product->getProductKeyID($keysearch,$id_cate);
        }

        return view('home.search.search',[
            'title'=> 'Tìm kiếm: '.$keysearch,
            'product_new' => $this->product->getNew4(),
//            'menus' => $this->menu->getMenuHome(),
            'menus' => $this->menu->getAlls(),
            'products' => $products,
            'countwishlist' => $countWishList,
            ]);
    }

    public function about()
    {
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }
        return view('home.about',[
            'title'=> 'Giới thiệu',
            'menus' => $this->menu->getAlls(),
            'countwishlist' => $countWishList,
        ]);
    }

    public function contact()
    {
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }
        return view('home.contact',[
            'title'=> 'Liên hệ',
            'menus' => $this->menu->getAlls(),
            'countwishlist' => $countWishList,
        ]);
    }

}
