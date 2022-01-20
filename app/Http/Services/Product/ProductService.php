<?php

namespace App\Http\Services\Product;

use App\Models\Crawler\CrawlerProduct;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
//    Home
    public function getNewProduct()
    {
        return Product::where('active', 1)->orderByRaw('updated_at DESC')->take(10)->get();
    }

    public function getNew4()
    {
        return Product::where('active', 1)->orderByRaw('updated_at DESC')->take(4)->get();
    }

    public function getAllProduct()
    {
        return Product::where('active', 1)->orderByRaw('id DESC')->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::where('id','!=', $id)
            ->where('active', 1)
            ->orderByRaw('id DESC')
            ->limit(10)
            ->get();
    }

    public function location($id)
    {
        $ma = Product::select('ma_sach')->where('id', $id)->first();
        return CrawlerProduct::where('cr_product_id', $ma->ma_sach)
            ->orderByRaw('price_sale ASC')
            ->limit(10)
            ->get();
    }

    public function getProductKey($keysearch)
    {
        return Product::where('name','like','%'.$keysearch.'%')
            ->where('active', 1)
            ->orderByRaw('id DESC')
            ->paginate(12);
    }

    public function getProductKeySort($keysearch,$sort_by)
    {
        if($sort_by == 'kytu_az'){
            return Product::where('name','like','%'.$keysearch.'%')
                ->where('active', 1)
                ->orderByRaw('name ASC')
                ->paginate(12);
        }elseif ($sort_by == 'kytu_za'){
            return Product::where('name','like','%'.$keysearch.'%')
                ->where('active', 1)
                ->orderByRaw('name DESC')
                ->paginate(12);
        }elseif ($sort_by == 'tang_dan'){
            return Product::where('name','like','%'.$keysearch.'%')
                ->where('active', 1)
                ->orderByRaw('price ASC')
                ->paginate(12);
        }elseif ($sort_by == 'giam_dan'){
            return Product::where('name','like','%'.$keysearch.'%')
                ->where('active', 1)
                ->orderByRaw('price DESC')
                ->paginate(12);
        }else{
            return Product::where('name','like','%'.$keysearch.'%')
                ->where('active', 1)
                ->orderByRaw('id ASC')
                ->paginate(12);
        }

    }

    public function getProductKeyID($keysearch,$id_cate)
    {
        return Product::where('name','like','%'.$keysearch.'%')
            ->where('menu_id',$id_cate)
            ->where('active', 1)
            ->orderByRaw('id DESC')
            ->paginate(12);
    }




//    admin
    public function getMenu()
    {
        return Menu::where('active',1)->orderByRaw('id DESC')->get();
    }

    public function getListPage()
    {
//        menu ở Product.php
        return Product::with('menu')
            ->orderByRaw('id DESC')->paginate(20);
    }

    protected function isValidPrice($request)
    {
        if($request->input('price') != 0 &&
            $request->input('price_sale') >= $request->input('price'))
        {
            Session::flash('error', 'Giá khuyến mãi phải nhỏ hơn giá gốc');
            return false;
        }

        if($request->input('price_sale') != 0 && $request->input('price') == 0){
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function create($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false) return false;
        try {
            $request->except(['_token']);

            for($i = 0;$i <= 10; $i++){
                $namevina = 'vina_'.$i;
                $namesala = 'sala_'.$i;
                if($request->has($namevina)){
                    CrawlerProduct::where('id',$request->input($namevina))->update(['cr_product_id'=>$request->input('ma_sach')]);
                }
                if($request->has($namesala)){
                    CrawlerProduct::where('id',$request->input($namesala))->update(['cr_product_id'=>$request->input('ma_sach')]);
                }
            }

            $productmin = CrawlerProduct::where('cr_product_id',$request->input('ma_sach'))->orderByRaw('id DESC')->first();
            $total_shop = CrawlerProduct::where('cr_product_id',$request->input('ma_sach'))->orderByRaw('id ASC')->count();

            Product::create([
                'name' => (string) $request->input('name'),
                'link' => (string) $productmin->link,
                'thumb' => (string) $productmin->thumb,
                'description' => (string) $productmin->description,
                'content' => (string) $productmin->content,
                'details' => (string) $productmin->details,
                'price' => (int) $productmin->price,
                'price_sale' => (int) $productmin->price_sale,
                'ma_sach' => (int) $request->input('ma_sach'),
                'menu_id' => (int) $request->input('menu_id'),
                'active' => (string) $request->input('active'),
                'total_shop' => (int) $total_shop,
                'slug' => Str::slug($request->input('name'),'-')
            ]);

            Session::flash('success', 'Thêm sách thành công');
        }catch (\Exception $err){
            Session::flash('error', 'Lỗi thêm sách');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $product):bool
    {
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice == false) return false;

        try {
//            $product ->fill($request->input());
            $product->name = (string) $request->input('name');
            $product->link = (string) $request->input('link');
            $product->description = (string) $request->input('description');
            $product->content = (string) $request->input('content');
            $product->active = (string) $request->input('active');
            $product->price = (string) $request->input('price');
            $product->price_sale = (string) $request->input('price_sale');
            $product->menu_id = (string) $request->input('menu_id');
            $product->thumb = (string) $request->input('thumb');
            $product->slug = Str::slug($request->input('name'),'-');
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id',$request->input('id'))->first();
        if($product){
            $path = str_replace('storage','public',$product->thumb);
            Storage::delete($path);
            $product->delete();
            return true;

        }else{
            return false;
        }
    }

}
