<?php

namespace App\Models\Animes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colecao_anime extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome", "data_inicio", "data_fim"
    ];

    public function animes(){
        return $this->hasMany(anime::class, 'colecao_id', 'id');
    }

    public function addAnime(anime $anime)
    {
        return $this->animes()->save($anime);
    }

    public function deletarAnimes()
    {
        $this->animes()->each(function ($anime){
            $anime->delete();
        });

        return true;
    }
}
