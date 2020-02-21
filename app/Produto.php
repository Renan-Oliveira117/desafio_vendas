<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Produto extends Model
{
    protected $guarded = [];

    const UN = 0;
    const KG = 1;
    const CX = 2;
    
    const UNIDADES_MEDIDAS = [
        Self::UN =>'Unidade',
        Self::KG =>'Kilo',
        Self::CX=>'Caixa'

    ];
}
