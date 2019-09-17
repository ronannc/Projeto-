<?php

namespace App\Http\Controllers;

use App\DataTables\MethodDataTable;
use App\Models\Method;
use App\Repositories\Contracts\BackRepository;
use App\Repositories\Contracts\MethodRepository;
use App\Services\BackService;
use App\Services\MethodService;
use Illuminate\Http\Request;

class MethodController extends Controller
{

    protected $repository;
    protected $service;

    /**
     * BackController constructor.
     *
     * @param BackRepository $repository
     * @param BackService    $service
     */
    public function __construct(MethodRepository $repository, MethodService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @param MethodDataTable $dataTable
     * @return mixed
     */
    public function index(MethodDataTable $dataTable)
    {
        return $dataTable->render('layouts.method.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.method.create');
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
        $resultFromStoreMethod = $this->service->store($data);

        if (!empty($resultFromStoreMethod['error'])) {
            session()->flash('error', $resultFromStoreMethod['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('method.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function edit(Method $method)
    {
        return view('layouts.method.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Method $method)
    {
        $resultFromUpdateMethod = $this->service->update($request->all(), $method);
        if (!empty($resultFromUpdateMethod['error'])) {
            session()->flash('error', $resultFromUpdateMethod['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('method.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Method  $method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Method $method)
    {
        $resultFromDeleteMethod = $this->service->delete($method);
        if (!empty($resultFromDeleteMethod['error'])) {
            session()->flash('error', $resultFromDeleteMethod['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('back.index'));
    }
}
