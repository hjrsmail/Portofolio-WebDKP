<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    // Properti fillable untuk mass assignment
    protected $fillable = [
        'title',
        'html',
    ];
}
