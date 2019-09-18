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
        return $dataTable->render('layouts.shoulders.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.shoulders.create');
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
        $response = $this->service->store($request->all());

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('shoulders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Shoulder $shoulder
     *
     * @return Response
     */
    public function show(Shoulder $shoulder)
    {
        return view('layouts.shoulders.show', compact('shoulder'));
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
        $shoulder = Shoulder::find($id);
        return view('layouts.shoulders.edit', compact('shoulder'));
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
        $response = $this->service->update($request->all(), $id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return back();
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
        $response = $this->service->destroy($id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('success', 'Deletado com sucesso!');

        return back();
    }
}
