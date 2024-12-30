<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceData extends Model
{
    use HasFactory;

    protected $table = 'price_data';  // Nama tabel di database

    // Tentukan kolom yang boleh diisi (optional)
    protected $fillable = ['food_type', 'market', 'price', 'date'];
}
