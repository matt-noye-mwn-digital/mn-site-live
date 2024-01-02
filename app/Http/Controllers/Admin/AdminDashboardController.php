<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFormSubmissions;
use App\Models\GetAQuote;
use Illuminate\Http\Request;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $sevenDaysAnalyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        $sevenDaysTotalVisitors = $sevenDaysAnalyticsData->sum('activeUsers');

        $contactFormSubmissions = ContactFormSubmissions::orderBy('created_at', 'desc')->get();
        $quoteFormSubmissions = GetAQuote::orderBy('created_at', 'desc')->limit(10);

        return view('admin.pages.dashboard', compact('contactFormSubmissions', 'quoteFormSubmissions', 'sevenDaysTotalVisitors'));
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
    public function store(Request $request)
    {
        //
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
