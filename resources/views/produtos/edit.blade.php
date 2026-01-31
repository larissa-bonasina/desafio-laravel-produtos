@extends('layouts.app')


@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Editar Produto</h1>

        <form action="{{ route('produtos.update', $produto) }}" method="POST">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label class="block mb-1">Nome:</label>
                <input type="text" name="nome" class="w-full border px-2 py-1 rounded"
                    value="{{ old('nome', $produto->nome) }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">SKU:</label>
                <input type="text" name="sku" class="w-full border px-2 py-1 rounded"
                    value="{{ old('sku', $produto->sku) }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Preço:</label>
                <input type="number" name="preco" class="w-full border px-2 py-1 rounded"
                    value="{{ old('preco', $produto->preco) }}" required step="0.01">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Quantidade em estoque:</label>
                <input type="number" name="quantidade_estoque" class="w-full border px-2 py-1 rounded"
                    value="{{ old('quantidade_estoque', $produto->quantidade_estoque) }}" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Categoria:</label>
                <select name="categoria_id" class="w-full border px-2 py-1 rounded" required>
                    <option value="">Selecione...</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="ativo" value="1" class="mr-2" {{ $produto->ativo ? 'checked' : '' }}>
                    Ativo
                </label>
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">Atualizar</button>
            <a href="{{ route('produtos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
        </form>
    </div>
@endsection
