<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Udin Santoso', 'penjualan_kode' =>  'KJ01', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-02-20 10:01:30')],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Siti Khadijah', 'penjualan_kode' => 'KJ02', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-03-21 11:02:35')],
            ['penjualan_id' => 3, 'user_id' => 2, 'pembeli' => 'Cahya Rahmat', 'penjualan_kode' => 'KJ03', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-04-18 12:03:40')],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Sindy Fira', 'penjualan_kode' => 'KJ04', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-05-17 05:07:20')],
            ['penjualan_id' => 5, 'user_id' => 1, 'pembeli' => 'Budi Hartanto', 'penjualan_kode' => 'KJ05', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-07-13 08:06:50')],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Tirta Wijaya', 'penjualan_kode' => 'KJ06', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-08-15 02:10:55')],
            ['penjualan_id' => 7, 'user_id' => 2, 'pembeli' => 'Arif Budiman', 'penjualan_kode' => 'KJ07', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-10-12 01:40:20')],
            ['penjualan_id' => 8, 'user_id' => 1, 'pembeli' => 'Sri Rejeki', 'penjualan_kode' => 'KJ08', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-11-11 06:30:10')],
            ['penjualan_id' => 9, 'user_id' => 2, 'pembeli' => 'Rosita Sari', 'penjualan_kode' => 'KJ09', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-12-14 06:25:40')],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Lucyta Chiyndi', 'penjualan_kode' => 'KJ10', 'penjualan_tanggal' => Carbon::createFromFormat('Y-m-d H:i:s', '2024-01-18 08:15:30')],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
