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
    
    const UNIDADE_MEDIDAS = [
        Self::UN =>'Unidade',
        self::KG=>'Kilo',
        Self::CX=>'Caixa'

    ];
}
