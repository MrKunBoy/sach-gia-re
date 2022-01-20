<?php

namespace App\View\Composers;

use App\Models\Menu;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class MenuComposer
{
    protected $menus;

    public function __construct()
    {

    }

    public function compose(View $view)
    {
//        $menus10 = Menu::select('id','name','parent_id')->where('active',1)->orderByRaw('id ASC')->offset(10)->limit(20)->get();->with('menus10',$menus10)
        $menus = Menu::select('id','name','parent_id')->where('active',1)->orderByRaw('id ASC')->get();
        $menuparents = Menu::select('id','name')->where('active',1)->where('parent_id',0)->orderByRaw('id ASC')->get();
        $view->with('menus',$menus)->with('menuparents',$menuparents)
        ;
    }
}
