<?php

namespace App\Console\Commands\Crawler;

use App\Models\Crawler\CrawlerShop;
use App\Models\Shop;
use Illuminate\Console\Command;
use App\HelpersClass\CliEcho;
use App\Traits\HelperCrawlerTrait;
use Goutte\Client;
use Illuminate\Support\Str;
use Symfony\Component\HttpClient\HttpClient;

class CrawlerShopCommand extends Command
{
    use HelperCrawlerTrait;

    protected $signature = 'crawler:shop';

    protected $description = 'Crawler Shop';

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
        $url = 'https://mgg.vn';
        $this->crawlerShopMgg($url);
    }

// php artisan crawler:shop
    public function crawlerShopMgg($url)
    {
        CliEcho::infonl("--Shop");
        CliEcho::warningnl("--Link: " . $url);

        $client = new Client(HttpClient::create(['timeout' => 60]));

        $crawler = $client->request('GET', $url);

        $links = $crawler->filter('#popular_stores-3 > div > div > div.column > div.store-thumb > a')->each(function ($node) {
            return $node->attr('href');
        });

        foreach ($links as $key => $link) {

            $data = [
                'link' => $links[$key],
                'domain' => 'mgg.vn',
            ];

//            dump($data);

            $this->getContentShopMgg($data);
        }
    }

    protected function getContentShopMgg($data)
    {
        $url = $data['link'];
        $client = new Client();

        $crawler = $client->request('GET', $url);


        try {
            $description = $crawler->filter('div.header-content h1')->first()->text();
        } catch (\InvalidArgumentException $e) {
            $description = '';
        }

        try {
            $content = $crawler->filter('div.header-content p')->first()->text();
        } catch (\InvalidArgumentException $e) {
            $content = '';
        }
        $names = $crawler->filter('div.header-thumb > div > a')->first()->attr('title');
        $thumbs = $crawler->filter('div.header-thumb > div > a > img')->first()->attr('data-lazy-src');


        $data['name'] = $names;
        $data['content'] = $content;
        $data['description'] = $description;
        $data['slug'] = Str::slug($names);
        $data['thumb'] = $thumbs;

//            dd($data);

        if (!$this->checkExistsShop($names)) {
            $crawlerShop = CrawlerShop::create($data);
            if ($crawlerShop) {
                $shopData = Shop::create($data);
                if ($shopData) {
                    $crawlerShop->cr_shop_id = $shopData->id;
                    $crawlerShop->save();
                }
            }
            CliEcho::success('-- -- -- Insert Shop Success');
        } else {
            CliEcho::warningnl('-- -- -- Error Insert Shop: Trùng shop');
        }


    }

}
