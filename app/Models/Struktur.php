<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struktur extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
