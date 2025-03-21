<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'tittle' => 'Testando',
            'content' => 'Conteudo do Post',
            'description' => 'Descricao do post'
        ]);
    }
}
