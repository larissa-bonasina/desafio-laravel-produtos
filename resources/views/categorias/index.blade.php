@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Categorias</h2>

        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('categorias.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Nova Categoria
            </a>
        </div>

        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nome</th>
                    <th class="border px-4 py-2 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $categoria->id }}</td>
                        <td class="border px-4 py-2">{{ $categoria->nome }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('categorias.edit', $categoria) }}"
                               class="text-blue-500 hover:underline">
                                Editar
                            </a>
                            |
                            <form action="{{ route('categorias.destroy', $categoria) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Deseja realmente excluir esta categoria?')"
                                        class="text-red-500 hover:underline">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border px-4 py-6 text-center text-gray-500">
                            Nenhuma categoria cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
