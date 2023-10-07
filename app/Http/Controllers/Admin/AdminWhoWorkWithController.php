<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhoWorkWith;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class AdminWhoWorkWithController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $www = WhoWorkWith::orderBy('title', 'asc')->paginate(10);
        return view('admin.pages.work-with.index', compact('www'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.work-with.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $featuredImage = NULL;
        $seoImage = NULL;
        $featuredImagePath = NULL;
        $seoImagePath = NULL;

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sub_title' => ['nullable', 'string', 'max:5000'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp'],
            'main_content' => ['nullable', 'max:50000'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:300'],
            'seo_canonical_url' => ['nullable', 'url', 'max:255'],
        ]);

        if($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/who-work-with';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }
        if($request->hasFile('seo_image')){
            $seoImage = $request->file('seo_image');
            $fileName = time().'_'.$seoImage->getClientOriginalName();
            $folder = 'public/who-work-with/seo_image';

            $seoImagePath = $seoImage->storeAs($folder, $fileName);
        }

        $siteUrl = Config::get('configurations.app_url', config('app.url'));
        $slug = Str::slug($validated['title']);

        $canonicalUrl = $siteUrl.'/who-work-with/'.$slug;


        WhoWorkWith::create([
            'slug' => Str::slug($validated['title']),
            'title' => $validated['title'],
            'sub_title' => $validated['sub_title'],
            'featured_image' => $featuredImagePath,
            'main_content' => $validated['main_content'],
            'seo_title' => $validated['seo_title'],
            'seo_description' => $validated['seo_description'],
            'seo_image' => $seoImagePath,
            'seo_canonical_url' => $canonicalUrl,
        ]);

        return redirect('admin/who-i-work-with')->with('success', 'New Who Work With added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $www = WhoWorkWith::findOrFail($id);

        return view('admin.pages.work-with.show', compact('www'));
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
