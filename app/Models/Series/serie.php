<?php

namespace App\Models\Series;
use App\Models\Series\colecao_Serie;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serie extends Model
{
    use HasFactory;

    protected $fillable= [
        "colecao_id", "nome", "numero_ordem" , "data_inicio", "data_fim"
    ];

    public function colecao() {
        return $this->belongsTo('App\Models\Series\colecao_serie');
    }


}
