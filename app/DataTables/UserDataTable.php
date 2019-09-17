<?php

namespace App\DataTables;

use App\Models\Back;
use App\Models\User;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->editColumn('client', function ($query) {
                if (is_null($query['client_id'])) {
                    return '-';
                } else {
                    return $query->client->name;
                }
            })
            ->editColumn('company', function ($query) {
                if (is_null($query['company_id'])) {
                    return '-';
                } else {
                    return $query->company->name;
                }
            })
            ->editColumn('is_active', function (User $model) {
                return $model->is_active ? 'Ativo' : 'Inativo';
            })
            ->editColumn('actions', function (User $user) {

                return '<a title="Editar"  style="color: #000000" href="' . route('user.edit',
                        $user) . '"><i class="fa fa-edit"></i></a>' .
                    '<a title="Deletar" href=""
           onclick="event.preventDefault();if(confirm(\'Deseja realmente excluir este usuario ?\')){document.getElementById(\'form-delete' . $user['id'] . '\').submit();}">Excluir</a>
        <form id="form-delete' . $user['id'] . '" style="display:none" action="' . route('user.destroy',
                        $user) . '" method="post">' .
                    csrf_field() .
                    method_field('DELETE') . '
        </form>';

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
        return User::with('client')->with('company');
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
            'id',
            'is_active' => [
                'title' => 'Situação',
            ],
            'name',
            'email',
            'client',
            'company',
            'actions'   => [
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
        return 'User_' . date('YmdHis');
    }
}
