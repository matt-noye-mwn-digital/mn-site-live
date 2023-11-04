<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'backend_section_title',
        'section_display_order',
        'section_content',
    ];

    public function page(){
        return $this->belongsTo(Page::class);
    }
}
