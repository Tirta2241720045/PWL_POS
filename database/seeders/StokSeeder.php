<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['stok_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-01-17 12:05:30'), 'stok_jumlah' => 20],
            ['stok_id' => 2, 'barang_id' => 2, 'user_id' => 2, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-02-10 21:38:20'), 'stok_jumlah' => 10],
            ['stok_id' => 3, 'barang_id' => 3, 'user_id' => 2, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-03-26 11:43:10'), 'stok_jumlah' => 50],
            ['stok_id' => 4, 'barang_id' => 4, 'user_id' => 1, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2023-04-24 15:54:50'), 'stok_jumlah' => 40],
            ['stok_id' => 5, 'barang_id' => 5, 'user_id' => 1, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-05-05 23:16:40'), 'stok_jumlah' => 200],
            ['stok_id' => 6, 'barang_id' => 6, 'user_id' => 3, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2022-06-08 20:29:60'), 'stok_jumlah' => 100],
            ['stok_id' => 7, 'barang_id' => 7, 'user_id' => 2, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2021-07-19 19:37:50'), 'stok_jumlah' => 5],
            ['stok_id' => 8, 'barang_id' => 8, 'user_id' => 1, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2021-08-21 16:41:30'), 'stok_jumlah' => 10],
            ['stok_id' => 9, 'barang_id' => 9, 'user_id' => 2, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2020-10-13 05:52:20'), 'stok_jumlah' => 20],
            ['stok_id' => 10, 'barang_id' => 10, 'user_id' => 3, 'stok_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2020-11-12 08:19:10'), 'stok_jumlah' => 40],
        ];
        DB::table('t_stok')->insert($data);
    }
}

