<?php

namespace App\Imports;

use App\Models\HargaPangan;
use Maatwebsite\Excel\Concerns\ToModel;

class HargaPanganImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HargaPangan([
            //
        ]);
    }
}
