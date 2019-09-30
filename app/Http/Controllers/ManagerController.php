<?php

namespace App\Http\Controllers;

use App\DataTables\ManagerDataTable;
use App\Http\Controllers\Auth\Authorizable;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ManagerController extends Controller
{
    use Authorizable;

    /** @var UserRepository */
    private $repository;

    /** @var UserService */
    private $service;

    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

        $this->middleware('permission:list_managers');
        $this->middleware('permission:add_managers', ['only' => ['create','store']]);
        $this->middleware('permission:edit_managers', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy_managers', ['only' => ['destroy']]);
    }

    /**
     * Lista os managers de uma empresa.
     *
     * @param ManagerDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ManagerDataTable $dataTable)
    {
        $resource = 'Listagem de gerentes';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Exibe um formulário para a edição de um manager.
     *
     * @param string $id
     *
     * @return Factory|View
     */
    public function edit($id)
    {
        $model = $this->repository->with(['company'])->findOneById($id);
        $extraData = $this->repository->getExtraData($id);
        $extraData['resource'] = 'Managers';

        return view('layouts.managers.edit', compact('model'), compact('extraData'));
    }

    /**
     * Exibe um formulário para adicionar um manager.
     *
     * @return Factory|View
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();

        return view('layouts.managers.create', compact('extraData'));
    }

    /**
     * Adiciona um manager.
     *
     * @param UserCreateRequest $request
     *
     * @return $this|RedirectResponse|Redirector
     */
    public function store(UserCreateRequest $request)
    {
        $request->request->add(['role' => User::MANAGER]);

        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('success', 'Gerente adicionado com sucesso!');

        return redirect(route('managers.index'));
    }

    /**
     * Atualiza um manager.
     *
     * @param UserUpdateRequest $request
     * @param string            $id
     *
     * @return $this|RedirectResponse|Redirector
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $response = $this->service->update($request->all(), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('success', 'Gerente atualizado com sucesso!');

        return back();
    }

    public function destroy($id)
    {
        $response = $this->service->destroy($id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('success', 'Deletado com sucesso!');

        return back();
    }
}
