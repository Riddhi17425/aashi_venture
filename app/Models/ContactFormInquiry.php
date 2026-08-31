<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFormInquiry extends Model
{
    protected $table = 'contact_form_inquiries';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}