<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['name' => 'Receitas fáceis']);
        Categoria::create(['name' => 'Receitas AirFryer']);
        Categoria::create(['name' => 'Fit']);
        Categoria::create(['name' => 'Gourmet']);
        Categoria::create(['name' => 'Não sabe cozinhar']);
        Categoria::create(['name' => 'Veggie']);
    }
}
