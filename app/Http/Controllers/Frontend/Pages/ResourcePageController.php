<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTags;
use Illuminate\Http\Request;

class ResourcePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::orderBy('name', 'ASC')->get();
        $posts = Post::paginate(12);

        return view('frontend.pages.resources.index', compact('categories', 'posts'));

    }

    public function showSinglePost($category, $slug) {
        $post = Post::where('slug', $slug)->whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->firstOrFail();

        // Fetch the tag names from the PostTags model using the tag IDs
        /*$tagNames = PostTags::whereIn('id', $post->tags)->pluck('name')->toArray();*/

        return view('frontend.pages.resources.singlePost', compact('post', ));
    }

    public function showSingleCategory($slug){
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
