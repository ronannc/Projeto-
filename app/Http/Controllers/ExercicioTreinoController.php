<?php

namespace App\Http\Controllers;

use App\DataTables\ExercicioTreinoDataTable;
use App\Models\ExercicioTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ExercicioTreinoRepository;
use App\Services\ExercicioTreinoService;

class ExercicioTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * exercicioTreinoController constructor.
     * @param exercicioTreinoRepository $repository
     * @param exercicioTreinoService $service
     */
    public function __construct(ExercicioTreinoRepository $repository, ExercicioTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExercicioTreinoDataTable $dataTable)
    {
        return $dataTable->render('layouts.exercicioTreino.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.exercicioTreino.create');
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
        $resultFromStoreExercicioTreino = $this->service->store($data);

        if (!empty($resultFromStoreExercicioTreino['error'])) {
            session()->flash('error', $resultFromStoreExercicioTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'exercicioTreino adicionado com sucesso !');
        return redirect(route('exercicioTreino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\exercicioTreino  $exercicioTreino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exercicioTreino = ExercicioTreino::find($id);
        return view('layouts.exercicioTreino.show', compact('treino'), compact('exercicioTreino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\exercicioTreino  $exercicioTreino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercicioTreino = ExercicioTreino::find($id);
        return view('layouts.exercicioTreino.edit', compact('exercicioTreino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exercicioTreino  $exercicioTreino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExercicioTreino $exercicioTreino)
    {
        $data = $request->all();
        $resultFromUpdateexercicioTreino = $this->service->update($data, $exercicioTreino);
        if (!empty($resultFromUpdateexercicioTreino['error'])) {
            session()->flash('error', $resultFromUpdateexercicioTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'exercicioTreino atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\exercicioTreino  $exercicioTreino
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExercicioTreino $exercicioTreino)
    {
        $resultFromDeleteexercicioTreino = $this->service->delete($exercicioTreino);
        if (!empty($resultFromDeleteexercicioTreino['error'])) {
            session()->flash('error', $resultFromDeleteexercicioTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'exercicioTreino deletado com sucesso!');
        return redirect(route('exercicioTreino.index'));
    }
}
