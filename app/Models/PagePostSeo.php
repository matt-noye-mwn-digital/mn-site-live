<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePostSeo extends Model
{
    use HasFactory;

    protected $table = 'seo';
    protected $fillable = [
        'seo_title',
        'seo_description',
        'seo_canonical_url',
        'seo_property_type',
        'seo_image',
        'page_id',
        'post_id',
        'post_cat_id',
        'kb_article_id',
        'kb_category_id',
        'port_item_id',
        'per_project_id',
        'wid_id',
        'www_id',
    ];

    public function page(){
        return $this->belongsTo(Page::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function personalProject(){
        return $this->belongsTo(PersonalProjects::class);
    }
}
