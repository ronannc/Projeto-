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
        $this->middleware('can:admin', ['except' => ['update', 'myCurrentTraining']]);
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
        if(User::isCliente() && User::cliente()->first() != null){
            $cliente = User::cliente()->first();
            $Workout = $cliente->Workout();
            return $dataTable->with('data', $Workout)->render('layouts.Workout.index');
        }
        $Workout = Workout::all();
        return $dataTable->with('data', $Workout)->render('layouts.Workout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.Workout.create', compact('extraData') );
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
        $resultFromStoreWorkout = $this->service->store($data);

        if (!empty($resultFromStoreWorkout['error'])) {
            session()->flash('error', $resultFromStoreWorkout['message']);
            return back()->withInput();
        }

        foreach ($data['triceps'] as $triceps) {
            $this->repository->save_triceps_Workout([
                'id_Workout' => $resultFromStoreWorkout['id'],
                'id_triceps' => $triceps]);
        }

        foreach ($data['biceps'] as $biceps) {
            $this->repository->save_biceps_Workout([
                'id_Workout' => $resultFromStoreWorkout['id'],
                'id_biceps'  => $biceps]);
        }

        foreach ($data['back'] as $costa) {
            $this->repository->save_costa_Workout([
                'id_Workout' => $resultFromStoreWorkout['id'],
                'id_costa'   => $costa]);
        }

        foreach ($data['shoulder'] as $ombro) {
            $this->repository->save_ombro_Workout([
                'id_Workout' => $resultFromStoreWorkout['id'],
                'id_ombro'   => $ombro]);
        }

        foreach ($data['breast'] as $peitoral) {
            $this->repository->save_peitoral_Workout([
                'id_Workout'  => $resultFromStoreWorkout['id'],
                'id_peitoral' => $peitoral]);
        }

        foreach ($data['membro_inferior'] as $membro_inferior) {
            $this->repository->save_membro_inferior_Workout([
                'id_Workout'         => $resultFromStoreWorkout['id'],
                'id_membro_inferior' => $membro_inferior]);
        }
        session()->flash('status', 'Workout adicionado com sucesso !');
        return redirect(route('Workout.edit', $resultFromStoreWorkout));
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
        return view('layouts.Workout.show', compact('data'));
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
        return view('layouts.Workout.edit', compact('extraData'), compact('data'));
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
            $triceps['id_Workout'] = $workout['id'];
            $this->repository->update_triceps_Workout($triceps);
        }

        foreach ($process_data['biceps'] as $key => $biceps){
            $biceps['id_biceps'] = $key;
            $biceps['id_Workout'] = $workout['id'];
            $this->repository->update_biceps_Workout($biceps);
        }

        foreach ($process_data['back'] as $key => $costa) {
            $costa['id_costa'] = $key;
            $costa['id_Workout'] = $workout['id'];
            $this->repository->update_costa_Workout($costa);
        }

        foreach ($process_data['breast'] as $key => $peitoral) {
            $peitoral['id_peitoral'] = $key;
            $peitoral['id_Workout'] = $workout['id'];
            $this->repository->update_peitoral_Workout($peitoral);
        }

        foreach ($process_data['shoulder'] as $key => $ombro) {
            $ombro['id_ombro'] = $key;
            $ombro['id_Workout'] = $workout['id'];
            $this->repository->update_ombro_Workout($ombro);
        }

        foreach ($process_data['inferior'] as $key => $inferior){
            $inferior['id_membro_inferior'] = $key;
            $inferior['id_Workout'] = $workout['id'];
            $this->repository->update_membro_inferior_Workout($inferior);
        }

        if(User::isCliente()){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }

        $resultFromUpdateWorkout = $this->service->update($data, $workout);

        if (!empty($resultFromUpdateWorkout['error'])) {
            session()->flash('error', $resultFromUpdateWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Workout atualizado com sucesso!');

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
        $resultFromDeleteWorkout = $this->service->delete($workout);
        if (!empty($resultFromDeleteWorkout['error'])) {
            session()->flash('error', $resultFromDeleteWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Workout deletado com sucesso!');
        return redirect(route('Workout.index'));
    }

    public function myCurrentTraining(){
        $cliente = User::cliente()->first();
        $Workout = $cliente->Workout()->where('inicio', '<=', date('Y-m-d'))
                                    ->where('prox_ficha', '>=', date('Y-m-d'))
                                    ->first();

        $data = $this->repository->getExerciciosWorkout($Workout['id']);
        return view('layouts.Workout.show', compact('data'));
    }
}
