<?php

namespace App\Http\Controllers;

use App\DataTables\BackDataTable;
use App\Models\Back;
use App\Repositories\Contracts\BackRepository;
use App\Services\BackService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BackController extends Controller
{
    protected $repository;
    protected $service;

    /**
     * BackController constructor.
     *
     * @param BackRepository $repository
     * @param BackService    $service
     */
    public function __construct(BackRepository $repository, BackService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param BackDataTable $dataTable
     *
     * @return Response
     */
    public function index(BackDataTable $dataTable)
    {
        return $dataTable->render('layouts.backs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.backs.create');
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
        return redirect(route('backs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Back $back
     *
     * @return Response
     */
    public function show(Back $back)
    {
        return view('layouts.backs.show', compact('back'));
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
        $back = $this->repository->findOneById($id);
        return view('layouts.backs.edit', compact('back'));
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
