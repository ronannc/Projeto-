<?php

namespace App\Http\Controllers;

use App\DataTables\ClientDataTable;
use App\DataTables\WorkoutDataTable;
use App\Models\Client;
use App\Models\User;
use App\Repositories\Contracts\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * ClientController constructor.
     *
     * @param ClientRepository $repository
     * @param ClientService    $service
     */
    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ClientDataTable $dataTable
     *
     * @return Response
     */
    public function index(ClientDataTable $dataTable)
    {
        if (User::isClient() && User::Client()->first() != null) {
            $Client = User::Client()->first();

            return redirect(route('client.edit', $Client));
        }
        return $dataTable->render('layouts.client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.client.create');
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
        $data = $request->all();
        $response = $this->service->store($data);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        if (isset($data['formula'])) {
            $configuracaoClient['formula'] = 1;
        } else {
            $configuracaoClient['formula'] = 0;
        }
        $configuracaoClient['porcentagem'] = $data['porcentagem'];
        $configuracaoClient['id_Client'] = $response['id'];

        $responseConfiguracaoClient = $this->service->storeConfiguracaoClient($configuracaoClient);

        if (!empty($responseConfiguracaoClient['error'])) {
            session()->flash('error', $responseConfiguracaoClient['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('client.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Client           $client
     * @param WorkoutDataTable $dataTable
     *
     * @return Response
     */
    public function show(Client $client, WorkoutDataTable $dataTable)
    {
        $workout = $client->workout();
        return $dataTable->with('data', $workout)->render('layouts.client.show', compact('workout'), compact('client'));
    }

    public function myAccount(WorkoutDataTable $dataTable)
    {
        $client = User::Client()->first();
        $workout = $client->workout();
        return $dataTable->with('data', $workout)->render('layouts.client.show', compact('workout'), compact('client'));
    }

    public function editMyAccount(WorkoutDataTable $dataTable)
    {
        $extraData = User::Client()->first();
        return view('layouts.client.editClient', compact('extraData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $extraData = Client::find($id);
        $clientSettings = $extraData->configuracao();
        $extraData['configuracao'] = $extraData->configuracao();
        $extraData['formula'] = $clientSettings['formula'] == 1 ? 'checked' : '';
        $extraData['porcentagem'] = $clientSettings['porcentagem'];
        return view('layouts.client.edit', compact('extraData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client  $client
     *
     * @return Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->all();
        $response = $this->service->update($data, $client);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        if (!isset($data['Client'])) {
            if (isset($data['formula'])) {
                $configuracaoClient['formula'] = 1;
            } else {
                $configuracaoClient['formula'] = 0;
            }
            $configuracaoClient['porcentagem'] = $data['porcentagem'];
            $configuracaoClient['id_Client'] = $response['id'];

            $responseConfiguracaoClient = $this->service->updateConfiguracaoClient($configuracaoClient);

            if (!empty($responseConfiguracaoClient['error'])) {
                session()->flash('error', $responseConfiguracaoClient['message']);
                return back()->withInput();
            }
        }

        session()->flash('status', 'Atualizado com sucesso !');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     *
     * @return Response
     */
    public function destroy(Client $client)
    {
        $response = $this->service->delete($client);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('client.index'));
    }
}
