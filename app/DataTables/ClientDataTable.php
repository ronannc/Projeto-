<?php

namespace App\DataTables;

use App\Models\Client;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class ClientDataTable extends DataTable
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
            ->editColumn('is_active', function (Client $model) {
                return $model->is_active ? 'Ativo' : 'Inativo';
            })
            ->editColumn('birthday', function (Client $model) {
                //TODO: Realizar ordenação dessa coluna
                return date('d/m/Y', strtotime($model->birthday));
            })
            ->editColumn('actions', function (Client $client) {

                return '<a title="Visualisar"  style="color: #000000" href="' . route('clients.show', $client) . '"><i class="fa  fa-eye"></i></a>
                        <a title="Editar"  style="color: #000000" href="' . route('clients.edit', $client) . '"><i class="fa fa-edit"></i></a>
                        <a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir este Exercicio ?\')){document.getElementById(\'form-delete' . $client['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $client['id'] . '" style="display:none" action="' . route('clients.destroy',
                        $client) . '" method="post">' .
                    csrf_field() .
                    method_field('DELETE') . '
        </form>';

            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Client $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Client $model)
    {
        return $model->newQuery()->with('city', 'company');
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
                'dom' => '<"row" <"col-sm-6" l> <"col-sm-6" f>> <"row" <"col-sm-12" t>> r <"row" <"col-sm-6" i> <"col-sm-6" p>>',
                'pageLength' => 10,
                'responsive' => true,
                'scrollX' => true,
                'language' => ['url' => '/datatable/portuguese-brasil.json'],
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
            'name' => ['title' => 'Nome'],
            'actions' => [
                'title' => 'Ações',
                'orderable' => false,
                'searchable' => false,
                'printable' => false,
                'exportable' => false,
            ],
            'email' => ['title' => 'Email'],
            'is_active' => ['title' => 'Situação'],
            'sex' => ['title' => 'Sexo'],
            'blood_type' => ['title' => 'Tipo Sanguíneo'],
            'cpf' => ['title' => 'CPF'],
            'phone' => ['title' => 'Telefone'],
            'birthday' => ['title' => 'Nascimento'],
            'street' => ['title' => 'Rua'],
            'neighborhood' => ['title' => 'Email'],
            'number' => ['title' => 'Número'],
            'complement' => ['title' => 'Complemento'],
            'zipcode' => ['title' => 'Código Postal'],
            'city.name' => ['title' => 'Cidade'],
            'company.name' => ['title' => 'Empresa'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Client_' . date('YmdHis');
    }
}
