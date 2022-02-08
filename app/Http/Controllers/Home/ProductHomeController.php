<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Comment\CommentService;
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
    protected $commentService;

    public function __construct(MenuService $menuService, ProductService $productService,
                                WishlistService $wishlistService,CommentService $commentService)
    {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->wishlistService = $wishlistService;
        $this->commentService = $commentService;
    }


    public function index($id = '', $slug = ''){
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        $location = $this->productService->location($id);
        $comment = $this->commentService->getComment($id);
        $comment_reply = $this->commentService->getCommentReply($id);
        $rating = $this->commentService->getRating($id);
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
            'comments' => $comment,
            'comment_reply' => $comment_reply,
            'total_rating' => $rating
        ]);
    }

    public function comment(Request $request){
            $product_id =$_POST['product_id'];
            $customer_id =$_POST['customer_id'];
            $content = $_POST['content_comment'];
            $result = $this->commentService->add_comment((int)$customer_id,(int)$product_id,(string)$content);
            if($result){
                return response()->json([
                    'error' => false,
                    'message' => 'Thêm bình luận thành công. Đang chờ duyệt'
                ]);
            }

            return response()->json([ 'error' => true]);

    }

}
