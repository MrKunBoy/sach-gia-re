<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Shop\ShopService;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function create()
    {
        return view('admin.shop.add',[
            'title' => 'Thêm mới cửa hàng'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'link'=>'required',
            'thumb'=>'required'
        ]);

        $this->shopService->create($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.shop.list',[
            'title'=> 'Danh sách cửa hàng',
            'shops' => $this->shopService->getListPage()
        ]);
    }

    public function show(Shop $shop)
    {
        return view('admin.shop.edit',[
            'title'=> 'Chỉnh sửa cửa hàng',
            'shop' => $shop
        ]);
    }

    public function update(Request $request, Shop $shop)
    {
        $this->validate($request, [
            'name'=>'required',
            'link'=>'required',
            'thumb'=>'required'
        ]);

        $result = $this->shopService->update($request, $shop);

        if($result){
            return redirect('/admin/shops/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->shopService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa cửa hàng thành công'
            ]);
        }

        return response()->json([ 'error' => true]);
    }
}
