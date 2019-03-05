<?php

namespace App\Http\Controllers;


//use App\DataTables\MembroInferiorTreinoDataTable;
use App\Models\MembroInferiorTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\MembroInferiorTreinoRepository;
use App\Services\MembroInferiorTreinoService;

class MembroInferiorTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * MembroInferiorTreinoController constructor.
     * @param MembroInferiorTreinoRepository $repository
     * @param MembroInferiorTreinoService $service
     */
    public function __construct(MembroInferiorTreinoRepository $repository, MembroInferiorTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(MembroInferiorTreinoDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.membro_inferior_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.membro_inferior_treino.create');
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
        $resultFromStoreMembroInferiorTreino = $this->service->store($data);

        if (!empty($resultFromStoreMembroInferiorTreino['error'])) {
            session()->flash('error', $resultFromStoreMembroInferiorTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'MembroInferiorTreino adicionado com sucesso !');
        return redirect(route('membro_inferior_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MembroInferiorTreino  $membro_inferior_treino
     * @return \Illuminate\Http\Response
     */
    public function show(MembroInferiorTreino $membro_inferior_treino)
    {
        return view('layouts.membro_inferior_treino.show', compact('membro_inferior_treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembroInferiorTreino  $membro_inferior_treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membro_inferior_treino = MembroInferiorTreino::find($id);
//        dd($membro_inferior_treino);
        return view('layouts.membro_inferior_treino.edit', compact('membro_inferior_treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembroInferiorTreino  $membro_inferior_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $membro_inferior_treino = MembroInferiorTreino::find($id);

        $resultFromUpdateMembroInferiorTreino = $this->service->update($data, $membro_inferior_treino);
        if (!empty($resultFromUpdateMembroInferiorTreino['error'])) {
            session()->flash('error', $resultFromUpdateMembroInferiorTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'MembroInferiorTreino atualizado com sucesso!');

        return redirect(route('membro_inferior_treino.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembroInferiorTreino  $membro_inferior_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $membro_inferior_treino = MembroInferiorTreino::find($id);

        $resultFromDeleteMembroInferiorTreino = $this->service->delete($membro_inferior_treino);
        if (!empty($resultFromDeleteMembroInferiorTreino['error'])) {
            session()->flash('error', $resultFromDeleteMembroInferiorTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'MembroInferiorTreino deletado com sucesso!');
        return redirect(route('membro_inferior_treino.index'));
    }
}
