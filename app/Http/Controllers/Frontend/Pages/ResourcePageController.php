<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTags;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ResourcePageController extends Controller
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
        $categories = PostCategory::orderBy('name', 'ASC')->get();
        $posts = Post::paginate(12);

        return view('frontend.pages.resources.index', compact('categories', 'posts'));

    }

    public function showSinglePost($category, $slug) {
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
        $post = Post::where('slug', $slug)->whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->firstOrFail();

        // Fetch the tag names from the PostTags model using the tag IDs
        /*$tagNames = PostTags::whereIn('id', $post->tags)->pluck('name')->toArray();*/

        return view('frontend.pages.resources.singlePost', compact('post', ));
    }

    public function showSingleCategory($slug){
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
        $category = PostCategory::where('slug', $slug)->firstOrFail();
        $categories = PostCategory::all();
        $posts = Post::where('category_id', $category->id)->paginate(12);
        return view('frontend.pages.resources.category', compact('category', 'categories', 'posts'));
    }


    public function show(string $slug)
    {
        //
    }


}
