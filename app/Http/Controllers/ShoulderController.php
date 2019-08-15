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
        return $dataTable->render('layouts.shoulder.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.shoulder.create');
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
        $response = $this->service->store($data);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('shoulder.index'));
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
        return view('layouts.shoulder.show', compact('shoulder'));
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
        return view('layouts.shoulder.edit', compact('shoulder'));
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
        $shoulder = Shoulder::find($id);

        $response = $this->service->update($data, $shoulder);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('shoulder.index'));
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
        $shoulder = Shoulder::find($id);

        $response = $this->service->delete($shoulder);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('shoulder.index'));
    }
}
