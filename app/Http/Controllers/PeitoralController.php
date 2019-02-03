<?php

namespace App\Http\Controllers;


use App\DataTables\PeitoralDataTable;
use App\Models\Peitoral;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PeitoralRepository;
use App\Services\PeitoralService;

class PeitoralController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * PeitoralController constructor.
     * @param PeitoralRepository $repository
     * @param PeitoralService $service
     */
    public function __construct(PeitoralRepository $repository, PeitoralService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PeitoralDataTable $dataTable)
    {
        return $dataTable->render('layouts.peitoral.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.peitoral.create');
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
        $resultFromStorePeitoral = $this->service->store($data);

        if (!empty($resultFromStorePeitoral['error'])) {
            session()->flash('error', $resultFromStorePeitoral['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Peitoral adicionado com sucesso !');
        return redirect(route('peitoral.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peitoral  $peitoral
     * @return \Illuminate\Http\Response
     */
    public function show(Peitoral $peitoral)
    {
        return view('layouts.peitoral.show', compact('peitoral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peitoral  $peitoral
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peitoral = Peitoral::find($id);
//        dd($peitoral);
        return view('layouts.peitoral.edit', compact('peitoral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peitoral  $peitoral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $peitoral = Peitoral::find($id);

        $resultFromUpdatePeitoral = $this->service->update($data, $peitoral);
        if (!empty($resultFromUpdatePeitoral['error'])) {
            session()->flash('error', $resultFromUpdatePeitoral['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Peitoral atualizado com sucesso!');

        return redirect(route('peitoral.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peitoral  $peitoral
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $peitoral = Peitoral::find($id);

        $resultFromDeletePeitoral = $this->service->delete($peitoral);
        if (!empty($resultFromDeletePeitoral['error'])) {
            session()->flash('error', $resultFromDeletePeitoral['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Peitoral deletado com sucesso!');
        return redirect(route('peitoral.index'));
    }
}
