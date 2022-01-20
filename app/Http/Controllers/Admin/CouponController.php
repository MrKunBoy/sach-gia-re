<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Coupon\CouponService;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    public function index()
    {
        return view('admin.coupon.list',[
            'title'=> 'Danh sách mã khuyến mĩa',
            'coupons' => $this->couponService->getListPage()
        ]);
    }

    public function create()
    {
        return view('admin.coupon.add',[
            'title' => 'Thêm mới mã khuyến mãi',
            'shops'=> $this->couponService->getShop()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'link'=>'required',
            'due_date'=>'required',
            'description'=>'required',
            'content'=>'required',
        ]);

        $this->couponService->create($request);

        return redirect()->back();
    }

    public function show(Coupon $coupon)
    {
        return view('admin.coupon.edit',[
            'title'=> 'Chỉnh sửa mã khuyến mãi',
            'coupon' => $coupon,
            'shops'=> $this->couponService->getShop()
        ]);
    }

    public function update(Request $request, Coupon $coupon)
    {
        $this->validate($request, [
            'title'=>'required',
            'link'=>'required',
            'due_date'=>'required',
            'description'=>'required',
            'content'=>'required',
        ]);

        $result = $this->couponService->update($request, $coupon);

        if($result){
            return redirect('/admin/coupons/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->couponService->delete($request);
        if($result){
            return response()->json([
                'error' => false,
                'message' => 'Xóa mã khuyến mãi thành công'
            ]);
        }

        return response()->json([ 'error' => true]);
    }
}
