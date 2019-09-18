<?php

namespace App\Http\Controllers;


use App\DataTables\TricepsDataTable;
use App\Models\Triceps;
use App\Repositories\Contracts\TricepsRepository;
use App\Services\TricepsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TricepsController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * TricepsController constructor.
     *
     * @param TricepsRepository $repository
     * @param TricepsService    $service
     */
    public function __construct(TricepsRepository $repository, TricepsService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param TricepsDataTable $dataTable
     *
     * @return Response
     */
    public function index(TricepsDataTable $dataTable)
    {
        return $dataTable->render('layouts.triceps.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.triceps.create');
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
        return redirect(route('triceps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Triceps $triceps
     *
     * @return Response
     */
    public function show(Triceps $triceps)
    {
        return view('layouts.triceps.show', compact('triceps'));
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
        $triceps = Triceps::find($id);
        return view('layouts.triceps.edit', compact('triceps'));
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
