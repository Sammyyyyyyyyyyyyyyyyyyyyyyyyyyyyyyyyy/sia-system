<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassroomLink extends Model
{
    protected $fillable = [
        'block',
        'google_classroom_url',
    ];
}