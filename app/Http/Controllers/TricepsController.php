<?php

namespace App\Http\Controllers;

use App\Http\Requests\TricepsStoreRequest;
use App\Http\Requests\TricepsUpdateRequest;
use App\Models\Triceps;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\TricepsService;

class TricepsController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * TtricepsController constructor.
     * @param TricepsRepository $repository
     * @param TricepsService $service
     */
    public function __construct(TricepsRepository $repository, TricepsService $service)
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
        $triceps = Triceps::all();
        return view('layouts.triceps.index', compact('triceps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.triceps.create');
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
        $resultFromStoreTriceps = $this->service->store($data);

        if (!empty($resultFromStoreTriceps['error'])) {
            session()->flash('error', $resultFromStoreTriceps['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Triceps adicionado com sucesso !');
        return redirect(route('triceps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function show(Triceps $triceps)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.triceps.show', compact('extraData'), compact('triceps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function edit(Triceps $triceps)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.triceps.edit', compact('extraData'), compact('triceps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Triceps $triceps)
    {
        $data = $request->all();
        $resultFromUpdateTtriceps = $this->service->update($data, $triceps);
        if (!empty($resultFromUpdateTtriceps['error'])) {
            session()->flash('error', $resultFromUpdateTtriceps['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Triceps atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Triceps $triceps)
    {
        $resultFromDeleteTtriceps = $this->service->delete($triceps);
        if (!empty($resultFromDeleteTtriceps['error'])) {
            session()->flash('error', $resultFromDeleteTtriceps['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Triceps deletado com sucesso!');
        return redirect(route('triceps.index'));
    }
}
