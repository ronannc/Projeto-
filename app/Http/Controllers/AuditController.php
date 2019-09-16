<?php

namespace App\Http\Controllers;

use App\DataTables\AuditsDataTable;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AuditsDataTable $dataTable
     *
     * @return JsonResponse|View
     */
    public function index(AuditsDataTable $dataTable)
    {
        return $dataTable->render('layouts.audits.index');
    }
}
