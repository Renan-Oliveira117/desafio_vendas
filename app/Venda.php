<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Venda extends Model
{
    protected $guarded = [];

    const A_VISTA = 0;
    const CREDIARIO = 1;

    const FORMAS_PAGAMENTO = [
        self::A_VISTA =>'Á Vista',
        self::CREDIARIO=>'Crediário'
    ];

    public function itensVenda(){

        return $this->hasMany(ItemVenda::class);
    }

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}


