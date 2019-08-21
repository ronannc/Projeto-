<?php

namespace App\Http\Controllers;

use App\DataTables\WorkoutDataTable;
use App\Models\User;
use App\Models\Workout;
use App\Repositories\Contracts\WorkoutRepository;
use App\Services\WorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkoutController extends Controller
{

    protected $repository;
    protected $service;

    /**
     * WorkoutController constructor.
     *
     * @param WorkoutRepository $repository
     * @param WorkoutService    $service
     */
    public function __construct(WorkoutRepository $repository, WorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param WorkoutDataTable $dataTable
     *
     * @return Response
     */
    public function index(WorkoutDataTable $dataTable)
    {
        $Workout = Workout::all();
        return $dataTable->with('data', $Workout)->render('layouts.workout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.workout.create', compact('extraData'));
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

        $response = $this->service->store($data);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        foreach ($data['triceps'] as $triceps) {
            $this->repository->save_triceps_workout([
                'workout_id' => $response['id'],
                'triceps_id' => $triceps
            ]);
        }

        foreach ($data['biceps'] as $biceps) {
            $this->repository->save_biceps_workout([
                'workout_id' => $response['id'],
                'biceps_id'  => $biceps
            ]);
        }

        foreach ($data['back'] as $back) {
            $this->repository->save_back_workout([
                'workout_id' => $response['id'],
                'back_id'    => $back
            ]);
        }

        foreach ($data['shoulder'] as $shoulder) {
            $this->repository->save_shoulder_workout([
                'workout_id'  => $response['id'],
                'shoulder_id' => $shoulder
            ]);
        }

        foreach ($data['breast'] as $breast) {
            $this->repository->save_breast_workout([
                'workout_id' => $response['id'],
                'breast_id'  => $breast
            ]);
        }

        foreach ($data['lower_member'] as $lower_member) {
            $this->repository->save_lower_member_workout([
                'workout_id'      => $response['id'],
                'lower_member_id' => $lower_member
            ]);
        }
        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('workout.edit', $response));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data = $this->repository->getExerciciosWorkout($id);
        return view('layouts.workout.show', compact('data'));
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
        $extraData = $this->repository->getExtraData();
        $data = $this->repository->getExerciciosWorkout($id);
        return view('layouts.workout.edit', compact('extraData'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Workout $workout
     *
     * @return Response
     */
    public function update(Request $request, Workout $workout)
    {
        $data = $request->all();

        $data['formula_Workout'] = $workout->usa_formula();
        if ($data['formula_Workout']['formula']){
            $process_data = $this->service->process_data($data, true);
        }else{
            $process_data = $this->service->process_data($data);
        }

        foreach ($process_data['triceps'] as $key => $triceps){
            $triceps['triceps_id'] = $key;
            $triceps['workout_id'] = $workout['id'];
            $this->repository->update_triceps_Workout($triceps);
        }

        foreach ($process_data['biceps'] as $key => $biceps){
            $biceps['biceps_id'] = $key;
            $biceps['workout_id'] = $workout['id'];
            $this->repository->update_biceps_Workout($biceps);
        }

        foreach ($process_data['back'] as $key => $back) {
            $back['back_id'] = $key;
            $back['workout_id'] = $workout['id'];
            $this->repository->update_back_Workout($back);
        }

        foreach ($process_data['breast'] as $key => $breast) {
            $breast['breast_id'] = $key;
            $breast['workout_id'] = $workout['id'];
            $this->repository->update_breast_Workout($breast);
        }

        foreach ($process_data['shoulder'] as $key => $shoulder) {
            $shoulder['shoulder_id'] = $key;
            $shoulder['workout_id'] = $workout['id'];
            $this->repository->update_shoulder_Workout($shoulder);
        }

        foreach ($process_data['inferior'] as $key => $inferior){
            $inferior['lower_member_id'] = $key;
            $inferior['workout_id'] = $workout['id'];
            $this->repository->update_lower_member_Workout($inferior);
        }

        if(User::isCliente()){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }

        $response = $this->service->update($data, $workout);

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
     * @param Workout $workout
     *
     * @return Response
     */
    public function destroy(Workout $workout)
    {
        $response = $this->service->delete($workout);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('workout.index'));
    }

    public function myCurrentTraining(){
        $cliente = User::cliente()->first();
        $Workout = $cliente->Workout()->where('inicio', '<=', date('Y-m-d'))
                                    ->where('prox_ficha', '>=', date('Y-m-d'))
                                    ->first();

        $data = $this->repository->getExerciciosWorkout($Workout['id']);
        return view('layouts.workout.show', compact('data'));
    }
}
