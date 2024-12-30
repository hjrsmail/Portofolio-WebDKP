<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Berita extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title',
        'date',
        'slug',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title') 
            ->saveSlugsTo('slug'); 
    }
}
