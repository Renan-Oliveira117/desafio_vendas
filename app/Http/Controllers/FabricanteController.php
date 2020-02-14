<?php

namespace App\Http\Controllers;

use App\DataTables\FabricanteDatatable;
use App\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    
    public function index(FabricanteDatatable $fabricanteDatatable)
    {
        // return view('fabricante.index');
        return $fabricanteDatatable->render('fabricante.index');
    }

   
    public function create()
    {
        return view('fabricante.form');
    }

 
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            Fabricante::create($request->all());
            flash('Salvo com sucesso')->success();
            return redirect()->route('fabricante.index');
        } catch (\Throwable $th) {
            flash('Ops! Ocorreu um erro ao Salvar')->error();
            return back()->withInput();
        }
    }
    public function show(Fabricante $fabricante)
    {
        //
    }
    public function edit($id)
    {
        try {
            return view('fabricante.form', [
                'fabricante' => Fabricante::findOrFail($id)
             ]);
             dd($id);
        } catch (\Throwable $th) {
            flash('Ops! Ocorreu um erro ao selecionar')->error();
            return redirect()->route('fabricante.index');
        }
     
    }

    public function update(Request $request, $id) 
    {
        try{
            Fabricante::find($id)->update($request->all());
            flash('Atualizado com Sucesso')->success();
            return redirect()->route('fabricante.index');
        }catch(\throwable $th){
            flash('Ops ! Ocorreu um erro ao atualizar')->error();
            return back()->withInput();
        }

    }
    public function destroy($id)
    {
        try{
            Fabricante::find($id)->delete();
        }catch(\Throwable $th){
            abort(403,'Erro ao excluir');
        }
    }
}
