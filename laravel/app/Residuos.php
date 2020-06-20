<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Residuos extends Model
{
    protected $connection = "mongodb";
    protected $fillable = ['planilha', 'status', 'nome', 'tipo', 'categoria', 'tecnologia_tratamento', 'classe', 'unidade_medida', 'peso'];
    protected $dates = ['deleted_at'];
}
