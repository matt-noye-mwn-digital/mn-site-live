<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormSubmissions extends Model
{
    use HasFactory;

    public $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'phone_number',
        'company_name',
        'reason_for_contacting',
        'your_message',
        'how_did_you_hear_about_me',
        'status',
    ];
}
