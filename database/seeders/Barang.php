<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Barang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // menambahkan data dummy ke tabel barangs, dan menyesuaikan fieldnya dengan field yang ada di tabel barangs
        \DB::table('barangs')->insert([
            [
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Barang 1',
                'deskripsi' => 'Deskripsi Barang 1',
                'harga' => 10000,
                'kategori_id' => 1,
            ],
            [
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Barang 2',
                'deskripsi' => 'Deskripsi Barang 2',
                'harga' => 20000,
                'kategori_id' => 2,
            ],
            [
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Barang 3',
                'deskripsi' => 'Deskripsi Barang 3',
                'harga' => 30000,
                'kategori_id' => 3,
            ]
        ]);
    }
}
