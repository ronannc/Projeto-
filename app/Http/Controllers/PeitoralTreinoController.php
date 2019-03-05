<?php

namespace App\Http\Controllers;


//use App\DataTables\PeitoralTreinoDataTable;
use App\Models\PeitoralTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PeitoralTreinoRepository;
use App\Services\PeitoralTreinoService;

class PeitoralTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * PeitoralTreinoController constructor.
     * @param PeitoralTreinoRepository $repository
     * @param PeitoralTreinoService $service
     */
    public function __construct(PeitoralTreinoRepository $repository, PeitoralTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(PeitoralTreinoDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.peitoral_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.peitoral_treino.create');
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
        $resultFromStorePeitoralTreino = $this->service->store($data);

        if (!empty($resultFromStorePeitoralTreino['error'])) {
            session()->flash('error', $resultFromStorePeitoralTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'PeitoralTreino adicionado com sucesso !');
        return redirect(route('peitoral_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PeitoralTreino  $peitoral_treino
     * @return \Illuminate\Http\Response
     */
    public function show(PeitoralTreino $peitoral_treino)
    {
        return view('layouts.peitoral_treino.show', compact('peitoral_treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PeitoralTreino  $peitoral_treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peitoral_treino = PeitoralTreino::find($id);
//        dd($peitoral_treino);
        return view('layouts.peitoral_treino.edit', compact('peitoral_treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PeitoralTreino  $peitoral_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $peitoral_treino = PeitoralTreino::find($id);

        $resultFromUpdatePeitoralTreino = $this->service->update($data, $peitoral_treino);
        if (!empty($resultFromUpdatePeitoralTreino['error'])) {
            session()->flash('error', $resultFromUpdatePeitoralTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'PeitoralTreino atualizado com sucesso!');

        return redirect(route('peitoral_treino.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PeitoralTreino  $peitoral_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $peitoral_treino = PeitoralTreino::find($id);

        $resultFromDeletePeitoralTreino = $this->service->delete($peitoral_treino);
        if (!empty($resultFromDeletePeitoralTreino['error'])) {
            session()->flash('error', $resultFromDeletePeitoralTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'PeitoralTreino deletado com sucesso!');
        return redirect(route('peitoral_treino.index'));
    }
}
