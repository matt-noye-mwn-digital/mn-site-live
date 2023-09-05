<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledgebase extends Model
{
    use HasFactory;

    protected $table = 'knowledgebase_articles';

    protected $fillable = [
        'title',
        'slug',
        'main_content',
        'excerpt',
        'published',
        'page_type',
        'page_description',
        'page_keywords',
        'user_id',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(KnowledgebaseCategory::class);
    }
}
