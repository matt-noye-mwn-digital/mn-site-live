<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalProjects extends Model
{
    use HasFactory;

    protected $table = 'personal_projects';

    protected $fillable = [
        'name',
        'tagline',
        'featured_image',
        'services_used',
        'the_brief',
        'project_link',
        'responsive_image',
        'slug'
    ];
}
