<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\DataTables\UsersOnlineDataTable;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller
{
    protected $repository;
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
        return $dataTable->render('layouts.users.index');
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
        return $dataTable->render('layouts.users.index');
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
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->All();
        $response = $this->service->store($data);

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
     * @param User $user
     *
     * @return void
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     *
     * @return void
     */
    public function update(Request $request, User $user)
    {
        //
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

    public function getUser(Request $request)
    {
        return $request->user();
    }

    public function welcome()
    {
        return view('welcome');
    }
}
