<?php

namespace App\Http\Controllers;

use App\DataTables\WorkoutModeDataTable;
use App\Models\WorkoutMode;
use App\Repositories\Contracts\WorkoutModeRepository;
use App\Services\WorkoutModeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkoutModeController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * WorkoutModeController constructor.
     *
     * @param WorkoutModeRepository $repository
     * @param WorkoutModeService    $service
     */
    public function __construct(WorkoutModeRepository $repository, WorkoutModeService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param WorkoutModeDataTable $dataTable
     *
     * @return Response
     */
    public function index(WorkoutModeDataTable $dataTable)
    {
        return $dataTable->render('layouts.workout-mode.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.workout-mode.create');
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
        return redirect(route('workout-mode.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param WorkoutMode $workoutMode
     *
     * @return Response
     */
    public function show(WorkoutMode $workoutMode)
    {
        return view('layouts.workout-mode.show', compact('workoutMode'));
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
        $workoutMode = WorkoutMode::find($id);
        return view('layouts.workout-mode.edit', compact('workoutMode'));
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
        $workoutMode = WorkoutMode::find($id);

        $response = $this->service->update($request->all(), $workoutMode);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('workout-mode.index'));
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
        $workoutMode = WorkoutMode::find($id);

        $response = $this->service->delete($workoutMode);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('workout-mode.index'));
    }
}
