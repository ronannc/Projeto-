<?php

namespace App\DataTables;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class NotificationDataTable extends DataTable
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
        return (new EloquentDataTable($this->query()))
            ->editColumn('type', function (Notification $model) {
                return $model->type;
            })->editColumn('data', function (Notification $model) {

                return json_decode($model->data)->message;
            })->editColumn('read_at', function (Notification $model) {
                if (empty($model->read_at)) {
                    $id = $model->getOriginal('id');

                    return '<a title="Marcar como lida"  style="color: #000000" href="' . route('visualize',
                            $id) . '"><i class="fa fa-eye-dropper"></i></a>';
                }

                return date('d/m/Y H:i:s', strtotime($model->read_at));
            })->escapeColumns([0]);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $query = Notification::query()
            ->where('notifiable_id', Auth::user()->id)
            ->orderByDesc('created_at');

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
                'class' => 'table table-responsive table-full-width table-bordered table-striped table-hover nowrap',
                'style' => 'width: 100%'
            ])
            ->parameters($this->getBuilderParameters())->parameters([
                'dom'        => '<"row" <"col-sm-6" l> <"col-sm-6" f>> <"row" <"col-sm-12" t>> r <"row" <"col-sm-6" i> <"col-sm-6" p>>',
                'pageLength' => 10,
                'responsive' => true,
                'scrollX'    => true,
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
            'created_at' => ['title' => 'Adicionado'],
            'read_at'    => [
                'title'      => 'Lido',
                'style'      => 'white-space: nowrap',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'type'       => [
                'title'      => 'Tipo',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
            'data'       => [
                'title'      => 'Mensagem',
                'orderable'  => false,
                'searchable' => false,
                'printable'  => true,
                'exportable' => true,
            ],
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
        return 'Back_' . date('YmdHis');
    }
}
