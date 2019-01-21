<?php

namespace App\Http\Controllers;

//use App\Http\Requests\TreinoStoreRequest;
//use App\Http\Requests\TreinoUpdateRequest;
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
    public function index()
    {
        $treino = Treino::all();
        return view('layouts.treino.index', compact('treino'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.treino.create');
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
//        dd($data);
        $resultFromStoreTreino = $this->service->store($data);

        if (!empty($resultFromStoreTreino['error'])) {
            session()->flash('error', $resultFromStoreTreino['message']);
            return back()->withInput();
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
    public function show(Treino $treino)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.treinos.show', compact('extraData'), compact('treino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treino  $treino
     * @return \Illuminate\Http\Response
     */
    public function edit(Treino $treino)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.treinos.edit', compact('extraData'), compact('treino'));
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
        return redirect(route('treinos.index'));
    }
}
