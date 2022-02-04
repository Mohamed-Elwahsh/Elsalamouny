<?php

namespace Modules\ServiceModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\UploaderHelper;
use Modules\ServiceModule\Entities\ServiceCategory\ServiceCategory;
use Modules\ServiceModule\Repository\ServiceCategoryRepository;
use Yajra\DataTables\DataTables;


class ServiceCategoryController extends Controller
{
    use UploaderHelper;

    protected $serviceCategRepo;

    public function __construct(ServiceCategoryRepository $serviceCategRepo)
    {
        $this->serviceCategRepo = $serviceCategRepo;
    }

   
    public function index()
    {
        $categories = $this->serviceCategRepo->findAll();
        return view('servicemodule::ServiceCategory.index', ['categories' => $categories]);
    }

    function  dataTables(){
        $categories = $this->serviceCategRepo->findAll();

        return DataTables::of($categories)

            ->addColumn('title', function($row) {
                return  $row->title;
            })
            ->addColumn('operation', function($row) {

                $delete_tag='<a href="'. url('admin-panel/servicemodule/category/delete', $row->id) .'" class="btn btn btn-danger" onclick="return confirm(\'Are you sure, You want to delete this Data?\')"><i class="glyphicon glyphicon-trash"></i></a>';
                $edit_tag='<a href="'. url("admin-panel/servicemodule/category/".$row->id."/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                return $edit_tag.' '.$delete_tag;

            })
            ->addColumn('photo', function($row) {
                if($row->photo){
                    return '<img width="100" height="100" src='. asset("images/service/" . $row->photo).'>';
                } else {
                    return '<strong> No Photo </strong>';
                }
            })

            ->rawColumns(['operation' => 'operation', 'photo' => 'photo'])

            ->make(true);
    }

   
    public function create()
    {
        return view('servicemodule::ServiceCategory.create');
    }

   
    public function store(Request $request)
    {

        $categData = $request->except('_token');
        $categData['created_by'] = auth()->user()->id;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'service');
            $categData['photo'] = $imageName;
        }

        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $imageName = $this->upload($image, 'service');
            $categData['cover_photo'] = $imageName;
        }

        

        $this->serviceCategRepo->save($categData);

        return redirect('admin-panel/servicemodule/category')->with('success', 'success');
    }

   
    public function edit($id)
    {
        $category = $this->serviceCategRepo->find($id);

        return view('servicemodule::ServiceCategory.edit', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token', '_method');
        
        $this->serviceCategRepo->update($id, $data);

        if ($request->hasFile('photo')){
            $cat = ServiceCategory::find($id);
            $image = $request->file('photo');
            $imageName = $this->upload($image, 'service');
            $cat->update(['photo'=>$imageName]);
        }

        if ($request->hasFile('cover_photo')){
            $cat = ServiceCategory::find($id);
            $image = $request->file('cover_photo');
            $imageName = $this->upload($image, 'service');
            $cat->update(['cover_photo'=>$imageName]);
        }

        return redirect('admin-panel/servicemodule/category')->with('updated', 'updated');
    }

   
    public function destroy($id)
    {
        $categ = $this->serviceCategRepo->find($id);
        $this->serviceCategRepo->delete($categ);

        return redirect()->back();
    }
}
