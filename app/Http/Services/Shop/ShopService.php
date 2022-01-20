<?php

namespace App\Http\Services\Shop;

use App\Models\Shop;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ShopService
{
//    Home
    public function getShopHome()
    {
        return Shop::select('id','name','slug')->where('active', 1)->where('active_home', 1)->take(8)->get();
    }




    public function getListPage()
    {
        return Shop::orderByRaw('id DESC')->paginate(20);
    }

    public function create($request):bool
    {
        try {
            Shop::create([
                'name' => (string) $request->input('name'),
                'link' => (string) $request->input('link'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'active_home' => (string) $request->input('active_home'),
                'thumb' => (string) $request->input('thumb'),
                'slug' => Str::slug($request->input('name'),'-')
            ]);
            Session::flash('success','Thêm cửa hàng thành công');
        }catch (\Exception $err){
            Session::flash('error','Lỗi thêm cửa hàng');
            \Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function update($request,$shop):bool
    {
        try {
            $shop->name = (string) $request->input('name');
            $shop->link = (string) $request->input('link');
            $shop->description = (string) $request->input('description');
            $shop->content = (string) $request->input('content');
            $shop->active = (string) $request->input('active');
            $shop->active_home = (string) $request->input('active_home');
            $shop->thumb = (string) $request->input('thumb');
            $shop->slug = Str::slug($request->input('name'),'-');
            $shop->save();

            Session::flash('success','Cập nhật cửa hàng thành công');

        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật cửa hàng');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        $shop = Shop::where('id',$request->input('id'))->first();
        if($shop){
            $path = str_replace('storage','public',$shop->thumb);
            Storage::delete($path);

            $shop->delete();
            return true;

        }else{
            return false;
        }
    }
}
