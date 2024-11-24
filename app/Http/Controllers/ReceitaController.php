<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReceitaController extends Controller
{

    public function index()
    {
        $receitas = Receita::all();  // Ou o que for necessário para listar as receitas
        return view('receitas.inicio', compact('receitas'));
        

    } 
    // Mostra o formulário de criação
    public function create()
    {
        $categorias = Categoria::all();
        return view('receitas.create', compact('categorias'));
    }

    // Salva a receita
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'titulo' => 'required|string|max:255',
            'modo_preparo' => 'required|string',
            'ingredientes' => 'required|string',
            'tempo_preparo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dicas' => 'nullable|string',
        ]);

        // Salvar a foto
        $fotoPath = $request->file('foto')->store('public/receitas');

        // Criar a receita
        Receita::create([
            'titulo' => $request->titulo,
            'modo_preparo' => $request->modo_preparo,
            'ingredientes' => $request->ingredientes,
            'tempo_preparo' => $request->tempo_preparo,
            'categoria_id' => $request->categoria_id,
            'foto' => $fotoPath,
            'dicas' => $request->dicas,
            'user_id' => Auth::id(), // Relacionar a receita com o usuário autenticado
        ]);

        return redirect()->route('receitas.index')->with('success', 'Receita postada com sucesso!');
    }
}




