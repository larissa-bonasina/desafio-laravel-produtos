<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Eletrônicos', 'ativo' => true],
            ['nome' => 'Roupas', 'ativo' => true],
            ['nome' => 'Alimentos', 'ativo' => true],
            ['nome' => 'Livros', 'ativo' => true],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
