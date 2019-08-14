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
        return view('layouts.shoulder_workout.create');
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
        $resultFromStoreShoulderWorkout = $this->service->store($data);

        if (!empty($resultFromStoreShoulderWorkout['error'])) {
            session()->flash('error', $resultFromStoreShoulderWorkout['message']);
            return back()->withInput();
        }

        session()->flash('status', 'ShoulderWorkout adicionado com sucesso !');
        return redirect(route('shoulder_workout.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param ShoulderWorkout $shoulder_workout
     *
     * @return Response
     */
    public function show(ShoulderWorkout $shoulder_workout)
    {
        return view('layouts.shoulder_workout.show', compact('shoulder_workout'));
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
        $shoulder_workout = ShoulderWorkout::find($id);
//        dd($shoulder_workout);
        return view('layouts.shoulder_workout.edit', compact('shoulder_workout'));
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
        $shoulder_workout = ShoulderWorkout::find($id);

        $resultFromUpdateShoulderWorkout = $this->service->update($data, $shoulder_workout);
        if (!empty($resultFromUpdateShoulderWorkout['error'])) {
            session()->flash('error', $resultFromUpdateShoulderWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'ShoulderWorkout atualizado com sucesso!');

        return redirect(route('shoulder_workout.index'));
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
        $shoulder_workout = ShoulderWorkout::find($id);

        $resultFromDeleteShoulderWorkout = $this->service->delete($shoulder_workout);
        if (!empty($resultFromDeleteShoulderWorkout['error'])) {
            session()->flash('error', $resultFromDeleteShoulderWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'ShoulderWorkout deletado com sucesso!');
        return redirect(route('shoulder_workout.index'));
    }
}
