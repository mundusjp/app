<?php

namespace App\DataTables;

use App\Inventory;
use Yajra\DataTables\Services\DataTable;

class InventoriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'inventories.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Inventory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Inventory $model)
    {
        return $model->newQuery()->select('id', 'inventory','user_id','category_id','amount','status_id', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'user_id',
            'inventory',
            'category_id',
            'amount',
            'status_id',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Inventories_' . date('YmdHis');
    }
}
