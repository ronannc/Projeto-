<?php

namespace App\DataTables;

use App\Models\Goal;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class GoalDataTable extends DataTable
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
            ->editColumn('actions', function (Goal $model) {

                return '<a title="Editar"  style="color: #000000" href="' . route('goals.edit',
                        $model) . '"><i class="fa fa-edit"></i></a>' .
                    '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir o objetivo ?\')){document.getElementById(\'form-delete' . $model['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $model['id'] . '" style="display:none" action="' . route('goals.destroy',
                        $model) . '" method="post">' .
                    csrf_field() .
                    method_field('DELETE') . '
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Goal $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Goal $model)
    {
        return $model
            ->newQuery()
            ->orderByDesc('created_at');
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
            'description' => ['title' => 'Descrição'],
            'name'        => ['title' => 'Nome'],
            'actions'     => [
                'title'      => 'Ações',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => false,
                'exportable' => false,
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
        return 'Goal_' . date('YmdHis');
    }
}
