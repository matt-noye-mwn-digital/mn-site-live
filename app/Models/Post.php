<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'featured_image',
        'main_content',
        'page_type',
        'page_description',
        'page_keywords',
        'user_id',
        'category_id',
        'tags',
        'excerpt',
        'published',
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'category_id', 'id');
    }
    public function seo(){
        return $this->hasOne(PagePostSeo::class);
    }
}
