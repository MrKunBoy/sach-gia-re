<?php

namespace App\Http\Services\Coupon;

use App\Models\Coupon;
use App\Models\Shop;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CouponService
{
//    Home
    public function getAllCoupon()
    {
        return Coupon::where('active', 1)->orderByRaw('id DESC')->get();
    }




    public function getShop()
    {
        return Shop::where('active',1)->orderByRaw('id DESC')->get();
    }

    public function getListPage()
    {
        return Coupon::with('shop')
            ->orderByRaw('id DESC')->paginate(20);
    }

    public function create($request):bool
    {
        try {
            Coupon::create([
                'title' => (string) $request->input('title'),
                'link' => (string) $request->input('link'),
                'shop_id' => (int) $request->input('shop_id'),
                'coupon_code' => (string) $request->input('coupon_code'),
                'due_date' => (string) $request->input('due_date'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (int) $request->input('active'),
                'slug' => Str::slug($request->input('description'),'-')
            ]);
            Session::flash('success','Thêm mã khuyến mãi thành công');
        }catch (\Exception $err){
            Session::flash('error','Lỗi thêm mã khuyến mãi');
            \Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function update($request,$coupon):bool
    {
        try {
            $coupon->title = (string) $request->input('title');
            $coupon->coupon_code = (string) $request->input('coupon_code');
            $coupon->link = (string) $request->input('link');
            $coupon->shop_id = (string) $request->input('shop_id');
            $coupon->due_date = (string) $request->input('due_date');
            $coupon->description = (string) $request->input('description');
            $coupon->content = (string) $request->input('content');
            $coupon->active = (string) $request->input('active');
            $coupon->slug = Str::slug($request->input('name'),'-');
            $coupon->save();

            Session::flash('success','Cập nhật mã khuyến mãi thành công');

        }catch(\Exception $err) {
            Session::flash('error', 'Lỗi cập nhật mã khuyến mãi');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        $shop = Coupon::where('id',$request->input('id'))->first();
        if($shop){
//            $path = str_replace('storage','public',$shop->thumb);
//            Storage::delete($path);

            $shop->delete();
            return true;

        }else{
            return false;
        }
    }
}
