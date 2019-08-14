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
        return $dataTable->render('layouts.Breast.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.Breast.create');
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
        $resultFromStoreBreast = $this->service->store($data);

        if (!empty($resultFromStoreBreast['error'])) {
            session()->flash('error', $resultFromStoreBreast['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Breast adicionado com sucesso !');
        return redirect(route('Breast.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Breast $Breast
     *
     * @return Response
     */
    public function show(Breast $Breast)
    {
        return view('layouts.Breast.show', compact('Breast'));
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
        $Breast = Breast::find($id);
//        dd($Breast);
        return view('layouts.Breast.edit', compact('Breast'));
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
        $Breast = Breast::find($id);

        $resultFromUpdateBreast = $this->service->update($data, $Breast);
        if (!empty($resultFromUpdateBreast['error'])) {
            session()->flash('error', $resultFromUpdateBreast['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Breast atualizado com sucesso!');

        return redirect(route('Breast.index'));
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
        $Breast = Breast::find($id);

        $resultFromDeleteBreast = $this->service->delete($Breast);
        if (!empty($resultFromDeleteBreast['error'])) {
            session()->flash('error', $resultFromDeleteBreast['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Breast deletado com sucesso!');
        return redirect(route('Breast.index'));
    }
}
