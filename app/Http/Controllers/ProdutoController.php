<?php

namespace App\Http\Controllers;

use App\Produto;
use App\DataTables\ProdutoDatatable;
use App\Fabricante;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    
    public function index(ProdutoDatatable $produtoDatatable)
    {
        return $produtoDatatable->render('produto.index');
       
    }


    public function create()
    {
        $fabricantes=Fabricante::all()->pluck('nome','id');
        return view ('produto.form',compact('fabricantes'));
    }

   
    public function store(Request $request)
    {
        try {
            Produto::create($request->all());
            flash('Salvo com sucesso')->success();
            return redirect()->route('produto.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            flash('Ops! Ocorreu um erro ao Salvar')->error();
            return back()->withInput();
        }  
    }

 
    public function show(Produto $produto)
    {
        //
    }

    public function edit(Produto $produto)
    {
        //
    }

 
    public function update(Request $request, Produto $produto)
    {
        //
    }

    public function destroy(Produto $produto)
    {
        //
    }
}
