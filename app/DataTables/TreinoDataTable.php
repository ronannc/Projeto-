<?php

namespace App\DataTables;

use App\Models\Treino;
use Yajra\DataTables\Services\DataTable;

class TreinoDataTable extends DataTable
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
            ->editColumn('acoes', function (Treino $treino){

                return '<a title="Editar"  style="color: #000000" href="' . route('treino.edit', $treino) . '"><i class="fa fa-edit"></i></a>'.
                        '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir este Exercicio ?\')){document.getElementById(\'form-delete'.$treino['id'].'\').submit();}">Excluir</a>
        <form id="form-delete'.$treino['id'].'" style="display:none" action="'.route('treino.destroy', $treino).'" method="post">'.
            csrf_field().
            method_field('DELETE').'
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Treino $model)
    {
        return $model->newQuery()->select(
            'id',
            'inicio',
            'descricao',
            'objetivo',
            'intervalo',
            'metodo'
        );
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
            ->setTableAttributes([
                'class' => 'table table-full-width table-bordered table-striped dataTable table-hover',
            ])
            ->parameters($this->getBuilderParameters())->parameters([
                'dom' => '<"row" <"col-sm-6" l> <"col-sm-6" f>> <"row" <"col-sm-12" t>> r <"row" <"col-sm-6" i> <"col-sm-6" p>>',
                'responsive' => true,
                'pageLength' => 10,
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
            'inicio',
            'descricao',
            'objetivo',
            'intervalo',
            'metodo',
            'acoes'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Treino_' . date('YmdHis');
    }
}
