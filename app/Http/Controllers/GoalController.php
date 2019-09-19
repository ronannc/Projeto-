<?php

namespace App\Http\Controllers;

use App\DataTables\GoalDataTable;
use App\Models\Goal;
use App\Repositories\Contracts\GoalRepository;
use App\Services\GoalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GoalController extends Controller
{

    protected $repository;
    protected $service;

    /**
     * BackController constructor.
     *
     * @param GoalRepository $repository
     * @param GoalService    $service
     */
    public function __construct(GoalRepository $repository, GoalService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @param GoalDataTable $dataTable
     *
     * @return mixed
     */
    public function index(GoalDataTable $dataTable)
    {
        return $dataTable->render('layouts.goals.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.goals.create');
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
        return redirect(route('goals.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Goal $method
     *
     * @return void
     */
    public function show(Goal $method)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Goal $method
     *
     * @return Response
     */
    public function edit(Goal $method)
    {
        return view('layouts.goals.edit', compact('method'));
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
