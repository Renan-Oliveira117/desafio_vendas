<?php

namespace App\DataTables;

use App\Venda;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class VendaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($venda){
                return link_to(route('venda.show', $venda), 'VER',['class'=> 'btn btn-sm btn-primary']);
              
            })
          
            ->editColumn('pessoa_id', function ($venda){
                return $venda->pessoa->nome;
            })
            ->editColumn('created_at', function ($venda){
                return $venda->created_at->format('d/m/Y');
            });
    }

   
    public function query(Venda $model)
    {
        return $model->newQuery();
    }

    
    public function html()
    {
        return $this->builder()
                    ->setTableId('venda-table')
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
                  ->exportable(false)
                  ->printable(false)
                  ->width(60),
            Column::make('pessoa_id')->tile('Cliente'),
            Column::make('desconto')->title('Desconto'),
            Column::make('acrescimo')->title('Acréscimo'),
            Column::make('total')->title('Total'),
            Column::make('created_at')->title('Data da venda'),
           
        ];
    }

   
    protected function filename()
    {
        return 'Venda_' . date('YmdHis');
    }
}
