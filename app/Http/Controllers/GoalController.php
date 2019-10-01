<?php

namespace App\Http\Controllers;

use App\DataTables\GoalDataTable;
use App\Http\Requests\GoalCreateRequest;
use App\Http\Requests\GoalUpdateRequest;
use App\Models\Goal;
use App\Repositories\Contracts\GoalRepository;
use App\Services\GoalService;
use Illuminate\Http\Response;

class GoalController extends Controller
{
    /** @var GoalRepository */
    protected $repository;

    /** @var GoalService */
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

        $this->middleware('permission:list_goals');
        $this->middleware('permission:add_goals', ['only' => ['create','store']]);
        $this->middleware('permission:edit_goals', ['only' => ['edit','update']]);
        $this->middleware('permission:destroy_goals', ['only' => ['destroy']]);
    }

    /**
     * @param GoalDataTable $dataTable
     *
     * @return mixed
     */
    public function index(GoalDataTable $dataTable)
    {
        $resource = 'Listagem de objetivos de treino';
        return $dataTable->render('components.datatable', compact('resource'));
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
     * @param GoalCreateRequest $request
     *
     * @return Response
     */
    public function store(GoalCreateRequest $request)
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
     * @param Goal $goal
     *
     * @return void
     */
    public function show(Goal $goal)
    {
        //
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
        return view('layouts.goals.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GoalUpdateRequest $request
     * @param                   $id
     *
     * @return Response
     */
    public function update(GoalUpdateRequest $request, $id)
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
