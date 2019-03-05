<?php

namespace App\Http\Controllers;


//use App\DataTables\OmbroTreinoDataTable;
use App\Models\OmbroTreino;
use Illuminate\Http\Request;
use App\Repositories\Contracts\OmbroTreinoRepository;
use App\Services\OmbroTreinoService;

class OmbroTreinoController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * OmbroTreinoController constructor.
     * @param OmbroTreinoRepository $repository
     * @param OmbroTreinoService $service
     */
    public function __construct(OmbroTreinoRepository $repository, OmbroTreinoService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(OmbroTreinoDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.ombro_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.ombro_treino.create');
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
        $resultFromStoreOmbroTreino = $this->service->store($data);

        if (!empty($resultFromStoreOmbroTreino['error'])) {
            session()->flash('error', $resultFromStoreOmbroTreino['message']);
            return back()->withInput();
        }

        session()->flash('status', 'OmbroTreino adicionado com sucesso !');
        return redirect(route('ombro_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OmbroTreino  $ombro_treino
     * @return \Illuminate\Http\Response
     */
    public function show(OmbroTreino $ombro_treino)
    {
        return view('layouts.ombro_treino.show', compact('ombro_treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OmbroTreino  $ombro_treino
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ombro_treino = OmbroTreino::find($id);
//        dd($ombro_treino);
        return view('layouts.ombro_treino.edit', compact('ombro_treino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OmbroTreino  $ombro_treino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $ombro_treino = OmbroTreino::find($id);

        $resultFromUpdateOmbroTreino = $this->service->update($data, $ombro_treino);
        if (!empty($resultFromUpdateOmbroTreino['error'])) {
            session()->flash('error', $resultFromUpdateOmbroTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'OmbroTreino atualizado com sucesso!');

        return redirect(route('ombro_treino.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OmbroTreino  $ombro_treino
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $ombro_treino = OmbroTreino::find($id);

        $resultFromDeleteOmbroTreino = $this->service->delete($ombro_treino);
        if (!empty($resultFromDeleteOmbroTreino['error'])) {
            session()->flash('error', $resultFromDeleteOmbroTreino['message']);
            return back()->withInput();
        }
        session()->flash('success', 'OmbroTreino deletado com sucesso!');
        return redirect(route('ombro_treino.index'));
    }
}
