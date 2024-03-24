<?php

namespace App\Models\Mangas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colecao_manga extends Model
{
    use HasFactory;

    protected $fillable= [
        "nome", "data_inicio", "data_fim"
    ];

    public function mangas(){
        return $this->hasMany(manga::class, 'colecao_id', 'id');
    }

    public function addManga(manga $manga)
    {
        return $this->mangas()->save($manga);
    }

    public function deletarMangas()
    {
        $this->mangas->each(function ($manga) {
            $manga->delete();
        });

        return true;
    }

}
