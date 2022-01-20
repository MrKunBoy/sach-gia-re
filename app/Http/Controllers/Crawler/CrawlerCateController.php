<?php

namespace App\Http\Controllers\Crawler;

use App\Http\Controllers\Controller;
use App\Models\Crawler\CrawlerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CrawlerCateController extends Controller
{


    public function index()
    {
        $categories = CrawlerCategory::with('category:id,name')->orderByRaw('id DESC')->paginate(15);

        $viewData = [
            'categories' => $categories,
            'title' => 'Danh sách danh mục'
        ];

        return view('crawler.category.index', $viewData);
    }

    public function edit(CrawlerCategory $category)
    {
        return view('crawler.category.edit',[
            'title'=> 'Chỉnh sửa danh mục',
            'category' => $category
        ]);
    }

    public function update(Request $request, CrawlerCategory $category)
    {
        $this->validate($request, [
            'name'=>'required',
            'link'=>'required',
            'domain'=>'required',
        ]);

        try {
            $category->name = (string) $request->input('name');
            $category->link = (string) $request->input('link');
            $category->domain = (string) $request->input('domain');
            $category->cr_total_page = (string) $request->input('cr_total_page');
            $category->description = (string) $request->input('description');
            $category->content = (string) $request->input('content');
            $category->slug = Str::slug($request->input('name'),'-');
            $category->save();

            Session::flash('success','Cập nhật danh mục thành công');

        }catch(\Exception $err) {
            Session::flash('error', 'Lõi cập nhật danh mục');
            \Log::info($err->getMessage());
            return redirect()->back();
        }

        return redirect('/crawler/category/');

    }

}
