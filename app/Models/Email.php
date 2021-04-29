<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'subject',
        'email',
        'message',
        'user_id',
    ];
}