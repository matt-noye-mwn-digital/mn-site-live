<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetAQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'describe_you',
        'budget',
        'looking_for',
        'pages_required',
        'similar_websites',
        'complete_project_by',
        'any_other_details',
        'first_name',
        'last_name',
        'company_name',
        'email_address',
        'phone_number',
        'status'
    ];
}
