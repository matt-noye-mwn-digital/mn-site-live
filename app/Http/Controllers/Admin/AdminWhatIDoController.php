<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\WhatIDoStoreRequest;
use App\Models\WhatIDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time() . '_' . $featuredImage->getClientOriginalName();
            $folder = 'public/what-i-do';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }

        $wid = new WhatIDo();
        $wid->title = $request->title;
        $wid->order = $request->order;
        $wid->featured_image = $featuredImagePath;
        $wid->main_content = $request->main_content;
        $wid->save();

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
        $featuredImagePath = $wid->featured_image;

        if($wid->delete()) {
            if($featuredImagePath){
                Storage::delete($featuredImagePath);
            }
            return redirect('admin/what-i-do')->with('success', 'What I Do deleted successfully');
        }
        else {
            return redirect()->back()->with('error', 'What I Do could not be deleted');
        }
    }
}
