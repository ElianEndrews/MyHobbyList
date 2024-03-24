<?php

namespace App\Models\Filmes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colecao_filme extends Model
{
    use HasFactory;

    protected $fillable= [
        "nome", "data_inicio", "data_fim"
    ];

    public function filmes(){
        return $this->hasMany(filme::class, 'colecao_id', 'id');
    }

    public function addFilme(filme $filme)
    {
        return $this->filmes()->save($filme);
    }

    public function deletarFilmes()
    {
        $this->filmes->each(function ($filme) {
            $filme->delete();
        });

        return true;
    }
}
