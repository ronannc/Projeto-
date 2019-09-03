<?php

namespace App\Http\Controllers;

use App\DataTables\ClientDataTable;
use App\DataTables\WorkoutDataTable;
use App\Models\City;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Repositories\Contracts\ClientRepository;
use App\Services\ClientService;
use App\Services\CompanyService;
use App\Support\BloodType;
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
        $extraData['company'] = Company::all();
        $extraData['city'] = City::all();
        $extraData['blood_type'] = BloodType::NAMES;

        return view('layouts.client.create', compact('extraData'));
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

        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Adicionado com sucesso!');

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

        $data = Client::find($id);

        return view('layouts.client.edit', compact('extraData'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client  $client
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $response = $this->service->update($request->all(), $client);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('client.index'));
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
