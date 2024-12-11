<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ReceitaPostada;

class ReceitaController extends Controller
{

    public function index(Request $request)
    {
        //$receitas = Receita::all();  
        //$categorias = Categoria::all();
        $categorias = Categoria::all();

        // Filtro por categoria
        $query = Receita::query();
        if ($request->filled('categoria')) {
            $query->whereHas('categoria', function ($q) use ($request) {
                $q->where('titulo', $request->categoria);
            });
        }

        // Busca por título
        if ($request->filled('busca')) {
            $query->where('titulo', 'like', '%' . $request->busca . '%');
        }

        $receitas = $query->with('categoria')->get(); 
        return view('receitas.inicio', compact('receitas', 'categorias'));
        

    } 

    public function show($id)
    {
       //$receitas = Receita::findOrFail($id); // Busca a receita pelo ID ou lança um erro 404
       //$categorias = Categoria::all();
       //$receitas = Receita::with('categoria')->get();
        //return view('receitas.inicio', compact('receitas', 'categorias')); // Retorna a view correspondente

        $receita = Receita::with('categoria')->findOrFail($id); // Buscar a receita específica
        return view('receitas.show', compact('receita')); // Passar a receita para a view
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
        $validated = $request->validate([
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
        $receita = Receita::create([
            'titulo' => $request->titulo,
            'modo_preparo' => $request->modo_preparo,
            'ingredientes' => $request->ingredientes,
            'tempo_preparo' => $request->tempo_preparo,
            'categoria_id' => $request->categoria_id,
            'foto' => $fotoPath,
            'dicas' => $request->dicas,
            'usuario_id' => Auth::id(), // Relacionar a receita com o usuário autenticado
        ]);
        
        $validated['usuario_id'] = auth()->id();
        $user = Auth::user();
        $user->notify(new ReceitaPostada($receita));

       

        return redirect()->route('receitas.index')->with('success', 'Receita postada com sucesso!');
    }
}




