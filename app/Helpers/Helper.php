<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Helper
{
    public static function showWishlistPro($wishlist,$products)
    {
        $html = '';
        foreach ($products as $key => $item) {
            if($item->id == $wishlist->product_id){
                $html .= '<tr>
                                <td class="product-remove">
                                    <a style="cursor: pointer" onclick="removeRow('. $wishlist->id .',\'/wishlist/destroy\')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                                <td class="img-wishlist product-thumbnail">
                                    <a href="#"><img src="'.$item->thumb.'" alt="cart-image"></a>
                                </td>
                                <td class="product-name"><a href="/san-pham/'.$item->id.'-'.$item->slug.'.html">'.$item->name.'</a></td>
                                <td class="product-price"><span class="amount">'.number_format($item->price_sale).' ₫</span></td>
                                <td class="product-price"><span class="amount">'.number_format($item->price).' ₫</span></td>
                                <td class="product-stock-status"><span>+ '.$item->total_shop.' nơi bán</span></td>
                                <td class="product-add-to-cart"><a href="/san-pham/'.$item->id.'-'.$item->slug.'.html">So sánh giá</a></td>
                            </tr>';
            }
        }
        return $html;

    }

    public static function showWishlistCop($wishlist,$coupons)
    {
        $html = '';
        foreach ($coupons as $key => $item) {
            if($item->id == $wishlist->coupon_id){
                $html .= '<tr>
                                <td class="product-remove">
                                    <a style="cursor: pointer" onclick="removeRow('. $wishlist->id .',\'/wishlist/destroy\')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </td>
                                <td class="product-name"><a href="/ma-khyen-mai/'.$item->id.'-'.$item->slug.'.html">'.$item->title.'</a></td>
                                <td class="product-name"><span>'.$item->description.'</span></td>
                                <td class="product-name"><span>'.$item->content.'</span></td>
                                <td class="product-stock-status"><span>'.$item->due_date.'</span></td>
                                <td class="product-add-to-cart"><a href="#">Lấy mã</a></td>
                            </tr>';
            }
        }
        return $html;

    }

    public static function showMenuOptionAdd($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $item) {

            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id) {
                $html .= '<option value="' . $item->id . '">' . $char . $item->name . '</option>';
                // Xóa chuyên mục đã lặp
                unset($menus[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $html .= self::showMenuOptionAdd($menus, $item->id, $char . '-- ');
            }
        }
        return $html;
    }

    public static function showMenuOptionSelected($id_edit,$menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $item) {

            // Nếu là chuyên mục con thì hiển thị
            if ($item->parent_id == $parent_id) {
                if ($id_edit == $item->id) {
                    $selected = 'selected=""';
                } else {
                    $selected = "";
                }
                $html .= '<option ' . $selected . ' value="' . $item->id . '">' . $char . $item->name . '</option>';
                // Xóa chuyên mục đã lặp
                unset($menus[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $html .= self::showMenuOptionSelected($id_edit,$menus, $item->id, $char . '-- ');
            }
        }
        return $html;
    }


    public static function menulist($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '
                    <tr>
                        <td>'. $menu->id .'</td>
                        <td>'. $char .$menu->name .'</td>';

                $html .= ' <td>'. self::active($menu->active_home) .'</td>';

                $html .= '  <td>'. self::active($menu->active) .'</td>
                        <td>'. $menu->updated_at .'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id .'">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" style="cursor: pointer"
                            onclick="removeRow('. $menu->id .',\'/admin/menus/destroy\')">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                ';

                unset($menu[$key]);

                $html .= self::menulist($menus, $menu->id, $char .'|-- ');
            }
        }
        return $html;
    }

    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }



    public static function menuspc($menus,$parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '
                    <li>
                         <a href="/danh-muc/'. $menu->id .'-'.Str::slug($menu->name,'-').'.html">
                            '. $menu->name .'
                         </a>';

                if(self::isChild($menus, $menu->id)){
                    $html .= '<ul class="ht-dropdown mega-child">';
                    $html .= self::menuspc($menus,$menu->id);
                    $html .= '</ul>';
                }

                    $html .='</li>';
            }
        }
        return $html;
    }


    public static function menusmobile($menus,$parent_id = 0)
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '<li class="has-sub">';
                $html .= '
                         <a href="/danh-muc/'. $menu->id .'-'.Str::slug($menu->name,'-').'.html">
                            '. $menu->name .'
                         </a>';

                if(self::isChild($menus, $menu->id)){

                    $html .= '<ul class="category-sub">';
                    foreach ($menus as $key2 => $menu2){
                        if($menu2->parent_id == $menu->id){
                            $html .= '<li class="">';
                            $html .= '
                         <a href="/danh-muc/'. $menu2->id .'-'.Str::slug($menu2->name,'-').'.html">
                            '. $menu2->name .'
                         </a>';

                            $html .='</li>';
                        }
                    }
                    $html .= '</ul>';
                }

                $html .='</li>';
            }
        }
        return $html;
    }

    public static function menuschid($menus,$parent_id)
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '<li>';
                $html .= '
                         <a href="/danh-muc/'. $menu->id .'-'.Str::slug($menu->name,'-').'.html">
                            '. $menu->name .'
                         </a>';

                $html .='</li>';
            }
        }
        return $html;
    }


    public static function isChild($menus, $id)
    {
        foreach ($menus as $menu){
            if ($menu->parent_id == $id){
                return true;
            }

        }
        return false;
    }

    public static function day($date)
    {
        $ngay = new Carbon($date);
        echo $ngay->day;
    }

    public static function month($date)
    {
        $thang = new Carbon($date);
        echo $thang->month;
    }
}
