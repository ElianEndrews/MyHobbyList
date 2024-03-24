<?php

namespace App\Models\Series;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colecao_serie extends Model
{
    use HasFactory;

    protected $fillable= [
        "nome", "data_inicio", "data_fim"
    ];

    public function series(){
        return $this->hasMany(serie::class, 'colecao_id', 'id');
    }

    public function addSerie(serie $serie)
    {
        return $this->series()->save($serie);
    }

    public function deletarSeries()
    {
        $this->series->each(function ($serie) {
            $serie->delete();
        });

        return true;
    }

}
