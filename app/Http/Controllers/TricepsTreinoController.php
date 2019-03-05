<?php

namespace App\Http\Controllers;


//use App\DataTables\TricepsTreinoDataTable;
use App\Models\TricepsTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TricepsTreinoRepository;
use App\Services\TricepsTreinoService;

class TricepsTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * TricepsTreinoController constructor.
     * @param TricepsTreinoRepository $repository
     * @param TricepsTreinoService $service
     */
    public function __construct(TricepsTreinoRepository $repository, TricepsTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(TricepsTreinoDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.triceps_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.triceps_treino.create');
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
        $resultFromStoreTricepsTreino = $this->service->store($data);

        if (!empty($resultFromStoreTricepsTreino['error'])) {
            session()->flash('error', $resultFromStoreTricepsTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'TricepsTreino adicionado com sucesso !');
        return redirect(route('triceps_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TricepsTreino  $triceps_treino
     * @return \Illuminate\Http\Response
     */
    public function show(TricepsTreino $triceps_treino)
    {
        return view('layouts.triceps_treino.show', compact('triceps_treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TricepsTreino  $triceps_treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $triceps_treino = TricepsTreino::find($id);
//        dd($triceps_treino);
        return view('layouts.triceps_treino.edit', compact('triceps_treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TricepsTreino  $triceps_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $triceps_treino = TricepsTreino::find($id);

        $resultFromUpdateTricepsTreino = $this->service->update($data, $triceps_treino);
        if (!empty($resultFromUpdateTricepsTreino['error'])) {
            session()->flash('error', $resultFromUpdateTricepsTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'TricepsTreino atualizado com sucesso!');

        return redirect(route('triceps_treino.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TricepsTreino  $triceps_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $triceps_treino = TricepsTreino::find($id);

        $resultFromDeleteTricepsTreino = $this->service->delete($triceps_treino);
        if (!empty($resultFromDeleteTricepsTreino['error'])) {
            session()->flash('error', $resultFromDeleteTricepsTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'TricepsTreino deletado com sucesso!');
        return redirect(route('triceps_treino.index'));
    }
}
