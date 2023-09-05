<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\PortfolioStoreRequest;
use App\Http\Requests\FormRequests\PortfolioUpdateRequest;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolioItems = Portfolio::all();
        return view('admin.pages.portfolio.index', compact('portfolioItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioStoreRequest $request)
    {
        $featuredImage = NULL;
        $mobile_desktop_tablet_image = NULL;

        if($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/portfolio';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }
        if($request->hasFile('mobile_desktop_tablet_image')){
            $mobile_desktop_tablet_image = $request->file('mobile_desktop_tablet_image');
            $fileName = time().'_'.$mobile_desktop_tablet_image->getClientOriginalName();
            $folder = 'public/portfolio';

            $mobile_desktop_tablet_image_path = $mobile_desktop_tablet_image->storeAs($folder, $fileName);
        }

        $servicesUsed = implode(',', $request->services_used);

        Portfolio::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'tagline' => $request->tagline,
            'featured_image' => $featuredImagePath,
            'services_used' => $servicesUsed,
            'the_brief' => $request->the_brief,
            'website_link' => $request->website_link,
            'mobile_desktop_tablet_image' => $mobile_desktop_tablet_image_path,
            'testimonial_content' => $request->testimonial_content,
            'testimonial_author' => $request->testimonial_author,
            'seo_title' => $request->seo_title,
            'seo_keywords' => $request->seo_keywords,
            'seo_description' => $request->seo_description,
        ]);

        return redirect('admin/portfolio')->with('success', 'New Portfolio item added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $portfolioItem = Portfolio::findOrFail($id);

        return view('admin.pages.portfolio.show', compact('portfolioItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolioItem = portfolio::findOrFail($id);
        $servicesUsed = explode(',', $portfolioItem->services_used);
        return view('admin.pages.portfolio.edit', compact('portfolioItem', 'servicesUsed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioUpdateRequest $request, string $id)
    {
        $portfolioItem = Portfolio::findOrFail($id);
        $oldFeaturedImage = $portfolioItem->featured_image;
        $oldDesktopTabletMobileImage = $portfolioItem->desktop_mobile_tablet_image;
        $servicesUsed = implode(',', $request->services_used);

        if($request->hasFile('featured_image')) {
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/portfolio';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);

            if($oldFeaturedImage){
                Storage::delete($oldFeaturedImage);
            }
        }
        if($request->hasFile('mobile_desktop_tablet_image')){
            $mobile_desktop_tablet_image = $request->file('mobile_desktop_tablet_image');
            $fileName = time().'_'.$mobile_desktop_tablet_image->getClientOriginalName();
            $folder = 'public/portfolio';

            $mobile_desktop_tablet_image_path = $mobile_desktop_tablet_image->storeAs($folder, $fileName);
            if($oldDesktopTabletMobileImage){
                Storage::delete($oldDesktopTabletMobileImage);
            }
        }

        $portfolioItem->name = $request->name;
        $portfolioItem->tagline = $request->tagline;
        $portfolioItem->featured_image = $featuredImagePath;
        $portfolioItem->services_used = $servicesUsed;
        $portfolioItem->the_brief = $request->the_brief;
        $portfolioItem->website_link = $request->website_link;
        $portfolioItem->mobile_desktop_tablet_image = $mobile_desktop_tablet_image_path;
        $portfolioItem->testimonial_content = $request->testimonial_content;
        $portfolioItem->testimonial_author = $request->testimonial_author;
        $portfolioItem->seo_title = $request->seo_title;
        $portfolioItem->seo_keywords = $request->seo_keywords;
        $portfolioItem->seo_description = $request->seo_description;
        $portfolioItem->save();

        return redirect('admin/portfolio')->with('success', 'Portfolio item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem = Portfolio::findOrFail($id);
        $featuredImagePath = $portfolioItem->featured_image;
        $desktopMobileTabletImage = $portfolioItem->desktop_mobile_tablet_image;
        if($portfolioItem->delete()){
            if($featuredImagePath){
                Storage::delete($featuredImagePath);
            }
            if($desktopMobileTabletImage) {
                Storage::delete($desktopMobileTabletImage);
            }
            return redirect('admin/portfolio')->with('success', 'Portfolio item deleted successfully');
        }
        else {
            return redirect()->back()->with('error', 'Portfolio item could not be deleted');
        }
    }
}
