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
    private $userRepository;

    /** @var UserService */
    private $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
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
        return $dataTable->render('layouts.managers.index');
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
        // todo: modificar
        $model = $this->userRepository->with(['contacts'])->findOneById($id);
        $extraData = $this->userRepository->getExtraData($id);
        $extraData['resource'] = 'Managers';

        return view('layouts.users.edit', compact('model'), compact('extraData'));
    }

    /**
     * Exibe um formulário para adicionar um manager.
     *
     * @return Factory|View
     */
    public function create()
    {
        // todo: modificar
        $extraData = $this->userRepository->getExtraData();

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
        // todo: modificar
        $request->request->add(['role' => User::MANAGER]);

        $response = $this->userService->store($request->all());

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
        // todo: modificar
        $response = $this->userService->update($request->except('company_id'), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('success', 'Gerente atualizado com sucesso!');

        return back();
    }
}
