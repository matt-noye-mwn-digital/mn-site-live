<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_title',
        'page_slug',
        'published',
        'seo_title',
        'seo_description',
        'seo_keyword',
        'seo_keywords',
        'seo_image'
    ];
    public function pageContent() {
        return $this->hasMany(PageContent::class);
    }
    public function seo(){
        return $this->hasOne(PagePostSeo::class);
    }
}
