<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'barang_kode' => 'E11S', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 4000000],
            ['kategori_id' => 1, 'barang_kode' => 'E12L', 'barang_nama' => 'Laptop', 'harga_beli' => 6000000, 'harga_jual' => 8000000],
            ['kategori_id' => 2, 'barang_kode' => 'P21T', 'barang_nama' => 'T-shirt', 'harga_beli' => 50000, 'harga_jual' => 100000],
            ['kategori_id' => 2, 'barang_kode' => 'P22J', 'barang_nama' => 'Jeans', 'harga_beli' => 100000, 'harga_jual' => 200000],
            ['kategori_id' => 3, 'barang_kode' => 'M31B', 'barang_nama' => 'Bakso', 'harga_beli' => 20000, 'harga_jual' => 200000],
            ['kategori_id' => 3, 'barang_kode' => 'M32S', 'barang_nama' => 'Susu', 'harga_beli' => 10000, 'harga_jual' => 10000],
            ['kategori_id' => 4, 'barang_kode' => 'O41M', 'barang_nama' => 'Motor', 'harga_beli' => 50000, 'harga_jual' => 75000],
            ['kategori_id' => 4, 'barang_kode' => 'O42M', 'barang_nama' => 'Mobil', 'harga_beli' => 60000, 'harga_jual' => 80000],
            ['kategori_id' => 5, 'barang_kode' => 'B51K', 'barang_nama' => 'Komik', 'harga_beli' => 80000, 'harga_jual' => 100000],
            ['kategori_id' => 5, 'barang_kode' => 'B52M', 'barang_nama' => 'Majalah', 'harga_beli' => 40000, 'harga_jual' => 50000],
        ];
        DB::table('m_barang')->insert($data);
    }
}