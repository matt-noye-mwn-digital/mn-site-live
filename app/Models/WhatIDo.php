<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WhatIDo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'order',
        'featured_image',
        'main_content',
        'seo_title',
        'seo_keywords',
        'seo_description',
    ];
    public function seo(){
        return $this->hasOne(PagePostSeo::class, 'wid_id');
    }
}
