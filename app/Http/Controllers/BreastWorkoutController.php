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
//        return $dataTable->render('layouts.peitoral_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.peitoral_treino.create');
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
        return redirect(route('peitoral_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BreastWorkout $peitoral_treino
     *
     * @return Response
     */
    public function show(BreastWorkout $peitoral_treino)
    {
        return view('layouts.peitoral_treino.show', compact('peitoral_treino'));
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
        $peitoral_treino = BreastWorkout::find($id);
//        dd($peitoral_treino);
        return view('layouts.peitoral_treino.edit', compact('peitoral_treino'));
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
        $peitoral_treino = BreastWorkout::find($id);

        $resultFromUpdateBreastWorkout = $this->service->update($data, $peitoral_treino);
        if (!empty($resultFromUpdateBreastWorkout['error'])) {
            session()->flash('error', $resultFromUpdateBreastWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BreastWorkout atualizado com sucesso!');

        return redirect(route('peitoral_treino.index'));
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
        $peitoral_treino = BreastWorkout::find($id);

        $resultFromDeleteBreastWorkout = $this->service->delete($peitoral_treino);
        if (!empty($resultFromDeleteBreastWorkout['error'])) {
            session()->flash('error', $resultFromDeleteBreastWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BreastWorkout deletado com sucesso!');
        return redirect(route('peitoral_treino.index'));
    }
}
