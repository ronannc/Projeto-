<?php

namespace App\Http\Controllers;


use App\DataTables\PhysicalAssessmentDataTable;
use App\Models\PhysicalAssessment;
use App\Repositories\Contracts\PhysicalAssessmentRepository;
use App\Services\PhysicalAssessmentService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhysicalAssessmentController extends Controller
{

    protected $repository;
    protected $service;


    /**
     * PhysicalAssessmentController constructor.
     *
     * @param PhysicalAssessmentRepository $repository
     * @param PhysicalAssessmentService    $service
     */
    public function __construct(PhysicalAssessmentRepository $repository, PhysicalAssessmentService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param PhysicalAssessmentDataTable $dataTable
     *
     * @return Response
     */
    public function index(PhysicalAssessmentDataTable $dataTable)
    {

        return $dataTable->render('layouts.physical-assessment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $extraData = $this->repository->getExtraData();
        return view('layouts.physical-assessment.create', compact('extraData'));
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
        return redirect(route('physical-assessments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param PhysicalAssessment $PhysicalAssessment
     *
     * @return Response
     */
    public function show(PhysicalAssessment $PhysicalAssessment)
    {
        return view('layouts.physical-assessment.show', compact('PhysicalAssessment'));
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
        $PhysicalAssessment = PhysicalAssessment::find($id);
        $extraData = $this->repository->getExtraData();
        return view('layouts.physical-assessment.edit', compact('PhysicalAssessment'), compact('extraData'));
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
        $PhysicalAssessment = PhysicalAssessment::find($id);

        $response = $this->service->update($data, $PhysicalAssessment);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Atualizado com sucesso!');

        return redirect(route('physical-assessments.index'));
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
        $PhysicalAssessment = PhysicalAssessment::find($id);

        $response = $this->service->delete($PhysicalAssessment);
        if (!empty($response['error'])) {
            session()->flash('error', $response['message']);
            return back()->withInput();
        }
        session()->flash('success', 'Deletado com sucesso!');
        return redirect(route('physical-assessments.index'));
    }
}
