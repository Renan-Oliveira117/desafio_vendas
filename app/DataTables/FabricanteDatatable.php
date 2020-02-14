<?php

namespace App\DataTables;

use App\Fabricante;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class FabricanteDatatable extends DataTable
{
   
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($fabricante) {

                $acoes = link_to(
                    route('fabricante.edit', $fabricante),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary ']
                );

                $acoes .= FormFacade::button(
                    'Excluir',                    
                      ['class' => 
                      'btn btn-sm btn-danger',
                        'onclick' => "excluir('" . route('fabricante.destroy', $fabricante) . "')"
                      ]                                 


                );

                return $acoes;
            });
    }

    public function query(Fabricante $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('fabricantedatatable-table')
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
                //   ->width(60)
               // ->addClass('text-center'),
            Column::make('id'),
            Column::make('nome'),
            Column::make('site'),
            Column::make('created_at'),
        ];
    }

    protected function filename()
    {
        return 'Fabricante_' . date('YmdHis');
    }
}


// buton

// $action = '<a href="' . route('fabricante.edit', $fabricante->id) . '" type="button" class="btn btn-sm btn-primary">Editar</a>';
              //  $action .= ' <a type="button" class="btn btn-sm btn-danger">Excluir</a>';
              //  return $action;
