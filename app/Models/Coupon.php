<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table='coupons';
    protected $guarded = [''];

    protected $fillable = [
        'title',
        'coupon_code',
        'shop_id',
        'link',
        'thumb',
        'industry',
        'due_date',
        'description',
        'content',
        'slug',
        'active'
    ];

    public function shop()
    {
        return $this->hasOne(Shop::class, 'id', 'shop_id')->withDefault(['name'=>'']);

    }
}
