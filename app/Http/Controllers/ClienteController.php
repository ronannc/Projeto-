<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteStoreRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ClienteRepository;
use App\Services\ClienteService;

class ClienteController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * BillingController constructor.
     * @param ClienteRepository $repository
     * @param ClienteService $service
     */
    public function __construct(ClienteRepository $repository, ClienteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::all();
        return view('layouts.cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $resultFromStoreCliente = $this->service->store($data);

        if (!empty($resultFromStoreCliente['error'])) {
            session()->flash('error', $resultFromStoreCliente['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Cliente adicionado com sucesso !');
        return redirect(route('cliente.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.cliente.show', compact('extraData'), compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.cliente.edit', compact('extraData'), compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->all();
        $resultFromUpdateBilling = $this->service->update($data, $cliente);
        if (!empty($resultFromUpdateBilling['error'])) {
            session()->flash('error', $resultFromUpdateBilling['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Cliente atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $resultFromDeleteBilling = $this->service->delete($cliente);
        if (!empty($resultFromDeleteBilling['error'])) {
            session()->flash('error', $resultFromDeleteBilling['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Cliente deletado com sucesso!');
        return redirect(route('cliente.index'));
    }
}
