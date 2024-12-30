<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HargaPanganSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $pasarIds = range(1, 11); // ID pasar (1-11)
        $jenisPanganIds = range(1, 30); // ID jenis pangan (1-30)

        foreach ($pasarIds as $pasarId) {
            foreach ($jenisPanganIds as $jenisPanganId) {
                $data[] = [
                    'pasar_id' => $pasarId,
                    'jenis_pangan_id' => $jenisPanganId,
                    'price' => rand(10000, 50000), // Harga random
                    'date' => now()->subDays(rand(0, 30))->toDateString(), // Tanggal acak
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                if (count($data) >= 300) break 2; // Maksimal 300 data
            }
        }

        DB::table('harga_pangans')->insert($data);
    }
}
