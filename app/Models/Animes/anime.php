<?php

namespace App\Models\Animes;
use App\Models\Animes\colecao_anime;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anime extends Model
{
    use HasFactory;

    protected $fillable= [
        "colecao_id", "nome", "numero_ordem", "data_inicio", "data_fim"
    ];

    public function colecao() {
        return $this->belongsTo('App\Models\Animes\colecao_anime');
    }
}
