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

    protected $repository;
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
        return view('layouts.biceps_workout.create');
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
        $resultFromStoreBicepsWorkout = $this->service->store($data);

        if (!empty($resultFromStoreBicepsWorkout['error'])) {
            session()->flash('error', $resultFromStoreBicepsWorkout['message']);
            return back()->withInput();
        }

        session()->flash('status', 'BicepsWorkout adicionado com sucesso !');
        return redirect(route('biceps_workout.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BicepsWorkout $biceps_workout
     *
     * @return Response
     */
    public function show(BicepsWorkout $biceps_workout)
    {
        return view('layouts.biceps_workout.show', compact('biceps_workout'));
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
        $biceps_workout = BicepsWorkout::find($id);
        return view('layouts.biceps_workout.edit', compact('biceps_workout'));
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
        $biceps_workout = BicepsWorkout::find($id);

        $resultFromUpdateBicepsWorkout = $this->service->update($data, $biceps_workout);
        if (!empty($resultFromUpdateBicepsWorkout['error'])) {
            session()->flash('error', $resultFromUpdateBicepsWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BicepsWorkout atualizado com sucesso!');

        return redirect(route('biceps_workout.index'));
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
        $biceps_workout = BicepsWorkout::find($id);

        $resultFromDeleteBicepsWorkout = $this->service->delete($biceps_workout);
        if (!empty($resultFromDeleteBicepsWorkout['error'])) {
            session()->flash('error', $resultFromDeleteBicepsWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BicepsWorkout deletado com sucesso!');
        return redirect(route('biceps_workout.index'));
    }
}
