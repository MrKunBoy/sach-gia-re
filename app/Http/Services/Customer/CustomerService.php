<?php

namespace App\Http\Services\Customer;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class CustomerService
{

    public function getListPage()
    {
        return Customer::orderByRaw('id DESC')->paginate(20);
    }

//    Admin
    public function update_admin($request, $customer):bool
    {
        try {
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->phone = $request->input('phone');
            $customer->gender = $request->input('gender');
            $customer->address = $request->input('address');
            $customer->thumb = $request->input('thumb');
            $customer->active = $request->input('active');

            $customer->save();

            Session::flash('success','Cập nhật thông tin thành công');

        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật thông tin tài khoản');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }


//    Home

    public function create($request)
    {
        try {
            if($request->password == $request->confirm_password){
                $cus = new Customer();
                $cus->email = $request->email;
                $cus->password = bcrypt($request->password);

                $cus->save();

                Session::flash('success', 'Đăng ký thành công');
            }else{
                Session::flash('error', 'Mật khẩu không đúng. Mời nhập lại');
                return false;
            }


        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;

    }

    public function update($request, $customer):bool
    {
        try {
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->gender = $request->input('gender');
            $customer->address = $request->input('address');
            $customer->thumb = $request->input('thumb');

            $customer->save();

            Session::flash('success','Cập nhật thông tin thành công');

        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật thông tin tài khoản');
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update_pass($request, $customer)
    {
        try {
            if(Hash::check($request->input('password'), $customer->password)){
                if ($request->new_password == $request->confirm_password){
                    $customer->fill([
                        'password' => Hash::make($request->new_password)
                    ])->save();
                    Session::flash('error', 'Cập nhật mật khẩu thành công');
                }else{
                    Session::flash('error', 'Nhập lại mật khẩu không đúng. Mời nhập lại');
                    return false;
                }
            }else{
                Session::flash('error', 'Mật khẩu không đúng. Mời nhập lại');
                return false;
            }
        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật mật khẩu');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }




}
