<?php

namespace Modules\AreaModule\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\CommonModule\Helper\UploaderHelper;

class GovernmentController extends Controller
{
    use UploaderHelper;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $government =GovernmentRepository::findAll();

        return view('areamodule::Government.index', ['government' => $government]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('areamodule::Government.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $governmentData = $request->except('_token');
        GovernmentRepository::save($governmentData);

        return redirect('admin-panel/government')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $government = GovernmentRepository::find($id);

        return view('areamodule::Government.edit', ['government' => $government]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $government = $request->except('_method', '_token');
        $governmentTrans = $request->only('ar', 'en');

        GovernmentRepository::update($id, $government, $governmentTrans);

        return redirect('admin-panel/government')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $government = GovernmentRepository::find($id);
        GovernmentRepository::delete($government);

        return redirect()->back();
    }
}
