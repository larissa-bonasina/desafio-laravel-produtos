<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $query = Produto::with('categoria');

        // Busca por nome ou SKU
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Filtro por categoria
        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Filtro por status (ativo / inativo)
        if ($request->filled('ativo')) {
            $query->where('ativo', $request->ativo);
        }

        $produtos = $query
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $categorias = Categoria::all();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(StoreProdutoRequest $request)
    {
        Produto::create($request->validated());

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }

    public function trashed()
    {
        $produtos = Produto::onlyTrashed()->paginate(10);
        return view('produtos.trashed', compact('produtos'));
    }

    public function restore($id)
    {
        $produto = Produto::onlyTrashed()->findOrFail($id);
        $produto->restore();

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto restaurado com sucesso!');
    }
}
