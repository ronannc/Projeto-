<?php

namespace App\Http\Controllers;

//use App\DataTables\CostaTreinoDataTable;
use App\Models\CostaTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CostaTreinoRepository;
use App\Services\CostaTreinoService;

class CostaTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * CostaTreinoController constructor.
     * @param CostaTreinoRepository $repository
     * @param CostaTreinoService $service
     */
    public function __construct(CostaTreinoRepository $repository, CostaTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(CostaTreinoDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.costa_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.costa_treino.create');
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
        $resultFromStoreCostaTreino = $this->service->store($data);
//        dd($resultFromStoreCostaTreino);

        if (!empty($resultFromStoreCostaTreino['error'])) {
            session()->flash('error', $resultFromStoreCostaTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'CostaTreino adicionado com sucesso !');
        return redirect(route('costa_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CostaTreino  $costa_treino
     * @return \Illuminate\Http\Response
     */
    public function show(CostaTreino $costa_treino)
    {
        return view('layouts.costa_treino.show', compact('costa_treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CostaTreino  $costa_treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costa_treino = CostaTreino::find($id);
//        dd($costa_treino);
        return view('layouts.costa_treino.edit', compact('costa_treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CostaTreino  $costa_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $costa_treino = CostaTreino::find($id);

        $resultFromUpdateCostaTreino = $this->service->update($data, $costa_treino);
        if (!empty($resultFromUpdateCostaTreino['error'])) {
            session()->flash('error', $resultFromUpdateCostaTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'CostaTreino atualizado com sucesso!');

        return redirect(route('costa_treino.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CostaTreino  $costa_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $costa_treino = CostaTreino::find($id);

        $resultFromDeleteCostaTreino = $this->service->delete($costa_treino);
        if (!empty($resultFromDeleteCostaTreino['error'])) {
            session()->flash('error', $resultFromDeleteCostaTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'CostaTreino deletado com sucesso!');
        return redirect(route('costa_treino.index'));
    }
}
