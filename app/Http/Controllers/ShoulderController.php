<?php

namespace App\Http\Controllers;


use App\DataTables\ShoulderDataTable;
use App\Models\Shoulder;
use App\Repositories\Contracts\ShoulderRepository;
use App\Services\ShoulderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShoulderController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * ShoulderController constructor.
     *
     * @param ShoulderRepository $repository
     * @param ShoulderService    $service
     */
    public function __construct(ShoulderRepository $repository, ShoulderService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ShoulderDataTable $dataTable
     *
     * @return Response
     */
    public function index(ShoulderDataTable $dataTable)
    {
        return $dataTable->render('layouts.Shoulder.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.Shoulder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $resultFromStoreShoulder = $this->service->store($data);

        if (!empty($resultFromStoreShoulder['error'])) {
            session()->flash('error', $resultFromStoreShoulder['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Shoulder adicionado com sucesso !');
        return redirect(route('Shoulder.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Shoulder $Shoulder
     *
     * @return Response
     */
    public function show(Shoulder $Shoulder)
    {
        return view('layouts.Shoulder.show', compact('Shoulder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $Shoulder = Shoulder::find($id);
//        dd($Shoulder);
        return view('layouts.Shoulder.edit', compact('Shoulder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param         $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $Shoulder = Shoulder::find($id);

        $resultFromUpdateShoulder = $this->service->update($data, $Shoulder);
        if (!empty($resultFromUpdateShoulder['error'])) {
            session()->flash('error', $resultFromUpdateShoulder['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Shoulder atualizado com sucesso!');

        return redirect(route('Shoulder.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return Response
     */
    public function destroy($id)
    {
//        dd($id);
        $Shoulder = Shoulder::find($id);

        $resultFromDeleteShoulder = $this->service->delete($Shoulder);
        if (!empty($resultFromDeleteShoulder['error'])) {
            session()->flash('error', $resultFromDeleteShoulder['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Shoulder deletado com sucesso!');
        return redirect(route('Shoulder.index'));
    }
}
