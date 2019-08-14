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
        return $dataTable->render('layouts.Back.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.Back.create');
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
        $resultFromStoreBack = $this->service->store($data);
//        dd($resultFromStoreBack);

        if (!empty($resultFromStoreBack['error'])) {
            session()->flash('error', $resultFromStoreBack['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Back adicionado com sucesso !');
        return redirect(route('Back.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Back $Back
     *
     * @return Response
     */
    public function show(Back $Back)
    {
        return view('layouts.Back.show', compact('Back'));
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
        $Back = Back::find($id);
//        dd($Back);
        return view('layouts.Back.edit', compact('Back'));
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
        $Back = Back::find($id);

        $resultFromUpdateBack = $this->service->update($data, $Back);
        if (!empty($resultFromUpdateBack['error'])) {
            session()->flash('error', $resultFromUpdateBack['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Back atualizado com sucesso!');

        return redirect(route('Back.index'));
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
        $Back = Back::find($id);

        $resultFromDeleteBack = $this->service->delete($Back);
        if (!empty($resultFromDeleteBack['error'])) {
            session()->flash('error', $resultFromDeleteBack['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Back deletado com sucesso!');
        return redirect(route('Back.index'));
    }
}
