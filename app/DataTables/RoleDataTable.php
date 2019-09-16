<?php

namespace App\DataTables;

use App\Models\Role;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
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
            ->editColumn('created_at', function (Role $model) {
                return date('d/m/Y H:i:s', strtotime($model->created_at));
            })
            ->editColumn('updated_at', function (Role $model) {
                return date('d/m/Y H:i:s', strtotime($model->updated_at));
            })
            ->editColumn('actions', function (Role $back) {

                return '<a title="Editar"  style="color: #000000" href="' . route('back.edit',
                        $back) . '"><i class="fa fa-edit"></i></a>' .
                    '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir este Exercicio ?\')){document.getElementById(\'form-delete' . $back['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $back['id'] . '" style="display:none" action="' . route('back.destroy',
                        $back) . '" method="post">' .
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
        $query = Role::query();

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
                'class' => 'table table-full-width table-bordered table-striped dataTable table-hover',
            ])
            ->parameters($this->getBuilderParameters())->parameters([
                'dom'        => '<"row" <"col-sm-6" l> <"col-sm-6" f>> <"row" <"col-sm-12" t>> r <"row" <"col-sm-6" i> <"col-sm-6" p>>',
                'responsive' => true,
                'pageLength' => 10,
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
            'created_at' => ['title' => 'Adicionado'],
            'actions'    => [
                'title'      => 'Ações',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => false,
                'exportable' => false,
            ],
            'name'       => ['title' => 'Nome'],
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
        return 'roles_' . date('YmdHis');
    }
}
