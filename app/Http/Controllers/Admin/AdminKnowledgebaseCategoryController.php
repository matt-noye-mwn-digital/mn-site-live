<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\KnowledgebaseCategoryStoreRequest;
use App\Models\Knowledgebase;
use App\Models\KnowledgebaseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminKnowledgebaseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = KnowledgebaseCategory::all();

        return view('admin.pages.knowledgebase.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.knowledgebase.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KnowledgebaseCategoryStoreRequest $request)
    {
        $featuredImagePath = NULL;
        if($request->hasFile('featuredImage')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/knowledgebase/categories';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);
        }

        KnowledgebaseCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'featured_image' => $featuredImagePath,
        ]);

        return redirect('admin/knowledgebase/knowledgebase-categories')->with('success', 'New Knowledgebase category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = KnowledgebaseCategory::findOrFail($id);

        return view('admin.pages.knowledgebase.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = KnowledgebaseCategory::findOrFail($id);

        return view('admin.pages.knowledgebase.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KnowledgebaseCategoryStoreRequest $request, string $id)
    {
        $category = KnowledgebaseCategory::findOrFail($id);
        $featuredImagePath = NULL;
        $oldFeaturedImage = $category->featured_image;

        if($request->hasFile('featured_image')){
            $featuredImage = $request->file('featured_image');
            $fileName = time().'_'.$featuredImage->getClientOriginalName();
            $folder = 'public/knowledgebase/categories';

            $featuredImagePath = $featuredImage->storeAs($folder, $fileName);

            if($oldFeaturedImage){
                Storage::delete($oldFeaturedImage);
            }
        }

        $category->name = $request->name;
        $category->slug = $category->slug;
        $category->description = $request->description;
        $category->featured_image = $featuredImagePath;
        $category->save();

        return redirect('admin/knowledgebase/knowledgebase-categories')->with('success', 'Knowledgebase category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = KnowledgebaseCategory::findOrFail($id);

        $posts = Knowledgebase::where('category_id', $category->id)->get();

        $uncategorisedCategoryId = 1;

        $posts->each(function ($post) use ($uncategorisedCategoryId){
            $post->category_id = $uncategorisedCategoryId;
            $post->save();
        });

        $category->delete();

        return redirect('admin/knowledgebase/knowledgebase-categories')->with('success', 'Knowledgebase category deleted successfully');

    }
}
