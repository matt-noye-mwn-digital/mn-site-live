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
        'testimonial_author',
        'slug',
    ];


    public function seo(){
        return $this->hasOne(PagePostSeo::class, 'port_item_id');
    }
}
