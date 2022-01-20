<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Services\Customer\CustomerService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Wishlist\WishlistService;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerHomeController extends Controller
{
    protected $customerSV;
    protected $menu;
    protected $wishlistService;


    public function __construct(CustomerService $customer, MenuService $menu,WishlistService $wishlistService)
    {
        $this->customerSV = $customer;
        $this->menu = $menu;
        $this->wishlistService = $wishlistService;
    }

//    Admin
    public function index()
    {
        if(Auth::guard('cus')->check())
        {
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
        }else{
            $countWishList = 0;
        }
        return view('admin.customer.list',[
            'title'=> 'Danh sách khách hàng',
            'customers' => $this->customerSV->getListPage(),
            'countwishlist' => $countWishList,
        ]);
    }
    public function show(Customer $customer)
    {
        return view('admin.customer.edit',[
            'title'=> 'Chỉnh sửa thông tin khách hàng',
            'customer' => $customer
        ]);
    }
    public function update_admin(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'email'=>'required',
        ]);

        $result = $this->customerSV->update_admin($request, $customer);

        if($result){
            return redirect('/admin/customers/list');
        }
        return redirect()->back();
    }


//    Home
    public function show_profile(){
        if(Auth::guard('cus')->check()){
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);

            return view('home.profile.profile',[
                'title'=> 'Trang cá nhân - sachgiare.com',
                'menus' => $this->menu->getAlls(),
                'countwishlist' => $countWishList,
            ]);
        }
        return redirect()->route('show-form-login');
    }

    public function profile_edit(Customer $customer){
        if(Auth::guard('cus')->check()){
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
            return view('home.profile.edit',[
                'title'=> 'Chỉnh sửa thông tin cá nhân - sachgiare.com',
                'menus' => $this->menu->getAlls(),
                'customer' => $customer,
                'countwishlist' => $countWishList,
            ]);
        }
        return redirect()->route('show-form-login');
    }

    public function profile_update(Request $request,Customer $customer){
        if(Auth::guard('cus')->check()){
            $result = $this->customerSV->update($request,$customer);

            if($result){
                return redirect()->route('show-profile-home');
            }
            return redirect()->back();
        }
        return redirect()->route('show-form-login');
    }

    public function profile_change_pass(Customer $customer){
        if(Auth::guard('cus')->check()){
            $customer_id = Auth::guard('cus')->user()->id;
            $countWishList = $this->wishlistService->count($customer_id);
            return view('home.profile.change_pass',[
                'title'=> 'Cập nhật mật khẩu - sachgiare.com',
                'menus' => $this->menu->getAlls(),
                'customer' => $customer,
                'countwishlist' => $countWishList,
            ]);
        }
        return redirect()->route('show-form-login');
    }

    public function profile_update_pass(Request $request,Customer $customer)
    {
        if(Auth::guard('cus')->check()){
            $this->validate($request, [
                'password'=>'required',
                'new_password'=>'required',
                'confirm_password'=>'required'
            ]);
            $result = $this->customerSV->update_pass($request,$customer);

            if($result){
                return redirect()->route('show-profile-home');
            }
            return redirect()->back();
        }
        return redirect()->route('show-form-login');
    }

    public function show_login_register()
    {
        return view('home.login_register',[
            'title'=> 'sachgiare.com - Sign up / Login Form',
        ]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
            'confirm_password'=>'required',
        ]);

        $this->customerSV->create($request);
        return redirect()->route('show-form-register');
    }

    public function login(Request $request)
    {
        if(Auth::guard('cus')->attempt(['email' => $request->email, 'password'=> $request->password])){
            return redirect()->route('home');
        }else{
            Session::flash('error', 'Email hoặc mật khẩu không chính xác');
            return redirect()->route('show-form-register');
        }
    }

    public function logout() {
        Auth::guard('cus')->logout();
        Session::flash('error', 'Đăng xuất thành công');
        return redirect()->route('home');
    }

}
