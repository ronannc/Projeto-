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
//        return $dataTable->render('layouts.lower_member_workout.index');
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.lower-member-workout.create');
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

        session()->flash('status', 'Adicionado com sucesso !');
        return redirect(route('lower-member-workouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param LowerMemberWorkout $lowerMemberWorkout
     *
     * @return Response
     */
    public function show(LowerMemberWorkout $lowerMemberWorkout)
    {
        return view('layouts.lower-member-workout.show', compact('lowerMemberWorkout'));
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
        $lowerMemberWorkout = LowerMemberWorkout::find($id);
        return view('layouts.lower-member-workout.edit', compact('lowerMemberWorkout'));
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
        $lowerMemberWorkout = LowerMemberWorkout::find($id);

        $response = $this->service->update($data, $lowerMemberWorkout);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('lower-member-workouts.index'));
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
