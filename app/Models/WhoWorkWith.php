<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhoWorkWith extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'sub_title',
        'featured_image',
        'main_content',
        'seo_title',
        'seo_description',
        'seo_image',
        'seo_canonical_url',
    ];
}
