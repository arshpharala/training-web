<?php

namespace App\Http\Controllers\Admin\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalog\DeliveryMethod;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreDeliveryMethodRequest;
use App\Http\Requests\UpdateDeliveryMethodRequest;

class DeliveryMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = DeliveryMethod::withTrashed();


            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.catalog.delivery-methods.edit', $row->id);
                    // $deleteUrl = route('admin.catalog.courses.destroy', $row->id);
                    // $restoreUrl = route('admin.catalog.courses.restore', $row->id);
                    $editSidebar = true;
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'row', 'editSidebar'))->render();
                })
                ->editColumn('icon', function ($row) {
                    return $row->icon
                        ? '<img src="' . asset('storage/' . $row->icon) . '" class="img-sm">'
                        : '';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('d-M-Y  h:m A');
                })
                ->rawColumns(['icon', 'action'])
                ->make(true);
        }
        return view('theme.adminlte.catalog.delivery-methods.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response['view'] =  view('theme.adminlte.catalog.delivery-methods.create')->render();

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryMethodRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('delivery_methods', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        DeliveryMethod::create($data);

        return response()->json([
            'success'  => true,
            'message'  => 'Delivery Method created successfully.',
            'redirect' => route('admin.catalog.delivery-methods.index'),
        ]);
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
        $deliveryMethod = DeliveryMethod::findOrFail($id);

        $response['view'] = view('theme.adminlte.catalog.delivery-methods.edit', compact('deliveryMethod'))->render();

        return response()->json([
            'success' => true,
            'data'    => $response,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryMethodRequest $request, string $id)
    {
        $deliveryMethod = DeliveryMethod::findOrFail($id);
        $data = $request->validated();

        // Handle icon upload
        if ($request->hasFile('icon')) {
            if ($deliveryMethod->icon) {
                Storage::disk('public')->delete($deliveryMethod->icon);
            }
            $data['icon'] = $request->file('icon')->store('delivery_methods', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $deliveryMethod->update($data);

        return response()->json([
            'success'  => true,
            'message'  => 'Delivery Method updated successfully.',
            'redirect' => route('admin.catalog.delivery-methods.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
