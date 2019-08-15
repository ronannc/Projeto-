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
        // $this->middleware('can:admin', ['except' => ['update', 'myCurrentTraining']]);
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
        // if(User::isCliente() && User::cliente()->first() != null){
        //     $cliente = User::cliente()->first();
        //     $Workout = $cliente->Workout();
        //     return $dataTable->with('data', $Workout)->render('layouts.Workout.index');
        // }
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
        $data['status'] = 0;
        $response = $this->service->store($data);

        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }

        foreach ($data['triceps'] as $triceps) {
            $this->repository->save_triceps_Workout([
                'id_workout' => $response['id'],
                'id_triceps' => $triceps]);
        }

        foreach ($data['biceps'] as $biceps) {
            $this->repository->save_biceps_Workout([
                'id_workout' => $response['id'],
                'id_biceps'  => $biceps]);
        }

        foreach ($data['back'] as $back) {
            $this->repository->save_back_Workout([
                'id_workout' => $response['id'],
                'id_back'    => $back
            ]);
        }

        foreach ($data['shoulder'] as $shoulder) {
            $this->repository->save_shoulder_Workout([
                'id_workout'  => $response['id'],
                'id_shoulder' => $shoulder
            ]);
        }

        foreach ($data['breast'] as $breast) {
            $this->repository->save_breast_Workout([
                'id_workout' => $response['id'],
                'id_breast'  => $breast
            ]);
        }

        foreach ($data['lower_member'] as $lower_member) {
            $this->repository->save_lower_member_Workout([
                'id_workout'      => $response['id'],
                'id_lower_member' => $lower_member
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
            $triceps['id_triceps'] = $key;
            $triceps['id_workout'] = $workout['id'];
            $this->repository->update_triceps_Workout($triceps);
        }

        foreach ($process_data['biceps'] as $key => $biceps){
            $biceps['id_biceps'] = $key;
            $biceps['id_workout'] = $workout['id'];
            $this->repository->update_biceps_Workout($biceps);
        }

        foreach ($process_data['back'] as $key => $back) {
            $back['id_back'] = $key;
            $back['id_workout'] = $workout['id'];
            $this->repository->update_back_Workout($back);
        }

        foreach ($process_data['breast'] as $key => $breast) {
            $breast['id_breast'] = $key;
            $breast['id_workout'] = $workout['id'];
            $this->repository->update_breast_Workout($breast);
        }

        foreach ($process_data['shoulder'] as $key => $shoulder) {
            $shoulder['id_shoulder'] = $key;
            $shoulder['id_workout'] = $workout['id'];
            $this->repository->update_shoulder_Workout($shoulder);
        }

        foreach ($process_data['inferior'] as $key => $inferior){
            $inferior['id_lower_member'] = $key;
            $inferior['id_workout'] = $workout['id'];
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
