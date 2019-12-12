<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_orders')->insert([
            [
                'status_name' => 'cart'
            ],
            [
                'status_name' => 'Menunggu Pembayaran'
            ],
            [
                'status_name' => 'Barang Dikirim'
            ],
            [
                'status_name' => 'Barang Sampai'
            ],
            [
                'status_name' => 'Barang Diterima'
            ]
        ]);
    }
}
