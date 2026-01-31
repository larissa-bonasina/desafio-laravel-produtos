<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Laravel</title>

    {{-- Vite + Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-indigo-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">
                Sistema de Controle
            </h1>

            <nav class="space-x-6 font-medium">
                <a href="{{ route('produtos.index') }}"
                   class="hover:text-indigo-200 transition">
                    Produtos
                </a>
                <a href="{{ route('categorias.index') }}"
                   class="hover:text-indigo-200 transition">
                    Categorias
                </a>
            </nav>
        </div>
    </header>

    <!-- Conteúdo -->
    <main class="flex-1 max-w-7xl mx-auto px-6 py-8 w-full">

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="mb-6 rounded bg-green-100 border border-green-400 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 rounded bg-red-100 border border-red-400 text-red-800 px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} Todos os direitos reservados
        </div>
    </footer>

</body>
</html>
