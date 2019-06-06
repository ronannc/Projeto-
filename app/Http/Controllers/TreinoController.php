<?php

namespace App\Http\Controllers;

use App\DataTables\TreinoDataTable;
use App\Models\Treino;
use App\Models\User;
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
        if(User::isCliente() && User::cliente()->first() != null){
            $cliente = User::cliente()->first();
            $treino = $cliente->treino();
            return $dataTable->with('data', $treino)->render('layouts.treino.index');
        }
        $treino = Treino::all();
        return $dataTable->with('data', $treino)->render('layouts.treino.index');
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

        foreach ($data['peitoral'] as $peitoral){
            $this->repository->save_peitoral_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_peitoral' => $peitoral]);
        }

        foreach ($data['membro_inferior'] as $membro_inferior){
            $this->repository->save_membro_inferior_treino(['id_treino' => $resultFromStoreTreino['id'], 'id_membro_inferior' => $membro_inferior]);
        }
        session()->flash('status', 'Treino adicionado com sucesso !');
        return redirect(route('treino.edit', $resultFromStoreTreino));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->repository->getExerciciosTreino($id);
        return view('layouts.treino.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extraData = $this->repository->getExtraData();
        $data = $this->repository->getExerciciosTreino($id);
        return view('layouts.treino.edit', compact('extraData'), compact('data'));
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

        $data['formula_treino'] = $treino->usa_formula();
        if($data['formula_treino']['formula']){
            $process_data = $this->service->process_data($data, true);
        }else{
            $process_data = $this->service->process_data($data);
        }

        foreach ($process_data['triceps'] as $key => $triceps){
            $triceps['id_triceps'] = $key;
            $triceps['id_treino'] = $treino['id'];
            $this->repository->update_triceps_treino($triceps);
        }

        foreach ($process_data['biceps'] as $key => $biceps){
            $biceps['id_biceps'] = $key;
            $biceps['id_treino'] = $treino['id'];
            $this->repository->update_biceps_treino($biceps);
        }

        foreach ($process_data['costa'] as $key => $costa){
            $costa['id_costa'] = $key;
            $costa['id_treino'] = $treino['id'];
            $this->repository->update_costa_treino($costa);
        }

        foreach ($process_data['peitoral'] as $key => $peitoral){
            $peitoral['id_peitoral'] = $key;
            $peitoral['id_treino'] = $treino['id'];
            $this->repository->update_peitoral_treino($peitoral);
        }

        foreach ($process_data['ombro'] as $key => $ombro){
            $ombro['id_ombro'] = $key;
            $ombro['id_treino'] = $treino['id'];
            $this->repository->update_ombro_treino($ombro);
        }

        foreach ($process_data['inferior'] as $key => $inferior){
            $inferior['id_membro_inferior'] = $key;
            $inferior['id_treino'] = $treino['id'];
            $this->repository->update_membro_inferior_treino($inferior);
        }

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
