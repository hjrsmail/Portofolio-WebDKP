<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaPangan extends Model
{
    use HasFactory;

    protected $fillable = ['jenis_pangan_id', 'pasar_id', 'price', 'date'];

    public function jenisPangan()
    {
        return $this->belongsTo(JenisPangan::class, 'jenis_pangan_id');
    }

    public function pasar()
    {
        return $this->belongsTo(Pasar::class, 'pasar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
