<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class CategoriaController extends Controller
{
    public function index()
{
    $categorias = Categoria::all();
    return view('categorias.inicio', compact('categorias'));
}


public function create()
{
    return view('categorias.create');
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
