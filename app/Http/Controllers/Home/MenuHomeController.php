<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Wishlist\WishlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;


class MenuHomeController extends Controller
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


    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuService->getID($id);

        $menuchild = $this->menuService->getMenuChild($id);
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            $products = $this->menuService->getProductSortBy($menu,$sort_by);
        }else{
            $products = $this->menuService->getProduct($menu);
        }

        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }


        return view('home.menu.menu',[
            'title' => $menu->name,
            'menus' => $this->menuService->getAlls(),
            'menuChild' => $menuchild,
            'products' => $products,
            'menu' => $menu,
            'product_new' => $this->productService->getNew4(),
            'countwishlist' => $countWishList,
        ]);
    }


}
