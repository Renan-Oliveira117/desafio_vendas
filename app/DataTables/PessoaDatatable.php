<?php

namespace App\DataTables;

use App\Pessoa;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class PessoaDatatable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($pessoa){

                $acoes = link_to(
                    route('pessoa.edit', $pessoa),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary ']
                );

                $acoes .= FormFacade::button(
                    'Excluir',                    
                      ['class' => 
                      'btn btn-sm btn-danger',
                        'onclick' => "excluir('" . route('pessoa.destroy', $pessoa) . "')"
                      ] 

                );
                return $acoes;

            })
            ->editColumn('grupo',function($pessoa){
                return Pessoa::GRUPOS[$pessoa->grupo];
            });

        }
   
    public function query(Pessoa $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('pessoadatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->title('Acões')
                  ->exportable(false)
                  ->printable(false),
                  //->width(60)
                 // ->addClass('text-center'),
            Column::make('id'),
            Column::make('nome'),
            Column::make('telefone'),
            Column::make('email'),
            Column::make('cep'),
            Column::make('logradouro'),
            Column::make('bairro'),
            Column::make('grupo'),
            Column::make('updated_at'),
        ];
    }

    protected function filename()
    {
        return 'Pessoa_' . date('YmdHis');
    }
}
