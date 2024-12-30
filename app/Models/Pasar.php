<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasar extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function hargaPangans()
    {
        return $this->hasMany(HargaPangan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
