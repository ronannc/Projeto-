<?php

namespace App\Http\Controllers;


use App\DataTables\TricepsDataTable;
use App\Models\Triceps;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\TricepsService;

class TricepsController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * TricepsController constructor.
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
    public function index(TricepsDataTable $dataTable)
    {
        return $dataTable->render('layouts.triceps.index');

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
        return view('layouts.triceps.show', compact('triceps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $triceps = Triceps::find($id);
//        dd($triceps);
        return view('layouts.triceps.edit', compact('triceps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $triceps = Triceps::find($id);

        $resultFromUpdateTriceps = $this->service->update($data, $triceps);
        if (!empty($resultFromUpdateTriceps['error'])) {
            session()->flash('error', $resultFromUpdateTriceps['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Triceps atualizado com sucesso!');

        return redirect(route('triceps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Triceps  $triceps
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $triceps = Triceps::find($id);

        $resultFromDeleteTriceps = $this->service->delete($triceps);
        if (!empty($resultFromDeleteTriceps['error'])) {
            session()->flash('error', $resultFromDeleteTriceps['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Triceps deletado com sucesso!');
        return redirect(route('triceps.index'));
    }
}
