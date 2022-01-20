<?php

namespace App\Traits;

use App\Models\Crawler\CrawlerCategory;
use App\Models\Crawler\CrawlerCoupon;
use App\Models\Crawler\CrawlerPost;
use App\Models\Crawler\CrawlerProduct;
use App\Models\Crawler\CrawlerShop;
use Illuminate\Support\Str;

trait HelperCrawlerTrait
{
    //  vinabook.com
    protected function checkExistsCate($name)
    {
        $slug = Str::slug($name);
        $result = CrawlerCategory::where('slug', $slug)->first();
        if ($result) {
            return true;
        }
        return false;
    }
//  vinabook.com
    protected function checkExistsPost($title)
    {
        $slug = Str::slug($title);
        $result = CrawlerPost::where('slug', $slug)->first();
        if ($result) {
            return true;
        }
        return false;
    }
//  vinabook.com
    protected function checkExistsBook($name,$category_id)
    {
        $slug = 'danh-muc-'.$category_id.'-'.Str::slug($name);
        $result = CrawlerProduct::where('slug', $slug)->first();
        if ($result) {
            return true;
        }
        return false;
    }
//    salabookz.com
    protected function checkExistsBookMenuID($name,$menu_id)
    {
        $slug = 'sachweb-danh-muc-'.$menu_id.'-'.Str::slug($name);
        $result = CrawlerProduct::where('slug', $slug)->first();
        if ($result) {
            return true;
        }
        return false;
    }

    protected function checkExistsShop($name)
    {
        $slug = Str::slug($name);
        $result = CrawlerShop::where('slug', $slug)->first();
        if ($result) {
            return true;
        }
        return false;
    }

    protected function checkExistsCoupon($description)
    {
        $slug = 'mgg-'.Str::slug($description);
        $result = CrawlerCoupon::where('slug', $slug)->first();
        if ($result) {
            return true;
        }
        return false;
    }

    /**
     * @return false
     * Lấy category chưa crawler
     */
    protected function getCategoryDefault()
    {
        $category = CrawlerCategory::where('status',0)->first();
        if($category){
            $category->status = CrawlerCategory::STATUS_WAITING;
            $category->save();
            return $category;
        }
        return false;
    }

    protected function getCategoryProcess()
    {
        $category = CrawlerCategory::where('status',1)->first();
        if($category){
            $category->status = CrawlerCategory::STATUS_PROCESS;
            $category->save();
            return $category;
        }
        return false;
    }
    protected function getCategorySuccess()
    {
        $category = CrawlerCategory::where('status',2)->first();
        if($category){
            $category->status = CrawlerCategory::STATUS_SUCCESS;
            $category->save();
            return $category;
        }
        return false;
    }

    /**
     * @return false
     * Lấy category chưa crawler
     */
    protected function getShopDefault()
    {
        $shop = CrawlerShop::where('status',0)->first();
        if($shop){
            $shop->status = CrawlerShop::STATUS_WAITING;
            $shop->save();
            return $shop;
        }
        return false;
    }

    protected function getShopProcess()
    {
        $shop = CrawlerShop::where('status',1)->first();
        if($shop){
            $shop->status = CrawlerShop::STATUS_PROCESS;
            $shop->save();
            return $shop;
        }
        return false;
    }
    protected function getShopSuccess()
    {
        $shop = CrawlerShop::where('status',2)->first();
        if($shop){
            $shop->status = CrawlerShop::STATUS_SUCCESS;
            $shop->save();
            return $shop;
        }
        return false;
    }
}
