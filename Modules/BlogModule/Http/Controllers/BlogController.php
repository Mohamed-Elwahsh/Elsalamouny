<?php

namespace Modules\BlogModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Entities\City;
use Modules\BlogModule\Entities\Blog;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\BlogModule\Http\Requests\BlogRequest;
use Modules\BlogModule\Repository\BlogRepository;
use Modules\BlogModule\Repository\BlogCategoryRepository;

class BlogController extends Controller
{
    use UploaderHelper;

    private $blogRepo;
    private $blogCategoryRepository;

    public function __construct(BlogRepository $blogRepo,BlogCategoryRepository $blogCategoryRepository)
    {
        $this->blogRepo = $blogRepo;
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $blogs = $this->blogRepo->findAll();
        return view('blog::Blog.index',compact('blogs'));
    }


    // yajra datatable
    function  dataTables(){
        $blogs = $this->blogRepo->findAll()->where('is_featured',1);

        return DataTables::of($blogs)

            ->addColumn('title', function($row) {
                return  $row->title;
            })


            ->addColumn('photo', function($row) {
                if($row->photo){
                    return '<img width="100" height="100" src='. asset("images/blog/" . $row->photo).'>';
                } else {
                    return '<strong> No Photo </strong>';
                }
            })

            ->addColumn('operation', function($row) {

                $delete_tag='<a href="'. url('admin-panel/blogs/delete', $row->id) .'" class="btn btn btn-danger" onclick="return confirm(\'Are you sure, You want to delete this Data?\')"><i class="glyphicon glyphicon-trash"></i></a>';
                $edit_tag='<a href="'. url("admin-panel/blogs/".$row->id."/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                return $edit_tag.' '.$delete_tag;

            })

            ->rawColumns(['operation' => 'operation', 'photo' => 'photo'])

            ->make(true);
    }

     // ads datatable
     function  adsDataTables(){
        // $blogs = $this->blogRepo->findAll()->where('is_featured',0);
        $blogs = Blog::where('is_featured',0)->paginate(10);
        return view('blog::Blog.ads',compact('blogs'));
        /* return DataTables::of($blogs)

            ->addColumn('title', function($row) {
                return  $row->title;
            })


            ->addColumn('photo', function($row) {
                if($row->photo){
                    return '<img width="100" height="100" src='. asset("images/blog/" . $row->photo).'>';
                } else {
                    return '<strong> No Photo </strong>';
                }
            })

            ->addColumn('operation', function($row) {

                $delete_tag='<a href="'. url('admin-panel/blogs/delete', $row->id) .'" class="btn btn btn-danger" onclick="return confirm(\'Are you sure, You want to delete this Data?\')"><i class="glyphicon glyphicon-trash"></i></a>';
                $edit_tag='<a href="'. url("admin-panel/blogs/".$row->id."/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                return $edit_tag.' '.$delete_tag;

            })

            ->rawColumns(['operation' => 'operation', 'photo' => 'photo'])

            ->make(true); */
    }

    // active button
    public function active($id) {
        // dd($id);
        $blog = $this->blogRepo->find($id);
        $blog->is_featured = 1;
        $blog->save();
        return redirect()->back();
    }

    public function details($id) {
        $blogs = Blog::findOrFail($id);
        return view('blog::Blog.detail',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories=$this->blogCategoryRepository->findAllParent();
        $cities = City::all();
        return view('blog::Blog.create',compact('categories','cities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $blogData = $request->except('_token', '_wysihtml5_mode','photo');
        $blogData['created_by'] = auth()->user()->id;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'blog');
            $blogData['photo'] = $imageName;
        }


        $categ = $this->blogRepo->save($blogData);

        return redirect('admin-panel/blogs')->with('success', 'success');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $blog = $this->blogRepo->find($id);

        return view('blog::Blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $categories=$this->blogCategoryRepository->findAllParent();
        $cities = City::get();
        $blog = $this->blogRepo->find($id);

        foreach ($blog->categories as $value) {
            $selected_categ_ids[] = $value->id;
        }

        return view('blog::Blog.Edit',compact('categories', 'blog', 'selected_categ_ids','cities'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $blog = $request->except('_token','photo','id');

        $activeLangCode = \LanguageHelper::getLangCode();
        $blog_trans = $request->only($activeLangCode);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'blog');
            $blog['photo'] = $imageName;
        }

        $blog = $this->blogRepo->update($id, $blog,$blog_trans);

        return redirect('admin-panel/blogs')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $blog = $this->blogRepo->delete($id);

        return redirect()->back();
    }
}
