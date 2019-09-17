<?php

namespace App\DataTables;

use OwenIt\Auditing\Models\Audit;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class AuditsDataTable extends DataTable
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
            ->editColumn('user_id', function (Audit $model) {
                return $model->user->name ?? '';
            })
            ->editColumn('old_values', function (Audit $model) {
                $beautified = '<ul>';

                foreach ($model->old_values as $key => $value) {
                    if (is_array($value)) {
                        foreach ($value as $k => $v) {
                            $beautified .= '<li><b>' . $k . ':</b> ' . $v;
                        }
                    } elseif (!$value instanceof \stdClass) {
                        $beautified .= '<li><b>' . $key . ':</b> ' . $value;
                    }
                }

                $beautified .= '</ul>';

                return $beautified;
            })->editColumn('new_values', function (Audit $model) {
                $beautified = '<ul>';

                foreach ($model->new_values as $key => $value) {

                    if (is_array($value)) {
                        foreach ($value as $k => $v) {
                            $beautified .= '<li><b>' . $k . ':</b> ' . $v;
                        }
                    } elseif (!$value instanceof \stdClass) {
                        $beautified .= '<li><b>' . $key . ':</b> ' . $value;
                    }
                }

                $beautified .= '</ul>';

                return $beautified;
            })
            ->editColumn('created_at', function (Audit $model) {
                return date('d/m/Y H:i:s', strtotime($model->created_at));
            })
            ->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Audit $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Audit $model)
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
            'created_at'     => ['title' => 'Data'],
            'user_id'        => [
                'title'      => 'Usuário',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'event'          => [
                'title'      => 'Evento',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'auditable_type' => [
                'title'      => 'Model',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'url',
            'old_values'     => [
                'title'      => 'Antes',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'new_values'     => [
                'title'      => 'Depois',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'ip_address',
            'user_agent',
            'id'             => [
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
        return 'Audit_' . date('YmdHis');
    }
}
