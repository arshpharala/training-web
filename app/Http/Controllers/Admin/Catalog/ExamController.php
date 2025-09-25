<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Catalog\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Exam::withTrashed()->select(['id', 'name', 'code', 'level', 'duration', 'created_at', 'deleted_at']);

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.catalog.exams.edit', $row->id);
                    // $deleteUrl = route('admin.catalog.exams.destroy', $row->id);
                    // $restoreUrl = route('admin.catalog.exams.restore', $row->id);
                    return view('theme.adminlte.components._table-actions', compact('editUrl', 'row'))->render();
                })
                ->editColumn('created_at', fn($row) => $row->created_at?->format('d-M-Y h:i A'))
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('theme.coreui.catalog.exams.index');
    }

    public function create()
    {
        $data['exam'] = new Exam();
        return view('theme.coreui.catalog.exams.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->validate([
                'name'        => 'required|string|max:255',
                'duration'    => 'nullable|string|max:255',
                'level'       => 'nullable|string|max:255',
                'code'        => 'nullable|string|max:255',
                'image'       => 'nullable|image|max:2048',
                'description' => 'nullable|string',
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('exams', 'public');
            }

            Exam::create($data);

            DB::commit();
            return response()->json(['message' => 'Exam created successfully.', 'redirect' => route('admin.catalog.exams.index')]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function edit($id)
    {
        $data['exam'] = Exam::withTrashed()->findOrFail($id);
        return view('theme.coreui.catalog.exams.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        DB::beginTransaction();
        try {
            $data = $request->validate([
                'name'        => 'required|string|max:255',
                'duration'    => 'nullable|string|max:255',
                'level'       => 'nullable|string|max:255',
                'code'        => 'nullable|string|max:255',
                'image'       => 'nullable|image|max:2048',
                'description' => 'nullable|string',
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('exams', 'public');
            }

            $exam->update($data);

            DB::commit();
            return response()->json(['message' => 'Exam updated successfully.', 'redirect' => route('admin.catalog.exams.index')]);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return response()->json(['message' => 'Exam deleted successfully.', 'redirect' => route('admin.catalog.exams.index')]);
    }

    public function restore($id)
    {
        $exam = Exam::withTrashed()->findOrFail($id);
        $exam->restore();
        return response()->json(['message' => 'Exam restored successfully.', 'redirect' => route('admin.catalog.exams.index')]);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate(['ids' => 'required|array']);
        Exam::whereIn('id', $request->ids)->delete();
        return response()->json(['message' => 'Exams deleted successfully.', 'redirect' => route('admin.catalog.exams.index')]);
    }

    public function bulkRestore(Request $request)
    {
        $request->validate(['ids' => 'required|array']);
        Exam::withTrashed()->whereIn('id', $request->ids)->restore();
        return response()->json(['message' => 'Exams restored successfully.', 'redirect' => route('admin.catalog.exams.index')]);
    }
}
