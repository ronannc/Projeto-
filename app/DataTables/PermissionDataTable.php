<?php

namespace App\DataTables;

use App\Models\Permission;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class PermissionDataTable extends DataTable
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
        return datatables($query)
            ->editColumn('created_at', function (Permission $model) {
                return date('d/m/Y H:i:s', strtotime($model->created_at));
            })
            ->editColumn('updated_at', function (Permission $model) {
                return date('d/m/Y H:i:s', strtotime($model->updated_at));
            })
            ->editColumn('actions', function (Permission $model) {

                return '<a title="Editar"  style="color: #000000" href="' . route('permissions.edit',
                        $model) . '"><i class="fa fa-edit"></i></a>' .
                    '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir esta Permissao ?\')){document.getElementById(\'form-delete' . $model['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $model['id'] . '" style="display:none" action="' . route('permissions.destroy',
                        $model) . '" method="post">' .
                    csrf_field() .
                    method_field('DELETE') . '
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Permission::query()
            ->orderByDesc('created_at');

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
                'language'   => ['url' => '/datatable/portuguese-brasil.json'],
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
            'created_at' => ['title' => 'Adicionado'],
            'actions'    => [
                'title'      => 'Ações',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => false,
                'exportable' => false,
            ],
            'name'       => ['title' => 'Nome'],
            'guard_name'       => ['title' => 'Guard Name'],
            'updated_at' => ['title' => 'Atualizado'],
            'id'         => [
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
        return 'Permissions_' . date('YmdHis');
    }
}
