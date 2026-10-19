<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil id dari database agar category_id pasti valid
        $aksesori  = Category::where('name', 'Aksesori')->first()->id;
        $perangkat = Category::where('name', 'Perangkat Komputer')->first()->id;
        $simpan    = Category::where('name', 'Penyimpanan')->first()->id;

        Item::create(['category_id' => $aksesori,  'name' => 'Keyboard',  'price' => 150000,  'stock' => 10]);
        Item::create(['category_id' => $aksesori,  'name' => 'Mouse',     'price' => 75000,   'stock' => 20]);
        Item::create(['category_id' => $perangkat, 'name' => 'Monitor',   'price' => 1500000, 'stock' => 5]);
        Item::create(['category_id' => $aksesori,  'name' => 'Headset',   'price' => 250000,  'stock' => 8]);
        Item::create(['category_id' => $simpan,    'name' => 'Flashdisk', 'price' => 85000,   'stock' => 15]);
    }
}