<?php

namespace App\DataTables;

use App\Models\PhysicalAssessment;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class PhysicalAssessmentDataTable extends DataTable
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
            ->editColumn('actions', function (PhysicalAssessment $physicalAssessment) {

                return '<a title="Editar"  style="color: #000000" href="' . route('physical-assessment.edit',
                        $physicalAssessment) . '"><i class="fa fa-edit"></i></a>' .
                        '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir esta Avalicao Fisica ?\')){document.getElementById(\'form-delete'.$physicalAssessment['id'].'\').submit();}">Excluir</a>
        <form id="form-delete' . $physicalAssessment['id'] . '" style="display:none" action="' . route('physical-assessment.destroy',
                        $physicalAssessment) . '" method="post">' .
            csrf_field().
            method_field('DELETE').'
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param PhysicalAssessment $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PhysicalAssessment $model)
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
            'neck' => ['title' => 'Pescoço'],
            'shoulder' => ['title' => 'Ombros'],
            'chest' => ['title' => 'Peitoral'],
            'right_arm' => ['title' => 'Braço Dir.'],
            'left_arm' => ['title' => 'Braço Esq.'],
            'right_forearm' => ['title' => 'Antebraço Dir.'],
            'left_forearm' => ['title' => 'Antebraço Esq.'],
            'waist' => ['title' => 'Cintura'],
            'abdomen' => ['title' => 'Abdomem'],
            'hip' => ['title' => 'Quadril'],
            'right_thigh' => ['title' => 'Coxa Dir.'],
            'left_thigh' => ['title' => 'Coxa Esq.'],
            'right_calf' => ['title' => 'Panturrilha Dir.'],
            'left_calf' => ['title' => 'Panturrilha Esq.'],
            'weight' => ['title' => 'Peso'],
            'height' => ['title' => 'Altura'],
            'blood_pressure' => ['title' => 'Pressão Sanguínea'],
            'client_id' => ['title' => 'Cliente'],
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
        return 'PhysicalAssessment_' . date('YmdHis');
    }
}
