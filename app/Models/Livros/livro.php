<?php

namespace App\Models\Livros;
use App\Models\Livros\colecao_livro;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livro extends Model
{
    use HasFactory;

    protected $fillable= [
        "colecao_id", "nome", "numero_ordem" , "data_inicio", "data_fim"
    ];

    public function colecao() {
        return $this->belongsTo('App\Models\Livros\colecao_livro');
    }


}
