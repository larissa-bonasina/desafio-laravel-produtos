@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow rounded-lg p-6">

        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            ➕ Nova Categoria
        </h1>

        
        @if ($errors->any())
            <div class="mb-4 rounded bg-red-100 border border-red-400 text-red-800 px-4 py-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categorias.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium text-gray-700">
                    Nome da categoria
                </label>
                <input
                    type="text"
                    name="nome"
                    value="{{ old('nome') }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                    placeholder="Ex: Eletrônicos"
                    required
                >
            </div>

            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('categorias.index') }}"
                   class="text-gray-600 hover:underline">
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded transition"
                >
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
