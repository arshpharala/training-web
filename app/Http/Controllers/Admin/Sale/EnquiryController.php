<?php

namespace App\Http\Controllers\Admin\Sale;

use App\Models\Sale\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreEnquiryRequest;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiries = Enquiry::latest()->paginate(20);
        return view('theme.adminlte.sale.enquiries.index', compact('enquiries'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnquiryRequest $request)
    {
        $enquiry = Enquiry::create($request->validated() + [
            'phone' => $request->phone,
            'funding' => $request->funding,
            'company' => $request->company,
            'role' => $request->role,
            'course_id' => $request->course_id,
            'topic_id' => $request->topic_id,
            'category_id' => $request->category_id,
            'delivery_method' => $request->delivery_method,
            'group_size' => $request->groupSize,
            'delivery_mode' => $request->deliveryMode,
            'start_timeline' => $request->startTimeline,
            'budget_range' => $request->budgetRange,
            'need_quote' => $request->has('needQuote'),
            'contact_channel' => $request->contactChannel,
            'contact_time' => $request->contactTime,
            'heard_about' => $request->heardAbout,
            'message' => $request->message,
            'marketing_opt_in' => $request->boolean('marketingOptIn'),
            'consent' => $request->boolean('consent'),
            'utm_source' => $request->utm_source,
            'utm_medium' => $request->utm_medium,
            'utm_campaign' => $request->utm_campaign,
            'utm_term' => $request->utm_term,
            'utm_content' => $request->utm_content,
            'url' => $request->url,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'device' => request()->header('User-Agent'), // you can later parse into Mobile/Desktop
        ]);

        // Send mail
        Mail::send('emails.enquiry', ['enquiry' => $enquiry], function ($message) {
            $message->to('enquiry@xcademia.com')
            ->bcc('arshdeepjhagra@gmail.com')
                ->subject('New Enquiry Received');
        });

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Enquiry $enquiry)
    {
        return view('theme.adminlte.sale.enquiries.show', compact('enquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
