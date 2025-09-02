<?php

namespace App\Http\Controllers\Web;

use App\Models\CMS\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalog\DeliveryMethod;
use App\Models\CMS\Statistic;

class PageController extends Controller
{
    function about()
    {
        $slug = request()->segment(1);

        $page = Page::with('metas', 'translation')
            ->where('slug', $slug)
            ->active()
            ->first();


        $statistics = Statistic::where('is_active', 1)->get();
        $deliveryMethods = DeliveryMethod::active()->orderBy('position')->get();

        $data['page'] = $page;
        $data['statistics'] = $statistics;
        $data['deliveryMethods'] = $deliveryMethods;
        $data['meta'] = $page->metaForLocale() ?? null;


        return view('theme.xacademia.pages.about', $data);
    }
    function contact()
    {
        $slug = request()->segment(1);

        $page = Page::with('metas', 'translation')
            ->where('slug', $slug)
            ->active()
            ->first();

        $data['page'] = $page;
        $data['meta'] = $page->metaForLocale() ?? null;

        return view('theme.xacademia.pages.contact', $data);
    }

    function enquiry(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'phone' => 'nullable|string|max:20',
        //     'message' => 'nullable|string|max:1000',
        //     'course' => 'nullable|string|max:255',
        //     'course_id' => 'nullable|integer|exists:courses,id',
        // ]);

        // Process the enquiry (e.g., save to database, send email, etc.)
        // For demonstration, we'll just return a success response.

        return response()->json(['message' => 'Enquiry submitted successfully.']);
    }
}
