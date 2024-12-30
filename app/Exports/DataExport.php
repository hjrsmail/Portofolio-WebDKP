<?php

// app/Exports/DataExport.php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        // Mengubah data agar menampilkan nama pasar dan jenis pangan
        return $this->data->map(function ($item) {
            return [
                'Jenis Pangan' => $item->jenisPangan ? $item->jenisPangan->name : 'Tidak Diketahui', // Menampilkan nama food
                'Pasar' => $item->pasar ? $item->pasar->name : 'Tidak Diketahui', // Menampilkan nama market
                'Harga' => $item->price,
                'Date' => $item->date,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Jenis Pangan', 'Pasar', 'Harga', 'Tanggal'
        ];
    }
}


