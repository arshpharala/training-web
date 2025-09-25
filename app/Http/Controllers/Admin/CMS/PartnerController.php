<?php

namespace App\Http\Controllers\Admin\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePartnerRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\CMS\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $partners = Partner::withTrashed();
            return DataTables::of($partners)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.cms.partners.edit', $row->id);
                    $deleteUrl = route('admin.cms.partners.destroy', $row->id);
                    $restoreUrl = route('admin.cms.partners.restore', $row->id);
                    $editSidebar = true;
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'deleteUrl', 'restoreUrl', 'row', 'editSidebar'))->render();
                })
                ->editColumn('logo', function ($row) {
                    return $row->logo
                        ? '<img src="' . asset('storage/' . $row->logo) . '" class="img-sm">'
                        : '';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('d-M-Y  h:m A');
                })
                ->addColumn('is_active', fn($row) => $row->deleted_at ? '<span class="badge rounded-pill text-bg-danger text-white">Deleted</span>' : '<span class="badge rounded-pill text-bg-success text-white">Active</span>')
                ->rawColumns(['logo', 'action', 'is_active'])
                ->make(true);
        }
        return view('theme.coreui.cms.partners.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response['view'] =  view('theme.coreui.cms.partners.create')->render();

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        Partner::create($data);

        return response()->json([
            'message'   => __('crud.created', ['name' => 'Partner']),
            'redirect'  => route('admin.cms.partners.index')
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
    public function edit($id)
    {
        $partner          = Partner::findOrFail($id);
        $data['partner'] = $partner;

        $response['view'] =  view('theme.coreui.cms.partners.edit', $data)->render();

        return response()->json([
            'success'   => true,
            'data'      => $response
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('logo')) {

            if ($partner->logo && Storage::disk('public')->exists($partner->logo)) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        } else {
            unset($data['logo']);
        }

        $data['is_active'] = $request->boolean('is_active');
        $partner->update($data);

        return response()->json([
            'message'   => __('crud.updated', ['name' => 'Partner']),
            'redirect'  => route('admin.cms.partners.index')
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return response()->json([
            'message'   => __('crud.deleted', ['name' => 'Partner']),
            'redirect'  => route('admin.cms.partners.index')
        ]);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $partner = Partner::withTrashed()->findOrFail($id);
        $partner->restore();

        return response()->json([
            'message'   => __('crud.restored', ['name' => 'Partner']),
            'redirect'  => route('admin.cms.partners.index')
        ]);
    }
}
