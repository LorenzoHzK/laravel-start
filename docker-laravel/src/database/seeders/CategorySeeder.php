<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::insert([
            ['name' => 'Tecnology', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Peripherals', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hardware', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
