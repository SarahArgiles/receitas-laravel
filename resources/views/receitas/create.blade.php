<form action="{{ route('receitas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label for="ingredientes">Ingredientes:</label>
    <textarea name="ingredientes" id="ingredientes" rows="5" required></textarea>

    <label for="tempo_preparo">Tempo de Preparo:</label>
    <input type="text" name="tempo_preparo" id="tempo_preparo" required>

    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" id="categoria_id" required>
        <option value="">Selecione uma categoria</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->titulo }}</option>
        @endforeach
    </select>

    <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto" required>

    <label for="modo_preparo">Modo de Preparo:</label>
    <textarea name="modo_preparo" id="modo_preparo" rows="5" required></textarea>

    <label for="dicas">Dicas do Cozinheiro:</label>
    <textarea name="dicas" id="dicas" rows="5"></textarea>

    <button type="submit">Cadastrar Receita</button>
</form>
