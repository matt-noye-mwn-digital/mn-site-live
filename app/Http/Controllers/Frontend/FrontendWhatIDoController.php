<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WhatIDo;
use Illuminate\Http\Request;

class FrontendWhatIDoController extends Controller
{
    public function index(){
        $wid = WhatIDo::orderBy('order', 'asc')->get();

        return view('frontend.pages.wid.index', compact('wid'));
    }

    public function show($slug) {
        $wid = WhatIDo::where('slug', $slug)->firstOrFail();

        return view('frontend.pages.wid.show', compact('wid'));
    }
}
