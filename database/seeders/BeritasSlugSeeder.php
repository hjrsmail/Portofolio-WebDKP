<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritasSlugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritas = Berita::all();

        foreach ($beritas as $berita) {
            $berita->slug = Str::slug($berita->title, '-'); 
            $berita->save(); 
        }
    }
}
