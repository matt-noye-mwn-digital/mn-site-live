<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\WhatIDo;
use App\Models\WhoWorkWith;
use Illuminate\Http\Request;

class FrontendHomepageController extends Controller
{
    public function index(){
        $wid = WhatIDo::orderBy('order', 'asc')->get();
        $port = Portfolio::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->take(3)->get();
        $www = WhoWorkWith::orderBy('title', 'desc')->get();
        return view('frontend.pages.homepage', compact('wid', 'posts', 'port', 'www'));
    }
}
