<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configurations = Setting::pluck('key', 'value')->toArray();
        $configurations['site_name'] = $configurations['site_name'] ?? config('app.name');
        $configurations['site_url'] = $configurations['site_url'] ?? config('app.url');
        $settings = Setting::all();
        $adminUser = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['super admin', 'admin']);
        })->get();

        return view('admin.pages.settings.index', compact('configurations', 'settings', 'adminUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Setting::create([
            'key' => str_replace(' ', '_', strtolower($request->input('key'))),
            'value' => $request->input('value')
        ]);
        return redirect('admin/settings')->with('success', 'New setting created successfully');
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
