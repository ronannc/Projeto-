<?php

namespace App\Http\Controllers;


//use App\DataTables\LowerMemberWorkoutDataTable;
use App\Models\LowerMemberWorkout;
use App\Repositories\Contracts\LowerMemberWorkoutRepository;
use App\Services\LowerMemberWorkoutService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LowerMemberWorkoutController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * LowerMemberWorkoutController constructor.
     *
     * @param LowerMemberWorkoutRepository $repository
     * @param LowerMemberWorkoutService    $service
     */
    public function __construct(LowerMemberWorkoutRepository $repository, LowerMemberWorkoutService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    public function index(LowerMemberWorkoutDataTable $dataTable)
//    {
//        return $dataTable->render('layouts.membro_inferior_treino.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.membro_inferior_treino.create');
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
        $resultFromStoreLowerMemberWorkout = $this->service->store($data);

        if (!empty($resultFromStoreLowerMemberWorkout['error'])) {
            session()->flash('error', $resultFromStoreLowerMemberWorkout['message']);
            return back()->withInput();
        }

        session()->flash('status', 'LowerMemberWorkout adicionado com sucesso !');
        return redirect(route('membro_inferior_treino.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param LowerMemberWorkout $membro_inferior_treino
     *
     * @return Response
     */
    public function show(LowerMemberWorkout $membro_inferior_treino)
    {
        return view('layouts.membro_inferior_treino.show', compact('membro_inferior_treino'));
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
        $membro_inferior_treino = LowerMemberWorkout::find($id);
//        dd($membro_inferior_treino);
        return view('layouts.membro_inferior_treino.edit', compact('membro_inferior_treino'));
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
        $membro_inferior_treino = LowerMemberWorkout::find($id);

        $resultFromUpdateLowerMemberWorkout = $this->service->update($data, $membro_inferior_treino);
        if (!empty($resultFromUpdateLowerMemberWorkout['error'])) {
            session()->flash('error', $resultFromUpdateLowerMemberWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'LowerMemberWorkout atualizado com sucesso!');

        return redirect(route('membro_inferior_treino.index'));
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
        $membro_inferior_treino = LowerMemberWorkout::find($id);

        $resultFromDeleteLowerMemberWorkout = $this->service->delete($membro_inferior_treino);
        if (!empty($resultFromDeleteLowerMemberWorkout['error'])) {
            session()->flash('error', $resultFromDeleteLowerMemberWorkout['message']);
            return back()->withInput();
        }
        session()->flash('success', 'LowerMemberWorkout deletado com sucesso!');
        return redirect(route('membro_inferior_treino.index'));
    }
}
