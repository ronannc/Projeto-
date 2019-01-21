<?php

namespace App\Http\Controllers;

//use App\Http\Requests\OmbroStoreRequest;
//use App\Http\Requests\OmbroUpdateRequest;
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
    public function index()
    {
        $ombro = Ombro::all();
        return view('layouts.ombro.index', compact('ombro'));
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
//        dd($data);
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
        $extraData = $this->repository->getExtraData();
        return view('layouts.ombro.show', compact('extraData'), compact('ombro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function edit(Ombro $ombro)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.ombro.edit', compact('extraData'), compact('ombro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ombro $ombro)
    {
        $data = $request->all();
        $resultFromUpdateOmbro = $this->service->update($data, $ombro);
        if (!empty($resultFromUpdateOmbro['error'])) {
            session()->flash('error', $resultFromUpdateOmbro['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Ombro atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ombro  $ombro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ombro $ombro)
    {
        $resultFromDeleteOmbro = $this->service->delete($ombro);
        if (!empty($resultFromDeleteOmbro['error'])) {
            session()->flash('error', $resultFromDeleteOmbro['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Ombro deletado com sucesso!');
        return redirect(route('ombro.index'));
    }
}
