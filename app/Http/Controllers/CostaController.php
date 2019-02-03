<?php

namespace App\Http\Controllers;

use App\DataTables\CostaDataTable;
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
    public function index(CostaDataTable $dataTable)
    {
        return $dataTable->render('layouts.costa.index');

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
        $resultFromStoreCosta = $this->service->store($data);
//        dd($resultFromStoreCosta);

        if (!empty($resultFromStoreCosta['error'])) {
            session()->flash('error', $resultFromStoreCosta['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Costa adicionado com sucesso !');
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
        return view('layouts.costa.show', compact('costa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costa = Costa::find($id);
//        dd($costa);
        return view('layouts.costa.edit', compact('costa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $costa = Costa::find($id);

        $resultFromUpdateCosta = $this->service->update($data, $costa);
        if (!empty($resultFromUpdateCosta['error'])) {
            session()->flash('error', $resultFromUpdateCosta['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Costa atualizado com sucesso!');

        return redirect(route('costa.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Costa  $costa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $costa = Costa::find($id);

        $resultFromDeleteCosta = $this->service->delete($costa);
        if (!empty($resultFromDeleteCosta['error'])) {
            session()->flash('error', $resultFromDeleteCosta['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Costa deletado com sucesso!');
        return redirect(route('costa.index'));
    }
}
