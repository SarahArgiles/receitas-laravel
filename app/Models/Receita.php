<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;


class Receita extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'modo_preparo',
        'ingredientes',
        'tempo_preparo',
        'categoria_id',
        'foto',
        'dicas',
        'user_id',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}



