<?php

namespace App\Http\Controllers;

use App\DataTables\BicepsDataTable;
use App\Models\Biceps;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BicepsRepository;
use App\Services\BicepsService;

class BicepsController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * BicepsController constructor.
     * @param BicepsRepository $repository
     * @param BicepsService $service
     */
    public function __construct(BicepsRepository $repository, BicepsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BicepsDataTable $dataTable)
    {
        return $dataTable->render('layouts.biceps.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.biceps.create');
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
        $resultFromStoreBiceps = $this->service->store($data);

        if (!empty($resultFromStoreBiceps['error'])) {
            session()->flash('error', $resultFromStoreBiceps['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Biceps adicionado com sucesso !');
        return redirect(route('biceps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function show(Biceps $biceps)
    {
        return view('layouts.biceps.show', compact('biceps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biceps = Biceps::find($id);
        return view('layouts.biceps.edit', compact('biceps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $biceps = Biceps::find($id);

        $resultFromUpdateBiceps = $this->service->update($data, $biceps);
        if (!empty($resultFromUpdateBiceps['error'])) {
            session()->flash('error', $resultFromUpdateBiceps['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Biceps atualizado com sucesso!');

        return redirect(route('biceps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Biceps  $biceps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biceps = Biceps::find($id);

        $resultFromDeleteBiceps = $this->service->delete($biceps);
        if (!empty($resultFromDeleteBiceps['error'])) {
            session()->flash('error', $resultFromDeleteBiceps['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Biceps deletado com sucesso!');
        return redirect(route('biceps.index'));
    }
}
