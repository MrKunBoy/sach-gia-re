<?php

namespace App\Console\Commands\Crawler;

use App\HelpersClass\CliEcho;
use App\Models\Coupon;
use App\Models\Crawler\CrawlerCoupon;
use App\Traits\HelperCrawlerTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CrawlerCouponCommand extends Command
{
    use HelperCrawlerTrait;
    protected $signature = 'crawler:coupon';

    protected $description = 'Crawler Coupon';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->init();
    }

    protected function init()
    {
        #Lấy dứ liệu trang https://mgg.vn/
        $shop = $this->getShopDefault();
        if(!$shop){
            CliEcho::successnl("-- Run crawler shop Stop:");
            return;
        }

        $this->getCouponByShop($shop);

    }

    protected function getCouponByShop($shop)
    {
        $linkpage = $shop->link.'?coupon_type=code';
        CliEcho::infonl("--Coupon");
        CliEcho::warningnl("--Link: " .$linkpage );

        $crawler = \Goutte::request('GET', $linkpage);

        try{
            $titles = $crawler->filter('div.coupon-mgg-wrap > div.store-thumb-link.mgg-code > div.text-thumb')->each(function ($node) {
                return $node->text();
            });

            $description = $crawler->filter('div.coupon-mgg-wrap > div.latest-coupon > h3')->each(function ($node) {
                return $node->text();
            });

            $links = $crawler->filter('div.coupon-mgg-wrap > div.latest-coupon > h3 > a')->each(function ($node) {
                return $node->attr('href');
            });

            $due_date = $crawler->filter('div.coupon-mgg-wrap > div.latest-coupon > div.c-type.exp')->each(function ($node) {
                return $node->text();
            });

            $coupon_code = $crawler->filter('div.coupon-mgg-wrap > div.coupon-detail.coupon-button-type > a.coupon-button.coupon-code > span.code-text')->each(function ($node) {
                return $node->text();
            });

            $content = $crawler->filter('div.coupon-footer.coupon-listing-footer > div > p')->each(function ($node) {
                return $node->text();
            });

            $arr = array("Hạn SD: ", ".", ","," ");
        foreach ($titles as $key => $title) {

            $data = [
                'title' => $titles[$key],
                'coupon_code' => $coupon_code[$key],
                'link' => $links[$key],
                'domain' => 'mgg.vn',
                'shop_id' => (int)$shop->id,
                'description' => $description[$key],
                'content' => $content[$key],
                'due_date' => Str::replace($arr,'',$due_date[$key]),
                'slug' => 'mgg-'.Str::slug($description[$key]),
            ];

//            dd($data);

            if (!$this->checkExistsCoupon($description[$key])) {
                $couponCraw = CrawlerCoupon::create($data);

                if ($couponCraw) {
                    $couponData = Coupon::create($data);
                    if ($couponData) {
                        $couponCraw->cr_coupon_id = (int)$couponData->id;
                        $couponCraw->save();
                    }
                }
                $this->info('-- -- -- Insert coupon Success');

            } else {
                $this->error('-- -- -- trùng slug');
            }

            $this->getShopProcess();
        }

            $this->getShopSuccess();
        $this->init();
        }catch (\InvalidArgumentException $e){
            CliEcho::warningnl("Không tìm thấy ");
        }
    }
}
