<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Urutan penting: kategori harus ada sebelum barang
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
        ]);
    }
}