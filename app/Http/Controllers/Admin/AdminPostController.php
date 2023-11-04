<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\PostStoreRequest;
use App\Models\PagePostSeo;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = PostCategory::all();
        return view('admin.pages.posts.create', compact('category', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $featuredImage = NULL;
        $slug = NULL;
        $featuredImagePath = NULL;

        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/posts/uploads';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }

        $mainContent = $request->main_content;
        $cleanContent = strip_tags($mainContent);
        $words = str_word_count($cleanContent, 1);
        $excerptWords = array_slice($words, 0, 50);
        $excerpt = implode(' ', $excerptWords);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'featured_image' => $featuredImagePath,
            'main_content' => $request->main_content,
            'excerpt' => $excerpt,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'published' => $request->published,
        ]);

        PagePostSeo::create([
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'seo_canonical_url' => $request->input('seo_canonical_url'),
            'seo_property_type' => $request->input('seo_property_type'),
            'seo_keywords' => $request->input('seo_keywords'),

            'post_id' => $post->id
        ]);


        return redirect('admin/posts')->with('success', 'New post has been published successfully');
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
        $post = Post::findOrFail($id);
        $category = PostCategory::all();

        return view('admin.pages.posts.edit', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $oldFeaturedImage = $post->featured_image;
        $featuredImagePath = NULL;
        $slug = NULL;

        $tagIds = $request->tag ? array_map('intval', $request->tag) : [];

        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/posts/uploads';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);

            if($oldFeaturedImage){
                Storage::delete($oldFeaturedImage);
            }
        }

        $mainContent = $request->main_content;
        $cleanContent = strip_tags($mainContent);
        $words = str_word_count($cleanContent,1);
        $excerptWords = array_slice($words, 0, 50);
        $excerpt = implode(' ', $excerptWords);

        $post->title = $request->title;
        $post->slug = Str::slug($request->slug);
        $post->featured_image = $featuredImagePath;
        $post->main_content = $request->main_content;
        $post->excerpt = $excerpt;
        $post->page_description = $request->page_description;
        $post->page_keywords = $request->page_keywords;
        $post->category_id = $request->category_id;
        $post->tags = $tagIds;
        $post->user_id = $post->user_id;
        $post->published = $request->published;
        $post->save();

        return redirect('admin/posts')->with('success', 'Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
