<?php

namespace App\DataTables;

use App\Models\Element;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ElementsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action',function($query){

            $edit = "<a href='".route('element.edit',$query->id)."' class='btn btn-inverse-primary m-2'><i class='bi bi-pen-fill'></i></a>";
            $delete = "<a href='".route('element.delete',$query->id)."' id='delete'  class='btn btn-inverse-danger  m-2 '><i class='bi bi-trash-fill'></i></a>";
            return $edit.$delete;
        })
         ->addColumn('image_url',function($query){
                return '<img width="150px" src="'.asset($query->image_url).'">';
               })
         ->addColumn('description',function($query){
        return strlen($query->description) > 50 ? substr($query->description, 0, 50) . '...' : $query->description;

         })
        ->rawColumns(['image_url','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Element $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('elements-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            column::make('image_url'),
            Column::make('name'),
            Column::make('symbol'),
            Column::make('atomic_number'),
            Column::make('description'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),


        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Elements_' . date('YmdHis');
    }
}
