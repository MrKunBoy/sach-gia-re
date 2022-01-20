<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $guarded = [''];

    protected $fillable = [
        'name',
        'ma_sach',
        'slug',
        'link',
        'description',
        'content',
        'details',
        'menu_id',
        'price',
        'price_sale',
        'thumb',
        'total_shop',
        'active'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')->withDefault(['name'=>'']);

    }
}
