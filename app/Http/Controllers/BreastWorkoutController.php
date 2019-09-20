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
    /** @var BreastWorkoutRepository */
    protected $repository;

    /** @var BreastWorkoutService */
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
        return view('layouts.breast-workout.create');
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
        return redirect(route('breast-workouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BreastWorkout $breastWorkout
     *
     * @return Response
     */
    public function show(BreastWorkout $breastWorkout)
    {
        return view('layouts.breast-workout.show', compact('breastWorkout'));
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
        $breastWorkout = BreastWorkout::find($id);
        return view('layouts.breast-workout.edit', compact('breastWorkout'));
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
