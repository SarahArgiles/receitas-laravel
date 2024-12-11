<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;


// Rota inicial para exibir receitas
Route::get('/', [ReceitaController::class, 'index'])->name('inicio');


// Dashboard protegido por middleware de autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas para gerenciamento de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas de receitas (CRUD completo)
Route::resource('receitas', ReceitaController::class);
Route::resource('categorias', CategoriaController::class);
Route::get('/receitas/create', [ReceitaController::class, 'create'])->name('receitas.create');
Route::get('/receitas/{receita}', [ReceitaController::class, 'show'])->name('receitas.show');



// Autenticação gerada pelo Breeze
require __DIR__.'/auth.php';









