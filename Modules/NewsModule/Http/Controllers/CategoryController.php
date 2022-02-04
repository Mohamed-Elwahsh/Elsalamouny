<?php

namespace Modules\NewsModule\Http\Controllers;

use File;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\NewsModule\Repository\CategoryRepository;
use Modules\CommonModule\Helper\UploaderHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $category = CategoryRepository::findAll();
        // return $category;
        return view('newsmodule::Category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('newsmodule::Category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $categoryData = $request->except('_token');
        CategoryRepository::save($categoryData);
        return redirect('admin-panel/category')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('newsmodule::Category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = CategoryRepository::find($id);

        return view('newsmodule::Category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $category = $request->except('_method', '_token');
        $categoryTrans = $request->only('ar', 'en');

        CategoryRepository::update($id, $category, $categoryTrans);

        return redirect('admin-panel/category')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $category = CategoryRepository::find($id);
        CategoryRepository::delete($category);

        return redirect()->back();
    }
}
