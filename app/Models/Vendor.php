<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'name',
        'logo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
