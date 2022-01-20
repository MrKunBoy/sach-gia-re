<?php

namespace App\Console\Commands\Crawler;

use App\HelpersClass\CliEcho;
use App\Models\Crawler\CrawlerProduct;
use App\Models\Product;
use App\Traits\HelperCrawlerTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Goutte\Client;

class CrawlerProductCommand extends Command
{
    use HelperCrawlerTrait;
    protected $signature = 'crawler:product';
    protected $description = 'Crawler Products';

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
        #Lấy dứ liệu trang vinabook.com
        $category = $this->getCategoryDefault();
        if(!$category){
            CliEcho::successnl("-- Run crawler cate Stop:");
            return;
        }

        $this->getPageByCategory($category);

    }

    protected function getPageByCategory($category)
    {
        CliEcho::infonl("-- -- Link: ".$category->link);
        $html = file_get_html($category->link);
        $pageArr = [];
        foreach ($html->find('#pagination_contents > div.pagination-bottom > div > a') as $link){
            $page = $link->plaintext ?? '';
            $pageArr[] = $page;
        }
        $totalPage = Str::replace('2 - ','',array_pop($pageArr) ?? 1);

        CliEcho::infonl("-- -- Total Page = ". $totalPage ?? 'null');

//       2. Cập nhật tổng số trang
        $category->cr_total_page = $totalPage;
        $category->save();

//       3. Crawler link product detail
        $this->getProductByCategory($category);

//       4. lặp lấy tất cả sách
        $this->init();

    }

    protected function getProductByCategory($category)
    {
        for ($i=1;$i<=$category->cr_total_page;$i++){
            if($i==1){
                $linkpage = $category->link.'?sef_rewrite=1';
            }else{
                $linkpage = $category->link.'page-'.$i.'/?sef_rewrite=1';
            }
            CliEcho::infonl("-- -- -- Link : ". $linkpage);

//            4. Lấy thông tin sách: ảnh, tên, link chi tiết, giá bán, giá sale
            self::crawlerBook($linkpage, $category);
        }
        $this->getCategorySuccess();
    }

    protected function crawlerBook($linkpage, $category)
    {
        CliEcho::infonl("--Book");
        CliEcho::warningnl("--Link: " . $linkpage);

        $crawler = \Goutte::request('GET', $linkpage);

        $thumbs = $crawler->filter('div.product_thumb a img')->each(function ($node) {
            return $node->attr('data-src');
        });


        $names = $crawler->filter('div.product_thumb a img')->each(function ($node) {
            return $node->attr('title');
        });

        $links = $crawler->filter('div.product_thumb a')->each(function ($node) {
            return $node->attr('href');
        });

        $prices = $crawler->filter('form div.price-wrap span.strike')->each(function ($node) {
            return $node->text();
        });

        $price_sales = $crawler->filter('form div.price-wrap span.price')->each(function ($node) {
            return $node->text();
        });
        $i = 0;
        $arr = array("₫", ".", ","," ");
        foreach ($links as $key => $link) {

            $data = [
                'name' => $names[$i],
                'slug' => 'danh-muc-'.$category->id.'-'.Str::slug($names[$i]),
                'thumb' => isset($thumbs[$i]) ? $thumbs[$i] : '',
                'price' => isset($prices[$key]) ? (int)(Str::replace($arr,'',$prices[$key])) : 0,
                'price_sale' => isset($price_sales[$key]) ? (int)(Str::replace($arr,'',$price_sales[$key])) : 0,
                'link' => isset($links[$key]) ? $links[$key] : '',
                'domain' => 'vinabook.com',
                'menu_id' => $category->id,
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ];

            $this->getContentBook($data);

            $i = $i+2;
        }

    }

    protected function getContentBook($data)
    {
        $url = $data['link'];
        $crawler = \Goutte::request('GET', $url);


        try {
            $description = $crawler->filter('div.product-info > div.mainbox2-container.introduction-contents > div.mainbox2-body')->eq(0)->text();

            $content = $crawler->filter('#product-full-description > div.mainbox2-container')->eq(0)->outerHtml();

        } catch (\InvalidArgumentException $e) {
            // Handle the current node list is empty..
            $description = '';
            $content = '';
        }

        try {
            $detail = $crawler->filter('#product-details-box > div.mainbox2-container')->eq(0)->outerHtml();
        }catch (\InvalidArgumentException $e){$detail = '';}


        $data['description'] =  $description;
        $data['content'] =  $content;
        $data['details'] =  $detail;
//        dump($data);
        if (!$this->checkExistsBook($data['name'],$data['menu_id'])) {
            CrawlerProduct::create($data);

            $this->info('-- -- -- Insert Book Success');
        } else {
            $this->error('-- -- -- Error Insert Book: Trùng sách');
        }
        $this->getCategoryProcess();
    }
}
