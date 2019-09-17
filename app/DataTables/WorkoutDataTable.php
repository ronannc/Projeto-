<?php

namespace App\DataTables;

use App\Models\Workout;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class WorkoutDataTable extends DataTable
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
            ->editColumn('actions', function (Workout $Workout) {

                return '<a title="Visualizar"  style="color: #000000" href="' . route('workout.show',
                        $Workout) . '"><i class="fa fa-eye"></i></a>' .
                    '<a title="Editar"  style="color: #000000" href="' . route('workout.edit',
                        $Workout) . '"><i class="fa fa-edit"></i></a>' .
                    '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir este Exercicio ?\')){document.getElementById(\'form-delete' . $Workout['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $Workout['id'] . '" style="display:none" action="' . route('workout.destroy',
                        $Workout) . '" method="post">' .
                    csrf_field() .
                    method_field('DELETE') . '
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Workout $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Workout $model)
    {
        return $model->newQuery();
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
            'id',
            'start',
            'next_workout',
            'goal',
            'interval',
            'frequency',
            'method_id',
            'client_id',
            'actions' => [
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
        return 'Workout_' . date('YmdHis');
    }
}
