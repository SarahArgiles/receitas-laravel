<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold">{{ $receita->titulo }}</h1>
        <p><strong>Categoria:</strong> {{ $receita->categoria->titulo }}</p>
        <p><strong>Modo de Preparo:</strong> {{ $receita->modo_preparo }}</p>
        <p><strong>Ingredientes:</strong> {{ $receita->ingredientes }}</p>
        <p><strong>Tempo de Preparo:</strong> {{ $receita->tempo_preparo }}</p>
        <img src="{{ Storage::url($receita->foto) }}" alt="Foto da receita" />
        <p><strong>Dicas:</strong> {{ $receita->dicas }}</p>
    </div>
</x-app-layout>