<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class MenuService
{
//    Home
    public function getMenuHome()
    {
        return Menu::select('id','name','slug')->where('active', 1)->where('active_home', 1)->get();
    }

    public function getID($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getMenuChild($id)
    {
        return Menu::where('parent_id', $id)->where('active', 1)->get();
    }

    public function getProduct($menu)
    {
        return $menu->products()->where('active',1)
            ->orderByRaw('id DESC')
            ->paginate(12);
    }

    public function getProductSortBy($menu,$sort_by)
    {
        if($sort_by == 'kytu_az'){
            return $menu->products()->where('active',1)
                ->orderByRaw('name ASC')
                ->paginate(12);
        }elseif ($sort_by == 'kytu_za'){
            return $menu->products()->where('active',1)
                ->orderByRaw('name DESC')
                ->paginate(12);
        }elseif ($sort_by == 'tang_dan'){
            return $menu->products()->where('active',1)
                ->orderByRaw('price ASC')
                ->paginate(12);
        }elseif ($sort_by == 'giam_dan'){
            return $menu->products()->where('active',1)
                ->orderByRaw('price DESC')
                ->paginate(12);
        }else{
            return $menu->products()->where('active',1)
                ->orderByRaw('id DESC')
                ->paginate(12);
        }

    }


//  Admin
    public function getParent()
    {
        return Menu::where('active', 1)->where('parent_id', 0)->get();
    }

    public function getListPage()
    {
        return Menu::orderByRaw('id DESC')->paginate(20);
    }

    public function getAlls()
    {
        return Menu::where('active', 1)->orderByRaw('id ASC')->get();
    }

    public function create($request)
    {
        try {

            Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'active' => (string)$request->input('active'),
                'active_home' => (string)$request->input('active_home'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;

    }

    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }

        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->content = (string)$request->input('content');
        $menu->active = (string)$request->input('active');
        $menu->active_home = (string)$request->input('active_home');
        $menu->slug = Str::slug($request->input('name'), '-');
        $menu->save();

        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }
}
