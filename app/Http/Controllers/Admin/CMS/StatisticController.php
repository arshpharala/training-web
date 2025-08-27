<?php

namespace App\Http\Controllers\Admin\CMS;

use Illuminate\Http\Request;
use App\Models\CMS\Statistic;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\CMS\StatisticTranslation;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreStatisticRequest;
use App\Http\Requests\UpdateStatisticRequest;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $brands = Statistic::query()
                ->leftJoin('statistic_translations', function ($join) {
                    $join->on('statistic_translations.statistic_id', 'statistics.id')->where('locale', app()->getLocale());
                })
                ->select(
                    'statistics.id',
                    'statistics.number',
                    'statistics.icon',
                    'statistics.is_active',
                    'statistics.created_at',
                    'statistic_translations.name',
                );
            return DataTables::of($brands)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.cms.statistics.edit', $row->id);
                    $deleteUrl = route('admin.cms.statistics.destroy', $row->id);
                    // $restoreUrl = route('admin.cms.statistics.restore', $row->id);
                    $editSidebar = true;
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'deleteUrl', 'row', 'editSidebar'))->render();
                })
                ->editColumn('icon', function ($row) {
                    return $row->icon
                        ? '<img src="' . asset('storage/' . $row->icon) . '" class="img-sm">'
                        : '';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at?->format('d-M-Y  h:m A');
                })
                ->addColumn('is_active', fn($row) => !$row->is_active ? '<span class="badge badge-danger">Inactive</span>' : '<span class="badge badge-success">Active</span>')
                ->rawColumns(['icon', 'action', 'is_active'])
                ->make(true);
        }
        return view('theme.adminlte.cms.statistics.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response['view'] =  view('theme.adminlte.cms.statistics.create')->render();

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        $validated = $request->validated();

        DB::beginTransaction();

        $path = null;
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('statistics', 'public');
        }

        try {
            $statistic = Statistic::create([
                'number'        => $validated['number'],
                'is_active'     => $validated['is_active'] ?? false,
                'icon'          => $path,
            ]);


            foreach ($validated['name'] as $locale => $name) {
                StatisticTranslation::create([
                    'statistic_id'      => $statistic->id,
                    'locale'            => $locale,
                    'name'              => $name
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }


        return response()->json([
            'message'   => __('crud.created', ['name' => 'Statistic']),
            'redirect' => route('admin.cms.statistics.index')
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
        $statistic = Statistic::findOrFail($id);

        $data['statistic'] = $statistic;

        $response['view'] =  view('theme.adminlte.cms.statistics.edit', $data)->render();

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatisticRequest $request, string $id)
    {
        $statistic = Statistic::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('icon')) {

            if ($statistic->icon && Storage::disk('public')->exists($statistic->icon)) {
                Storage::disk('public')->delete($statistic->icon);
            }
            $data['icon'] = $request->file('icon')->store('statistics', 'public');
        } else {
            unset($data['icon']);
        }

        $data['is_active'] = $request->boolean('is_active');
        $statistic->update($data);

        return response()->json([
            'message'   => __('crud.updated', ['name' => 'Statistic']),
            'redirect'  => route('admin.cms.statistics.index')
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
