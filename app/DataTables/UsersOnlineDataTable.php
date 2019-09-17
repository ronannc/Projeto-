<?php

namespace App\DataTables;

use App\Models\Back;
use App\Models\User;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class UsersOnlineDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return (new EloquentDataTable($this->query()))
            ->editColumn('is_active', function (User $model) {
                return $model->is_active;
            })->editColumn('email', function (User $model) {
                return $model->email;
            })->filterColumn('last_access', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(last_access,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%d/%m/%d') like ?", ["%$keyword%"]);
            })->editColumn('last_access', function (User $model) {
                return $model->last_access ? date('d/m/Y H:i:s', strtotime($model->last_access)) : '';
            })->editColumn('created_at', function (User $model) {
                return date('d/m/Y H:i:s', strtotime($model->created_at));
            })->editColumn('updated_at', function (User $model) {
                return date('d/m/Y H:i:s', strtotime($model->updated_at));
            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Back $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $usersOnline = (new User)->allOnline();

        $usersIds = [];

        foreach ($usersOnline as $userOnline) {
            $usersIds[] = $userOnline->id;
        }

        $query = User::query()
            ->whereIn('id', $usersIds);

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->setTableAttributes([
                'class' => 'table table-responsive table-full-width table-bordered table-striped table-hover nowrap',
                'style' => 'width: 100%'
            ])
            ->parameters($this->getBuilderParameters())->parameters([
                'dom'        => '<"row" <"col-sm-6" l> <"col-sm-6" f>> <"row" <"col-sm-12" t>> r <"row" <"col-sm-6" i> <"col-sm-6" p>>',
                'pageLength' => 10,
                'responsive' => true,
                'scrollX' => true,
                'language'   => ['url' => 'datatable/portuguese-brasil.json'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'email'       => ['title' => 'Email'],
            'name'        => ['title' => 'Nome'],
            'is_active'   => [
                'title'      => 'Status',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'created_at'  => ['title' => 'Adicionado'],
            'updated_at'  => ['title' => 'Atualizado'],
            'last_access' => [
                'title'      => 'Último acesso',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'id'          => [
                'title'      => 'Id',
                'orderable'  => false,
                'searchable' => true,
                'printable'  => true,
                'exportable' => true,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
