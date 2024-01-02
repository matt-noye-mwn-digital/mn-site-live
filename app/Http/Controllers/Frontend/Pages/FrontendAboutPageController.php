<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class FrontendAboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Page::where('page_title', 'homepage')->get();

        foreach($content as $page){
            SEOMeta::setTitle($page->seo->seo_title);
            SEOMeta::setDescription($page->seo->seo_description);
            SEOMeta::setCanonical(config('settings.site_url').'/'.$page->seo->seo_canonical_url);
            SEOMeta::addKeyword([$page->seo->seo_keywords]);
            OpenGraph::setDescription($page->seo->seo_description);
            OpenGraph::setTitle($page->seo->seo_title);
            OpenGraph::setUrl( config('settings.site_url').'/'.$page->seo->seo_canonical_url);

            OpenGraph::addProperty('type', $page->seo->seo_property_type);
            OpenGraph::addImage();
        }
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
