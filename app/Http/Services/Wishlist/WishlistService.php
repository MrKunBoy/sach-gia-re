<?php

namespace App\Http\Services\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WishlistService
{
    public function create($customer_id, $product_id, $coupon_id)
    {
        try {

            if($coupon_id == 0){
                $result = Wishlist::where('customer_id',$customer_id)
                    ->where('product_id',$product_id)->first();
            }
            if($product_id == 0){
                $result = Wishlist::where('customer_id',$customer_id)
                    ->where('coupon_id',$coupon_id)->first();
            }

            if(!$result){
                Wishlist::create([
                    'customer_id' => (int)$customer_id,
                    'product_id' => (int)$product_id,
                    'coupon_id' => (int)$coupon_id
                ]);
                return true;
            }


        } catch (\Exception $err) {
            return false;
        }

    }

    public function count($customer_id)
    {

        try {
            $result = Wishlist::where('customer_id',$customer_id)->count();
            return $result;
        } catch (\Exception $err) {
            return 0;
        }
    }

    public function getWishlistProByID($customer_id)
    {
        return Wishlist::where('customer_id', $customer_id)->where('product_id','!=', 0)->get();
    }
    public function getWishlistCopByID($customer_id)
    {
        return Wishlist::where('customer_id', $customer_id)->where('coupon_id','!=', 0)->get();
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $wishlist = Wishlist::where('id', $id)->first();
        if ($wishlist) {
            return Wishlist::where('id', $id)->delete();
        }

        return false;
    }
}
