<?php

namespace App\Http\Controllers;

use App\DataTables\ClientDataTable;
use App\DataTables\WorkoutDataTable;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\City;
use App\Models\Client;
use App\Models\Company;
use App\Repositories\Contracts\ClientRepository;
use App\Services\ClientService;
use App\Support\BloodType;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /** @var ClientRepository */
    protected $repository;

    /** @var ClientService */
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
        $resource = 'Listagem de clientes';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData['company'] = Company::all();
        $extraData['city'] = City::all();
        $extraData['blood_type'] = BloodType::NAMES;

        return view('layouts.clients.create', compact('extraData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     *
     * @return Response
     */
    public function store(ClientCreateRequest $request)
    {
        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');

        return redirect(route('clients.index'));
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
        return $dataTable->with('data', $workout)->render('layouts.clients.show', compact('workout'),
            compact('client'));
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
        $extraData['company'] = Company::all();
        $extraData['city'] = City::all();
        $extraData['blood_type'] = BloodType::NAMES;

        $model = $this->repository->findOneById($id);

        return view('layouts.clients.edit', compact('extraData'), compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientUpdateRequest $request
     * @param                     $id
     *
     * @return Response
     */
    public function update(ClientUpdateRequest $request, $id)
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
     * @return Response
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
}
