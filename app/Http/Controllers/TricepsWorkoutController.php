<?php

namespace App\Http\Controllers;


//use App\DataTables\TricepsWorkoutDataTable;
use App\Models\TricepsWorkout;
use App\Repositories\Contracts\TricepsWorkoutRepository;
use App\Services\TricepsWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TricepsWorkoutController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * TricepsWorkoutController constructor.
     *
     * @param TricepsWorkoutRepository $repository
     * @param TricepsWorkoutService    $service
     */
    public function __construct(TricepsWorkoutRepository $repository, TricepsWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(TricepsWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.triceps_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.triceps_treino.create');
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
        $resultFromStoreTricepsWorkout = $this->service->store($data);

        if (!empty($resultFromStoreTricepsWorkout['error'])) {
            session()->flash('error', $resultFromStoreTricepsWorkout['message']);
            return back()->withInput();
        }

        session()->flash('status', 'TricepsWorkout adicionado com sucesso !');
        return redirect(route('triceps_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param TricepsWorkout $triceps_treino
     *
     * @return Response
     */
    public function show(TricepsWorkout $triceps_treino)
    {
        return view('layouts.triceps_treino.show', compact('triceps_treino'));
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
        $triceps_treino = TricepsWorkout::find($id);
//        dd($triceps_treino);
        return view('layouts.triceps_treino.edit', compact('triceps_treino'));
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
        $triceps_treino = TricepsWorkout::find($id);

        $resultFromUpdateTricepsWorkout = $this->service->update($data, $triceps_treino);
        if (!empty($resultFromUpdateTricepsWorkout['error'])) {
            session()->flash('error', $resultFromUpdateTricepsWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'TricepsWorkout atualizado com sucesso!');

        return redirect(route('triceps_treino.index'));
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
        $triceps_treino = TricepsWorkout::find($id);

        $resultFromDeleteTricepsWorkout = $this->service->delete($triceps_treino);
        if (!empty($resultFromDeleteTricepsWorkout['error'])) {
            session()->flash('error', $resultFromDeleteTricepsWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'TricepsWorkout deletado com sucesso!');
        return redirect(route('triceps_treino.index'));
    }
}
