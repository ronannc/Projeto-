<?php

namespace App\Http\Controllers;

//use App\DataTables\BackWorkoutDataTable;
use App\Models\BackWorkout;
use App\Repositories\Contracts\BackWorkoutRepository;
use App\Services\BackWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BackWorkoutController extends Controller
{
    /** @var BackWorkoutRepository */
    protected $repository;

    /** @var BackWorkoutService */
    protected $service;

    /**
     * BackWorkoutController constructor.
     *
     * @param BackWorkoutRepository $repository
     * @param BackWorkoutService    $service
     */
    public function __construct(BackWorkoutRepository $repository, BackWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(BackWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.back_workout.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.back-workout.create');
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
        return redirect(route('back-workouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BackWorkout $backWorkout
     *
     * @return Response
     */
    public function show(BackWorkout $backWorkout)
    {
        return view('layouts.back-workout.show', compact('backWorkout'));
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
        return view('layouts.back-workout.edit', compact('model'));
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
