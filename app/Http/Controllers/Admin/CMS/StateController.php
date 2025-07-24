<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Http\Requests\StateRequest;
use App\Models\Country;
use DataTables;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = State::select('states.*', 'countries.name as country_name')
            ->join('countries', 'states.country_id', '=', 'countries.id')
            ->orderBy('countries.name');

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.cms.states.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
            })
            ->setRowId('id')
            ->rawColumns(['action'])
            ->make(true);
        }

        return view("theme.adminlte.cms.states.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']         =   new State();
        $data['countries']      =   Country::pluck("name","id")->toArray();
        $data['url']            =   route("admin.cms.states.store");
        $data['method']         =   "POST";
        return view("theme.adminlte.cms.states.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StateRequest $request)
    {
        $object                             =   new State();
        $object->country_id                 =   $request->country_id;
        $object->name                       =   $request->name;
        $object->state_code                 =   $request->state_code;
        $object->save();
        return response()->json(['message' => 'State Created successfully.', 'redirect' => route('admin.cms.states.index')]);
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
        $data['object']         =   State::findOrFail($id);
        $data['countries']      =   Country::pluck("name","id")->toArray();
        $data['url']            =   route("admin.cms.states.update",['state'=>$id]);
        $data['method']         =   "PUT";
        return view("theme.adminlte.cms.states.form",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StateRequest $request, string $id)
    {
        $object                             =   State::findOrFail($id);
        $object->country_id                 =   $request->country_id;
        $object->name                       =   $request->name;
        $object->state_code                 =   $request->state_code;
        $object->update();
        return response()->json(['message' => 'State Updated successfully.', 'redirect' => route('admin.cms.states.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $object                      =   State::with(['cities'])->findOrFail($id);
        $object->cities->delete();
        $object->delete();
    }
}
