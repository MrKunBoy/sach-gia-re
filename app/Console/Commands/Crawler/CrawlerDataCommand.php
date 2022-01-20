<?php

namespace App\Console\Commands\Crawler;

use App\Models\Crawler\CrawlerPost;
use App\Models\Menu;
use App\Models\Post;
use Goutte;
use App\Models\Crawler\CrawlerCategory;
use App\Traits\HelperCrawlerTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class CrawlerDataCommand extends Command
{
    use HelperCrawlerTrait;

    protected $signature = 'crawler:init';

    protected $description = 'Crawler';

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
        $this->crawlCategory();
        $this->crawlerPost();

    }

    protected function crawlCategory()
    {
        $linkCate = 'https://www.vinabook.com';
        $this->info("--Category");
        $this->warn("--Link: " . $linkCate);

        $html = file_get_html($linkCate);
        foreach ($html->find("#tygh_main_container > div.tygh-header.clearfix > div > div:nth-child(1) > div > div > div.span3.categories-wap > div > nav > ul > li > ul > li > a") as $link) {
            $nameCategory = $link->plaintext ?? "";
            $linkCategory = str_replace('https://www.vinabook.com', '', $link->href ?? "");

            $menus = [
                'name' => $nameCategory,
                'slug' => Str::slug($nameCategory),
                'link' => $linkCate . $linkCategory,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'domain' => 'vinabook.com'
            ];

            if (!$this->checkExistsCate($nameCategory)) {
                $categoryCraw = CrawlerCategory::create($menus);

                if ($categoryCraw) {
                    $categoryData = Menu::create($menus);
                    if ($categoryData) {
                        $categoryCraw->cr_menu_id = $categoryData->id;
                        $categoryCraw->save();
                    }
                }
                $this->info('-- -- -- Insert Cate Success');

                $this->categoryChild($menus);

            } else {
                $this->error('-- -- -- Error Insert Cate');
            }

        }

    }

    public function categoryChild($menus)
    {

        $crawler = \Goutte::request('GET', $menus['link']);

        $names = $crawler->filter('#tygh_main_container > div.tygh-content.clearfix.no-margin-top > div > div:nth-child(2) > div.span3.page-categories-left > div.box-widget.box-widget-categories > ul > li > a.category.level2')->each(function ($node) {
            $arr = array("[", "]", "{", "}", ":", '"', '(', ')', '&', "'", ',');
            return str_replace($arr, '', $node->attr('title'));
        });

        $links = $crawler->filter('#tygh_main_container > div.tygh-content.clearfix.no-margin-top > div > div:nth-child(2) > div.span3.page-categories-left > div.box-widget.box-widget-categories > ul > li > a.category.level2')->each(function ($node) {
            return $node->attr('href');
        });

        $vowels = array("[", "]", "{", "}", ":", '"', "id");
        $id_cate = str_replace($vowels, '', CrawlerCategory::select('id')->where('name', $menus['name'])->get());

        if (isset($names) && isset($links)) {
            foreach ($names as $key => $name) {

                $data = [
                    'name' => $names[$key],
                    'slug' => Str::slug($names[$key]),
                    'link' => $links[$key],
                    'parent_id' => $id_cate ?? 0,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                    'domain' => 'vinabook.com'
                ];

                if ($data) {
                    if (!$this->checkExistsCate($data['name'])) {
                        $categoryCraw = CrawlerCategory::create($data);

                        if ($categoryCraw) {
                            $categoryData = Menu::create($data);
                            if ($categoryData) {
                                $categoryCraw->cr_menu_id = $categoryData->id;
                                $categoryCraw->save();
                            }
                        }

                        $this->info('-- -- -- Insert Cate Child Success');
                    } else {
                        $this->error('-- -- -- Error Insert Cate Child: trùng slug');
                    }
                } else {
//                có thể k cần
                    $this->error('-- -- -- Error Insert Cate Child: data rỗng');
                }

//                return $data;

            }
        }
    }


    protected function crawlerPost()
    {

//https://reviewsach.net/sach-kinh-te/
        $linkContentPosts = 'https://reviewsach.net/blog-tong-hop/';
        $this->info("--Posts");
        $this->warn("--Link: " . $linkContentPosts);

        $crawler = \Goutte::request('GET', $linkContentPosts);

        $thumb = $crawler->filter('div.td-ss-main-content div.td_module_11 div.td-module-thumb a img.entry-thumb')->each(function ($node) {
            return $node->attr('data-lazy-src');
        });

        $titlePost = $crawler->filter('div.td-ss-main-content div.td_module_11 div.item-details h3 a')->each(function ($node) {
            return $node->attr('title');
        });

        $linkPost = $crawler->filter('div.td-ss-main-content div.td_module_11 div.item-details h3 a')->each(function ($node) {
            return $node->attr('href');
        });

        $descriptionPost = $crawler->filter('div.td-ss-main-content div.td_module_11 div.item-details div.td-excerpt')->each(function ($node) {
            return $node->text();
        });

        $i = 0;
        foreach ($titlePost as $key => $title) {

            $data = [
                'title' => $titlePost[$key],
                'slug' => \Str::slug($titlePost[$key]),
                'content' => self::contentPost($linkPost[$key]),
                'link' => isset($linkPost[$key]) ? $linkPost[$key] : '',
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'domain' => isset($linkContentPosts) ? $linkContentPosts : '',
                'thumb' => isset($thumb[$i]) ? $thumb[$i] : '',
                'description' => isset($descriptionPost[$key]) ? $descriptionPost[$key] : '',
            ];

            $i = $i + 2;
            if (!$this->checkExistsPost($titlePost[$key])) {
                $postCraw = CrawlerPost::create($data);
                if ($postCraw) {
                    $postData = Post::create($data);
                    if ($postData) {
                        $postCraw->cr_post_id = $postData->id;
                        $postCraw->save();
                    }
                }
                $this->info('-- -- -- Insert Post Success');
            } else {
                $this->error('-- -- -- Error Insert Post');
            }
        }
    }

    public function contentPost($url)
    {
        $crawlercontentpost = \Goutte::request('GET', $url);
        $content = $crawlercontentpost->filter('.td-post-content.tagdiv-type')->each(function ($node) {
            return $node->outerHtml();
        })[0];

        return $content;

    }


}

