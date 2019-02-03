<?php

namespace App\Http\Controllers;


use App\DataTables\OmbroDataTable;
use App\Models\Ombro;
use Illuminate\Http\Request;
use App\Repositories\Contracts\OmbroRepository;
use App\Services\OmbroService;

class OmbroController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * OmbroController constructor.
     * @param OmbroRepository $repository
     * @param OmbroService $service
     */
    public function __construct(OmbroRepository $repository, OmbroService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OmbroDataTable $dataTable)
    {
        return $dataTable->render('layouts.ombro.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.ombro.create');
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
        $resultFromStoreOmbro = $this->service->store($data);

        if (!empty($resultFromStoreOmbro['error'])) {
            session()->flash('error', $resultFromStoreOmbro['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Ombro adicionado com sucesso !');
        return redirect(route('ombro.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function show(Ombro $ombro)
    {
        return view('layouts.ombro.show', compact('ombro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ombro = Ombro::find($id);
//        dd($ombro);
        return view('layouts.ombro.edit', compact('ombro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $ombro = Ombro::find($id);

        $resultFromUpdateOmbro = $this->service->update($data, $ombro);
        if (!empty($resultFromUpdateOmbro['error'])) {
            session()->flash('error', $resultFromUpdateOmbro['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Ombro atualizado com sucesso!');

        return redirect(route('ombro.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $ombro = Ombro::find($id);

        $resultFromDeleteOmbro = $this->service->delete($ombro);
        if (!empty($resultFromDeleteOmbro['error'])) {
            session()->flash('error', $resultFromDeleteOmbro['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Ombro deletado com sucesso!');
        return redirect(route('ombro.index'));
    }
}
