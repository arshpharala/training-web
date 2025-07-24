<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function sortRows(Request $request)
    {
        foreach ($request->order as $position => $id) {
            DB::table($request->table)->where("id",$id)->update(["position"=>$position+1]);
        }

        return response()->json(['message' => 'Sorted Successfully.']);

    }
}
