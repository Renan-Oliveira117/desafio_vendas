<?php

namespace App\Http\Controllers;

use App\DataTables\PessoaDatatable;
use App\Http\Requests\PessoaRequest;
use App\Pessoa;
use Illuminate\Http\Request;

use const App\GRUPOS;

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
    {   $grupo=Pessoa::GRUPOS;
        return view('pessoa.form',[
            'grupo'=>$grupo
        ]);
    }

    public function store(PessoaRequest $request)
    {
            //dd($request->all());
        try {
            Pessoa::create($request->all());
            flash('Salvo com sucesso')->success();
            return redirect()->route('pessoa.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
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

    public function listaClientes(Request $request){

        $termoPesquisa = trim($request->searchTerm);

        if (empty($termoPesquisa)){
            return Pessoa::select('id','nome as text')
                                ->where('grupo',Pessoa::CLIENTE)
                                ->limit(10)
                                ->get();
        }

        return Pessoa::select('id','nome as text')
                            ->where('grupo',Pessoa::CLIENTE)
                            ->where('nome','like','%' .$termoPesquisa.'%')
                            ->limit(10)
                            ->get();
    }
}
