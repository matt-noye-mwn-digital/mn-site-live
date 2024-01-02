<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgebaseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'featured_image',
    ];

    public function post() {
        return $this->hasMany(Knowledgebase::class, 'category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
