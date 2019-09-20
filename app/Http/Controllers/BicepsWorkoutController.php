<?php

namespace App\Http\Controllers;

//use App\DataTables\BicepsWorkoutDataTable;
use App\Models\BicepsWorkout;
use App\Repositories\Contracts\BicepsWorkoutRepository;
use App\Services\BicepsWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BicepsWorkoutController extends Controller
{
    /** @var BicepsWorkoutRepository */
    protected $repository;

    /** @var BicepsWorkoutService */
    protected $service;

    /**
     * BicepsWorkoutController constructor.
     *
     * @param BicepsWorkoutRepository $repository
     * @param BicepsWorkoutService    $service
     */
    public function __construct(BicepsWorkoutRepository $repository, BicepsWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(BicepsWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.biceps_workout.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.biceps-workout.create');
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
        return redirect(route('biceps-workouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BicepsWorkout $bicepsWorkout
     *
     * @return Response
     */
    public function show(BicepsWorkout $bicepsWorkout)
    {
        return view('layouts.biceps-workout.show', compact('bicepsWorkout'));
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
        $bicepsWorkout = BicepsWorkout::find($id);
        return view('layouts.biceps-workout.edit', compact('bicepsWorkout'));
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
