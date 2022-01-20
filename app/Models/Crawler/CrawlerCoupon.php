<?php

namespace App\Models\Crawler;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrawlerCoupon extends Model
{
    use HasFactory;
    protected $table='crawler_coupons';
    protected $guarded = [''];

    public function shop(){
        return $this->belongsTo(Coupon::class,'cr_coupon_id');
    }
}
