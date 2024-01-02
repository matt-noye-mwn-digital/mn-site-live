<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequests\KnowledgebaseStoreRequest;
use App\Models\Knowledgebase;
use App\Models\KnowledgebaseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminKnowledgebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kbArticles = Knowledgebase::all();
        return view('admin.pages.knowledgebase.index', compact('kbArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = KnowledgebaseCategory::all();
        return view('admin.pages.knowledgebase.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KnowledgebaseStoreRequest $request)
    {

        $mainContent = $request->main_content;
        $cleanContent = strip_tags($mainContent);
        $words = str_word_count($cleanContent, 1);
        $excerptWords = array_slice($words, 0, 50);
        $excerpt = implode(' ', $excerptWords);

        Knowledgebase::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'main_content' => $request->main_content,
            'excerpt' => $excerpt,
            'published' => $request->published,
            'page_type' => 'article',
            'page_description' => $request->page_description,
            'page_keywords' => $request->page_keywords,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
        ]);

        return redirect('admin/knowledgebase')->with('success', 'New Knowledgebase article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Knowledgebase::findOrFail($id);

        return view('admin.pages.knowledgebase.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Knowledgebase::findOrFail($id);
        $categories = KnowledgebaseCategory::all();
        return view('admin.pages.knowledgebase.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KnowledgebaseStoreRequest $request, string $id)
    {
        $article = Knowledgebase::findOrFail($id);

        $mainContent = $request->main_content;
        $cleanContent = strip_tags($mainContent);
        $words = str_word_count($cleanContent, 1);
        $excerptWords = array_slice($words, 0, 50);
        $excerpt = implode(' ', $excerptWords);

        $article->title = $request->title;
        $article->slug = $article->slug;
        $article->main_content = $request->main_content;
        $article->excerpt = $excerpt;
        $article->published = $request->published;
        $article->page_type = $article->page_type;
        $article->page_description = $request->page_description;
        $article->page_keywords = $request->page_keywords;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::user()->id;
        $article->save();

        return redirect('admin/knowledgebase')->with('success', 'Knowledgebase Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Knowledgebase::findOrFail($id);

        $article->delete();

        return redirect('admin/knowledgebase')->with('success', 'Knowledgebase Article deleted successfully');
    }
}
