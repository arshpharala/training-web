<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use DataTables;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Country::orderBy("name")->select("*");
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.cms.countries.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
            })
            ->setRowId('id')
            ->rawColumns(['action'])
            ->make(true);
        }
        return view("theme.adminlte.cms.countries.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']         =   new Country();
        $data['url']            =   route("admin.cms.countries.store");
        $data['method']         =   "POST";
        return view("theme.adminlte.cms.countries.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $object                             =   new Country();
        $object->name                       =   $request->name;
        $object->iso2                       =   $request->iso2;
        $object->iso3                       =   $request->iso3;
        $object->numeric_code               =   $request->numeric_code;
        $object->phone_code                 =   $request->phone_code;
        $object->currency                   =   $request->currency;
        $object->save();
        return response()->json(['message' => 'Country Created successfully.', 'redirect' => route('admin.cms.countries.index')]);
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
        $data['object']         =   Country::findOrFail($id);
        $data['url']            =   route("admin.cms.countries.update",['country'=>$id]);
        $data['method']         =   "PUT";
        return view("theme.adminlte.cms.countries.form",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, string $id)
    {
        $object                             =   Country::findOrFail($id);
        $object->name                       =   $request->name;
        $object->iso2                       =   $request->iso2;
        $object->iso3                       =   $request->iso3;
        $object->numeric_code               =   $request->numeric_code;
        $object->phone_code                 =   $request->phone_code;
        $object->currency                   =   $request->currency;
        $object->update();
        return response()->json(['message' => 'Country Updated successfully.', 'redirect' => route('admin.cms.countries.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $object                      =   Country::with(['states.cities'])->findOrFail($id);
        if ($object->states->isNotEmpty()) {
            foreach ($object->states as $state) {
                if ($state->cities->isNotEmpty()) {
                    foreach ($state->cities as $city) {
                        $city->delete();
                    }
                }
                $state->delete();
            }
        }
        $object->delete();
        // Session::flash("success","Country Deleted");
        // return redirect(route("countries.index"));
    }
}
