<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Listar categorias
     */
    public function index()
    {
        // Pode usar paginate se quiser elevar o nível
        $categorias = Categoria::withCount('produtos')
            ->orderBy('nome')
            ->get();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Formulário de criação
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Salvar nova categoria
     */
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->validated());

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Formulário de edição
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Atualizar categoria
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Excluir categoria
     * Regra: não permitir excluir se houver produtos vinculados
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->produtos()->exists()) {
            return redirect()
                ->route('categorias.index')
                ->with('error', 'Não é possível excluir uma categoria com produtos vinculados.');
        }

        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoria excluída com sucesso!');
    }
}


