<?php

namespace App\Http\Controllers;

use App\DataTables\PessoaDatatable;
use App\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PessoaDatatable $pessoaDatatable)
    {
        //return view('pessoa.index');
        return $pessoaDatatable->render('pessoa.index');
    }

    public function create()
    {
        return view('pessoa.form');
    }

    public function store(Request $request)
    {
        try {
            Pessoa::create($request->all());
            flash('Salvo com sucesso')->success();
            return redirect()->route('pessoa.index');
        } catch (\Throwable $th) {
            flash('Ops! Ocorreu um erro ao Salvar')->error();
            return back()->withInput();
        }
    }

    public function show(Pessoa $pessoa)
    {
        //
    }

    public function edit($id)
    {
        try {
            return view('pessoa.form', [
                'pessoa' => Pessoa::findOrFail($id)
             ]);
             dd($id);
        } catch (\Throwable $th) {
            flash('Ops! Ocorreu um erro ao selecionar')->error();
            return redirect()->route('pessoa.index');
        }
    }

    public function update(Request $request, $id)
    {
        try{
            Pessoa::find($id)->update($request->all());
            flash('Atualizado com Sucesso')->success();
            return redirect()->route('pessoa.index');
        }catch(\throwable $th){
            flash('Ops ! Ocorreu um erro ao atualizar')->error();
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try{
            Pessoa::find($id)->delete();
        }catch(\Throwable $th){
            abort(403,'Erro ao excluir');
        }
    }
}
