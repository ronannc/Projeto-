<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
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
            ->editColumn('actions', function (Company $company) {

                return '<a title="Editar"  style="color: #000000" href="' . route('company.edit',
                        $company) . '"><i class="fa fa-edit"></i></a>' .
                    '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir esta Empresa ?\')){document.getElementById(\'form-delete' . $company['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $company['id'] . '" style="display:none" action="' . route('company.destroy',
                        $company) . '" method="post">' .
                    csrf_field() .
                    method_field('DELETE') . '
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Company $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Company $model)
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
            'id'           => ['title' => 'ID'],
            'name'         => ['title' => 'Nome'],
            'cnpj'         => ['title' => 'CNPJ'],
            'phone'        => ['title' => 'Telefone'],
            'street'       => ['title' => 'Rua'],
            'neighborhood' => ['title' => 'Bairro'],
            'number'       => ['title' => 'Número'],
            'complement'   => ['title' => 'Complemento'],
            'zipcode'      => ['title' => 'CEP'],
            'city_id'      => ['title' => 'Cidade'],
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
        return 'Company_' . date('YmdHis');
    }
}
