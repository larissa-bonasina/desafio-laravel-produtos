<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = Categoria::all();

        $produtosExemplo = [
            ['nome' => 'Smartphone', 'sku' => 'ELE001', 'preco' => 1200, 'quantidade_estoque' => 10],
            ['nome' => 'Notebook', 'sku' => 'ELE002', 'preco' => 3500, 'quantidade_estoque' => 5],
            ['nome' => 'Camiseta', 'sku' => 'ROU001', 'preco' => 50, 'quantidade_estoque' => 20],
            ['nome' => 'Calça Jeans', 'sku' => 'ROU002', 'preco' => 120, 'quantidade_estoque' => 15],
            ['nome' => 'Chocolate', 'sku' => 'ALI001', 'preco' => 10, 'quantidade_estoque' => 50],
            ['nome' => 'Leite', 'sku' => 'ALI002', 'preco' => 5, 'quantidade_estoque' => 30],
            ['nome' => 'Livro de PHP', 'sku' => 'LIV001', 'preco' => 80, 'quantidade_estoque' => 10],
            ['nome' => 'Livro de Laravel', 'sku' => 'LIV002', 'preco' => 100, 'quantidade_estoque' => 5],
            ['nome' => 'Carrinho de Brinquedo', 'sku' => 'BRI001', 'preco' => 60, 'quantidade_estoque' => 12],
            ['nome' => 'Boneca', 'sku' => 'BRI002', 'preco' => 45, 'quantidade_estoque' => 15],
            ['nome' => 'Sofá', 'sku' => 'MOU001', 'preco' => 1500, 'quantidade_estoque' => 2],
            ['nome' => 'Mesa', 'sku' => 'MOU002', 'preco' => 700, 'quantidade_estoque' => 4],
            ['nome' => 'Perfume', 'sku' => 'BEL001', 'preco' => 120, 'quantidade_estoque' => 10],
            ['nome' => 'Batom', 'sku' => 'BEL002', 'preco' => 35, 'quantidade_estoque' => 25],
            ['nome' => 'Bola de Futebol', 'sku' => 'ESP001', 'preco' => 80, 'quantidade_estoque' => 20],
            ['nome' => 'Raquete de Tênis', 'sku' => 'ESP002', 'preco' => 200, 'quantidade_estoque' => 5],
            ['nome' => 'Aspirina', 'sku' => 'SAU001', 'preco' => 15, 'quantidade_estoque' => 50],
            ['nome' => 'Vitaminas', 'sku' => 'SAU002', 'preco' => 60, 'quantidade_estoque' => 30],
            ['nome' => 'Parafusadeira', 'sku' => 'FER001', 'preco' => 300, 'quantidade_estoque' => 8],
            ['nome' => 'Martelo', 'sku' => 'FER002', 'preco' => 50, 'quantidade_estoque' => 15],
            ['nome' => 'Fone de Ouvido', 'sku' => 'ELE003', 'preco' => 200, 'quantidade_estoque' => 25],
            ['nome' => 'Tênis Esportivo', 'sku' => 'ROU003', 'preco' => 250, 'quantidade_estoque' => 20],
            ['nome' => 'Pão', 'sku' => 'ALI003', 'preco' => 3, 'quantidade_estoque' => 40],
            ['nome' => 'Livro de JS', 'sku' => 'LIV003', 'preco' => 90, 'quantidade_estoque' => 8],
            ['nome' => 'Carrinho de Controle', 'sku' => 'BRI003', 'preco' => 150, 'quantidade_estoque' => 10],
            ['nome' => 'Cadeira', 'sku' => 'MOU003', 'preco' => 300, 'quantidade_estoque' => 6],
        ];

        foreach ($produtosExemplo as $produto) {
            // atribuir aleatoriamente categoria se não for óbvio pelo SKU
            $categoriaId = match(substr($produto['sku'],0,3)) {
                'ELE' => Categoria::where('nome','Eletrônicos')->first()->id,
                'ROU' => Categoria::where('nome','Roupas')->first()->id,
                'ALI' => Categoria::where('nome','Alimentos')->first()->id,
                'LIV' => Categoria::where('nome','Livros')->first()->id,
                'BRI' => Categoria::where('nome','Brinquedos')->first()->id,
                'MOU' => Categoria::where('nome','Móveis')->first()->id,
                'BEL' => Categoria::where('nome','Beleza')->first()->id,
                'ESP' => Categoria::where('nome','Esportes')->first()->id,
                'SAU' => Categoria::where('nome','Saúde')->first()->id,
                'FER' => Categoria::where('nome','Ferramentas')->first()->id,
                default => 1,
            };

            Produto::create(array_merge($produto, ['categoria_id' => $categoriaId, 'ativo' => true]));
        }
    }
}
