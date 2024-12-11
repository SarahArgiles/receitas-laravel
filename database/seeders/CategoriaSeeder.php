<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {  
        // Categorias que você quer inserir no banco de dados
        $categorias = ['Fáceis', 'AirFryer', 'Fit', 'Gourmet', 'Não sabe cozinhar', 'Veggie'];

        // Inserir cada categoria
        foreach ($categorias as $nome) {
            Categoria::create(['titulo' => $nome]); // Altere 'titulo' caso seja necessário
        }
    }
}
