<?php

namespace App\Models\Mangas;
use App\Models\Mangas\colecao_manga;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manga extends Model
{
    use HasFactory;

    protected $fillable= [
        "colecao_id", "nome", "numero_ordem" , "data_inicio", "data_fim"
    ];

    public function colecao() {
        return $this->belongsTo('App\Models\Mangas\colecao_manga');
    }


}
