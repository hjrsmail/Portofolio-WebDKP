<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class InformasiPublik extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'file_path'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->nama);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->nama);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
