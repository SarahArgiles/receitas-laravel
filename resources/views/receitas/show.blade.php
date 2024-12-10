@if ($receita)
    <h1>{{ $receita->titulo }}</h1>
    <p><strong>Ingredientes:</strong></p>
    <p>{{ $receita->ingredientes }}</p>
    <p><strong>Modo de Preparo:</strong></p>
    <p>{{ $receita->modo_preparo }}</p>
    <p><strong>Categoria:</strong> {{ $receita->categoria->nome ?? 'Sem categoria' }}</p>
@else
    <p>Receita não encontrada.</p>
@endif
