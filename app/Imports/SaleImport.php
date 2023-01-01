<?php

namespace App\Imports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\ToModel;

class SaleImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Sale([
            'namaPelanggan'     => $row[0],
            'namaProduk'    => $row[1],
            'hargaProduk' => $row[2],
            'jumlahProduk' => $row[3],
            'total' => $row[4],
        ]);
    }
}
