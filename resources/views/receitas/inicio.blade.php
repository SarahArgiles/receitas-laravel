<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Receitas</h1>

        <!-- Barra de pesquisa -->
        <form action="{{ route('inicio') }}" method="GET" class="mb-4">
            <input type="text" name="busca" placeholder="Buscar receitas..."
                class="w-full p-2 border rounded">
        </form>

        <!-- Categorias -->
        <div class="flex gap-2 mb-4">
            @foreach($categorias as $categoria)
                <a href="?categoria={{ $categoria->nome }}" class="px-3 py-1 bg-blue-200 rounded">
                    {{ $categoria->nome }}
                </a>
            @endforeach
        </div>

        <!-- Cards de receitas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($receitas as $receita)
                <div class="border p-4 rounded">
                    <h2 class="font-bold text-lg">{{ $receita->titulo }}</h2>
                    <p>Categoria: {{ $receita->categoria }}</p>
                    <a href="{{ route('receitas.show', $receita) }}" class="text-blue-500">Ver mais</a>
                </div>
            @endforeach
        </div>
    </div>

        <h2 class="text-2xl">Minhas Receitas</h2>

        @foreach($receitas as $receita)
            <div class="border-b mb-4">
                <h3 class="text-xl">{{ $receita->titulo }}</h3>
                <p>{{ Str::limit($receita->modo_preparo, 100) }}</p>
                <a href="{{ route('receitas.show', $receita->id) }}">Ver mais</a>
            </div>
        @endforeach
        
</x-app-layout>


