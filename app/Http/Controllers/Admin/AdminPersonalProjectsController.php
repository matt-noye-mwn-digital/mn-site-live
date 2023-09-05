<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\PersonalProjectsStoreRequest;
use App\Models\PersonalProjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPersonalProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pp = PersonalProjects::all();
        return view('admin.pages.personal-projects.index', compact('pp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.personal-projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonalProjectsStoreRequest $request)
    {
        $featuredImage = NULL;
        $responsiveImage = NULL;

        if($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/personal-projects';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }
        if($request->hasFile('responsive_image')){
            $responsiveImage = $request->file('responsive_image');
            $fileName = time().'_'.$responsiveImage->getClientOriginalName();
            $folder = 'public/personal-projects';

            $responsiveImagePath = $responsiveImage->storeAs($folder, $fileName);
        }
        $servicesUsed = implod(',', $request->services_used);

        PersonalProjects::create([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'featured_image' => $featuredImagePath,
            'services_used' => $servicesUsed,
            'the_brief' => $request->the_brief,
            'project_link' => $request->project_link,
            'responsive_image' => $responsiveImagePath,
        ]);

        return redirect('admin/personal-projects')->with('success', 'New personal project created successfully');
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
        $pp = PersonalProjects::findOrFail($id);

        return view('admin.pages.personal-projects.edit', compact('pp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonalProjectsStoreRequest $request, string $id)
    {
        $featuredImage = NULL;
        $responsiveImage = NULL;

        if($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/personal-projects';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }
        if($request->hasFile('responsive_image')){
            $responsiveImage = $request->file('responsive_image');
            $fileName = time().'_'.$responsiveImage->getClientOriginalName();
            $folder = 'public/personal-projects';

            $responsiveImagePath = $responsiveImage->storeAs($folder, $fileName);
        }
        $servicesUsed = implod(',', $request->services_used);

        PersonalProjects::update([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'featured_image' => $featuredImagePath,
            'services_used' => $servicesUsed,
            'the_brief' => $request->the_brief,
            'project_link' => $request->project_link,
            'responsive_image' => $responsiveImagePath,
        ]);

        return redirect('admin/personal-projects')->with('success', 'Personal Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pp = PersonalProjects::findOrFail($id);
        $featuredImagePath = $pp->featured_image;
        $responsiveImagePath = $pp->responsive_image;
        if($pp->delete()){
            if($featuredImagePath){
                Storage::delete($featuredImagePath);
            }
            if($responsiveImagePath) {
                Storage::delete($responsiveImagePath);
            }
            return redirect('admin/personal-projects')->with('success', 'Personal project deleted successfully');
        }
        else {
            return redirect()->back()->with('error', 'Personal Project item could not be deleted');
        }
    }
}
