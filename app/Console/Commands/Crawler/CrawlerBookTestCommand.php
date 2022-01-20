<?php

namespace App\Console\Commands\Crawler;

use App\HelpersClass\CliEcho;
use App\Models\Crawler\CrawlerProduct;
use App\Traits\HelperCrawlerTrait;
use Goutte\Client;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\HttpClient\HttpClient;

class CrawlerBookTestCommand extends Command
{
    use HelperCrawlerTrait;

    protected $signature = 'crawler:product-test';

    protected $description = 'Crawler Book Test';

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
        #Lấy dứ liệu trang salabookz.com
//        $url = 'https://salabookz.com/danh-muc-sp/sach-van-hoc';
//        $url = 'https://salabookz.com/danh-muc-sp/sach-chung-khoan';
//        $url = 'https://salabookz.com/danh-muc-sp/sach-chung-khoan/page/2?gclid=CjwKCAiA5t-OBhByEiwAhR-hm1nKj3g5kwH75ZhqVJ2Q_w8CLCRYJ4osPRhHOfV4AYLSU7EzGtzbnRoCDNsQAvD_BwE';
//        $url = 'https://salabookz.com/danh-muc-sp/sach-luat';
//        $url = 'https://salabookz.com/danh-muc-sp/qua-tang';
//        $url = 'https://salabookz.com/danh-muc-sp/sach-ky-nang';
//        $url = 'https://salabookz.com/danh-muc-sp/tu-sach-dau-tu/sach-kinh-te';
//        $url = 'https://salabookz.com/danh-muc-sp/sach-tieng-anh';
        $url = 'https://salabookz.com/danh-muc-sp/sach-tieng-anh/page/2';
        $menu_id = 60;
        $this->crawlerSalaBook($url, $menu_id);
//        $this->getContentBook();
    }

    // php artisan crawler:product-test
    protected function crawlerSalaBook($url, $menu_id)
    {
        CliEcho::infonl("--Book");
        CliEcho::warningnl("--Link: " . $url);

        $client = new Client(HttpClient::create(['timeout' => 60]));

        $crawler = $client->request('GET', $url);

        $links = $crawler->filter('div.product-small.box > div.box-image > div.image-none > a')->each(function ($node) {
            return $node->attr('href');
        });

        $prices = $crawler->filter('div.product-small.box > div.box-text.box-text-products.text-center.grid-style-2 > div.price-wrapper > span > del')->each(function ($node) {
            return $node->text();
        });

        $price_sale = $crawler->filter('div.product-small.box > div.box-text.box-text-products.text-center.grid-style-2 > div.price-wrapper > span > ins')->each(function ($node) {
            return $node->text();
        });

        $arr = array("VND", ".", ",", " ");
        foreach ($links as $key => $link) {

            $data = [
                'link' => $links[$key],
                'price' => isset($prices[$key]) ? (int)(Str::replace($arr, '', $prices[$key])) : 0,
                'price_sale' => isset($price_sale[$key]) ? (int)(Str::replace($arr, '', $price_sale[$key])) : 0,
                'domain' => 'salabookz.com',
                'menu_id' => $menu_id,
            ];

//            dump($data);

            $this->getContentBook($data);
        }
    }

    protected function getContentBook($data)
    {
        $url = $data['link'];
        $client = new Client();

        $crawler = $client->request('GET', $url);


        $names = $crawler->filter('div.product-info.summary.col-fit.col.entry-summary.product-summary.form-minimal > h1')->first()->text();
        try {
            $description = $crawler->filter('div.product-short-description > p')->first()->text();
        } catch (\InvalidArgumentException $e) {
            $description = '';
        }

        try {
            $content = $crawler->filter('#tab-description')->first()->outerHtml();
        } catch (\InvalidArgumentException $e) {
            $content = '';
        }

        $thumbs = $crawler->filter('div.woocommerce-product-gallery__image a')->eq(0)->attr('href');


        $data['name'] = $names;
        $data['content'] = $content;
        $data['description'] = $description;
        $data['slug'] = 'sachweb-danh-muc-' . $data['menu_id'] . '-' . Str::slug($names);
        $data['thumb'] = $thumbs;

//            dd($data);

        if (!$this->checkExistsBookMenuID($data['name'], $data['menu_id'])) {
            CrawlerProduct::create($data);

            $this->info('-- -- -- Insert Book Success');
        } else {
            $this->error('-- -- -- Error Insert Book: Trùng sách');
        }
//        $this->getCategoryProcess();
    }
}
