<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\EducationalDetail;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('id', function($row) {
            //     $index = 1;
            //     return $index;
            // })
            ->addColumn('phone', function($row) {
                $userdetail = $row->userDetail->phone;
                // $userdetail = UserDetail::select('phone')->where('user_id', $row->id )->pluck('phone')->toArray();
                return $userdetail;
            })
            ->addColumn('address', function($row) {
                $userdetail = $row->userDetail->address;
                // $userdetail = UserDetail::select('address')->where('user_id', $row->id )->pluck('address')->toArray();
                return $userdetail;
            })
            ->addColumn('pincode', function($row) {
                $userdetail = $row->userDetail->pincode;
                // $userdetail = UserDetail::select('pincode')->where('user_id', $row->id )->pluck('pincode')->toArray();
                return $userdetail;
            })
            ->addColumn('program', function($row) {
                $educationaldetail = $row->educationalDetail->program;
                // $educationaldetail = EducationalDetail::select('program')->where('user_id', $row->id )->pluck('program')->toArray();
                return $educationaldetail;
            })
            ->formatColumn(['created_at', 'updated_at'], DateFormatter::class)
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        // Button::make('pdf'),
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
            // Column::make(__('ID')),
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::formatted('created_at'),
            Column::formatted('updated_at'),
            Column::computed('phone'),
            Column::computed('address'),
            Column::computed('pincode'),
            Column::computed('program'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
