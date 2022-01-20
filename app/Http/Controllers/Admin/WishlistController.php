<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Coupon\CouponService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Wishlist\WishlistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;

class WishlistController extends Controller
{
    protected $menuService;
    protected $productService;
    protected $wishlistService;
    protected $couponService;

    public function __construct(MenuService $menuService, ProductService $productService,
                                WishlistService $wishlistService, CouponService $couponService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
        $this->couponService = $couponService;
    }

    public function index()
    {
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
            $wishlistpro = $this->wishlistService->getWishlistProByID($customer_id);
            $wishlistcop = $this->wishlistService->getWishlistCopByID($customer_id);
        }else{
            $countWishList = 0;
            $wishlistpro = '';
            $wishlistcop = '';
        }
        return view('home.wishlist.wishlist',[
            'title'=> 'Yêu thích',
            'menus' => $this->menuService->getAlls(),
            'countwishlist' => $countWishList,
            'wishlist_product' => $wishlistpro,
            'wishlist_coupon' => $wishlistcop,
            'products' => $this->productService->getAllProduct(),
            'coupons' => $this->couponService->getAllCoupon()
        ]);
    }

    public function add_wishlish(Request $request)
    {
        $product_id =$_POST['product_id'];
        $customer_id =$_POST['customer_id'];
        $coupon_id = $_POST['coupon_id'];
        $result = $this->wishlistService->create((int)$customer_id,(int)$product_id,(int)$coupon_id);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Thêm yêu thích thành công'
            ]);
        }

        return response()->json([ 'error' => true]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->wishlistService->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);

    }
}
