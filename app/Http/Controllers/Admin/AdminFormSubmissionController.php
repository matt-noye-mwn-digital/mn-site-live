<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFormSubmissions;
use App\Models\GetAQuote;
use Illuminate\Http\Request;

class AdminFormSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contactForm()
    {
        $contactFormSubmissions = ContactFormSubmissions::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.pages.form-submissions.contactForm', compact('contactFormSubmissions'));
    }
    public function contactFormSingle($id) {
        $submission = ContactFormSubmissions::findOrFail($id);

        return view('admin.pages.form-submissions.contactFormSingle', compact('submission'));
    }

    public function quoteForm(){
        $quoteFormSubmissions = GetAQuote::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.pages.form-submissions.quoteForm', compact('quoteFormSubmissions'));
    }
    public function quoteFormSingle($id) {
        $submission = GetAQuote::findOrFail($id);

        return view('admin.pages.form-submissions.quoteFormSingle', compact('submission'));
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
