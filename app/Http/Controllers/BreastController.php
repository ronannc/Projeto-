<?php

namespace App\Http\Controllers;


use App\DataTables\BreastDataTable;
use App\Models\Breast;
use App\Repositories\Contracts\BreastRepository;
use App\Services\BreastService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreastController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * BreastController constructor.
     *
     * @param BreastRepository $repository
     * @param BreastService    $service
     */
    public function __construct(BreastRepository $repository, BreastService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param BreastDataTable $dataTable
     *
     * @return Response
     */
    public function index(BreastDataTable $dataTable)
    {
        return $dataTable->render('layouts.breast.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.breast.create');
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
        return redirect(route('breast.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Breast $breast
     *
     * @return Response
     */
    public function show(Breast $breast)
    {
        return view('layouts.breast.show', compact('breast'));
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
        $breast = Breast::find($id);
        return view('layouts.breast.edit', compact('breast'));
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
        $breast = Breast::find($id);

        $response = $this->service->update($request->all(), $breast);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('breast.index'));
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
        $breast = Breast::find($id);

        $response = $this->service->delete($breast);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('breast.index'));
    }
}
