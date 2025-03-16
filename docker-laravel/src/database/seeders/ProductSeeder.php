<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'name' => 'Produto Exemplo',
            'price' => 99.99,
            'description' => 'Descrição do produto.',
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Nvidia Geforce RTX 2080TI',
            'price' => 150,
            'description' => 'The best Video Card for gamers, to play the maximum quality',
            'category_id' => 3
        ]);
    }
}