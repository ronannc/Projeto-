<?php

namespace App\Http\Controllers;


//use App\DataTables\ShoulderWorkoutDataTable;
use App\Models\ShoulderWorkout;
use App\Repositories\Contracts\ShoulderWorkoutRepository;
use App\Services\ShoulderWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShoulderWorkoutController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * ShoulderWorkoutController constructor.
     *
     * @param ShoulderWorkoutRepository $repository
     * @param ShoulderWorkoutService    $service
     */
    public function __construct(ShoulderWorkoutRepository $repository, ShoulderWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(ShoulderWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.shoulder_workout.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.shoulder-workout.create');
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
        return redirect(route('shoulder-workouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param ShoulderWorkout $shoulderWorkout
     *
     * @return Response
     */
    public function show(ShoulderWorkout $shoulderWorkout)
    {
        return view('layouts.shoulder-workout.show', compact('shoulderWorkout'));
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
        $shoulderWorkout = ShoulderWorkout::find($id);
        return view('layouts.shoulder-workout.edit', compact('shoulderWorkout'));
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
