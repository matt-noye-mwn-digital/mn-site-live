<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Knowledgebase;
use App\Models\KnowledgebaseCategory;
use App\Models\Page;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class FrontendKnowledgebaseController extends Controller
{
    public function index() {
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


        $categories = KnowledgebaseCategory::orderBy('name', 'asc')->get();

        $categoryCounts = [];
        foreach ($categories as $category) {
            $articleCount = Knowledgebase::where('category_id', $category->id)->count();
            $categoryCounts[$category->id] = $articleCount;
        }

        $articles = Knowledgebase::all();

        return view('frontend.pages.knowledgebase.index', compact('categories','articles', 'categoryCounts'));
    }
    public function show($categorySlug, $slug) {
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

        // Find the article by slug
        $article = Knowledgebase::where('slug', $slug)
            ->firstOrFail();

        // Get the category from the article's relationship
        $category = $article->category;

        return view('frontend.pages.knowledgebase.show', compact('article', 'category'));
    }

    public function categoryShow($slug) {
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


        $category = KnowledgebaseCategory::where('slug', $slug)->firstOrFail();
        $categories = KnowledgebaseCategory::orderBy('name', 'asc')->get();
        $articles = Knowledgebase::where('category_id', $category->id)->paginate(24);
        return view('frontend.pages.knowledgebase.category', compact('category', 'categories', 'articles'));
    }

    public function search(Request $request) {
        $query = $request->input('query');

        $results = Knowledgebase::search($query)->get();

        return view('frontend.pages.knowledgebase.search', compact('results', 'query'));
    }
}
