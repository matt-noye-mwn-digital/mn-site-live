<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\PortfolioStoreRequest;
use App\Http\Requests\FormRequests\PortfolioUpdateRequest;
use App\Models\PagePostSeo;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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
        $featuredImagePath = NULL;
        $mobile_desktop_tablet_image = NULL;
        $mobile_desktop_tablet_image_path = NULL;
        $seoImage = NULL;
        $seoImagePath = NULL;

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
        if($request->hasFile('seo_image')){
            $seoImage = $request->file('seo_image');
            $fileName = time().'_'.$seoImage->getClientOriginalName();
            $folder = 'public/portfolio/seo-images';

            $seoImagePath = $seoImage->storeAs($folder, $fileName);
        }

        $servicesUsed = implode(',', $request->services_used);

        $siteUrl = Config::get('configurations.app_url', config('app.url'));
        $slug = Str::slug($request->input('name'));

        $canonicalUrl = $siteUrl.'/who-work-with/'.$slug;

         $portfolio = Portfolio::create([
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
        ]);

        PagePostSeo::create([
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'seo_canonical_url' => $canonicalUrl,
            'seo_property_type' => 'website',
            'seo_keywords' => $request->input('seo_keywords'),
            'port_item_id' => $portfolio->id,
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
    public function update(Request $request, string $id)
    {
        $portfolioItem = Portfolio::findOrFail($id);
        $pagePostSeo = PagePostSeo::where('port_item_id', $portfolioItem->id);
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
        else{
            $featuredImagePath = $portfolioItem->featured_image;
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
        else {
            $mobile_desktop_tablet_image_path = $portfolioItem->mobile_desktop_table_image;
        }

        $portfolioItem->update([
            'name' => $request->input('name'),
            'tagline' => $request->input('tagline'),
            'featured_image' => $featuredImagePath,
            'services_used' => $servicesUsed,
            'the_brief' => $request->input('the_brief'),
            'website_link' => $request->input('website_link'),
            'mobile_desktop_tablet_image' => $mobile_desktop_tablet_image_path,
            'testimonial_content' => $request->input('testimonial_content'),
            'testimonial_author' => $request->input('testimonial_author'),
        ]);

        $pagePostSeo->update([
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'seo_canonical_url' => $request->input('seo_canonical_url'),
            'seo_property_type' => $request->input('seo_property_type'),
            'seo_keywords' => $request->input('seo_keywords'),
        ]);

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
