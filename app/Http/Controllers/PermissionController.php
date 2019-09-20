<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionDataTable;
use App\Http\Controllers\Auth\Authorizable;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Contracts\PermissionRepository;
use App\Services\PermissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class PermissionController
 */
class PermissionController extends Controller
{
    use Authorizable;

    /** @var PermissionRepository */
    private $repository;

    /** @var PermissionService */
    private $service;

    public function __construct(PermissionRepository $repository, PermissionService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Exibe a lista de permissions cadastradas.
     *
     * @param PermissionDataTable $dataTable
     *
     * @return JsonResponse|View
     */
    public function index(PermissionDataTable $dataTable)
    {
        $resource = 'Listagem de permissões';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Exibe um formulário para criar uma nova permissions.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.permissions.create');
    }

    /**
     * Exibe um formulário para editar uma permissions.
     *
     * @param string $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $model = $this->repository->findOneById($id);
        return view('layouts.permissions.edit', compact('model'));
    }

    /**
     * Atualiza uma permissions.
     *
     * @param PermissionUpdateRequest $request
     * @param string                  $id
     *
     * @return $this
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $response = $this->service->update($request->all(), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('status', 'Permission atualizada com sucesso!');

        return back();
    }

    /**
     * Adiciona uma permissions.
     *
     * @param PermissionCreateRequest $request
     *
     * @return $this|RedirectResponse|Redirector
     */
    public function store(PermissionCreateRequest $request)
    {
        $reponse = $this->service->store($request->all());

        if (!empty($reponse['error'])) {
            session()->flash('error', $reponse['message']);

            return back()->withInput();
        }

        session()->flash('status', 'Permission adicionada com sucesso!');

        return redirect(route('permissions.index'));
    }
}
