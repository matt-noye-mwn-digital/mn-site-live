<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Models\Page;
use App\Models\PageContent;
use App\Models\PagePostSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //This code finds page templates in the resources > views > page-templates directory
        $pageTemplateDirectory = resource_path('views/page-templates');

        //use glob to get files
        $pageTemplateFiles = glob($pageTemplateDirectory . '/*.blade.php');

        //remove dir path and file extension, leaving only view name
        $pageTemplateList = array_map(function($view) use ($pageTemplateDirectory){
            return str_replace([$pageTemplateDirectory . '/', '.blade.php'], '', $view);
        }, $pageTemplateFiles);

        //This code finds page banners
        $pageBannerDirectory = resource_path('views/page-banners');
        $pageBannerFiles = glob($pageBannerDirectory. '/*.blade.php');
        $pageBannerList = array_map(function($view) use ($pageBannerDirectory){
            return str_replace([$pageBannerDirectory . '/', '.blade.php'], '', $view);
        }, $pageBannerFiles);

        return view('admin.pages.pages.create', compact('pageTemplateList', 'pageBannerList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seoImagePath = NULL;
        $sectionFeaturedImagePath = NULL;

        if($request->hasFile('seo_image')){
            $seoImage = $request->file('seo_image');
            $fileName = time().'_'.$seoImage->getClientOriginalName();
            $folder = 'public/pages/'. $request->page_title.'/seo_image';

            $seoImagePath = $seoImage->storeAs($folder, $fileName);
        }
        if($request->hasFile('section_featured_image')){
            $sectionFeaturedImage = $request->file('section_featured_image');
            $fileName = time().'_'.$sectionFeaturedImage->getClientOriginalName();
            $folder = 'public/pages/'.$request->page_title. '';

            $sectionFeaturedImagePath = $sectionFeaturedImage->storeAs($folder,  $fileName);
        }

        if($request->filled('page_slug')){
            $pageSlug = $request->page_slug;
        }
        else {
            $pageSlug = Str::slug($request->page_title);
        }

        $page = Page::create([
            'page_title' => $request->input('page_title'),
            'page_slug' => $pageSlug,
            'published' => 1,
        ]);

        /*PageContent::create([
            'page_id' => $page->id,
            'backend_section_title' => $request->backend_section_title,
            'section_display_order' => $request->section_display_order,
            'section_template' => $request->section_template,
            'section_content' => $request->section_content,
            'section_featured_image' => $sectionFeaturedImagePath,
            'use_featured_image_in_section' => $request->use_featured_image_in_section,
        ]);*/
        PagePostSeo::create([
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'seo_canonical_url' => $request->input('seo_canonical_url'),
            'seo_property_type' => $request->input('seo_property_type'),
            'seo_keywords' => $request->input('seo_keywords'),
            'page_id' => $page->id
        ]);

        return redirect('admin/pages')->with('success', 'New page created successfully');

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
        $content = Page::findOrFail($id);

        //This code finds page banners
        $pageBannerDirectory = resource_path('views/page-banners');
        $pageBannerFiles = glob($pageBannerDirectory. '/*.blade.php');
        $pageBannerList = array_map(function($view) use ($pageBannerDirectory){
            return str_replace([$pageBannerDirectory . '/', '.blade.php'], '', $view);
        }, $pageBannerFiles);

        return view('admin.pages.pages.edit', compact('content', 'pageBannerList'));
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
