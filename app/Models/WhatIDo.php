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

    /*protected static function booted() {
        static::creating(function($whatIDo){
            $whatIDo->slug = Str::slug($whatIDo->title);
        });
    }
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = 'what-i-do/' . Str::slug($value);
    }*/
}
