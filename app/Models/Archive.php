<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $fillable=[
        'file_path',
        'file_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGroupedByMonth($query)
    {
        return $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as count')
                    ->groupBy('month')
                    ->orderBy('month', 'desc');
    }

    public function scopeGroupedByYear($query)
    {
        return $query->selectRaw('DATE_FORMAT(created_at, "%Y") as year, COUNT(*) as count')
                    ->groupBy('year')
                    ->orderBy('year', 'desc');
    }

    public function scopeGroupedByDay($query)
    {
        return $query->selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as day, COUNT(*) as count')
                    ->groupBy('day')
                    ->orderBy('day', 'desc');
    }

}
