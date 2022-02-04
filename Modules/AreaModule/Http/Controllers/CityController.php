<?php

namespace Modules\AreaModule\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\AreaModule\Repository\CountryRepository;
use Modules\AreaModule\Repository\CityRepository;
use Modules\AreaModule\Repository\GovernmentRepository;
use Modules\AreaModule\Entities\Government;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $city =CityRepository::findAll();

        return view('areamodule::City.index', ['city' => $city]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $government=GovernmentRepository::findAll();
        return view('areamodule::City.create',compact('government'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $cityData = $request->except('_token');
        CityRepository::save($cityData);

        return redirect('admin-panel/city')->with('success', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $city = CityRepository::find($id);
        // $government=GovernmentRepository::findWhere('id',$city->government_id);
        $government=GovernmentRepository::findAll();

        return view('areamodule::City.edit', ['city' => $city,'government' => $government]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $city = $request->except('_method', '_token');
        $cityTrans = $request->only('ar', 'en');

        CityRepository::update($id, $city, $cityTrans);

        return redirect('admin-panel/city')->with('updated', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $city = CityRepository::find($id);
        CityRepository::delete($city);

        return redirect()->back();
    }
    public function getGov($country_id){
        $government=GovernmentRepository::findWhere('country_id',$country_id);
        return response()->json($government);
    }
}
