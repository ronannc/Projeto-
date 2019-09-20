<?php

namespace App\Http\Controllers;

use App\DataTables\BicepsDataTable;
use App\Models\Biceps;
use App\Repositories\Contracts\BicepsRepository;
use App\Services\BicepsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BicepsController extends Controller
{

    /** @var BicepsRepository */
    protected $repository;

    /** @var BicepsService */
    protected $service;

    /**
     * BicepsController constructor.
     *
     * @param BicepsRepository $repository
     * @param BicepsService    $service
     */
    public function __construct(BicepsRepository $repository, BicepsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param BicepsDataTable $dataTable
     *
     * @return Response
     */
    public function index(BicepsDataTable $dataTable)
    {
        $resource = 'Listagem de exercícios de bíceps';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.biceps.create');
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
        return redirect(route('biceps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Biceps $biceps
     *
     * @return Response
     */
    public function show(Biceps $biceps)
    {
        return view('layouts.biceps.show', compact('biceps'));
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
        $biceps = Biceps::find($id);
        return view('layouts.biceps.edit', compact('biceps'));
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
