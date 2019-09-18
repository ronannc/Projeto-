<?php

namespace App\Http\Controllers;

use App\DataTables\MethodDataTable;
use App\Models\Method;
use App\Repositories\Contracts\MethodRepository;
use App\Services\MethodService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MethodController extends Controller
{

    protected $repository;
    protected $service;

    /**
     * BackController constructor.
     *
     * @param MethodRepository $repository
     * @param MethodService    $service
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
        return $dataTable->render('layouts.methods.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.methods.create');
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
        $resultFromStoreMethod = $this->service->store($data);

        if (!empty($resultFromStoreMethod['error'])) {
            session()->flash('error', $resultFromStoreMethod['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('methods.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Method $method
     *
     * @return void
     */
    public function show(Method $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Method $method
     *
     * @return Response
     */
    public function edit(Method $method)
    {
        return view('layouts.methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Method  $method
     *
     * @return Response
     */
    public function update(Request $request, Method $method)
    {
        $resultFromUpdateMethod = $this->service->update($request->all(), $method);
        if (!empty($resultFromUpdateMethod['error'])) {
            session()->flash('error', $resultFromUpdateMethod['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('methods.index'));
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
