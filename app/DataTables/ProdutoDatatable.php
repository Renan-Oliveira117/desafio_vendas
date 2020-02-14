<?php

namespace App\DataTables;

use App\Produto;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ProdutoDatatable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($produto){
                    
                $acoes = link_to(
                    route('produto.edit', $produto),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary ']
                );

                $acoes .= FormFacade::button(
                    'Excluir',                    
                      ['class' => 
                      'btn btn-sm btn-danger',
                        'onclick' => "excluir('" . route('produto.destroy', $produto) . "')"
                      ]
                );
                return $acoes;

            });
    }

  
    public function query(Produto $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('produtodatatable-table')
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
                  ->title('Ações')
                  ->exportable(false)
                  ->printable(false),
                 // ->width(60)
                 //->addClass('text-center'),
            Column::make('id'),
            Column::make('Descrição'),
            Column::make('Quantidade em estoque'),
            Column::make('Preço do Produto'),
            Column::make('Preço de Venda'),
            Column::make('Unidade de medida'),
            Column::make('Fabricante'),
            Column::make('created_at'),
            
        ];
    }

  
    protected function filename()
    {
        return 'Produto_' . date('YmdHis');
    }
}
