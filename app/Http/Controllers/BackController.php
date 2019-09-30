<?php

namespace App\Http\Controllers;

use App\DataTables\BackDataTable;
use App\Http\Requests\BackCreateRequest;
use App\Http\Requests\BackUpdateRequest;
use App\Models\Back;
use App\Repositories\Contracts\BackRepository;
use App\Services\BackService;
use Illuminate\Http\Response;

class BackController extends Controller
{
    /** @var BackRepository */
    protected $repository;

    /** @var BackService */
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


        $this->middleware('permission:list_back');
        $this->middleware('permission:add_back', ['only' => ['create','store']]);
        $this->middleware('permission:edit_back', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy_back', ['only' => ['destroy']]);
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
        $resource = 'Listagem de exercícios de costas';
        return $dataTable->render('components.datatable', compact('resource'));
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
     * @param BackCreateRequest $request
     *
     * @return Response
     */
    public function store(BackCreateRequest $request)
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
        $model = $this->repository->findOneById($id);
        return view('layouts.backs.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BackUpdateRequest $request
     * @param                   $id
     *
     * @return Response
     */
    public function update(BackUpdateRequest $request, $id)
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
