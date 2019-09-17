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
    private $roleRepository;

    /** @var RoleService */
    private $roleService;

    public function __construct(RoleRepository $roleRepository, RoleService $roleService)
    {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
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
        return $dataTable->render('layouts.role.index');
    }

    /**
     * Exibe um formulário para criar uma nova role.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->roleRepository->getExtraData();

        return view('layouts.role.create', compact('extraData'));
    }

    /**
     * Exibe um formulário para editar uma role.
     *
     * @param string $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->roleRepository->findOneById($id);
        $extraData = $this->roleRepository->getExtraData($id);

        return view('layouts.role.edit', compact('data'), compact('extraData'));
    }

    /**
     * Atualiza uma role.
     *
     * @param RoleUpdateRequest $request
     * @param string            $id
     *
     * @return $this
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        $response = $this->roleService->update($request->only('permissions'), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('success', 'Atualizado com sucesso!');

        return back();
    }

    /**
     * Adiciona uma role.
     *
     * @param RoleCreateRequest $request
     *
     * @return $this|RedirectResponse|Redirector
     */
    public function store(RoleCreateRequest $request)
    {
        $response = $this->roleService->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('status', 'Role adicionada com sucesso!');

        return redirect(route('role.index'));
    }
}
