<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($activity) {
            $activity->no = Activity::max('no') + 1;
        });
    }

    public static function getActivityData()
    {
        return [
            'completed' => self::where('date', '<=', now())->count(),
            'pending' => self::where('date', '>', now())->count(),
        ];
    }
}
