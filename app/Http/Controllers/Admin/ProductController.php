<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductService;
use App\Models\Crawler\CrawlerProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.list',[
            'title'=>'Danh sách sách mới nhất',
            'products'=>$this->productService->getListPage()
        ]);
    }

    public function create()
    {
        return view('admin.product.add',[
            'title'=>'Thêm sách mới',
            'menus'=> $this->productService->getMenu()
        ]);
    }

    public function store(Request $request)
    {
        switch ($request->input('action')) {
            case 'search_all':
                $key = $request->key;
                if ($key){
                    $products_vina  = CrawlerProduct::where('name','like','%'.$key.'%')->where('domain','vinabook.com')->orderby('id')->get();
                    $products_sala  = CrawlerProduct::where('name','like','%'.$key.'%')->where('domain','salabookz.com')->orderby('id')->get();
                }else{
                    $products_vina  = CrawlerProduct::where('id',0)->orderby('id')->get();
                    $products_sala = CrawlerProduct::where('id',0)->orderby('id')->get();
                }

                return view('admin.product.add',[
                    'title'=>'Tìm kiếm: '.$key,
                    'menus'=> $this->productService->getMenu(),
                    'search_all_vina' => $products_vina,
                    'search_all_sala' => $products_sala
                ]);

            case 'search_vinabook':
                $key_vina = $request->key_vina;
                if ($key_vina){
                    $products  = CrawlerProduct::where('name','like','%'.$key_vina.'%')->orWhere('link','like',$key_vina)->where('domain','vinabook.com')->orderby('id')->get();
                }else{
                    $products  = CrawlerProduct::where('id',0)->orderby('id')->get();
                }

                return view('admin.product.add',[
                    'title'=>'Tìm kiếm vinabook',
                    'menus'=> $this->productService->getMenu(),
                    'search_all_vina' => $products
                ]);

            case 'search_salabookz':
                $key_sala = $request->key_sala;
                if ($key_sala){
                    $products  = CrawlerProduct::where('name','like','%'.$key_sala.'%')->orWhere('link','like',$key_sala)->where('domain','salabookz.com')->orderby('id')->get();
                }else{
                    $products  = CrawlerProduct::where('id',0)->orderby('id')->get();
                }

                return view('admin.product.add',[
                    'title'=>'Tìm kiếm salabookz',
                    'menus'=> $this->productService->getMenu(),
                    'search_all_sala' => $products
                ]);
            case 'save':
                $this->validate($request, [
                    'name'=>'required'
                ]);
                $this->productService->create($request);
                return redirect()->back();
        }



    }

    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title' => 'Chỉnh sửa sách',
            'product' => $product,
            'menus'=> $this->productService->getMenu()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request,$product);
        if($result){
            return redirect('/admin/products/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa sách thành công'
            ]);
        }

        return response()->json([ 'error' => true]);
    }
}
