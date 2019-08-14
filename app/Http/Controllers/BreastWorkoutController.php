<?php

namespace App\Http\Controllers;


//use App\DataTables\BreastWorkoutDataTable;
use App\Models\BreastWorkout;
use App\Repositories\Contracts\BreastWorkoutRepository;
use App\Services\BreastWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreastWorkoutController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * BreastWorkoutController constructor.
     *
     * @param BreastWorkoutRepository $repository
     * @param BreastWorkoutService    $service
     */
    public function __construct(BreastWorkoutRepository $repository, BreastWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(BreastWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.breast_workout.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.breast_workout.create');
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
        $resultFromStoreBreastWorkout = $this->service->store($data);

        if (!empty($resultFromStoreBreastWorkout['error'])) {
            session()->flash('error', $resultFromStoreBreastWorkout['message']);
            return back()->withInput();
        }

        session()->flash('status', 'BreastWorkout adicionado com sucesso !');
        return redirect(route('breast_workout.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BreastWorkout $breast_workout
     *
     * @return Response
     */
    public function show(BreastWorkout $breast_workout)
    {
        return view('layouts.breast_workout.show', compact('breast_workout'));
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
        $breast_workout = BreastWorkout::find($id);
//        dd($breast_workout);
        return view('layouts.breast_workout.edit', compact('breast_workout'));
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
        $breast_workout = BreastWorkout::find($id);

        $resultFromUpdateBreastWorkout = $this->service->update($data, $breast_workout);
        if (!empty($resultFromUpdateBreastWorkout['error'])) {
            session()->flash('error', $resultFromUpdateBreastWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BreastWorkout atualizado com sucesso!');

        return redirect(route('breast_workout.index'));
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
        $breast_workout = BreastWorkout::find($id);

        $resultFromDeleteBreastWorkout = $this->service->delete($breast_workout);
        if (!empty($resultFromDeleteBreastWorkout['error'])) {
            session()->flash('error', $resultFromDeleteBreastWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BreastWorkout deletado com sucesso!');
        return redirect(route('breast_workout.index'));
    }
}
