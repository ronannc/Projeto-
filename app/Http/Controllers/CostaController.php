<?php

namespace App\Http\Controllers;

//use App\Http\Requests\CostaStoreRequest;
//use App\Http\Requests\CostaUpdateRequest;
use App\Models\Costa;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CostaRepository;
use App\Services\CostaService;

class CostaController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * CostaController constructor.
     * @param CostaRepository $repository
     * @param CostaService $service
     */
    public function __construct(CostaRepository $repository, CostaService $service)
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
        $costa = Costa::all();
        return view('layouts.costa.index', compact('costa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.costa.create');
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
        $resultFromStoreCosta = $this->service->store($data);

        if (!empty($resultFromStoreCosta['error'])) {
            session()->flash('error', $resultFromStoreCosta['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Faturamento adicionado com sucesso !');
        return redirect(route('costa.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function show(Costa $costa)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.costa.show', compact('extraData'), compact('costa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function edit(Costa $costa)
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.costa.edit', compact('extraData'), compact('costa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costa $costa)
    {
        $data = $request->all();
        $resultFromUpdateCosta = $this->service->update($data, $costa);
        if (!empty($resultFromUpdateCosta['error'])) {
            session()->flash('error', $resultFromUpdateCosta['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Faturamento atualizado com sucesso!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costa $costa)
    {
        $resultFromDeleteCosta = $this->service->delete($costa);
        if (!empty($resultFromDeleteCosta['error'])) {
            session()->flash('error', $resultFromDeleteCosta['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Faturamento deletado com sucesso!');
        return redirect(route('costa.index'));
    }
}
