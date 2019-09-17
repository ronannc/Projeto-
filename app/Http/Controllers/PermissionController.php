<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionDataTable;
use App\Http\Controllers\Auth\Authorizable;
use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Contracts\PermissionRepository;
use App\Services\PermissionService;

/**
 * Class PermissionController
 */
class PermissionController extends Controller
{
    use Authorizable;

    /** @var PermissionRepository */
    private $permissionRepository;

    /** @var PermissionService */
    private $permissionService;

    public function __construct(PermissionRepository $permissionRepository, PermissionService $permissionService)
    {
        $this->permissionRepository = $permissionRepository;
        $this->permissionService = $permissionService;
    }

    /**
     * Exibe a lista de permissions cadastradas.
     *
     * @param PermissionDataTable $dataTable
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(PermissionDataTable $dataTable)
    {
        return $dataTable->render('layouts.permission.index');

    }

    /**
     * Exibe um formulário para criar uma nova permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.permissions.create');
    }

    /**
     * Exibe um formulário para editar uma permission.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->findOneById($id);

        return view('layouts.permissions.edit', compact('permission'));
    }

    /**
     * Atualiza uma permission.
     *
     * @param PermissionUpdateRequest $request
     * @param string                  $id
     *
     * @return $this
     */
    public function update(PermissionUpdateRequest $request, $id)
    {
        $response = $this->permissionService->update($request->all(), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('status', 'Permission atualizada com sucesso!');

        return back();
    }

    /**
     * Adiciona uma permission.
     *
     * @param PermissionCreateRequest $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PermissionCreateRequest $request)
    {
        $reponse = $this->permissionService->store($request->all());

        if (!empty($reponse['error'])) {
            session()->flash('error', $reponse['message']);

            return back()->withInput();
        }

        session()->flash('status', 'Permission adicionada com sucesso!');

        return redirect(route('permissions.index'));
    }
}
