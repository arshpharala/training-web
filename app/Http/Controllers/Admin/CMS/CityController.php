<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Http\Requests\CityRequest;
use DataTables;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('cities')->select(['cities.id','cities.name','states.name as state_name','countries.name as country_name'])
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->join('countries', 'states.country_id', '=', 'countries.id')
            ->orderBy('cities.name');

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.cms.cities.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
            })
            ->setRowId(function ($row) {
                return 'row_' . $row->id;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view("theme.adminlte.cms.cities.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']             =   new City();
        $data['countriesStates']    =   Country::with("states")->get();
        $data['url']                =   route("admin.cms.cities.store");
        $data['method']             =   "POST";
        return view("theme.adminlte.cms.cities.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $object                             =   new City();
        $object->state_id                   =   $request->state_id;
        $object->name                       =   $request->name;
        $object->save();
        return response()->json(['message' => 'City Created successfully.', 'redirect' => route('admin.cms.cities.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['object']             =   City::findOrFail($id);
        $data['countriesStates']    =   Country::with("states")->get();
        $data['url']                =   route("admin.cms.cities.update",['city'=>$id]);
        $data['method']             =   "PUT";
        return view("theme.adminlte.cms.cities.form",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id)
    {
        $object                             =   City::findOrFail($id);
        $object->state_id                   =   $request->state_id;
        $object->name                       =   $request->name;
        $object->update();
        return response()->json(['message' => 'City Created successfully.', 'redirect' => route('admin.cms.cities.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $object             =   City::findOrFail($id);
        $object->delete();
    }
}
