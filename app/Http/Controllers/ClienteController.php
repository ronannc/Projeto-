<?php

namespace App\Http\Controllers;

use App\DataTables\ClienteDataTable;
use App\DataTables\TreinoDataTable;
use App\Models\Cliente;
use App\Models\ConfiguracaoCliente;
use App\Models\User;
use App\Services\ConfiguracaoClienteService;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ClienteRepository;
use App\Services\ClienteService;

class ClienteController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * ClienteController constructor.
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
    public function index(ClienteDataTable $dataTable)
    {
        if(User::isCliente() && User::cliente()->first() != null){
            $cliente = User::cliente()->first();

            return redirect(route('cliente.edit', $cliente));
        }
        return $dataTable->render('layouts.cliente.index');
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
        $resultFromStoreCliente = $this->service->store($data);

        if (!empty($resultFromStoreCliente['error'])) {
            session()->flash('error', $resultFromStoreCliente['message']);
            return back()->withInput();
        }

        if(isset($data['formula'])){
            $configuracaoCliente['formula'] = 1;
        }else{
            $configuracaoCliente['formula'] = 0;
        }
        $configuracaoCliente['porcentagem'] = $data['porcentagem'];
        $configuracaoCliente['id_cliente'] = $resultFromStoreCliente['id'];

        $resultFromStoreConfiguracaoCliente = $this->service->storeConfiguracaoCliente($configuracaoCliente);

        if (!empty($resultFromStoreConfiguracaoCliente['error'])) {
            session()->flash('error', $resultFromStoreConfiguracaoCliente['message']);
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
    public function show(Cliente $cliente , TreinoDataTable $dataTable)
    {
        $treino = $cliente->treino();
        return $dataTable->with('data', $treino)->render('layouts.cliente.show', compact('treino'), compact('cliente'));
    }

    public function myAcount(TreinoDataTable $dataTable)
    {
        $cliente = User::cliente()->first();
        $treino = $cliente->treino();
        return $dataTable->with('data', $treino)->render('layouts.cliente.show', compact('treino'), compact('cliente'));
    }

    public function editMyAcount(TreinoDataTable $dataTable)
    {
        $extraData = User::cliente()->first();
        return view('layouts.cliente.editClient', compact('extraData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extraData = Cliente::find($id);
        $configuracaoCliente = $extraData->configuracao();
        $extraData['configuracao'] = $extraData->configuracao();
        $extraData['formula'] = $configuracaoCliente['formula'] == 1 ? 'checked' : '';
        $extraData['porcentagem'] = $configuracaoCliente['porcentagem'];
        return view('layouts.cliente.edit', compact('extraData'));
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
        $resultFromUpdateCliente = $this->service->update($data, $cliente);

        if (!empty($resultFromUpdateCliente['error'])) {
            session()->flash('error', $resultFromUpdateCliente['message']);
            return back()->withInput();
        }

        if(!isset($data['cliente'])){
            if(isset($data['formula'])){
                $configuracaoCliente['formula'] = 1;
            }else{
                $configuracaoCliente['formula'] = 0;
            }
            $configuracaoCliente['porcentagem'] = $data['porcentagem'];
            $configuracaoCliente['id_cliente'] = $resultFromUpdateCliente['id'];

            $resultFromUpdateConfiguracaoCliente = $this->service->updateConfiguracaoCliente($configuracaoCliente);

            if (!empty($resultFromUpdateConfiguracaoCliente['error'])) {
                session()->flash('error', $resultFromUpdateConfiguracaoCliente['message']);
                return back()->withInput();
            }
        }

        session()->flash('status', 'Cliente atualizado com sucesso !');

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
        $resultFromDeleteCliente = $this->service->delete($cliente);
        if (!empty($resultFromDeleteCliente['error'])) {
            session()->flash('error', $resultFromDeleteCliente['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Cliente deletado com sucesso!');
        return redirect(route('cliente.index'));
    }
}
