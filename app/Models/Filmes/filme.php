<?php

namespace App\Models\Filmes;
use App\Models\Filmes\colecao_filme;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filme extends Model
{
    use HasFactory;

    protected $fillable= [
        "colecao_id", "nome", "numero_ordem" , "data_inicio", "data_fim"
    ];

    public function colecao() {
        return $this->belongsTo('App\Models\Filmes\colecao_filme');
    }
}
