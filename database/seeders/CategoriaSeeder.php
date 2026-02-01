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
            ['nome' => 'Brinquedos', 'ativo' => true],
            ['nome' => 'Móveis', 'ativo' => true],
            ['nome' => 'Beleza', 'ativo' => true],
            ['nome' => 'Esportes', 'ativo' => true],
            ['nome' => 'Saúde', 'ativo' => true],
            ['nome' => 'Ferramentas', 'ativo' => true],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
