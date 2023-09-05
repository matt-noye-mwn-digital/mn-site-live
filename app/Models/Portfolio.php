<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolio';

    protected $fillable = [
        'name',
        'tagline',
        'featured_image',
        'services_used',
        'the_brief',
        'website_link',
        'mobile_desktop_tablet_image',
        'testimonial_content',
        'tetimonial_author',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'slug',
    ];


    /*// Define the custom save_slug closure
    public function getSaveSlugClosure(): \Closure
    {
        return function ($attribute, $slug, $separator) {
            return 'portfolio/' . $slug; // Prepend "portfolio/" to the slug
        };
    }*/
}
