<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Receita; 





class CategoriaController extends Controller
{
    public function index()
{
    $categorias = Categoria::all();
    $receitas = Receita::with('categoria')->get();
    
    return view('inicio', compact('categorias', 'receitas'));
   
    
}

public function inicio()
{
    $categorias = Categoria::all();
    
    return view('inicio.blade', compact('categorias'));
    
}


public function create()
{
    $categorias = Categoria::all(); // Busca todas as categorias
    return view('receitas.create', compact('categorias')); // Envia para a view
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categorias|max:255',
    ]);

    Categoria::create([
        'name' => $request->name,
    ]);

    return redirect()->route('categorias.index');
}

public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('categorias.edit', compact('categoria'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|unique:categorias|max:255',
    ]);

    $categoria = Categoria::findOrFail($id);
    $categoria->update([
        'name' => $request->name,
    ]);

    return redirect()->route('categorias.index');
}

public function destroy($id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->delete();

    return redirect()->route('categorias.index');
}


}
