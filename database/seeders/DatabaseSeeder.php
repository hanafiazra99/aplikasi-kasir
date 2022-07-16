<?php

namespace Database\Seeders;

use App\Models\Master\Barang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $barang_list = array(
            [
                'nama_barang' => 'sabun',
                'harga' => 3000,
            ], [
                'nama_barang' => 'mi instan',
                'harga' => 2000,
            ],
            [
                'nama_barang' => 'pensil',
                'harga' => 1000,
            ],
            [
                'nama_barang' => 'kopi sachet',
                'harga' => 1500,
            ],
            [
                'nama_barang' => 'air minum galon',
                'harga' => 20000,
            ]
        );

        foreach ($barang_list as $item) {

            Barang::create([
                'nama_barang' => $item['nama_barang'],
                'harga_satuan' => $item['harga']
            ]);
        }
    }
}
