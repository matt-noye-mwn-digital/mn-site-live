<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Knowledgebase;

class FrontendKnowledgebaseController extends Controller
{
    public function index() {
        $articles = Knowledgebase::all();

        return view('frontend.pages.knowledgebase.index', compact('articles'));
    }
}
