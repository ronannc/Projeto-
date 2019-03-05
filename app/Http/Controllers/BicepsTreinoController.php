<?php

namespace App\Http\Controllers;

//use App\DataTables\BicepsTreinoDataTable;
use App\Models\BicepsTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\BicepsTreinoRepository;
use App\Services\BicepsTreinoService;

class BicepsTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * BicepsTreinoController constructor.
     * @param BicepsTreinoRepository $repository
     * @param BicepsTreinoService $service
     */
    public function __construct(BicepsTreinoRepository $repository, BicepsTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(BicepsTreinoDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.biceps_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.biceps_treino.create');
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
        $resultFromStoreBicepsTreino = $this->service->store($data);

        if (!empty($resultFromStoreBicepsTreino['error'])) {
            session()->flash('error', $resultFromStoreBicepsTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'BicepsTreino adicionado com sucesso !');
        return redirect(route('biceps_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BicepsTreino  $biceps_treino
     * @return \Illuminate\Http\Response
     */
    public function show(BicepsTreino $biceps_treino)
    {
        return view('layouts.biceps_treino.show', compact('biceps_treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BicepsTreino  $biceps_treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biceps_treino = BicepsTreino::find($id);
        return view('layouts.biceps_treino.edit', compact('biceps_treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BicepsTreino  $biceps_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $biceps_treino = BicepsTreino::find($id);

        $resultFromUpdateBicepsTreino = $this->service->update($data, $biceps_treino);
        if (!empty($resultFromUpdateBicepsTreino['error'])) {
            session()->flash('error', $resultFromUpdateBicepsTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BicepsTreino atualizado com sucesso!');

        return redirect(route('biceps_treino.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BicepsTreino  $biceps_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $biceps_treino = BicepsTreino::find($id);

        $resultFromDeleteBicepsTreino = $this->service->delete($biceps_treino);
        if (!empty($resultFromDeleteBicepsTreino['error'])) {
            session()->flash('error', $resultFromDeleteBicepsTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BicepsTreino deletado com sucesso!');
        return redirect(route('biceps_treino.index'));
    }
}
