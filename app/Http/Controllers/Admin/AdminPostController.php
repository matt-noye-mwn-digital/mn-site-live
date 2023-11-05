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
use Illuminate\Support\Facades\Config;
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
        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/posts/featured_images';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }
        else {
            $featuredImagePath = NULL;
        }
        if($request->hasFile('seo_image')){
            $seoImage = $request->file('seo_image');
            $fileName = time().'_'.$seoImage->getClientOriginalName();
            $folder = 'public/posts/seo_images';

            $seoImagePath = $seoImage->storeAs($folder, $fileName);
        }
        else {
            $seoImagePath = NULL;
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
            'seo_property_type' => 'article',
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
        $content = Post::findOrFail($id);

        return view('admin.pages.posts.show', compact('content'));

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
        $pagePostSeo = PagePostSeo::where('post_id', $post->id);

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
        else {
            $featuredImagePath == NULL;
        }

        $mainContent = $request->main_content;
        $cleanContent = strip_tags($mainContent);
        $words = str_word_count($cleanContent,1);
        $excerptWords = array_slice($words, 0, 50);
        $excerpt = implode(' ', $excerptWords);

        $siteUrl = Config::get('configurations.app_url', config('app.url'));
        $slug = Str::slug($request->input('title'));

        $canonicalUrl = $siteUrl.'/who-work-with/'.$slug;

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'featured_image' => $featuredImagePath,
            'main_content' => $request->main_content,
            'excerpt' => $excerpt,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'published' => $request->published,
        ]);

        $pagePostSeo->update([
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'seo_canonical_url' => $canonicalUrl,
            'seo_property_type' => 'article',
            'seo_keywords' => $request->input('seo_keywords'),
            'post_id' => $post->id
        ]);

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
