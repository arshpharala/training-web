<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Models\Venue;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\VenueRequest;
use DataTables;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Venue::select('venues.*', 'countries.name as country_name')
            ->join('countries', 'venues.country_id', '=', 'countries.id')
            ->orderBy('venues.position');

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.cms.venues.edit', $row->id) . '"><i class="fa fa-edit"></i></a>';
            })
            ->setRowId('id')
            ->rawColumns(['action'])
            ->make(true);
        }
        return view("theme.adminlte.cms.venues.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']         =   new Venue();
        $data['countries']      =   Country::pluck("name","id")->toArray();
        $data['url']            =   route("admin.cms.venues.store");
        $data['method']         =   "POST";
        return view("theme.adminlte.cms.venues.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueRequest $request)
    {
        $allObjects                 =   Venue::count();
        $object                     =   new Venue();
        $object->country_id         =   $request->country_id;
        $object->name               =   $request->name;
        $trimText                   =   convertStringToSlug($request->name);
        $object->slug               =   $trimText;
        $object->position           =   $allObjects  + 1;
        // Handle image_1 upload
        if ($request->hasFile('image_1')) {
            $image_1 = $request->file('image_1');
            $filename_1 = 'venue_' . uniqid() . '.' . $image_1->getClientOriginalExtension();
            $image_1->move(public_path('venue'), $filename_1);
            $object->image_1 = 'venue/' . $filename_1;
        }
        $object->save();
        return response()->json(['message' => 'Venue Created successfully.', 'redirect' => route('admin.cms.venues.index')]);
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
        $data['object']         =   Venue::findOrFail($id);
        $data['countries']      =   Country::pluck("name","id")->toArray();
        $data['url']            =   route("admin.cms.venues.update",['venue'=>$id]);
        $data['method']         =   "PUT";
        return view("theme.adminlte.cms.venues.form",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenueRequest $request, string $id)
    {
        $object                     =   Venue::findOrFail($id);
        $object->country_id         =   $request->country_id;
        $object->name               =   $request->name;
        $trimText                   =   convertStringToSlug($request->name);
        $object->slug               =   $trimText;
        // Handle image_1 upload
        if ($request->hasFile('image_1')) {
            if (File::exists(public_path($object->image_1))) {
                File::delete(public_path($object->image_1));
            }
            $image_1 = $request->file('image_1');
            $filename_1 = 'venue_' . uniqid() . '.' . $image_1->getClientOriginalExtension();
            $image_1->move(public_path('venue'), $filename_1);
            $object->image_1 = 'venue/' . $filename_1;
        }
        $object->update();
        return response()->json(['message' => 'Venue Updated successfully.', 'redirect' => route('admin.cms.venues.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $object                      =   Venue::findOrFail($id);
        if (File::exists(public_path($object->image_1))) {
            File::delete(public_path($object->image_1));
        }
        $object->delete();
        return response()->json(['message' => 'Venue Deleted successfully.', 'redirect' => route('admin.cms.venues.index')]);

    }
}
