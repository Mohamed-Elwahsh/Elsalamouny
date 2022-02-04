<?php

namespace Modules\SiteModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\NewsModule\Entities\News;
use Illuminate\Contracts\Support\Renderable;
use Modules\BlogModule\Entities\BlogCategory;
use Modules\NewsModule\Repository\NewsRepository;
use Modules\NewsModule\Repository\CategoryRepository;



class SiteNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('sitemodule::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sitemodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $categories = BlogCategory::with('translations','child.translations')->get();
        $category = CategoryRepository::find($id);
        $allCategory = CategoryRepository::findAll();
        $allNews = $category->news;
        // dd($allNews);
        return view('sitemodule::blog', compact('allNews','categories', 'category' , 'allCategory'));
    }
    public function showNews($id)
    {
        $categories = BlogCategory::with('translations','child.translations')->get();
        $news = NewsRepository::find($id);
        $allCategory = CategoryRepository::findAll();
        return view('sitemodule::news', compact('news','categories', 'allCategory'));
    }

    public function allNews() {
        $categories = BlogCategory::with('translations','child.translations')->get();
        $newsCategory = CategoryRepository::findAll();
        // $allnews = NewsRepository::findAll()->paginate(10);
        $allnews = News::paginate(10);
        return view('sitemodule::allNews',compact('categories','newsCategory','allnews'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sitemodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
