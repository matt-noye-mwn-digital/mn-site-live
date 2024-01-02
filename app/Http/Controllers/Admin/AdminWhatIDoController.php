<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\WhatIDoStoreRequest;
use App\Models\PagePostSeo;
use App\Models\WhatIDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminWhatIDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wid = WhatIDo::all();
        return view('admin.pages.what-i-do.index', compact('wid'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.what-i-do.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WhatIDoStoreRequest $request)
    {
        $featuredImage = null;
        $featuredImagePath = NULL;
        $seoImage = NULL;
        $seoImagePath = NULL;

        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time() . '_' . $featuredImage->getClientOriginalName();
            $folder = 'public/what-i-do';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }
        if($request->hasFile('seo_image')){
            $seoImage = $request->file('seo_image');
            $fileName = time().'_'.$seoImage->getClientOriginalName();
            $folder = 'public/who-work-with/seo_image';

            $seoImagePath = $seoImage->storeAs($folder, $fileName);
        }

        $siteUrl = Config::get('configurations.app_url', config('app.url'));
        $slug = Str::slug($request->input('title'));

        $canonicalUrl = $siteUrl.'/who-work-with/'.$slug;

        $wid = WhatIDo::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'order' => $request->order,
            'featured_image' => $featuredImagePath,
            'main_content' => $request->main_content,
        ]);
        PagePostSeo::create([
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'seo_canonical_url' => $canonicalUrl,
            'seo_property_type' => $request->input('seo_property_type'),
            'seo_keywords' => $request->input('seo_keywords'),
            'wid_id' => $wid->id,
        ]);

        return redirect('admin/what-i-do')->with('success', 'What I Do has been created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wid = WhatIDo::findOrFail($id);
        return view('admin.pages.what-i-do.show', compact('wid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wid = WhatIDo::findOrFail($id);

        return view('admin.pages.what-i-do.edit', compact('wid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WhatIDoStoreRequest $request, string $id)
    {
        $wid = WhatIDo::findOrFail($id);
        $oldFeaturedImage = $wid->featured_image;

        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time() . '_' . $featuredImage->getClientOriginalName();
            $folder = 'public/what-i-do';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);

            if ($oldFeaturedImage) {
                Storage::delete($oldFeaturedImage);
            }

            $wid->featured_image = $featuredImagePath;
        }

        $wid->title = $request->title;
        $wid->order = $request->order;
        $wid->main_content = $request->main_content;
        $wid->save();

        return redirect('admin/what-i-do')->with('success', 'What I Do has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wid = WhatIDo::findOrFail($id);
        $pagePostSeo = PagePostSeo::where('wid_id', $wid->id);
        $featuredImagePath = $wid->featured_image;
        $seoImagePath = $wid->seo->seo_image;

        if($wid->delete()) {
            if($featuredImagePath){
                Storage::delete($featuredImagePath);
            }
            if($seoImagePath) {
                Storage::delete($seoImagePath);
            }
            $wid->delete();
            $pagePostSeo->delete();
            return redirect('admin/what-i-do')->with('success', 'What I Do deleted successfully');
        }
        else {
            return redirect()->back()->with('error', 'What I Do could not be deleted');
        }
    }
}
