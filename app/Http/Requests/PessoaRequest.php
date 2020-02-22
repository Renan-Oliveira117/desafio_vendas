<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

  
    public function rules()
    {
        return [
            'nome'=>'required',
            'telefone'=>'required',
            'cpf' => 'required|cpf'
        ];
    }
}
