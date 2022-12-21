<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            'namaPelanggan' => 'Asep',
            'namaProduk' => 'Kopi',
            'jumlahProduk' => 4,
            'hargaProduk' => 5000,
            'total' => 20000,
        ]);
    }
}
