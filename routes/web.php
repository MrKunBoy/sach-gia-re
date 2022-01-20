<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Home\MainHomeController;
use App\Http\Controllers\Crawler\CrawlerCateController;
use App\Http\Controllers\Crawler\CrawlerPostController;
use App\Http\Controllers\Crawler\CrawlerProductController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Home\UploadHomeController;
use App\Http\Controllers\Home\ProductHomeController;
use App\Http\Controllers\Home\MenuHomeController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Home\PostHomeController;
use App\Http\Controllers\Crawler\CrawlerShopController;
use App\Http\Controllers\Crawler\CrawlerCouponController;
use App\Http\Controllers\Home\CustomerHomeController;

use Illuminate\Support\Facades\Route;



Route::get('/admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class,'store']);
Route::get('/admin/users/logout',[LoginController::class,'logout']);

Route::middleware(['auth'])->group(function (){

//    Crawler
    Route::group(['prefix'=>'crawler', 'namespace'=>'Crawler'], function (){
        Route::get('', function (){
            dd("OK");
        });

        Route::prefix('category')->group(function () {
            Route::get('/',[CrawlerCateController::class,'index'])->name('get_crawler.category.index');
            Route::get('/edit/{category}',[CrawlerCateController::class,'edit'])->name('get_crawler.category.edit');
            Route::post('/edit/{category}',[CrawlerCateController::class,'update'])->name('get_crawler.category.update');
        });

        Route::prefix('product')->group(function () {
            Route::get('/',[CrawlerProductController::class,'index'])->name('get_crawler.product.index');
        });

        Route::prefix('post')->group(function () {
            Route::get('/',[CrawlerPostController::class,'index'])->name('get_crawler.post.index');
        });

        Route::prefix('shop')->group(function () {
            Route::get('/',[CrawlerShopController::class,'index'])->name('get_crawler.shop.index');
        });

        Route::prefix('coupon')->group(function () {
            Route::get('/',[CrawlerCouponController::class,'index'])->name('get_crawler.coupon.index');
        });


    });

    Route::prefix('admin')->group(function (){
        Route::get('/',[MainController::class,'index'])->name('admin');
        Route::get('main',[MainController::class,'index']);

        #menu
        Route::prefix('menus')->group(function () {
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::DELETE('destroy',[MenuController::class,'destroy']);
        });

        #product
        Route::prefix('products')->group(function () {
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index'])->name('product.list');
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::DELETE('destroy',[ProductController::class,'destroy']);
        });

        #upload
        Route::post('upload/services',[UploadController::class,'store']);

        #shop
        Route::prefix('shops')->group(function () {
            Route::get('add',[ShopController::class,'create']);
            Route::post('add',[ShopController::class,'store']);
            Route::get('list',[ShopController::class,'index']);
            Route::get('edit/{shop}',[ShopController::class,'show']);
            Route::post('edit/{shop}',[ShopController::class,'update']);
            Route::DELETE('destroy',[ShopController::class,'destroy']);
        });

        #coupon
        Route::prefix('coupons')->group(function () {
            Route::get('add',[CouponController::class,'create']);
            Route::post('add',[CouponController::class,'store']);
            Route::get('list',[CouponController::class,'index']);
            Route::get('edit/{coupon}',[CouponController::class,'show']);
            Route::post('edit/{coupon}',[CouponController::class,'update']);
            Route::DELETE('destroy',[CouponController::class,'destroy']);
        });

        #customer
        Route::prefix('customers')->group(function () {
            Route::get('list',[CustomerHomeController::class,'index']);
            Route::get('edit/{customer}',[CustomerHomeController::class,'show']);
            Route::post('edit/{customer}',[CustomerHomeController::class,'update_admin']);
        });

        #Post
        Route::prefix('posts')->group(function () {
            Route::get('add',[PostController::class,'create']);
            Route::post('add',[PostController::class,'store']);
            Route::get('list',[PostController::class,'index']);
            Route::get('edit/{post}',[PostController::class,'show']);
            Route::post('edit/{post}',[PostController::class,'update']);
            Route::DELETE('destroy',[PostController::class,'destroy']);
        });

        #Repply

        #slider
        Route::prefix('sliders')->group(function () {
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::DELETE('destroy',[SliderController::class,'destroy']);
        });

    });



});

# Home
Route::get('/',[MainHomeController::class,'index'])->name('home');
Route::get('/home',[MainHomeController::class,'index'])->name('home');
#tìm kiếm
Route::post('/tim-kiem',[MainHomeController::class,'search'])->name('tim-kiem');
#about
Route::get('/abouts',[MainHomeController::class,'about'])->name('show-about');
#contact
Route::get('/contacts',[MainHomeController::class,'contact'])->name('show-contact');

Route::get('/register-login',[CustomerHomeController::class,'show_login_register'])->name('show-form-register');
Route::post('/register-login', [CustomerHomeController::class,'register'])->name('register-home');

Route::get('/login-register',[CustomerHomeController::class,'show_login_register'])->name('show-form-login');
Route::post('/login-register', [CustomerHomeController::class,'login'])->name('login-home');

Route::get('/logout',[CustomerHomeController::class,'logout'])->name('logout-home');

Route::get('/profile',[CustomerHomeController::class,'show_profile'])->name('show-profile-home');
Route::get('/profile-edit/{customer}',[CustomerHomeController::class,'profile_edit']);
Route::post('/profile-edit/{customer}', [CustomerHomeController::class,'profile_update']);
Route::get('/profile-change-password/{customer}',[CustomerHomeController::class,'profile_change_pass']);
Route::post('/profile-change-password/{customer}', [CustomerHomeController::class,'profile_update_pass']);
#upload
Route::post('/profile-edit/upload/services',[UploadHomeController::class,'upload']);


#product theo danh mục
Route::get('/danh-muc/{id}-{slug}.html',[MenuHomeController::class,'index']);

#Chi tiết product
Route::get('/san-pham/{id}-{slug}.html',[ProductHomeController::class,'index']);

#yeu thich
Route::get('/wishlist',[WishlistController::class,'index'])->name('show-wishlist');
Route::DELETE('/wishlist/destroy',[WishlistController::class,'destroy']);
Route::post('/them-yeu-thich',[WishlistController::class,'add_wishlish']);

#Bài viết
Route::get('/posts',[PostHomeController::class,'index'])->name('show-posts');
Route::get('/posts/{id}-{slug}.html',[PostHomeController::class,'show'])->name('show-detail-posts');
