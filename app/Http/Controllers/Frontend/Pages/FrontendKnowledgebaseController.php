<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Knowledgebase;
use App\Models\KnowledgebaseCategory;

class FrontendKnowledgebaseController extends Controller
{
    public function index() {
        $categories = KnowledgebaseCategory::orderBy('name', 'asc')->get();

        $categoryCounts = [];
        foreach ($categories as $category) {
            $articleCount = Knowledgebase::where('category_id', $category->id)->count();
            $categoryCounts[$category->id] = $articleCount;
        }

        $articles = Knowledgebase::all();

        return view('frontend.pages.knowledgebase.index', compact('categories','articles', 'categoryCounts'));
    }

    public function show($slug, $category) {
        $kbArticle = Knowledgebase::where('slug', $slug)->whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->firstOrFail();
        return view('frontend.pages.knowledgebase.show', compact('kbArticle'));
    }

    public function categoryShow($slug) {
        $category = KnowledgebaseCategory::where('slug', $slug)->firstOrFail();
        $categories = KnowledgebaseCategory::orderBy('name', 'asc')->get();
        $articles = Knowledgebase::where('category_id', $category->id)->paginate(24);
        return view('frontend.pages.knowledgebase.category', compact('category', 'categories', 'articles'));
    }
}
