<?php

namespace App\Models\Livros;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colecao_livro extends Model
{
    use HasFactory;

    protected $fillable= [
        "nome", "data_inicio", "data_fim"
    ];

    public function livros(){
        return $this->hasMany(livro::class, 'colecao_id', 'id');
    }

    public function addLivro(livro $livro)
    {
        return $this->livros()->save($livro);
    }

    public function deletarLivros()
    {
        $this->livros->each(function ($livro) {
            $livro->delete();
        });

        return true;
    }

}
