<?php

namespace App\Http\Controllers;

//use App\Http\Requests\MembroInferiorStoreRequest;
//use App\Http\Requests\MembroInferiorUpdateRequest;
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
    public function index()
    {
        $membroInferior = MembroInferior::all();
        return view('layouts.membroInferior.index', compact('membroInferior'));
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
//        dd($data);
        $resultFromStoreMembroInferior = $this->service->store($data);

        if (!empty($resultFromStoreMembroInferior['error'])) {
            session()->flash('error', $resultFromStoreMembroInferior['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Membro Inferior adicionado com sucesso !');
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
        $extraData = $this->repository->getExtraData();
        return view('layouts.membroInferior.show', compact('extraData'), compact('membroInferior'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function edit(MembroInferior $membroInferior)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.membroInferior.edit', compact('extraData'), compact('membroInferior'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MembroInferior $membroInferior)
    {
        $data = $request->all();
        $resultFromUpdateMembroInferior = $this->service->update($data, $membroInferior);
        if (!empty($resultFromUpdateMembroInferior['error'])) {
            session()->flash('error', $resultFromUpdateMembroInferior['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Membro Inferior atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MembroInferior  $membroInferior
     * @return \Illuminate\Http\Response
     */
    public function destroy(MembroInferior $membroInferior)
    {
        $resultFromDeleteMembroInferior = $this->service->delete($membroInferior);
        if (!empty($resultFromDeleteMembroInferior['error'])) {
            session()->flash('error', $resultFromDeleteMembroInferior['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Membro Inferior deletado com sucesso!');
        return redirect(route('membroInferior.index'));
    }
}
