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

            return redirect(route('Client.edit', $Client));
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
        $resultFromStoreClient = $this->service->store($data);

        if (!empty($resultFromStoreClient['error'])) {
            session()->flash('error', $resultFromStoreClient['message']);
            return back()->withInput();
        }

        if(isset($data['formula'])) {
            $configuracaoClient['formula'] = 1;
        } else {
            $configuracaoClient['formula'] = 0;
        }
        $configuracaoClient['porcentagem'] = $data['porcentagem'];
        $configuracaoClient['id_Client'] = $resultFromStoreClient['id'];

        $resultFromStoreConfiguracaoClient = $this->service->storeConfiguracaoClient($configuracaoClient);

        if (!empty($resultFromStoreConfiguracaoClient['error'])) {
            session()->flash('error', $resultFromStoreConfiguracaoClient['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Client adicionado com sucesso !');
        return redirect(route('Client.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Client           $Client
     * @param WorkoutDataTable $dataTable
     *
     * @return Response
     */
    public function show(Client $Client, WorkoutDataTable $dataTable)
    {
        $workout = $Client->workout();
        return $dataTable->with('data', $workout)->render('layouts.client.show', compact('workout'), compact('Client'));
    }

    public function myAcount(WorkoutDataTable $dataTable)
    {
        $Client = User::Client()->first();
        $workout = $Client->workout();
        return $dataTable->with('data', $workout)->render('layouts.client.show', compact('workout'), compact('Client'));
    }

    public function editMyAcount(WorkoutDataTable $dataTable)
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
        $configuracaoClient = $extraData->configuracao();
        $extraData['configuracao'] = $extraData->configuracao();
        $extraData['formula'] = $configuracaoClient['formula'] == 1 ? 'checked' : '';
        $extraData['porcentagem'] = $configuracaoClient['porcentagem'];
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
        $resultFromUpdateClient = $this->service->update($data, $client);

        if (!empty($resultFromUpdateClient['error'])) {
            session()->flash('error', $resultFromUpdateClient['message']);
            return back()->withInput();
        }

        if (!isset($data['Client'])){
            if(isset($data['formula'])) {
                $configuracaoClient['formula'] = 1;
            } else {
                $configuracaoClient['formula'] = 0;
            }
            $configuracaoClient['porcentagem'] = $data['porcentagem'];
            $configuracaoClient['id_Client'] = $resultFromUpdateClient['id'];

            $resultFromUpdateConfiguracaoClient = $this->service->updateConfiguracaoClient($configuracaoClient);

            if (!empty($resultFromUpdateConfiguracaoClient['error'])) {
                session()->flash('error', $resultFromUpdateConfiguracaoClient['message']);
                return back()->withInput();
            }
        }

        session()->flash('status', 'Client atualizado com sucesso !');

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
        $resultFromDeleteClient = $this->service->delete($client);
        if (!empty($resultFromDeleteClient['error'])) {
            session()->flash('error', $resultFromDeleteClient['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Client deletado com sucesso!');
        return redirect(route('Client.index'));
    }
}
