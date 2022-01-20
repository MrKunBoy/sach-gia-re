<?php

namespace App\Models\Crawler;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CrawlerShop extends Model
{
    use HasFactory;
    protected $table='crawler_shops';
    protected $guarded = [''];

    const STATUS_DEFAULT = 0;
    const STATUS_WAITING = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SUCCESS = 3;

    public $statuss = [
        self::STATUS_DEFAULT =>[
            'name'=>'Default',
            'class'=>'secondary',
        ],
        self::STATUS_WAITING =>[
            'name'=>'Waiting',
            'class'=>'warning',
        ],
        self::STATUS_PROCESS =>[
            'name'=>'Process',
            'class'=>'primary',
        ],
        self::STATUS_SUCCESS =>[
            'name'=>'Success',
            'class'=>'success',
        ],

    ];

    public function getStatus()
    {
        return Arr::get($this->statuss, $this->status, []);
    }

    public function shop(){
        return $this->belongsTo(Shop::class,'cr_shop_id');
    }
}
