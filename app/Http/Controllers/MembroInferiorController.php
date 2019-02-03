<?php

namespace App\Http\Controllers;


use App\DataTables\MembroInferiorDataTable;
use App\Models\MembroInferior;
use Illuminate\Http\Request;
use App\Repositories\Contracts\MembroInferiorRepository;
use App\Services\MembroInferiorService;

class MembroInferiorController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * MembroInferiorController constructor.
     * @param MembroInferiorRepository $repository
     * @param MembroInferiorService $service
     */
    public function __construct(MembroInferiorRepository $repository, MembroInferiorService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MembroInferiorDataTable $dataTable)
    {
        return $dataTable->render('layouts.membroInferior.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.membroInferior.create');
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
        $resultFromStoreMembroInferior = $this->service->store($data);

        if (!empty($resultFromStoreMembroInferior['error'])) {
            session()->flash('error', $resultFromStoreMembroInferior['message']);
            return back()->withInput();
        }

        session()->flash('status', 'MembroInferior adicionado com sucesso !');
        return redirect(route('membroInferior.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function show(MembroInferior $membroInferior)
    {
        return view('layouts.membroInferior.show', compact('membroInferior'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membroInferior = MembroInferior::find($id);
//        dd($membroInferior);
        return view('layouts.membroInferior.edit', compact('membroInferior'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $membroInferior = MembroInferior::find($id);

        $resultFromUpdateMembroInferior = $this->service->update($data, $membroInferior);
        if (!empty($resultFromUpdateMembroInferior['error'])) {
            session()->flash('error', $resultFromUpdateMembroInferior['message']);
            return back()->withInput();
        }
        session()->flash('success', 'MembroInferior atualizado com sucesso!');

        return redirect(route('membroInferior.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $membroInferior = MembroInferior::find($id);

        $resultFromDeleteMembroInferior = $this->service->delete($membroInferior);
        if (!empty($resultFromDeleteMembroInferior['error'])) {
            session()->flash('error', $resultFromDeleteMembroInferior['message']);
            return back()->withInput();
        }
        session()->flash('success', 'MembroInferior deletado com sucesso!');
        return redirect(route('membroInferior.index'));
    }
}
