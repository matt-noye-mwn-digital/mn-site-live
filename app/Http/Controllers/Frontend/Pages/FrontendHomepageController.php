<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\WhatIDo;
use App\Models\WhoWorkWith;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Http\Request;


class FrontendHomepageController extends Controller
{
    public function index(){

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

        $wid = WhatIDo::orderBy('order', 'asc')->get();
        $port = Portfolio::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->take(3)->get();
        $www = WhoWorkWith::orderBy('title', 'asc')->get();
        return view('frontend.pages.homepage', compact('wid', 'posts', 'port', 'www'));
    }
}
