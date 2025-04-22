<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'user_id' => 1, 'stok_tanggal' => Carbon::now()->subDays(10), 'stok_jumlah' => 20],
            ['barang_id' => 2, 'user_id' => 2, 'stok_tanggal' => Carbon::now()->subDays(15), 'stok_jumlah' => 30],
            ['barang_id' => 3, 'user_id' => 1, 'stok_tanggal' => Carbon::now()->subDays(8), 'stok_jumlah' => 25],
            ['barang_id' => 4, 'user_id' => 3, 'stok_tanggal' => Carbon::now()->subDays(5), 'stok_jumlah' => 15],
            ['barang_id' => 5, 'user_id' => 2, 'stok_tanggal' => Carbon::now()->subDays(12), 'stok_jumlah' => 50],
            ['barang_id' => 6, 'user_id' => 1, 'stok_tanggal' => Carbon::now()->subDays(18), 'stok_jumlah' => 10],
            ['barang_id' => 7, 'user_id' => 3, 'stok_tanggal' => Carbon::now()->subDays(20), 'stok_jumlah' => 40],
            ['barang_id' => 8, 'user_id' => 1, 'stok_tanggal' => Carbon::now()->subDays(7), 'stok_jumlah' => 35],
            ['barang_id' => 9, 'user_id' => 2, 'stok_tanggal' => Carbon::now()->subDays(9), 'stok_jumlah' => 28],
            ['barang_id' => 10, 'user_id' => 3, 'stok_tanggal' => Carbon::now()->subDays(14), 'stok_jumlah' => 22],
        ];

        DB::table('t_stok')->insert($data);
    }
}
