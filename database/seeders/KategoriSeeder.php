<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori_id' => '1', 'kategori_kode' => 'E1', 'kategori_nama' => 'Elektronik'],
            ['kategori_id' => '2', 'kategori_kode' => 'P2',  'kategori_nama' => 'Pakaian'],
            ['kategori_id' => '3', 'kategori_kode' => 'M3', 'kategori_nama' => 'Makanan'],
            ['kategori_id' => '4', 'kategori_kode' => 'O4', 'kategori_nama' => 'Otomotif'],
            ['kategori_id' => '5', 'kategori_kode' => 'B5', 'kategori_nama' => 'Buku'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
