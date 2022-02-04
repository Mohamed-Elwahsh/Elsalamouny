<?php

namespace Modules\NewsModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\NewsModule\Repository\CategoryRepository;
use Modules\NewsModule\Entities\Category;
use Modules\NewsModule\Repository\NewsRepository;
use Modules\NewsModule\Entities\News;
use Modules\CommonModule\Helper\UploaderHelper;
use Yajra\DataTables\DataTables;


class NewsController extends Controller
{
    use UploaderHelper;

    private $newsRepo;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cat = CategoryRepository::findAll();
        $news = NewsRepository::findAll();
        return view('newsmodule::News.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
 
    // yajra datatable
    function  dataTables(){
        $cat = CategoryRepository::findAll();
        $news = NewsRepository::findAll();

        return DataTables::of($news)
        ->addColumn('id', function($row) {
            return  $row->id;
        })
            ->addColumn('title', function($row) {
                return  $row->title;
            })

            
            
            ->addColumn('photo', function($row) {
                if($row->photo){
                    return '<img width="100" height="100" src='. asset("images/newsImages/" . $row->photo).'>';
                } else {
                    return '<strong> No Photo </strong>';
                }
            })
            ->addColumn('cate_name', function($row) {
                return  $row->categories->title;
            })

            ->addColumn('operation', function($row) {

                $delete_tag='<a href="'. url('admin-panel/news/delete', $row->id) .'" class="btn btn btn-danger" onclick="return confirm(\'Are you sure, You want to delete this Data?\')"><i class="glyphicon glyphicon-trash"></i></a>';
                $edit_tag='<a href="'. url("admin-panel/news/".$row->id."/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                return $edit_tag.' '.$delete_tag;

            })

            ->rawColumns(['operation' => 'operation', 'photo' => 'photo' , 'cate_name' => 'cate_name'])

            ->make(true);
    }


    public function create()
    {
        $category=CategoryRepository::findAll();
        $news=NewsRepository::findAll();
        return view('newsmodule::News.create', compact('category' , 'news'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    
    public function store(Request $request)
    {
        $newsData = $request->except('_token','_wysihtml5_mode','photo');
// dd($request->all());
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'newsImages');
            $newsData['photo'] = $imageName;
        }


        // $categ = $this->newsRepo->save($newsData);

        // $newsData = $request->except('_token');
        NewsRepository::save($newsData);

        return redirect('admin-panel/news')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('newsmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $news = NewsRepository::find($id);
        $category= CategoryRepository::findAll();
        // return $category;
        return view('newsmodule::News.edit', ['news' => $news, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        
        $news = $request->except('_token','photo','id');

        $activeLangCode = \LanguageHelper::getLangCode();
        $news_trans = $request->only($activeLangCode);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'newsImages');
            $news['photo'] = $imageName;
        }

        // $news = $this->blogRepo->update($id, $news,$news_trans);
        $news = NewsRepository::update($id, $news,$news_trans);

        return redirect('admin-panel/news')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $news = NewsRepository::find($id);
        NewsRepository::delete($news);

        return redirect()->back();
    }
}
