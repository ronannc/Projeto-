<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Auth\Authorizable;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\Contracts\RoleRepository;
use App\Services\RoleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class RoleController
 */
class RoleController extends Controller
{
    use Authorizable;

    /** @var RoleRepository */
    private $repository;

    /** @var RoleService */
    private $service;

    public function __construct(RoleRepository $roleRepository, RoleService $roleService)
    {
        $this->repository = $roleRepository;
        $this->service = $roleService;
    }

    /**
     * Exibe a lista de role cadastradas.
     *
     * @param RoleDataTable $dataTable
     *
     * @return JsonResponse|View
     */
    public function index(RoleDataTable $dataTable)
    {
        $resource = 'Listagem de roles';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Exibe um formulário para criar uma nova roles.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();

        return view('layouts.roles.create', compact('extraData'));
    }

    /**
     * Exibe um formulário para editar uma roles.
     *
     * @param string $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $model = $this->repository->findOneById($id);
        $extraData = $this->repository->getExtraData($id);

        return view('layouts.roles.edit', compact('model'), compact('extraData'));
    }

    /**
     * Atualiza uma roles.
     *
     * @param RoleUpdateRequest $request
     * @param string            $id
     *
     * @return $this
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $response = $this->service->update($request->only('permissions'), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('success', 'Atualizado com sucesso!');

        return back();
    }

    /**
     * Adiciona uma roles.
     *
     * @param RoleCreateRequest $request
     *
     * @return $this|RedirectResponse|Redirector
     */
    public function store(RoleCreateRequest $request)
    {
        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('status', 'Role adicionada com sucesso!');

        return redirect(route('roles.index'));
    }
}
