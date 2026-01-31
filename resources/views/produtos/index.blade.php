@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Produtos</h2>

        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('produtos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Novo Produto
            </a>

            <form method="GET" action="{{ route('produtos.index') }}" class="flex space-x-2 items-center">

                <input type="text" name="search" placeholder="Buscar por nome ou SKU" value="{{ request('search') }}"
                    class="border px-2 py-1 rounded">

                <select name="categoria_id" class="border px-2 py-1 rounded">
                    <option value="">Todas as categorias</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>

                <select name="ativo" class="border px-2 py-1 rounded">
                    <option value="">Todos</option>
                    <option value="1" {{ request('ativo') === '1' ? 'selected' : '' }}>Ativos</option>
                    <option value="0" {{ request('ativo') === '0' ? 'selected' : '' }}>Inativos</option>
                </select>

                <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded">
                    Filtrar
                </button>
            </form>
        </div>

        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nome</th>
                    <th class="border px-4 py-2">SKU</th>
                    <th class="border px-4 py-2">Preço</th>
                    <th class="border px-4 py-2">Estoque</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Categoria</th>
                    <th class="border px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $produto->id }}</td>
                        <td class="border px-4 py-2">{{ $produto->nome }}</td>
                        <td class="border px-4 py-2">{{ $produto->sku }}</td>
                        <td class="border px-4 py-2">
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </td>

                        <td class="border px-4 py-2 text-center">
                            @if($produto->quantidade_estoque <= 5)
                                <span class="text-red-600 font-bold">
                                    {{ $produto->quantidade_estoque }} ⚠️
                                </span>
                            @else
                                {{ $produto->quantidade_estoque }}
                            @endif
                        </td>

                        <td class="border px-4 py-2 text-center">
                            @if($produto->ativo)
                                <span class="text-green-600 font-semibold">Ativo</span>
                            @else
                                <span class="text-red-600 font-semibold">Inativo</span>
                            @endif
                        </td>

                        <td class="border px-4 py-2">
                            {{ $produto->categoria->nome ?? '—' }}
                        </td>

                        <td class="border px-4 py-2">
                            <a href="{{ route('produtos.edit', $produto) }}" class="text-blue-500 hover:underline">
                                Editar
                            </a> |
                            <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Deseja realmente excluir este produto?')"
                                    class="text-red-500 hover:underline">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $produtos->withQueryString()->links() }}
        </div>
    </div>
@endsection
