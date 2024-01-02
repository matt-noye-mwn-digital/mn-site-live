<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\PostCategoryStoreRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postCategories = PostCategory::all();

        return view('admin.pages.posts.categories.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.posts.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCategoryStoreRequest $request)
    {
        $featuredImagePath = NULL;
        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/post-categories';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }

        PostCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'featured_image' => $featuredImagePath,
        ]);

        return redirect('admin/posts/post-categories')->with('success', 'New post category has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $postCategory = PostCategory::findOrFail($id);
        $posts = $postCategory->posts;

        return view('admin.pages.posts.categories.show', compact('postCategory', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $postc = PostCategory::findOrFail($id);

        return view('admin.pages.posts.categories.edit', compact('postc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostCategoryStoreRequest $request, string $id)
    {
        $postCategory = PostCategory::findOrFail($id);
        $featuredImagePath = NULL;
        $oldFeaturedImage = $postCategory->featured_image;

        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/post-categories';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);

            if($oldFeaturedImage){
                Storage::delete($oldFeaturedImage);
            }
        }

        $postCategory->name = $request->name;
        $postCategory->slug = $postCategory->slug;
        $postCategory->description = $request->description;
        $postCategory->featured_image = $featuredImagePath;
        $postCategory->save();

        return redirect('admin/post-categories')->with('success', 'Post Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = PostCategory::findOrFail($id);

        $posts = Post::where('category_id', $category->id)->get();

        $uncategorisedCategoryId = 1;
        $posts->each(function ($post) use ($uncategorisedCategoryId){
            $post->category_id = $uncategorisedCategoryId;
            $post->save();
        });

        $category->delete();

        return redirect('admin/posts/post-categories')->with('success', 'Post Category deleted successfully');
    }
}
