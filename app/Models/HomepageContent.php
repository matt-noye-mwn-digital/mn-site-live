<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_banner_main_title',
        'hero_banner_tw_static_text',
        'hero_banner_tw_main_text',
        'hero_banner_button_one_text',
        'hero_banner_button_one_link',
        'hero_banner_button_two_text',
        'hero_banner_button_two_link',
        'about_banner_main_title',
        'about_banner_content',
        'about_banner_image'
    ];
}
