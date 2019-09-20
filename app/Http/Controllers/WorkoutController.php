<?php

namespace App\Http\Controllers;

use App\DataTables\WorkoutDataTable;
use App\Http\Requests\WorkoutCreateRequest;
use App\Http\Requests\WorkoutUpdateRequest;
use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutMode;
use App\Repositories\Contracts\WorkoutRepository;
use App\Services\WorkoutService;
use Illuminate\Http\Response;

class WorkoutController extends Controller
{
    /** @var WorkoutRepository */
    protected $repository;

    /** @var WorkoutService */
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
        $resource = 'Listagem de treinos';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.workouts.create', compact('extraData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorkoutCreateRequest $request
     *
     * @return Response
     */
    public function store(WorkoutCreateRequest $request)
    {
        $data = $request->all();

        $response = $this->service->store($data);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        foreach ($data['triceps'] as $triceps) {
            $this->repository->save_triceps_workout([
                'workout_id'      => $response['id'],
                'triceps_id'      => $triceps,
                'workout_mode_id' => WorkoutMode::query()->first()['id']
            ]);
        }

        foreach ($data['biceps'] as $biceps) {
            $this->repository->save_biceps_workout([
                'workout_id'      => $response['id'],
                'biceps_id'       => $biceps,
                'workout_mode_id' => WorkoutMode::query()->first()['id']
            ]);
        }

        foreach ($data['back'] as $back) {
            $this->repository->save_back_workout([
                'workout_id'      => $response['id'],
                'back_id'         => $back,
                'workout_mode_id' => WorkoutMode::query()->first()['id']
            ]);
        }

        foreach ($data['shoulder'] as $shoulder) {
            $this->repository->save_shoulder_workout([
                'workout_id'      => $response['id'],
                'shoulder_id'     => $shoulder,
                'workout_mode_id' => WorkoutMode::query()->first()['id']
            ]);
        }

        foreach ($data['breast'] as $breast) {
            $this->repository->save_breast_workout([
                'workout_id'      => $response['id'],
                'breast_id'       => $breast,
                'workout_mode_id' => WorkoutMode::query()->first()['id']
            ]);
        }

        foreach ($data['lower_member'] as $lower_member) {
//            dd($lower_member);
            $this->repository->save_lower_member_workout([
                'workout_id'      => $response['id'],
                'lower_member_id' => $lower_member,
                'workout_mode_id' => WorkoutMode::query()->first()['id']
            ]);
        }
        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('workouts.edit', $response));
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
        $data = $this->repository->getExerciciosTreino($id);
        return view('layouts.workouts.show', compact('data'));
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
        $model = $this->repository->getExerciciosTreino($id);
        return view('layouts.workouts.edit', compact('extraData'), compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorkoutUpdateRequest $request
     * @param Workout              $workout
     *
     * @return Response
     */
    public function update(WorkoutUpdateRequest $request, Workout $workout)
    {
        $data = $request->all();

        $process_data = $this->service->process_data($data);


        foreach ($process_data['triceps'] as $key => $triceps) {
            $triceps['triceps_id'] = $key;
            $triceps['workout_id'] = $workout['id'];
            $this->repository->update_triceps_Workout($triceps);
        }

        foreach ($process_data['biceps'] as $key => $biceps) {
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

        foreach ($process_data['inferior'] as $key => $inferior) {
            $inferior['lower_member_id'] = $key;
            $inferior['workout_id'] = $workout['id'];
            $this->repository->update_lower_member_Workout($inferior);
        }


        $response = $this->service->update($data, $workout->id);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect()->route('workouts.index');
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

    public function myCurrentTraining()
    {
        $cliente = User::cliente()->first();
        $Workout = $cliente->Workout()->where('inicio', '<=', date('Y-m-d'))
            ->where('prox_ficha', '>=', date('Y-m-d'))
            ->first();

        $data = $this->repository->getExerciciosWorkout($Workout['id']);
        return view('layouts.workouts.show', compact('data'));
    }
}
