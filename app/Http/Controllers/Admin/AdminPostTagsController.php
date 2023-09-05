<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\PostTagStoreRequest;
use App\Models\PostTags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = PostTags::all();

        return view('admin.pages.posts.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.posts.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostTagStoreRequest $request)
    {
        PostTags::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
        ]);
        return redirect('admin/posts/post-tags')->with('success', 'New Post Tag has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = PostTags::findOrFail($id);

        return view('admin.pages.posts.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = PostTags::findOrFail($id);

        return view('admin.pages.posts.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostTagStoreRequest $request, string $id)
    {
        $tag = PostTags::findOrFail($id);

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->slug = $tag->slug;
        $tag->save();

        return redirect('admin/posts/post-tags')->with('success', 'Post Tag has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = PostTags::findOrFail($id);

        $tag->delete();

        return redirect('admin/posts/post-tags')->with('success', 'Post Tag has been deleted successfully');
    }
}
