<?php

namespace App\Http\Controllers;

use App\DataTables\TreinoDataTable;
use App\Models\Treino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TreinoRepository;
use App\Services\TreinoService;

class TreinoController extends Controller
{

    protected $repository;
    protected $service;

    /**
     * TreinoController constructor.
     * @param TreinoRepository $repository
     * @param TreinoService $service
     */
    public function __construct(TreinoRepository $repository, TreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TreinoDataTable $dataTable)
    {
        return $dataTable->render('layouts.treino.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.treino.create', compact('extraData') );
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
        $resultFromStoreTreino = $this->service->store($data);

        if (!empty($resultFromStoreTreino['error'])) {
            session()->flash('error', $resultFromStoreTreino['message']);
            return back()->withInput();
        }

        foreach ($data['triceps'] as $triceps){
            $this->repository->save_triceps_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_triceps' => $triceps]);
        }

        foreach ($data['biceps'] as $biceps){
            $this->repository->save_biceps_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_biceps' => $biceps]);
        }

        foreach ($data['costa'] as $costa){
            $this->repository->save_costa_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_costa' => $costa]);
        }

        foreach ($data['ombro'] as $ombro){
            $this->repository->save_ombro_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_ombro' => $ombro]);
        }
//        dd($data);

        foreach ($data['peitoral'] as $peitoral){
            $this->repository->save_peitoral_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_peitoral' => $peitoral]);
        }

        foreach ($data['membro_inferior'] as $membro_inferior){
            $this->repository->save_membro_inferior_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_membro_inferior' => $membro_inferior]);
        }

        session()->flash('status', 'Treino adicionado com sucesso !');
        return redirect(route('treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treino = Treino::find($id);
        return view('layouts.treinos.show', compact('extraData'), compact('treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treino = Treino::find($id);
        return view('layouts.treino.edit', compact('extraData'), compact('treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treino $treino)
    {
        $data = $request->all();
        $resultFromUpdateTreino = $this->service->update($data, $treino);
        if (!empty($resultFromUpdateTreino['error'])) {
            session()->flash('error', $resultFromUpdateTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Treino atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treino $treino)
    {
        $resultFromDeleteTreino = $this->service->delete($treino);
        if (!empty($resultFromDeleteTreino['error'])) {
            session()->flash('error', $resultFromDeleteTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Treino deletado com sucesso!');
        return redirect(route('treino.index'));
    }
}
