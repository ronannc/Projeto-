<?php

namespace App\Http\Controllers;


//use App\DataTables\TricepsWorkoutDataTable;
use App\Models\TricepsWorkout;
use App\Repositories\Contracts\TricepsWorkoutRepository;
use App\Services\TricepsWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TricepsWorkoutController extends Controller
{
    /** @var TricepsWorkoutRepository */
    protected $repository;

    /** @var TricepsWorkoutService */
    protected $service;

    /**
     * TricepsWorkoutController constructor.
     *
     * @param TricepsWorkoutRepository $repository
     * @param TricepsWorkoutService    $service
     */
    public function __construct(TricepsWorkoutRepository $repository, TricepsWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(TricepsWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.triceps_workout.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.triceps-workout.create');
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
        return redirect(route('triceps-workouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param TricepsWorkout $tricepsWorkout
     *
     * @return Response
     */
    public function show(TricepsWorkout $tricepsWorkout)
    {
        return view('layouts.triceps-workout.show', compact('tricepsWorkout'));
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
        return view('layouts.triceps-workout.edit', compact('model'));
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
