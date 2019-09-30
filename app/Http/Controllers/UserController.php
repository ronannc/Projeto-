<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\DataTables\UsersOnlineDataTable;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    /** @var UserRepository */
    protected $repository;

    /** @var UserService */
    protected $service;

    /**
     * TricepsController constructor.
     *
     * @param UserRepository $repository
     * @param UserService    $service
     */
    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

        $this->middleware('permission:list_users');
        $this->middleware('permission:add_users', ['only' => ['create','store']]);
        $this->middleware('permission:edit_users', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy_users', ['only' => ['destroy']]);
    }

    /**
     * Lista os managers de uma empresa.
     *
     * @param UsersOnlineDataTable $dataTable
     *
     * @return mixed
     */
    public function online(UsersOnlineDataTable $dataTable)
    {
        $resource = 'Usuários online';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserDataTable $dataTable
     *
     * @return Response
     */
    public function index(UserDataTable $dataTable)
    {
        $resource = 'Listagem de usuários';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.users.create', compact('extraData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return Response
     */
    public function store(UserCreateRequest $request)
    {
        $request->request->add(['role' => User::ADMIN]);

        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return void
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return void
     */
    public function edit($id)
    {
        $model = $this->repository->findOneById($id);
        return view('layouts.users.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param                   $id
     *
     * @return void
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $response = $this->service->update($request->all(), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back()->withInput();
        }

        session()->flash('success', 'Atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return void
     */
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

    /**
     * Altera o status de um usuário.
     *
     * @param string $id
     *
     * @return RedirectResponse
     */
    public function changeUserStatus($id)
    {
        $response = $this->service->changeUserStatus($id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);

            return back();
        }

        session()->flash('success', 'Status do usuário alterado com sucesso.');

        return back();
    }

    public function getUser(Request $request)
    {
        return $request->user();
    }

    public function welcome()
    {
        return view('welcome');
    }
}
