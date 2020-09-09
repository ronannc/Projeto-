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
    public function dataTable( $query )
    {
        return datatables( $query )
            ->editColumn( 'start', function ( Workout $model ) {
                return date( 'd/m/Y', strtotime( $model[ 'start' ] ) );
            } )
            ->editColumn( 'next_workout', function ( Workout $model ) {
                return date( 'd/m/Y', strtotime( $model[ 'next_workout' ] ) );
            } )
            ->editColumn( 'actions', function ( Workout $model ) {

                return '<a class="btn btn-info" role="button" title="Visualizar" href="' . route( 'workouts.show',
                        $model ) . '"><i class="fa fa-eye"></i>Visualizar</a>' .
                    '<a class="btn btn-primary" title="Editar" href="' . route( 'workouts.edit',
                        $model ) . '"><i class="fa fa-edit">Editar</i></a>' .
                    '<a class="btn btn-primary" title="Editar Exercicio"  href="' . route( 'editExercicio',
                        $model ) . '"><i class="fa fa-edit"></i>Editar Exercicio</a>'.
                    '<a class="btn btn-danger" title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir este Exercício ?\')){document.getElementById(\'form-delete' . $model[ 'id' ] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $model[ 'id' ] . '" style="display:none" action="' . route( 'workouts.destroy',
                        $model ) . '" method="post">' .
                    csrf_field() .
                    method_field( 'DELETE' ) . '
        </form>';

            } )->escapeColumns( [ 0 ] );
    }

    /**
     * Get query source of dataTable.
     *
     * @param Workout $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query( Workout $model )
    {
        $data = $this->data;
        if ( isset( $data ) ) {
            return $data;
        }
        return $model
            ->newQuery()
            ->has( 'client' )
            ->with( [
                'client'
            ] )
            ->orderByDesc( 'created_at' );
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns( $this->getColumns() )
            ->setTableAttributes( [
                'class' => 'table table-responsive table-full-width table-bordered table-striped table-hover nowrap',
                'style' => 'width: 100%'
            ] )
            ->parameters( $this->getBuilderParameters() )->parameters( [
                'dom'        => '<"row" <"col-sm-6" l> <"col-sm-6" f>> <"row" <"col-sm-12" t>> r <"row" <"col-sm-6" i> <"col-sm-6" p>>',
                'pageLength' => 10,
                'responsive' => true,
                'scrollX'    => true,
                'language'   => [ 'url' => '/datatable/portuguese-brasil.json' ],
            ] );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'start'        => [ 'title' => 'Início' ],
            'next_workout' => [ 'title' => 'Próximo Treino' ],
            'goal'         => [ 'title' => 'Objetivo' ],
            'interval'     => [ 'title' => 'Intervalo' ],
            'frequency'    => [ 'title' => 'Frequência' ],
            'client.name'  => [ 'title' => 'Cliente' ],
            'actions'      => [
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
        return 'Workout_' . date( 'YmdHis' );
    }
}
