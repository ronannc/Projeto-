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

    protected $repository;
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
//        return $dataTable->render('layouts.costa_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.costa_treino.create');
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
        $resultFromStoreBackWorkout = $this->service->store($data);
//        dd($resultFromStoreBackWorkout);

        if (!empty($resultFromStoreBackWorkout['error'])) {
            session()->flash('error', $resultFromStoreBackWorkout['message']);
            return back()->withInput();
        }

        session()->flash('status', 'BackWorkout adicionado com sucesso !');
        return redirect(route('costa_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param BackWorkout $costa_treino
     *
     * @return Response
     */
    public function show(BackWorkout $costa_treino)
    {
        return view('layouts.costa_treino.show', compact('costa_treino'));
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
        $costa_treino = BackWorkout::find($id);
//        dd($costa_treino);
        return view('layouts.costa_treino.edit', compact('costa_treino'));
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
        $costa_treino = BackWorkout::find($id);

        $resultFromUpdateBackWorkout = $this->service->update($data, $costa_treino);
        if (!empty($resultFromUpdateBackWorkout['error'])) {
            session()->flash('error', $resultFromUpdateBackWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BackWorkout atualizado com sucesso!');

        return redirect(route('costa_treino.index'));
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
        $costa_treino = BackWorkout::find($id);

        $resultFromDeleteBackWorkout = $this->service->delete($costa_treino);
        if (!empty($resultFromDeleteBackWorkout['error'])) {
            session()->flash('error', $resultFromDeleteBackWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'BackWorkout deletado com sucesso!');
        return redirect(route('costa_treino.index'));
    }
}
